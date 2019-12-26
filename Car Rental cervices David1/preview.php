<?php
session_start();
	
	if (!isset($_SESSION["user"])) {
		header("location: index.php");
	}
	
	$user = $_SESSION["user"];
	$user_id = $_SESSION["user_id"];
	$brand = $_SESSION["brand"];
	$price = $_SESSION["price"];
	$fromdate = $_SESSION["newfromdate"];
	$tilldate = $_SESSION["newtilldate"];
	$daysum = $_SESSION["newdaysum"];
	$total = $_SESSION["newtotal"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>David First Car Rental Servieces</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/preview.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">David First - Car Rental Services</a>
			</div>
				<ul class="nav navbar-nav">
					<li><a href="http://127.0.0.1/rental/main.php">Home</a></li>
					<li class="active"><a href="#">Order Preview</a></li>
					<li><a href="http://127.0.0.1/rental/contact.php">Contact</a></li>
					<li><a href="http://127.0.0.1/rental/admin.php">Admin only</a></li>
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
					<div class="panel-body">
						<h2><u>Order Preview</u></h2>
						</br>
						<span class="calspan">You chose </span><span class="carselect"><?php echo $brand; ?></span>
						</br></br>
							<div class="calspan">
								<span style="display:inline;padding:15px;"><i class="glyphicon glyphicon-calendar"></i> From date: <?php echo $fromdate; ?></span>
								<span style="display:inline;padding:15px;"><i class="glyphicon glyphicon-calendar"></i> Till date: <?php echo $tilldate; ?></span>
							</div>	
						</br>						
						<span class="calspan">and the price for <u><?php echo $daysum; ?></u> days is <u><?php echo $total; ?> <i class="glyphicon glyphicon-usd"></i></u></span>
						</br></br>
						<span class="calspan">Please fill your credit card info:</span>
						</br></br>
						<div class="col-md-10 col-md-offset-1">
							<form action="#" method="POST">
								<div class="input-group">
									<span class="input-group-addon"><b>Card Number</b></span>
									<input type="text" id="cardinp" name="cardinp" class="form-control" placeholder="last 4 digits">
								</div>
								</br>
								<div class="input-group">
									<span class="input-group-addon"><b>Expiration Date</b></span>
									<input type="text" id="expinp" name="expinp" class="form-control" placeholder="MM/YY">
								</div>
								</br>
								<div class="input-group">
									<span class="input-group-addon"><b>Security Code</b></span>
									<input type="text" id="codeinp" name="codeinp" class="form-control" placeholder="3 digits">
								</div>
								</br></br>
								<button class="btncard" type="submit" id="btncard">Procced to check-out</button>
							</form>	
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

<script src="./assets/pages/preview.js"></script>	
</body>
</html>
