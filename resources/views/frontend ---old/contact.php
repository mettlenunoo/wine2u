<!DOCTYPE html>

<html>
	<head>
		
		<!-- Website Title & Description for Search Engine purposes -->
		<title>Haute Vie - Contact Us</title>
        <link rel="shortcut icon" type="image/png" src="images/favicon.png">
        <meta charset="utf-8">
		<meta name="description" content="">
		
		<!-- Mobile viewport optimized -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-glyphicons.css" rel="stylesheet">
		
		<!-- Custom CSS -->
		<link href="css/global-styles.css" rel="stylesheet">
		<link href="css/cart-styles.css" rel="stylesheet">

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">

		<!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="css/owl.carousel.min.css">
		<link rel="stylesheet" href="css/owl.theme.default.min.css">

		<!-- Animate CSS -->
		<link href="css/animate.css" rel="stylesheet">

		<!-- Font Awesome -->
		<link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		
		<!-- Include Modernizr in the head, before any other Javascript -->
		<script src="js/modernizr-2.6.2.min.js"></script>

        <style>
            .contact {padding-top: 80px;padding-bottom: 0px;}
            .control-label {text-align: left !important; padding-top: 0px !important;}
            .control-label span {color: red;}
            .contact .form-control {border-radius: 0px;outline: none;max-width: 400px;}
            .contact textarea {resize: none;}
            .contact button {padding: 10px 40px; background: transparent; border: 1px solid #f0f0f0;text-transform: uppercase;font-weight: 600;}
            .contact form {margin-bottom: 80px;}
        </style>
		
	</head>
	<body>

        <?php require_once("includes/header.php");?>

        <div class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-1">
                        <h3>Email Us</h3>
                        <p>Send us a message, and we'll aim to get back to you as soon as possible.</p>
                        <br>
                        <form class="form-horizontal" action="">
                            <div class="form-group">
                                <label class="control-label col-sm-2 col-xs-12" for="name">Name <span>*</span></label>
                                <div class="col-sm-10 col-xs-12">
                                    <input type="text" class="form-control" name="name">
                                </div>    
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2 col-xs-12" for="phone">Phone <span>*</span></label>
                                <div class="col-sm-10 col-xs-12">
                                    <input type="text" name="phone" class="form-control">
                                </div>    
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2 col-xs-12" for="email">Email <span>*</span></label>
                                <div class="col-sm-10 col-xs-12">
                                    <input type="email" name="email" class="form-control">
                                </div>    
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2 col-xs-12" for="message">Message <span>*</span></label>
                                <div class="col-sm-10 col-xs-12">
                                    <textarea class="form-control" name="message" rows="4"></textarea>
                                </div>    
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2 col-xs-4" for="contactus">Contact me <span>*</span></label>
                                <div class="col-sm-10 col-xs-8">
                                    <label><input type="radio" name="contactme"> By Phone</label> &emsp;
                                    <label><input type="radio" name="contactme"> By Email</label>
                                </div> 
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 hidden-xs"></div>
                                <div class="col-sm-10 col-xs-12">
                                    <button name="submit" type="submit">Submit</button>
                                </div>    
                        </form>
                    </div>
                </div>
            </div>
        </div>

		<?php require_once("includes/footer.php");?>

        <script>
            $(document).ready(function(){
                $(".coup").click(function(){
                    $(".coup-in").toggleClass("reveal-coup");
                });
                $('#reveal-it').click(function(){
                    $('#reveal-me').toggleClass("hide-me");
                })
            })
        </script>
	</body>
</html>

