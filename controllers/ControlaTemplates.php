<?php

include_once 'models/ModelPokemon.php';
include_once 'views/ViewTemplates.php';

class ControlaTemplates {

    private $model;
    private $view;

    function __construct() {
        $this->model = new ModelPokemon();
        $this->view = new Viewtemplates();
    }


    /*hay que seguir armandolo */
    function showHome() {
        $this->view->showHomeVista();
    }  

    function showPokedex(){
        $pokemons = $this->model->getAll();
        $this->view->ShowPokedexVista ($pokemons);
    }
   
}