<?php

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


require_once('controllers/ControlaTemplates.php');
require_once('controllers/UserController.php');
require_once('controllers/TipoElementalController.php');
require_once('controllers/PokemonController.php');
require_once('controllers/RegionController.php');
require_once('controllers/AdminController.php');

if ($_GET['action'] == '')
	$_GET['action'] = 'home';

$urlParts = explode('/', $_GET['action']);
$ControlaTemplates = new ControlaTemplates();
$userController = new UserController();
$adminController = new AdminController();

switch ($urlParts[0]) {
	case 'home':
		$ControlaTemplates->showHome();
		break;
	case 'dexter':
		$ControlaTemplates->showPokedex();
		break;
	case 'login':
		$userController->showLogin();
		break;
	case 'verify':
		$userController->verify();
		break;	
	case 'registro':
		$userController->showRegistro();
		break;
	case 'registrar':
		$userController->registrar();
		break;
	case "logout":
		$userController->logout();
		break;
	case "perfilUsuario":
		$userController->showperfilUsuario();
		break;
//ZONA DE ADMINISTRADORES
 	case 'loginAdmin':
		$adminController->showLogin();
		break;
	case 'verifyAdmin':
		$adminController->verifyAdmin();
		break;	
	case 'registroAdmin':
		$adminController->showRegistro();
		break;
	case 'registrarAdmin':
		$adminController->registrar();
		break;

	
//ZONA DE ADMINISTRACION DE CATEGORIAS
/*
	case "crearPokemon":
		$ControlaTemplates->FUNCION ();
		break;
	case "editarPokemon":
		$ControlaTemplates->FUNCION ();
		break;
	case "eliminarPokemon":
		$ControlaTemplates->FUNCION ();
		break;
	case "crearRegion":
		$ControlaTemplates->FUNCION ();
		break;
	case "editarRegion":
		$ControlaTemplates->FUNCION ();
		break;
	case "eliminarRegion":
		$ControlaTemplates->FUNCION ();
		break;
	case "crearTipoElemental":
		$ControlaTemplates->FUNCION ();
		break;
	case "editarTipoElemental":
		$ControlaTemplates->FUNCION ();
		break;
	case "eliminarTipoElemental":
		$ControlaTemplates->FUNCION ();
		break;
*/
	default:
		echo '<h1>Error 404 - Page not found </h1>';
		break;
}