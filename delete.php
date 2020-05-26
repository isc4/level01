<?php

require 'models/QueryBuilder.php';
$db = new QueryBuilder(Connect::db());

//4.1 Получаем id через GET-запрос и подставляем его в execute()
$data = [
    "id" => $_GET['id']
];

$db->deleteTask($data);

header("Location: /");
