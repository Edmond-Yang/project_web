<?php 

    if(!isset($_POST['email']) || !isset($_POST['image']) || !isset($_POST['password'])){
        echo 'hello';
        // header('Location: http://localhost/project_web/creation_project/index.php');
        exit();
    }

    $image = $_POST['image'];
        
    if (!($database = mysqli_connect("localhost", "root", "", "web_dreamer"))) {
        die("Connection failed.");
    }

    $query = "INSERT INTO `" . $_POST['email'] . "` (name, html) VALUES ('default', '')";
    if (!($query = mysqli_query($database, $query))) {
        die("INSERTION failed.");
    }

?>