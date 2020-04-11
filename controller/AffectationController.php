<?php

spl_autoload_register(function ($class_name) {
    include 'model/' . $class_name . '.php';
}); 

class AffectationController
{

    public function creerAffectation()
    {
        $manager = new AffectationManager();

        $affectation = new Affectation([
            'gid' => $_POST['gid'],
            'cid' => $_POST['cid'],
        ]);

        $manager->add($affectation);

        header("Location: /index.php?action=creerAffectationView");
        exit;
    }

    public function creerAffectationView()
    {
        $managerg = new GroupeManager;
        $managerc = new ChoixManager;

        $groupes = $managerg->getGroupes();
        $aChoix = $managerc->getChoix();

        require('view/creerAffectationView.php');
    }
}
