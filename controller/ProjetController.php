<?php

/* spl_autoload_register(function ($class_name) {
    include 'model/' . $class_name . '.php';
}); */
include 'model/ProjetManager.php';

class ProjetController
{

    public function ajouterProjet()
    {
        $manager = new ProjetManager();

        if ($_POST['dateDebut'] > $_POST['dateFin']) {
            header("Location: index.php?action=ajouterProjetView&error=1");
            exit;
        } else {
            $projets = new Projet([
                'titre' => $_POST['titre'],
                'description' =>  $_POST['description'],
                'tailleGroupe' =>  $_POST['tailleGroupe'],
                'dateDebut' =>  $_POST['dateDebut'],
                'dateFin' =>  $_POST['dateFin'],
            ]);

            $manager->add($projets);

            header("Location: /index.php?action=projetGetView");
            exit;
        }
    }

    public function ajouterProjetView()
    {
        require('view/ajouterProjetView.php');
    }

    public function projetGetView()
    {
        require('view/projetGetView.php');
    }
}
