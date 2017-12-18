<!--форма редагування коментаря-->
<?php require 'header.php';?>

<?php
require 'dbConnect.php';
//запис ід коментаря в сесію для обробки запису в базі
$_SESSION['comment_id'] = $_GET['comment_id'];
//запит до бази для виводу коментаря в textarea
$sql = "SELECT comments.comment FROM comments WHERE comments.comment_id=?";
$stmt = mysqli_stmt_init($dbLink);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $_GET['comment_id']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
?>

<!--форма для передачі параметрів обробки форми-->
<form action="editComm.php" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label>Редагування коментаря</label>
            <textarea class="form-control focusedInput" rows="5" name="comment"><?php echo $row["comment"];?></textarea>
            <button type="submit" class="btn btn-success">Відредагувати</button>
            <input class="btn btn-danger" type="button" value="Відміна" onClick='location.href="post.php?post_id=<?php echo $_GET['post_id']; ?>"'>
        </div>
    </div>
</form>

<?php
}
?>

<?php require 'footer.php'; ?>