<?php 

$error = NULL;


if(isset($_POST['submit'])){

	//Connect to the db
	$mysqli = NEW mysqli('localhost', 'root', 'Darkxkiller1999@@@', 'collectionhub_db');


	//Get form data 
	$e = $mysqli->real_escape_string($_POST['e']);
	$p = $mysqli->real_escape_string($_POST['p']);
	$p = password_hash($p, PASSWORD_DEFAULT);

	//Query the database
	$resultSet = $mysqli->query("SELECT * Collectors WHERE email = '$e' AND password = '$p' LIMIT 1");

	if($resultSet->num_rows !=0) {
		//Process login
		$row = $resultSet->fetch_assoc();
		$verified = $row['Verified'];
		$email = $row['Email'];
		$date = $row['DateRegister'];
		$date = strtotime($date);
		$date = date('M d Y', $date);

		if($verified == 1){
				//Continue Processing
				echo "Your account is verified and you have been logged in!";
				header('location:../thankyou/');
		}else{
			$error =  "This account has not yet been verified, an email was sent to $email on $date";
		}
	}else{
		
		//Invaild Credentials
		$error = "The email or password you entered is incorrect";
	}

	// unset ($_POST['submit']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Yazan">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="shortcut icon" href="../assets/icon.png" type="image/x-icon" />
	<title>CollectionHub</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../styles/login.css">
</head>

<body class="login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="../assets/logo.png" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<form method="POST" action="" class="login-validation" novalidate="">
								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="e" value="" required autofocus>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password
										<a href="/reset/forgot.html" class="float-right">
											Forgot Password?
										</a>
									</label>
									<input id="password" type="password" class="form-control" name="p" required data-eye>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Remember Me</label>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="SUBMIT" name="submit" class="btn btn-primary btn-block">
										Login
									</button>
								</div>
								<div>
                                    <center class='errorclass'>
										<?php echo $error;?>
								    </center>
                                </div>
								<div class="mt-4 text-center">
									Don't have an account? <a href="../register/">Create One</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2021 &mdash; CollectionHub
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="../js/login.js"></script>
</body>
</html>
