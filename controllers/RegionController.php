<?php

include_once('views/RegionView.php');
include_once('models/ModelRegion.php');

class RegionController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new ModelRegion();
        $this->view = new RegionView();
    }

    public function showRegiones() {
        $listaRegiones =$this->model->getAll();
        $this->view->showRegiones($listaRegiones);
    }

    public function showCrearRegion() {
        $this->view->showCrearRegion();
    }

    public function showActualizarRegion($id_region) {
        $region =  $this->model->getRegion($id_region);
        $this->view->showActualizarRegion($region);
    }

    public function createRegion() {
        if (!empty($_POST['F_nombre']) && !empty($_POST['F_imagen'])) {
            $name= $_POST['F_nombre'];
            $image= $_POST['F_imagen'];
            $this->model->newRegion($name, $image);
            header("Location: " . BASE_URL . 'regiones');
        }else {
            header("Location: " . BASE_URL . 'createRegion');
        }
    }

    public function editRegion($id_region) {  
        if (!empty($_POST['F_nombre']) && !empty($_POST['F_imagen'])) {
            $name= $_POST['F_nombre'];
            $image= $_POST['F_imagen'];
            $this->model->updateRegion($name, $image, $id_region);
            header("Location: " . BASE_URL . 'regiones');
        }else {
            header("Location: " . BASE_URL . 'editarRegion/'.$id_region);
        }
        
    }

    public function deleteRegion($id_region) {
        //PONER IF DE "ESTAS SEGURO?"
        $this->model->deleteRegion($id_region);
        header("Location: " . BASE_URL . 'regiones');
    }
}