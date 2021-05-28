<?php

require_once('View.php');

class TipoElementalView extends View {

    public function __construct() {
        parent::__construct();
    }

    public function showTiposElemental($listaTipoElemental) {
        $this->getSmarty()->assign('title', "Tipos Elementales");
        $this->getSmarty()->assign('error', null);
        $this->getSmarty()->assign('listaTipoElemental',$listaTipoElemental);        
        $this->getSmarty()->display('templates/tablatipos.tpl');
    }
    public function showActualizarTipoElemental($tipo) {
        $this->getSmarty()->assign('title', "Actualizar Tipo");
        $this->getSmarty()->assign('tipoActual',$tipo);  
        $this->getSmarty()->display('templates/tipoActualizar.tpl');
    }

    public function showCrearTipoElemental() {
        $this->getSmarty()->assign('title', "Crear Tipo");
        $this->getSmarty()->assign('error', null);     
        $this->getSmarty()->assign('home', BASE_URL.'home');
        $this->getSmarty()->display('templates/tipoNew.tpl');
    }
}