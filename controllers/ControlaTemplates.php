<?php

include_once ('models/ModelPokemon.php');
include_once ('views/ViewTemplates.php');
include_once ('models/ModelRegion.php');

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

    function showRegiones() {
        $listaRegiones = $this->model->getAll();
        $this->view->ShowRegionVista ($listaRegiones);
    }

    function showActualizarRegion($regionActual) {
        $regionData = $this->model-getRegiongetRegion();
        $this->view->ShowRegionVista($regionData);
    } 
}