
$(document).ready(function(){
	$("#logout").click(function() {
		$.post("api.php", {"action": "logout"}, function(data) {
			if (data.success == "true") {
				document.location.href = "index.php";
			}
		});
	});
	
	$("#btncard").click(function() {
		$.post("api.php", {"action": "cardinfo","data":cardinp.value,"data2":expinp.value,"data3":codeinp.value}, function(data) {
			if (data.success == "true") {
				document.location.href = "contact.php";
			}	
		});
	});
});