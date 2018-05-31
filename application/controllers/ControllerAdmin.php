<?php

class ControllerAdmin extends Controller
{
    function __construct()
    {
        if (!$_SESSION['access']) {
            header('Location: /login');
            exit;
        }
        $this->model = new ModelAdmin();
        parent::__construct();
    }

    public function indexAction()
    {
        $articles = $this->model->getArticles();
        $this->view->generate($articles, 'admin/template_view.php', 'main_view.php');
    }

    public function addAction()
    {
        if (isset($_POST) && !empty($_POST)) {
            $this->model->insertArticle($_POST);
        }
        $this->view->generate($articles = null, 'admin/template_view.php', 'add_view.php');
    }

    public function postsAction()
    {
        $articles = $this->model->getUserArticles();
        $this->view->generate($articles, 'admin/template_view.php', 'posts_view.php');
    }

    public function editpostAction($param)
    {
        if (isset($param) && !empty($param)) {
            $getArticle = $this->model->getArticleByUrl($param);
        }

        if (isset($_POST) && !empty($_POST)) {
            $this->model->updateArticle($_POST);
            header('Location: /admin/posts');
        }
        $this->view->generate($getArticle, 'admin/template_view.php', 'editpost_view.php');
    }

    public function usersAction($param = null)
    {
        if (isset($param) && !empty($param)) {
            $this->model->deleteUser($param);
        }
        if (isset($_POST['role']) && !empty($_POST['role']) && $_SESSION['role'] === 'admin'){
           $this->model->changeRole($_POST);
        }
        $users = $this->model->getUsers();
        $this->view->generate($users, 'admin/template_view.php', 'users_view.php');
    }

    public function deleteAction($param)
    {
        if (isset($param) && !empty($param)) {
            $this->model->deleteArticle($param);
            header('Location: /admin/');
        }
    }

//    /**
//     *
//     */
//    public function ajaxAction()
//    {
//        echo $this->model->delImage($_POST['urlImage']);
//    }

}