<?php $title = 'web Projet'; ?>

<?php
ob_start();
session_start();
require('view/adminAccess.php');
?>

<div class="col-10 m-auto h-100 p-5 d-flex flex-column  animated fadeIn">
    <?= $_SESSION['role'] ?>
    <h2>Creer un choix</h2>
    <form action="index.php?action=ajouterChoix" id="formRegistration" method="POST">
        <div class="row col-12 p-0 m-0">
            <div class="row p-0 m-0 col-12">
                <label class="col-lg-12 mt-4 animated fadeInRight">Nom</label> <input class="col-lg-12 p-2 animated fadeInLeft border" type="text" name="nom" required="required" />
            </div>
            <div class="row p-0 m-0 col-12">
                <label class="col-lg-12 mt-4 animated fadeInRight">Projets :</label>
                <select id="monselect" class="col-lg-12 p-2 border animated fadeInLeft" name="pid">
                    <?php foreach ($projets as $key => $projet) : ?>
                        <option value="<?= $projet->pid(); ?>"><?= $projet->titre(); ?> <?= $projet->dateDebut(); ?> / <?= $projet->dateFin(); ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <input id="submitFormRegistration" type="submit" name="valide" value="Valider" class="btn border-secondary col-6 offset-3 mt-4 animated fadeInRight rounded text-white" />
        </div>
    </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>