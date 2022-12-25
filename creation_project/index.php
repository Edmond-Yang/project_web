<?php 
    if(!isset($_GET['email'])){
        header('http://localhost/project_web/auth/auth.html');
        exit();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> <?php echo $_GET['email'] ?> | WEB DREAMER </title>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../logo/logo.css">
        <link rel="stylesheet" href="./style.css">
        <link rel="icon" href="../logo/icon.PNG">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="./control.js"></script>
    </head>
    <body>
        
        <div class="header">
            <a href="../creation_project/index.html">
                <div class="div-logo">
                    <img src="../logo/icon.PNG" class="logo">
                    <h1 class="title">WEB DREAMER</h1>
                </div>
            </a>
            <div class="user">
                <img src="../selfie_img/0.png" class="selfie" id="user">
                <ul class="user-list">
                    <li>Hi <strong><?php echo $_GET['email'] ?></strong></li>
                    <li class="need-hover" id="logout">LOG OUT</li>
                </ul>
            </div>
        </div>
        
        <div class="create-project">
            <div class="substitution">

            </div>
            
            <button>CREATE PROJECT</button>
        </div>
        <div class="project-list">
            <h1>你的專案</h1>
            <p style="color: grey; font-size:13px; text-align: center;">尚未有任何專案</p>
            <!-- <table style="text-align: center; border-spacing: 0px; table-layout:fixed;">
                <col style="width: 60%;" />
                <col style="width: 10%;" />
                <col style="width: 10%;" />
                <tr>
                    <th>專案名稱</th>
                    <th>上次修改時間</th>
                    <th>刪除該專案</th>
                </tr>
                <tr>
                    <td>資工營: 城堡資旅</td>
                    <td>11/20 13:15:30</td>
                    <td><button class="delete">刪除</button></td>
                </tr>
                <tr>
                    <td>資工營: 城堡資旅</td>
                    <td>11/20 13:15:30</td>
                    <td><button class="delete">刪除</button></td>
                </tr>
                <tr>
                    <td>資工營: 城堡資旅</td>
                    <td>11/20 13:15:30</td>
                    <td><button class="delete">刪除</button></td>
                </tr>
            </table> -->
            <!-- php -->
        </div>
        
        
    </body>
</html>