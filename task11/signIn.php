<?php require 'header.php'; ?>
<form action="verification.php" method="POST">
	<input type="text" name="nickname" placeholder="Логін">
	<input type="password" name="pass" placeholder="Пароль">
	<button type="submit">Увійти</button>
	
</form>
<?php require 'footer.php'; ?>