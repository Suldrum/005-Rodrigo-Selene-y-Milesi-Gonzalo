<?php

require_once('View.php');

class AdminView extends View {

    public function __construct() {
        parent::__construct();
    }

    public function showLogin($error=null) {
        $this->getSmarty()->assign('title', "Login de Administrador");
        $this->getSmarty()->assign('error', $error);        
        $this->getSmarty()->assign('home', BASE_URL.'home');
        $this->getSmarty()->display('templates/loginAdmin.tpl');
    }

    public function showRegistro($error=null) {
        $this->getSmarty()->assign('title', "Registro de Administrador");
        $this->getSmarty()->assign('error', $error);        
        $this->getSmarty()->assign('home', BASE_URL.'home');
        $this->getSmarty()->display('templates/registroAdmin.tpl');
    }  
}