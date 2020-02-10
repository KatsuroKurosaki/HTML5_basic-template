<!DOCTYPE html>
<html lang="en">

<head>
	<?php require 'header.php'; ?>
	<?php require 'headercss.htm'; ?>
	<link href="css/main_style.css?<?= filemtime('css/main_style.css') ?>" type="text/css" rel="stylesheet" />
</head>

<body>
	<?php define("_FILE", basename(__FILE__, '.php'));
	require 'navbar.php'; ?>

	<main role="main" class="container pt-2 pb-5">

		<div class="btn-group w-100" role="group">
			<button type="button" class="btn btn-primary" onclick="javascript:detectWebcams();">Detect webcams</button>
			<button type="button" class="btn btn-primary" onclick="javascript:previewWebcam();">Preview camera</button>
			<button type="button" class="btn btn-primary" onclick="javascript:stopPreview();">Stop preview</button>
			<button type="button" class="btn btn-primary" onclick="javascript:takePicture();">Take picture</button>
		</div>
		<div>&nbsp;</div>
		<div class="input-group">
			<div class="input-group-prepend">
				<label class="input-group-text">Camera:</label>
			</div>
			<select class="custom-select" name="cameras"></select>
		</div>
		<hr />
		<div>
			<video id="videoPreview" class="w-100"></video>
		</div>
	</main>

	<?php require 'footer.php'; ?>
	<?php require 'footerjs.htm'; ?>
	<script src="js/webcam.min.js?<?= filemtime('js/webcam.min.js') ?>"></script>

</body>

</html>