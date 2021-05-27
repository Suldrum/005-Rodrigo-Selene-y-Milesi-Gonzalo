<?php

include_once('views/UserView.php');
include_once('models/UserModel.php');
include_once('helpers/auth.helper.php');

class UserController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new UserModel();
        $this->view = new UserView();
    }

    public function showLogin() {
        $this->view->showLogin();
    }

    public function showPerfil() {
        $this->view->showPerfil();
    }

    public function showRegistro() {
        $this->view->showRegistro();
    }    

    public function registrar() {
        $user = $_POST['F_apodo'];
        $name= $_POST['F_nombre'];
        $lastName= $_POST['F_apellido'];
        $email= $_POST['F_email'];
        $pass = $_POST['F_contraseña'];
        $this->model->add($name, $lastName, $user, $email, $pass);
        header("Location: " . BASE_URL . 'home');
    }

    public function verify() {
        if(!empty($_POST['F_email']) && !empty($_POST['F_contraseña'])) {
            $user = $_POST['F_email'];
            $pass = $_POST['F_contraseña'];
            $userDb = $this->model->getUserByUsername($user);
            if (!empty($userDb) && password_verify($pass, $userDb->contraseña))
            {
                AuthHelper::login($userDb);
                header('Location: ' . BASE_URL . "home");
            } else 
                $this->view->showLogin("Login incorrecto, password o usuario incorrecto");
        } else {
            $this->view->showLogin("Login incompleto");
        }
    }

    public function logout() {
        AuthHelper::logout();
        header("Location: " . BASE_URL . 'home');
    }

}