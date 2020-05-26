<?php

require 'models/QueryBuilder.php';
$db = new QueryBuilder();

//4.1 Получаем id из GET-запроса
$id = $_GET['id'];

$task = $db->getTask($id);

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