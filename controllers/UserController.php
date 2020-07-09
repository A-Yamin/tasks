<?php

/**
 * Контроллер UserController
 */
class UserController
{
    /**
     * Action для страницы "Вход на сайт"
     */
    public function actionLogin()
    {
        $login = false;
        $password = false;

        if (isset($_POST['submit'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $errors = false;

            $userId = User::checkUserData($login, $password);

            if ($userId == false) {
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                User::auth($userId);
                header("Location: /admin");
            }
        }

        require_once(ROOT . '/views/user/login.php');
        return true;
    }



    /**
     * Удаляем данные о пользователе из сессии
     */
    public function actionLogout()
    {
        
        // Удаляем информацию о пользователе из сессии
        unset($_SESSION["user"]);
        
        // Перенаправляем пользователя на главную страницу
        header("Location: /");
    }

}
