<?php

require_once('View.php');

class AdminView extends View {

    public function __construct() {
        parent::__construct();
    }

    public function showLogin($error=null) {
        $this->getSmarty()->assign('title', "Login");
        $this->getSmarty()->assign('error', $error);        
        $this->getSmarty()->assign('home', BASE_URL.'home');
        $this->getSmarty()->display('templates/loginAdmin.tpl');
    }

    public function showRegistro($error=null) {
        $this->getSmarty()->assign('title', "Registro");
        $this->getSmarty()->assign('error', $error);        
        $this->getSmarty()->assign('home', BASE_URL.'home');
        $this->getSmarty()->display('templates/registroAdmin.tpl');
    }  
/*
    public function showPerfilUsuario($userData) {
        $this->getSmarty()->assign('title', "Perfil");
        $this->getSmarty()->assign('error',null);        
        $this->getSmarty()->assign('home', BASE_URL.'home');
        $this->getSmarty()->assign('usuarioDatos',$userData);
        $this->getSmarty()->display('templates/perfilUsuario.tpl');
    }
*/
}