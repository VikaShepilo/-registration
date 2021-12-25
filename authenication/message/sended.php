<?php
    session_start();
    $id_sender = $_SESSION['id_this_login'];
    $id_recipients = $_SESSION['recipients'];
    $message = $_POST['message'];
    $connect = mysqli_connect('localhost','root','123','my');
    foreach($id_recipients as $k => $v) {
        echo $k;
        mysqli_query($connect, "INSERT INTO `message` (`id_n`, `from_user`, `to_user`, `message`) 
            VALUES (NULL, '$k', '$id_sender', '$message')");
    };
        header('Location: ../table.php');
?>