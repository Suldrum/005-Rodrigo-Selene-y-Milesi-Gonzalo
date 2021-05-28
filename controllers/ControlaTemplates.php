<?php

include_once ('models/ModelPokemon.php');
include_once ('models/ModelRegion.php');
include_once ('models/ModelTipoElemental.php');
include_once ('views/ViewTemplates.php');


class ControlaTemplates {

    private $model;
    private $view;

    function __construct() {
        $this->model = new ModelPokemon();
        $this->modelRegion = new ModelRegion();
        $this->modelTipo = new ModelTipoElemental();
        $this->view = new Viewtemplates();
    }

    /*hay que seguir armandolo */
    function showHome() {
        $this->view->showHomeVista();
    }  

    function showPokedex(){
        $listaRegiones = $this->modelRegion->getAll();
        $listaTipos = $this->modelTipo->getAll();
        $listaPokemones = $this->model->getAll();
        $this->view->ShowPokedexVista ($listaPokemones,$listaRegiones,$listaTipos);
    }

    function showRegiones() {
        $listaRegiones = $this->model->getAll();
        $this->view->ShowRegionVista ($listaRegiones);
    }

    function showActualizarRegion($regionActual) {
        $regionData = $this->model->getRegiongetRegion();
        $this->view->ShowRegionVista($regionData);
    } 

    function showTarjetaPokemon($idPokemon){
        $pokemon = $this->model->getPokemon($idPokemon);
        $region = $this->modelRegion->getRegion($pokemon->id_region);
        $tipo1 = $this->modelTipo->getTipo_elemetal($pokemon->id_tipo_elemental);
        $tipo2 = $this->modelTipo->getTipo_elemetal($pokemon->id_tipo_elemental2);
        $this->view->ShowTarjetaVistaPokemon($pokemon,$region,$tipo1,$tipo2);
    }

    function showPokedexFilter(){
        $id_tipo_elemental= $_POST['F_id_tipo_elemental'];
        $id_region= $_POST['F_id_region'];
        if (($id_region != "NADA") && ($id_tipo_elemental != "NADA"))
        {    
            $listaPokemones = $this->model->getAllFiltro($id_region,$id_tipo_elemental);
        }
        else
        {
            if ($id_region != "NADA")
                $listaPokemones = $this->model->getAllByRegion($id_region);
            else
            {
                if ($id_tipo_elemental != "NADA")
                    $listaPokemones = $this->model->getAllByType($id_tipo_elemental);
        
            }
        }
        $listaRegiones = $this->modelRegion->getAll();
        $listaTipos = $this->modelTipo->getAll();
        $this->view->ShowPokedexVista ($listaPokemones,$listaRegiones,$listaTipos);
    }
}