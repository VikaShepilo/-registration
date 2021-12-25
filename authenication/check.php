<?php
    if (empty($_POST['login']) || empty($_POST['password'])) {
        header('Location: ../authentication.html'); 
    } else {
        $connect = mysqli_connect('localhost','root','123','my');
        $login = $_POST['login'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM test WHERE login='$login'";
        $result = mysqli_query($connect, $sql);
        $result_array = mysqli_fetch_array($result);
        $password_this_login = $result_array['password'];
        $status_this_login = $result_array['status_user'];
        $id_this_login = $result_array['id'];
        $id_this_user_status = $result_array['status_for_site'];
        session_start();
        $_SESSION['id_this_login'] = $id_this_login;
        $_SESSION['id_this_user_status'] = $id_this_user_status;
        if ($password_this_login === $password) {
            if ($status_this_login == 0) {
                $date_last = date("Y-m-d"); 
                $sql_update = "UPDATE `test` SET `date_lasted` = '$date_last' WHERE `id` = '$id_this_login'";
                mysqli_query($connect, $sql_update); 
                header('Location: table.php');
            }else {
                header('Location: ../authentication.html');
            }
        }else{
            header('Location: ../authentication.html');
        }
    };    
?>

