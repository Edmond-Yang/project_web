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
        <script>
            const fresh_project = function (){
                $.post('query.php', 
                    {email: "<?php echo $_POST['email']?>", password: "<?php echo $_POST['password']?>", image: <?php echo $image?>}, 
                    function(text){
                        if(text.includes("xampp") && !text.includes("text.includes(\"xampp\")")){
                            alert(text);
                            return;
                        }

                        $("#project").html(text);
                })
            }
        </script>
        <script src="./control.js"></script>
    </head>
    <body>
        
        <div class="header">
            <form>
                <button style="border: 0px; background-color: transparent; display: flex; cursor:pointer;" id="logo">
                    <img src="../logo/icon.PNG" class="logo">
                    <h1 class="title">WEB DREAMER</h1>
                </button>
            </form>
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
                <div>
                    <p class="word" style="-webkit-text-stroke: 1px red; margin-top: 20px;">CREATE YOUR OWN PROJECT</p>
                </div>
                <div>
                    <p class="word" style="-webkit-text-stroke: 1px green;">CREATE YOUR OWN PROJECT</p>
                </div>
                <div>
                    <p class="word" style="-webkit-text-stroke: 1px blue;">CREATE YOUR OWN PROJECT</p>
                </div>
            </div>
            
            <button id="create">CREATE PROJECT</button>
            <?php
                echo '<script> $(\'#create\').click(function(){
                    event.preventDefault();
                    $.post(\'creation.php\', {email:\'' . $_POST['email'] .'\', image: ' . $image .', "password": ' . $_POST['password'] . '}, function(text){
                            if(text.includes("xampp") && !text.includes("text.includes(\"xampp\")")){
                                alert("Error Occur. Please Contact Engineer.");
                                return;
                            }
                            fresh_project();
                    })
                })</script>';
            ?>
        </div>
        <div class="project-list">
            <h1>你的專案</h1>
        </div>
        <div class="project-list" id="project">
        </div>
        
        
    </body>
</html>