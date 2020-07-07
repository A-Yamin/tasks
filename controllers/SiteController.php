<?php

/**
 * Controller SiteController
 */
class SiteController
{

    /**
     * Action for main page
     */
    public function actionIndex($page = 1, $sort = 'user_name ASC')
    {
        // all tasks from db
        $tasks = Task::getTasksPerPage($page, $sort);
        $total = Task::getTasksTotalCount();
        // Pagination object
        $pagination = new Pagination($total, $page, 3, 'page-');

        // add new task


        // connect view
        require_once(ROOT . '/views/site/index.php');
        return true;
    }

}
