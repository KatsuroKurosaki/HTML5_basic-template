<!DOCTYPE html>
<html lang="en">
    <head>
		<?php require 'header.php'; ?>
	</head>
    <body>
        <?php define("_FILE",basename(__FILE__,'.php')); require 'navbar.php'; ?>

		<!-- https://getbootstrap.com/docs/4.0/examples/ -->
		<main role="main" class="container">
			<div class="starter-template">
				<h1>Bootstrap starter template</h1>
				<hr/>
				<p class="lead">Animatecss</p>
				<pre>
$("body").animateCss({
	effect:"zoomOut",
	duration:"3s",
	end:function(){
		alert("Finish!");
	}
});
				</pre>
				<hr/>
				
			</div>
		</main>

		<?php require 'footer.php'; ?>
		<?php require 'jsfooter.php'; ?>
    </body>
</html>
