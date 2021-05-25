<?php

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


require_once('controllers/ControlaTemplates.php');
require_once('controllers/UserController.php');

if ($_GET['action'] == '')
	$_GET['action'] = 'home';

$urlParts = explode('/', $_GET['action']);
$ControlaTemplates = new ControlaTemplates();
$userController = new UserController();

switch ($urlParts[0]) {
	case 'home':
		$ControlaTemplates->showHome();
		break;
	/*case 'home':
		$ControlaTemplates->showHome();
		break;	*/
	default:
		echo '<h1>Error 404 - Page not found </h1>';
		break;
}