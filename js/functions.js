"use strict";

function ajaxRequest(){
	/*
	--AJAX creating 'data' parameter:
	data = new Object();
	if(data['data'] == undefined){
		data['data'] = new Object();
	}
	JSON.stringify(data);
	delete data;
	*/
	$.ajax({
		method:'POST',
		url:'api.php',
		contentType:"application/json; charset=utf-8",
		data:JSON.stringify({
			op:'HELLO'
		}),
		datatype:'json',
		timeout:10000,
		beforeSend:function(jqXHR, settings) {
			console.log(settings);
			$.spawnSpinner();
		},
		success: function (data, textStatus, jqXHR) {
			console.log(data);
			try {
				if(data.status == "ok"){
					$.spawnAlert({body:"All correct.",color:data.color});
				} else {
					$.spawnAlert({body:"Server returned error string: "+data.msg,color:data.color});
				}
			} catch (e) {
				$.spawnAlert({body:"Malformed JSON reply.",color:"danger"});
			}
		},
		error: function(jqXHR, textStatus, errorThrown) {
			console.log(jqXHR.responseText);
			$.spawnAlert({body:"Communication error: "+jqXHR.responseText,color:"danger"});
		},
		complete: function(jqXHR, textStatus) {
			console.log(textStatus);
			$.removeSpinner();
		},
		statusCode: {
			500: function(data){
				$.spawnAlert({body:"Error 500: "+data,color:"danger"});
			}
		}
	});
}

function uploadAjax(){
	$.ajax({
		method: 'POST',
		url: 'api_post.php',
		contentType: false,
		data: new FormData($("#formUpload").get(0)),
		datatype: 'json',
		timeout: 0,
		cache: false,
		processData: false,
		enctype: 'multipart/form-data',
		xhr: function() {
			var ajXhr = $.ajaxSettings.xhr();
			if (ajXhr.upload) {
				ajXhr.upload.addEventListener('progress',progressFunction, false);
			}
			return ajXhr;
		},
		beforeSend: function(jqXHR, settings) {
			console.log(settings);
			$.spawnSpinner({text:"Uploading..."});
			$("div.progress").css("display","");
			$("div.progress div.progress-bar").attr("aria-valuenow",0).css("width","0%");
		},
		success: function (data, textStatus, jqXHR) {
			console.log(data);
			$.spawnAlert({body:data.msg,color:data.color});
		},
		error: function(jqXHR, textStatus, errorThrown) {
			console.log(jqXHR.responseText);
			$.spawnAlert({body:"Communication error: "+jqXHR.responseText,color:"danger"});
		},
		complete: function(jqXHR, textStatus) {
			//console.log(textStatus);
			$("label.badge").text("Waiting");
			$("div.progress").css("display","none");
			$("div.progress div.progress-bar").attr("aria-valuenow",0).css("width","0%");
			$("img[name='thumb']").attr("src","");
			$("#formUpload").get(0).reset();
			$.removeSpinner();
		}
	});
}

function progressFunction(e){
	if(e.lengthComputable){
		$("div.progress div.progress-bar").attr("aria-valuenow",Math.round(e.loaded*100/e.total)).css("width",Math.round(e.loaded*100/e.total)+"%");
		$("label.badge").text(filesize(e.loaded)+" of "+filesize(e.total)+" transfered ("+Math.round(e.loaded*100/e.total)+"%)");
	} else {
		$("label.badge").text("Uploading...");
	}
}

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