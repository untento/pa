<!--сторінка генерація поста з коментарями-->
<?php require 'header.php'; ?>
<!--модальне вікно для довавання коментаря-->
<div class="modal fade" id="modal-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--форма модального вікна-->
            <form action="addComment.php" method="POST">
                <div class="modal-header">
                    <!--хедер модального вікна-->
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Додати коментар</h4>
                </div>
                <!--поле додавання коментаря-->
                <div class="modal-body">
                    <div class="form-group">
                        <textarea class="form-control focusedInput" rows="5" name="comment"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="parent">
    <div class="lines">
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
                $_SESSION["post_id"]=$_GET['post_id'];
                mysqli_stmt_close($stmt);
                if (isset($_SESSION["id"])){
                ?>
                <br>
                <!--кнопка виклику модального вікна для додавання коментаря тільки для авторизованих користувачів-->
                <p><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-1">Додати коментар</button></p>
                <?php
                }
                ?>
                <br>
                <i><b>Коментарі:</b></i>
                <?php
                //запит на отримання коментарів з бази даних
                $sql = "SELECT users.nickname, users.user_id, comments.comment, comments.comment_id, comments.date FROM comments INNER JOIN users ON comments.user_id=users.user_id WHERE comments.post_id=? ORDER BY comments.date";
                $stmt = mysqli_stmt_init($dbLink);
                mysqli_stmt_prepare($stmt, $sql);
                mysqli_stmt_bind_param($stmt, "i", $_GET['post_id']);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                //генерація коментарів до поста
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                ?>
                <div class="lines">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php
                    //і'мя користувача і дата коментаря
                    printf("<b>%s %s <br></b>", $row["nickname"], date("d.m.Y в H:i", strtotime($row["date"])));
                    if (isset($_SESSION['user_id'])) {
                        //генерація кнопок зміни і видалення коментаря
                        if ($row["user_id"] == $_SESSION["user_id"] OR $_SESSION['id'] == '1'){
                            $commentID = $row["comment_id"];
                            $postID = $_GET['post_id'];
                            printf("<a href=\"editComment.php?comment_id=$commentID&post_id=$postID\">%s</a> <a href=\"removeComment.php?comment_id=$commentID&post_id=$postID\">%s</a><br>", "редагувати", "видалити");
                        }
                    }
                    //вивід коментаря
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
</div>
<?php require 'footer.php'; ?>