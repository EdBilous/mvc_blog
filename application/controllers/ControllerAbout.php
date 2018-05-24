<?php

class ControllerAbout extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function indexAction()
    {
        $this->view->generate($data= null, 'about_view.php');
    }

    public function singleAection()

    {

    }
}