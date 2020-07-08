<?php

/*
 * Model Task
 */

class Task
{

    /**
     * @return array Array of tasks per page
     */
    public static function getTasksPerPage($page)
    {
        $limit = 3;
        $offset = ($page - 1) * $limit;
        $sort = 'un-asc';
        if(isset($_SESSION['sort'])) $sort = $_SESSION['sort'];
        $orderBy = 'user_name ASC';
        switch ($sort) {
            case 'un-asc': $orderBy = 'user_name ASC'; break;
            case 'un-desc': $orderBy = 'user_name DESC'; break;
            case 'e-asc': $orderBy = 'email ASC'; break;
            case 'e-desc': $orderBy = 'email DESC'; break;
            case 's-asc': $orderBy = 'status ASC'; break;
            case 's-desc': $orderBy = 'status DESC';
        }

            // connection with db
        $db = Db::getConnection();

        // sql query text
        $sql = 'SELECT * FROM task ORDER BY ' . $orderBy . ' LIMIT :limit OFFSET :offset';

        // use prepared query
        $result = $db->prepare($sql);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->execute();

        // write result to array
        $i = 0;
        $tasks = array();
        while ($row = $result->fetch()) {
            $tasks[$i]['user_name'] = $row['user_name'];
            $tasks[$i]['email'] = $row['email'];
            $tasks[$i]['text'] = $row['text'];
            $tasks[$i]['status'] = $row['status'];
            $i++;
        }
        return $tasks;
    }


    /**
     * @return integer count of all tasks
     */
    public static function getTasksTotalCount()
    {
        // connection with db
        $db = Db::getConnection();

        // query to db
        $result = $db->query('SELECT count(id) AS count FROM task');
        $row = $result->fetch();
        return $row['count'];
    }




    public static function createTask($userName, $email, $text)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO task (user_name, email, text) '
                . 'VALUES (:user_name, :email, :text)';

        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        return $result->execute();
    }





}