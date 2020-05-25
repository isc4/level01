<?php
//4.1 Получаем id через GET-запрос и подставляем его в execute()
$data = [
    "id" => $_GET['id']
];

//1 Подключаемся к базе данных
$pdo = new PDO("mysql:host=localhost; dbname=learn; charset=utf8;", "root", "secret");

//2 формируем запрос
$sql = "DELETE FROM tasks WHERE id=:id";

//3 Подготавливаем запрос
$statement = $pdo->prepare($sql);

//4 Подставляем данные в подготовленный запрос
//$statement->bindValue(":id", $id);

//5 Выполняем подготовленный запрос с подставленными данными
$result = $statement->execute($data);

header("Location: /");
