<?php include ROOT . '/views/layouts/header.php'; ?>

    <div class="row">
        <div class="col-sm-5"><h1><a href="/admin">Назад в админ панель</a></h1></div>
        <br>
        <div class="col-sm-7 text-right">
            <a href="/" class="btn btn-primary">Вернуься на сайт</a>
            <a href="/logout" class="btn btn-danger">Выйти</a>
        </div>
    </div>
    <h2>Заполните форму, чтобы отредактировать задачу</h2>

    <form action="" method="post">
        <div class="form-group row">
            <label for="inputName" class="col-sm-1 col-form-label">Имя</label>
            <div class="col-sm-11">
                <input disabled value="<?= $task['user_name'] ?>" name="user_name" type="text" class="form-control" id="inputName" placeholder="Имя пользователя">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-1 col-form-label">Email</label>
            <div class="col-sm-11">
                <input disabled value="<?= $task['email'] ?>" name="email" type="email" class="form-control" id="inputEmail" placeholder="email@example.com">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-1 col-form-label">Задача</label>
            <div class="col-sm-11">
                <textarea name="text" class="form-control" id="inputText" placeholder="Текст задачи"><?= $task['text'] ?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputStatus" class="col-sm-1 col-form-label">Статус</label>
            <div class="col-sm-11">
                <input name="status" type="checkbox" id="inputStatus" <?php if($task['status'] == 1) echo 'checked'; ?>>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-1"></div>
            <div class="col-sm-11">
                <input type="submit" name="submit" class="btn btn-primary" value="Сохранить">
            </div>
        </div>
    </form>

<?php include ROOT . '/views/layouts/footer.php'; ?>