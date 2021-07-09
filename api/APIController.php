<?php
require_once 'models/ModelComentario.php';
require_once 'api/APIView.php';

class ApiController {

    private $model;
    private $view;

    public function __construct() {
        $this->model =  new ModelComentario();
        $this->view = new APIView();
    }
/*    

    public function newComment($params = []) {
        
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
  */

  /**
     *  obtener comentarios de un pokemon
     */


    public function getPokemonComments($params = [])
    { 

        if (!empty($params)) {
            $id_pokemon = $params[':ID'];
            $listComment = $this->model->getPokemonComments($id_pokemon);
           
            if ($listComment)
                $this->view->response($listComment, 200);
            else
                $this->view->response("Sin comentarios", 200);     
        }
       /* 
        else
        
           $this->view->response(null, 404);
        */
    } 

    /**
     *  borrar un comentario
     */
    public function deletePokemonComment($params = [])
    {
        if (!empty($params)) {
            $id = $params[':ID'];
            $result = $this->model->getComment($id);
            if (!empty($result)) {
                $this->model->deleteComment($id);
                $this->view->response($result, 200);
            }
            else {
                $this->view->response('El comentario no existe :(', 404);
            }
        }
        else {
            $this->view->response(false, 404);
        }
    }

      /**
     *  dejar un comentario de un pokemon
     */
    public function newPokemonComment()
    {
        $params = json_decode(file_get_contents("php://input"));
        $result = $this->model->newPokemonComment($params->id_fk_pokemon, $params->id_fk_usuario, $params->calificacion, $params->texto);
        if ($result)
            $this->view->response($result, 200);
        else
            $this->view->response(null, 200);
    }
}
