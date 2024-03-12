<?php 

    session_start();
    
    $file = str_replace('/', DIRECTORY_SEPARATOR, '../config/connect.php');
    require_once $file;

    $id=$_GET['id'];

    $query = "DELETE FROM `posts` WHERE `id_posts` = '$id'";

    mysqli_query($connect, $query);

    header('Location: ../vendor/profile.php');
?>