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
        $this->view->generate($articles, 'admin/template_view.php','main_view.php');
    }

    public function addAction()
    {
         if (isset($_POST) && !empty($_POST)) {
            $this->model->insertArticle($_POST);
         }
        $this->view->generate($articles = null, 'admin/template_view.php','add_view.php');
    }

    public function myarticlesAction()
    {
        $articles = $this->model->getArticles();
        $this->view->generate('admin/myarticles_view.php', $articles);
    }

    public function editAction()
    {
        $article = $this->model->getArticles();
        $this->view->generate('admin/edit_view.php', $article);
    }

    public function usersAction()
    {
        $users = $this->model->getArticles();
        $this->view->generate('admin/users_view.php', $users);
    }
}