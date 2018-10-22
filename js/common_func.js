"use strict";

(function($){
	
	// Spinners
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
		}
	});
	
	// Querystring
	$.extend({
		qs: function(key) {
			key = key.replace(/[*+?^$.\[\]{}()|\\\/]/g, "\\$&"); // escape RegEx control chars
			var _match = location.search.match(new RegExp("[?&]" + key + "=([^&]+)(&|$)"));
			return _match && decodeURIComponent(_match[1].replace(/\+/g, " "));
		}
	});
	
	// Storage
	$.extend({
		setData: function(id,data){
			if(typeof(Storage) !== "undefined") {
				localStorage.setItem(id,data);
				return true;
			}
			return false;
		},
		getData: function(id){
			if(typeof(Storage) !== "undefined") {
				return localStorage.getItem(id);
			}
			return false;
		},
		removeData: function(id){
			if(typeof(Storage) !== "undefined") {
				localStorage.removeItem(id);
				return true;
			}
			return false;
		},
		isNullData: function(id){
			if(typeof(Storage) !== "undefined") {
				return (localStorage.getItem(id) === null);
			}
			return true;
		},
		setSessionData: function(id,data){
			if(typeof(Storage) !== "undefined") {
				sessionStorage.setItem(id,data);
				return true;
			}
			return false;
		},
		getSessionData: function(id){
			if(typeof(Storage) !== "undefined") {
				return sessionStorage.getItem(id);
			}
			return false;
		},
		removeSessionData: function(id){
			if(typeof(Storage) !== "undefined") {
				sessionStorage.removeItem(id);
				return true;
			}
			return false;
		},
		isSessionNullData: function(id){
			if(typeof(Storage) !== "undefined") {
				return (sessionStorage.getItem(id) === null);
			}
			return true;
		}
	});
	
	// Printing module
	$.extend({
		spawnPrinter: function(options, elem, head, finishFunction) {
			var _settings = $.extend({
				windowWidth: 800,
				windowHeight: 600,
				headSelector: 'head',
				bodySelector: 'body',
				end: function(){}
			},options);
			
			var winprint = window.open('about:blank', 'Print', 'width='+_settings.windowWidth+',height='+_settings.windowHeight+'');
			winprint.document.open();
			winprint.document.write(
				'<html>'+
					'<head>'+
						$(_settings.headSelector).html()+
					'</head>'+
					'<body>'+
						$(_settings.bodySelector).html()+
					'</body>'+
				'</html>'
			);
			winprint.document.close();
			winprint.focus();
			setTimeout(function(){
				winprint.print();
				winprint.close();
				_settings.end.call();
				return true;
			},500);
		}
	});
	
	// Conversion and validation
	$.extend({
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
		}
	});
	
	// Network communications
	$.extend({
		api: function(options) {
			var _settings = $.extend({
				method: 'POST',
				url: ($.qs("s")!=null)?'api.php?s='+$.qs("s"):'api.php',
				contentType: 'application/json; charset=utf-8',
				data: {},
				datatype: 'json',
				timeout: 10000,
				beforeSend: function(){},
				success: function(data){},
				error: function(jqXHR){},
				complete: function(){},
				spawnSpinner: true,
				debug: false
			},options);
			
			$.ajax({
				method: _settings.method,
				url: _settings.url,
				contentType: _settings.contentType,
				data: JSON.stringify( _settings.data ),
				datatype: _settings.datatype,
				timeout: _settings.timeout,
				beforeSend:function(jqXHR, settings) {
					if (_settings.debug)
						console.log(settings);
					if (_settings.spawnSpinner)
						$.spawnSpinner();
					_settings.beforeSend();
				},
				success: function (data, textStatus, jqXHR) {
					if (_settings.debug)
						console.log(data);
					if(data.status === 'ok')
						_settings.success(data);
					else
						$.spawnAlert({body:data.msg,color:data.color});
				},
				error: function(jqXHR, textStatus, errorThrown) {
					if (_settings.debug)
						console.log(jqXHR);
					handleNetworkError(jqXHR);
					_settings.error(jqXHR);
				},
				complete: function(jqXHR, textStatus) {
					if (_settings.debug)
						console.log(textStatus);
					if (_settings.spawnSpinner)
						$.removeSpinner();
					_settings.complete();
				}
			});
		},
		
		upload: function(options) {
			var _settings = $.extend({
				method: 'POST',
				url: ($.qs("s")!=null)?'api_post.php?s='+$.qs("s"):'api_post.php',
				//data: new FormData($("form").get(0)),
				data: {},
				datatype: 'json',
				timeout: 0,
				progress: function(e){
					if(e.lengthComputable)
						console.log( e.loaded+"/"+e.total+" - "+Math.round(e.loaded*100/e.total)+"%" );
				},
				beforeSend: function(){},
				success: function(data){},
				error: function(jqXHR){},
				complete: function(){},
				
				spawnSpinner: true,
				debug: false
			},options);
			
			$.ajax({
				method: _settings.method,
				url: _settings.url,
				contentType: false,
				data: _settings.data,
				datatype: _settings.datatype,
				timeout: _settings.timeout,
				cache: false,
				processData: false,
				enctype: 'multipart/form-data',
				xhr: function() {
					var ajXhr = $.ajaxSettings.xhr();
					if (ajXhr.upload)
						ajXhr.upload.addEventListener('progress',_settings.progress, false);
					else
						console.warn("No upload progress support.");
					return ajXhr;
				},
				beforeSend: function(jqXHR, settings) {
					if (_settings.debug)
						console.log(settings);
					if (_settings.spawnSpinner)
						$.spawnSpinner();
					_settings.beforeSend();
				},
				success: function (data, textStatus, jqXHR) {
					if (_settings.debug)
						console.log(data);
					if(data.status === 'ok')
						_settings.success(data);
					else
						$.spawnAlert({body:data.msg,color:data.color});
				},
				error: function(jqXHR, textStatus, errorThrown) {
					if (_settings.debug)
						console.log(jqXHR);
					handleError(jqXHR);
					_settings.error(jqXHR);
				},
				complete: function(jqXHR, textStatus) {
					if (_settings.debug)
						console.log(textStatus);
					if (_settings.spawnSpinner)
						$.removeSpinner();
					_settings.complete();
				}
			});
		},
	});
	
	// Bootstrap modals
	$.extend({
		spawnModal: function(options) {
			if(!$("#modal").length){
				// Modal settings
				var _settings = $.extend({
					title: '',
					body: '',
					showclose: true,
					preventclose: true,
					fadespawn: true,
					verticalcenter: false,
					size: 'md', // lg, md, sm
					buttons: [{
						label: 'Cerrar',
						dismiss: true
					}],
					customhtml: false,
					htmlcode: '<div id="modal" class="modal fade" tabindex="-1" role="dialog">'+
						'<div class="modal-dialog modal-md" role="document">'+
							'<div class="modal-content">'+
								'<div class="modal-header">'+
									'<h5 class="modal-title"></h5>'+
									'<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
										'<span aria-hidden="true">&times;</span>'+
									'</button>'+
								'</div>'+
								'<div class="modal-body"></div>'+
								'<div class="modal-footer">'+
									'<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>'+
								'</div>'+
							'</div>'+
						'</div>'+
					'</div>'
				},options);
				
				// Modal HTML code
				var _modal;
				if(!_settings.customhtml){
					_modal = '<div id="modal" class="modal'+( (_settings.fadespawn)?' fade':'' )+'" tabindex="-1" role="dialog">'+
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
				} else {
					_modal = _settings.htmlcode;
				}
				
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
						color:"primary", // primary, secondary, success, danger, warning, info, light, dark, link
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
		
		spawnRemoteModal: function(options) {
			if(!$("#modal").length){
				// Remote modal AJAX settings
				var _settings = $.extend({
					method: "POST",
					url: "",
					data: {},
					timeout: 10000,
					verticalcenter:true,
					size: "md", // lg, md, sm
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
							verticalcenter:_settings.verticalcenter,
							size: _settings.size
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
		
		removeModal: function() {
			// Hides modal and the hide event removes it from DOM
			$('#modal').modal('hide');
		},
		
	});
	
	// Top alerts
	$.extend({
		spawnAlert(options) {
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
			var _alert = '<div id="alert'+_settings.alertId+'" class="alert alert-'+_settings.color+' alert-dismissible fade show position-fixed alert-custom" role="alert">'+
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
		
		removeAlert: function(alertId,closetimeout) {
			// Removes an alert after a timeout
			setTimeout(function(){
				$('#alert'+alertId).alert("close");
			},(closetimeout!=undefined)?closetimeout:5000);
		}
		
	});
	
	// Private functions
	function handleNetworkError(jqXHR){
		switch(jqXHR.status){
			case 500: $.spawnAlert({title:"Error 500","body":"Server error when processing your request.",color:"danger"}); break;
			case 404: $.spawnAlert({title:"Error 404","body":"The requested resource coould not be found.",color:"danger"}); break;
			case 403: $.spawnAlert({title:"Error 403","body":"Access denied to the requested resource.",color:"danger"}); break;
			case 401: $.spawnAlert({title:"Error 401","body":"No permissions for the requested resource.",color:"danger"}); break;
			case 0:
				switch(jqXHR.statusText){
					case 'timeout': $.spawnAlert({title:"Timeout",body:"Waiting time has been exceeded.",color:"danger"}); break;
					case 'error': $.spawnAlert({title:"No connection",body:"No Internet connection has been detected to process your request.",color:"danger"}); break;
					default:
						$.spawnAlert({title:"Error",body:"Error "+jqXHR.statusText,color:"danger"});
				}
			break;
			
			default:
				$.spawnAlert({title:"Unknwon error",body:"Unknown error",color:"danger"});
		}
	}
	
	
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
	
	// Runs a number
	$.fn.runNumber = function(options){
		var _settings = $.extend({
			duration: 1000,
			decimalPos: 0,
			fromVal: 0,
			toVal: 100,
			delayStart: 0,
			prefix: '',
			suffix: ''
		},options);
		var container = this;
		
		$(container).text( _settings.prefix + _settings.fromVal.toFixed(_settings.decimalPos) + _settings.suffix );
		$({someValue: _settings.fromVal}).delay(_settings.delayStart).animate({someValue: _settings.toVal}, {
			duration: _settings.duration,
			step: function() {
				$(container).text( _settings.prefix + this.someValue.toFixed(_settings.decimalPos) + _settings.suffix );
			},
			complete: function() {
				$(container).text( _settings.prefix + this.someValue.toFixed(_settings.decimalPos) + _settings.suffix );
			}
		});
	};

}(jQuery));
