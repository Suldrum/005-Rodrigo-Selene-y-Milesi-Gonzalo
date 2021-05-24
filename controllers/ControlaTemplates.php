<?php

include_once 'models/ModelTemplates.php';
include_once 'views/ViewTemplates.php';

class ControlaTemplates {

    private $model;
    private $view;

    function __construct() {
        $this->model = new ModelTemplates();
        $this->view = new Viewtemplates();
    }


    /*hay que seguir armandolo */
    function showHome() {
        $task = $this->model->get($id);
        $this->view->showDetail($task); 
        
    }  
   
}