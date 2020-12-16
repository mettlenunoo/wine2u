<?php require_once("includes/session.php");?>
<?php confirm_session();?>
<?php require_once("includes/connection.php");?>
<?php require_once("includes/function.php");?>

<?php  if(isset($_GET['edit_shipping'])){

$shipping_id = preg_replace('#[^0-9]#', '', $_GET['edit_shipping']);

}
    ?>

<?php

   if(isset($_GET['delete_shipping'])){

    $delete_shipping = preg_replace('#[^0-9]#', '', $_GET['delete_shipping']);
    
try {
    //Deleting a row using a prepared statement.
$sql = "DELETE FROM shipping_wwe_tb WHERE id = :delete_shipping";
$statement = $conn->prepare($sql);
$ToDelete = $delete_shipping;
$statement->bindValue(':delete_shipping', $ToDelete);
$delete = $statement->execute();
echo "<script> window.location.replace('shipping_wwe.php') </script>";
    }
   catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

}
?>

<?php

   if(isset($_GET['delete_all'])){
      echo "Loading, Please wait...";
    $delete_all =  $_GET['delete_all'];
    
try {
    //Deleting a row using a prepared statement.
$sql = "DELETE FROM shipping_wwe_tb ";
$statement = $conn->prepare($sql);
$delete = $statement->execute();
echo "<script> window.location.replace('shipping_wwe.php') </script>";
    }
   catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

}
?>

<?php

if(isset($_POST['submit'])){

try{
     
     $stmt = $conn->prepare("INSERT INTO shipping_wwe_tb(kg, zone1, zone2, zone3, zone4, zone5, zone6, zone7, zone8, date, type)
     VALUES(:kg, :zone1, :zone2, :zone3, :zone4, :zone5, :zone6, :zone7, :zone8 , :date,:type)");

        $kg = htmlentities($_POST['kg']);
        $zone1 = htmlentities($_POST['zone1']);
        $zone2 = htmlentities($_POST['zone2']);
        $zone3 = htmlentities($_POST['zone3']);
        $zone4 = htmlentities($_POST['zone4']);
        $zone5 = htmlentities($_POST['zone5']);
        $zone6 = htmlentities($_POST['zone6']);
        $zone7 = htmlentities($_POST['zone7']);
        $zone8 = htmlentities($_POST['zone8']);
        $type = htmlentities($_POST['type']);
        $date = date('Y-m-d');

        // SET PARAMETERS
        $stmt->bindParam(':kg', $kg);
        $stmt->bindParam(':zone1', $zone1);
        $stmt->bindParam(':zone2', $zone2);
        $stmt->bindParam(':zone3', $zone3);
        $stmt->bindParam(':zone4', $zone4);
        $stmt->bindParam(':zone5', $zone5);
        $stmt->bindParam(':zone6', $zone6);
        $stmt->bindParam(':zone7', $zone7);
        $stmt->bindParam(':zone8', $zone8);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':type', $type);
        // EXECUTE
        $stmt->execute();

        // SUCCESS MESSAGE
         $message = '<span style="color:green">New records created successfully</span>';

     
  }catch(PDOException $e)
    {
    // ERROR MESSAGE
    $message = "<br>" . $e->getMessage();
    }
    
    // CLOSE CONNECTION
//$conn = null;

}


?>


<?php

if(isset($_POST['import'])){

try{

       echo $filename=$_FILES["file"]["tmp_name"];

        if($_FILES["file"]["size"] > 0)
        {

        $file = fopen($filename, "r");
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
        {

             $stmt = $conn->prepare("INSERT INTO shipping_wwe_tb(kg, zone1, zone2, zone3, zone4, zone5, zone6, zone7, zone8, date, type)
     VALUES(:kg, :zone1, :zone2, :zone3, :zone4, :zone5, :zone6, :zone7, :zone8 , :date, :type)");

        $date = date('Y-m-d');

        // SET PARAMETERS
        $stmt->bindParam(':kg', $emapData['0']);
        $stmt->bindParam(':zone1', $emapData['1']);
        $stmt->bindParam(':zone2', $emapData['2']);
        $stmt->bindParam(':zone3', $emapData['3']);
        $stmt->bindParam(':zone4', $emapData['4']);
        $stmt->bindParam(':zone5', $emapData['5']);
        $stmt->bindParam(':zone6', $emapData['6']);
        $stmt->bindParam(':zone7', $emapData['7']);
        $stmt->bindParam(':zone8', $emapData['8']);
        $stmt->bindParam(':type', $emapData['9']);
        $stmt->bindParam(':date', $date);

        // EXECUTE
        $stmt->execute();

         // SUCCESS MESSAGE
         $message = '<span style="color:green">File has been successfully Imported</span>';

    }
       

     }else{  $message = '<span style="color:red">Error</span>'; }

  }catch(PDOException $e)
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

         $stmt = $conn->prepare("UPDATE shipping_wwe_tb SET kg = :kg,  zone1 = :zone1, zone2 = :zone2, zone3 = :zone3, zone4 = :zone4, zone5 = :zone5, zone6= :zone6, zone7 = :zone7, zone8 = :zone8, type = :type  WHERE id = :id");

        $kg = htmlentities($_POST['kg']);
        $zone1 = htmlentities($_POST['zone1']);
        $zone2 = htmlentities($_POST['zone2']);
        $zone3 = htmlentities($_POST['zone3']);
        $zone4 = htmlentities($_POST['zone4']);
        $zone5 = htmlentities($_POST['zone5']);
        $zone6 = htmlentities($_POST['zone6']);
        $zone7 = htmlentities($_POST['zone7']);
        $zone8 = htmlentities($_POST['zone8']);
        $type = htmlentities($_POST['type']);
       // $date = date('Y-m-d');

        // SET PARAMETERS
        $stmt->bindParam(':kg', $kg);
        $stmt->bindParam(':zone1', $zone1);
        $stmt->bindParam(':zone2', $zone2);
        $stmt->bindParam(':zone3', $zone3);
        $stmt->bindParam(':zone4', $zone4);
        $stmt->bindParam(':zone5', $zone5);
        $stmt->bindParam(':zone6', $zone6);
        $stmt->bindParam(':zone7', $zone7);
        $stmt->bindParam(':zone8', $zone8);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':id', $shipping_id);

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
                              Country <?= $message;?> 
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
                                <!--    <h3 class="title">Add</h3>
                                <p> Product Attribute for your store can be managed here.</p>-->
                                </div>
          <div class="block-content block-content-narrow">
    <?php if(empty($shipping_id)){ ?>


        <form class="form-horizontal" action="shipping_wwe.php" method="post" enctype="multipart/form-data" >               
            <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Kg</label>
                     <div class="col-sm-12">
             <input class="form-control" type="number" id="" name="kg" placeholder="Kg" step="0.01" required="" >
                     </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Zone 1</label>
                     <div class="col-sm-12">
             <input class="form-control" type="number" value="0"  name="zone1" step="0.01" placeholder="Zone 1">
                     </div>
            </div>

             <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Zone 2</label>
                     <div class="col-sm-12">
             <input class="form-control" type="text" id="" value="0" name="zone2" placeholder="Zone 2" >
                     </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Zone 3</label>
                     <div class="col-sm-12">
             <input class="form-control" type="number"  value="0" name="zone3" step="0.01" placeholder="Zone3">
                     </div>
            </div>

             <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Zone 4</label>
                     <div class="col-sm-12">
             <input class="form-control" type="number" value="0" name="zone4" step="0.01"  placeholder="zone 4" >
                     </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Zone 5</label>
                     <div class="col-sm-12">
             <input class="form-control" type="number"  value="0" name="zone5" placeholder="Zone 5" step="0.01">
                     </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Zone 6</label>
                     <div class="col-sm-12">
             <input class="form-control" type="number"  value="0" name="zone6" placeholder="Zone 6" step="0.01">
                     </div>
            </div>

             <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Zone 7</label>
                     <div class="col-sm-12">
             <input class="form-control" type="number"  value="0" name="zone7" placeholder="Zone 7" step="0.01">
                     </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Zone 8</label>
                     <div class="col-sm-12">
             <input class="form-control" type="number" value="0"  name="zone8" placeholder="Zone 8" step="0.01">
                     </div>
            </div>

        <div class="form-group">
                <label class="col-xs-12" for="example-select">Type</label>
         <div class="col-sm-12">
        <select class="js-select2 form-control" id="example2-select2"  style="width: 100%;" data-placeholder="Choose many.." name="type" required="" >
         <option value="">None</option>
         <option value="1">Domestic</option>
         <option value="2">International</option>
         
      </select>
            </div>
        </div>


                  <div class="form-group">
                    <div class="col-xs-12">
                      <button class="btn btn-sm btn-primary" type="submit" name="submit">Publish</button>
                      </div>
                   </div>

            </form>

                 <form class="form-horizontal" action="shipping_wwe.php" method="post" enctype="multipart/form-data" >               
             <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Select Excel File</label>
                     <div class="col-sm-12">
             <input class="form-control" type="file"  name="file"  required="" >
                     </div>
            </div>

            <!--<div class="form-group">
                <label class="col-xs-12" for="example-text-input">Country Code</label>
                     <div class="col-sm-12">
             <input class="form-control" type="text"  name="country_code" placeholder="Country Code">
                     </div>
                </div>-->

            <div class="form-group">
                    <div class="col-xs-12">
                      <button class="btn btn-sm btn-primary" type="submit" name="import">Publish</button>
                      </div>
            </div>

        </form>

<?php }else{ ?>

    <?php
                              
                    try {
                   
                    $sql = "SELECT * from shipping_wwe_tb WHERE id = $shipping_id ";
                    $q = $conn->query($sql);
                    $q->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $q->fetch()):

                     $id = $row['id'];
                     $kg= $row['kg'];
                     $zone1= $row['zone1'];
                     $zone2= $row['zone2'];
                     $zone3= $row['zone3'];
                     $zone4= $row['zone4'];
                     $zone5= $row['zone5'];
                     $zone6= $row['zone6'];
                     $zone7= $row['zone7'];
                     $zone8= $row['zone8'];
                     $type= $row['type'];

                    endwhile;
                      
               
                        } catch (PDOException $e) {
                            die("Could not connect to the database $dbname :" . $e->getMessage());
                        }
?>

                   <form class="form-horizontal" action="shipping_wwe.php?edit_shipping=<?= $id; ?>" method="post" enctype="multipart/form-data" >               
                      
           <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Kg</label>
                     <div class="col-sm-12">
             <input class="form-control" type="number"   value="<?= $kg; ?>" name="kg" placeholder="Kg" step="0.01" required="" >
                     </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Zone 1</label>
                     <div class="col-sm-12">
             <input class="form-control" type="number" value="<?= $zone1; ?>"  name="zone1" step="0.01" placeholder="Zone 1">
                     </div>
            </div>

             <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Zone 2</label>
                     <div class="col-sm-12">
             <input class="form-control" type="text" id="" value="<?= $zone2; ?>" name="zone2" placeholder="Zone 2" >
                     </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Zone 3</label>
                     <div class="col-sm-12">
             <input class="form-control" type="number"  value="<?= $zone3; ?>" name="zone3" step="0.01" placeholder="Zone3">
                     </div>
            </div>

             <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Zone 4</label>
                     <div class="col-sm-12">
             <input class="form-control" type="number" value="<?= $zone4; ?>" name="zone4" step="0.01"  placeholder="zone 4" >
                     </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Zone 5</label>
                     <div class="col-sm-12">
             <input class="form-control" type="number"  value="<?= $zone5; ?>" name="zone5" placeholder="Zone 5" step="0.01">
                     </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Zone 6</label>
                     <div class="col-sm-12">
             <input class="form-control" type="number"  value="<?= $zone6; ?>" name="zone6" placeholder="Zone 6" step="0.01">
                     </div>
            </div>

             <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Zone 7</label>
                     <div class="col-sm-12">
             <input class="form-control" type="number"  value="<?= $zone7; ?>" name="zone7" placeholder="Zone 7" step="0.01">
                     </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Zone 8</label>
                     <div class="col-sm-12">
             <input class="form-control" type="number" value="<?= $zone8; ?>"  name="zone8" placeholder="Zone 8" step="0.01">
                     </div>
            </div>

     <div class="form-group">
                <label class="col-xs-12" for="example-select">Type</label>
         <div class="col-sm-12">
        <select class="js-select2 form-control" id="example2-select2"  style="width: 100%;" data-placeholder="Choose many.." name="type" required="" >
         <option <?php if($type == ""){ echo "selected"; }?> value="">None</option>
         <option <?php if($type == 1){ echo "selected"; }?> value="1">Domestic</option>
         <option <?php if($type == 2){ echo "selected"; }?> value="2">International</option>
         
      </select>
            </div>
        </div>

                  <div class="form-group">
                    <div class="col-xs-12">
                      <button class="btn btn-sm btn-primary" type="submit" name="update">Publish</button>
                      </div>
                   </div>

                 </form>

                <?php } ?>



                                </div>
                            </div>
                            <!-- END Default Elements -->
                        </div>
                        <div class="col-md-8">
                            <!-- Normal Form -->
                            <div class="block">
                                <div class="block-content">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
                            <form action="shipping_wwe.php" method="Get">
                            <button class="btn btn-sm btn-primary" type="submit" name="delete_all" value="delete" onClick ="return confirm('Are you sure You want to Delete All Records')" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Delete All">Delete All </button>
                            </form>


                                   <?php
                              
                    try {
                   
                    $sql = "SELECT * from shipping_wwe_tb ";
                    $q = $conn->query($sql);
                    $q->setFetchMode(PDO::FETCH_ASSOC);
                   
                        // $id = $row['id'];
               
                        } catch (PDOException $e) {
                            die("Could not connect to the database $dbname :" . $e->getMessage());
                        }
                    ?>

                            <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Kg</th>
                                        <th>Zones</th>
                                        <!--<th class="hidden-xs">Zone</th>-->
                                        <th class="hidden-xs">Date</th>
                                        
                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                    <?php   while ($row = $q->fetch()):  ?>
                  <tr>
                     <td class="text-center"><?= $row['id'];?></td>
                     <td class="text-center"><?= $row['kg'];?></td>
                     <td class="font-w600">

                        Zone 1 <b> &#8373 <?= $row['zone1'];?> </b>
                        Zone 2 <b> &#8373 <?= $row['zone2'];?></b> <br/>

                        Zone 3 <b> &#8373 <?= $row['zone3'];?> </b>
                        Zone 4 <b> &#8373 <?= $row['zone4'];?></b> <br/>

                        Zone 5 <b> &#8373 <?= $row['zone5'];?> </b>
                        Zone 6 <b> &#8373 <?= $row['zone6'];?></b> <br/>

                        Zone 7 <b> &#8373 <?= $row['zone7'];?></b>
                        Zone 8 <b> &#8373 <?= $row['zone8'];?></b>
                            
                        </td>
                                       
                      <td class="hidden-xs"><?= $row['date'];?> <br>
                          
                          <?php 
                                             if($row['type'] == 1){
                                                 
                                                 echo "Domestic";

                                             }else if($row['type'] == 2){

                                                 echo "International";

                                             }else{
                                                 
                                             echo "Undefined";
                                             }

                                            ?>

                      </td>
                    <td class="text-center">
                        <div class="btn-group">
                        <a href="shipping_wwe.php?edit_shipping=<?php echo $row['id']; ?>" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="shipping_wwe.php?delete_shipping=<?php echo $row['id'];?>" onClick ="return confirm('Are you sure You want to Delete')" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                        </div>
                    </td>
                 </tr>
                    <?php   endwhile;  ?>
                                 
                                </tbody>
                            </table>
                        </div>
                            </div>
                            <!-- END Normal Form -->

                            <!-- Inline Form -->
                            
                            <!-- END Inline Form -->

                           
                         
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