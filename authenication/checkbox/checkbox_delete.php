<?php 
    $connect = mysqli_connect('localhost','root','123','my');
    foreach ($_POST as $k => $v) {
        $sql = "DELETE FROM `test` WHERE id='$k'"; 
        mysqli_query($connect, $sql);
    };
    $sql = "SELECT * FROM test WHERE id='$id_user'";
    $result = mysqli_query($connect, $sql);
    $result_array = mysqli_fetch_array($result);
    $id_this_login = $result_array['id'];
    if ($id_this_login !== $k){
        header('Location: ../table.php');
    }else {
        header('Location: ../../authentication.html');
    };
?>