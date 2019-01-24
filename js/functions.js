"use strict";

function imageSelect(e) {
	var width=640;
	var height=480;
	var image = new Image();
	image.src = URL.createObjectURL(e.target.files[0]);
	image.onload = function() {
		var newSize = calculateAspectRatioFit(image.width,image.height,width,height)
		var canvas = document.createElement("canvas");
		canvas.width = newSize.width;
		canvas.height = newSize.height;
		var context = canvas.getContext("2d");
		context.drawImage(image, 0,0,newSize.width,newSize.height);
		$("img[name='thumb']").attr("src",canvas.toDataURL("image/jpeg"));
	}
}

function calculateAspectRatioFit(srcWidth, srcHeight, maxWidth, maxHeight) {
	var ratio = Math.min(maxWidth / srcWidth, maxHeight / srcHeight);
	return { width: srcWidth*ratio, height: srcHeight*ratio };
}

function uploadAjax(){
	$.upload({
		progress: function(data){
			if(data.length_computable){
				$("#divProgress").html(
					'<p>'+
						'Uploaded: '+$.bytes2humanReadable(data.bytes_loaded)+'<br/>'+
						'Total: '+$.bytes2humanReadable(data.bytes_total)+'<br/>'+
						'Remaining: '+$.bytes2humanReadable(data.bytes_remaining)+'<br/>'+
						'Speed: '+$.bytes2humanReadable(data.bytes_per_second)+'/s<br/>'+
						'Elapsed seconds: '+data.seconds_elapsed+'<br/>'+
						'Remaining seconds: '+data.seconds_remaining+'<br/>'+
					'</p>'
				);
				$("progress").attr({value:data.bytes_loaded,max:data.bytes_total});
			} else {
				$.spawnAlert({
					body:"No progress support,<br/>file upload still happening.",
					color:"danger"
				});
			}
		},
		success: function(){
			$.spawnAlert({
				title:"Upload OK",
				body:"File uploaded successfully",
				color:"success"
			});
		},
		complete: function(){
			$("#divProgress").text("Waiting...");
			$("progress").attr({value:"",max:""});
			$("#formUpload").get(0).reset();
			$(".custom-file-label").text("Choose file...");
		}
	});
}
