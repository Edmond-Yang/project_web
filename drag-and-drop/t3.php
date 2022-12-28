<?php
error_reporting(0);

$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "../image/" . $filename;
	
	
  if(!$db = mysqli_connect("localhost", "root", "", "web_dreamer")){
    die('No connection: ' . mysqli_connect_error());
  }
	// Get all the submitted data from the form
	$sql = "INSERT INTO image (filename,projectid,blockid) VALUES ('$filename',1,2)";

	// Execute query
	mysqli_query($db, $sql);

	// Now let's move the uploaded image into the folder: image
	if (move_uploaded_file($tempname, $folder)) {
		echo "<h3> Image uploaded successfully!</h3>";
	} else {
		echo "<h3> Failed to upload image!</h3>";
	}

}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>
        drag and drop
    </title>
    <link rel="stylesheet" href="t3.css"/>
    <link rel="stylesheet" href="../logo/logo.css"/>
    <link rel="stylesheet" href="top.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="t3.js"></script>
    <script src="top.js"></script>
    <script src="tool.js"></script>
  </head>
  <body>
    <div class="top">
      
        <div class="div-logo">
          <a href="../creation_project/index.php">
            <img src="../logo/icon.PNG" class="logo">
          </a>
            <input type="text" value="default" id="project-name">
            <p id="store-message" class="message">已儲存</p>
        </div>
      
      <div class="user">
          <img src="../selfie_img/0.png" class="selfie" id="user">
          <ul class="user-list">
              <li>Hi <strong>username</strong></li>
              <li class="need-hover">LOG OUT</li>
          </ul>
      </div>
    </div>
    <hr>
    <div class="tool-bar" id="tool-bar">
      
    </div>
    <hr>
    
    <div class="middle">
      <div class="left" id="sortlist">
      </div>
      <div class="right" id="addlist">
        <div>
          <p style="text-align: center; font-size: larger;">模板</p>
        </div>
        <div>
          <div class="template" id="text-only" style="width: 30%; margin: 30px 35%;">
            <span></span><img class="text-icon"src="text-block.PNG" width:538px height:348px>
          </div>
          <div class="template" id="image-only" style="width: 30%; margin: 30px 35%;">
            <span></span><img class="camera-icon"src="img-block.png" width:537px height:349px>
          </div>
          <div class="template" id="image-text">
            <span></span><img class="camera-icon"src="img-block.png" width:676px height:514px>
            <img class="text-icon"src="text-block.PNG" width:832px height:290px>
          </div>
          <div class="template" id="text-image">
            <span></span><img class="text-icon"src="text-block.PNG" width:832px height:290px>
            <img class="camera-icon"src="img-block.png" width:676px height:514px>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>