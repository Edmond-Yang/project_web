<?php 
    
    if(!isset($_POST['email']) || !isset($_POST['project']) || !isset($_POST['html'])){
        echo 'get away';
        die();
    }

    if (!($database = mysqli_connect("localhost", "admin", "WEB#dreamer$1104&1126", "web_dreamer"))) {
        die("Connection failed.");
    }

    $sql = "UPDATE `" . $_POST['email'] . "` SET `html` = '" . $_POST['html'] . "' WHERE `" . $_POST['email'] . "`.`id` = " . $_POST['project'];
    if (!($query = mysqli_query($database, $query))) {
        die("INSERTION failed.");
    }

?>