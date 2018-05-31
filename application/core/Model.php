<?php

class Model
{
    /*
        Модель обычно включает методы выборки данных, это могут быть:
        > методы нативных библиотек pgsql или mysql;
        > методы библиотек, реализующих абстракицю данных. Например, методы библиотеки PEAR MDB2;
        > методы ORM;
        > методы для работы с NoSQL;
        > и др.
    */
    // Метод подключения к базе данныхs

    public static function connect()
    {
        return new PDO(
            'mysql:host=' . HOST . ';
            dbname=' . DB_NAME . ';
            charset=utf8',
            USER,
            PASSWORD
        );
      // return $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // метод выборки данных
    public function get_data()
    {
        // todo
    }
}