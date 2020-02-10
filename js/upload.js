function fileChange(e) {
	if (e.target.files.length > 0) {
		$(".custom-file-label").text(e.target.files[0].name + " - Modified date: " + $.uts2dt(e.target.files[0].lastModified / 1000) + " - Size: " + $.bytes2humanReadable(e.target.files[0].size));
		$(e.target).on("thumbnailGenerated", function (event, data) {
			// Important!
			$(e.target).off("thumbnailGenerated");

			if (data.success) {
				$("img").attr("src", data.image).css("display", "");
			} else {
				$("img").attr("src", "").css("display", "none");
			}
		}).imageThumbnailer({
			imgFile: e.target.files[0]
		});
	} else {
		$(".custom-file-label").text("No file selected.");
	}
}

function uploadAjax() {
	$.upload({
		progress: function (data) {
			if (data.length_computable) {
				$("#divProgress").html(
					'Uploaded: ' + $.bytes2humanReadable(data.bytes_loaded) + '<br/>' +
					'Total: ' + $.bytes2humanReadable(data.bytes_total) + '<br/>' +
					'Remaining: ' + $.bytes2humanReadable(data.bytes_remaining) + '<br/>' +
					'Speed: ' + $.bytes2humanReadable(data.bytes_per_second) + '/s<br/>' +
					'Elapsed seconds: ' + data.seconds_elapsed + '<br/>' +
					'Remaining seconds: ' + data.seconds_remaining + '<br/>'
				);
				$("progress").attr({
					value: data.bytes_loaded,
					max: data.bytes_total
				});
			} else {
				$.spawnAlert({
					body: "No progress event support,<br/>file upload still happening...",
					color: "danger"
				});
			}
		},
		success: function () {
			$.spawnAlert({
				title: "Upload OK",
				body: "File uploaded successfully",
				color: "success"
			});
		},
		complete: function () {
			$("#divProgress").text("Waiting...");
			$("progress").attr({
				value: "",
				max: ""
			});
			$("#formUpload").get(0).reset();
			$(".custom-file-label").text("Choose file...");
			$("img").attr("src", "").css("display", "none");
		}
	});
}