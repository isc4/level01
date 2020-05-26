<?php

require 'models/QueryBuilder.php';
$db = new QueryBuilder();

$data = [
    "id" => $_GET['id'],
    "title" => $_POST['title'],
    "content" => $_POST['content'],
];

$db->updateTask($data);

//5 Делаем редирект на главную страницу
header("Location: /");


