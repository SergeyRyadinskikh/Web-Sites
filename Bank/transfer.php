<?php
session_start();
	
	if (!isset($_SESSION["user"])) {
		header ("location: index.php");
	}
	
	$user = $_SESSION["user"];
	$user_id = $_SESSION["user_id"];
	$newbalance = $_SESSION["newbalance"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Money Transfer Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        #headr {
          position: relative;
          left: 15px;
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
                <li class="active"><a href="#">Money transfer</a></li>
                <li><a href="http://127.0.0.1/bank/infoupdate.php">Account update</a></li>
            </ul>
			
			<ul class="nav navbar-nav navbar-right">
			  <li><a href="#" id="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			</ul>
        </div>
    </nav>

    <div class="container">
	<div style="text-align: center;" class="panel-heading"><h3><strong>Money Transaction</strong></h3></div>
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
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Enter info of your recipient, bellow</div>
                <div class="panel-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                        <div id="usr" class="form-group">
                            <label for="fname">Username:</label>
                            <input type="text" class="form-control" id="t_user" name="t_user" placeholder="Enter Username"></br>
                            <label for="amount">Money amount:</label>
                            <input type="number" class="form-control" id="t_amount" name="t_amount" placeholder="Enter Money amount">
                        </div>
                        <button type="submit" id="transfer" class="btn btn-default">Transfer</button>
						<span>
							<?php
								if (isset($err)) {
									echo "<div class='alert alert-info'><strong>Error:</strong>".$err."</div>";
								}
							?>	
						</span>
                    </form>
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
		
		$("#transfer").click(function() {
			$.post("api.php", {"action": "transfer","data":t_user.value,"data2":t_amount.value}, function(data) {
				if (data.success == "true" && data2.success == "true") {
					document.location.reload();
				}
			});
		});
	});	
</script>
</body>
</html>