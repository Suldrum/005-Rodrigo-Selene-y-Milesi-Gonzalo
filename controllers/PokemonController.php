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
        if (AuthHelper::isAdmin())
        { 
            $tipos= $this->modeloTipo->getAll();
            $regiones = $this->modeloRegion->getAll();
            $this->view->showCrearPokemon($regiones, $tipos);
        }
        else
            header('Location: ' . BASE_URL . "home");
    }

    public function showActualizarPokemon($id_pokemon) {
        if (AuthHelper::isAdmin())
        { 
            $tipos= $this->modeloTipo->getAll();
            $regiones = $this->modeloRegion->getAll();
            $pokemon =  $this->model->getPokemon($id_pokemon);
            $this->view->showActualizarPokemon($pokemon,$regiones,$tipos);
        }
        else
            header('Location: ' . BASE_URL . "home");
        
    }    

    public function createPokemon() {
        if (AuthHelper::isAdmin())
        { 
            $id_pokemon= $_POST['F_id_pokemon'];
            $name= $_POST['F_nombre'];
            $image= $_FILES['F_imagen']['size'];
            if ( ($name != '') && ($image > 0) && ($id_pokemon > 0 )) {
                if (
                    $_FILES['F_imagen']['type'] == "image/jpg" ||
                    $_FILES['F_imagen']['type'] == "image/jpeg" ||
                    $_FILES['F_imagen']['type'] == "image/png" ||
                    $_FILES['F_imagen']['type'] == "image/jpeg"
                )
                {
                    $id_region= $_POST['F_id_region'];
                    $id_tipo_elemental= $_POST['F_id_tipo_elemental'];
                    $result = (strcmp($_POST['F_id_tipo_elemental2'], $id_tipo_elemental) === 0);
                    if ( ($_POST['F_id_tipo_elemental2'] == "NADA") || (strcmp($_POST['F_id_tipo_elemental2'], $id_tipo_elemental) === 0) )
                        $id_tipo_elemental2= null;
                    else
                        $id_tipo_elemental2= $_POST['F_id_tipo_elemental2'];
                    $success = $this->model->newPokemon($id_pokemon, $id_region, $name, $_FILES['F_imagen']['tmp_name'], $id_tipo_elemental, $id_tipo_elemental2);
                    if ($success)
                        header("Location: " . BASE_URL . 'dexter/1');
                        else
                        header("Location: " . BASE_URL . 'crearPokemon');
                }
                else
                    header("Location: " . BASE_URL . 'crearPokemon');
            }
            else
                header("Location: " . BASE_URL . 'home');
        }
        else
            header('Location: ' . BASE_URL . "home");
    }

    public function editPokemon($id_pokemonViejo) {
        if (AuthHelper::isAdmin())
        { 
            $name= $_POST['F_nombre'];
            $image= $_FILES['F_imagen']['size'];
            if ( ($name != '') && ($image > 0)) {

                if (
                    $_FILES['F_imagen']['type'] == "image/jpg" ||
                    $_FILES['F_imagen']['type'] == "image/jpeg" ||
                    $_FILES['F_imagen']['type'] == "image/png" ||
                    $_FILES['F_imagen']['type'] == "image/jpeg"
                )
                {
                    $id_region= $_POST['F_id_region'];
                    $id_tipo_elemental= $_POST['F_id_tipo_elemental'];
                    if ( ($_POST['F_id_tipo_elemental2'] == "NADA") || (strcmp($_POST['F_id_tipo_elemental2'], $id_tipo_elemental) === 0) )
                        $id_tipo_elemental2= null;
                    else
                        $id_tipo_elemental2= null;
                    $success =  $this->model->updatePokemon($id_region, $name, $_FILES['F_imagen']['tmp_name'], $id_tipo_elemental, $id_tipo_elemental2,$id_pokemonViejo);
                    if ($success)
                        header("Location: " . BASE_URL . 'dexter/1');
                else
                        header("Location: " . BASE_URL . 'editarPokemon/'.$id_pokemonViejo);
                }
                else
                    header("Location: " . BASE_URL . 'editarPokemon/'.$id_pokemonViejo);
            }
            else
                header("Location: " . BASE_URL . 'home');
        }
        else
            header('Location: ' . BASE_URL . "home");
        
    }

    public function deletePokemon($id_pokemon) {
        if (AuthHelper::isAdmin())
        { 
            $this->model->deletePokemon($id_pokemon);
            header("Location: " . BASE_URL . 'dexter/1');
        }
        else
            header('Location: ' . BASE_URL . "home");
    }
}