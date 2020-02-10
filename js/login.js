$(window).on("load", function () {
	$("form").css("display", "").on("submit", function (e) {
		e.preventDefault();
		$.api({
			data: {
				op: 'HELLO'
			},
			success: function (data) {
				$.spawnAlert({
					body: data.msg
				});
			}
		});
	}).animateCss({
		effect: "zoomIn",
		end: function () {
			$("form input:first").focus();
		}
	});
});