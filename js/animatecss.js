"use strict";
// jQuery function for https://github.com/daneden/animate.css
(function($) {
	$.fn.animateCss = function(options) {
		var _settings = $.extend({}, $.fn.animateCss.defaults, options);

		_settings.begin.call(this);
		this.addClass("animated " + _settings.effect+ ((_settings.infinite) ? " infinite" : ""));
		this.css("animation-duration", _settings.duration);
		this.css("animation-delay", _settings.delay);
		this.one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",function(){
			$(this).removeClass("animated " + _settings.effect);
			$(this).css("animation-duration", "");
			$(this).css("animation-delay", "");
			_settings.end.call(this);
		});
		
		return this;
	};

	$.fn.animateCss.defaults = {
		effect:		"bounce",		// One of the effects on the list above.
		duration:	"1s",			// Amount of seconds that the effect will be active.
		delay:		"0s",			// Amount of seconds before the effect begins.
		infinite:	false,			// Will the effect run infinitely?
		begin:		function(){},	// Function to execute before the effect starts. Doesn't care about delay.
		end:		function(){}	// Function to execute when the effect ends. Won't run if infinite:true!
	}
}(jQuery));

/*
 * TO DO: - Check if an effect exists:
 * https://stackoverflow.com/questions/983586/how-can-you-determine-if-a-css-class-exists-with-javascript -
 * Delay classes: delay-1s delay-2s delay-3s delay-4s delay-5s - Animation
 * classes: slow(2s) slower(3s) fast(800ms) faster(500ms)
 */
