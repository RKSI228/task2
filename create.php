<?php
    session_start();
    if(!$_SESSION['user']) header('Location: ../index.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Добавление задачи</title>
</head>
<body>
    <!-- форма авторизации -->

    <form action="vendor/created.php" method="post">
        <label>Название поста</label>
        <input type="text" name="post_name" placeholder="Введите название поста">
        <label>Введите текст поста</label>
        <textarea name='post_text' cols='25' rows='5' placeholder="Текст поста"></textarea>
        <label>Введите дату поста</label>
        <input type="date" name="due_date" placeholder="Введите дату">
        <button type="submit">Добавить</button>
        <p>
            <a href="../vendor/profile.php">Назад</a>
        </p>
    </form>
</body>
</html>