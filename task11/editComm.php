<?php require 'header.php';?>

<?php
require 'dbConnect.php';

var_dump($_GET);
echo "<br>";
var_dump($_POST);
echo "<br>";
var_dump($_SESSION);

$sql = "UPDATE comments SET comment=? WHERE comment_id=?";
$stmt = mysqli_stmt_init($dbLink);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "si", $_POST['comment'], $_SESSION['comment_id']);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($dbLink);
header("Location: post.php?post_id=".$_SESSION['post_id']);
?>

<?php require 'footer.php'; ?>