
$("#logout").click(function() {
        $.post("api.php", {"action": "logout"}, function(data) {
            if (data.success == "true") {
                document.location.href = "index.php";
            }
        });
    });

	$("#name_e").click(function() {
		$("tbody").fadeOut(1000);
		$("#nameupd").fadeIn(1000);
	});	

	$("#btnname").click(function() {
		$.post("api.php", {"action":"usr_update","data":inp1.value}, function(data) {
			if (data.success == "true") {
				document.location.reload();
			}	
		});		
	});
	
	$("#email_e").click(function() {
		$("tbody").fadeOut(1000);
		$("#emailupd").fadeIn(1000);
	});
	
	$("#btnemail").click(function() {
		$.post("api.php", {"action":"email_update","data":inp2.value}, function(data) {
			if (data.success == "true") {
				document.location.reload();
			}	
		});		
	});
	
	$("#pass_e").click(function() {
		$("tbody").fadeOut(1000);
		$("#passupd").fadeIn(1000);
	});
	
	$("#btnpass").click(function() {
		$.post("api.php", {"action":"pass_update","data":inp3.value}, function(data) {
			if (data.success == "true") {
				document.location.reload();
			}	
		});		
	});
	
	$("#age_e").click(function() {
		$("tbody").fadeOut(1000);
		$("#ageupd").fadeIn(1000);
	});
	
	$("#btnage").click(function() {
		$.post("api.php", {"action":"age_update","data":inp4.value}, function(data) {
			if (data.success == "true") {
				document.location.reload();
			}	
		});		
	});
	
	$("#adress_e").click(function() {
		$("tbody").fadeOut(1000);
		$("#adressupd").fadeIn(1000);
	});
	
	$("#btnadress").click(function() {
		$.post("api.php", {"action":"adress_update","data":inp5.value}, function(data) {
			if (data.success == "true") {
				document.location.reload();
			}	
		});		
	});
	
	$("#phone_e").click(function() {
		$("tbody").fadeOut(1000);
		$("#phoneupd").fadeIn(1000);
	});
	
	$("#btnphone").click(function() {
		$.post("api.php", {"action":"phone_update","data":inp6.value}, function(data) {
			if (data.success == "true") {
				document.location.reload();
			}	
		});		
	});
	
	$("#gender_e").click(function() {
		$("tbody").fadeOut(1000);
		$("#genderupd").fadeIn(1000);
	});
	
	$("#btngender").click(function() {
		$.post("api.php", {"action":"gender_bender","data":inp7.value}, function(data) {
			if (data.success == "true") {
				document.location.reload();
			}	
		});		
	});