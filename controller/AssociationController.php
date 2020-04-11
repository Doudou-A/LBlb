<?php

spl_autoload_register(function ($class_name) {
    include 'model/' . $class_name . '.php';
}); 

class AssociationController
{

    public function creerAssociation()
    {
        $manager = new AssociationManager();

        $associations = new Association([
            'gid' => $_POST['gid'],
            'uid' => $_POST['uid'],
        ]);

        $manager->add($associations);

        header("Location: /index.php?action=creerAssociationView");
        exit;
    }

    public function creerAssociationView()
    {
        $managerg = new GroupeManager;
        $manageru = new UserManager;

        $groupes = $managerg->getGroupes();
        $users = $manageru->getUsers();
        
        require('view/creerAssociationView.php');
    }
}
