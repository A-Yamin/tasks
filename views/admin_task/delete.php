<?php include ROOT . '/views/layouts/header.php'; ?>

    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <br>
            <br>
            <h2>Вы действительно хотите удалить этот товар?</h2>
            <form method="post">
                <div class="form-group row">
                    <div class="col-sm-2">
                        <a href="/admin" class="btn btn-default">Отмена</a>
                    </div>
                    <div class="col-sm-2">
                        <input type="submit" name="submit" class="btn btn-danger" value="Удалить">
                    </div>
                </div>
            </form>
            <br/>
            <br/>
        </div>
    </div>
<?php include ROOT . '/views/layouts/footer.php'; ?>