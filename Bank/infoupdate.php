<?php
session_start();
	
	if (!isset($_SESSION["user"])) {
		header("location: index.php");
	}
	
	$user = $_SESSION["user"];
	$user_id = $_SESSION["user_id"];
	$newbalance = $_SESSION["newbalance"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile info page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        #btn {
          position: relative;
          left: 540px;
        }
    </style>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"><b>Bank ltd</b></a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="http://127.0.0.1/bank/main.php">Home</a></li>
				<li><a href="http://127.0.0.1/bank/transfer.php">Money transfer</a></li>
				<li class="active"><a href="#">Account update</a></li>
			</ul>
			<form action="#" action="POST">
			<ul class="nav navbar-nav navbar-right">
			  <li><a href="#" id="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			</ul>
			</form>
		</div>
	</nav>

	<div class="panel panel-default">
		<div style="text-align: center;" class="panel-heading"><h3><strong>General account information</strong></h3></div>
		<div class="panel-body">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="panel panel-default">
							<div class="panel-heading"><strong id="acinf">Account info</strong></div>
							<div class="panel-body">
								<ul class="list-group">
									<li class="list-group-item"><b>Username:</b><span class="badge"><?php echo $user; ?></span></li>
									<li class="list-group-item"><b>Balance:</b><span class="badge"><?php echo $newbalance ?></span></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-offset-1 col-md-5">
						<table class="table table-hover">
							<thead>
							<tr>

							</tr>
							</thead>
							<tbody>
							<tr>
								<form action="#" method="POST">
								<div id="nameupd" hidden>
									<label for="Username">New username:</label>
									<input id="inp1" type="text" placeholder="Type here..." name="inp1">
									<button id="btnname" type="submit">Update</button>
								</div>
								</form>
								<td><strong>User name</strong></td>
								<td><?php echo $user ?></td>
								<td><a id="name_e" role="button" href="#">Edit</a></td>
							</tr>
							<tr>
								<form action="#" method="POST">
								<div id="emailupd" hidden>
									<label for="Email">New email:</label>
									<input id="inp2" type="email" placeholder="Type here..." name="inp2">
									<button id="btnemail" type="submit">Update</button>
								</div>
								</form>
								<td><strong>Email</strong></td>
								<td><u><?php echo $_SESSION["email"]; ?></u></td>
								<td><a id="email_e" role="button" href="#">Edit</a></td>
							</tr>
							<tr>
								<form action="#" method="POST">
								<div id="passupd" hidden>
									<label for="Password">New password:</label>
									<input id="inp3" type="password" placeholder="Type here..." name="inp3">
									<button id="btnpass" type="submit">Update</button>
								</div>
								</form>
								<td><strong>Password</strong></td>
								<td type="password"><?php echo $_SESSION["password"]; ?></td>
								<td><a id="pass_e" role="button" href="#">Edit</a></td>
							</tr>
							<tr>
								<form action="#" method="POST">
								<div id="ageupd" hidden>
									<label for="Age">New age:</label>
									<input id="inp4" type="number" placeholder="Type here..." name="inp4">
									<button id="btnage" type="submit">Update</button>
								</div>
								</form>
								<td><strong>Age</strong></td>
								<td><?php echo $_SESSION["age"]; ?></td>
								<td><a id="age_e" role="button" href="#">Edit</a></td>
							</tr>
							<tr>
								<form action="#" method="POST">
								<div id="adressupd" hidden>
									<label for="Adress">New adress:</label>
									<input id="inp5" type="text" placeholder="Type here..." name="inp5">
									<button id="btnadress" type="submit">Update</button>
								</div>
								</form>
								<td><strong>Adress</strong></td>
								<td><?php echo $_SESSION["adress"]; ?></td>
								<td><a id="adress_e" role="button" href="#">Edit</a></td>
							</tr>
							<tr>
								<form action="#" method="POST">
								<div id="phoneupd" hidden>
									<label for="Phone">New phone number:</label>
									<input id="inp6" type="text" placeholder="Type here..." name="inp6">
									<button id="btnphone" type="submit">Update</button>
								</div>
								</form>
								<td><strong>Phone number</strong></td>
								<td>+972<?php echo $_SESSION["phone"]; ?></td>
								<td><a id="phone_e" role="button" href="#">Edit</a></td>
							</tr>
							<tr>
								<form action="#" method="POST">
								<div id="genderupd" hidden>
									<label for="Gender">Gender Bender:</label>
									<input id="inp7" type="text" placeholder="Type here..." name="inp7">
									<button id="btngender" type="submit">Update</button>
								</div>
								</form>
								<td><strong>Gender</strong></td>
								<td><?php echo $_SESSION["gender"]; ?></td>
								<td><a id="gender_e" role="button" href="#">Edit</a></td>
							</tr>
							</tbody>
						</table>										
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="./assets/js/infoupdate.js"></script>
</body>
</html>