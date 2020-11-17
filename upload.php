<!DOCTYPE html>
<html lang="en">

<head>
	<?php require 'header.php'; ?>
	<?php require 'headercss.php'; ?>
</head>

<body>
	<?php define("_FILE", basename(__FILE__, '.php'));
	require 'navbar.php'; ?>

	<main role="main" class="container pt-2 pb-5">
		<form id="formUpload" enctype="multipart/form-data" action="receive.php" method="post">
			<div class="custom-file">
				<input type="file" class="custom-file-input" name="file" onchange="javascript:fileChange(event);" /> <!-- Filter file type: accept="image/*" -->
				<label class="custom-file-label">Choose file...</label>
			</div>
			<div class="my-2">
				<pre id="divProgress">Waiting...</pre>
			</div>
			<div class="mb-2">
				<progress class="progress w-100"></progress>
			</div>
			<div class="text-center">
				<button type="button" class="btn btn-lg btn-success mb-2" onclick="javascript:uploadAjax();">Upload</button>
			</div>
			<div class="text-center">
				<img src="" class="img-thumbnail" style="display:none;" />
			</div>
			<input type="hidden" name="op" value="UPLOAD_FILE" />
		</form>
		<hr />
		<label>Coming soon: Multiple file upload</label>
	</main>
	<?php require 'footer.php'; ?>
	<?php require 'footerjs.php'; ?>
	<script src="js/upload.min.js?<?= filemtime('js/upload.min.js') ?>"></script>
</body>

</html>