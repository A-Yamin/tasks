<?php

/**
 * Task Controller
 */
class TaskController
{
    /**
     * Create | Add task by anybody
     */
    public function actionCreate()
    {
        $userName = false;
        $email = false;
        $text = false;

        if (isset($_POST['submit'])) {
            $userName = htmlentities($_POST['user_name']);
            $email = htmlentities($_POST['email']);
            $text = htmlentities($_POST['text']);

            $errors = false;
            if (!isset($userName) || empty($userName) || !isset($text) || empty($text)) {
                $errors[] = 'Заполните все поля';
            }
            if (strlen($userName) >= 64) {
                $errors[] = 'Имя должно быть короче 64 символов';
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Не правильный формат email';
            }
            if (strlen($text) >= 65536) {
                $errors[] = 'Текст должен быть короче 65536 символов';
            }

            if ($errors == false) {
                Task::createTask($userName, $email, $text);
                $_SESSION['success'] = 'Задача добавлена!';
            }
            $_SESSION['errors'] = $errors;
        }
        // redirect
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
        return true;
    }
}