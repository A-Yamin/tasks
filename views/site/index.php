<?php include ROOT . '/views/layouts/header.php'; ?>

    <h1>Задачи</h1>
    <table class="table">
        <thead>
        <tr>
<!--            <th scope="col">#</th>-->
            <th scope="col">Имя пользователя <i class="fa fa-sort"></i></th>
            <th scope="col">Email <i class="fa fa-sort"></i></th>
            <th scope="col">Текст задачи</th>
            <th scope="col">Статус <i class="fa fa-sort"></i></th>
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
                <td><?php if($task['status'] == 1) echo 'Выполнена'; else echo 'Не Выполнена'; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php /** @var Pagination $pagination */
echo $pagination->get(); ?>

    <form>
        <div class="form-group row">
            <label for="inputName" class="col-sm-1 col-form-label">Имя</label>
            <div class="col-sm-11">
                <input type="text" class="form-control" id="inputName" placeholder="Имя пользователя">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-1 col-form-label">Email</label>
            <div class="col-sm-11">
                <input type="email" class="form-control" id="inputEmail" placeholder="email@example.com">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-1 col-form-label">Задача</label>
            <div class="col-sm-11">
                <textarea class="form-control" id="inputText" placeholder="Текст задачи"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-1"></div>
            <div class="col-sm-11">
                <button type="submit" class="btn btn-primary">Добавить задачу</button>
            </div>
        </div>
    </form>

<?php include ROOT . '/views/layouts/footer.php'; ?>