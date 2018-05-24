<?php

class ControllerContact extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function indexAction()
    {
        $this->view->generate($data= null,'contact_view.php');
    }

    public function singleAection()
    {

    }
}