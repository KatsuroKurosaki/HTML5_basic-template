// jQuery function for https://github.com/daneden/animate.css
(function($){
	$.fn.animateCss = function (options) {
		var _settings = $.extend({
			effect: "bounce",
			duration: "1s",
			infinite:false,
			begin:function(){},
			end:function(){}
		},options);
		
		_settings.begin();
        this.addClass("animated "+_settings.effect+((_settings.infinite)?" infinite":"")).css("animation-duration",_settings.duration).one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",function(){
            $(this).removeClass("animated "+_settings.effect).css("animation-duration","");
			_settings.end();
        });
        return this;
    };
})(jQuery);
