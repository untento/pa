<?php
session_start();

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$data = $_POST;


require 'dbConnect.php';

if (!$dbLink) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$sql = "INSERT INTO comments (post_id, user_id, comment, date) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($dbLink, $sql);
mysqli_stmt_bind_param($stmt, "iiss", $_SESSION['post_id'], $_SESSION['user_id'], $data['comment'], $curTime);
$curTime = date("Y-m-d H:i:s");
mysqli_stmt_execute($stmt);
printf("Ошибка: %d.\n", mysqli_stmt_errno($stmt));
mysqli_stmt_close($stmt);
mysqli_close($dbLink);
header("Location: post.php?post_id=".$_SESSION['post_id']);
?>