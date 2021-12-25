<?php 
    session_start();
    $id_this_login = $_SESSION['id_this_login'];
    $_SESSION['id_this_login'] = $id_this_login;
    $connect = mysqli_connect('localhost','root','123','my');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <form class="form-registration">
    <input formaction="../table.php" formmethod="POST" type="submit" value="Return" class="btn btn-light" style="margin-left: 40%;" />
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Message will be sent </label>
            <?php
                $recipients = $_POST;
                foreach ($_POST as $k => $v) {
                    $sql = "SELECT * FROM test WHERE id='$k'";
                    $result = mysqli_query($connect, $sql);
                    $result_array = mysqli_fetch_array($result);
                    $login = $result_array['login'];
                    echo $login;
                    echo '; ';
                };
                $_SESSION['recipients'] = $recipients;
            ?>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Your message</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3"></textarea>
        </div>
        <input formaction="sended.php" formmethod="POST" type="submit" value="Submit" class="btn btn-primary" /> 
    </form>
</body>
</html>