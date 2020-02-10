function detectWebcams() {
	$("select[name='cameras'] option").remove();

	try {
		navigator.mediaDevices.enumerateDevices().then((devices) => {
			devices.forEach((device) => {
				if (device.kind == "videoinput") {
					$("select[name='cameras']").append('<option value="' + device.deviceId + '">' + device.label + '</option>');
				} else {
					console.log("Detected device " + device.deviceId + "\nIt is not videoinput: " + device.kind);
				}
			});
			if (!$("select[name='cameras'] option").length) {
				$.spawnAlert({
					title: "Error",
					body: "No webcams detected",
					color: "warning"
				});
			}
		}).catch((err) => {
			$.spawnAlert({
				title: "Error",
				body: err,
				color: "danger"
			});
		});
	} catch (err) {
		alert(err);
	}
}

function previewWebcam() {
	if ($("select[name='cameras'] option").length) {
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
		navigator.mediaDevices.getUserMedia(constraints).then((stream) => {
			var videoPreview = $("#videoPreview").get(0);
			videoPreview.srcObject = stream;
			videoPreview.play();
		}).catch(function (err) {
			$.spawnAlert({
				title: "Error",
				body: err,
				color: "danger"
			});
		});
	} else {
		$.spawnAlert({
			title: "Error",
			body: "No webcams detected",
			color: "warning"
		});
	}
}

function stopPreview() {
	var videoPreview = $("#videoPreview").get(0);
	if (videoPreview.srcObject != null) {
		videoPreview.srcObject.getTracks().forEach((track) => {
			track.stop();
		});
		videoPreview.pause();
		videoPreview.srcObject = null;
	} else {
		$.spawnAlert({
			title: "Error",
			body: "No video playback is active",
			color: "warning"
		});
	}
}

function takePicture() {
	var videoPreview = $("#videoPreview");
	if (videoPreview.srcObject != null) {
		var c = document.createElement("canvas");
		c.width = videoPreview.width();
		c.height = videoPreview.height();

		var ctx = c.getContext("2d");
		ctx.drawImage(videoPreview.get(0), 0, 0, c.width, c.height);

		var dlLink = document.createElement('a');
		//dlLink.target = '_blank';
		dlLink.download = $.randomUUID() + ".jpg";
		dlLink.href = c.toDataURL("image/jpg");
		dlLink.dataset.downloadurl = ["image/jpg", dlLink.download, dlLink.href].join(':');
		document.body.appendChild(dlLink);
		dlLink.click();
		document.body.removeChild(dlLink);
	} else {
		$.spawnAlert({
			title: "Error",
			body: "No active video playback to take picture",
			color: "warning"
		});
	}
}