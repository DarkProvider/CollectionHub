<?php


if(isset($_GET['vkey'])){
	//Proccess verification
	$vkey = $_GET['vkey'];

	$mysqli = NEW mysqli('localhost', 'root', 'Darkxkiller1999@@@','collectionhub_db');

	$resultSet = $mysqli->query("SELECT verified,vkey FROM Collectors WHERE verified = 0 AND vkey = '$vkey' LIMIT 1");

	if($resultSet->num_rows == 1){
		//Validate the email
		$update = $mysqli->query("UPDATE Collectors SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");



	}else{
		echo "This account is invalid or already is verified!";
	}

} else{

	die("Something went wrong!");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta name="author" content="Yazan">
	<link rel="shortcut icon" href="../assets/icon.png" type="image/x-icon" />
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>CollectionHub</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../styles/login.css">
</head>
<body class="verify-page">
    
    <div class="verifydiv">
        <h3>You have successfully verified your email!</h3>
        <img src="../assets/verified.svg" alt="Verified">
    </div>
	<div>
		<center>
			<?php
				if($update){
					echo "";
				} else{
					echo $mysqli->error;
				}
			?>
		</center>	
	</div>

	<div class="redirectbutton">

		<button onclick="window.location.href='https://collectionhub.digital/login';">Click here to login</button>

	</div>

	


</body>
</html>