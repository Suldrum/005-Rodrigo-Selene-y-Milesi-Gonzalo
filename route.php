<?php

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


require_once('controllers/ControlaTemplates.php');
require_once('controllers/UserController.php');
require_once('controllers/TipoElementalController.php');
require_once('controllers/PokemonController.php');
require_once('controllers/RegionController.php');

if ($_GET['action'] == '')
	$_GET['action'] = 'home';

$urlParts = explode('/', $_GET['action']);
$ControlaTemplates = new ControlaTemplates();
$userController = new UserController();
$regionController = new RegionController();
$tipoController = new TipoElementalController();
$pokemonController = new PokemonController();

switch ($urlParts[0]) {
	case 'usuarios':
		$userController->showUsuarios();
		break;
	case 'home':
		$ControlaTemplates->showHome();
		break;
	case 'dexter':
		$ControlaTemplates->showPokedex($urlParts[1]);
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
		$userController->showPerfilUsuario();
		break;
	case "regiones":
		$regionController->showRegiones();
		break;
	case "verTarjetaPokemon":
		$ControlaTemplates->showTarjetaPokemon($urlParts[1]);
		break;
		
//ZONA DE FILTROS
	case "filtro":
		$ControlaTemplates->showPokedexFilter($urlParts[1]);
	break;

////////////// ZONA DE ADMINISTRACION DE USUARIOS ////////

case "bajaAdmin":
	$userController->bajaAdmin($urlParts[1]);
	break;
case "altaAdmin":
	$userController->altaAdmin($urlParts[1]);
	break;
case "eliminarUser":
	$userController->deleteUser($urlParts[1]);
	break;

////////////// ZONA DE ADMINISTRACION DE CATEGORIAS ////////
	
////// ADMINISTRACION DE POKEMON //////

	case "crearPokemon":
		$pokemonController->showCrearPokemon();
		break;
	case "createPokemon":
		$pokemonController->createPokemon();
		break;
	case "editarPokemon":
		$pokemonController->showActualizarPokemon($urlParts[1]);
		break;
	case "editPokemon":
		$pokemonController->editPokemon($urlParts[1]);
		break;
	case "eliminarPokemon":
		$pokemonController->deletePokemon($urlParts[1]);
		break;


////// ADMINISTRACION DE REGION //////
	case "crearRegion":
		$regionController->showCrearRegion();
		break;
	case "createRegion":
		$regionController->createRegion();
		break;
	case "editarRegion":
		$regionController->showActualizarRegion($urlParts[1]);
		break;
	case "editRegion":
		$regionController->editRegion($urlParts[1]);
		break;
	case "eliminarRegion":
		$regionController->deleteRegion($urlParts[1]);
		break;

////// ADMINISTRACION DE TIPO_ELEMENTAL //////
	case "tablatipos":
		$tipoController->showTiposElemental();
		break;	
	case "crearTipoElemental":
		$tipoController->showCrearTipoElemental();
		break;
	case "createTipoElemental":
		$tipoController->createTipoElemental();
		break;
	case "editarTipoElemental":
		$tipoController->showActualizarTipoElemental($urlParts[1]);
		break;
	case "editTipoElemental":
		$tipoController->editTipoElemental($urlParts[1]);
		break;
	case "eliminarTipoElemental":
		$tipoController->deleteTipo_Elemental($urlParts[1]);
		break;
////////////// FIN ZONA DE ADMINISTRACION DE CATEGORIAS ////////

	default:
		echo '<h1>Error 404 - Page not found </h1>';
		break;
}