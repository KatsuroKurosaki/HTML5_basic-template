// Other functions, specific to the project.

function spawnCalendar(cal){
	//$(".datetimepicker").remove();
	
	$(cal).datetimepicker({
        format: "dd-mm-yyyy",
		autoclose:true,
		minView: 2,
		todayHighlight: true,
		language:'es',
		weekStart:1
    });
}
function spawnCalendars(cal1,cal2){
	//$(".datetimepicker").remove();
	
	var antes = new Date();
	antes.setFullYear(antes.getFullYear()-1);
	
	var despues = new Date();
	//despues.setFullYear(despues.getFullYear()+1);
	
	$(cal1+", "+cal2).datetimepicker({
        format: "dd-mm-yyyy",
		autoclose:true,
		minView: 2,
		todayHighlight: true,
		language:'es',
		weekStart:1,
		startDate:antes,
		endDate:despues
    });
}

function passwordKeyDownEvent(e){
	keyCode = ('which' in e) ? e.which : e.keyCode;
	if (keyCode==13) alert("Intro pressed");
}

/*
<form id="imgInput"><input type="file" class="form-control" accept="image/*" onchange="javascript:imageProcess(event);"></form>

<div id="imagesDiv" class="form-control text-center" style="width:100%;height:175px;overflow-y:scroll;">
	<img src="data:image/jpeg;base64,[.........]" style="display:inline-block;width:125px;margin:.5em;">
</div>
*/
function imageProcess(e) {
	spawnSpinner();
	var width=800;
	var height=600;
	image = new Image();
	image.src = URL.createObjectURL(e.target.files[0]);
	image.onload = function() {
		newSize = calculateAspectRatioFit(image.width,image.height,width,height)
		canvas = document.createElement("canvas");
		canvas.width = newSize.width;
		canvas.height = newSize.height;
		context = canvas.getContext("2d");
		context.drawImage(image, 0,0,newSize.width,newSize.height);
		//context.scale(newSize.width, newSize.height);
		
		$("#imagesDiv").append('<img src="'+canvas.toDataURL("image/jpeg")+'"/>');
		
		delete canvas, context, image, newSize;
		$("#imgInput").replaceWith($("#imgInput").clone());
		removeSpinner();
	}
}

function calculateAspectRatioFit(srcWidth, srcHeight, maxWidth, maxHeight) {
	ratio = Math.min(maxWidth / srcWidth, maxHeight / srcHeight);
	return { width: srcWidth*ratio, height: srcHeight*ratio };
}