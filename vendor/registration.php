<?php
    session_start();
    
    $file = str_replace('/', DIRECTORY_SEPARATOR, '../config/connect.php');
    require_once $file;
    

    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if($password === $password_confirm)
    {
        $password = md5($password);

        $query = "INSERT INTO `users` (`id_users`, `full_name`, `login`, `email`, `password`) VALUES
        (NULL, '$full_name', '$login', '$email', '$password')";
        mysqli_query($connect,$query);

        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../index.php');
    }
    else
    {
        $_SESSION['message'] = 'Пароли не совпадают!';
        header('Location: ../register.php');
    }
?>

