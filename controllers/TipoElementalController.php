<?php

include_once('views/TipoElementalView.php');
include_once('models/ModelTipoElemental.php');

class TipoElementalController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new ModelTipoElemental();
        $this->view = new TipoElementalViewView();
    }

    public function showTipoElemental() {
        $listaTipoElemental =$this->model->getAll();
        $this->view->showTipoElemental($listaTipoElemental);
    }

    public function crearTipoElemental() {
        $number = $_POST['numero'];
        $name= $_POST['nombre'];
        $image= $_POST['imagen'];
        $this->model->newTipoElemental($number, $name, $image);
        header("Location: " . BASE_URL . 'home');
    }

    public function editarTipoElemental() {
        $number = $_POST['numero'];
        $name= $_POST['nombre'];
        $image= $_POST['imagen'];
        $this->model->updateTipoElemental($number, $name, $image);
        header("Location: " . BASE_URL . 'home');
    }

    public function eliminarTipoElemental() {
        $number = $_POST['numero'];
        $name= $_POST['nombre'];
        $image= $_POST['imagen'];
        $this->model->deleteTipoElemental($number, $name, $image);
        header("Location: " . BASE_URL . 'home');
    }

}