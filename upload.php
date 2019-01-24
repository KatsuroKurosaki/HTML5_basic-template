<!DOCTYPE html>
<html lang="en">
    <head>
		<?php require 'header.php'; ?>
		<?php require 'headercss.php'; ?>
	</head>
    <body>
		<form id="formUpload" enctype="multipart/form-data" action="receive.php" method="post" class="container mt-2">
			<div class="custom-file">
				<input type="file" class="custom-file-input" name="file" onchange="javascript:fileChange(event);"/> <!-- Filter file type: accept="image/*" -->
				<label class="custom-file-label">Choose file...</label>
			</div>
			<div id="divProgress" class="mb-2">Waiting...</div>
			<div class="mb-2"><progress class="progress w-100"></progress></div>
			<div class="text-center">
				<button type="button" class="btn btn-lg btn-success mb-2" onclick="javascript:uploadAjax();">Upload</button>
			</div>
			<input type="hidden" name="op" value="UPLOAD_FILE"/>
		</form>
		<?php require 'footer.php'; ?>
		<?php require 'footerjs.php'; ?>
		<script type="text/javascript" src="./js/functions.js" charset="UTF-8"></script>
		<script type="text/javascript">
			function fileChange(e){
				if(e.target.files.length>0){
					$(".custom-file-label").text(e.target.files[0].name);
				} else {
					$(".custom-file-label").text("No file selected.");
				}
			}
		</script>
    </body>
</html>