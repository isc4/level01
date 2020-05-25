<?php

//4.1 Подставляем значения напрямую в execute() вместо bindValue();
$data = [
    "title" => $_POST['title'],
    "content" => $_POST['content']
];

//1 Подключаемся к базе данных
$pdo = new PDO("mysql:host=localhost; dbname=learn; charset=utf8;", "root", "secret");

//2 Формируем запрос
$sql = "INSERT INTO tasks (title, content) VALUES (:title, :content)";

//3 Подготавливаем запрос
$statement = $pdo->prepare($sql);

//4 Подставляем данные в подготовленный запрос
//$statement->bindValue(":title", $_POST['title']);
//$statement->bindValue(":content", $_POST['content']);
//Смотри пункт 4.1

//5 Выполняем подготовленный запрос с подставленными данными
$statement->execute($data);

//6 Делаем редирект(перенаправление) на главную страницу
header("Location: /");