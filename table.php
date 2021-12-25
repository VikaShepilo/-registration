<?php
    $connect = mysqli_connect('localhost','root','123','my');
    $goods = mysqli_query($connect, "SELECT * FROM `test`");
    $goods = mysqli_fetch_all($goods);
    session_start();
    $id_this_user_status = $_SESSION['id_this_user_status'];
    $id_this_login = $_SESSION['id_this_login'];
    $_SESSION['id_this_login'] = $id_this_login;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TableUser</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>   
    <form id='form1'>
        <span>
        <div>
            <input formaction="checkbox_block.php" formmethod="POST" type="submit" value="" style="background-image: url(img/person-dash.svg); background-repeat: no-repeat; background-position: center center;" class="btn btn-outline-secondary" <?php echo $id_this_user_status == '0' ? 'disabled' : ''?> /> 
            <input formaction="checkbox_unblock.php" formmethod="POST" type="submit" value="" style="background-image: url(img/person-plus.svg); background-repeat: no-repeat; background-position: center center;" class="btn btn-outline-success" <?php echo $id_this_user_status == '0' ? 'disabled' : ''?> />
            <input formaction="checkbox_delete.php" formmethod="POST" type="submit" value="" style="background-image: url(img/trash.svg); background-repeat: no-repeat; background-position: center center;" class="btn btn-outline-danger" <?php echo $id_this_user_status == '0' ? 'disabled' : ''?> />
            <input formaction="checkbox_admin.php" formmethod="POST" type="submit" value="Upgrade to administrator" class="btn btn-outline-info" <?php echo $id_this_user_status == '0' ? 'disabled' : ''?> />
            <input formaction="checkbox_not_admin.php" formmethod="POST" type="submit" value="Downgrade to user" class="btn btn-outline-warning" <?php echo $id_this_user_status == '0' ? 'disabled' : ''?> />
            <input formaction="block_send.php" formmethod="POST" type="submit" value="Send a message" class="btn btn-secondary" />
            <input formaction="user_account.php" formmethod="POST" type="submit" value="View messages" class="btn btn-outline-dark" />
            <input formaction="authentication.html" formmethod="POST" type="submit" value="Exit"class="btn btn-light" style="margin-left: 40%;" />
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><input type="checkbox" name="cb_all" /></th>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Login</th>
                    <th scope="col">Email</th>
                    <th scope="col">Registration date</th>
                    <th scope="col">Last login date</th>
                    <th scope="col">Blocked</th>
                    <th scope="col">Admin</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($goods as $item) {
                        $status = $item[7] == 0 ? 'no' : 'yes';
                        $status_admin = $item[8] == 0 ? 'no' : 'yes';
                        echo '
                        <tr>
                            <th><input type="checkbox" class="qwe" name="'.$item[0].'" /></th>
                            <th>'.$item[0].'</th>
                            <td>'.$item[1].'</td>
                            <td>'.$item[2].'</td>
                            <td>'.$item[3].'</td>
                            <td>'.$item[4].'</td>
                            <td>'.$item[6].'</td>
                            <td>'.$status.'</td>
                            <td>'.$status_admin.'</td>
                        </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
    </form>
    <script>
        var f = document.getElementById('form1');
        f.cb_all.onchange = function(e){
            var el = e.target || e.srcElement;
            var qwe = el.form.getElementsByClassName('qwe');
            for(var i = 0; i<qwe.length; i++){
                if(el.checked){
                qwe[i].checked = true;
                }else{
                qwe[i].checked = false;
                }
            }
        }
    </script>   
</body>
</html>