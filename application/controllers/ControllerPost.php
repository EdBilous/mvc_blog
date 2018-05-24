<?php

class ControllerPost extends Controller
{
    function __construct()
    {
        $this->model = new ModelPost();
        parent::__construct();
    }

    public function indexAction()
    {
        if ($_GET) {
            $data = $this->model->getPostByUrl(key($_GET));
        }
        $this->view->generate($data, 'template_view.php', 'post_view.php');
    }

    public function singleAction()
    {

    }
}