<?php
    session_start();
    if(!$_SESSION['user']) header('Location: ../index.php');

    $file = str_replace('/', DIRECTORY_SEPARATOR, '../config/connect.php');
    require_once $file;
    
    $post_name = $_POST['post_name'];
    $due_date = $_POST['due_date'];
    $post_text = $_POST['post_text'];

    $user_id = $_SESSION['user']['id_users'];

    /*$sql = "INSERT INTO `posts` (`id_`, `id_users`, `task_name`, `priority`, `due_date`, `completed`)
     VALUES (NULL, '$user_id', '$task_name', '$priority', '$due_date', '$completed')";*/

    $sql = "INSERT INTO `posts`(`id_posts`, `id_users`, `post_name`, `post_text`, `due_date`)
    VALUES (NULL,'$user_id','$post_name','$post_text','$due_date')";
    if(mysqli_query($connect, $sql))
    {
        header('Location: ../vendor/profile.php');
    }
?>