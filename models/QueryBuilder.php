<?php
require 'Connect.php';

class QueryBuilder
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Получить все записи
    public function getAllTasks()
    {
        //2 Составить запрос
        $sql = "SELECT * FROM tasks";

        //3 Подготовить запрос
        $statement = $this->pdo->prepare($sql);

        //4 Выполнить запрос
        $statement->execute();

        //5 Вывести полученный массив данных
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    //Добавить новую задачу
    public function addTask($data)
    {
        //2 Формируем запрос
        $sql = "INSERT INTO tasks (title, content) VALUES (:title, :content)";

        //3 Подготавливаем запрос
        $statement = $this->pdo->prepare($sql);

        //4 Подставляем данные в подготовленный запрос
        //$statement->bindValue(":title", $_POST['title']);
        //$statement->bindValue(":content", $_POST['content']);
        //Смотри пункт 4.1

        //5 Выполняем подготовленный запрос с подставленными данными
        $statement->execute($data);
    }

    //Удаление записи/задачи
    public function deleteTask($data)
    {
        //2 формируем запрос
        $sql = "DELETE FROM tasks WHERE id=:id";

        //3 Подготавливаем запрос
        $statement = $this->pdo->prepare($sql);

        //4 Подставляем данные в подготовленный запрос
        //$statement->bindValue(":id", $id);

        //5 Выполняем подготовленный запрос с подставленными данными
        $result = $statement->execute($data);
    }

    //Получаем одну запись
    public function getTask($id)
    {
        //2 Формируем запрос
        $sql = "SELECT * FROM tasks WHERE id=:id";

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
    public function updateTask($data)
    {
        //2 Формируем запрос
        $sql = "UPDATE tasks SET title=:title, content=:content WHERE id=:id";

        //3 Подготавливаем запрос
        $statement = $this->pdo->prepare($sql);

        //4 Подставляем данные в подготовленный запрос в execute() и выполняем запрос
        $statement->execute($data);
    }
}