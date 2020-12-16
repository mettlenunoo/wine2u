<?php require_once("includes/session.php");?>
<?php confirm_session();?>
<?php require('includes/connection.php')?>

<?php

  /************************************* START GET POST FUNCTION  ********************************/
					           if(isset($_GET['delete_page'])){
							$delete_page = preg_replace('#[^0-9]#', '', $_GET['delete_page']);
					             }
	/*************************************END GET POST FUNCTION  ********************************/

	if(isset($delete_page)){
	
try {

    //Deleting a row using a prepared statement.
$sql = "DELETE FROM page_tb WHERE id = :page_id";
 
//Prepare our DELETE statement.
$statement = $conn->prepare($sql);
 
//The make that we want to delete from our Blog table.
$ToDelete = $delete_page;
 
//Bind our $makeToDelete variable to the paramater :slider_id.
$statement->bindValue(':page_id', $ToDelete);
 
//Execute our DELETE statement.
$delete = $statement->execute();

echo "<script> window.location.replace('page_tb.php') </script>";

    }
   catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

//$conn = null;

}
?>
<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title><?= $project_title; ?></title>

        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="robots" content="">
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
        <link rel="stylesheet" href="assets/js/plugins/datatables/jquery.dataTables.min.css">

        <!-- OneUI CSS framework -->
        <link rel="stylesheet" id="css-main" href="assets/css/oneui.css">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>
        <!-- Page Container -->
        
        <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
            <!-- Side Overlay-->
            
            <!-- SLIDE BAR CODE -->
            
            <?php require('includes/backend_side_bar.php');?>
              
            <!-- SLIDE BAR CODE -->

          
            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Header -->
                <div class="content bg-gray-lighter visibility-hidden"   data-toggle="appear" data-class="animated bounceIn">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                Pages 
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Pages</li>
                                <li><a class="link-effect" href="">All Pages</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END Page Header -->

                <!-- Page Content -->
                <div class="content visibility-hidden" data-toggle="appear" data-timeout="100" data-class="animated fadeInLeft">
                    <!-- Dynamic Table Full -->
                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title"> </h3>
                        </div>
                        <div class="block-content">
                         
							<?php
							
			// source http://www.mysqltutorial.org/php-querying-data-from-mysql-table/
													
					try {
				  
					$sql = 'SELECT * from page_tb ORDER BY position ASC';
				 
					$q = $conn->query($sql);
					$q->setFetchMode(PDO::FETCH_ASSOC);
					
				} catch (PDOException $e) {
					die("Could not connect to the database $dbname :" . $e->getMessage());
				}
                     ?>
						
                            <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                          <!--<th class="text-center" style="width: 10%;">Id</th>-->
										<th class="text-center" style="width: 10%;">Title</th>
                                        <th>Slug</th>
                                        <th class="text-center" style="width: 10%;">Position</th>
                                        <th class="hidden-xs">Date</th>
                                        <th class="text-center" style="width: 10%;">Publish</th>
										<th class="text-center" style="width: 10%;">Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
								 <?php while ($row = $q->fetch()): ?>
                                    <tr>
									   
                                        <td class="text-center"><?php echo html_entity_decode($row['title']);?></td>
                                        <td class="font-w600"><?php echo html_entity_decode($row['slug']) ?></td>
                                        <td class="hidden-xs"><?php echo $row['position'] ?></td>
                                        <td class="hidden-xs"><?php echo $row['date'] ?></td>
                                        
										 <td class="hidden-xs">
                                            <span class="label label-primary"><?php echo $row['publish'] ?></span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="add_page.php?edit_page=<?php echo $row['id']; ?>" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                                <a  href="page_tb.php?delete_page=<?php echo $row['id'];?>" onClick ="return confirm('Are you sure You want to Delete')" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    
									
						<?php endwhile; ?>
									
                                   
                                </tbody>
                            </table>
							
                        </div>
                    </div>
                    <!-- END Dynamic Table Full -->

                </div>
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
                            <h3 class="block-title">Apps</h3>
                        </div>
                        <div class="block-content">
                            <div class="row text-center">
                                
                                <div class="col-xs-12">
                                    <a class="block block-rounded" href="index.php">
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
         
		  <script>
            $(function () {
                // Init page helpers (Summernote + CKEditor plugins)
                App.initHelpers('appear');
            });
        </script>
		
		 
        <!-- Page JS Plugins -->
        <script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/base_tables_datatables.js"></script>
    </body>
</html>