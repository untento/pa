<?php require 'header.php'; ?>

<?php
require 'dbConnect.php';

$sql = "SELECT post_name, post_text FROM posts WHERE post_id=?";
$stmt = mysqli_stmt_init($dbLink);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $_GET['post_id']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
 	printf ("<b>%s</b> <br> %s <br><br> ", $row["post_name"], $row["post_text"]);
 }

mysqli_stmt_close($stmt);
mysqli_close($dbLink);
?>

<?php require 'footer.php'; ?>