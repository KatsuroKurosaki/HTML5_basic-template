<!DOCTYPE html>
<html lang="en">

<head>
	<?php require 'header.php'; ?>
	<?php require 'headercss.php'; ?>
	<link href="css/login_style.min.css?<?= filemtime('css/login_style.min.css') ?>" type="text/css" rel="stylesheet" />
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
	<?php require 'footerjs.php'; ?>
	<script src="js/functions.min.js?<?= filemtime('js/functions.min.js') ?>" type="text/javascript" charset="UTF-8"></script>
	<script type="text/javascript">
		$(window).on("load", function() {
			$("form").css("display", "").on("submit", function(e) {
				e.preventDefault();
				$.api({
					data: {
						op: 'HELLO'
					},
					success: function(data) {
						$.spawnAlert({
							body: data.msg
						});
					}
				});
			}).animateCss({
				effect: "zoomIn",
				end: function() {
					$("form input:first").focus();
				}
			});
		});
	</script>
</body>

</html>