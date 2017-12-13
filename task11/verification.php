<?php
session_start();
// print_r($_POST);
$credentials = $_POST;

require 'dbConnect.php';

$sql = "SELECT user_id, group_id, nickname, pass FROM users WHERE nickname=?";
$stmt = mysqli_stmt_init($dbLink);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "s", $credentials['nickname']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$userData = (mysqli_fetch_array($result, MYSQLI_ASSOC));
mysqli_stmt_close($stmt);
mysqli_close($dbLink);

if ($credentials['nickname'] == $userData['nickname'] AND $credentials['pass'] == $userData['pass']) {
    $_SESSION['id'] = $userData['group_id'];
    $_SESSION['user_id'] = $userData['user_id'];
    $_SESSION['name'] = $userData['nickname'];
    header("Location: index.php");
} else {
    echo "invalid pass or username";
}
?>