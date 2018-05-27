<?php

class ControllerPost extends Controller
{
    function __construct()
    {
        $this->model = new ModelPost();
        parent::__construct();
    }

    public function indexAction($params)
    {
//        var_dump(ROOT);
        if ($params) {
            $data = $this->model->getPostByUrl($params);
        }
        $this->view->generate($data, 'template_view.php', 'post_view.php');
    }

    public function singleAction()
    {

    }
}