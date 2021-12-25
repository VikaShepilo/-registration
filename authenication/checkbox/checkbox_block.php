<?php 
    session_start();
    $id_user = $_SESSION['id_this_login'];
    $connect = mysqli_connect('localhost','root','123','my');
    foreach ($_POST as $k => $v) {
        $sql = "UPDATE  `test` SET status_user='1' WHERE id='$k'"; 
        mysqli_query($connect, $sql);
    };
    $sql = "SELECT * FROM test WHERE id='$id_user'";
    $result = mysqli_query($connect, $sql);
    $result_array = mysqli_fetch_array($result);
    $id_this_login = $result_array['id'];
    if ($id_this_login == $k){
        header('Location: ../../authentication.html');
    }else {
        header('Location: ../table.php');
    };
?>