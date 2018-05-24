<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.05.18
 * Time: 22:36
 */

class ModelLogin extends Model
{
    /**
     *Вход в админку
     *вызов функции enter.php
     * @param array
     */
    public function Login($post)
    {
        if (!isset($post['login']) || empty($post['login'])) {
            $_SESSION['error_message'] = 'Поле *Login не может быть пустым';
            return;
        }

        if (!isset($post['password']) || empty($post['password'])) {
            $_SESSION['error_message'] = 'Поле *Password не может быть пустым';
            return;
        }

        $login = htmlspecialchars($post['login']);
        $login = trim($login);
        $password = htmlspecialchars($post['password']);
        $password = md5($password);

        $check = null;
        if ($this->connect()) {
            $sql = "SELECT id
                    FROM users
                    WHERE login='$login' and password='$password'";
            $rezult = $this->connect()->query($sql)->fetch(PDO::FETCH_OBJ);

            if (!$rezult) {

                $check = false;
                $_SESSION['error_message'] = 'Ошибка! Попробуйте еще раз';
            } else {
                $check = true;
            }
        }

        if ($check) {
            $_SESSION['id']     = $rezult->id;
            $_SESSION['role']   = $rezult->role;
            $_SESSION['login']  = $login;
            $_SESSION['access'] = true;

            header('Location: /admin');
            exit;
        } else {
            $_SESSION['access'] = false;
            $_SESSION['error_message'] = 'Ошибка! Повторите попытку!';

            header('Location: /login');
            exit;
        }
    }
}