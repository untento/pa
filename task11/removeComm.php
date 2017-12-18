<?php require 'header.php';?>

<?php
require 'dbConnect.php';

$sql = "DELETE FROM comments WHERE comment_id=?";
$stmt = mysqli_stmt_init($dbLink);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $_SESSION['comment_id']);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($dbLink);
unset ($_SESSION['comment_id']);
header("Location: post.php?post_id=".$_SESSION['post_id']);
?>

<?php require 'footer.php'; ?>