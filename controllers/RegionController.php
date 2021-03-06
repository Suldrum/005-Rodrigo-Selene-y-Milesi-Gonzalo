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
        if (AuthHelper::isAdmin())
        { 
            $this->view->showCrearRegion();
        }
        else
            header('Location: ' . BASE_URL . "home");
    }

    public function showActualizarRegion($id_region) {
        if (AuthHelper::isAdmin())
        { 
            $region =  $this->model->getRegion($id_region);
            $this->view->showActualizarRegion($region);
        }
        else
            header('Location: ' . BASE_URL . "home");
    }

    public function createRegion() {
        if (AuthHelper::isAdmin())
        { 
            $name= $_POST['F_nombre'];
            $image= $_FILES['F_imagen']['size'];
            if ( ($name != '') && ($image > 0))
            {
                if (
                    $_FILES['F_imagen']['type'] == "image/jpg" ||
                    $_FILES['F_imagen']['type'] == "image/jpeg" ||
                    $_FILES['F_imagen']['type'] == "image/png" ||
                    $_FILES['F_imagen']['type'] == "image/jpeg"
                )
                {
                    $success = $this->model->newRegion($name, $_FILES['F_imagen']['tmp_name']);
                    if ($success)
                        header("Location: " . BASE_URL . 'regiones');
                    else
                        header("Location: " . BASE_URL . 'crearRegion');
                }else
                    header("Location: " . BASE_URL . 'crearRegion');
            }
            else
                header("Location: " . BASE_URL . 'home');
        }
        else
            header('Location: ' . BASE_URL . "home");
    }

    public function editRegion($id_region) {  
        if (AuthHelper::isAdmin())
        { 
            $name= $_POST['F_nombre'];
            $image= $_FILES['F_imagen']['size'];
            if ( ($name != '') && ($image > 0))
            {
                if (
                    $_FILES['F_imagen']['type'] == "image/jpg" ||
                    $_FILES['F_imagen']['type'] == "image/jpeg" ||
                    $_FILES['F_imagen']['type'] == "image/png" ||
                    $_FILES['F_imagen']['type'] == "image/jpeg"
                )
                {
                    $success = $this->model->updateRegion($name, $_FILES['F_imagen']['tmp_name'], $id_region);
                    if ($success)
                        header("Location: " . BASE_URL . 'regiones');
                    else
                        header("Location: " . BASE_URL . 'editarRegion/'.$id_region);
                }else
                    header("Location: " . BASE_URL . 'editarRegion/'.$id_region);
            }
            else
                header("Location: " . BASE_URL . 'home');
        }
        else
            header('Location: ' . BASE_URL . "home");
        
    }

    public function deleteRegion($id_region) {
        if (AuthHelper::isAdmin())
        { 
            $this->model->deleteRegion($id_region);
            header("Location: " . BASE_URL . 'regiones');
        }
        else
            header('Location: ' . BASE_URL . "home");
    }
}