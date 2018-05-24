<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 24.05.18
 * Time: 13:08
 */

class ControllerSearch extends Controller
{
    function __construct()
    {
        $this->model = new ModelSearch();
        parent::__construct();
    }

    function indexAction()
    {
        if (isset($_POST) && !empty($_POST['query'])) {
            $search_result = $this->model->search($_POST['query']);

        } else if ($_POST['query'] == null) {
            header('Location: /');
            exit;
        }
        $this->view->generate($search_result, 'template_view.php', 'search_view.php');
    }

    public function singleAction()
    {

    }
}