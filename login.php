<!DOCTYPE html>
<html lang="en">
	<head>
			<?php require 'header.php'; ?>
			<?php require 'headercss.php'; ?>
			<link href="css/login_style.css?_=<?=filemtime('css/login_style.css');?>" type="text/css" rel="stylesheet" />
	</head>
	<body class="d-flex justify-content-center align-items-center text-center">
		<form class="form-signin invisible">
			<h1 class="h3 mb-3 font-weight-normal text-light">
				<i class="fas fa-lock"></i> Restricted area
			</h1>
			<label class="sr-only">Username</label>
			<input type="text" name="username" class="form-control" placeholder="Username" />
			<label class="sr-only">Password</label>
			<input type="password" name="password" class="form-control" placeholder="Password" />
			<button class="btn btn-lg btn-primary btn-block mt-3 mb-3" type="submit">
				<i class="fas fa-sign-in-alt"></i> Log in
			</button>
			<p class="mb-3 text-light small">&copy; Company <?=date('Y');?></p>
		</form>
		<?php require 'footerjs.php'; ?>
		<script src="js/functions.js?_=<?=filemtime('js/functions.js');?>" type="text/javascript" charset="UTF-8"></script>
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
