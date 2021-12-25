<?php 
    $connect = mysqli_connect('localhost','root','123','my');
    foreach ($_POST as $k => $v) {
        $sql = "UPDATE `test` SET status_for_site='0' WHERE id='$k'"; 
        mysqli_query($connect, $sql);
    };
    header('Location: table.php');
?>