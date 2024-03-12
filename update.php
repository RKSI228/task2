<?php
    session_start();
    if(!$_SESSION['user']) header('Location: ../index.php');

    require_once 'config/connect.php';

    $id_posts = $_GET['id'];
    $sql = "SELECT * FROM `posts` WHERE `id_posts` = '$id_posts'";
    $sql = mysqli_query($connect , $sql);
    $result = mysqli_fetch_assoc($sql);

    $_SESSION['id_posts'] = $id_posts;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Редактирование поста</title>
</head>
<body>
    <!-- форма авторизации -->

    <form action="vendor/updated.php" method="post">
        <label>Название поста</label>
        <input type="text" name="post_name" value="<?=$result['post_name'];?>">
        <label>Введите текст поста</label>
        <textarea name='post_text' cols='25' rows='5'><?=$result['post_text'];?></textarea>
        <label>Введите дату поста</label>
        <input type="date" name="due_date" value="<?=$result['due_date'];?>">
        <button type="submit">Изменить</button>
        <p>
            <a href="../vendor/profile.php">Назад</a>      
        </p>
    </form>
</body>
</html>