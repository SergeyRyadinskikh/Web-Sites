$(document).ready(function(){
	$("#logout").click(function() {
		$.post("api.php", {"action": "logout"}, function(data) {
			if (data.success == "true") {
				document.location.href = "index.php";
			}
		});
	});
	
	$("#btncar1").click(function() {
		$("#mazdaout").hide();
		$("#mazdain").show();
	});
	$("#goback_m").click(function() {
		$("#mazdain").hide();
		$("#mazdaout").show();
	});	
	$("#btncont1").click(function() {
		$.post("api.php", {"action": "mazda","data":from_m.value,"data2":till_m.value}, function(data) {
			if (data.success == "true") {
				document.location.href = "preview.php";
			}	
		});
	});
	
	$("#btncar2").click(function() {
		$("#toyotaout").hide();
		$("#toyotain").show();		
	});
	$("#goback_t").click(function() {
		$("#toyotain").hide();
		$("#toyotaout").show();
	});
	$("#btncont2").click(function() {
		$.post("api.php", {"action": "toyota","data":from_t.value,"data2":till_t.value}, function(data) {
			if (data.success == "true") {
				document.location.href = "preview.php";
			}	
		});
	});
	
	$("#btncar3").click(function() {
		$("#nissanout").hide();
		$("#nissanin").show();		
	});
	$("#goback_n").click(function() {
		$("#nissanin").hide();
		$("#nissanout").show();
	});
	$("#btncont3").click(function() {
		$.post("api.php", {"action": "nissan","data":from_n.value,"data2":till_n.value}, function(data) {
			if (data.success == "true") {
				document.location.href = "preview.php";
			}	
		});
	});
	
	$("#btncar4").click(function() {
		$("#hyundaiout").hide();
		$("#hyundaiin").show();		
	});
	$("#goback_h").click(function() {
		$("#hyundaiin").hide();
		$("#hyundaiout").show();
	});
	$("#btncont4").click(function() {
		$.post("api.php", {"action": "hyundai","data":from_h.value,"data2":till_h.value}, function(data) {
			if (data.success == "true") {
				document.location.href = "preview.php";
			}	
		});
	});
	
	$("#btncar5").click(function() {
		$("#chevroletout").hide();
		$("#chevroletin").show();		
	});
	$("#goback_c").click(function() {
		$("#chevroletin").hide();
		$("#chevroletout").show();
	});
	$("#btncont5").click(function() {
		$.post("api.php", {"action": "chevrolet","data":from_c.value,"data2":till_c.value}, function(data) {
			if (data.success == "true") {
				document.location.href = "preview.php";
			}	
		});
	});
});