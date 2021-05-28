<?php

include_once('views/TipoElementalView.php');
include_once('models/ModelTipoElemental.php');

class TipoElementalController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new ModelTipoElemental();
        $this->view = new TipoElementalView();
    }

    public function showTiposElemental() {
        $listaTipoElemental =$this->model->getAll();
        $this->view->showTiposElemental($listaTipoElemental);
    }
    public function showCrearTipoElemental() {
        $this->view->showCrearTipoElemental();
    }

    public function showActualizarTipoElemental($id_tipo_elemental) {
        $tipo =  $this->model->getTipo_Elemental($id_tipo_elemental);
        $this->view->showActualizarTipoElemental($tipo);
    }

    public function createTipoElemental() {
        $name= $_POST['F_nombre'];
        $image= $_POST['F_imagen'];
        $this->model->newTipo_Elemental($name, $image);
        header("Location: " . BASE_URL . 'tablatipos');
    }

    public function editTipoElemental($id_region) {
        $name= $_POST['F_nombre'];
        $image= $_POST['F_imagen'];
        $this->model->updateTipo_Elemental($name, $image, $id_region);
        header("Location: " . BASE_URL . 'tablatipos');
    }

    public function deleteTipo_Elemental($id_tipo_elemental) {
        //PONER IF DE "ESTAS SEGURO?"
        $this->model->deleteTipo_Elemental($id_tipo_elemental);
        header("Location: " . BASE_URL . 'tablatipos');
    }

}