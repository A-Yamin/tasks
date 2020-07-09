<?php

/**
 * Controller SiteController
 */
class SiteController
{

    /**
     * Action for main page
     * @param int $page
     * @return bool
     */
    public function actionIndex($page = 1) // un-asc, un-desc, e-asc, e-desc, s-asc, s-desc
    {
        // tasks for this page
        $tasks = Task::getTasksPerPage($page, 3);
        $total = Task::getTasksTotalCount();
        // Pagination object
        $pagination = new Pagination($total, $page, 3, 'page-');

        // add new task


        // connect view
        require_once(ROOT . '/views/site/index.php');
        return true;
    }

    public function actionSort($sort = 'user')
    {
        if (!isset($_SESSION['sort']) || empty($_SESSION['sort'])) $_SESSION['sort'] = 'un-asc';
        
        switch ($sort) {
            case 'user':
                if($_SESSION['sort'] == 'un-asc') $_SESSION['sort'] = 'un-desc';
                else $_SESSION['sort'] = 'un-asc';
                break;
            case 'email':
                if($_SESSION['sort'] == 'e-asc') $_SESSION['sort'] = 'e-desc';
                else $_SESSION['sort'] = 'e-asc';
                break;
            case 'status':
                if($_SESSION['sort'] == 's-asc') $_SESSION['sort'] = 's-desc';
                else $_SESSION['sort'] = 's-asc';
        }

        // redirect
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }



}
