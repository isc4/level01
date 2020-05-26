<?php

require 'models/QueryBuilder.php';
$db = new QueryBuilder(Connect::db());

$tasks = $db->getAll('tasks');


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
            <h1>All Tasks</h1>
            <a href="/create.php" class="btn btn-success">Add Tasks</a>
            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Action</th>
                </thead>
                <tbody>
                <?php foreach($tasks as $task):?>
                    <tr>
                        <td><?php echo $task['id']?></td>
                        <td><?php echo $task['title']?></td>
                        <td>
                            <a href="/show.php?id=<?php echo $task['id']?>" class="btn btn-primary">Show</a>
                            <a href="/edit.php?id=<?php echo $task['id']?>" class="btn btn-warning">Edit</a>
                            <a onclick="return confirm('Are you sure?')" href="/delete.php?id=<?php echo $task['id']?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>

