<?php
session_start();
	if (isset($_SESSION["user"])) {
		header ("location: main.php");
	}
	$MySQLdb = new PDO("mysql:host=127.0.0.1;dbname=david", "root", "");
	$MySQLdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if (isset($_POST["r_username"]) && isset($_POST["r_password"]) && isset($_POST["r_email"])) {
	
	$name = test_input($_POST["r_username"]);
	$pass = test_input($_POST["r_password"]);
	$email = test_input($_POST["r_email"]);
	
	$cursor = $MySQLdb->prepare("SELECT * FROM users WHERE username=:username");
	$cursor->execute(array(":username"=>$_POST["r_username"]));
	
	$cursor2 = $MySQLdb->prepare("SELECT * FROM users WHERE email=:email");
	$cursor2->execute(array(":email"=>$_POST["r_email"]));
	
	if (empty($name)) {
		$msg = "Username is required";
	} else if (empty($pass)) {
		$msg = "Password is required";
	} else if (empty($email)) {
		$msg = "Email is required";
	} else if ($cursor->rowCount()) {
		$msg = "username or password allready exist.";
	} else if ($cursor2->rowCount()) {
		$msg = "email allready exist.";
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$msg = "Invalid email format";
	} else if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
		$msg = "Only letters and white space allowed";
	} else {
		$cursor = $MySQLdb->prepare("INSERT INTO users (username, password, email) value (:username,:password,:email)");
		$cursor->execute(array(":username"=>$_POST["r_username"], ":password"=>$_POST["r_password"], ":email"=>$_POST["r_email"]));
		
		$cursor = $MySQLdb->prepare("INSERT INTO info (username) value (:username)");
		$cursor->execute(array(":username"=>$_POST["r_username"]));
		
		$msg = "Regestry succeeded";
	}
	
} else if (isset($_POST["l_username"]) && isset($_POST["l_password"])) {
	
	$cursor = $MySQLdb->prepare("SELECT * FROM users WHERE username=:username AND password=:password");
	$cursor->execute(array(":username"=>$_POST["l_username"], ":password"=>$_POST["l_password"]));
	
	if ($cursor->rowCount()) {
		$return_value = $cursor-> fetch();
		
		$_SESSION["user"] = $return_value["username"];
		$_SESSION["user_id"] = $return_value["id"];
		$_SESSION["email"] = $return_value["email"];
		$_SESSION["password"] = $return_value["password"];
		$_SESSION["fromdate"] = $return_value["from_date"];
		$_SESSION["tilldate"] = $return_value["till_date"];
		$_SESSION["daysum"] = $return_value["day_sum"];
		$_SESSION["total"] = $return_value["total"];
		
		header ("location: main.php");
	} else {
		$msg = "Wrong username or password";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>David First Car Rental Servieces</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="well well-sm">
		<h1><strong>David First - Cars rental services</strong></h1>
	</div>	
	<div class="container-row">
		<div id="logon" class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-body" id="login-panel">
					<form action="#" method="POST">
					<div class="form-group">
						<label for="Username">Username:</label>
						<input type="text" class="form-control" id="l_username" placeholder="Enter username" name="l_username">
					</div>
					<div class="form-group">
						<label for="pwd">Password:</label>
						<input type="password" class="form-control" id="l_password" placeholder="Enter password" name="l_password">
					</div>
						<button type="submit" class="btn">Submit</button><br>
						<div class="regspan">
							<span>If you are new user, please register </span><a href="#" id="register">here</a>						
						</div>	
							<a href="#" id="contact">Forgot Passord ?</a>
						<?php
							if (isset($msg)) {
								echo "<div class='alert alert-info'><strong>Info: </strong>" . $msg . "</div>";
							}
						?>
					</form>
				</div>
				<div class="panel-body" id="register-panel" hidden>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
					<div class="form-group">
						<h4>Enter your credentials bellow:</h4>
						<label for="Username">Username:</label>
						<input type="text" class="form-control" id="r_username" placeholder="Enter username" name="r_username">
					</div>
					<div class="form-group">
						<label for="pwd">Password:</label>
						<input type="password" class="form-control" id="r_password" placeholder="Enter password" name="r_password">
					</div>
					<div class="form-group">
						<label for="pwd">Email:</label>
						<input type="email" class="form-control" id="r_email" placeholder="Enter email" name="r_email">
					</div>
						<button type="submit" class="btn btn-default">Submit</button><br>
					<div class="regspan">	
						<span>To go back to Login page, click </span><a href="#" id="login">here</a>
					</div>		
				</div>					
				<div class="panel-body" id="contact-panel" hidden>
					<div class="contact">
						<h4><u>Please contact us to reset your password: </u></h4>
						<p>office@david_1.com</p>
						<span>To go back to Login page, click </span><a href="#" id="login2">here</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="./assets/pages/index.js"></script>
</body>
</html>