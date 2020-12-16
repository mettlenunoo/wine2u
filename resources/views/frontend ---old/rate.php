<?php require_once("includes/session.php");?>
<?php confirm_session();?>
<?php require_once("includes/connection.php");?>
<?php require_once("includes/function.php");?>
<?php  if(isset($_GET['edit_attr'])){

$attribute_id = preg_replace('#[^0-9]#', '', $_GET['edit_attr']);

}

    ?>
<?php

   if(isset($_GET['delete_attr'])){

    $delete_attr = preg_replace('#[^0-9]#', '', $_GET['delete_attr']);
    
try {
    //Deleting a row using a prepared statement.
$sql = "DELETE FROM attribute_tb WHERE id = :delete_attr";
$statement = $conn->prepare($sql);
$ToDelete = $delete_attr;
$statement->bindValue(':delete_attr', $ToDelete);
$delete = $statement->execute();
echo "<script> window.location.replace('attributes.php') </script>";
    }
   catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

}
?>

<?php

if(isset($_POST['submit'])){
    //  ASSIGN VALUES TO THE VARIABLES
    $name1=basename($_FILES['image']['name']);
    $t_name1=$_FILES['image']['tmp_name'];
    $dir='img';
    $sel_table = "attribute_tb";
     // THIS IS FROM FUNCTION
    $name = htmlentities($_POST['title']);
    $check = check_title($sel_table, $name);
    // this is function
    if(!empty($name1)){
    $name1 = dub_image($name1);
      }
try{
      if($check == ""){

     $stmt = $conn->prepare("INSERT INTO attribute_tb(name,  slug, date, parent_id)
    VALUES(:name,  :slug, :date, :parent_id)");

        $name = htmlentities($_POST['title']);
        $slug = htmlentities($_POST['slug']);
        $parent_id = htmlentities($_POST['parent_id']);
        $date = date('Y-m-d');

        // SET PARAMETERS
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':slug', $slug);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':parent_id', $parent_id);
        // EXECUTE
        $stmt->execute();

        // SUCCESS MESSAGE
         $message = '<span style="color:green">New records created successfully</span>';

      }else{

    $message = '<span style="color:green">Slug already Exists </span>';
   
   }
  }

catch(PDOException $e)
    {
    // ERROR MESSAGE
    $message = "<br>" . $e->getMessage();
    }
    
    // CLOSE CONNECTION
//$conn = null;

}


?>


<?php

if(isset($_POST['update'])){
   
   
try{
     
        $stmt = $conn->prepare("UPDATE rate_tb SET rate = :rate,  date = :date, publish = :publish ");

        $rate = htmlentities($_POST['rate']);
        $date = $_POST['date'];
        $publish = htmlentities($_POST['publish']);

        // SET PARAMETERS
        $stmt->bindParam(':rate', $rate);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':publish', $publish);
        // EXECUTE
        $stmt->execute();

        // SUCCESS MESSAGE
         $message = '<span style="color:green">Record Updated successfully</span>';

  }

catch(PDOException $e)
    {
    // ERROR MESSAGE
    $message = "<br>" . $e->getMessage();
    }
    
   

}


?>

<!DOCTYPE html>
<!--[if IE 9]>         
<html class="ie9 no-focus"><![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-focus"> 
<!--<![endif]-->
    <head>
        <meta charset="utf-8">

         <title> <?= $project_title ;?></title>

          <meta name="description" content="">
        <meta name="author" content="">
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
           
     <?php require_once("includes/backend_side_bar.php");?>

            <!-- Main Container -->
            <main id="main-container">
              
                <div class="content">
                    <div class="row items-push">
                        <div class="col-sm-12">
                            <h1 class="page-heading">
                              Rate <?= $message;?> 
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
                               
          <div class="block-content block-content-narrow">
             <?php
                              
                    try {
                   
                    $sql = "SELECT * from rate_tb";
                    $q = $conn->query($sql);
                    $q->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $q->fetch()):
                     $id = $row['id'];
                     $rate= $row['rate'];
                     $date= $row['date'];
                     $publish= $row['publish'];

                    endwhile;
                      
               
                        } catch (PDOException $e) {
                            die("Could not connect to the database $dbname :" . $e->getMessage());
                        }
?>
  
        <form class="form-horizontal" action="rate.php" method="post" enctype="multipart/form-data" >               
             <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Dollar Rate</label>
                     <div class="col-sm-12">
             <input class="form-control" type="number" id="" name="rate" value="<?= $rate;?>" placeholder="Rate"  step="0.01">
                     </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Date</label>
                     <div class="col-sm-12">
             <input class="form-control" type="date" value="<?= date('Y-m-d');?>" name="date" >
                     </div>
                </div>
                                        
               <div class="form-group">
                <label class="col-xs-12" for="example-select">Publish</label>
            <div class="col-sm-12">
        <select class="js-select2 form-control" id="example2-select2"  style="width: 100%;" data-placeholder="Choose many.." name="publish" >
        <option <?php if($publish == 'Yes'){ echo "selected"; } ?> value="Yes">Yes</option>
         <option <?php if($publish == 'No'){ echo "selected"; } ?> value="No">No</option>
      </select>
            </div>
        </div>

                  <div class="form-group">
                    <div class="col-xs-12">
                      <button class="btn btn-sm btn-primary" type="submit" name="update">Publish</button>
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

            <!-- Footer -->
            <!-- Footer -->
           <?php require_once("includes/backend_footer.php");?>
            <!-- END Footer -->
            <!-- END Footer -->
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
                                    <a class="block block-rounded" href="frontend_home.html">
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