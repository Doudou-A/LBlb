<?php

spl_autoload_register(function ($class_name) {
    include 'model/' . $class_name . '.php';
});

class TestController 
{

	//Page d'Accueil
	public function index()
	{
		require('view/indexView.php');
    }
    
    public function test()
	{
		require('view/testView.php');
	}
}