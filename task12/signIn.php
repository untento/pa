<!--форма авторизації-->
<?php require 'header.php'; ?>
<div class="parent">
    <div class="block">
        <div class="row">
            <form action="verification.php" method="POST">
                <div class="col-sm-5">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" name="nickname" placeholder="Логін">
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" name="pass" placeholder="Пароль">
                    </div>
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary">Увійти</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>