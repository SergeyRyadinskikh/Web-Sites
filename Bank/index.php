<?php
session_start();
	if (isset($_SESSION["user"])) {
		header ("location: main.php");
	}
	$MySQLdb = new PDO("mysql:host=127.0.0.1;dbname=bank", "root", "");
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
		$cursor = $MySQLdb->prepare("INSERT INTO users (username, password) value (:username,:password)");
		$cursor->execute(array(":username"=>$_POST["r_username"], ":password"=>$_POST["r_password"]));
		$msg = "Regestry succeeded";
	}
	
} else if (isset($_POST["l_username"]) && isset($_POST["l_password"])) {
	
	$cursor = $MySQLdb->prepare("SELECT * FROM users WHERE username=:username AND password=:password");
	$cursor->execute(array(":username"=>$_POST["l_username"], ":password"=>$_POST["l_password"]));
	
	if ($cursor->rowCount()) {
		$return_value = $cursor-> fetch();
		
		$_SESSION["user"] = $return_value["username"];
		$_SESSION["user_id"] = $return_value["id"];
		$_SESSION["balance"] = $return_value["balance"];
		$_SESSION["newbalance"] = $return_value["balance"];
		$_SESSION["email"] = $return_value["email"];
		$_SESSION["password"] = $return_value["password"];
		$_SESSION["age"] = $return_value["age"];
		$_SESSION["adress"] = $return_value["adress"];
		$_SESSION["phone"] = $return_value["phone"];
		$_SESSION["gender"] = $return_value["gender"];
		
		header ("location: main.php");
	} else {
		$msg = "Wrong username or password";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login/Register Bank</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="well well-sm" style="text-align: center;">
		<h1><strong>Bank ltd.</strong></h1>
	</div>

	<div class="container-row">
		<div class="col-md-3 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Welcome to Bank ltd.</strong></div>
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
							<button type="submit" class="btn btn-default">Submit</button><br>
							<a href="#" id="register"><i class="glyphicon glyphicon-info-sign"></i>register</a>
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
							<a href="#" id="login"><i class="glyphicon glyphicon-info-sign"></i>login</a>
					</div>	
			</div>
		</div>
	</div>	
	<div>
		<img src="./assets/pics/logo.jpeg" style="width:950px;height:600px;" alt="Bank logo">
	</div>
<script>
		$("#register").click(function () {
			$("#login-panel").fadeOut(1000);
			$("#register-panel").delay(1000).fadeIn(1000);
		});
		$("#login").click(function () {
			$("#register-panel").fadeOut(1000);
			$("#login-panel").delay(1000).fadeIn(1000);
		});	
</script>
</body>
</html>