<?php require_once("includes/session.php");?>
<?php confirm_session();?>

<?php require('includes/connection.php');?>

<?php  
      if(isset($_GET['edit_slider'])){
	  
	  $edit_slider_id = preg_replace('#[^0-9]#', '', $_GET['edit_slider']);
	  
					            }					
?>

<?php 
if(isset($_POST['submit'])){

try{

		// IMAGE PROCESSING 
		 
        $name1 = basename($_FILES['pic']['name']);
        $t_name1 = $_FILES['pic']['tmp_name'];
		$dir = 'img';
		
	   // IMAGE PROCESSING 
		
       // prepare sql 

	  if(move_uploaded_file($t_name1,$dir."/".$name1)){
	  
    $stmt = $conn->prepare("INSERT INTO slider_tb (title, date, link, publish, image, content )
    VALUES (:title, :date, :link, :publish, :image, :content)");
	
	//  ASSIGN VALUES TO THE VARIABLES
		$title = htmlentities($_POST['title']);
		$date = $_POST['date'];
		$link = $_POST['link'];
		$publish = $_POST['publish'];
		$image = "img/".$name1;
		$content = htmlentities($_POST['content']);
	
	// SET PARAMETERS
	
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':link', $link);
	$stmt->bindParam(':publish', $publish);
    $stmt->bindParam(':image', $image);
	$stmt->bindParam(':content', $content);
	
	// EXECUTE
	$stmt->execute();



// SUCCESS MESSAGE
$message = "New records created successfully";

}else{

$message = "Please check the image and upload it again";

}// CLOSE OF IMAGE IF
  }
catch(PDOException $e)
    {
	// ERROR MESSAGE
    $message = "<br>" . $e->getMessage();
    }
	
	// CLOSE CONNECTION
$conn = null;



}


?>


<?php
if(isset($_POST['update'])){

		// IMAGE PROCESSING 
		 
        $name1 = basename($_FILES['pic']['name']);
        $t_name1 = $_FILES['pic']['tmp_name'];
		$dir = 'img';
		
	   // IMAGE PROCESSING 

try {




      
	   //  ASSIGN VALUES TO THE VARIABLES
        $title = htmlentities($_POST['title']);
        $date = $_POST['date'];
        $link = $_POST['link'];
        $publish = $_POST['publish'];
        $image = "img/".$name1;
        $content = htmlentities($_POST['content']);
    
    // SET PARAMETERS
   
   // UPDATE STATEMENT
   
    if(empty($name1)){
    
	  $sql_update = "UPDATE slider_tb SET title = :title, date = :date, link = :link, publish = :publish, content = :content WHERE id = :id ";
     
    }else{
	  if(move_uploaded_file($t_name1,$dir."/".$name1)){

	  $sql_update = "UPDATE slider_tb SET title = :title, date = :date, link = :link, publish = :publish, image = :image, content = :content  WHERE id = :id ";

	  }
	}
    // Prepare statement
    $stmt = $conn->prepare($sql_update);
	
	// SET PARAMETERS
	
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':link', $link);
	$stmt->bindParam(':publish', $publish);
	 if(empty($name1)){
	 // empty
	 }else{
	 $stmt->bindParam(':image', $image);
	 }
	$stmt->bindParam(':content', $content);
	$stmt->bindParam(':id', $edit_slider_id);
	
    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    $message = $stmt->rowCount() . " records UPDATED successfully";
    }
catch(PDOException $e)
    {
   $message = $sql . "<br>" . $e->getMessage();
    }

//$conn = null;
}
?>



<!DOCTYPE html>
<!--[if IE 9]>         
<html class="ie9 no-focus"> <![endif]-->
<!--[if gt IE 9]><!--> 

   <html class="no-focus"> <!--<![endif]-->
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
        <link rel="stylesheet" href="assets/js/plugins/summernote/summernote.min.css">
        <link rel="stylesheet" href="assets/js/plugins/summernote/summernote-bs3.min.css">

        <!-- OneUI CSS framework -->
        <link rel="stylesheet" id="css-main" href="assets/css/oneui.css">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
        <!-- END Stylesheets -->
		
		  <!-- UPLOAD IMAGES CSS -->
		<style type="text/css">
.thumbimage {
    float:left;
    width:100px;
    position:relative;
    padding:5px;
	margin-right:3px;
	border:1px solid #ebeff2;
}
</style>
 <!-- UPLOAD IMAGES CSS -->
    </head>
    <body>
        <!-- Page Container -->
        <!--
            Available Classes:

            'sidebar-l'                  Left Sidebar and right Side Overlay
            'sidebar-r'                  Right Sidebar and left Side Overlay
            'sidebar-mini'               Mini hoverable Sidebar (> 991px)
            'sidebar-o'                  Visible Sidebar by default (> 991px)
            'sidebar-o-xs'               Visible Sidebar by default (< 992px)

            'side-overlay-hover'         Hoverable Side Overlay (> 991px)
            'side-overlay-o'             Visible Side Overlay by default (> 991px)

            'side-scroll'                Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (> 991px)

            'header-navbar-fixed'        Enables fixed header
        -->
        <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
            <!-- Side Overlay-->
          
            <!-- END Side Overlay -->

            <!-- SLIDE BAR CODE -->
            
            <?php require('includes/backend_side_bar.php');?>
              
            <!-- SLIDE BAR CODE -->
           
           
            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Header -->
				 <!-- For animations -->
			 
			 
			 <?php if(!isset($edit_slider_id)){?>
					 <!-- For animations -->
                <div class="content bg-gray-lighter visibility-hidden"   data-toggle="appear" data-class="animated bounceIn">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                Slider FORM <small>Add new Slide Here, by filling the form below. <?php echo $message;?></small>
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Slider form</li>
                                
                            </ol>
                        </div>
                    </div>
                </div>
			
                <!-- END Page Header -->

                <!-- Page Content -->
                <div class="content content-narrow">
                    <!-- Summernote (.js-summernote + .js-summernote-air classes are initialized in App() -> uiHelperSummernote()) -->
                    <!-- For more info and examples you can check out http://summernote.org/ -->
                  
				   <!-- For animations -->
					 
					 <!-- For animations -->
					 <div class="block visibility-hidden"  data-toggle="appear" data-timeout="100" data-class="animated fadeInLeft">
                              
                                <div class="block-content block-content-narrow">
                                    <form class="form-horizontal push-10-t" id="postForm" action="slider_frm.php" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="text" id="material-text2" name="title" required >
                                                    <label for="material-text2">Enter Slide Title</label>
                                                </div>
                                            </div>
                                        </div>
										  
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="date" id="material-password2" name="date" value="<?= date("Y-m-d");?>"required>
                                                    <label for="material-password2"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="text" id="material-email2" name="link" >
                                                    <label for="material-email2">Link</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="text" id="material-email2" name="content" >
                                                    <label for="material-email2">Enter button text</label>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="form-material floating">
                                                    <select class="form-control" id="material-select2" name="publish" size="1" required>
                                                        <option></option><!-- Empty value for demostrating material select box -->
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                        
                                                    </select>
                                                    <label for="material-select2">Publish</label>
                                                </div>
												
										
										
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-xs-12" for="example-file-input">File Input</label>
                                            <div class="col-xs-12">
											
											 <div class="fileupload add-new-plus">
                                                    
                                                    <input id="imageupload" type="file" name="pic" required>
                                                </div>
												<div id="preview-image"></div>
                                               
                                            </div>
                                        </div>

                         <div class="form-group text-right m-b-0 visibility-hidden" data-toggle="appear" data-class="animated bounceIn">
                              <button class="btn btn-sm btn-primary " type="submit"  name="submit">Publish</button>
                              </div>
                   
                                </div>
                            </div>
                            <!-- END Floating Labels -->
							
							
							<!-- For animations -->
                    <!--<div class="block visibility-hidden" data-toggle="appear" data-timeout="100" data-class="animated fadeInLeft">
                        <div class="block-header">
                            <ul class="block-options">
                                <li>
                                    <button type="button"><i class="si si-settings"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Content</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <!-- Summernote Container -->
							<!-- MORE INFO ABOUT SUMMERNOTE https://gist.github.com/soomtong/6635053 -->
                         
                        <!--<textarea class="js-summernote" id="summernote" name="content"></textarea>
					
							<br/>
							 <div class="form-group text-right m-b-0 visibility-hidden" data-toggle="appear" data-class="animated bounceIn">
							  <button class="btn btn-sm btn-primary " type="submit"  name="submit">Submit</button>
							  </div>
                        </div>
                    </div> -->
                     </form>
					 
					<?php }else{ ?>
					
						<?php
							
			// source http://www.mysqltutorial.org/php-querying-data-from-mysql-table/
													
					try {
				  
				    $sql = 'SELECT * FROM slider_tb WHERE id = ?';
					$q = $conn->prepare($sql);
					$q->execute([$edit_slider_id]);
					$q->setFetchMode(PDO::FETCH_ASSOC);
				   while ($row = $q->fetch()): 
				   
				    $Id = $row['id'];
					$Title = html_entity_decode($row['title']);
					$Date = $row['date'];
					$Link = $row['link'];
					$Publish = $row['publish'];
					$Image = $row['image'];
					$Content = html_entity_decode($row['content']);
					
				   endwhile;
			
				} catch (PDOException $e) {
					die("Could not connect to the database $dbname :" . $e->getMessage());
				}
                   ?>
						
					 <!-- For animations -->
                <div class="content bg-gray-lighter visibility-hidden"   data-toggle="appear" data-class="animated bounceIn">
				     <!-- For animations -->
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                               EDIT Slider FORM <small>Edit Slide Here, by Changing the form below. <?php echo $message;?></small>
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>News form</li>
                                
                            </ol>
                        </div>
                    </div>
                </div>
			
                <!-- END Page Header -->

                <!-- Page Content -->
                <div class="content content-narrow">
                    <!-- Summernote (.js-summernote + .js-summernote-air classes are initialized in App() -> uiHelperSummernote()) -->
                    <!-- For more info and examples you can check out http://summernote.org/ -->
                  
				  
					 <div class="block visibility-hidden"  data-toggle="appear" data-timeout="100" data-class="animated fadeInLeft">
                              
                                <div class="block-content block-content-narrow">
                                    <form class="form-horizontal push-10-t" id="postForm" action="slider_frm.php?edit_slider=<?php echo $edit_slider_id; ?>" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="text" id="material-text2"  value="<?php echo $Title;?>"name="title" required >
                                                    <label for="material-text2">Enter News Title</label>
                                                </div>
                                            </div>
                                        </div>
										 
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="date" id="material-password2" value="<?php echo $Date;?>" name="date" required>
                                                    <label for="material-password2"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material floating">
                                                    <input class="form-control" value="<?php echo $Content;?>" type="text" id="material-email2" name="content" >
                                                    <label for="material-email2">Enter button text</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="text" id="material-email2" value="<?php echo $Link;?>" name="link" >
                                                    <label for="material-email2">Link</label>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="form-material floating">
                                                    <select class="form-control" id="material-select2" name="publish" size="1" required>
                                                        <option></option><!-- Empty value for demostrating material select box -->
                                                        <option <?php if($Publish == "Yes"){?> Selected <?php }?> value="Yes">Yes</option>
                                                        <option <?php if($Publish == "No"){?> Selected <?php }?> value="No">No</option>
                                                        
                                                    </select>
                                                    <label for="material-select2">Publish</label>
                                                </div>

                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-xs-12" for="example-file-input">File Input</label>
                                            <div class="col-xs-12">
											
											 <div class="fileupload add-new-plus">
                                                    
                                                    <input id="imageupload" type="file" name="pic" >
                                                </div>
                                            </div>
												
                                        </div>
										<div class="form-group">
										 <div class="col-xs-12">
										<div id="preview-image"><img src="<?php echo $Image;?>" width="100px" height="100px"></div>
                                         </div>
										</div>

                            <div class="form-group text-right m-b-0 visibility-hidden" data-toggle="appear" data-class="animated bounceIn">
                              <button class="btn btn-sm btn-primary" type="submit"  name="update">Update</button>
                              </div>
										
                                </div>
                            </div>
                            <!-- END Floating Labels -->
				
				
					 <!-- For animations -->
                  <!--  <div class="block visibility-hidden" data-toggle="appear" data-timeout="100" data-class="animated fadeInLeft">
                        <div class="block-header">
                            <ul class="block-options">
                                <li>
                                    <button type="button"><i class="si si-settings"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Content</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <!-- Summernote Container -->
							<!-- MORE INFO ABOUT SUMMERNOTE https://gist.github.com/soomtong/6635053 -->
                         
        <!-- <textarea class="js-summernote" id="summernote" name="content"><?php echo $Content;?></textarea>
					
							<br/>
							 <div class="form-group text-right m-b-0 visibility-hidden" data-toggle="appear" data-class="animated bounceIn">
							  <button class="btn btn-sm btn-primary" type="submit"  name="update">Update</button>
							  </div>
                        </div>
                    </div>-->
                     </form>
					 
				<?php	}?>
					
					 
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

        <!-- Page JS Plugins -->
        <script src="assets/js/plugins/summernote/summernote.min.js"></script>
        <!-- <script src="assets/js/plugins/ckeditor/ckeditor.js"></script> -->

        <!-- Page JS Code -->
		
		<script>
	
           
			
				var postForm = function() {
	var content = $('textarea[name="content"]').html($('#summernote').code());
}
        </script>
		
         <script>
            $(function () {
                // Init page helpers (Summernote + CKEditor plugins)
                App.initHelpers(['summernote', 'appear']);
            });
        </script>
		
		
       
		
		<!-- UPLOAD IMAGES JAVASCRIPT CODE -->
		<script type="text/javascript">
 $("#imageupload").on('change', function () {
 
     //Get count of selected files
     var countFiles = $(this)[0].files.length;
 
     var imgPath = $(this)[0].value;
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
     var image_holder = $("#preview-image");
     image_holder.empty();
 
     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
         if (typeof (FileReader) != "undefined") {
 
             //loop for each file selected for uploaded.
             for (var i = 0; i < countFiles; i++) {
 
                 var reader = new FileReader();
                 reader.onload = function (e) {
                     $("<img />", {
                         "src": e.target.result,
                             "class": "thumbimage"
                     }).appendTo(image_holder);
                 }
 
                 image_holder.show();
                 reader.readAsDataURL($(this)[0].files[i]);
             }
 
         } else {
             alert("This browser does not support FileReader.");
         }
     } else {
         alert("Pls select only images");
     }
 });
 </script>
		
		<!-- UPLOAD IMAGES JAVASCRIPT CODE -->
		
		
		
    </body>
</html>