<?php

spl_autoload_register(function ($class_name) {
    include 'model/' . $class_name . '.php';
}); 

class ChoixController
{

    public function ajouterChoix()
    {
        $manager = new ChoixManager();

        $choix = new Choix([
            'nom' => $_POST['nom'],
            'pid' => $_POST['pid'],
        ]);

        $manager->add($choix);

        header("Location: /index.php?action=ajouterChoixView");
        exit;
    }

    public function ajouterChoixView()
    {
        $manager = new ProjetManager;

        $projets = $manager->getProjets();
        
        require('view/ajouterChoixView.php');
    }
}
