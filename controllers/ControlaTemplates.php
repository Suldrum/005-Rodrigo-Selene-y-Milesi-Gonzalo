<?php

include_once ('models/ModelPokemon.php');
include_once ('views/ViewTemplates.php');
include_once('helpers/auth.helper.php');

class ControlaTemplates {

    private $model;
    private $view;
    private $userLog;

    function __construct() {
  //      $this->user = AuthHelper::getDataUser();
        $this->model = new ModelPokemon();
        $this->view = new Viewtemplates();
        $helper = new AuthHelper();
        $this->userLog = $helper->getLoggedUserName();
     //   $this->helper->getSmarty()->assign('username', $username);
    }


    /*hay que seguir armandolo */
    function showHome() {
        $this->view->showHomeVista();
    }  

    function showPokedex(){
        $pokemons = $this->model->getAll();
        $this->view->ShowPokedexVista ($pokemons);
    }

    public function getAlltUserData(){
        return $this->$userData;
    }
   
}