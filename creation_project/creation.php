<?php 

    if(!isset($_POST['email'])){
        header('Location: http://localhost/project_web/creation_project/index.php');
        exit();
    }
        
    if (!($database = mysqli_connect("localhost", "admin", "WEB#dreamer$1104&1126", "web_dreamer"))) {
        die("Connection failed.");
    }

    $query = "INSERT INTO `" . $_POST['email'] . "` (name, html) VALUES ('default', '')";
    if (!($query = mysqli_query($database, $query))) {
        die("INSERTION failed.");
    }

    $result = mysqli_query($GLOBALS['database'], "SELECT id, name, modify_time FROM `" . $_POST['email'] . "`");

        if(!($row = mysqli_fetch_assoc($result))){
            echo '<p style="color: grey; font-size:13px; text-align: center;">尚未有任何專案</p>';
            exit();
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
                <td>' . $row['name'] . '</td>
                <td>' . $row['modify_time'] . '</td>
                <td><button class="delete">刪除</button></td>
                </tr>';
        }

        while($row = mysqli_fetch_assoc($result)){
            echo '<tr>
                <td>' . $row['name'] . '</td>
                <td>' . $row['modify_time'] . '</td>
                <td><button class="delete">刪除</button></td>
                </tr>';
        }

        echo '</table>';

?>