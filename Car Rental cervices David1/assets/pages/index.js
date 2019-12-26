
$(document).ready(function(){
	$("#register").click(function () {
		$("#login-panel").fadeOut(100);
		$("#register-panel").delay(100).fadeIn(100);
	});
	$("#login").click(function () {
		$("#register-panel").fadeOut(100);
		$("#login-panel").delay(100).fadeIn(100);
	});
	$("#contact").click(function () {
		$("#register-panel").fadeOut(100);
		$("#login-panel").fadeOut(100);
		$("#contact-panel").delay(100).fadeIn(100);
	});
	$("#login2").click(function () {
		$("#register-panel").fadeOut(100);
		$("#contact-panel").fadeOut(100);
		$("#login-panel").delay(100).fadeIn(100);
	});
});