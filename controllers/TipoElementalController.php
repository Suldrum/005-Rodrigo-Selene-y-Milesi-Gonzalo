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
        if (AuthHelper::isAdmin())
        {
                $this->view->showCrearTipoElemental();
            }
            else
                header('Location: ' . BASE_URL . "home");
        }

        public function showActualizarTipoElemental($id_tipo_elemental) {
            if (AuthHelper::isAdmin())
            {
                $tipo =  $this->model->getTipo_Elemental($id_tipo_elemental);
                $this->view->showActualizarTipoElemental($tipo);
            }
            else
                header('Location: ' . BASE_URL . "home");
        }

        public function createTipoElemental() {
            if (AuthHelper::isAdmin())
            {
            $name= $_POST['F_nombre'];
            $image= $_FILES['F_imagen']['size'];
            if ( ($name != '') && ($image > 0))
            {
                if(
                    $_FILES['F_imagen']['type'] == "image/jpg" ||
                    $_FILES['F_imagen']['type'] == "image/jpeg" ||
                    $_FILES['F_imagen']['type'] == "image/png" ||
                    $_FILES['F_imagen']['type'] == "image/jpeg"
                    )
                {
                    $success = $this->model->newTipo_Elemental($name, $_FILES['F_imagen']['tmp_name']);
                    if ($success)
                        header("Location: " . BASE_URL . 'tablatipos');
                    else
                        header("Location: " . BASE_URL . 'crearTipoElemental');
                    }
                else
                    header("Location: " . BASE_URL . 'crearTipoElemental');
            }
            else
                header("Location: " . BASE_URL . 'home');
        }
        else
            header('Location: ' . BASE_URL . "home");
    }

    public function editTipoElemental($id_tipo_elemental) {
        if (AuthHelper::isAdmin())
        {
            $name= $_POST['F_nombre'];
            $image= $_FILES['F_imagen']['size'];
            if ( ($name != '') && ($image > 0))
            {
                if(
                    $_FILES['F_imagen']['type'] == "image/jpg" ||
                    $_FILES['F_imagen']['type'] == "image/jpeg" ||
                    $_FILES['F_imagen']['type'] == "image/png" ||
                    $_FILES['F_imagen']['type'] == "image/jpeg"
                    )
                {
                    $success = $this->model->updateTipo_Elemental($name, $_FILES['F_imagen']['tmp_name'], $id_tipo_elemental);
                    if ($success)
                        header("Location: " . BASE_URL . 'tablatipos');
                    else
                        header("Location: " . BASE_URL . 'editarTipoElemental/'.$id_tipo_elemental);
                    }
                else
                    header("Location: " . BASE_URL . 'editarTipoElemental/'.$id_tipo_elemental);
            }
            else
                header("Location: " . BASE_URL . 'home');
        }
        else
            header('Location: ' . BASE_URL . "home");
    }

    public function deleteTipo_Elemental($id_tipo_elemental) {
        if (AuthHelper::isAdmin())
            {
            $this->model->deleteTipo_Elemental($id_tipo_elemental);
            header("Location: " . BASE_URL . 'tablatipos');
        }
        else
            header('Location: ' . BASE_URL . "home");
    }

}