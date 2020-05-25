<?php

$data = [
    "id" => $_GET['id'],
    "title" => $_POST['title'],
    "content" => $_POST['content'],
];


//1 Подключаемся к базе данных
$pdo = new PDO("mysql:host=localhost; dbname=learn; charset=utf8;", "root", "secret");

//2 Формируем запрос
$sql = "UPDATE tasks SET title=:title, content=:content WHERE id=:id";

//3 Подготавливаем запрос
$statement = $pdo->prepare($sql);

//4 Подставляем данные в подготовленный запрос в execute() и выполняем запрос
$result = $statement->execute($data);

//5 Делаем редирект на главную страницу
header("Location: /");


