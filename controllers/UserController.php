<?php

include_once('views/UserView.php');
include_once('models/UserModel.php');

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

    public function showRegistro() {
        $this->view->showRegistro();
    }    

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

    public function logout() {
        AuthHelper::logout();
        header("Location: " . BASE_URL . 'home');
    }

}