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
<head >
    <title>Bank Main page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        #acinf {
          position: relative;
          left: 10px;
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
				<li class="active"><a href="#">Home</a></li>
				<li><a href="http://127.0.0.1/bank/transfer.php">Money transfer</a></li>
				<li><a href="http://127.0.0.1/bank/infoupdate.php">Account update</a></li>
			</ul>
			<form action="#" method="POST">
			<ul class="nav navbar-nav navbar-right">
			  <li><a role="button" id="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			</ul>
			</form>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading"><strong id="acinf">Account info</strong></div>
					<div class="panel-body">
						<ul class="list-group">
							<li class="list-group-item"><b>Username:</b><span class="badge"><?php echo $user; ?></span></li>
							<li class="list-group-item"><b>Balance:</b><span class="badge"><?php echo $newbalance; ?></span></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"><strong>News feed</strong></div>
					<div class="panel-body" id="trans_history">
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){		
			$("#logout").click(function() {
				$.post("api.php", {"action": "logout"}, function(data) {
					if (data.success == "true") {
						document.location.href = "index.php";
					}
				});
			});
			$.post("api.php",{"action":"get_all_trans"},function (data) {
				$("#trans_history").html(data.data);
			});
		});	
	</script>
</body>
</html>