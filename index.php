<!DOCTYPE html>
<html lang="en">

<head>
	<?php require 'header.php'; ?>
	<?php require 'headercss.htm'; ?>
	<link rel="stylesheet" href="css/main_style.min.css?<?= filemtime('css/main_style.min.css') ?>" />
</head>

<body>
	<?php define("_FILE", basename(__FILE__, '.php'));
	require 'navbar.php'; ?>

	<main role="main" class="container pt-2 pb-5">
		<div class="jumbotron">
			<h1 class="display-4">Phosphor PHP UI</h1>
			<p class="lead">Demo page showcasing the UI features.</p>
			<hr class="my-4">
			<p>Feel free to browse everything</p>
		</div>
	</main>

	<?php require 'footer.php'; ?>
	<?php require 'footerjs.htm'; ?>
	<script src="js/functions.min.js?<?= filemtime('js/functions.min.js') ?>"></script>
</body>

</html>