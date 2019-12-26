<?php
session_start();
	
	if (!isset($_SESSION["user"])) {
		header("location: index.php");
	} 
	
	if (!isset($_SESSION["total"])) {
		header ("location: main.php");
	}	
	
	$user = $_SESSION["user"];
	$user_id = $_SESSION["user_id"];
	$brand = $_SESSION["brand"];
	$fromdate = $_SESSION["newfromdate"];
	$tilldate = $_SESSION["newtilldate"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>David First Car Rental Servieces</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/contract.css">
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
					<li class="active"><a href="#">Contact</a></li>
					<li><a id="adminbtn" href="http://127.0.0.1/rental/admin.php">Admin only</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li id="loggeduser"><?php echo $user; ?></li>
					<li><a role="button" id="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				</ul>
		</div>
	</nav>	
	
	<div id="checkout" class="container">
		<div class="row">
			<div class="col-md-10">
				<div class="panel panel-default">
					<div class="panel-body">
						<h2><u>Congratulations <?php echo $user; ?> !!!</u></h2>
						</br>
						<span class="calspan"> You booked <span class="brand"><?php echo $brand; ?></span></span>
						</br></br>
						<div class="calspan">
							<span style="display:inline;padding:15px;"><i class="glyphicon glyphicon-calendar"></i> From date: <?php echo $fromdate; ?></span>
							<span style="display:inline;padding:15px;"><i class="glyphicon glyphicon-calendar"></i> Till date: <?php echo $tilldate; ?></span>
						</div>	
						</br>
						<span class="calspan">If you have any issues with your order or car</span>
						</br>
						<span class="calspan">Please contact our Administration</span>
						</br></br>
						<div class="calspan">
							<i class="fas fa-at"></i><label for="email"><u>Email</u></label>
							<p class="brand">admin@david_1.com or office@david_1.com</p>
							<i class="far fa-building"></i><label for="email"><u>Adress</u></label>
							<p class="brand">Israel - Ariel city</p>
							<i class="fas fa-phone"></i><label for="email"><u>Phone</u></label>
							<p class="brand">+9720541234567</p>
						</div>	
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
	});	
</script>	
</body>
</html>
