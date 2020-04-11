<?php

spl_autoload_register(function ($class_name) {
    include 'model/' . $class_name . '.php';
}); 

class DemandeController
{

    public function creerDemande()
    {
        $manager = new DemandeManager();

        $demande = new Demande([
            'gid' => $_POST['gid'],
            'uid' => $_POST['uid'],
            'source' => $_POST['source'],
        ]);

        $manager->add($demande);

        header("Location: /index.php?action=creerDemandeView");
        exit;
    }

    public function creerDemandeView()
    {
        $managerg = new GroupeManager;
        $manageru = new UserManager;

        $groupes = $managerg->getGroupes();
        $users = $manageru->getUsers();
        
        require('view/creerDemandeView.php');
    }
}
