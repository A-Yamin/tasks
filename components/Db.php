<?php

/**
 * Class Db
 * Component to work with db
 */
class Db
{

    /**
     * connection to db
     * @return \PDO <p>PDO object to work with db</p>
     */
    public static function getConnection()
    {
        // Get config params
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);

        // connection
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);

        // charset
        $db->exec("set names utf8");

        return $db;
    }

}
