<?php 
ob_start(); ?>

<?php if (isset($_SESSION['prenom'])) {?>
	<h3><?= $_SESSION['role']?> <?=$_SESSION['nom']?> <?=$_SESSION['prenom']?></h3>;
<?php } ?>

<a class="btn my-2 my-sm-0 text-success" href="index.php?action=inscriptionView">ّInscription</a>
<a class="btn my-2 my-sm-0 text-success" href="index.php?action=connexionView">connexion</a>
<a class="btn my-2 my-sm-0 text-success" href="index.php?action=destroy">deconnexion</a>
<a class="btn my-2 my-sm-0 text-success" href="index.php?action=ajouterProjetView">Créer un projet</a>
<a class="btn my-2 my-sm-0 text-success" href="index.php?action=ajouterGroupeView">Ajouter un groupe</a>
<a class="btn my-2 my-sm-0 text-success" href="index.php?action=creerAssociationView">Creer une association</a>
<a class="btn my-2 my-sm-0 text-success" href="index.php?action=creerDemandeView">Creer une demande</a>
<a class="btn my-2 my-sm-0 text-success" href="index.php?action=ajouterChoixView">Ajouter un choix</a>
<a class="btn my-2 my-sm-0 text-success" href="index.php?action=creerAffectationView">Creer une affectation</a>
<a class="btn my-2 my-sm-0 text-success" href="index.php?action=modifierUserView&amp;id=<?=$_SESSION['uid']?>">Modifier user connecté</a>
<a class="btn my-2 my-sm-0 text-success" href="index.php?action=projetModifierView&amp;id=1">Modifier projet</a>
<a class="btn my-2 my-sm-0 text-success" href="index.php?action=groupeModifierView&amp;id=1">Modifier groupe</a>
<a class="btn my-2 my-sm-0 text-success" href="index.php?action=demandeModifierView&amp;id=1">Modifier demande</a>
<a class="btn my-2 my-sm-0 text-success" href="index.php?action=demandeSuppr&amp;id=1">Supp demande</a>
<a class="btn my-auto mx-auto text-success col-6" href="index.php?action=dashboard&amp;id=1">Dashboard</a>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>