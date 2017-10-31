<?php require 'header.php'; ?>

<?php
require 'dbConnect.php';



$sql = "SELECT * FROM posts";
$stmt = mysqli_stmt_init($dbLink);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
 	$postID = $row["post_id"];
 	printf ("<b><a href=\"post.php?post_id=$postID\">%s</a></b> <br> %s <br><br> ", $row["post_name"], $row["post_text"]);
 }

mysqli_stmt_close($stmt);
mysqli_close($dbLink);
?>

<?php require 'footer.php'; ?>