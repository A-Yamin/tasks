<?php


class AdminTaskController extends AdminBase
{
    public function actionUpdate($id)
    {
        self::checkAdmin();
        $task = Task::getTaskById($id);
        $params = array();

        if (isset($_POST['submit'])) {
            $params['text'] = htmlentities($_POST['text']);
            $params['status'] = isset($_POST['status']) ? 1 : 0;

            Task::updateTaskById($id, $params);
            header("Location: /admin");
        }

        require_once(ROOT . '/views/admin_task/update.php');
        return true;
    }



    public function actionDelete($id)
    {
        self::checkAdmin();

        if (isset($_POST['submit'])) {
            Task::deleteTaskById($id);
            header('Location: /admin');
        }

        require_once (ROOT . '/views/admin_task/delete.php');
        return true;
    }
}