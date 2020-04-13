<?php
ob_start(); ?>

<div class="m-auto pt-5 col-6">
	<a class="btn col-12" href="index.php?action=dashboard&amp;id=1">Dashboard</a>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>