<?php require 'header.php';?>

<?php
require 'dbConnect.php';

//запит до бази даних для генерації постів
$sql = "SELECT posts.post_id, posts.post_name, posts.post_description, posts.date, users.nickname FROM posts INNER JOIN users ON posts.user_id=users.user_id ORDER BY posts.date DESC";
$stmt = mysqli_stmt_init($dbLink);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
echo "<div class=\"parent\">";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $postID = $row["post_id"];
    echo "<div class=\"block\">";
    //відображення заголовку і скороченого опису поста
    printf ("<b><a href=\"post.php?post_id=$postID\">%s</a></b> <br> <div class=\"box\">%s ", $row["post_name"], $row["post_description"]);
    echo "</div>";
    //відображення користувача і дати написання поста
    printf("<b><i>Створено користувачем %s, %s </i></b><br>", $row["nickname"], date("d.m.Y", strtotime($row["date"])));
    echo "</div>";

}
echo "</div>";
mysqli_stmt_close($stmt);
mysqli_close($dbLink);
?>

<?php require 'footer.php'; ?>