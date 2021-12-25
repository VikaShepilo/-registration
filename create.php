<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $registration_date = date("Y-m-d");
    require_once 'index.html';
    if (empty($name) || empty($email) || empty($login) || empty($password)) {
        header('Location: index.html');
    }else {
        $connect = mysqli_connect('localhost','root','123','my');
        mysqli_query($connect, "INSERT INTO `test` (`id`, `name`, `login`, `email`, `registration_date`, `password`, `date_lasted`) 
            VALUES (NULL, '$name', '$login', '$email', '$registration_date', '$password', NULL)");
        header('Location: authentication.html');
    }
?>