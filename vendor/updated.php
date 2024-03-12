<?php 
    session_start();
    if(!$_SESSION['user']) header('Location: ../index.php');

    $file = str_replace('/', DIRECTORY_SEPARATOR, '../config/connect.php');
    require_once $file;
    
    $post_name = $_POST['post_name'];
    $due_date = $_POST['due_date'];
    $post_text = $_POST['post_text'];

    $id_posts = $_SESSION['id_posts'];

   /* $query = "UPDATE `tasks` SET `task_name`='$task_name',`priority`='$priority',`due_date`='$due_date',
    `completed`='$completed' WHERE `id_task` = '$id_task'";*/

    $query = "UPDATE `posts` SET `post_name`='$post_name',`post_text`='$post_text',`due_date`='$due_date' WHERE `id_posts` = '$id_posts'";

   
    if(mysqli_query($connect, $query)) header('Location: ../vendor/profile.php');
    
?>