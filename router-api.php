<?php
require_once 'libs/Router.php';
require_once 'api/APIController.php';

// crea el router
$router = new Router();

// tabla de ruteo
//$router->addRoute('recurso', 'verbo', 'controlador', 'funcion');
/*
$router->addRoute('dexter', 'GET', 'APIController', 'getAll');
$router->addRoute('pokemon/:ID', 'GET', 'APIController', 'getPokemon');
*/
// obtener comentarios de un pokemon.
$router->addRoute('comments/:ID', 'GET', 'APIController', 'getPokemonComments');
// postear un comentario.
$router->addRoute('comment', 'POST', 'APIController', 'newPokemonComment');
// borrar un comentario.
$router->addRoute('comment/:ID', 'DELETE', 'APIController', 'deletePokemonComment');

// rutea
$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);



