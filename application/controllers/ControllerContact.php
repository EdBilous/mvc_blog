<?php

class ControllerContact extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function indexAction()
    {
        $this->view->generate($data = null, 'template_view.php', 'contact_view.php');
    }

    public function singleAection()
    {

    }
}