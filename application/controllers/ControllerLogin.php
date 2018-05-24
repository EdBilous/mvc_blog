<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.05.18
 * Time: 22:25
 */

class ControllerLogin extends Controller
{
    function __construct()
    {
        $this->model = new ModelLogin();
        parent::__construct();
    }

    public function indexAction()
    {
        if (isset($_GET) && key_exists('logout', $_GET)) {
            session_destroy();
            header('Location: /');
            exit;
        }
        if (isset($_POST) && !empty($_POST)) {
            $this->model->Login($_POST);
        }

        if (isset($_SESSION['access']) && $_SESSION['access']) {
            header('Location: /admin');
            exit;
        }
        $this->view->generate($data = null, 'template_view.php', 'login_view.php');
    }
}