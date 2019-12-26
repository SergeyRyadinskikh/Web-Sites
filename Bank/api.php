<?php
session_start();
	
	if (!isset($_SESSION["user"])) {
		header ("location: index.php");
	}
	
	$user = $_SESSION["user"];
	$user_id = $_SESSION["user_id"];
	$balance = $_SESSION["balance"];

	$MySQLdb = new PDO("mysql:host=127.0.0.1;dbname=bank", "root", "");
	$MySQLdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST["action"])) {
	$action = $_POST["action"];

	if (isset($_POST["data"])) {
		$data = $_POST["data"];
	}
	
	if (isset($_POST["data2"])) {
		$data2 = $_POST["data2"];
	}

	header ("Content-Type: application/json");
	switch ($action) { 
		
		case "get_all_trans":
            $cursor = $MySQLdb->prepare("SELECT * FROM transactions");
            $cursor->execute();
            $retval = "";

            foreach ($cursor->fetchAll() as $row) {
                if ($row["user_id"] == $user) {
					$retval = $retval . "<div class='media'><div class='media-body text-right'><h4 class='media-heading'>You transferred to <b>".$row['username']."</b></h4><p>".$row['trans_data']."</p></div><div class='media-right'><img src='assets/pics/avatar.jpg' class='media-object' style='width:60px'></div></div>";
                } else {
					$retval = $retval . "<div class='media'><div class='media-left'><img src='assets/pics/avatar2.png' class='media-object' style='width:60px'></div><div class='media-body'><h4 class='media-heading'><b>".$row['username']."</b> recived from <b>".$row['user_id']."</b></h4><p>".$row['trans_data']."</p></div></div>";
                }
            }
            echo '{"success":true,"data":"'.$retval.'"}';
			break;
		case "transfer":
			if (empty($data)) {
				$err = "Username is required";
			} else if (empty($data2)) {
				$err = "Amount of money is required";
			} else {		
				$cursor3 = $MySQLdb->prepare("UPDATE users SET balance=balance- :newbalance WHERE username=:originaluser");
				$cursor3->execute(array(":originaluser"=>$user, ":newbalance"=>$data2));
			
				$cursor3 = $MySQLdb->prepare("UPDATE users SET balance=balance+ :newbalance WHERE username=:username");
				$cursor3->execute(array(":username"=>$data, ":newbalance"=>$data2));
				
				$cursor3 = $MySQLdb->prepare("INSERT INTO transactions (user_id,trans_data,username) values (:id,:transdata,:user)");
				$cursor3->execute(array(":id"=>$user, ":transdata"=>$data2, ":user"=>$data));
						
				if ($cursor3->rowCount()) {
					$_SESSION["newbalance"] = $balance - $data2;
					echo '{"success":"true"}';
				}
			}	
			break;		
		case "usr_update":
			$cursor3 = $MySQLdb->prepare("UPDATE users SET username=:newname WHERE id=:id");
			$cursor3->execute(array(":newname"=>$data, ":id"=>$user_id));
				if ($cursor3->rowCount()) {
					$_SESSION["user"] = $data;
					echo '{"success":"true"}';
				}
			break;		
		case "email_update":
			$cursor3 = $MySQLdb->prepare("UPDATE users SET email=:newemail WHERE id=:id");
			$cursor3->execute(array(":newemail"=>$data, ":id"=>$user_id));
				if ($cursor3->rowCount()) {
					$_SESSION["email"] = $data;
					echo '{"success":"true"}';
				}
			break;		
		case "pass_update":
			$cursor3 = $MySQLdb->prepare("UPDATE users SET password=:newpass WHERE id=:id");
			$cursor3->execute(array(":newpass"=>$data, ":id"=>$user_id));
				if ($cursor3->rowCount()) {
					$_SESSION["password"] = $data;
					echo '{"success":"true"}';
				}
			break;		
		case "age_update":
			$cursor3 = $MySQLdb->prepare("UPDATE users SET age=:newage WHERE id=:id");
			$cursor3->execute(array(":newage"=>$data, ":id"=>$user_id));
				if ($cursor3->rowCount()) {
					$_SESSION["age"] = $data;
					echo '{"success":"true"}';
				}
			break;		
		case "adress_update":
			$cursor3 = $MySQLdb->prepare("UPDATE users SET adress=:newadress WHERE id=:id");
			$cursor3->execute(array(":newadress"=>$data, ":id"=>$user_id));
				if ($cursor3->rowCount()) {
					$_SESSION["adress"] = $data;
					echo '{"success":"true"}';
				}
			break;		
		case "phone_update":
			$cursor3 = $MySQLdb->prepare("UPDATE users SET phone=:newphone WHERE id=:id");
			$cursor3->execute(array(":newphone"=>$data, ":id"=>$user_id));
				if ($cursor3->rowCount()) {
					$_SESSION["phone"] = $data;
					echo '{"success":"true"}';
				}
			break;		
		case "gender_bender":
			$cursor3 = $MySQLdb->prepare("UPDATE users SET gender=:newgender WHERE id=:id");
			$cursor3->execute(array(":newgender"=>$data, ":id"=>$user_id));
				if ($cursor3->rowCount()) {
					$_SESSION["gender"] = $data;
					echo '{"success":"true"}';
				}
			break;
			
		case "logout":
			session_destroy();
			echo '{"success":"true"}';
			break;
			
		default:
			echo '{"success":"false"}';
		die();
	}
}
?>