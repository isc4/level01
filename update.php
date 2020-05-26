<?php

require 'models/QueryBuilder.php';
$db = new QueryBuilder(Connect::db());

$data = [
    "id" => $_GET['id'],
    "title" => $_POST['title'],
    "content" => $_POST['content']
];

$db->update('tasks', $data);

//5 Делаем редирект на главную страницу
header("Location: /");


