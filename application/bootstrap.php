<?php

// подключаем файлы ядра
session_start();
function __autoload($class)
{
    require_once __DIR__ . '/core/' . $class . '.php';
}

require_once __DIR__ . '/core/config.php';
//require_once 'core/view.php';
//require_once 'core/controller.php';
function viewTitle()
{
    if ($_SERVER['REQUEST_URI'] === '/') {
        echo 'Custom Blog';
    } elseif (strpos($_SERVER['REQUEST_URI'], 'about')) {
        echo 'Custom Blog - About';
    } elseif (strpos($_SERVER['REQUEST_URI'], 'post')) {
        echo 'Custom Blog - Post';
    } elseif (strpos($_SERVER['REQUEST_URI'], 'contact')) {
        echo 'Custom Blog - Contact';
    } elseif (strpos($_SERVER['REQUEST_URI'], 'admin')) {
        echo 'Custom Blog - Admin';
    } else {
        echo 'Custom Blog';
    }
}

function getErrorMessage()
{
    return isset($_SESSION['error_message']) ? $_SESSION['error_message'] : false;
}


/*
Здесь обычно подключаются дополнительные модули, реализующие различный функционал:
	> аутентификацию
	> кеширование
	> работу с формами
	> абстракции для доступа к данным
	> ORM
	> Unit тестирование
	> Benchmarking
	> Работу с изображениями
	> Backup
	> и др.
*/

//require_once 'core/route.php';
Route::start(); // запускаем маршрутизатор