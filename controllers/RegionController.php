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

    public function crearRegion() {
        $number = $_POST['numero'];
        $name= $_POST['nombre'];
        $image= $_POST['imagen'];
        $this->model->newRegion($number, $name, $image);
        header("Location: " . BASE_URL . 'home');
    }

    public function editarRegion() {
        $number = $_POST['numero'];
        $name= $_POST['nombre'];
        $image= $_POST['imagen'];
        $this->model->updateRegion($number, $name, $image);
        header("Location: " . BASE_URL . 'home');
    }

    public function eliminarRegion() {
        $number = $_POST['numero'];
        $name= $_POST['nombre'];
        $image= $_POST['imagen'];
        $this->model->deleteRegion($number, $name, $image);
        header("Location: " . BASE_URL . 'home');
    }
}