<?php

require_once('View.php');

class TipoElementalView extends View {

    public function __construct() {
        parent::__construct();
    }

    public function showTiposElemental() {
        $this->getSmarty()->assign('title', "Regiones");
        $this->getSmarty()->assign('error', $error);        
        $this->getSmarty()->assign('home', BASE_URL.'home');
        $this->getSmarty()->display('templates/tablatipos.tpl');
    }
}