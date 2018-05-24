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

//Форма для поиска по articles
//вызов в index.php и search.php
function viewSearchForm()
{
    if (strpos($_SERVER['REQUEST_URI'], '/')) {
        echo '<form action="/search" method="POST" class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" name="query" placeholder="Введите текст" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
            </form>';
    }elseif (strpos($_SERVER['REQUEST_URI'], 'search')) {
        echo '<form action="/search" method="POST" class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" name="query" placeholder="Введите текст" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
            </form>';
    } else {
        return;
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