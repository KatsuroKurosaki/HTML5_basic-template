// jQuery function for https://github.com/daneden/animate.css
(function($){
	$.fn.animateCss = function (options) {
		var settings = $.extend({
			name: "bounce",
			duration: "1s",
			infinite:false,
			begin:function(){},
			end:function(){}
		},options);
		
		settings.begin();
        this.addClass("animated "+settings.name+((settings.infinite)?" infinite":"")).css("animation-duration",settings.duration).one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",function(){
            $(this).removeClass("animated "+settings.name).css("animation-duration","");
			settings.end();
        });
        return this;
    };
})(jQuery);
