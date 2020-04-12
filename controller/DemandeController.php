<?php

spl_autoload_register(function ($class_name) {
    include 'model/' . $class_name . '.php';
});

class DemandeController
{

    public function demandeVue()
	{
		$manager = new demandeManager();

		$demandes = $manager->getDemandes();

		require('view/demandeAllView.php');
    }
    
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

    public function demandeModifier()
    {
        session_start();

        $manager = new DemandeManager();

        if ($_SESSION['role'] != 'admin') {
            header("Location: index.php?action=demandeModifierView&id=" . $_GET['id'] . "&error=1");
            exit;
        } else {
            $demande = new Demande([
                'gid' => $_GET['id'],
                'uid' => $_POST['uid'],
                'source' =>  $_POST['source']
            ]);

            $manager->update($demande);

            header("Location: index.php?action=demandeVue");
            exit;
        }
    }

    public function demandeModifierView()
    {
        session_start();
        if (!empty($_GET['id'])) {

            $manager = new demandeManager();

            $demande = $manager->get($_GET['id']);

            if ($_SESSION['uid'] == $demande->uid() || $_SESSION['role'] == 'admin') {

                $updateGid = $demande->gid();
                $updateUid = $demande->uid();
                $updateSource = $demande->source();

                $managerg = new GroupeManager();
                $groupe = $managerg->get($updateGid);
                $groupes = $managerg->getGroupes();

                $managerp = new UserManager();
                $user = $managerp->get($updateUid);
                $users = $managerp->getUsers();


                require('view/demandeModifierView.php');
            }
        } else {
            throw new Exception("Error Processing Request");
        }
    }

    public function demandeSuppr()
	{
		session_start();

		if (!empty($_GET['id']) && !empty($_SESSION['prenom']) && $_SESSION['role'] == 'admin') 
		{
			$manager = new DemandeManager();

			$id = $_GET['id'];

			$demande = $manager->get($id);
			$manager->delete($demande);

			header("Location: index.php?action=demandeVue");
			exit;
		}
		else
		{
			header("Location: index.php");
			exit;
        }
    }
}
