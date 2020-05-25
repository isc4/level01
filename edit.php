<?php
//4.1 Получаем id из GET-запроса
$id = $_GET['id'];

//1 Подключаемся к базе данных
$pdo = new PDO("mysql:host=localhost; dbname=learn; charset=utf8;", "root", "secret");

//2 Формируем запрос
$sql = "SELECT * FROM tasks WHERE id=:id";

//3 Подготавливаем запрос
$statement = $pdo->prepare($sql);

//4 Подставляем данные в подготовленный запрос
$statement->bindValue(":id", $id);

//5 Выполняем подготовленный запрос
$statement->execute();

//6 Выводим подготовленный запрос для дальнейшей работы с ним
$task = $statement->fetch(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Edit task</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-10">
            <h1>Edit Task</h1>
            <form action="/update.php?id=<?php echo $id?>" method="post">
                <div class="form-group">
                    <input name="title" type="text" class="form-control" value="<?php echo $task['title']?>">
                </div>
                <div class="form-group">
                    <textarea name="content" class="form-control"><?php echo $task['content']?></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-warning">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
