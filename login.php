<!DOCTYPE html>
<html lang="en">

<head>
	<?php require 'header.php'; ?>
	<?php require 'headercss.htm'; ?>
	<link rel="stylesheet" href="css/login_style.min.css?<?= filemtime('css/login_style.min.css') ?>" />
</head>

<body class="d-flex justify-content-center align-items-center">
	<form class="form-row form-signin text-light px-3 py-4" style="display:none;">
		<div class="col-12 mb-3">
			<h3 class="text-center">
				<i class="fas fa-lock"></i> Restricted area
			</h3>
		</div>
		<div class="col-12 mb-3">
			<label>Username:</label>
			<input type="text" name="username" class="form-control" />
		</div>
		<div class="col-12 mb-3">
			<label>Password:</label>
			<input type="password" name="password" class="form-control" />
		</div>
		<div class="col-12 mb-3">
			<button type="submit" class="btn btn-lg btn-primary btn-block">
				<i class="fas fa-sign-in-alt"></i> Log in
			</button>
		</div>
		<div class="col-12">
			<p class="small text-center">&copy; <?= date('Y') ?> - Company</p>
		</div>
	</form>
	<?php require 'footerjs.htm'; ?>
	<script src="js/login.min.js?<?= filemtime('js/login.min.js') ?>"></script>
</body>

</html>