<?php

class ControllerSingle extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function indexAction()
    {
        $this->view->generate($data= null,'single_view.php');
    }

    public function singleAection()
    {

    }
}