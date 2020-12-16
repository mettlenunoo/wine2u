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
    //  ASSIGN VALUES TO THE VARIABLES
    $name1=basename($_FILES['image']['name']);
    $t_name1=$_FILES['image']['tmp_name'];
    $dir='img';
    //$sel_table = "category_tb";
     // THIS IS FROM FUNCTION
   // $check = check_title($sel_table, $title);
    // this is function
    
try{
      //if($check == ""){

        $stmt = $conn->prepare("UPDATE attribute_tb SET name = :name,  slug = :slug, parent_id = :parent_id WHERE id = :id");

        $name = htmlentities($_POST['title']);
        $slug = htmlentities($_POST['slug']);
        $parent_id = htmlentities($_POST['parent_id']);
        $date = date('Y-m-d');

        // SET PARAMETERS
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':slug', $slug);
        $stmt->bindParam(':parent_id', $parent_id);
        $stmt->bindParam(':id', $attribute_id);
        // EXECUTE
        $stmt->execute();

        // SUCCESS MESSAGE
         $message = '<span style="color:green">Record Updated successfully</span>';

    //  }else{$message = "Slug already Exists";}
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
                              Attribute <?= $message;?> <small>Add a Attribute </small>
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
                                    <h3 class="title">Add New  Attribute</h3>
                                <p> Product Attribute for your store can be managed here.</p>
                                </div>
          <div class="block-content block-content-narrow">
    <?php if(empty($attribute_id)){ ?>
        <form class="form-horizontal" action="attributes.php" method="post" enctype="multipart/form-data" >               
             <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Name</label>
                     <div class="col-sm-12">
             <input class="form-control" type="text" id="" name="title" placeholder="Name" onchange="myFunction(this.value)">
                     </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Slug</label>
                     <div class="col-sm-12">
             <input class="form-control" type="text" id="slug_title" name="slug" placeholder="Slug">
                     </div>
                </div>
                                        
               <div class="form-group">
                <label class="col-xs-12" for="example-select">Parent</label>
            <div class="col-sm-12">
        <select class="js-select2 form-control" id="example2-select2"  style="width: 100%;" data-placeholder="Choose many.." name="parent_id" >
        <option value="0">None</option>
           <?php 
           $parent_id = 0;
           $sql = "SELECT * from attribute_tb WHERE parent_id = $parent_id ";
           $q = $conn->query($sql);
           $q->setFetchMode(PDO::FETCH_ASSOC);
           $rows = $q->rowCount();
          
            while ($row = $q->fetch()):

            ?>
         <option value="<?= $row['id'];?>"><?= $row['name']; ?></option>

         <?php endwhile; ?>

      </select>
            </div>
        </div>

                  <div class="form-group">
                    <div class="col-xs-12">
                      <button class="btn btn-sm btn-primary" type="submit" name="submit">Add Attribute</button>
                      </div>
                   </div>

                 </form>

<?php }else{ ?>

    <?php
                              
                    try {
                   
                    $sql = "SELECT * from attribute_tb WHERE id = $attribute_id ";
                    $q = $conn->query($sql);
                    $q->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $q->fetch()):
                     $id = $row['id'];
                     $name= $row['name'];
                     $slug= $row['slug'];
                     $parent_id= $row['parent_id'];

                    endwhile;
                      
               
                        } catch (PDOException $e) {
                            die("Could not connect to the database $dbname :" . $e->getMessage());
                        }
?>

     <form class="form-horizontal" action="attributes.php?edit_attr=<?= $id; ?>" method="post" enctype="multipart/form-data" >               
             <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Name</label>
                     <div class="col-sm-12">
             <input class="form-control" type="text" id="" name="title" value="<?= $name; ?>" placeholder="Name" onchange="myFunction(this.value)">
                     </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Slug</label>
                     <div class="col-sm-12">
             <input class="form-control" type="text" id="slug_title" name="slug" value="<?= $slug; ?>" placeholder="Slug">
                     </div>
                </div>
              <div class="form-group">
                <label class="col-xs-12" for="example-select">Parent</label>
            <div class="col-sm-12">
 <select class="form-control" id="example-select" name="parent_id" size="1">
        <option value="0">None</option>
           <?php 
           $pat_id = 0;
           $sql = "SELECT * from attribute_tb WHERE parent_id = $pat_id ";
           $q = $conn->query($sql);
           $rows = $q->rowCount();
           $q->setFetchMode(PDO::FETCH_ASSOC);

            while ($row = $q->fetch()):
            ?>
         <option <?php if($parent_id == $row['id']){  echo "selected";  } ?> value="<?= $row['id'];?>"><?= $row['name']; ?></option>
         <?php endwhile; ?>
     </select>
                                            </div>
                                        </div>

                       
                  <div class="form-group">
                    <div class="col-xs-12">
                      <button class="btn btn-sm btn-primary" type="submit" name="update">Update Attribute</button>
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
                   
                    $sql = "SELECT * from attribute_tb ";
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
                                        <th>Name</th>
                                        <th class="hidden-xs">Slug</th>
                                        <th class="hidden-xs">Parent</th>
                                        
                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                    <?php   while ($row = $q->fetch()):  ?>
                                    <tr>
                                        <td class="text-center"><?= $row['id'];?></td>
                                        <td class="font-w600"><?= $row['name'];?></td>
                                        <td class="hidden-xs"><?= $row['slug'];?></td>
                                     <td class="hidden-xs">
                                        <?php 
     $parent_ids = $row['parent_id'];
     $sql_parent = "SELECT * from attribute_tb  WHERE id = $parent_ids ";
                    $q_p = $conn->query($sql_parent);
                    $q_p->setFetchMode(PDO::FETCH_ASSOC);
                 $parent_name = "Parent";
            while ($row_q = $q_p->fetch()):

                 $parent_name = $row_q['name'];
    
            endwhile;

             echo  $parent_name;
                                        ?>
                                        </td>
                                            <td class="text-center">
                                            <div class="btn-group">
                                            <a href="attributes.php?edit_attr=<?php echo $row['id']; ?>" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                                <a href="attributes.php?delete_attr=<?php echo $row['id'];?>" onClick ="return confirm('Are you sure You want to Delete')" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
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