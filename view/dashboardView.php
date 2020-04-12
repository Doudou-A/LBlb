<?php 
ob_start();
session_start(); ?>

<?php if (isset($_SESSION['prenom'])) {?>
	<h3><?= $_SESSION['role']?> <?=$_SESSION['nom']?> <?=$_SESSION['prenom']?></h3>;
<?php } ?>

<a class="btn my-2 my-sm-0 text-success" href="index.php?action=projetAll">ّProjet</a>
<a class="btn my-2 my-sm-0 text-success" href="index.php?action=groupeAll">Groupe</a>
<a class="btn my-2 my-sm-0 text-success" href="index.php?action=demandeVue">Demande</a>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>