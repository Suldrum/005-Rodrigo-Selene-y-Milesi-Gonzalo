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
/*
    public function registrar() {
        $user = $_POST['username'];
        $name= $_POST['name'];
        $lastName= $_POST['lastName'];
        $email= $_POST['email'];
        $pass = $_POST['password'];
        $this->model->add($name, $lastName, $username, $email, $pass);
        header("Location: " . BASE_URL . 'home');
    }

    public function verify() {
        if(!empty($_POST['username']) && !empty($_POST['password'])) {
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $userDb = $this->model->getUserByUsername($user);

            if (!empty($userDb) && password_verify($pass, $userDb->password)) {
                AuthHelper::login($userDb);
                header('Location: ' . BASE_URL . "home");
            } else 
                $this->view->showLogin("Login incorrecto, password o usuario incorrecto");
        } else {
            $this->view->showLogin("Login incompleto");
        }
    }
*/
    public function createPokemon() {
        $id_pokemon= $_POST['F_id_pokemon'];
        $id_region= $_POST['F_id_region'];
        $name= $_POST['F_nombre'];
        $image= $_POST['F_imagen'];
        $id_tipo_elemental= $_POST['F_id_tipo_elemental'];
        $id_tipo_elemental2= $_POST['F_id_tipo_elemental2'];
        $this->model->newPokemon($id_pokemon, $id_region, $name, $image, $id_tipo_elemental, $id_tipo_elemental2);
        header("Location: " . BASE_URL . 'home');
    }

    public function editPokemon($id_pokemonViejo) {
    //    $id_pokemon= $_POST['F_id_pokemon'];
        $id_region= $_POST['F_id_region'];
        $name= $_POST['F_nombre'];
        $image= $_POST['F_imagen'];
        $id_tipo_elemental= $_POST['F_id_tipo_elemental'];
        $id_tipo_elemental2= $_POST['F_id_tipo_elemental2'];
        $this->model->updatePokemon($id_region, $name, $image, $id_tipo_elemental, $id_tipo_elemental2,$id_pokemonViejo);
     //   header("Location: " . BASE_URL . 'home');
    }

    public function deletePokemon($id_region) {
        //PONER IF DE "ESTAS SEGURO?"
        $this->model->deletePokemon($id_region);
        header("Location: " . BASE_URL . 'home');
    }

}