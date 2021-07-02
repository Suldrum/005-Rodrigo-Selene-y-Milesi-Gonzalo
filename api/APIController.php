<?php

require_once 'api/APIView.php';
//poner modelo de comentario y cualquier modelo necesario

class APIController {

    private $model;
    private $view;

    public function __construct() {
        $this->model =  new TaskModel();
        $this->view = new APIView();
    }

    private function getData() {
        return json_decode($this->data);
    }

     //AGREGAR UN COMENTARIO
    public function addComment($product = []){
        $comment = json_decode(file_get_contents("php://input"));
            $success = $this->model->addComment($comment->id_product, $comment->user, $comment->text, $comment->score);
            
            if($success)
                $this->view->response($comments, 200);
            else{
                $this->view->response(null, 404);
            }
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

        //ELIMINA UN COMENTARIO
        public function deleteComment($params = []){
            $comment = $params[':ID'];
            $success = $this->model->deleteComment($comment);
    
            if($success)
                $this->view->response(true, 200);
            else{
                $this->view->response(false, 404);
            }
        }
    }

}
