<?php

//Autoloader
spl_autoload_register(function ($class_name) {
	include 'controller/' . $class_name . '.php';
});

//Routeur
try {
	$controller = new TestController;
	if (!empty($_GET['action'])) {
		$action = $_GET['action'];
		if (method_exists($controller, $action)) {
		$controller->$action();
		}
	} else {
		$controller->index();
	}
} catch (Exeption $e) {
	die('Erreur : ' . $e->getMessage());
}
