<?php

//Autoloader
/* spl_autoload_register(function ($class_name) {
	include 'controller/' . $class_name . '.php';
});
 */

include 'controller/SecurityController.php';
include 'controller/ProjetController.php';
include 'controller/GroupeController.php';
//Routeur
try {
	$controllerFirst = new SecurityController;
	$controllerSecond = new ProjetController;
	$controllerThird = new GroupeController;
	if (!empty($_GET['action'])) {
		$action = $_GET['action'];
		if (method_exists($controllerFirst, $action)) {
            $controllerFirst->$action();
        } elseif (method_exists($controllerSecond, $action)) {
			$controllerSecond->$action();
		} elseif (method_exists($controllerThird, $action)) {
			$controllerThird->$action();
		}
	} else {
		$controllerFirst->index();
	}
} catch (Exeption $e) {
	die('Erreur : ' . $e->getMessage());
}