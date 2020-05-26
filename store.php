<?php

require 'models/QueryBuilder.php';
$db = new QueryBuilder();

//4.1 Подставляем значения напрямую в execute() вместо bindValue();
$data = $_POST;

$db->addTask($data);

//6 Делаем редирект(перенаправление) на главную страницу
header("Location: /");