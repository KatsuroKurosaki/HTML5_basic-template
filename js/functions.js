function spawnSpinner(){
	if($("#spinner").length==0){
		var spinner = '<div id="spinner" style="border:1px solid gray;background-color:lightgray;width:120px;height:60px;border-radius:.5em;text-align:center;position:fixed;top:50%;left:50%;margin-left:-60px;margin-top:-30px;z-index:1111;">';
			spinner += '<span style="display:block;margin-top:6px;"><i class="fa fa-2x fa-cog fa-spin"></i></span>';
			spinner += '<span style="display:block;">Cargando...</span>';
			spinner += '</div>';
		$(spinner).appendTo("body");
	}
}

function removeSpinner(){
	$("#spinner").fadeOut("fast",function(){
		$(this).remove();
	});
}

function setData(id,data){
	if(typeof(Storage) !== "undefined") {
		localStorage.setItem(id,data);
	} else {
		Cookies.set(id,data);
	}
}

function getData(id){
	if(typeof(Storage) !== "undefined") {
		return localStorage.getItem(id);
	} else {
		return Cookies.get(id);
	}
}

function removeData(id){
	if(typeof(Storage) !== "undefined") {
		localStorage.removeItem(id);
	} else {
		Cookies.remove(id);
	}
}

function isNullData(id){
	if(typeof(Storage) !== "undefined") {
		return (localStorage.getItem(id) === null);
	} else {
		return (Cookies.get(id)==undefined);
	}
}

function spawnModal(title,body){
	if($("#modal").length==0){
		
		var modal = '<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="Modal Popup">'+
			'<div class="modal-dialog" role="document">'+
				'<div class="modal-content">'+
					'<div class="modal-header">'+
						'<button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>'+
						'<h4 class="modal-title">'+title+'</h4>'+
					'</div>'+
					'<div class="modal-body">'+body+'</div>'+
					'<div class="modal-footer">'+
						'<button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>'+
						//'<button type="button" class="btn btn-primary disabled">Sí</button>'+
					'</div>'+
				'</div>'+
			'</div>'+
		'</div>';
		
		$(modal).appendTo('body');
		$('#modal').modal('show');
		$('#modal').on( 'hidden.bs.modal', function ( e ){
			$('#modal').remove();
			$('body').removeClass("modal-open");
			
		} );
	} else {
		console.error("Ya existe un modal popup.");
	}
}

function spawnRemoteModal(url,data){
	if($("#modal").length==0){
		var modal = '<div class="modal fade" id="modal" role="dialog" aria-labelledby="Modal Popup">'+ //tabindex="-1"
			'<div class="modal-dialog" role="document">'+
				'<div class="modal-content">'+
				'</div>'+
			'</div>'+
		'</div>';
		
		try {
			var uuid = $.parseXML(getData("userinfo"));
		} catch (err) {
			logout();
		}
		
		$.ajax({
			type: 'POST',
			url: './'+url+'.php?s='+$(uuid).find("user").attr("uuid")+"&i="+$(uuid).find("user").attr("id"),
			data: data,
			timeout: 10000,
			beforeSend: function() {
				spawnSpinner();
			},
			success: function (data) {
				$(modal).appendTo('body');
				$("#modal .modal-content").html(data);
				$('#modal').modal('show');
				$('#modal').on( 'hidden.bs.modal', function ( e ){
					$('#modal').remove();
					$('body').removeClass("modal-open");
				} );
				$(".navbar-collapse").collapse('hide');
			},
			error: function(request, status, error) {
				console.log(request.responseText);
				alert("Se ha producido un error de comuniación. Vuelva a intentarlo o contacte con Surf the Web.");
				//$("#spinner").remove();
			},
			complete: function(jqXHR, textStatus) {
				//console.log(textStatus);
				removeSpinner();
			}
		});
	} else {
		console.error("Ya existe un modal popup.");
	}
}

function removeModal(){
	if($("#modal").length>=1){
		$('#modal').modal('hide');
	} else {
		console.error("No existe un modal.");
	}
}

function spawnCalendars(cal1,cal2){
	$(".datetimepicker").remove();
	
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

function spawnAlert(text,cssclass,showBefore){
	var alertId = new Date().getTime();
	
	//cssclass = success, info, warning, danger
	var cssalert = '<div id="alert-'+alertId+'" class="alert alert-'+cssclass+'" style="width:75%;margin:.5em auto;display:none;" role="alert">'+text+'</div>';
	
	$(cssalert).insertBefore(showBefore);
	$('#alert-'+alertId).slideDown("slow",function(){
		setTimeout(function(){
			$('#alert-'+alertId).slideUp("slow",function(){
				$('#alert-'+alertId).remove();
			});
		},2000);
	});
	//$(cssalert)
}

function print(elem) {
	var winprint = window.open('', 'Print', 'width=1024,height=768');
	winprint.document.write('<html><head><title></title>');
	winprint.document.write('<style> * { font-family: sans-serif; } </style>');
	winprint.document.write('</head><body>');
	winprint.document.write($(elem).html());
	winprint.document.write('</body></html>');
	winprint.print();
	winprint.close();
	return true;
}

function runNumber(container, from, to, decimalpos, duration){
	if(duration==undefined){duration=3000;}
	if(decimalpos==undefined){decimalpos=0;}
	$({someValue: from}).animate({someValue: to}, {
		duration: duration,
		step: function() {
			$(container).text( this.someValue.toFixed(decimalpos) );
		},
		complete: function() {
			$(container).text( this.someValue );
		}
	});
}