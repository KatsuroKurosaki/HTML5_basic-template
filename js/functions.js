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