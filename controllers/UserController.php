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

    public function showPerfilUsuario() {
        $authHelper = new AuthHelper();
        $userData = $authHelper->getAlltUserData();
        $this->view->showPerfilUsuario($userData);
    }

    public function showRegistro() {
        $this->view->showRegistro();
    }    

    public function registrar() {
        $name= $_POST['F_nombre'];
        $lastName= $_POST['F_apellido'];
        $email= $_POST['F_email'];
        $pass = $_POST['F_contraseña'];
        $existe = $this->model->getUserByUsername($email);
        if ( $existe == null)
        {
            $this->model->add($name, $lastName, $email, $pass);
            $userDb = $this->model->getUserByUsername($email);
            AuthHelper::login($userDb);
            header("Location: " . BASE_URL . 'home');
        }
        else{
            header("Location: " . BASE_URL . 'registro');
            //el eco no anda pero si esta andando bien el else so me doy por satisfecha de momento
            echo "El email ya existe, por favor ingrese otro";
        }
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

    function showUsuarios() {
        if (AuthHelper::isAdmin())
       { 
           $listaUsuarios = $this->model->getAll();
           $this->view->showUsuarios($listaUsuarios);
       }
       else
           header('Location: ' . BASE_URL . "home");
    }  
  

    function bajaAdmin($id)
    {  
        $admins = $this->model->countAdmin();
        if ($admins->total > 1){
            $this->model->bajaAdmin($id);
            header("Location: " . BASE_URL . 'usuarios');
        }else{
            header("Location: " . BASE_URL . 'usuarios');
        }
    }

    function altaAdmin($id)
    {
        $this->model->altaAdmin($id);
        header("Location: " . BASE_URL . 'usuarios');
    }
    function deleteUser($id)
    {   
        $usuarioABorrar = $this->model->getUserByID($id);
        if ($usuarioABorrar->administrador == 0){
            $this->model->deleteUser($id);
            header("Location: " . BASE_URL . 'usuarios');
        }else{
                $admins = $this->model->countAdmin();
                if ($admins->total > 1){
                    $this->model->deleteUser($id);
                    header("Location: " . BASE_URL . 'usuarios');
                }else{
                    header("Location: " . BASE_URL . 'usuarios');
            }
        }
        
    }
}