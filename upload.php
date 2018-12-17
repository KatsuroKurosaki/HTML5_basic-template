<!DOCTYPE html>
<html lang="en">
<head>
		<?php require 'header.php'; ?>
		<link rel="stylesheet" type="text/css" href="./css/main_style.css" />
</head>
<body>
	<form id="formUpload" class="container mt-2">
		<div class="input-group mb-3">
			<input type="hidden" name="op" value="UPLOAD_FILE" /> <input
				type="file" name="file" class="custom-file-input" accept="image/*"
				onchange="javascript:imageSelect(event);"> <label
				class="custom-file-label">Añadir imagen...</label>
		</div>
		<div class="text-center mb-3">
			<div class="progress">
				<div class="progress-bar progress-bar-striped progress-bar-animated"
					role="progressbar" aria-valuenow="0" aria-valuemin="0"
					aria-valuemax="100" style="width: 0%;"></div>
			</div>
		</div>
		<div class="text-center mb-3">
			<label class="badge">Waiting</label>
		</div>
		<div class="text-center mb-3">
			<button type="button" class="btn btn-lg btn-success"
				onclick="javascript:uploadAjax();">
				<i class="fas fa-upload"></i> Subir
			</button>
		</div>
		<div class="text-center mb-3">
			<img name="thumb" class="img-thumbnail" src="" />
		</div>
	</form>
		<?php require 'footerjscss.php'; ?>
		<script type="text/javascript" src="./js/functions.js" charset="UTF-8"></script>
</body>
</html>
