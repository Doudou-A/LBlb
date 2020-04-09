<?php ob_start(); ?>

<a class="btn btn-outline-success my-2 my-sm-0 bg-primary" href="index.php?action=test">Changement de vue</a>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>