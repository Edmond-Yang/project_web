<?php 

    if(!isset($_POST['email']) || !isset($_POST['image'])){
        echo 'hello';
        // header('Location: http://localhost/project_web/creation_project/index.php');
        exit();
    }

    $image = $_POST['image'];
        
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
                    <input type="text" style="display: none;" id="image" value="' . $GLOBALS['image'] .'" name="image">
                    <td><button id="project-deletion-' . $row['id'] . '" class="delete">刪除</button></td>
                </form>
            </tr>';
        }

        while($row = mysqli_fetch_assoc($result)){
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

        echo '</table>';

        echo '<script>
                document.querySelectorAll(".delete").forEach(function(node){
                    node.addEventListener("click", function(event){
                        event.preventDefault();
                        var id = node.id.split("-")[2];
                        $.post("deletion.php", {"email": $("#email-user-" + id).val(), "project": $("#project-user-" + id).val(), "image": ' . $_POST['image'] .'},function(text){
                            if(text.includes("xampp") && !text.includes("text.includes(\"xampp\")")){
                                alert(text);
                                return;
                            }

                            $("#project").html(text);
                        })
                    })
                })
            </script>';

?>