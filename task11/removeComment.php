<!--форма видалення користувача-->
<?php require 'header.php';?>

<?php
require 'dbConnect.php';
$_SESSION['comment_id'] = $_GET['comment_id'];
$_SESSION['post_id'] = $_GET['post_id'];
$sql = "SELECT comments.comment FROM comments WHERE comments.comment_id=?";
$stmt = mysqli_stmt_init($dbLink);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $_GET['comment_id']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
?>
<form action="removeComm.php" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label>Видалити коментар:</label>
            <p><?php echo $row["comment"];?></p>
            <button type="submit" class="btn btn-success">Видалити</button>
            <input class="btn btn-danger" type="button" value="Відміна" onClick='location.href="post.php?post_id=<?php echo $_GET['post_id']; ?>"'> 
        </div>
    </div>
</form>
<?php
}
?>
<?php require 'footer.php'; ?>