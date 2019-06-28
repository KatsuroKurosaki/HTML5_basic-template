<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require 'header.php';?>
		<?php require 'headercss.php';?>
		<link href="css/main_style.css?<?=filemtime('css/main_style.css')?>" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<?php define("_FILE", basename(__FILE__, '.php'));require 'navbar.php';?>

		<main role="main" class="container pt-2 pb-5"></main>

		<?php require 'footer.php';?>
		<?php require 'footerjs.php';?>
		<script src="js/functions.js?<?=filemtime('js/functions.js')?>" type="text/javascript" charset="UTF-8"></script>
	</body>
</html>
