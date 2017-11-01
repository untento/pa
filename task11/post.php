<?php require 'header.php'; ?>

<?php
require 'dbConnect.php';

$sql = "SELECT posts.post_id, posts.post_name, posts.post_text, posts.date, users.nickname FROM posts INNER JOIN users ON posts.user_id=users.user_id WHERE posts.post_id=?";
$stmt = mysqli_stmt_init($dbLink);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $_GET['post_id']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
 	printf ("<b>%s</b> <br> %s <br> ", $row["post_name"], $row["post_text"]);
 	printf("Створено користувачем %s, %s", $row["nickname"], date("d.m.Y", strtotime($row["date"])));
 }

mysqli_stmt_close($stmt);
mysqli_close($dbLink);
?>

<?php require 'footer.php'; ?>