<?php

    if(!isset($_POST['email']) || !isset($_POST['password']) ){
        header('Location: http://localhost/project_web/auth/auth.php');
        exit();
    }

    $email =  $_POST["email"];
    $password = $_POST["password"];

    if (!($database = mysqli_connect("localhost", "admin", "WEB#dreamer$1104&1126", "web_dreamer"))) {
        echo "<form method=\"POST\" action=\"../auth/auth.php\">
        <input type=\"text\" value=\"Database Connection Error\" name=\"error_msg\">
        <button id=\"btn\"></button>
        </form>";
        echo "<script>document.querySelector('#btn').click();</script>";
        exit();
    }

    if (!($query = mysqli_query($database, 'SELECT email FROM account'))) {
        echo "<form method=\"POST\" action=\"../auth/auth.php\">
        <input type=\"text\" value=\"Database Connection Error\" name=\"error_msg\">
        <button id=\"btn\"></button>
        </form>";
        echo "<script>document.querySelector('#btn').click();</script>";
        exit();
    }

    
    if(strlen($email)==0){
        echo "<form method=\"POST\" action=\"../auth/auth.php\">
        <input type=\"text\" value=\"Enter The Email\" name=\"error_msg\">
        <button id=\"btn\"></button>
        </form>";
        echo "<script>document.querySelector('#btn').click();</script>";
        exit();
    }

    if(strlen($password)==0){
        echo "<form method=\"POST\" action=\"../auth/auth.php\">
        <input type=\"text\" value=\"Enter The Password\" name=\"error_msg\">
        <button id=\"btn\"></button>
        </form>";
        echo "<script>document.querySelector('#btn').click();</script>";
        exit();
    }

    $find = false;
    $sql = "SELECT email, password, image FROM account";
    $result = mysqli_query($database, $sql);

    while($row = mysqli_fetch_assoc($result)) {
        if($email == $row['email'] && $password == $row['password']){
            $find = true;   
            $image = $row['image'];
            break;
        }
    }

    if(!$find){
        echo "<form method=\"POST\" action=\"../auth/auth.php\">
        <input type=\"text\" value=\"Enter Right Email or Password\" name=\"error_msg\">
        <button id=\"btn\"></button>
        </form>";
        echo "<script>document.querySelector('#btn').click();</script>";
        exit();
    }

    function refresh_project(){
        $result = mysqli_query($GLOBALS['database'], "SELECT id, name, modify_time FROM `" . $_POST['email'] . "`");

                if(!($row = mysqli_fetch_assoc($result))){
                    echo '<p style="color: grey; font-size:13px; text-align: center;">尚未有任何專案</p>';
                }
                else{
                    echo '<table style="text-align: center; border-spacing: 0px; table-layout:fixed;">
                        <col style="width: 60%;" />
                        <col style="width: 10%;" />
                        <col style="width: 10%;" />
                        <tr>
                            <th>專案名稱</th>
                            <th>上次修改時間</th>
                            <th>刪除該專案</th>
                        </tr>';
                    echo '<tr>
                            <form method="POST" action="">
                                <input type="text" style="display: none;" value="' . $_POST['email'] .'" name="email">
                                <input type="text" style="display: none;" value="' . $row['id'] .'" name="project">
                                <input type="text" style="display: none;" value="' . $GLOBALS['image'] .'" name="image">
                                <td><button class="project">' . $row['name'] . '</button></td>
                            </form>
                            <td>' . $row['modify_time'] . '</td>
                            <form>
                                <input type="text" style="display: none;" id="email-user-' . $row['id'] .'" value="' . $_POST['email'] .'" name="email">
                                <input type="text" style="display: none;" id="project-user-' . $row['id'] .'" value="' . $row['id'] .'" name="project">
                                <td><button id="project-deletion-' . $row['id'] . '" class="delete">刪除</button></td>
                            </form>
                        </tr>';
                }

                while($row = mysqli_fetch_assoc($result)){
                    echo '<tr>
                            <form method="POST" action="">
                                <input type="text" style="display: none;"  value="' . $_POST['email'] .'" name="email">
                                <input type="text" style="display: none;"  value="' . $row['id'] .'" name="project">
                                <input type="text" style="display: none;" value="' . $GLOBALS['image'] .'" name="image">
                                <td><button class="project">' . $row['name'] . '</button></td>
                            </form>
                            <td>' . $row['modify_time'] . '</td>
                            <form>
                                <input type="text" style="display: none;" id="email-user-' . $row['id'] .'" value="' . $_POST['email'] .'" name="email">
                                <input type="text" style="display: none;" id="project-user-' . $row['id'] .'" value="' . $row['id'] .'" name="project">
                                <input type="text" style="display: none;" id="image" value="' . $GLOBALS['image'] .'" name="image">
                                <td><button id="project-deletion-' . $row['id'] . '" class="delete">刪除</button></td>
                            </form>
                        </tr>';
                }

                echo '</table>';
                echo '<script>
                        document.querySelectorAll(".delete").forEach(function(node){
                            node.addEventListener("click", function(event){
                                event.preventDefault();
                                var id = node.id.split("-")[2];
                                consol.log($("#image").val());
                                $.post("deletion.php", {"email": $("#email-user-" + id).val(), "project": $("#project-user-" + id).val(),"image": ' . $GLOBALS['image'] .'},function(text){
                                    if(text.includes("xampp") && !text.includes("text.includes(\"xampp\")")){
                                        alert(text);
                                        return;
                                    }

                                    $("#project").html(text);
                                })
                            })
                        })
                    </script>';
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> <?php $email = explode('@', $_POST['email']); echo $email[0] ?> | WEB DREAMER </title>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../logo/logo.css">
        <link rel="stylesheet" href="./style.css">
        <link rel="icon" href="../logo/icon.PNG">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="./control.js"></script>
    </head>
    <body>
        
        <div class="header">
            <a href="../creation_project/index.php">
                <div class="div-logo">
                    <img src="../logo/icon.PNG" class="logo">
                    <h1 class="title">WEB DREAMER</h1>
                </div>
            </a>
            <div class="user">
                <img src="../selfie_img/<?php echo $image; ?>.png" class="selfie" id="user">
                <ul class="user-list">
                    <li>Hi <strong><?php $email = explode('@', $_POST['email']); echo $email[0] ?></strong></li>
                    <li class="need-hover" id="logout">LOG OUT</li>
                </ul>
            </div>
        </div>
        
        <div class="create-project">
            <div class="substitution">

            </div>
            
            <button id="create">CREATE PROJECT</button>
            <?php
                echo '<script> $(\'#create\').click(function(){
                    event.preventDefault();
                    $.post(\'creation.php\', {email:\'' . $_POST['email'] .'\', image: ' . $image .'}, function(text){
                        
                            $(\'#project\').html(text)
                            // convert to t3.html ...
                    })
                })</script>';
            ?>
        </div>
        <div class="project-list">
            <h1>你的專案</h1>
        </div>
        <div class="project-list" id="project">
            
            <?php
                refresh_project();
            ?>
            <!-- php -->
        </div>
        
        
    </body>
</html>