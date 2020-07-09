<?php include ROOT . '/views/layouts/header.php'; ?>
<div class="row">
    <div class="row">
        <div class="col-sm-5"><h1><a href="/admin">Задачи</a></h1></div>
        <br>
        <div class="col-sm-7 text-right">
            <a href="/" class="btn btn-primary">Вернуься на сайт</a>
            <a href="/logout" class="btn btn-danger">Выйти</a>
        </div>
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
            <th scope="col" style="width: 20%">Текст задачи</th>
            <th scope="col" id="th-status" style="width: 20%">
                <a href="/sort/status">Статус <i class="fa fa-sort"></i></a>
            </th>
            <th scope="col" style="width: 10%">Редактировать</th>
            <th scope="col" style="width: 10%">Удалить</th>
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
                    <span class="badge badge-pill badge-info"><?php if($task['is_edited']) echo "редактировано";?></span>
                    <?= $task['text'] ?>
                </td>
                <td><?php if ($task['status'] == 1) echo 'Выполнено'; else echo 'Не выполнено'; ?></td>
                <td><a href="/admin/task/update/<?php echo $task['id']; ?>" class="">Редактировать</a></td>
                <td><a href="/admin/task/delete/<?php echo $task['id']; ?>" class="text-danger">Удалить</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <?php /** @var Pagination $pagination */
    echo $pagination->get(); ?>


    <?php include ROOT . '/views/layouts/footer.php'; ?>
