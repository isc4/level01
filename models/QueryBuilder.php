<?php
require 'Connect.php';

class QueryBuilder
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Получить все записи
    public function getAll(string $table)
    {
        //2 Составить запрос
        $sql = "SELECT * FROM $table";
        //3 Подготовить запрос
        $statement = $this->pdo->prepare($sql);
        //4 Выполнить запрос
        $statement->execute();
        //5 Вывести полученный массив данных
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    //Добавить новую задачу
    public function add(string $table, $data)
    {
        $keys = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));
        //2 Формируем запрос
        $sql = "INSERT INTO $table ($keys) VALUES ($values)";
        //3 Подготавливаем запрос
        $statement = $this->pdo->prepare($sql);
        //5 Выполняем подготовленный запрос с подставленными данными
        $statement->execute($data);
    }

    //Удаление записи/задачи
    public function delete(string $table,$data)
    {
        //2 формируем запрос
        $sql = "DELETE FROM $table WHERE id=:id";
        //3 Подготавливаем запрос
        $statement = $this->pdo->prepare($sql);
        //5 Выполняем подготовленный запрос с подставленными данными
        $result = $statement->execute($data);
    }

    //Получаем одну запись
    public function getOne(string $table, $id)
    {
        //2 Формируем запрос
        $sql = "SELECT * FROM $table WHERE id=:id";
        //3 Подготавливаем запрос
        $statement = $this->pdo->prepare($sql);
        //4 Подставляем данные в подготовленный запрос
        $statement->bindValue(":id", $id);
        //5 Выполняем подготовленный запрос
        $statement->execute();
        //6 Выводим подготовленный запрос для дальнейшей работы с ним
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    //Обновляем запись
    public function update(string $table, $data)
    {
        $keys = array_keys($data);
        $values = '';
        foreach ($keys as $key)
        {
            if ($key !== 'id')
            {
                $values .= $key . '=:' . $key . ', ';
            }
        }
        $values = (rtrim($values, ', '));
        //2 Формируем запрос
        $sql = "UPDATE $table SET $values WHERE id=:id";
        //3 Подготавливаем запрос
        $statement = $this->pdo->prepare($sql);
        //4 Подставляем данные в подготовленный запрос в execute() и выполняем запрос
        $statement->execute($data);
    }
}