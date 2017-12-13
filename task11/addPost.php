<?php require 'header.php'; ?>
<div class="parent">
    <form action="postWrite.php" method="POST">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="form-group">
                    <label>Заголовок</label>
                    <input type="text" class="form-control" name="heading">
                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="form-group">
                    <label>Скорочений опис</label>
                    <textarea class="form-control" rows="5" name="description"></textarea>
                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="form-group">
                    <label>Текст</label>
                    <textarea class="form-control" name="text"></textarea>
                    <script>
                        CKEDITOR.replace('text');
                    </script>
                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
        <div class="lines">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-block btn-success">Опублікувати</button>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
    </form>
</div>
<?php require 'footer.php';?>
