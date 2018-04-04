<!DOCTYPE html>
<html lang="en">
    <head>
		<?php require 'header.php'; ?>
	</head>
    <body class="d-flex justify-content-center align-items-center text-center">
		<form class="form-signin invisible">
			<img class="mb-4" src="favicon.png" alt="">
			<h1 class="h3 mb-3 font-weight-normal txtcolor-white"><i class="fas fa-lock"></i> Restricted area</h1>
			<label class="sr-only">Username</label>
			<input type="text" name="username" class="form-control" placeholder="Username" autofocus>
			<label class="sr-only">Password</label>
			<input type="password" name="password" class="form-control" placeholder="Password">
			<button class="btn btn-lg btn-primary btn-block mt-3 mb-3" type="submit"><i class="fas fa-sign-in-alt"></i> Log in</button>
			<p class="mb-3 text-muted small">&copy; Company <?php echo date('Y'); ?></p>
		</form>
		<?php require 'footerjscss.php'; ?>
		<script type="text/javascript" src="./js/functions.js" charset="UTF-8"></script>
		<link rel="stylesheet" type="text/css" href="./css/login_style.css"/>
		<script type="text/javascript">
			$(window).on("load",function(){
				$("form").removeClass("invisible").on("submit",function(e){
					e.preventDefault();
					ajaxRequest();
				}).animateCss({
					effect:"zoomIn",
					end:function(){
						$("form input:first").focus();
					}
				});
			});
		</script>
	</body>
</html>
