<?php ob_start(); ?>
<?php if (isset($_SESSION['prenom'])) {?>
	<h3><?= $_SESSION['role']?> <?=$_SESSION['nom']?> <?=$_SESSION['prenom']?></h3>;
<?php } ?>

<a class="btn my-2 my-sm-0 text-success" href="index.php?action=inscriptionView">ّInscription</a>
<a class="btn my-2 my-sm-0 text-success" href="index.php?action=connexionView">connexion</a>
<a class="btn my-2 my-sm-0 text-success" href="index.php?action=destroy">deconnexion</a>
<a class="btn my-2 my-sm-0 text-success" href="index.php?action=ajouterProjetView">Créer un projet</a>
<a class="btn my-2 my-sm-0 text-success" href="index.php?action=ajouterGroupeView">Ajouter un groupe</a>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>