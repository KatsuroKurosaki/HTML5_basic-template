<!DOCTYPE html>
<html lang="en">
    <head>
		<?php require 'header.php'; ?>
	</head>
    <body>
		<form id="formUpload" enctype="multipart/form-data" action="receive.php" method="post" class="container mt-2">
			<div class="custom-file">
				<input type="file" class="custom-file-input" name="file"/> <!-- Filter file type: accept="image/*" -->
				<label class="custom-file-label">Choose file...</label>
			</div>
			
			<div id="divProgress" class="mb-2">Waiting...</div>
			<div class="mb-2"><progress class="progress w-100"></progress></div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary mb-2" value="Upload via FORM POST"/>
				<input type="button" class="btn btn-success mb-2" value="Upload via AJAX" onclick="javascript:uploadAjax();"/>
			</div>
		</form>
		<?php require 'jsfooter.php'; ?>
    </body>
</html>
