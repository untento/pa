<?php require 'header.php'; ?>

<form action="processing.php" method="POST">
	<p><textarea rows="7" cols="70" name="input"></textarea><Br>
	<input type="checkbox" name="email" value="1"> Інформування по email</p>
	<input type="submit" value="Обробити дані">
</form>

<?php require 'footer.php'; ?>
