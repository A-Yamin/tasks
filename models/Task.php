<?php

/*
 * Model Task
 */

class Task
{

    /**
     * @return array Array of tasks per page
     */
    public static function getTasksPerPage($page, $sort)
    {
        $limit = 3;
        $offset = ($page - 1) * $limit;
            // connection with db
        $db = Db::getConnection();

        // sql query text
        $sql = 'SELECT * FROM task ORDER BY user_name ASC LIMIT :limit OFFSET :offset';

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
}