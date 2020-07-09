<?php include ROOT . '/views/layouts/header.php'; ?>
    <div class="row">
        <div class="col-sm-5"><h1><a href="/">Задачи</a></h1></div>
        <br>
        <?php if (isset($_SESSION['user'])): ?>
            <div class="col-sm-7 text-right">
                <a href="/admin" class="btn btn-primary">Админ панель</a>
                <a href="/logout" class="btn btn-danger">Выйти</a>
            </div>
        <?php else: ?>
            <div class="col-sm-7 text-right"><a href="/login" class="btn btn-primary">Войти</a></div>
        <?php endif; ?>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <!--            <th scope="col">#</th>-->
            <th scope="col" id="th-user-name" style="width: 20%">
                <a href="/sort/user">Имя пользователя <i class="fa fa-sort"></i></a>
            </th>
            <th scope="col" id="th-email" style="width: 20%">
                <a href="/sort/email">Email <i class="fa fa-sort"></i></a>
            </th>
            <th scope="col" style="width: 40%">
                Текст задачи
            </th>
            <th scope="col" id="th-status" style="width: 20%">
                <a href="/sort/status">Статус <i class="fa fa-sort"></i></a>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php /** @var array $tasks */
        foreach ($tasks as $i => $task): ?>
            <tr>
                <!--                <th scope="row">-->
                <!--                    --><?php //echo $i+1 ?>
                <!--                </th>-->
                <td><?= $task['user_name'] ?></td>
                <td><?= $task['email'] ?></td>
                <td>
                    <span class="badge badge-pill badge-info"><?php if($task['is_edited']) echo "редактировано админом";?></span>
                    <?= $task['text'] ?>
                </td>
                <td><?php if ($task['status'] == 1) echo 'Выполнено'; else echo 'Не выполнено'; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php /** @var Pagination $pagination */
echo $pagination->get(); ?>

    <h2>Заполните форму, чтобы добавить новую задачу</h2>

    <br>
<?php
$errors = false;
if (isset($_SESSION['errors'])) $errors = $_SESSION['errors'];
?>
<?php if (isset($errors) && is_array($errors)): ?>
    <?php foreach ($errors as $error): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
<?php else: ?>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION['success']; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php
unset($_SESSION['errors']);
unset($_SESSION['success']);
?>
    <br>


    <form action="/task/add" method="post">
        <div class="form-group row">
            <label for="inputName" class="col-sm-1 col-form-label">Имя</label>
            <div class="col-sm-11">
                <input name="user_name" type="text" class="form-control" id="inputName" placeholder="Имя пользователя">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-1 col-form-label">Email</label>
            <div class="col-sm-11">
                <input name="email" type="email" class="form-control" id="inputEmail" placeholder="email@example.com">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-1 col-form-label">Задача</label>
            <div class="col-sm-11">
                <textarea name="text" class="form-control" id="inputText" placeholder="Текст задачи"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-1"></div>
            <div class="col-sm-11">
                <input type="submit" name="submit" class="btn btn-primary" value="Добавить задачу">
            </div>
        </div>
    </form>
    <br>


<?php include ROOT . '/views/layouts/footer.php'; ?>