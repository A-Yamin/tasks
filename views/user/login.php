<?php include ROOT . '/views/layouts/header.php'; ?>

    <div class="row">
        <div class="col-sm-offset-4">
            <br>
            <br>
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <h2>Вход для администратора</h2>
            <form action="#" method="post">
                <div class="form-group row">
                    <label for="inputName" class="col-sm-1 col-form-label">Логин</label>
                    <div class="col-sm-3">
                        <input name="login" type="text" class="form-control" id="inputName" placeholder="Login">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-1 col-form-label">Пароль</label>
                    <div class="col-sm-3">
                        <input name="password" type="password" class="form-control" id="inputPassword"
                               placeholder="Password">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-3">
                        <input type="submit" name="submit" class="btn btn-primary" value="Войти">
                    </div>
                </div>
            </form>
            <br/>
            <br/>
        </div>
    </div>
<?php include ROOT . '/views/layouts/footer.php'; ?>