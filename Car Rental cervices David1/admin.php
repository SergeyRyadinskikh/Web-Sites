<?php
session_start();
	
	if ($_SESSION["user"] != "admin" && $_SESSION["user_id"] != "5") {
		echo '{"success":"false"}';
		header("location: main.php");
	} 
	
	$user = $_SESSION["user"];
	$user_id = $_SESSION["user_id"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>David First Car Rental Servieces</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/admin.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">David First Car Rental Services</a>
			</div>
				<ul class="nav navbar-nav">
					<li><a href="http://127.0.0.1/rental/main.php">Home</a></li>
					<li><a href="http://127.0.0.1/rental/preview.php">Order Preview</a></li>
					<li><a href="#">Contact</a></li>
					<li class="active"><a href="#">Admin only</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li id="loggeduser"><?php echo $user; ?></li>
					<li><a role="button" id="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				</ul>
		</div>
	</nav>	
	
	<div id="checkout" class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"><b>All orders</div>
					<div class="panel-body" id="orders">
								
					</div>
				</div>
			</div>
		</div>	
	</div>

<footer>
	<nav class="navbar navbar-inverse navbar-fixed-bottom">
	  <div class="container-fluid">
		<div class="navbar-header"></div>
		  <span class="navbottom">Copyright &copy; <?php echo date("Y")?> David-First Car Rental Services</span>
	  </div>
	</nav>			
</footer>	
<script>
	$(document).ready(function(){
		$("#logout").click(function() {
			$.post("api.php", {"action": "logout"}, function(data) {
				if (data.success == "true") {
					document.location.href = "index.php";
				}
			});
		});
		$.post("api.php",{"action":"all_orders"},function (data) {
			$("#orders").html(data.data);
		});
	});	
</script>	
</body>
</html>
