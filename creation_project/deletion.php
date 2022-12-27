<?php 
    if(!isset($_POST['email']) || !isset($_POST['project']) || !isset($_POST['image'])|| !isset($_POST['password'])){
        echo 'get away';
        die();
    }

    $image = $_POST['image'];
    
    if (!($database = mysqli_connect("localhost", "root", "", "web_dreamer"))) {
        die("Connection failed.");
    }

    $query = "DELETE FROM `" . $_POST['email'] . "` WHERE `id`=" . $_POST['project'];
    if (!($query = mysqli_query($database, $query))) {
        die("INSERTION failed.");
    }

?>