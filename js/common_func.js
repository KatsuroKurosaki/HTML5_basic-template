(function($){
	
	$.extend({
		spawnSpinner: function(text) {
			if($("#spinner").length==0){
				$("body").append('<div id="spinner">'+
					'<div class="cog">'+
					'<div><i class="fa fa-2x fa-cog fa-spin"></i></div>'+
					'<div>'+((text!=undefined)?text:"Cargando...")+'</div>'+
				'</div></div>');
			}
		},
		removeSpinner: function(action) {
			$("#spinner").fadeOut("fast",function(){
				$(this).remove();
			});
		},
		
		spawnAlert(text,cssclass,showBefore,timeout){
			/*if(timeout==undefined){timeout=7000;}
			var alertId = new Date().getTime();
			$('<div id="alert-'+alertId+'" class="alert alert-'+cssclass+' alert-dismissible fade in" style="display:none;" role="alert">'+text+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>').insertBefore(showBefore);
			$('#alert-'+alertId).slideDown("slow",function(){ setTimeout(function(){ $('#alert-'+alertId).slideUp("slow",function(){ $('#alert-'+alertId).remove(); }); },timeout); });*/
		},
		spawnTopAlert(text,cssclass,timeout){
			/*if(timeout==undefined){timeout=7000;}
			var alertId = new Date().getTime();
			$('<div id="alert-'+alertId+'" class="alert alert-'+cssclass+' alert-dismissible fade in alertclass" style="display:none;" role="alert">'+text+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>').appendTo("body");
			$('#alert-'+alertId).slideDown("slow",function(){ setTimeout(function(){ $('#alert-'+alertId).slideUp("slow",function(){ $('#alert-'+alertId).remove(); }); },timeout); });*/
			alertId = $.now();
			$("body").append('<div class="alert alert-warning alert-dismissible fade show" role="alert">'+
				'<strong>Holy guacamole!</strong> You should check in on some of those fields below.'+
				'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
				'<span aria-hidden="true">&times;</span>'+
				'</button>'+
			'</div>');
		},
		
		qs: function(key) {
			key = key.replace(/[*+?^$.\[\]{}()|\\\/]/g, "\\$&"); // escape RegEx control chars
			var match = location.search.match(new RegExp("[?&]" + key + "=([^&]+)(&|$)"));
			return match && decodeURIComponent(match[1].replace(/\+/g, " "));
		},
		
		sec2dhms: function(sec) {
			if(sec==""){return '';}else{return parseInt(sec/86400)+'d '+(new Date(sec%86400*1000)).toUTCString().replace(/.*(\d{2}):(\d{2}):(\d{2}).*/, "$1:$2:$3");}
		},
		
		bytes2humanReadable: function(a,b,c,d,e) {
			// Divide by 1024
			if(a==""){return '';}else{return (b=Math,c=b.log,d=1024,e=c(a)/c(d)|0,a/b.pow(d,e)).toFixed(2)+' '+(e?'KMGTPEZY'[--e]+'iB':'Bytes');}
		},
		
		bits2humanReadable: function(a,b,c,d,e) {
			// Divide by 1000
			return (b=Math,c=b.log,d=1e3,e=c(a)/c(d)|0,a/b.pow(d,e)).toFixed(2)+' '+(e?'kMGTPEZY'[--e]+'B':'Bytes')
		},
		
		uts2dt: function(ts) {
			if(ts!=undefined){
				var date = new Date(ts*1000);
				return date.getFullYear() + "/"
					+ (((date.getMonth()+1)<10)	?	"0"+(date.getMonth()+1)	:	(date.getMonth()+1)) + "/"
					+ ((date.getDate()<10)		?	"0"+date.getDate()		:	date.getDate()) + " "
					+ ((date.getHours()<10)		?	"0"+date.getHours()		:	date.getHours()) + ":"
					+ ((date.getMinutes()<10)	?	"0"+date.getMinutes()	:	date.getMinutes()) + ":"
					+ ((date.getSeconds()<10)	?	"0"+date.getSeconds()	:	date.getSeconds()) ;
			} else { return ""; }
		},
		
		isValidDate: function(d,m,y) {
			var date = new Date(y,m-1,d);
			return ( date.getFullYear() == y && (date.getMonth() + 1) == m && date.getDate() == d );
		}
	});
	
	// Another example $("element").greenify({"color":"#ABCDEF"});
	$.fn.greenify = function(options) {
		var settings = $.extend({
			// These are the defaults.
			color: "#556b2f"
		}, options );
		
		this.css("color",settings.color);
		return this; // This allows this function to be chained.
	};
	
	$.fn.serializeArrayFull = function() {
		values = this.serializeArray();
		values = values.concat(
			this.find("input[type='checkbox']:not(:checked)").map(function() {
				return {"name": this.name, "value": "off"}
			}).get()
		);
		
		return values;
	};

})(jQuery);
