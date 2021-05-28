<?php

include_once('views/AdminView.php');
include_once('models/AdminModel.php');
include_once('helpers/auth.helper.php');

class AdminController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new AdminModel();
        $this->view = new AdminView();
    }

    public function showLogin() {
        $this->view->showLogin();
    }

    public function showRegistro() {
        $this->view->showRegistro();
    }    

    public function registrar() {
        $name= $_POST['F_nombre'];
        $lastName= $_POST['F_apellido'];
        $email= $_POST['F_email'];
        $pass = $_POST['F_contraseña'];
        $this->model->add($name, $lastName, $email, $pass);
        header("Location: " . BASE_URL . 'home');
    }

    public function verifyAdmin() {
        if(!empty($_POST['F_email']) && !empty($_POST['F_contraseña'])) {
            $admin = $_POST['F_email'];
            $pass = $_POST['F_contraseña'];
            $adminDb = $this->model->getAdminByUsername($admin);
            if (!empty($adminDb) && password_verify($pass, $adminDb->contraseña))
            {
                AuthHelper::loginAdmin($adminDb);
                header('Location: ' . BASE_URL . "home");
            } else 
                $this->view->showLogin("Login incorrecto, password o administrador incorrecto");
        } else {
            $this->view->showLogin("Login incompleto");
        }
    }

    public function logout() {
        AuthHelper::logout();
        header("Location: " . BASE_URL . 'home');
    }

}