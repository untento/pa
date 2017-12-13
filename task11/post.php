<?php require 'header.php'; ?>
<div class="modal fade" id="modal-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Додати коментар</h4>
            </div>
            <div class="modal-body">
                <p>this is modal window</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Відміна</button>
            </div>
        </div>
    </div>
</div>
<div class="parent">

    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <?php
            require 'dbConnect.php';

            $sql = "SELECT posts.post_id, posts.post_name, posts.post_text, posts.date, users.nickname FROM posts INNER JOIN users ON posts.user_id=users.user_id WHERE posts.post_id=?";
            $stmt = mysqli_stmt_init($dbLink);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, "i", $_GET['post_id']);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                printf ("<h1><b>%s</b></h1> <br> <div class=\"text-justify\"> %s </div><br> ", $row["post_name"], $row["post_text"]);
                printf("<b>Створено користувачем %s, %s <br></b>", $row["nickname"], date("d.m.Y", strtotime($row["date"])));
            }
            mysqli_stmt_close($stmt);
            if (isset($_SESSION["id"])){
            ?>
            <br>
            <p><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-1">Додати коментар</button></p>
            <?php
            }
            ?>
            <br>
            <i><b>Коментарі:</b></i>
            <?php
            
            $sql = "SELECT users.nickname, comments.comment, comments.date FROM comments JOIN users ON comments.user_id=users.user_id INNER JOIN posts ON comments.comment_id=posts.post_id WHERE comments.post_id=?";
            $stmt = mysqli_stmt_init($dbLink);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, "i", $_GET['post_id']);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            ?>
            <div class="lines">
                <div class="row">
                    <div class="col-sm-12">
                        <?php
                printf("<b>%s %s <br></b>", $row["nickname"], date("d.m.Y в H:m", strtotime($row["date"])));
                printf ("%s ", $row["comment"]);
                        ?>
                    </div>
                </div>
            </div>
            <?php
            }
            mysqli_stmt_close($stmt);
            mysqli_close($dbLink);
            ?>
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>
<?php require 'footer.php'; ?>