<?php require 'header.php';?>

<?php
require 'dbConnect.php';

$sql = "SELECT posts.post_id, posts.post_name, posts.post_text, posts.date, users.nickname FROM posts INNER JOIN users ON posts.user_id=users.user_id ORDER BY posts.date DESC";
$stmt = mysqli_stmt_init($dbLink);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
 	$postID = $row["post_id"];
 	printf ("<b><a href=\"post.php?post_id=$postID\">%s</a></b> <br> %s", $row["post_name"], $row["post_text"]);
 	printf("<i>Створено користувачем %s, %s </i><br><br><br>", $row["nickname"], date("d.m.Y", strtotime($row["date"])));
 }

mysqli_stmt_close($stmt);
mysqli_close($dbLink);
?>

<?php require 'footer.php'; ?>