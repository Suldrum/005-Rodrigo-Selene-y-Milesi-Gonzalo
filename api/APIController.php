<?php
require_once 'models/ModelComentario.php';

include_once('models/UserModel.php');
include_once('models/ModelPokemon.php');
include_once('helpers/auth.helper.php');
require_once 'api/APIView.php';

class ApiController {

    private $model;
    private $view;
    private $modelUser;
    private $modelPokemon;

    public function __construct() {
        $this->model =  new ModelComentario();
        $this->view = new APIView();
        $this->modelUser =  new UserModel();
        $this->modelPokemon =  new ModelPokemon();
    }

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
        else
           $this->view->response(null, 404);

    } 

    /**
     *  borrar un comentario
     */
    public function deletePokemonComment($params = [])
    {
        $authHelper = new AuthHelper();
        $userLogged = $authHelper->getLoggedUserName();
        if  (   (!(is_null($userLogged))) && ($authHelper->isAdmin())    )
        {
            if (!empty($params)) {
                $id = $params[':ID'];
                $result = $this->model->getComment($id);
                if (!empty($result)) {
                    $result = $this->model->deleteComment($id);
                    $this->view->response($result, 200);
                }
                else {
                    $this->view->response(null, 500);
                }
            }
            else {
                $this->view->response(null, 404);
            }
        }else {
            $this->view->response(false, 404);
        }
    }

      /**
     *  dejar un comentario de un pokemon
     */
    public function newPokemonComment()
    {
        $params = json_decode(file_get_contents("php://input"));
        $pokemon = $this->modelPokemon->getPokemon($params->pokemon);
        
        // RECUPERA EL USUARIO ACTIVO
        $authHelper = new AuthHelper();
        $userLogged = $authHelper->getLoggedUserName();
        if  (   (!(is_null($pokemon))) && (!(is_null($userLogged)))    )
        {
            $user = $this->modelUser->getUserByUsername($userLogged);
            $result = $this->model->newPokemonComment($pokemon->id_pokemon, $user->ID, $params->calificacion, $params->texto);
            if ($result)
                $this->view->response($result, 200);
            else
                $this->view->response(null, 500);
        }
        else
            $this->view->response(null, 404);
    }
}
?>