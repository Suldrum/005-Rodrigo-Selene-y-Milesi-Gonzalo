<?php
require_once 'models/TaskModel.php';
require_once 'api/api.view.php';

class TaskApiController {

    private $model;
    private $view;
    private $data;

    public function __construct() {
        $this->model =  new TaskModel();
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }
    
    public function getTasks($params = []) {
        // obtengo las tareas
        $tareas = $this->model->getAll();
        
        // se las paso a la vista para que responda JSON
        $this->view->response($tareas, 200);
    }

    public function getTask($params = []) {
        // obtengo las tareas
        $idTarea = $params[':ID'];
        
        $tarea = $this->model->get($idTarea);
        
        if ($tarea) {
            $this->view->response($tarea, 200);
        } else
        {
            $this->view->response("No se encontro el id $idTarea", 400);
        }
        // se las paso a la vista para que responda JSON
        
    }    

    public function addTask($params = []) {
        
        $datos = $this->getData();
        
        $titulo = $datos->titulo;
        $prioridad = $datos->prioridad;
        $descripcion = $datos->descripcion;

        if ($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" 
            || $_FILES['input_name']['type'] == "image/png") {
                $this->model->new($titulo, $prioridad, $descripcion, $_FILES['input_name']['tmp_name']);
        } else {
            $this->model->new($titulo, $prioridad, $descripcion);
        }
        $this->view->response('', 200);
        
    }

}
