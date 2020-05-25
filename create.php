<?php

//1 Подключиться к базе данных
$pdo = new PDO("mysql:host=localhost; dbname=learn; charset=utf8;","root", "secret");

//2 Составить запрос
$sql = "SELECT * FROM tasks";

//3 Подготовить запрос
$statement = $pdo->prepare($sql);

//4 Выполнить запрос
$statement->execute();

//5 Вывести полученный массив данных
$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);


?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Add task</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-10">
            <h1>Add Tasks</h1>
            <form action="/store.php" method="post">
                <div class="form-group">
                    <input name="title" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="content" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Add Task</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>


