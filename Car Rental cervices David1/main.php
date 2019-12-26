<?php
session_start();
	
	if (!isset($_SESSION["user"])) {
		header("location: index.php");
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
  <link rel="stylesheet" href="./assets/css/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand">David First - Car rental services</a>
			</div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="http://127.0.0.1/rental/preview.php">Order Preview</a></li>
					<li><a href="http://127.0.0.1/rental/contact.php">Contact</a></li>
					<li><a id="admin" href="http://127.0.0.1/rental/admin.php">Admin only</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li id="loggeduser"><?php echo $user; ?></li>
					<li><a role="button" id="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				</ul>
		</div>
	</nav>
		<div class="h2">
			<h2><b>David First - We never out of stock</b></h2>
		</div>	
	<div id="carcont" class="container">
		<div class="row" >
			<div class="col-sm-10">
				<div class="panel-group">
					<div class="panel panel-primary">
						<div class="panel-body">
							<div id="mazdaout" class="container">
								<div class="row">
									<div class="col-sm-3">
										<img src="assets/images/icons/mazda3.png">
									</div>
									<div class="col-sm-4">
										<table class="table">
											<thead>
												<tr>
													<th><u>Mazda 3</u> or similar</th>
												</tr>
											</thead>
											<tbody>
											    <tr>
													<td><i class="fas fa-child"></i> 5 seats</td>
													<td><i class="fas fa-shopping-bag"></i> 3 Big Bags</td>
											    </tr>
												<tr>
													<td><i class="fa fa-gear"></i> Automatic gear</td>
													<td><i class="fas fa-dollar-sign"></i> Price 250 $</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="col-sm-3">
										<button type="submit" class="btncar" id="btncar1">Reserve now</button>
									</div>
								</div>
							</div>
							<div id="mazdain" class="container" hidden>
								<div class="row">
									<div class="col-sm-3">
										<img src="assets/images/icons/mazda3.png">
									</div>
									<div class="col-sm-4">
										<form action="#" method="POST">
											<h4><b><u><?php echo $user; ?> please choose date</b></u></h4>
											</br>
												<i class="glyphicon glyphicon-calendar"></i> Check In 
											<input type="date" id="from_m" name="from_m" required></br></br>						
												<i class="glyphicon glyphicon-calendar"></i> Check Out 
											<input type="date" id="till_m" name="till_m" required> 
										</form>	
									</div>		
									<div class="col-sm-3">
										<button id="btncont1" class="btncar" type="submit">Order Now</button>
										</br></br>
										<a class="backbtn" id="goback_m" role="button" href="#">go back</a>
									</div>																				
								</div>
							</div>
						</div>
					</div>								
				</div>
			</div>
		</div>
	</div>
	<div id="carcont" class="container" >
		<div class="row" >
			<div class="col-sm-10">
				<div class="panel-group">
					<div class="panel panel-primary" >
						<div class="panel-body">
							<div id="toyotaout" class="container">
								<div class="row">
									<div class="col-sm-3">
										<img src="assets/images/icons/toyota.png">
									</div>
									<div class="col-sm-4">
										<table class="table">
											<thead>
												<tr>
													<th><u>Toyota Corolla</u> or similar</th>
												</tr>
											</thead>
											<tbody>
											    <tr>
													<td><i class="fas fa-child"></i> 5 seats</td>
													<td><i class="fas fa-shopping-bag"></i> 2 Big Bags</td>
											    </tr>
												<tr>
													<td><i class="fa fa-gear"></i> Manual gear</td>
													<td><i class="fas fa-dollar-sign"></i> Price 230 $</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="col-sm-3">
										<button type="submit" class="btncar" id="btncar2">Reserve now</button>
									</div>
								</div>
							</div>
							<div id="toyotain" class="container" hidden>
								<div class="row">
									<div class="col-sm-3">
										<img src="assets/images/icons/toyota.png">
									</div>
									<div class="col-sm-4">
										<form action="#" method="POST">
											<h4><b><u><?php echo $user; ?> please choose date</b></u></h4>
											</br>
												<i class="glyphicon glyphicon-calendar"></i> Check In 
											<input type="date" id="from_t" name="from_t" required></br></br>						
												<i class="glyphicon glyphicon-calendar"></i> Check Out 
											<input type="date" id="till_t" name="till_t" required> 
										</form>	
									</div>		
									<div class="col-sm-3">
										<button id="btncont2" class="btncar" type="submit">Order Now</button>
										</br></br>
										<a class="backbtn" id="goback_t" role="button" href="#">go back</a>
									</div>																				
								</div>
							</div>
						</div>
					</div>								
				</div>
			</div>
		</div>
	</div>
	<div id="carcont" class="container" >
		<div class="row" >
			<div class="col-sm-10">
				<div class="panel-group">
					<div class="panel panel-primary" >
						<div class="panel-body">
							<div id="nissanout" class="container">
								<div class="row">
									<div class="col-sm-3">
										<img src="assets/images/icons/nissan.png">
									</div>
									<div class="col-sm-4">
										<table class="table">
											<thead>
												<tr>
													<th><u>Nissan Micra</u> or similar</th>
												</tr>
											</thead>
											<tbody>
											    <tr>
													<td><i class="fas fa-child"></i> 5 seats</td>
													<td><i class="fas fa-shopping-bag"></i> 1 Big Bags</td>
											    </tr>
												<tr>
													<td><i class="fa fa-gear"></i> Automatic gear</td>
													<td><i class="fas fa-dollar-sign"></i> Price 150 $</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="col-sm-3">
										<button type="submit" class="btncar" id="btncar3">Reserve now</button>
									</div>
								</div>
							</div>
							<div id="nissanin" class="container" hidden>
								<div class="row">
									<div class="col-sm-3">
										<img src="assets/images/icons/nissan.png">
									</div>
									<div class="col-sm-4">
										<form action="#" method="POST">
											<h4><b><u><?php echo $user; ?> please choose date</b></u></h4>
											</br>
												<i class="glyphicon glyphicon-calendar"></i> Check In 
											<input type="date" id="from_n" name="from_n" required></br></br>						
												<i class="glyphicon glyphicon-calendar"></i> Check Out 
											<input type="date" id="till_n" name="till_n" required> 
										</form>	
									</div>		
									<div class="col-sm-3">
										<button id="btncont3" class="btncar" type="submit">Order Now</button>
										</br></br>
										<a class="backbtn" id="goback_n" role="button" href="#">go back</a>
									</div>																				
								</div>
							</div>
						</div>
					</div>								
				</div>
			</div>
		</div>
	</div>
	<div id="carcont" class="container" >
		<div class="row" >
			<div class="col-sm-10">
				<div class="panel-group">
					<div class="panel panel-primary" >
						<div class="panel-body">
							<div id="hyundaiout" class="container">
								<div class="row">
									<div class="col-sm-3">
										<img src="assets/images/icons/hyundai.png">
									</div>
									<div class="col-sm-4">
										<table class="table">
											<thead>
												<tr>
													<th><u>Hyundai i10</u> or similar</th>
												</tr>
											</thead>
											<tbody>
											    <tr>
													<td><i class="fas fa-child"></i> 4 seats</td>
													<td><i class="fas fa-shopping-bag"></i> 2 Big Bags</td>
											    </tr>
												<tr>
													<td><i class="fa fa-gear"></i> Automatic gear</td>
													<td><i class="fas fa-dollar-sign"></i> Price 180 $</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="col-sm-3">
										<button type="submit" class="btncar" id="btncar4">Reserve now</button>
									</div>
								</div>
							</div>
							<div id="hyundaiin" class="container" hidden>
								<div class="row">
									<div class="col-sm-3">
										<img src="assets/images/icons/hyundai.png">
									</div>
									<div class="col-sm-4">
										<form action="#" method="POST">
											<h4><b><u><?php echo $user; ?> please choose date</b></u></h4>
											</br>
												<i class="glyphicon glyphicon-calendar"></i> Check In 
											<input type="date" id="from_h" name="from_h" required></br></br>						
												<i class="glyphicon glyphicon-calendar"></i> Check Out 
											<input type="date" id="till_h" name="till_h" required> 
										</form>	
									</div>		
									<div class="col-sm-3">
										<button id="btncont4" class="btncar" type="submit">Order Now</button>
										</br></br>
										<a class="backbtn" id="goback_h" role="button" href="#">go back</a>
									</div>																				
								</div>
							</div>
						</div>
					</div>								
				</div>
			</div>
		</div>
	</div>
	<div id="carcont" style="padding-bottom: 50px;" class="container" >
		<div class="row" >
			<div class="col-sm-10">
				<div class="panel-group">
					<div class="panel panel-primary" >
						<div class="panel-body">
							<div id="chevroletout" class="container">
								<div class="row">
									<div class="col-sm-3">
										<img src="assets/images/icons/chevrolet.png">
									</div>
									<div class="col-sm-4">
										<table class="table">
											<thead>
												<tr>
													<th><u>Chevrolet Traverse</u></th>
												</tr>
											</thead>
											<tbody>
											    <tr>
													<td><i class="fas fa-child"></i> 8 seats</td>
													<td><i class="fas fa-shopping-bag"></i> 4 Big Bags</td>
											    </tr>
												<tr>
													<td><i class="fa fa-gear"></i> Automatic gear</td>
													<td><i class="fas fa-dollar-sign"></i> Price 400 $</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="col-sm-3">
										<button type="submit" class="btncar" id="btncar5">Reserve now</button>
									</div>
								</div>
							</div>
							<div id="chevroletin" class="container" hidden>
								<div class="row">
									<div class="col-sm-3">
										<img src="assets/images/icons/chevrolet.png">
									</div>
									<div class="col-sm-4">
										<form action="#" method="POST">
											<h4><b><u><?php echo $user; ?> please choose date</b></u></h4>
											</br>
												<i class="glyphicon glyphicon-calendar"></i> Check In 
											<input type="date" id="from_c" name="from_c" required></br></br>						
												<i class="glyphicon glyphicon-calendar"></i> Check Out 
											<input type="date" id="till_c" name="till_c" required> 
										</form>	
									</div>		
									<div class="col-sm-3">
										<button id="btncont5" class="btncar" type="submit">Order Now</button>
										</br></br>
										<a class="backbtn" id="goback_c" role="button" href="#">go back</a>
									</div>																				
								</div>
							</div>
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
<script src="./assets/pages/main.js"></script>	
</body>
</html>
