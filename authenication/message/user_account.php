<?php
    session_start();
    $id_this_login = $_SESSION['id_this_login'];
    $connect = mysqli_connect('localhost','root','123','my');
    $sql = "SELECT * FROM `message` WHERE from_user='$id_this_login'";
    $result = mysqli_query($connect, $sql);
    $array_message = $result->fetch_all (MYSQLI_ASSOC);
    $array_message = array_values($array_message);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My messages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <form style="width: 40%; margin: 2rem auto;">
        <input formaction="../table.php" formmethod="POST" type="submit" value="Return" class="btn btn-light" style="margin-left: 40%;" />
        <?php 
            foreach($array_message as $k => $value){
                $to_user =  $value["to_user"];  
                $message =  $value["message"];
                $sql = "SELECT * FROM test WHERE id='$to_user'";
                $result = mysqli_query($connect, $sql);
                $result_array = mysqli_fetch_array($result);
                $login_to_user = $result_array['login'];
                echo '
                    <fieldset disabled>
                        <legend>'.$login_to_user.'</legend>
                        <div class="mb-3">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="'.$message.'">
                        </div>
                    </fieldset>
                ';
            
            };
        ?>   
    </form>
</body>
</html>