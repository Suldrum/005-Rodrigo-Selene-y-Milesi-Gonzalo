<?php

include_once('views/PokemonView.php');
include_once('models/ModelPokemon.php');
include_once('models/ModelTipoElemental.php');
include_once('models/ModelRegion.php');

class PokemonController {

    private $model;
    private $view;
    private $modeloTipo;
    private $modeloRegion;

    public function __construct() {
        $this->model = new ModelPokemon();
        $this->view = new PokemonView();
        $this->modeloTipo = new ModelTipoElemental();
        $this->modeloRegion = new ModelRegion();
    }

    public function showCrearPokemon() {
        $tipos= $this->modeloTipo->getAll();
        $regiones = $this->modeloRegion->getAll();
        $this->view->showCrearPokemon($regiones, $tipos);
    }

    public function showActualizarPokemon($id_pokemon) {
        $tipos= $this->modeloTipo->getAll();
        $regiones = $this->modeloRegion->getAll();
        $pokemon =  $this->model->getPokemon($id_pokemon);
        $this->view->showActualizarPokemon($pokemon,$regiones,$tipos);
    }    

    public function createPokemon() {
        if (!empty($_POST['F_nombre']) && !empty($_POST['F_imagen']) && !empty($_POST['F_id_pokemon'])) {
            $id_pokemon= $_POST['F_id_pokemon'];
            $id_region= $_POST['F_id_region'];
            $name= $_POST['F_nombre'];
            $image= $_POST['F_imagen'];
            $id_tipo_elemental= $_POST['F_id_tipo_elemental'];
            if ($_POST['F_id_tipo_elemental2'] != "NADA")
                $id_tipo_elemental2= $_POST['F_id_tipo_elemental2'];
            else
                $id_tipo_elemental2= null;
            $this->model->newPokemon($id_pokemon, $id_region, $name, $image, $id_tipo_elemental, $id_tipo_elemental2);
            header("Location: " . BASE_URL . 'dexter');
        }else {
            header("Location: " . BASE_URL . 'createPokemon');
        }
    }

    public function editPokemon($id_pokemonViejo) {
        if (!empty($_POST['F_nombre']) && !empty($_POST['F_imagen'])) {
        //    $id_pokemon= $_POST['F_id_pokemon'];
            $id_region= $_POST['F_id_region'];
            $name= $_POST['F_nombre'];
            $image= $_POST['F_imagen'];
            $id_tipo_elemental= $_POST['F_id_tipo_elemental'];
            if ($_POST['F_id_tipo_elemental2'] != "NADA")
                $id_tipo_elemental2= $_POST['F_id_tipo_elemental2'];
            else
                $id_tipo_elemental2= null;
            $this->model->updatePokemon($id_region, $name, $image, $id_tipo_elemental, $id_tipo_elemental2,$id_pokemonViejo);
            header("Location: " . BASE_URL . 'dexter');
        }else {
            header("Location: " . BASE_URL . 'editarPokemon/'.$id_pokemonViejo);
        }
    }

    public function deletePokemon($id_pokemon) {
        //PONER IF DE "ESTAS SEGURO?"
        $this->model->deletePokemon($id_pokemon);
        header("Location: " . BASE_URL . 'dexter');
    }

}