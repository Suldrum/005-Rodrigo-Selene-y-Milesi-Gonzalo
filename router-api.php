<?php
require_once 'libs/Router.php';
require_once 'api/APIController.php';

// crea el router
$router = new Router();

// tabla de ruteo
//$router->addRoute('recurso', 'verbo', 'controlador', 'funcion');
$router->addRoute('pokemon', 'GET', 'APIController', 'getPokemons');
$router->addRoute('pokemon/:ID', 'GET', 'APIController', 'getPokemon');

// obtener comentarios de un pokemon.
$router->addRoute('comments/:ID', 'GET', 'APIController', 'getComments');
// postear un comentario.
$router->addRoute('comments', 'POST', 'APIController', 'addComentario');
// borrar un comentario.
$router->addRoute('comments/:ID', 'DELETE', 'APIController', 'deleteComment');

// obtener datos de un usuario (para autocompletar un formulario).
$router->addRoute('user/:ID', 'GET', 'apiController', 'getUser');

// rutea
$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);



