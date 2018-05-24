<?php

class ControllerRegister extends Controller
{
    function __construct()
    {
        $this->model = new ModelRegister();
        parent::__construct();
    }

    /**
     *
     */
    public function indexAction()
    {
        if ($_POST) {
            $this->model->registerUser($_POST);
        }

        $this->view->generate($data = null,'register_view.php');
    }
}