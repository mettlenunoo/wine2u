<?php require_once("includes/session.php");?>
<?php require('includes/connection.php');?>
                        <?php
                           
                    try {
                  
                    $sql = 'SELECT * FROM page_tb ORDER BY id DESC LIMIT 1';
                    $q = $conn->prepare($sql);
                    $q->execute();
                    $q->setFetchMode(PDO::FETCH_ASSOC);
                   while ($row = $q->fetch()): 
                   
                    $Id = $row['id'];
                    $Content = html_entity_decode($row['content']);
                    
                   endwhile;
            
                } catch (PDOException $e) {
                    die("Could not connect to the database $dbname :" . $e->getMessage());
                }
                   ?>
                        
<!DOCTYPE html>
<html lang="en">
	<head>
		
		<title>Haute Vie - Terms</title>
		<link rel="shortcut icon" type="image/png" href="images/favicon.png">
		
		<meta name="description" content="">
		
		<!-- Mobile viewport optimized -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-glyphicons.css" rel="stylesheet">
		
		<!-- Custom CSS -->
		<link href="css/global-styles.css" rel="stylesheet">
		<link href="css/index-styles.css" rel="stylesheet">

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
			.term {
				padding-top: 120px;
				padding-bottom: 120px;
				background: #f8f8f8;
			}

			.term h2 {
				font-weight: 400;
				margin-top: 0px;
				font-size: 30px;
				margin-bottom: 40px;
			}

			.term h4 {
				margin-top: 0px;
				font-weight: 600;
				font-size: 15px;
			}
		</style>
	</head>
	<body>

		<?php require_once("includes/header.php");?>

		<div class="term">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
                       <?=  $Content; ?>
					 	
					</div>
				</div>
			</div>
		</div>
	
		<?php require_once("includes/footer.php");?>

	</body>
</html>

