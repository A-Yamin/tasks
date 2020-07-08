<?php include ROOT . '/views/layouts/header.php'; ?>
    <br>
    <div class="text-right">
        <a href="/login" class="btn btn-primary">Войти</a>
    </div>
    <h1><a href="/">Задачи</a></h1>
    <table class="table">
        <thead>
        <tr>
            <!--            <th scope="col">#</th>-->
            <th scope="col" id="th-user-name">
                <a href="/sort/user">Имя пользователя <i class="fa fa-sort"></i></a>
            </th>
            <th scope="col" id="th-email">
                <a href="/sort/email">Email <i class="fa fa-sort"></i></a>
            </th>
            <th scope="col">
                Текст задачи
            </th>
            <th scope="col" id="th-status">
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
                <td><?= $task['text'] ?></td>
                <td><?php if ($task['status'] == 1) echo 'Выполнена'; else echo 'Не Выполнена'; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php /** @var Pagination $pagination */
echo $pagination->get(); ?>

    <br>
<?php
$errors = false;
if (isset($_SESSION['errors'])) $errors = $_SESSION['errors'];
?>
<?php if (isset($errors) && is_array($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<?php
unset($_SESSION['errors']);
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


<?php include ROOT . '/views/layouts/footer.php'; ?>