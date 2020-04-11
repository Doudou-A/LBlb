<?php

spl_autoload_register(function ($class_name) {
    include 'model/' . $class_name . '.php';
}); 

class GroupeController
{

    public function ajouterGroupe()
    {
        $manager = new GroupeManager();

        $groupes = new Groupe([
            'pid' => $_POST['pid'],
        ]);

        $manager->add($groupes);

        header("Location: /index.php?action=ajouterGroupeView");
        exit;
    }

    public function ajouterGroupeView()
    {
        $manager = new ProjetManager;

        $projets = $manager->getProjets();

        require('view/ajouterGroupeView.php');
    }
}
