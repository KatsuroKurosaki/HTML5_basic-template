"use strict";

(function($){
	
	$.extend({
		spawnSpinner: function(options) {
			if(!$("#loading").length){
				var _options = $.extend({
					text: "Loading...",
					icon: "fa-spinner",
					animation:"fa-pulse", // fa-pulse, fa-spin
					size:"fa-2x"
				},options);
				
				$("body").append('<div id="loading" class="position-fixed d-flex justify-content-center align-items-center text-center txtcolor-white">'+
					'<div><i class="fas '+_options.size+' '+_options.icon+' '+_options.animation+'"></i><br/>'+_options.text+'</div>'+
				'</div>');
			}
		},
		
		removeSpinner: function(action) {
			$("#loading").remove();
		},
		
		qs: function(key) {
			key = key.replace(/[*+?^$.\[\]{}()|\\\/]/g, "\\$&"); // escape RegEx control chars
			var _match = location.search.match(new RegExp("[?&]" + key + "=([^&]+)(&|$)"));
			return _match && decodeURIComponent(_match[1].replace(/\+/g, " "));
		},
		
		sec2dhms: function(sec) {
			return parseInt(sec/86400)+'d '+(new Date(sec%86400*1000)).toUTCString().replace(/.*(\d{2}):(\d{2}):(\d{2}).*/,"$1:$2:$3");
		},
		
		bytes2humanReadable: function(a,b,c,d,e) {
			// Divide by 1024
			return (b=Math,c=b.log,d=1024,e=c(a)/c(d)|0,a/b.pow(d,e)).toFixed(2)+' '+(e?'KMGTPEZY'[--e]+'iB':'Bytes');
		},
		
		bits2humanReadable: function(a,b,c,d,e) {
			// Divide by 1000
			return (b=Math,c=b.log,d=1e3,e=c(a)/c(d)|0,a/b.pow(d,e)).toFixed(2)+' '+(e?'kMGTPEZY'[--e]+'B':'Bytes');
		},
		
		uts2dt: function(ts) {
			var _date = new Date(ts*1000);
			return _date.getFullYear() + "/"
				+ (((_date.getMonth()+1)<10)?	"0"+(_date.getMonth()+1):	(_date.getMonth()+1)) + "/"
				+ ((_date.getDate()<10)		?	"0"+_date.getDate()		:	_date.getDate()) + " "
				+ ((_date.getHours()<10)	?	"0"+_date.getHours()	:	_date.getHours()) + ":"
				+ ((_date.getMinutes()<10)	?	"0"+_date.getMinutes()	:	_date.getMinutes()) + ":"
				+ ((_date.getSeconds()<10)	?	"0"+_date.getSeconds()	:	_date.getSeconds()) ;
		},
		
		uts2td: function(ts) {
			var _date = new Date(ts*1000);
			return ((_date.getHours()<10)	?	"0"+_date.getHours()	:	_date.getHours()) + ":"
				+ ((_date.getMinutes()<10)	?	"0"+_date.getMinutes()	:	_date.getMinutes()) + ":"
				+ ((_date.getSeconds()<10)	?	"0"+_date.getSeconds()	:	_date.getSeconds()) + " "
				+ ((_date.getDate()<10)		?	"0"+_date.getDate()		:	_date.getDate()) + "/"
				+ (((_date.getMonth()+1)<10)?	"0"+(_date.getMonth()+1):	(_date.getMonth()+1)) + "/"
				+ _date.getFullYear() ;
		},
		
		isValidDate: function(d,m,y) {
			var _date = new Date(y,m-1,d);
			return (_date.getFullYear() == y && (_date.getMonth() + 1) == m && _date.getDate() == d);
		},
		
		api: function(options){
			var _settings = $.extend({
				title: "",
				body: "",
				showclose: true,
				preventclose: true,
				fadespawn: true,
				verticalcenter: false,
				size: "md", // lg, md, sm
				buttons: []
			},options);
			
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
		},
		
		spawnModal: function(options){
			if(!$("#modal").length){
				// Modal settings
				var _settings = $.extend({
					title: "",
					body: "",
					showclose: true,
					preventclose: true,
					fadespawn: true,
					verticalcenter: false,
					size: "md", // lg, md, sm
					buttons: []
				},options);
				
				// Modal HTML code
				var _modal = '<div id="modal" class="modal'+( (_settings.fadespawn)?' fade':'' )+'" tabindex="-1" role="dialog">'+
					'<div class="modal-dialog'+( (_settings.verticalcenter)?' modal-dialog-centered':'' )+' modal-'+_settings.size+'" role="document">'+
						'<div class="modal-content">'+
							'<div class="modal-header">'+
								'<h5 class="modal-title">'+_settings.title+'</h5>'+
								( (_settings.showclose) ?
									'<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
								:
									''
								)+
							'</div>'+
							'<div class="modal-body">'+_settings.body+'</div>'+
								( (_settings.buttons.length) ?
									'<div class="modal-footer"></div>'
								:
									''
								)+
						'</div>'+
					'</div>'+
				'</div>';
				
				// Add the modal to the DOM
				$("body").append(_modal);
				// Remove modal from DOM on close
				$("#modal").on("hidden.bs.modal",function(){
					$('#modal').remove();
				});
				// Generate buttons
				$.each(_settings.buttons,function(idx,val){
					// Current button settings
					var _button = $.extend({
						label:"",
						color:"info", // primary, secondary, success, danger, warning, info, light, dark, link
						outline:false,
						dismiss:false,
						size:"md", // lg, md, sm
						click:function(){}
					},val);
					
					// Append buttons to the footer
					$("#modal div.modal-footer").append(
						'<button type="button" class="btn btn-'+( (_button.outline)?'outline-':'' )+''+_button.color+' btn-'+_button.size+'"'+( (_button.dismiss)?' data-dismiss="modal"':'' )+' data-btnidx="'+idx+'">'+
							_button.label+
						'</button>'
					);
					$("#modal div.modal-footer button[data-btnidx='"+idx+"']").on("click",_button.click);
				});
				// Prevent modal close on keyboard ESC key and mouseclick
				$('#modal').modal({
					backdrop: (_settings.preventclose)?'static':true,
					keyboard: !_settings.preventclose
				});
				// Summon the modal
				$('#modal').modal('show');
			}
		},
		
		spawnRemoteModal: function(options){
			if(!$("#modal").length){
				// Remote modal AJAX settings
				var _settings = $.extend({
					method: "POST",
					url: "",
					data: {},
					timeout: 10000,
					verticalcenter:true,
					debug: false
				},options);
				
				// AJAX call
				$.ajax({
					method: _settings.method,
					url: _settings.url,
					data: JSON.stringify(_settings.data),
					timeout: _settings.timeout,
					beforeSend: function(jqXHR, settings) {
						if(_settings.debug)
							console.log(settings);
					},
					success: function (data, textStatus, jqXHR) {
						// Spawn a modal and replace contents.
						$.spawnModal({
							verticalcenter:_settings.verticalcenter
						});
						$("#modal div.modal-content").html(data);
						if(_settings.debug)
							console.log(data);
					},
					error: function(jqXHR, textStatus, errorThrown) {
						$.spawnAlert({body:"Communication error: "+jqXHR.responseText,color:"danger"});
						if(_settings.debug)
							console.log(jqXHR.responseText);
					},
					complete: function(jqXHR, textStatus) {
						if(_settings.debug)
							console.log(textStatus);
					}
				});
			}
		},
		
		removeModal: function(){
			// Hides modal and the hide event removes it from DOM
			$('#modal').modal('hide');
		},
		
		spawnAlert(options){
			// Alert settings
			var _settings = $.extend({
				title: "",
				body: "",
				color: "info", //  primary, secondary, success, danger, warning, info, light, dark
				showclose: true,
				closetimeout: 5000,
				opentimeout: 700,
				alertId: $.now()
			},options);
			
			// Alert HTML
			var _alert = '<div id="alert'+_settings.alertId+'" class="alert alert-'+_settings.color+' alert-dismissible fade show position-absolute alert-custom" role="alert">'+
				( (_settings.title!="") ?
					'<h4 class="alert-heading">'+_settings.title+'</h4>'
				:
					''
				)+
				_settings.body+
				( (_settings.showclose) ?
					'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
				:
					''
				)+
			'</div>';
			
			//Append
			$("body").append(_alert);
			
			// Effects
			$("#alert"+_settings.alertId).hide().slideDown(_settings.opentimeout);
			
			// Remove it
			$.removeAlert(_settings.alertId,_settings.closetimeout);
		},
		
		removeAlert: function(alertId,closetimeout){
			// Removes an alert after a timeout
			setTimeout(function(){
				$('#alert'+alertId).alert("close");
			},(closetimeout!=undefined)?closetimeout:5000);
		}
		
	});
	
	// Adds the unchecked checkboxes to the serializeArray funcion
	$.fn.serializeArrayFull = function() {
		values = this.serializeArray();
		values = values.concat(
			this.find("input[type='checkbox']:not(:checked)").map(function() {
				return {"name":this.name,"value":"off"}
			}).get()
		);
		return values;
	};

})(jQuery);
