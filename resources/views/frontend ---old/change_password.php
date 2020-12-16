<?php require_once("includes/session.php");?>
<?php confirm_session();?>
<?php require('includes/connection.php');?>

<?php
if(isset($_POST['update'])){


try {
        // IMAGE PROCESSING 
        $name1 = basename($_FILES['pic']['name']);
        $t_name1 = $_FILES['pic']['tmp_name'];
		$dir = 'img';
		
	 
        //  ASSIGN VALUES TO THE VARIABLES
       
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cfm_password = $_POST['cfm_password'];
        $image = "img/".$name1;
		
        if($password != $cfm_password){
          
          $message = "Password Mismatch. Please try again";
       
        }else{

            $hashed_password = sha1($password);
        }
        
 if(!empty($message)){}else{

	  if(move_uploaded_file($t_name1,$dir."/".$name1)){
    //sql
      $sql_update = "UPDATE user SET username = :username, email = :email, password = :password, image = :image  WHERE id = :id ";
	  }else{
		  
		  $sql_update =  "UPDATE user SET username = :username, email = :email, password = :password WHERE id = :id ";
		  
	  }

    // Prepare statement
    $stmt = $conn->prepare($sql_update);
    
	// SET PARAMETERS
    $stmt->bindParam(':username', $username);
	$stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);
	if(empty($name1)){

	}else{
    $stmt->bindParam(':image', $image);
	}
    $stmt->bindParam(':id', $_SESSION['login_user_id']);
  
    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    $message = $stmt->rowCount() . " records UPDATED successfully";
	
 }// end of if statement
    }
catch(PDOException $e)
    {
   $message = $sql . "<br>" . $e->getMessage();
    }

//$conn = null;
}
?>


<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title><?php echo $project_title;?></title>

        <meta name="description" content="Effect Studio Dashboard">
        <meta name="author" content="Effect Studio">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="assets/img/favicons/favicon.png">

        <link rel="icon" type="image/png" href="assets/img/favicons/favicon-16x16.png" sizes="16x16">
        <link rel="icon" type="image/png" href="assets/img/favicons/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="assets/img/favicons/favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="assets/img/favicons/favicon-160x160.png" sizes="160x160">
        <link rel="icon" type="image/png" href="assets/img/favicons/favicon-192x192.png" sizes="192x192">

        <link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicons/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicons/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicons/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicons/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicons/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicons/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicons/apple-touch-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Web fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">

        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="assets/js/plugins/slick/slick.min.css">
        <link rel="stylesheet" href="assets/js/plugins/slick/slick-theme.min.css">

         <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="assets/js/plugins/datatables/jquery.dataTables.min.css">


        <!-- OneUI CSS framework -->
        <link rel="stylesheet" id="css-main" href="assets/css/oneui.css">

        
    </head>
    <body>
       
        <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
           

            <!-- SLIDE BAR CODE -->
            
            <?php require('includes/backend_side_bar.php');?>
              
            <!-- SLIDE BAR CODE -->

            <!-- Main Container -->
            <main id="main-container">
              

                <div class="content">
                    <div class="row items-push">
                        <div class="col-sm-12">
                            <h1 class="page-heading">
                                User Settings  <small>Any change password,Email, Username and profile picture...</small>
                            </h1>
                        </div>
    
                    </div>
                </div>



                <!--  -->
                    <div class="content">
                        <div class="row">
                        <div class="col-md-4">
                            <!-- Default Elements -->
                            <div class="block">
                                <div class="block-header">
                                    <h3 class="block-title">User Settings <br/> <?php echo $message;?></h3>
                                </div>
                                <div class="block-content block-content-narrow">
                                <?php
                            
            // source http://www.mysqltutorial.org/php-querying-data-from-mysql-table/
                                                    
                    try {
                  
                    $sql = 'SELECT * FROM user WHERE id = ?';
                    $q = $conn->prepare($sql);
                    $q->execute([$_SESSION['login_user_id']]);
                    $q->setFetchMode(PDO::FETCH_ASSOC);
                   while ($row = $q->fetch()): 
                   
                    $Id = $row['id'];
                    $username = $row['username'];
                   $email = $row['email'];
				   
                   
                    
                   endwhile;
            
                } catch (PDOException $e) {
                    die("Could not connect to the database $dbname :" . $e->getMessage());
                }
                   ?>

                          <form class="form-horizontal" action="change_password.php" method="post" enctype="multipart/form-data" >
                                        
                                        <div class="form-group">
                                            <label class="col-xs-12" for="example-text-input">Username</label>
                                            <div class="col-sm-12">
                                  <input class="form-control" type="text" id="example-text-input" name="username" value="<?php echo $username; ?>"placeholder="Username" required>
                                        
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-xs-12" for="example-email-input">Email</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="email"  value="<?php echo $email;?>"id="example-email-input" name="email" placeholder="Email.." required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-xs-12" for="example-password-input">Password</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="password" id="example-password-input" name="password" placeholder="Password.." required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-xs-12" for="example-password-input">Confirm Password</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="password" id="example-password-" name="cfm_password" placeholder="Confirm Password" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-12" for="example-file-input">File Input</label>
                                            <div class="col-xs-12">
                                                <input type="file" id="example-file-input" name="pic" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <button class="btn btn-sm btn-primary" type="submit" name="update">Update </button>
                                            </div>
                                        </div>
                                    </form>


                                </div>
                            </div>
                            <!-- END Default Elements -->
                        </div>
                  
                    </div>
                    </div>
                <!--  -->

                <!-- Page Content -->
               
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            <!-- FOOTER -->
            <?php require('includes/backend_footer.php');?>
            <!-- END OF FOOTER -->

        </div>
        <!-- END Page Container -->

        <!-- Apps Modal -->
        <!-- Opens from the button in the header -->
        <div class="modal fade" id="apps-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-sm modal-dialog modal-dialog-top">
                <div class="modal-content">
                    <!-- Apps Block -->
                    <div class="block block-themed block-transparent">
                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Go to Main Page</h3>
                        </div>
                        <div class="block-content">
                            <div class="row text-center">
                                
                                <div class="col-xs-12">
                                    <a class="block block-rounded" href="index.php" target="_blank">
                                        <div class="block-content text-white bg-modern">
                                            <i class="si si-rocket fa-2x"></i>
                                            <div class="font-w600 push-15-t push-15">Frontend</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Apps Block -->
                </div>
            </div>
        </div>
        <!-- END Apps Modal -->

        <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
        <script src="assets/js/core/jquery.min.js"></script>
        <script src="assets/js/core/bootstrap.min.js"></script>
        <script src="assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="assets/js/core/jquery.appear.min.js"></script>
        <script src="assets/js/core/jquery.countTo.min.js"></script>
        <script src="assets/js/core/jquery.placeholder.min.js"></script>
        <script src="assets/js/core/js.cookie.min.js"></script>
        <script src="assets/js/app.js"></script>

        <!-- Page JS Plugins -->
        <script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/base_tables_datatables.js"></script>


        <!-- Page Plugins -->
        <script src="assets/js/plugins/slick/slick.min.js"></script>
        <script src="assets/js/plugins/chartjs/Chart.min.js"></script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/base_pages_dashboard.js"></script>
        <script>
            $(function () {
                // Init page helpers (Slick Slider plugin)
                App.initHelpers('slick');
            });
        </script>
    </body>
</html>

<?php 

// CLOSE CONNECTION
$conn = null;


?>