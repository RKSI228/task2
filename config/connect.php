<?php
    $localhost = "localhost";
    $user = "root";
    $password = "root";
    $db = "task2_proto";

    $connect = mysqli_connect($localhost,$user,$password,$db);

    if(!$connect)
    {
        die('Error conntcr to data base');
    }
?>