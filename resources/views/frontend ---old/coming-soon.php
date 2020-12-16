<?php

if(isset($_POST['submit'])){
	
	$to = "falolatobi96@gmail.com";
	$name = $_POST['name'];
	$email = $_POST['email'];
    $subject = "Message from {$name}";
	$msg = "Name: {$name} \n Email: {$email} \n";

	$msg = wordwrap($msg,70);

     // send email
     mail($to,$subject,$msg);

	$name = "";
	$email = "";
}
?>

<!DOCTYPE html>

<html lang="en">
	<head>
		
		<title>Haute Vie - Coming Soon</title>
		<link rel="shortcut icon" type="image/jpg" href="images/favicon.jpg">
		
		<meta name="description" content="">
		
		<!-- Mobile viewport optimized -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-glyphicons.css" rel="stylesheet">

		<link href="css/global-styles.css" rel="stylesheet">

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">

		<!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="css/owl.carousel.min.css">
		<link rel="stylesheet" href="css/owl.theme.default.min.css">

		<!-- Animate CSS -->
		<link href="css/animate.css" rel="stylesheet">

		<!-- Font Awesome -->
		<link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">	
		
		<!-- Modernizer -->
		<script src="js/modernizr-2.6.2.min.js"></script>	

		<!-- Material Icons -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<style type="text/css">
			header {
				height: 100vh;
				width: 100vw;
				background-size: cover;
				background-position: center;
				background-repeat: no-repeat;
				background-image: url('images/11.jpg');
			}

			header .to-fill {
				position: absolute;
				left: 5%;
				top: 50%;
				transform: translateY(-50%);
				width: 550px;
				background: #272424;
				padding: 10px;
				color: #fff;
			}

			header .to-fill-in {
				border: 1px solid #e3e3e3;
				padding: 20px;
			}

			header .form-control {
				border: 1px solid #e3e3e3;
				background: transparent;
				border-radius: 0px;
				color: #fff;
				text-transform: uppercase;
			}

			header .send {
				padding: 10px 20px;
				color: #fff;
				background: transparent;
				border: 1px solid #e3e3e3;
				margin-top: 20px;
			}
		</style>
	</head>
	<body>

		<header>
			<div class="to-fill text-center">
				<div class="to-fill-in">
					<img src="images/white-logo.png" style="max-height: 80px;margin-left: auto;margin-right: auto;margin-bottom: 10px;" class="img-responsive">
					<p>WE ARE COMING SOON</p>
					<p>ENTER YOUR EMAIL TO BE THE FIRST TO KNOW</p>
					<?php 
					if(isset($success_name)){?>
	                    <div class="col-md-12">
						<div align="center"> <img src="images/success.png" style="width:100px;height:100px;"></div>
						<h3 style="text-align:center;">
						
						Yaayy!! <strong><?php echo $success_name ;?></strong>, Your Have Successfully Placed your Booking.<br/> Our Team will Get Intouch With You.<br/>
						Thank You!.
						</h3>
						</div>
					<?php }?>
					<form action="checkout.php" METHOD="POST" class="clearfix">
						<div class="form-group">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="name" class="form-control" placeholder="NAME" required>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<input type="email" name="email" class="form-control" placeholder="EMAIL ADDRESS" required>
							</div>
						</div>
						<button class="send">ENTER</button>
					</form>
				</div>	
			</div>
		</header>
		
	
		<!-- First try for the online version of jQuery-->
		<script src="http://code.jquery.com/jquery.js"></script>

		<!-- If no online access, fallback to our hardcoded version of jQuery -->
		<script>window.jQuery || document.write('<script src="js/jquery-1.11.3.min.js"><\/script>')</script>

		<!-- Bootstrap JS -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
	</body>
</html>

