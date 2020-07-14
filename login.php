<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	<?php require 'header.php'; ?>
	<?php require 'headercss.htm'; ?>
	<link rel="stylesheet" href="css/login_style.min.css?<?= filemtime('css/login_style.min.css') ?>" />
</head>

<body class="h-100 d-flex justify-content-center align-items-center">
	<div class="row no-gutters signin bgcolor-white rounded">
		<div class="col-12 col-md-5">
			<div class="d-flex flex-column h-100">
				<div class="flex-fill w-75 mx-auto p-3 d-flex justify-content-center align-items-center">
					<form class="form-row form-signin">
						<div class="col-12 mb-3">
							<img src="img/logo-login.png" class="d-block d-md-none mx-auto w-25" />
							<p class="h3 font-weight-bolder text-center txtcolor-gray">BIENVENIDO</p>
						</div>
						<div class="col-12 mt-3 mb-3 position-relative usericon">
							<input type="text" name="username" class="form-control form-control pl-5" placeholder="Usuario" maxlength="64" autofocus>
						</div>
						<div class="col-12 mb-3 position-relative passicon">
							<input type="password" name="password" class="form-control form-control pl-5" placeholder="Contraseña" maxlength="72">
						</div>
						<div class="col-12 mb-3 text-center">
							<button type="button" class="btn btn-info w-50 shadow" onclick="javascript:submitLogin();">
								ENTRAR
							</button>
						</div>
						<input type="hidden" name="op" value="LOGIN" />
					</form>
				</div>
				<div class="text-center p-3">
					<img src="img/stw-logo.png" class="img-fluid w-50" />
				</div>
			</div>
		</div>
		<div class="col-7 d-none d-md-block">
			<div class="d-flex justify-content-center align-items-center h-100 rounded-right sidelogo">
				<img src="img/logo-login.png" class="w-50" />
			</div>
		</div>
	</div>
	<?php require 'footerjs.htm'; ?>
	<script src="js/login.min.js?<?= filemtime('js/login.min.js') ?>"></script>
</body>

</html>