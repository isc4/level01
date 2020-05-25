<?php
//4.1 Получает id задачи через GET-запрос
$id = $_GET['id'];

//1 Подключаемся к базе данных
$pdo = new PDO("mysql:host=localhost; dbname=learn; charset=utf8;", "root", "secret");

//2 Составляем запрос
$sql = "SELECT * FROM tasks WHERE id=:id";

//3 Подготавливаем запрос
$statement = $pdo->prepare($sql);

//4 Подставляем данные в подготовленный запрос
$statement->bindValue(":id", $id);

//5 Выполняем подготовленный запрос
$statement->execute();

//6 Вывод данных полученных после выполнения запроса
$task = $statement->fetch(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Notebook</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-10">
            <h1><?php echo $task['title']?></h1>
            <p><?php echo $task['content']?></p>
            <a href="/">Go to back</a>
        </div>
    </div>
</div>

</body>
</html>