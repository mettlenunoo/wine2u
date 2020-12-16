<?php require_once("includes/session.php");?>
<?php confirm_session();?>

<?php require('includes/connection.php');?>
      

<?php  
      if(isset($_GET['edit_page'])){
	  
	  $edit_page_id = preg_replace('#[^0-9]#', '', $_GET['edit_page']);
					            }					
?>



<?php 
if(isset($_POST['submit'])){

try{    
        $position = $_POST['position'];
        $sql = "SELECT * from page_tb WHERE position = '$position' ORDER BY id DESC LIMIT 1 ";
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
          while ($row = $q->fetch()): 
          $id = $row['id'];
          $stm = $conn->prepare("UPDATE page_tb SET  position = :posi WHERE id = :id");
          $i = $_POST['i'];
          $stm->bindParam(':posi', $i);
          $stm->bindParam(':id', $id);
        // EXECUTE
          $stm->execute();
          endwhile; 
        
       // prepare sql 
               $stmt = $conn->prepare("INSERT INTO page_tb (title, slug, publish, date, content, position )
    VALUES (:title, :slug, :publish, :date, :content, :position)");
    
    //  ASSIGN VALUES TO THE VARIABLES
        $title = htmlentities($_POST['title']);
        $slug = htmlentities($_POST['slug']);
        $publish = $_POST['publish'];
        $date = date("Y-m-d");
        $content = htmlentities($_POST['content']);
        $position = $_POST['position'];
    
    // SET PARAMETERS
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':slug', $slug);
    $stmt->bindParam(':publish', $publish);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':position', $position);
    
    // EXECUTE
    $stmt->execute();

// SUCCESS MESSAGE
$message = "New records created successfully";


  }
catch(PDOException $e)
    {
    // ERROR MESSAGE
    $message = "<br>" . $e->getMessage();
    }
 
}


?>


<?php
if(isset($_POST['update'])){


try {


        $position = $_POST['position'];

        $sql = "SELECT * from page_tb WHERE position = '$position' AND id <> 'edit_page_id' ORDER BY id DESC LIMIT 1 ";
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
          while ($row = $q->fetch()): 
          $id = $row['id'];
          $stm = $conn->prepare("UPDATE page_tb SET  position = :posi WHERE id = :id");
          $i = $_POST['i'];
          $stm->bindParam(':posi', $i);
          $stm->bindParam(':id', $id);
        // EXECUTE
          $stm->execute();
          endwhile; 

   // UPDATE STATEMENT
	$sql_update = " UPDATE page_tb SET  title = :title, slug = :slug, publish = :publish, content = :content, position = :position WHERE id = :id  ";
     
    // Prepare statement
    $stmt = $conn->prepare($sql_update);
	
	    //  ASSIGN VALUES TO THE VARIABLES
        $title = htmlentities($_POST['title']);
        $slug = htmlentities($_POST['slug']);
        $publish = $_POST['publish'];
        $content = htmlentities($_POST['content']);
    
    // SET PARAMETERS
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':slug', $slug);
    $stmt->bindParam(':publish', $publish);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':position', $position);
    $stmt->bindParam(':id', $edit_page_id);
    // EXECUTE
	
    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    $message =  " Records Updated Successfully";
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
       
        <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
            
            <?php require('includes/backend_side_bar.php');?>
            <main id="main-container">
	
                <div class="content bg-gray-lighter visibility-hidden"   data-toggle="appear" data-class="animated bounceIn">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                Add Page <small> <?php echo $message;?></small>
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            
                        </div>
                    </div>
                </div>
			
                
                <!-- Page Content -->
                <div class="content content-narrow">
              

                <div class="block visibility-hidden"  data-toggle="appear" data-timeout="100" data-class="animated fadeInLeft">
                              
                      <div class="block-content block-content-narrow">

                                <?php if(empty($edit_page_id)){ ?>

                       <form class="form-horizontal push-10-t" id="postForm" action="add_page.php" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">

                                        <div class="form-group">

                                            <div class="col-sm-12">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="text" id="material-text2" name="title" onchange="myFunction(this.value)" required >
                                                    <label for="material-text2">Enter Page Title</label>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="text" id="slug_title" name="slug" required >
                                                   
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

                                         <?php 
                               $sql = "SELECT * from page_tb ";
                               $q = $conn->query($sql);
                               $q->setFetchMode(PDO::FETCH_ASSOC);
                               $rows = $q->rowCount();
                               $rows = $rows + 1;
                               
                                    ?>
                                         <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="form-material floating">
                                                    <select class="form-control" id="material-select2" name="position" size="1" required>
                                                       
                                                        <?php for($i = 1;$i <= $rows; $i++){?>
                                   
                                                  <option selected  value="<?= $i ?>"><?= $i ?></option>
             
                                                         <?php } ?>

                                                    </select>
                         <label for="material-select2">Position</label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                      <input class="form-control" type="hidden" id="" name="i"  value="<?= $rows; ?>">
                                
                                        
                                </div>
                            </div>
                            <!-- END Floating Labels -->



                   
	 <div class="block visibility-hidden"  data-toggle="appear" data-timeout="100" data-class="animated fadeInLeft">
                        

                    <div class="block visibility-hidden" data-toggle="appear" data-timeout="100" data-class="animated fadeInLeft">

                        <div class="block-header">
                         <input class="form-control" type="hidden" id="material-password2" 
                            <h3 class="block-title">Content</h3>
                        </div>
                        <div class="block-content block-content-full">
             <textarea class="js-summernote" id="summernote" name="content"></textarea>
                            <br/>
                             <div class="form-group text-right m-b-0 visibility-hidden" data-toggle="appear" data-class="animated bounceIn">
                              <button class="btn btn-sm btn-primary " type="submit"  name="submit">Publish</button>
                              </div>
                        </div>
                    </div>
                     </form>



            <?php }else{  ?>

                         <?php
                           
                    try {
                  
                    $sql = "SELECT * FROM page_tb WHERE id = $edit_page_id ORDER BY id DESC LIMIT 1";
                    $q = $conn->prepare($sql);
                    $q->execute();
                    $q->setFetchMode(PDO::FETCH_ASSOC);
                   while ($row = $q->fetch()): 
                   
                    $Id = $row['id'];
                    $title = html_entity_decode($row['title']);
                    $slug = html_entity_decode($row['slug']);
                    $publish = html_entity_decode($row['publish']);
                    $content = html_entity_decode($row['content']);
                    $position = $row['position'];
                    
                   endwhile;
            
                } catch (PDOException $e) {
                    die("Could not connect to the database $dbname :" . $e->getMessage());
                }
                   ?>      
                            
                <form class="form-horizontal push-10-t" id="postForm" action="add_page.php?edit_page=<?php echo $edit_page_id; ?>" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">

                                        <div class="form-group">

                                            <div class="col-sm-12">
                                                <div class="form-material floating">
                                    <input class="form-control" type="text" id="material-text2" value="<?= $title; ?>" name="title" onchange="myFunction(this.value)" required >
                                                    <label for="material-text2">Enter Page Title</label>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="text" value="<?= $slug; ?>" id="slug_title" name="slug" required >
                                                   
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="form-material floating">
                                                    <select class="form-control" id="material-select2" name="publish" size="1" required>
                                                        <option></option><!-- Empty value for demostrating material select box -->
                                        <option <?php if($publish == 'Yes'){  echo "selected"; }?> value="Yes">Yes</option>
                                 <option <?php if($publish == 'No'){  echo "selected"; }?> value="No">No</option>
                                                        
                                                    </select>
                                                    <label for="material-select2">Publish</label>
                                                </div>
                                                
                                            </div>
                                        </div>


                                        <?php 
                               $sql = "SELECT * from page_tb ";
                               $q = $conn->query($sql);
                               $q->setFetchMode(PDO::FETCH_ASSOC);
                               $rows = $q->rowCount();
                              // $rows = $rows + 1;
                               
                                    ?>
                                         <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="form-material floating">
                                                    <select class="form-control" id="material-select2" name="position" size="1" required>
                                                       
                                                        <?php for($i = 1;$i <= $rows; $i++){?>
                                   
                             <option <?php if($position == $i){ echo  "selected" ; }?>  value="<?= $i ?>"><?= $i ?></option>
             
                                                         <?php } ?>

                                                    </select>
                         <label for="material-select2">Position</label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                      <input class="form-control" type="hidden" id="" name="i"  value="<?= $position; ?>">


                                        
                                
                                        
                                </div>
                            </div>
                            <!-- END Floating Labels -->
                   
     <div class="block visibility-hidden"  data-toggle="appear" data-timeout="100" data-class="animated fadeInLeft">
                        

                    <div class="block visibility-hidden" data-toggle="appear" data-timeout="100" data-class="animated fadeInLeft">

                        <div class="block-header">
                         <input class="form-control" type="hidden" id="material-password2" 
                            <h3 class="block-title">Content</h3>
                        </div>
                        <div class="block-content block-content-full">
                        <textarea class="js-summernote" id="summernote" name="content" ><?= $content ; ?></textarea>
                            <br/>
                             <div class="form-group text-right m-b-0 visibility-hidden" data-toggle="appear" data-class="animated bounceIn">
                              <button class="btn btn-sm btn-primary " type="submit"  name="update">Publish</button>
                              </div>
                        </div>
                    </div>
                     </form>


                     <?php } ?>
					 
					
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
		 <script>
function myFunction(val) {
       // var ele =document.getElementById(title).value;
       var title = val;
  //alert(title);
       $.ajax({
        type:'post',
        url:'slug.php',
        data:{
          //item_src:img_src,
          title:title
          //product_name:product_name
        },
        success:function(response){
    var array_data = String(response);
    //alert(array_data);
   document.getElementById("slug_title").value = array_data; //response;
  // document.getElementById("lod").innerHTML = "";
        }
      });

    //alert("The input value has changed. The new value is: " + val);
}
</script>
		
    </body>
</html>