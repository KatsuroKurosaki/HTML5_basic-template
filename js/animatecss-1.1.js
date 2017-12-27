(function($){
	$.fn.animateCss = function (animationName, endFunction) {
        this.addClass("animated "+animationName).one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",function(){
            $(this).removeClass("animated "+animationName);
			if(typeof endFunction === "function"){ endFunction(); }
        });
        return this;
    };
})(jQuery);
