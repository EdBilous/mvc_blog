<?php

class ModelRegister extends Model
{
    /**
     *Регистрация нового пользователя
     *вызов функции registration.php
     * @param array
     */
    public function registerUser($userData)
    {
        if ($userData['password'] !== $userData['passconf']) {
            $_SESSION['error_message'] = 'Пароли не совпадают!';
            return;
        }
        if (!isset($userData['login']) || empty($userData['login'])) {
            $_SESSION['error_message'] = 'Введите логин!';
            return;
        }
        if (!isset($userData['email']) || empty($userData['email'])) {
            $_SESSION['error_message'] = 'Введите почту!';
            return;
        }
        if ($this->insertUser($userData)) {
            $_SESSION['error_message'] = false;
        } else {
            $_SESSION['error_message'] = 'Ошибка регистрации!';
        }
    }

    /**
     * PRIVATE METOD for registerUser().
     * @param array
     */
    private function insertUser($userData)
    {
        $userData['name']      = htmlspecialchars($userData['name']);
        $userData['name']      = trim($userData['name']);
        $userData['last_name'] = htmlspecialchars($userData['last_name']);
        $userData['last_name'] = trim($userData['last_name']);
        $userData['login']     = htmlspecialchars($userData['login']);
        $userData['login']     = trim($userData['login']);
        $userData['email']     = htmlspecialchars($userData['email']);
        $userData['email']     = trim($userData['email']);
        $userData['password']  = htmlspecialchars($userData['password']);
        $userData['password']  = trim($userData['password']);

        $password = md5($userData['password']);

        if ($this->connect()) {
            $sql  = "INSERT INTO users(name, last_name, login, email, password)
                    VALUES ( :name,  :last_name,  :login,  :email,  :password)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(':name', $userData['name'], PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $userData['last_name'], PDO::PARAM_STR);
            $stmt->bindParam(':login', $userData['login'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $userData['email'], PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);

            return $stmt->execute();
        }
    }
}