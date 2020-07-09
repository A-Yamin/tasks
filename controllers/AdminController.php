<?php

/**
 * AdminController
 * Admin main page
 */
class AdminController extends AdminBase
{
    /**
     * /admin page
     */
    public function actionIndex($page = 1)
    {
        self::checkAdmin();
        // tasks for this page
        $tasks = Task::getTasksPerPage($page, 10);
        $total = Task::getTasksTotalCount();
        // Pagination object
        $pagination = new Pagination($total, $page, 10, 'page-');

        require_once(ROOT . '/views/admin/index.php');
        return true;
    }

}
