<?php

class ControllerMain extends Controller
{
    function __construct()
    {
        $this->model = new ModelMain();
        parent::__construct();
    }

    function indexAction()
    {
        $articles = $this->model->getArticles();
        $this->view->generate($articles,'template_view.php');
    }

    public function singleAction()
    {

    }
}