<?php

require_once('View.php');

class RegionView extends View {

    public function __construct() {
        parent::__construct();
    }

    public function showRegiones($listaRegiones) {
        $this->getSmarty()->assign('title', "Regiones");
        $this->getSmarty()->assign('error', null);     
        $this->getSmarty()->assign('listaRegiones',$listaRegiones);   
        $this->getSmarty()->assign('home', BASE_URL.'home');
        $this->getSmarty()->display('templates/regiones.tpl');
    }

    public function showActualizarRegion($region) {
        $this->getSmarty()->assign('regionActual',$region);  
        $this->getSmarty()->display('templates/regionActualizar.tpl');
    }

    public function showCrearRegion() {
        $this->getSmarty()->assign('title', "Crear Region");
        $this->getSmarty()->assign('error', null);     
        $this->getSmarty()->assign('home', BASE_URL.'home');
        $this->getSmarty()->display('templates/regionNew.tpl');
    }
}