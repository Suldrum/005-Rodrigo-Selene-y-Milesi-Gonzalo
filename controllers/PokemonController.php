<?php

include_once('views/PokemonView.php');
include_once('models/ModelPokemon.php');

class PokemonController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new ModelPokemon();
        $this->view = new PokemonView();
    }

    public function showCrearPokemon() {
        $this->view->showCrearPokemon();
    }

    public function showActualizarPokemon($id_pokemon) {
        $pokemon =  $this->model->getPokemon($id_pokemon);
        $this->view->showActualizarPokemon($pokemon);
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
        $name= $_POST['F_nombre'];
        $image= $_POST['F_imagen'];
        $this->model->newPokemon($name, $image);
        header("Location: " . BASE_URL . 'home');
    }

    public function editPokemon($id_region) {
        $name= $_POST['F_nombre'];
        $image= $_POST['F_imagen'];
        $this->model->updateRegion($name, $image, $id_region);
        header("Location: " . BASE_URL . 'home');
    }

    public function deletePokemon($id_region) {
        //PONER IF DE "ESTAS SEGURO?"
        $this->model->deleteRegion($id_region);
        header("Location: " . BASE_URL . 'home');
    }

}