<?php
    session_start();
    
    $file = str_replace('/', DIRECTORY_SEPARATOR, '../config/connect.php');
    require_once $file;

    if(!$_SESSION['user']) header('Location: ../index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль <?=$_SESSION['user']['login']?></title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">-->
</head>
<body>
    <div class="container my-5">
        <div class="line">
            <h2>Просмотр статей <?=$_SESSION['user']['login']?></h2>
        </div>
        <br>
        <a class="btn btn-primary" href="../create.php" role="button">Добавить статью</a>
        <a class="btn btn-danger" href="../vendor/logout.php" role="button" class="logout">Выход</a> 
        <section class="task-list-container">
            <div class="list-group">
                <?php 

                    require_once '../config/connect.php';

                                
                    $user_id = $_SESSION['user']['id_users'];

                    //$sql = "SELECT * FROM `posts` ORDER BY `due_date` DESC WHERE `id_users` = '$user_id'";
                    $sql = "SELECT * FROM `posts` WHERE `id_users` = '$user_id'  ORDER BY `due_date` DESC";

                    
                    $result = mysqli_query($connect,$sql);

                
                    while ($row = $result->fetch_assoc()){
                    echo "
                    <br>
                    <div class='list-group-item'>
                        <h5 class='mb-1'><?=$row[post_name]; ?></h5>
                        <p class='mb-1'>
                            Дата публикации: $row[due_date]
                        </p>
                        <p class='mb-1'>
                            Название поста: $row[post_name]
                        </p>
                        <textarea name='post_text' cols='25' rows='5'>$row[post_text]</textarea>
                        <br>
                            <a class='btn btn-primary btn-sm' href='../update.php?id=$row[id_posts]'>Изменить</a>
                            <a class='btn btn-danger btn-sm' href='../vendor/delete.php?id=$row[id_posts]'>Удалить</a>
                    </div>
                    ";
                    }
                ?>
            </div>
        </section>
    </div>
</body>
</html>











<!--<div class="header">
        <h2><?= $_SESSION['user']['full_name'] ?></h2>
        <a href="#"> <?= $_SESSION['user']['email'] ?> </a>
        <a href="../vendor/logout.php" class="logout">Выход</a>
</div> -->