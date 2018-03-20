// Other functions, specific to the file.


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
			op:'hello'
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
					$.spawnAlert({body:"Server error: "+data.msg,color:data.color});
				}
			} catch (e) {
				$.spawnAlert({body:"Malformed JSON reply.",color:data.color});
			}
		},
		error: function(jqXHR, textStatus, errorThrown) {
			console.log(jqXHR.responseText);
			$.spawnAlert({body:"Communication error: "+jqXHR.responseText,color:"danger"});
		},
		complete: function(jqXHR, textStatus) {
			console.log(textStatus);
			$.removeSpinner();
		}
	});
}

function uploadAjax(){
	$.ajax({
		method: 'POST',
		url: 'receive.php',
		data: new FormData($("#formUpload")[0]),
		cache: false,
		contentType: false,
		processData: false,
		timeout: 60000,
		xhr: function() {
			var ajXhr = $.ajaxSettings.xhr();
			if (ajXhr.upload) {
				ajXhr.upload.addEventListener('progress',progressFunction, false);
			}
			return ajXhr;
		},
		beforeSend: function(jqXHR, settings) {
			//console.log(settings);
			$("#divProgress").html("Preparing upload.");
			$("progress").attr({value:0,max:100});
		},
		success: function (data, textStatus, jqXHR) {
			//console.log(data);
			alert(data);
		},
		error: function(jqXHR, textStatus, errorThrown) {
			//console.log(jqXHR.responseText);
			alert(jqXHR.responseText);
		},
		complete: function(jqXHR, textStatus) {
			//console.log(textStatus);
			$("#divProgress").html("Upload complete.");
			$("progress").attr({value:100,max:100});
			$("#formUpload input[name='file']").replaceWith($("#formUpload input[name='file']").clone());
		}
	});
}

function progressFunction(e){
	if(e.lengthComputable){
		$("progress").attr({value:e.loaded,max:e.total});
		$("#divProgress").html("Uploading image... "+Math.round(e.loaded*100/e.total)+"% complete.");
	} else {
		$("#divProgress").html("Uploading image...");
	}
}