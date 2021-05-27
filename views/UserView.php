<?php

require_once('View.php');

class UserView extends View {

    public function __construct() {
        parent::__construct();
/*
        $authHelper = new AuthHelper();
        $username = $authHelper->getLoggedUserName();
        $this->getSmarty()->assign('username', $username);
*/
    }

    public function showLogin($error=null) {
        $this->getSmarty()->assign('title', "Login");
        $this->getSmarty()->assign('error', $error);        
        $this->getSmarty()->assign('home', BASE_URL.'home');
        $this->getSmarty()->display('templates/login.tpl');
    }

    public function showRegistro($error=null) {
        $this->getSmarty()->assign('title', "Registro");
        $this->getSmarty()->assign('error', $error);        
        $this->getSmarty()->assign('home', BASE_URL.'home');
        $this->getSmarty()->display('templates/registro.tpl');
    }  
  /*  
    public function showPerfilUsuario($error=null) {
        $this->getSmarty()->assign('title', "Perfil");
        $this->getSmarty()->assign('error', $error);        
        $this->getSmarty()->assign('home', BASE_URL.'home');
        $this->getSmarty()->display('templates/perfilUsuario.tpl');
    }
    */
}