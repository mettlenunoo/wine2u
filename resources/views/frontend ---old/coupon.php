<?php require_once("includes/session.php");?>
<?php confirm_session();?>
<?php require_once("includes/connection.php");?>
<?php require_once("includes/function.php");
  $message = "";
?>

<?php   

 if(isset($_GET['edit_cou'])){

  $coupon_id = preg_replace('#[^0-9]#', '', $_GET['edit_cou']);

  }

    ?>
<?php

   if(isset($_GET['delete_category'])){

    $delete_category = preg_replace('#[^0-9]#', '', $_GET['delete_category']);
    
try {
    //Deleting a row using a prepared statement.
$sql = "DELETE FROM category_tb WHERE id = :category_id";
$statement = $conn->prepare($sql);
$ToDelete = $delete_category;
$statement->bindValue(':category_id', $ToDelete);
$delete = $statement->execute();
echo "<script> window.location.replace('categories.php') </script>";
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
       $check = "";

      if($check == ""){


    $stmt = $conn->prepare("INSERT INTO coupon_tb(coupon_code, assigned_to, coupon_type, amount, date, min_amount, max_amount, usages, usaged, status,date_used,country)
    VALUES(:coupon_code, :assigned_to, :coupon_type, :amount, :date, :min_amount, :max_amount, :usages, :usaged, :status, :date_used,:country)");

    
        $coupon_code = htmlentities($_POST['coupon_code']);
        $assigned_to = htmlentities($_POST['assigned_to']);
        $coupon_type = htmlentities($_POST['coupon_type']);
        $amount = $_POST['amount'];
        $date = $_POST['date'];
        $min_amount = $_POST['min_amount'];
        $max_amount = $_POST['max_amount'];
        $usages = $_POST['usages'];
        $usaged = 0;
        $status = $_POST['status'];
        $country = $_POST['country'];
        $date_used = "";
        

        // SET PARAMETERS
        $stmt->bindParam(':coupon_code', $coupon_code);
        $stmt->bindParam(':assigned_to', $assigned_to);
        $stmt->bindParam(':coupon_type', $coupon_type);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':min_amount', $min_amount);
        $stmt->bindParam(':max_amount', $max_amount);
        $stmt->bindParam(':usages', $usages);
        $stmt->bindParam(':usaged', $usaged);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':date_used', $date_used);
        $stmt->bindParam(':country', $country);

        // EXECUTE
        $stmt->execute();

        // SUCCESS MESSAGE
         $message = '<span style="color:green">New records created successfully </span>';

      }else{

        $message = '<span style="color:red">Slug already Exists</span>';

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
      
     $stmt = $conn->prepare("UPDATE coupon_tb SET coupon_code = :coupon_code, assigned_to = :assigned_to, coupon_type = :coupon_type, amount = :amount, date = :date, min_amount = :min_amount, max_amount = :max_amount, usages = :usages, usaged = :usaged, status = :status,date_used = :date_used, country = :country WHERE id = :id");

    
        $coupon_code = htmlentities($_POST['coupon_code']);
        $assigned_to = htmlentities($_POST['assigned_to']);
        $coupon_type = htmlentities($_POST['coupon_type']);
        $amount = $_POST['amount'];
        $date = $_POST['date'];
        $min_amount = $_POST['min_amount'];
        $max_amount = $_POST['max_amount'];
        $usages = $_POST['usages'];
        $usaged = 0;
        $status = $_POST['status'];
        $country = $_POST['country'];;
        $date_used = "";
        

        // SET PARAMETERS
        $stmt->bindParam(':coupon_code', $coupon_code);
        $stmt->bindParam(':assigned_to', $assigned_to);
        $stmt->bindParam(':coupon_type', $coupon_type);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':min_amount', $min_amount);
        $stmt->bindParam(':max_amount', $max_amount);
        $stmt->bindParam(':usages', $usages);
        $stmt->bindParam(':usaged', $usaged);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':date_used', $date_used);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':id', $coupon_id);

        // EXECUTE
        $stmt->execute();

  $message = '<span style="color:green">Record Updated successfully </span>';


  }catch(PDOException $e)
    {
    // ERROR MESSAGE
    $message = "<br>" . $e->getMessage();
    }
    
    // CLOSE CONNECTION
//$conn = null;

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
          <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css">
        <link rel="stylesheet" href="assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
        <link rel="stylesheet" href="assets/js/plugins/select2/select2.min.css">
        <link rel="stylesheet" href="assets/js/plugins/select2/select2-bootstrap.css">
        <link rel="stylesheet" href="assets/js/plugins/dropzonejs/dropzone.min.css">
        <link rel="stylesheet" href="assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.css">

        <!-- OneUI CSS framework -->
        <link rel="stylesheet" id="css-main" href="assets/css/oneui.css">

        
    </head>
    <body>
       
        <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
           
        <?php require_once("includes/backend_side_bar.php");?>

            <!-- Main Container -->
            <main id="main-container">
              
            

                <!--  -->
                    <div class="content">
                        <div class="row">
                        <div class="col-md-4">
                            <!-- Default Elements -->
                            <div class="block">
                                <div class="block-header">
                <h3 class="title">Add New Coupon</h3>
                <?= $message; ?>
                
                                </div>
          <div class="block-content block-content-narrow">

    <?php if(empty($coupon_id)){ ?>

  <form class="form-horizontal" action="coupon.php" method="post" enctype="multipart/form-data" >
             <div class="form-group">
          <label class="col-xs-12" for="example-text-input">Coupon Code</label>
                     <div class="col-sm-12">
           <input class="form-control" type="text" id=""  name="coupon_code" placeholder="" >
                     </div>
            </div>

	<div class="form-group">
          <label class="col-xs-12" for="example-text-input">Assigned to</label>
                     <div class="col-sm-12">
           <input class="form-control" type="text" id=""  name="assigned_to" placeholder="User ID" >
                     </div>
            </div>
            
            
        <div class="form-group">
            <label class="col-xs-12" for="example-select">Discount type</label>
            <div class="col-sm-12">
        <select class="js-select2 form-control" onChange="amends()"  style="width: 100%;" data-placeholder="Choose many.." name="coupon_type" id="coupon_type">
         <option value="Cart Coupon">Cart Coupon</option>
         <option value="Delivery"> Delivery </option>
         
      </select>
            </div>
     </div>   
     
     <!-- Modularize -->
     <script>
     function amends(){
     	//alert($("#coupon_type").val());
     	if($("#coupon_type").val() == "Delivery"){
     		$(".min-div").css("display", "none");
     		$(".max-div").css("display", "none");
     	}else{
     		$(".min-div").css("display", "block");
     		$(".max-div").css("display", "block");
     	}	
     }
     </script>
     
     


             <div class="form-group">
          <label class="col-xs-12" for="example-text-input">Coupon percentage</label>
                     <div class="col-sm-12">
                  <input class="form-control" type="number" id="" value="0.0" step="0.01" name="amount" placeholder="" >
                     </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Coupon expiry date</label>
                     <div class="col-sm-12">
                 <input class="form-control" type="date" name="date" value="<?= date('Y-m-d');?>">
                     </div>
            </div>
            
             <div class="form-group">
          <label class="col-xs-12 min-div" for="example-text-input">Minimum spend</label>
                     <div class="col-sm-12">
                  <input class="form-control" type="number" id="" value="0.0" step="0.01" name="min_amount" placeholder="" >
                     </div>
            </div>


            <div class="form-group">
          <label class="col-xs-12 max-div" for="example-text-input">Maximum spend</label>
                     <div class="col-sm-12">
                  <input class="form-control" type="number" id="" value="0.0" step="0.01" name="max_amount" placeholder="" >
                     </div>
            </div>

            <div class="form-group">
          <label class="col-xs-12" for="example-text-input">Usage limit per coupon</label>
                     <div class="col-sm-12">
                  <input class="form-control" type="number" id="" value="0" name="usages" placeholder="" >
                     </div>
            </div>

        <div class="form-group">
            <label class="col-xs-12" for="example-select">Status</label>
            <div class="col-sm-12">
        <select class="js-select2 form-control" id="example2-select2"  style="width: 100%;" data-placeholder="Choose one.." name="status" >
         <option value="active">Active</option>
          <option value="In active">In active</option>
      </select>
            </div>
     </div> 

      <div class="form-group">
            <label class="col-xs-12" for="example-select">Country</label>
            <div class="col-sm-12">
        <select class="js-select2 form-control" id="example2-select2"  style="width: 100%;" data-placeholder="Choose one.." name="country" >
         <option value="Ghana">Ghana</option>
          <option value="International">International</option>
      </select>
            </div>
     </div> 
             
                                      
                  <div class="form-group">
                    <div class="col-xs-12">
                      <button class="btn btn-sm btn-primary" type="submit" name="submit">Publish</button>
                      </div>
                   </div>

                 </form>

<?php }else{ ?>
    <?php
                              
                    try {
                   
                    $sql = "SELECT * from coupon_tb WHERE id = $coupon_id ";
                    $q = $conn->query($sql);
                    $q->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $q->fetch()):

                     $id = $row['id'];
                     $coupon_code= $row['coupon_code'];
                     $assigned_to= $row['assigned_to'];
                     $coupon_type= $row['coupon_type'];
                     $amount= $row['amount'];
                     $date= $row['date'];
                     $min_amount= $row['min_amount'];
                     $max_amount = $row['max_amount'];
                     $usages= $row['usages'];
                     $usaged= $row['usaged'];
                     $status= $row['status'];
                     $date_used = $row['date_used'];
                     $country = $row['country'];

                    endwhile;
                      
               
                        } catch (PDOException $e) {
                            die("Could not connect to the database $dbname :" . $e->getMessage());
                        }
?>

  <form class="form-horizontal" action="coupon.php?edit_cou=<?= $coupon_id;?>" method="post" enctype="multipart/form-data" >
             <div class="form-group">
          <label class="col-xs-12" for="example-text-input">Coupon Code</label>
                     <div class="col-sm-12">
           <input class="form-control" type="text" id="" value="<?= $coupon_code; ?>" name="coupon_code" placeholder="" >
                     </div>
            </div>
            <div class="form-group">
          <label class="col-xs-12" for="example-text-input">Assigned to</label>
                     <div class="col-sm-12">
           <input class="form-control" type="text" id=""  name="assigned_to" placeholder="User ID" value="<?= $assigned_to; ?>" >
                     </div>
            </div>

        <div class="form-group">
            <label class="col-xs-12" for="example-select">Discount type</label>
            <div class="col-sm-12">
        <select class="js-select2 form-control" onChange="amends_ed()"  style="width: 100%;" data-placeholder="Choose one.." name="coupon_type" id="coupon_type_ed">
         <option value="Cart Coupon">Cart Coupon</option>
         <option value="Delivery"> Delivery </option>

      </select>
            </div>
     </div>   
     
     <!-- Modularize -->
     <script>
     function amends_ed(){
     	//alert($("#coupon_type_ed").val());
     	if($("#coupon_type_ed").val() == "Delivery"){
     		$("#min-spend").css("display", "none");
     		$("#max-spend").css("display", "none");
     		$("#min-spend-input").val(0.00);
     		$("#max-spend-input").val(0.00);
     	}else{
     		$("#min-spend").css("display", "block");
     		$("#max-spend").css("display", "block");
     	}	
     }
     </script>


             <div class="form-group">
          <label class="col-xs-12" for="example-text-input">Coupon percentage</label>
                     <div class="col-sm-12">
                  <input class="form-control" type="number" value="<?= $amount; ?>" id=""  step="0.01" name="amount" placeholder="" >
                     </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Coupon expiry date</label>
                     <div class="col-sm-12">
                 <input class="form-control" type="date" name="date" value="<?= $date; ?>">
                     </div>
            </div>
            
             <div class="form-group" id="min-spend">
          <label class="col-xs-12" for="example-text-input">Minimum spend</label>
                     <div class="col-sm-12">
                  <input class="form-control" type="number" id="min-spend-input" value="<?= $min_amount; ?>"  step="0.01" name="min_amount" placeholder="" >
                     </div>
            </div>


            <div class="form-group" id="max-spend">
          <label class="col-xs-12" for="example-text-input">Maximum spend</label>
                     <div class="col-sm-12">
                  <input class="form-control" type="number" id="max-spend-input"  value="<?= $min_amount; ?>" step="0.01" name="max_amount" placeholder="" >
                     </div>
            </div>

            <div class="form-group">
          <label class="col-xs-12" for="example-text-input">Usage limit per coupon</label>
                     <div class="col-sm-12">
                  <input class="form-control" type="number" id=""  value="<?= $usages; ?>" name="usages" placeholder="" >
                     </div>
            </div>

                    <div class="form-group">
            <label class="col-xs-12" for="example-select">Status</label>
            <div class="col-sm-12">
        <select class="js-select2 form-control" id="example2-select2"  style="width: 100%;" data-placeholder="Choose one.." name="status" >
          <option <?php if($status == "active"){ ?> selected <?php }?> value="active"  >Active</option>
          <option <?php if($status == "In active"){ ?> selected <?php }?>  value="In active">In active</option>

      </select>
            </div>
     </div> 

      <div class="form-group">
            <label class="col-xs-12" for="example-select">Country</label>
            <div class="col-sm-12">
        <select class="js-select2 form-control" id="example2-select2"  style="width: 100%;" data-placeholder="Choose one.." name="country" >
          <option <?php if($country == "Ghana"){ ?>  Selected <?php }?> value="Ghana" >Ghana</option>
          <option <?php if($country == "International"){ ?> Selected <?php }?>  value="International" >International</option>

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

                                   <?php
                              
                    try {
                   
                    $sql = "SELECT * from coupon_tb ";
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
                                        <th class="text-center">Coupon Code</th>
                                        <th>Coupon Type</th>
                                        <th class="hidden-xs">Percentage</th>
                                        <th class="hidden-xs">Expiry date</th>
                                        <th class="hidden-xs">Status</th>
                                        
                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                    <?php   while ($row = $q->fetch()):  ?>
                                    <tr>
                                        <td class="text-center"><?= $row['coupon_code'];?></td>
                                        <td class="font-w600">
                                        <?= $row['coupon_type'];?> <br/>
                                        country : <?= $row['country'];?>
                                        </td>
                                        <td class="hidden-xs">


                                            <?= $row['amount'];?>
                                                
                                            </td>
                                        <td class="hidden-xs">
                                            <?= $row['date'];?><br/>
                                            Used on : <?= $row['date_used'];?>
                                        </td>

                                        <td class="hidden-xs">
                                            <?= $row['status'];?><br/>
                                            Usage limlt :  <?= $row['usages'];?> <br/>
                                            Usaged  :  <?= $row['usaged'];?>
                                        </td>

                                            <td class="text-center">
                                            <div class="btn-group">
                                            <a href="coupon.php?edit_cou=<?php echo $row['id']; ?>" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                                <a href="coupon.php?delete_cou=<?php echo $row['id'];?>" onClick ="return confirm('Are you sure You want to Delete')" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
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
        <script src="assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="assets/js/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
        <script src="assets/js/plugins/select2/select2.full.min.js"></script>
        <script src="assets/js/plugins/masked-inputs/jquery.maskedinput.min.js"></script>
        <script src="assets/js/plugins/dropzonejs/dropzone.min.js"></script>
        <script src="assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js"></script>
        <!-- Page JS Plugins -->
        <script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/js/pages/base_tables_datatables.js"></script>
        <script>
            $(function () {
                // Init page helpers (BS Datepicker + BS Colorpicker + Select2 + Masked Input + Tags Inputs plugins)
        App.initHelpers(['datepicker', 'colorpicker', 'select2', 'masked-inputs', 'tags-inputs']);
            });
        </script>

     
         <!-- Page JS Code -->
       

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