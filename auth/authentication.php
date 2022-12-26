<?php
    $situation = $_POST['status'];
    $email =  $_POST["email"];
    $password = $_POST["password"];
    $password_confirm = $_POST["password_confirm"];

    if (!($database = mysqli_connect("localhost", "admin", "WEB#dreamer$1104&1126", "web_dreamer"))) {
        die("Connection failed.");
    }

    if (!($query = mysqli_query($database, 'SELECT email FROM account'))) {
        die("Connection failed.");
    }

    if($situation == 'signup'){
        // email 不重複
        while( $row = mysqli_fetch_row($query) ){
            foreach($row as $key=>$value){
                if($email == $value){
                    echo 'This Email Has Been Registered';
                    die();
                }
            }
        }

        // 密碼
        if(strlen($password)<8){
            echo 'Enter a Long Password';
            die();
        }

        if($password != $password_confirm){
            echo 'Enter The Same Password To Confirm';
            die();
        }

        $query = "INSERT INTO account (email, password, image) VALUES ('" . $email . "', '" . $password . "', " . rand(0, 6) .")";
        if (!($query = mysqli_query($database, $query))) {
            die("INSERTION failed.");
        }

        echo 'SIGN UP SUCCESSFULLY<br>NOW YOU CAN LOGIN';
    }
    else{

        if(strlen($email)==0){
            echo 'Enter The Email';
            die();
        }

        if(strlen($password)==0){
            echo 'Enter The Password';
            die();
        }

        $find = false;
        $sql = "SELECT email, password FROM account";
        $result = mysqli_query($database, $sql);

        while($row = mysqli_fetch_assoc($result)) {
            if($email == $row['email'] && $password == $row['password']){
                $find = true;   
                echo "SUCCESS";
                break;
            }
        }

        if(!$find)
            echo "Enter Right Email or Password";

    }

    $query = "CREATE TABLE `" . $email ."` ( id INT NOT NULL AUTO_INCREMENT , name VARCHAR(100) NOT NULL, html LONGTEXT NOT NULL, modify_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, PRIMARY KEY( id ) )";

    if (!($query = mysqli_query($database, $query))) {
        die("CREATION failed.");
    }

    mysqli_close($database);
    
?>
 
