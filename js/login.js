$(window).on("load", function () {
	$("form input:first").focus();
});

function submitLogin() {
	$.api({
		data: $("form.form-signin").serializeForm(),
		success: function (data) {

		}
	});
}