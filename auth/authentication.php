<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> 認證中 </title>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link rel="icon" href="../icon.PNG">
        <script src="https://cdn.jsdelivr.net/npm/webauthn-simple-app/dist/webauthn-simple-app.umd.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <link rel="stylesheet" href="../logo.css">
        <link rel="stylesheet" href="./authentication.css">
    </head>
    <body>
        <div>
            <div class="div-logo">
                <img src="../icon.PNG" class="logo">
                <h1 class="section-title">Web Dreamer</h1>
            </div>
            <?php

                $email =  $_POST["email"];
                $password = $_POST["password"];
                $password_confirm = $_POST["password-confirm"];

                if (!($database = mysqli_connect("localhost", "admin", "WEB#dreamer$1104&1126", "web_dreamer"))) {
                    die("Connection failed.");
                }

                if (!($query = mysqli_query($database, 'SELECT email FROM account'))) {
                    die("Connection failed.");
                }
                
                // email 不重複
                while( $row = mysqli_fetch_row($query) ){
                    foreach($row as $key=>$value){
                        if($email == $value){
                            echo '<div id="danger" class="block">';
                            echo '<p>註冊失敗，此 Email 已註冊過</p>';
                            echo '<p>Failed to Sign Up, Leave for login page</p>';
                            echo '</div>';
                            die();
                        }
                    }
                }

                // 密碼
                if(strlen($password)<8){
                    echo '<div id="danger" class="block">';
                    echo '<p>註冊失敗，密碼長度太小</p>';
                    echo '<p>Failed to Sign Up, Leave for login page</p>';
                    echo '</div>';
                    die();
                }

                if($password != $password_confirm){
                    echo '<div id="danger" class="block">';
                    echo '<p>註冊失敗，確認密碼輸入錯誤</p>';
                    echo '<p>Failed to Sign Up, Leave for login page</p>';
                    echo '</div>';
                    die();
                }

                $query = "INSERT INTO account (email, password, str1, str2) VALUES ('" . $email . "', '" . $password . "','','')";
                if (!($query = mysqli_query($database, $query))) {
                    die("INSERTION failed.");
                }
                
            ?>
            <div id="success" class="block">
                <p>註冊成功，將為你跳轉回登入頁面</p>
                <p>Sign Up Successfully, Leave for login page</p>
            </div>
            <!-- <div id="danger" class="block">
                <p>註冊失敗，將為你跳轉回登入頁面</p>
                <p>Failed to Sign Up, Leave for login page</p>
            </div> -->
        </div>
        
    </body>
</html>
