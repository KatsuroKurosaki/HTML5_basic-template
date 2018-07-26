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