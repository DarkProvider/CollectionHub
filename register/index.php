<?php

$error = NULL;

//If clicked on the submit button, excute the following:
if (isset($_POST['submit'])) {


    //Get from data
    $u = $_POST['u'];
    $p = $_POST['p'];
    $p2 = $_POST['p2'];
    $e = $_POST['e'];

    if (strlen($u) < 5){

        $error .= "<p>Your username must be at least 5 characters long!</p>";

    }elseif ($p2 != $p) {

        $error = "<p>Your passwords do not match!</p>";

    }else {
    //Form is valid

    //Connect to db
        
        $mysqli = NEW mysqli('localhost', 'root', 'Darkxkiller1999@@@', 'collectionhub_db');

        //Santize form data
        $u = $mysqli->real_escape_string($u);
        $p = $mysqli->real_escape_string($p);
        $p2 = $mysqli->real_escape_string($p2);
        $e = $mysqli->real_escape_string($e);

        //Generates a random key with the current time assigned to that specific user
        $vkey = md5(time().$u);

        //Insert account into the db
        $p = password_hash($p, PASSWORD_DEFAULT);
        $insert = $mysqli->query("INSERT INTO Collectors(username,password,email,vkey)
        VALUES('$u', '$p', '$e', '$vkey')");


    }

}

	if($insert) {
		//Send Email 
		$to = $e;
		$subject = "CollectionHub Email Verification";
		// $message = '<html><body>';
		// $message .= "<h1 style='color:#f40;'>Hey there!</h1>";
		// $message .= "<p style='color:#080;font-size:18px;'>This is your verification link</p>";
		// $message .= "<a href='https://collectionhub.digital/registeration/verify.php?vkey=$vkey'>Verify Account</a>";
		// $message .= "</body></html>";
		
        $message = '<!DOCTYPE html>';
        $message .= '<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">';
        $message .= '<head>';
        $message .= '<meta charset="utf-8">';
        $message .= '<meta name="viewport" content="width=device-width">';
        $message .= '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
        $message .= '<meta name="x-apple-disable-message-reformatting">';
        $message .= '<title></title>';
        $message .= '';
        $message .= '<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">';
        $message .= '';
        $message .= '';
        $message .= '<style>';
        $message .= '';
        $message .= '';
        $message .= 'html,';
        $message .= 'body {';
        $message .= 'margin: 0 auto !important;';
        $message .= 'padding: 0 !important;';
        $message .= 'height: 100% !important;';
        $message .= 'width: 100% !important;';
        $message .= 'background: #f1f1f1;';
        $message .= '}';
        $message .= '';
        $message .= '* {';
        $message .= '-ms-text-size-adjust: 100%;';
        $message .= '-webkit-text-size-adjust: 100%;';
        $message .= '}';
        $message .= '';
        $message .= '';
        $message .= 'div[style*="margin: 16px 0"] {';
        $message .= 'margin: 0 !important;';
        $message .= '}';
        $message .= '';
        $message .= '';
        $message .= 'table,';
        $message .= 'td {';
        $message .= 'mso-table-lspace: 0pt !important;';
        $message .= 'mso-table-rspace: 0pt !important;';
        $message .= '}';
        $message .= '';
        $message .= '';
        $message .= 'table {';
        $message .= 'border-spacing: 0 !important;';
        $message .= 'border-collapse: collapse !important;';
        $message .= 'table-layout: fixed !important;';
        $message .= 'margin: 0 auto !important;';
        $message .= '}';
        $message .= '';
        $message .= '';
        $message .= 'img {';
        $message .= '-ms-interpolation-mode:bicubic;';
        $message .= '}';
        $message .= '';
        $message .= '';
        $message .= 'a {';
        $message .= 'text-decoration: none;';
        $message .= '}';
        $message .= '';
        $message .= '';
        $message .= '*[x-apple-data-detectors],';
        $message .= '.unstyle-auto-detected-links *,';
        $message .= '.aBn {';
        $message .= 'border-bottom: 0 !important;';
        $message .= 'cursor: default !important;';
        $message .= 'color: inherit !important;';
        $message .= 'text-decoration: none !important;';
        $message .= 'font-size: inherit !important;';
        $message .= 'font-family: inherit !important;';
        $message .= 'font-weight: inherit !important;';
        $message .= 'line-height: inherit !important;';
        $message .= '}';
        $message .= '';
        $message .= '';
        $message .= '.a6S {';
        $message .= 'display: none !important;';
        $message .= 'opacity: 0.01 !important;';
        $message .= '}';
        $message .= '';
        $message .= '';
        $message .= '.im {';
        $message .= 'color: inherit !important;';
        $message .= '}';
        $message .= '';
        $message .= '';
        $message .= 'img.g-img + div {';
        $message .= 'display: none !important;';
        $message .= '}';
        $message .= '';
        $message .= '';
        $message .= '';
        $message .= '';
        $message .= '@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {';
        $message .= 'u ~ div .email-container {';
        $message .= 'min-width: 320px !important;';
        $message .= '}';
        $message .= '}';
        $message .= '';
        $message .= '@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {';
        $message .= 'u ~ div .email-container {';
        $message .= 'min-width: 375px !important;';
        $message .= '}';
        $message .= '}';
        $message .= '';
        $message .= '@media only screen and (min-device-width: 414px) {';
        $message .= 'u ~ div .email-container {';
        $message .= 'min-width: 414px !important;';
        $message .= '}';
        $message .= '}';
        $message .= '';
        $message .= '</style>';
        $message .= '';
        $message .= '<style>';
        $message .= '';
        $message .= '.primary{';
        $message .= 'background: #0A51A1;';
        $message .= '}';
        $message .= '.bg_white{';
        $message .= 'background: #ffffff;';
        $message .= '}';
        $message .= '.bg_light{';
        $message .= 'background: #fafafa;';
        $message .= '}';
        $message .= '.bg_black{';
        $message .= 'background: #000000;';
        $message .= '}';
        $message .= '.bg_dark{';
        $message .= 'background: rgba(0,0,0,.8);';
        $message .= '}';
        $message .= '.email-section{';
        $message .= 'padding:2.5em;';
        $message .= '}';
        $message .= '';
        $message .= '';
        $message .= '.btn{';
        $message .= 'padding: 10px 15px;';
        $message .= 'display: inline-block;';
        $message .= '}';
        $message .= '.btn.btn-primary{';
        $message .= 'border-radius: 5px;';
        $message .= 'background: #0A51A1;';
        $message .= 'color: #ffffff;';
        $message .= '}';
        $message .= '.btn.btn-white{';
        $message .= 'border-radius: 5px;';
        $message .= 'background: #ffffff;';
        $message .= 'color: #000000;';
        $message .= '}';
        $message .= '.btn.btn-white-outline{';
        $message .= 'border-radius: 5px;';
        $message .= 'background: transparent;';
        $message .= 'border: 1px solid #fff;';
        $message .= 'color: #fff;';
        $message .= '}';
        $message .= '.btn.btn-black-outline{';
        $message .= 'border-radius: 0px;';
        $message .= 'background: transparent;';
        $message .= 'border: 2px solid #000;';
        $message .= 'color: #000;';
        $message .= 'font-weight: 700;';
        $message .= '}';
        $message .= '';
        $message .= 'h1,h2,h3,h4,h5,h6{';
        $message .= 'font-family: "Lato", sans-serif;';
        $message .= 'color: #000000;';
        $message .= 'margin-top: 0;';
        $message .= 'font-weight: 400;';
        $message .= '}';
        $message .= '';
        $message .= 'body{';
        $message .= 'font-family: "Lato", sans-serif;';
        $message .= 'font-weight: 400;';
        $message .= 'font-size: 15px;';
        $message .= 'line-height: 1.8;';
        $message .= 'color: rgba(0,0,0,.4);';
        $message .= '}';
        $message .= '';
        $message .= 'a{';
        $message .= 'color: #0A51A1;';
        $message .= '}';
        $message .= '';
        $message .= 'table{';
        $message .= '}';
        $message .= '';
        $message .= '';
        $message .= '.logo h1{';
        $message .= 'margin: 0;';
        $message .= '}';
        $message .= '.logo h1 a{';
        $message .= 'color: #0A51A1;';
        $message .= 'font-size: 24px;';
        $message .= 'font-weight: 700;';
        $message .= 'font-family: "Lato", sans-serif;';
        $message .= '}';
        $message .= '';
        $message .= '';
        $message .= '.hero{';
        $message .= 'position: relative;';
        $message .= 'z-index: 0;';
        $message .= '}';
        $message .= '';
        $message .= '.hero .text{';
        $message .= 'color: rgba(0,0,0,.3);';
        $message .= '}';
        $message .= '.hero .text h2{';
        $message .= 'color: #000;';
        $message .= 'font-size: 40px;';
        $message .= 'margin-bottom: 0;';
        $message .= 'font-weight: 400;';
        $message .= 'line-height: 1.4;';
        $message .= '}';
        $message .= '.hero .text h3{';
        $message .= 'font-size: 24px;';
        $message .= 'font-weight: 300;';
        $message .= '}';
        $message .= '.hero .text h2 span{';
        $message .= 'font-weight: 600;';
        $message .= 'color: #0A51A1;';
        $message .= '}';
        $message .= '';
        $message .= '';
        $message .= '';
        $message .= '.heading-section{';
        $message .= '}';
        $message .= '.heading-section h2{';
        $message .= 'color: #000000;';
        $message .= 'font-size: 28px;';
        $message .= 'margin-top: 0;';
        $message .= 'line-height: 1.4;';
        $message .= 'font-weight: 400;';
        $message .= '}';
        $message .= '.heading-section .subheading{';
        $message .= 'margin-bottom: 20px !important;';
        $message .= 'display: inline-block;';
        $message .= 'font-size: 13px;';
        $message .= 'text-transform: uppercase;';
        $message .= 'letter-spacing: 2px;';
        $message .= 'color: rgba(0,0,0,.4);';
        $message .= 'position: relative;';
        $message .= '}';
        $message .= '.heading-section .subheading::after{';
        $message .= 'position: absolute;';
        $message .= 'left: 0;';
        $message .= 'right: 0;';
        $message .= 'bottom: -10px;';
        $message .= 'content: "";';
        $message .= 'width: 100%;';
        $message .= 'height: 2px;';
        $message .= 'background: #0A51A1;';
        $message .= 'margin: 0 auto;';
        $message .= '}';
        $message .= '';
        $message .= '.heading-section-white{';
        $message .= 'color: rgba(255,255,255,.8);';
        $message .= '}';
        $message .= '.heading-section-white h2{';
        $message .= 'font-family:';
        $message .= 'line-height: 1;';
        $message .= 'padding-bottom: 0;';
        $message .= '}';
        $message .= '.heading-section-white h2{';
        $message .= 'color: #ffffff;';
        $message .= '}';
        $message .= '.heading-section-white .subheading{';
        $message .= 'margin-bottom: 0;';
        $message .= 'display: inline-block;';
        $message .= 'font-size: 13px;';
        $message .= 'text-transform: uppercase;';
        $message .= 'letter-spacing: 2px;';
        $message .= 'color: rgba(255,255,255,.4);';
        $message .= '}';
        $message .= '';
        $message .= '';
        $message .= 'ul.social{';
        $message .= 'padding: 0;';
        $message .= '}';
        $message .= 'ul.social li{';
        $message .= 'display: inline-block;';
        $message .= 'margin-right: 10px;';
        $message .= '}';
        $message .= '';
        $message .= '';
        $message .= '';
        $message .= '.footer{';
        $message .= 'border-top: 1px solid rgba(0,0,0,.05);';
        $message .= 'color: rgba(0,0,0,.5);';
        $message .= '}';
        $message .= '.footer .heading{';
        $message .= 'color: #000;';
        $message .= 'font-size: 20px;';
        $message .= '}';
        $message .= '.footer ul{';
        $message .= 'margin: 0;';
        $message .= 'padding: 0;';
        $message .= '}';
        $message .= '.footer ul li{';
        $message .= 'list-style: none;';
        $message .= 'margin-bottom: 10px;';
        $message .= '}';
        $message .= '.footer ul li a{';
        $message .= 'color: rgba(0,0,0,1);';
        $message .= '}';
        $message .= '';
        $message .= '';
        $message .= '@media screen and (max-width: 500px) {';
        $message .= '';
        $message .= '';
        $message .= '}';
        $message .= '';
        $message .= '';
        $message .= '</style>';
        $message .= '';
        $message .= '';
        $message .= '</head>';
        $message .= '';
        $message .= '<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">';
        $message .= '<center style="width: 100%; background-color: #f1f1f1;">';
        $message .= '<div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">';
        $message .= '&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;';
        $message .= '</div>';
        $message .= '<div style="max-width: 600px; margin: 0 auto;" class="email-container">';
        $message .= '';
        $message .= '<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">';
        $message .= '<tr>';
        $message .= '<td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">';
        $message .= '<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">';
        $message .= '<tr>';
        $message .= '<td class="logo" style="text-align: center;">';
        $message .= '<h1><a href="https://collectionhub.digital">CollectionHub</a></h1>';
        $message .= '</td>';
        $message .= '</tr>';
        $message .= '</table>';
        $message .= '</td>';
        $message .= '</tr>';
        $message .= '<tr>';
        $message .= '<td valign="middle" class="hero bg_white" style="padding: 3em 0 2em 0;">';
        $message .= '<img src="https://i.imgur.com/qsiZPFm.png" alt="" style="width: 150px; max-width: 300px; height: auto; margin: auto; display: flex; justify-content: center; align-content: center;">';
        $message .= '</td>';
        $message .= '</tr>';
        $message .= '<tr>';
        $message .= '<td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">';
        $message .= '<table>';
        $message .= '<tr>';
        $message .= '<td>';
        $message .= '<div class="text" style="padding: 0 2.5em; text-align: center;">';
        $message .= '<h2>Please verify your email</h2>';
        $message .= '<h3>You are one step away from unlocking the power of our website!</h3>';
        $message .= "<p><a href='https://collectionhub.digital/verify?vkey=$vkey' class='btn btn-primary'>Verify Account</a></p>";
        $message .= '</div>';
        $message .= '</td>';
        $message .= '</tr>';
        $message .= '';
        $message .= '</td>';
        $message .= '</tr>';
        $message .= '';
        $message .= '';
        $message .= '<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">';
        $message .= '<tr>';
        $message .= '<td valign="middle" class="bg_light footer email-section">';
        $message .= '<table>';
        $message .= '<tr>';
        $message .= '<td valign="top" width="33.333%" style="padding-top: 20px;">';
        $message .= '<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">';
        $message .= '<tr>';
        $message .= '<td style="text-align: left; padding-right: 10px;">';
        $message .= '<h3 class="heading">About</h3>';
        $message .= '<p>A website that gives the ability to keep track of your collections!</p>';
        $message .= '</td>';
        $message .= '</tr>';
        $message .= '</table>';
        $message .= '</td>';
        $message .= '<td valign="top" width="33.333%" style="padding-top: 20px;">';
        $message .= '<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">';
        $message .= '<tr>';
        $message .= '<td style="text-align: left; padding-left: 5px; padding-right: 5px;">';
        $message .= '</ul>';
        $message .= '</td>';
        $message .= '</tr>';
        $message .= '</table>';
        $message .= '</td>';
        $message .= '<td valign="top" width="33.333%" style="padding-top: 20px;">';
        $message .= '<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">';
        $message .= '<tr>';
        $message .= '<td style="text-align: left; padding-left: 10px;">';
        $message .= '<h3 class="heading">Useful Links</h3>';
        $message .= '<ul>';
        $message .= '<li><a href="https://collectionhub.digital">Our Website</a></li>';
        $message .= '</ul>';
        $message .= '</td>';
        $message .= '</tr>';
        $message .= '</table>';
        $message .= '</td>';
        $message .= '</tr>';
        $message .= '</table>';
        $message .= '</td>';
        $message .= '</tr>';
        $message .= '<tr>';
        $message .= '<td class="bg_light" style="text-align: center;">';
        $message .= '<p>No longer want to receive these email? You can <a href="#" style="color: rgba(0,0,0,.8);">Unsubscribe here</a></p>';
        $message .= '</td>';
        $message .= '</tr>';
        $message .= '</table>';
        $message .= '';
        $message .= '</div>';
        $message .= '</center>';
        $message .= '</body>';
        $message .= '</html>';
		$headers  = "From: collectionhub69@gmail.com \r\n";
		$headers .= "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";

		mail($to,$subject,$message,$headers);
		header('location:../thankyou/');

	}else {
		echo $mysqli->error;
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
<body class="login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="../assets/logo.png" alt="Logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Register</h4>
							<form method="POST" action="" class="login-validation" novalidate="">
								<div class="form-group">
									<label for="name">Username</label>
									<input id="name" type="text" class="form-control" name="u" required autofocus>
									<div class="invalid-feedback">
										Please choose a usename!
									</div>
								</div>

								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="EMAIL" class="form-control" name="e" required>
									<div class="invalid-feedback">
										Your email is invalid
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="PASSWORD" class="form-control" name="p" required data-eye>
									<div class="invalid-feedback">
										Password is required
									</div>
								</div>

								<div class="form-group">
									<label for="password">Repeat Password</label>
									<input id="password" type="PASSWORD" class="form-control" name="p2" required data-eye>
									<div class="invalid-feedback">
										This field is required!
									</div>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="agree" id="agree" class="custom-control-input" required>
										<label for="agree" class="custom-control-label">I agree to the <a href="#">Terms and Conditions</a></label>
										<div class="invalid-feedback">
											You must agree with our Terms and Conditions
										</div>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="SUBMIT" name="submit" value="Register" class="btn btn-primary btn-block">
										Register
									</button>
								</div>
                                <div>
                                    <center class='errorclass'>
											<?php echo $error;?>
								    </center>
                                </div>
								<div class="mt-4 text-center">
									Already have an account? <a href="../login/">Login</a>
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
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="../js/login.js"></script>
</body>
</html>