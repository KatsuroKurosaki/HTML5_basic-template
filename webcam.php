<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require 'header.php';?>
		<?php require 'headercss.php';?>
		<link href="css/main_style.css?_=<?=filemtime('css/main_style.css')?>" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<?php define("_FILE", basename(__FILE__, '.php'));require 'navbar.php';?>

		<main role="main" class="container pt-2 pb-5">

			<div class="btn-group" role="group">
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
			<hr/>
			<div>
				<video id="videoPreview" class="w-100"></video>
			</div>
		</main>

		<?php require 'footer.php';?>
		<?php require 'footerjs.php';?>
		<script src="js/functions.js?_=<?=filemtime('js/functions.js')?>" type="text/javascript" charset="UTF-8"></script>
		<script type="text/javascript">

			function detectWebcams(){
				$("select[name='cameras'] option").remove();

				navigator.mediaDevices.enumerateDevices().then((devices)=>{
					devices.forEach((device)=>{
						if(device.kind == "videoinput"){
							$("select[name='cameras']").append('<option value="'+device.deviceId+'">'+device.label+'</option>');
						}
					});
				}).catch((err)=>{
					$.spawnAlert({title:"Error",body:err,color:"danger"});
				});
			}

			function previewWebcam(){
				if($("select[name='cameras'] option").length>0){
					// Stop previews
					stopPreview();

					// Video restrictions
					var constraints = {
						audio: false,
						video: {
							video: {
								width: {
									min: 320,
									max: 1920
								},
								height: {
									min: 240,
									max: 1080
								},
								frameRate: {
									ideal: 30,
									min: 10
								}
							},
							deviceId: {
								exact: $("select[name='cameras']").val()
							}
						}
					};

					// Preview
					navigator.mediaDevices.getUserMedia(constraints).then((stream)=>{
						var video = $("#videoPreview").get(0);
						video.srcObject = stream;
						video.play();
					}).catch(function(err) {
						$.spawnAlert({title:"Error",body:err,color:"danger"});
					});
				} else {
					$.spawnAlert({title:"Error",body:"No cameras detected.",color:"warning"});
				}
			}

			function stopPreview(){
				var video = $("#videoPreview").get(0);
				if( video.srcObject != null ){
					video.srcObject.getTracks().forEach((track)=>{
						track.stop();
					});
					video.pause();
					video.srcObject = null;
				}
			}

			function takePicture(){
				var c = document.createElement("canvas");
				c.width = $("#videoPreview").width();
				c.height = $("#videoPreview").height();

				var ctx = c.getContext("2d");
				ctx.drawImage($("#videoPreview").get(0), 0, 0, c.width, c.height);

				var dlLink = document.createElement('a');
				//dlLink.target = '_blank';
				dlLink.download = $.randomUUID()+".jpg";
				dlLink.href = c.toDataURL("image/jpg");
				dlLink.dataset.downloadurl = ["image/jpg", dlLink.download, dlLink.href].join(':');
				document.body.appendChild(dlLink);
				dlLink.click();
				document.body.removeChild(dlLink);
			}

		</script>

	</body>
</html>
