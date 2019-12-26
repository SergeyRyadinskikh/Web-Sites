<?php
session_start();
	
	if (!isset($_SESSION["user"])) {
		header ("location: index.php");
	}
	
	$user = $_SESSION["user"];
	$user_id = $_SESSION["user_id"];
	
	$MySQLdb = new PDO("mysql:host=127.0.0.1;dbname=david", "root", "");
	$MySQLdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST["action"])) {
	$action = $_POST["action"];

	if (isset($_POST["data"])) {
		$data = $_POST["data"];
	}	
	if (isset($_POST["data2"])) {
		$data2 = $_POST["data2"];
	}
	if (isset($_POST["data3"])) {
		$data3 = $_POST["data3"];
	}
	header ("Content-Type: application/json");
	switch ($action) { 
		
		case "all_orders":
			$cursor = $MySQLdb->prepare("SELECT username,paid FROM info");
            $cursor->execute();
            $retval = "";

            foreach ($cursor->fetchAll() as $row) {
                if ($row["username"] == $user) {
					$retval = $retval . "<div class='media'><div class='media-body text-right'><h4 class='media-heading'>You fool, you just paid <b>".$row['paid']."</b> to your self.</h4></div><div class='media-right'><img src='images/icons/avatar.jpg' class='media-object' style='width:60px'></div></div>";
                } else {
					$retval = $retval . "<div class='media'><div class='media-left'><img src='images/icons/avatar.jpg' class='media-object' style='width:60px'></div><div class='media-body'><h4 class='media-heading'><b>".$row['username']."</b> paid us <b>".$row['paid']."</b> dollars.</h4></div></div>";
                }
            }
            echo '{"success":true,"data":"'.$retval.'"}';			
			break;
		
		case "mazda":
			$cursor3 = $MySQLdb->prepare("SELECT * FROM cars WHERE brand=:car1 AND price=:prc1");
			$cursor3->execute(array(":car1"=>"Mazda 3", ":prc1"=>"250"));
			
				if ($cursor3->rowCount()) {
					$return_value = $cursor3-> fetch();
					
					$_SESSION["brand"] = $return_value["brand"];
					$_SESSION["price"] = $return_value["price"];
				}			
			$cursor3 = $MySQLdb->prepare("UPDATE users SET car_brand=:brand,from_date=:from,till_date=:till WHERE id=:id");
			$cursor3->execute(array(":brand"=>$_SESSION["brand"], ":from"=>$data, ":till"=>$data2, ":id"=>$user_id));	
			
			$cursor3 = $MySQLdb->prepare("UPDATE users SET day_sum=till_date - from_date WHERE id=:id");
			$cursor3->execute(array(":id"=>$user_id));

			$cursor4 = $MySQLdb->prepare("UPDATE users SET total=day_sum * :price WHERE id=:id");
			$cursor4->execute(array(":id"=>$user_id, ":price"=>$_SESSION["price"]));	

			$cursor5 = $MySQLdb->prepare("SELECT * FROM users WHERE username=:user");
			$cursor5->execute(array(":user"=>$user));
				
				if ($cursor5->rowCount()) {
					$newvalue = $cursor5-> fetch();
					
					$_SESSION["newfromdate"] = $newvalue["from_date"];
					$_SESSION["newtilldate"] = $newvalue["till_date"];
					$_SESSION["newdaysum"] = $newvalue["day_sum"];
					$_SESSION["newtotal"] = $newvalue["total"];													
				}				
			echo '{"success":"true"}';			
			break;	
		
		case "toyota":
			$cursor3 = $MySQLdb->prepare("SELECT * FROM cars WHERE brand=:car2 AND price=:prc2");
			$cursor3->execute(array(":car2"=>"Toyota Corolla", ":prc2"=>"230"));
			
				if ($cursor3->rowCount()) {
					$return_value = $cursor3-> fetch();
					
					$_SESSION["brand"] = $return_value["brand"];
					$_SESSION["price"] = $return_value["price"];
				}			
			$cursor3 = $MySQLdb->prepare("UPDATE users SET car_brand=:brand,from_date=:from,till_date=:till WHERE id=:id");
			$cursor3->execute(array(":brand"=>$_SESSION["brand"], ":from"=>$data, ":till"=>$data2, ":id"=>$user_id));	
			
			$cursor3 = $MySQLdb->prepare("UPDATE users SET day_sum=till_date - from_date WHERE id=:id");
			$cursor3->execute(array(":id"=>$user_id));

			$cursor4 = $MySQLdb->prepare("UPDATE users SET total=day_sum * :price WHERE id=:id");
			$cursor4->execute(array(":id"=>$user_id, ":price"=>$_SESSION["price"]));	

			$cursor5 = $MySQLdb->prepare("SELECT * FROM users WHERE username=:user");
			$cursor5->execute(array(":user"=>$user));
				
				if ($cursor5->rowCount()) {
					$newvalue = $cursor5-> fetch();
					
					$_SESSION["newfromdate"] = $newvalue["from_date"];
					$_SESSION["newtilldate"] = $newvalue["till_date"];
					$_SESSION["newdaysum"] = $newvalue["day_sum"];
					$_SESSION["newtotal"] = $newvalue["total"];													
				}
			echo '{"success":"true"}';			
			break;
			
		case "nissan":
			$cursor3 = $MySQLdb->prepare("SELECT * FROM cars WHERE brand=:car2 AND price=:prc2");
			$cursor3->execute(array(":car2"=>"Nissan Micra", ":prc2"=>"150"));
			
				if ($cursor3->rowCount()) {
					$return_value = $cursor3-> fetch();
					
					$_SESSION["brand"] = $return_value["brand"];
					$_SESSION["price"] = $return_value["price"];
				}			
			$cursor3 = $MySQLdb->prepare("UPDATE users SET car_brand=:brand,from_date=:from,till_date=:till WHERE id=:id");
			$cursor3->execute(array(":brand"=>$_SESSION["brand"], ":from"=>$data, ":till"=>$data2, ":id"=>$user_id));	
			
			$cursor3 = $MySQLdb->prepare("UPDATE users SET day_sum=till_date - from_date WHERE id=:id");
			$cursor3->execute(array(":id"=>$user_id));

			$cursor4 = $MySQLdb->prepare("UPDATE users SET total=day_sum * :price WHERE id=:id");
			$cursor4->execute(array(":id"=>$user_id, ":price"=>$_SESSION["price"]));	

			$cursor5 = $MySQLdb->prepare("SELECT * FROM users WHERE username=:user");
			$cursor5->execute(array(":user"=>$user));
				
				if ($cursor5->rowCount()) {
					$newvalue = $cursor5-> fetch();
					
					$_SESSION["newfromdate"] = $newvalue["from_date"];
					$_SESSION["newtilldate"] = $newvalue["till_date"];
					$_SESSION["newdaysum"] = $newvalue["day_sum"];
					$_SESSION["newtotal"] = $newvalue["total"];													
				}
			echo '{"success":"true"}';			
			break;

		case "hyundai":
			$cursor3 = $MySQLdb->prepare("SELECT * FROM cars WHERE brand=:car2 AND price=:prc2");
			$cursor3->execute(array(":car2"=>"Hyundai i10", ":prc2"=>"180"));
			
				if ($cursor3->rowCount()) {
					$return_value = $cursor3-> fetch();
					
					$_SESSION["brand"] = $return_value["brand"];
					$_SESSION["price"] = $return_value["price"];
				}			
			$cursor3 = $MySQLdb->prepare("UPDATE users SET car_brand=:brand,from_date=:from,till_date=:till WHERE id=:id");
			$cursor3->execute(array(":brand"=>$_SESSION["brand"], ":from"=>$data, ":till"=>$data2, ":id"=>$user_id));	
			
			$cursor3 = $MySQLdb->prepare("UPDATE users SET day_sum=till_date - from_date WHERE id=:id");
			$cursor3->execute(array(":id"=>$user_id));

			$cursor4 = $MySQLdb->prepare("UPDATE users SET total=day_sum * :price WHERE id=:id");
			$cursor4->execute(array(":id"=>$user_id, ":price"=>$_SESSION["price"]));	

			$cursor5 = $MySQLdb->prepare("SELECT * FROM users WHERE username=:user");
			$cursor5->execute(array(":user"=>$user));
				
				if ($cursor5->rowCount()) {
					$newvalue = $cursor5-> fetch();
					
					$_SESSION["newfromdate"] = $newvalue["from_date"];
					$_SESSION["newtilldate"] = $newvalue["till_date"];
					$_SESSION["newdaysum"] = $newvalue["day_sum"];
					$_SESSION["newtotal"] = $newvalue["total"];													
				}
			echo '{"success":"true"}';			
			break;
			
		case "chevrolet":
			$cursor3 = $MySQLdb->prepare("SELECT * FROM cars WHERE brand=:car2 AND price=:prc2");
			$cursor3->execute(array(":car2"=>"Chevrolet Traverse", ":prc2"=>"400"));			
				if ($cursor3->rowCount()) {
					
					$return_value = $cursor3-> fetch();
					
					$_SESSION["brand"] = $return_value["brand"];
					$_SESSION["price"] = $return_value["price"];
				}			
			$cursor3 = $MySQLdb->prepare("UPDATE users SET car_brand=:brand,from_date=:from,till_date=:till WHERE id=:id");
			$cursor3->execute(array(":brand"=>$_SESSION["brand"], ":from"=>$data, ":till"=>$data2, ":id"=>$user_id));	
			
			$cursor3 = $MySQLdb->prepare("UPDATE users SET day_sum=till_date - from_date WHERE id=:id");
			$cursor3->execute(array(":id"=>$user_id));

			$cursor4 = $MySQLdb->prepare("UPDATE users SET total=day_sum * :price WHERE id=:id");
			$cursor4->execute(array(":id"=>$user_id, ":price"=>$_SESSION["price"]));	

			$cursor5 = $MySQLdb->prepare("SELECT * FROM users WHERE username=:user");
			$cursor5->execute(array(":user"=>$user));
			
				if ($cursor5->rowCount()) {
					$newvalue = $cursor5-> fetch();
					
					$_SESSION["newfromdate"] = $newvalue["from_date"];
					$_SESSION["newtilldate"] = $newvalue["till_date"];
					$_SESSION["newdaysum"] = $newvalue["day_sum"];
					$_SESSION["newtotal"] = $newvalue["total"];													
				}
			echo '{"success":"true"}';			
			break;

		case "cardinfo":	
			$newtotal = $_SESSION["newtotal"];
			
			$cursor3 = $MySQLdb->prepare("UPDATE info SET card_number=:card,experation=:exp,sec_code=:seccode,paid=:paid WHERE username=:user");
			$cursor3->execute(array(":card"=>$data, ":exp"=>$data2, ":seccode"=>$data3, ":paid"=>$_SESSION["newtotal"], ":user"=>$user));
			
			echo '{"success":"true"}';
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