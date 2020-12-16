<?php require_once("includes/session.php");?>
<?php confirm_session();?>
<?php require_once("includes/connection.php");?>
<?php require_once("includes/function.php");?>
<?php  if(isset($_GET['edit_cat'])){

$category_id = preg_replace('#[^0-9]#', '', $_GET['edit_cat']);

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
    //  ASSIGN VALUES TO THE VARIABLES
    $name1=basename($_FILES['image']['name']);
    $t_name1=$_FILES['image']['tmp_name'];
    $dir='img';
    $sel_table = "category_tb";
    $slug = htmlentities($_POST['slug']);
     // THIS IS FROM FUNCTION
    $check = check_title($sel_table, $slug);
    // this is function
    if(!empty($name1)){
    $name1 = dub_image($name1);
      }
try{
      if($check == ""){

     if((move_uploaded_file($t_name1,$dir."/".$name1))){

    $stmt = $conn->prepare("INSERT INTO category_tb(name, content, parent_id, slug, date, image, position)
    VALUES(:name, :content, :parent_id, :slug, :date, :image, :position)");

    }else{

     $stmt = $conn->prepare("INSERT INTO category_tb(name, content, parent_id, slug, date, image,position)
    VALUES(:name, :content, :parent_id, :slug, :date, :image, :position)");

    }
        $name = htmlentities($_POST['title']);
        $content = htmlentities($_POST['content']);
       
        $parent_id = htmlentities($_POST['parent_id']);
        $date = date('Y-m-d');

        if(empty($name1)){
          $image = "";
       
         }else{  $image = "img/".$name1; }

        $position = $_POST['position'];

        // SET PARAMETERS
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':parent_id', $parent_id);
        $stmt->bindParam(':slug', $slug);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':position', $position);
        // EXECUTE
        $stmt->execute();

        // SUCCESS MESSAGE
         $message = '<span style="color:green">New records created successfully </span>';

      }else{$message = '<span style="color:red">Slug already Exists</span>';}
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
    $sel_table = "category_tb";
     // THIS IS FROM FUNCTION
   // $check = check_title($sel_table, $title);
    // this is function
    if(!empty($name1)){
    $name1 = dub_image($name1);
      }
try{
      //if($check == ""){
    $position = $_POST['position'];
    $sql = "SELECT * from category_tb WHERE position = '$position' ORDER BY id DESC LIMIT 1 ";
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
          while ($row = $q->fetch()): 
          $id = $row['id'];
          $stm = $conn->prepare("UPDATE category_tb SET  position = :posi WHERE id = :id");
          $i = $_POST['i'];
          $stm->bindParam(':posi', $i);
          $stm->bindParam(':id', $id);
        // EXECUTE
          $stm->execute();
          endwhile; 

     if((move_uploaded_file($t_name1,$dir."/".$name1))){

    $stmt = $conn->prepare("UPDATE category_tb SET name = :name, content = :content, parent_id = :parent_id, slug = :slug, image = :image, position = :position WHERE id = :id");

    }else{

     $stmt = $conn->prepare("UPDATE category_tb SET name = :name, content = :content, parent_id = :parent_id, slug = :slug, position = :position WHERE id = :id");

    }
        $name = htmlentities($_POST['title']);
        $content = htmlentities($_POST['content']);
        $slug = htmlentities($_POST['slug']);
        $parent_id = $_POST['parent_id'];
        $image = "img/".$name1;

        // SET PARAMETERS
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':parent_id', $parent_id);
        $stmt->bindParam(':slug', $slug);
        if(!empty($name1)){
        $stmt->bindParam(':image', $image);
        }
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':id', $category_id);
        // EXECUTE
        $stmt->execute();

        // SUCCESS MESSAGE
         $message = "Record Updated successfully";

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
              
                <div class="content">
                    <div class="row items-push">
                        <div class="col-sm-12">
                              <h1 class="page-heading">
                                Category 
                      <br/><?= $message;?> <br/>
                      <small>Add a  category</small>
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
                                    <h3 class="title">Add New Product Category</h3>
                                <p> Product categories for your store can be managed here.</p>
                                </div>
          <div class="block-content block-content-narrow">
    <?php if(empty($category_id)){ ?>
        <form class="form-horizontal" action="categories.php" method="post" enctype="multipart/form-data" >               
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
           $sql = "SELECT * from category_tb ";
           $q = $conn->query($sql);
           $q->setFetchMode(PDO::FETCH_ASSOC);
           $rows = $q->rowCount();
           $rows = $rows + 1;
            while ($row = $q->fetch()):
            ?>
         <option value="<?= $row['id'];?>"><?= $row['name']; ?></option>
         <?php endwhile; ?>

      </select>
            </div>
        </div>

          <div class="form-group">
        <label class="col-xs-12" for="example-select">Position</label>
        <div class="col-sm-12">
       <select class="form-control" id="example-select" name="position" size="1" required="">
      <?php for($i = 1;$i <= $rows; $i++){?>
                                   
      <option selected  value="<?= $i ?>"><?= $i ?></option>
             
        <?php } ?>

     <!--<input type="hidden" name="i" value="<?= $position ?>" >-->

                                                </select>
                                       </div>
                                    </div>
                                        

        <div class="form-group">
    <label class="col-xs-12" for="example-textarea-input">Description</label>
                            <div class="col-xs-12">
         <textarea class="form-control" id="example-textarea-input" name="content" rows="6" placeholder="Content.."></textarea>
                                            </div>

                                        </div>
           <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Thumbnail</label>
                    
    <input class="form-control" type="file"  name="image" >
                     
            </div>
                                     
                  <div class="form-group">
                    <div class="col-xs-12">
                      <button class="btn btn-sm btn-primary" type="submit" name="submit">Add Category</button>
                      </div>
                   </div>

                 </form>

<?php }else{ ?>
    <?php
                              
                    try {
                   
                    $sql = "SELECT * from category_tb WHERE id = $category_id ";
                    $q = $conn->query($sql);
                    $q->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $q->fetch()):
                     $id = $row['id'];
                     $name= $row['name'];
                     $slug= $row['slug'];
                     $content= $row['content'];
                     $parent_id= $row['parent_id'];
                     $image= $row['image'];
                     $position = $row['position'];

                    endwhile;
                      
               
                        } catch (PDOException $e) {
                            die("Could not connect to the database $dbname :" . $e->getMessage());
                        }
?>

 <form class="form-horizontal" action="categories.php?edit_cat=<?= $id; ?>" method="post" enctype="multipart/form-data" >               
             <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Name</label>
                     <div class="col-sm-12">
             <input class="form-control" type="text" id="" name="title"  value="<?= $name;?>" placeholder="Name" onchange="myFunction(this.value)">
                     </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Slug</label>
                     <div class="col-sm-12">
             <input class="form-control" type="text" id="slug_title" name="slug" value="<?= $slug;?>" placeholder="Slug">
                     </div>
                </div>
                                        
                <div class="form-group">
                <label class="col-xs-12" for="example-select">Parent</label>
            <div class="col-sm-12">
        <select class="form-control" id="example-select" name="parent_id" size="1">
        <option value="0">None</option>
           <?php 
           $sql = "SELECT * from category_tb ";
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

            <select class="form-control" id="example-select" name="position" size="1" required="">
                             <?php for($i = 1;$i <= $rows; $i++){?>
                                   
    <option <?php if($position == $i){?> selected <?php } ?> value="<?= $i ?>"><?= $i ?></option>
             
                                                 <?php } ?>
               <input type="hidden" name="i" value="<?= $position ?>" >

                           <div class="form-group">
    <label class="col-xs-12" for="example-textarea-input">Description</label>
                            <div class="col-xs-12">
         <textarea class="form-control" id="example-textarea-input" name="content" rows="6" placeholder="Content.."><?= $content;?></textarea>
                                            </div>

                                        </div>
            <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Thumbnail</label>
                    
   <input class="form-control" type="file"  name="image" >
      <img src="<?= $image;?>" height="70px" width="100px">
            </div>
                                     
                  <div class="form-group">
                    <div class="col-xs-12">
                      <button class="btn btn-sm btn-primary" type="submit" name="update">Update Category</button>
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
                   
                    $sql = "SELECT * from category_tb ";
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
                                        <th class="text-center">Image</th>
                                        <th>Name</th>
                                        <th class="hidden-xs">Slug</th>
                                        <th class="hidden-xs">Position</th>
                                        
                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                    <?php   while ($row = $q->fetch()):  ?>
                                    <tr>
                                        <td class="text-center">
                                          <img 
                     src="<?php  
                     if(empty($row['image'])){

                        echo "img/default_img.jpg";

                      }else{

                        echo $row['image']; 

                       }
                      ;?>" 
                           height="50px" width="70px"

                                          ></td>
                                        <td class="font-w600"><?= $row['name'];?></td>
                                        <td class="hidden-xs"><?= $row['slug'];?></td>
                                     <td class="hidden-xs">
                                            <?= $row['position'];?>
                                        </td>
                                            <td class="text-center">
                                            <div class="btn-group">
                                            <a href="categories.php?edit_cat=<?php echo $row['id']; ?>" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                                <a href="categories.php?delete_category=<?php echo $row['id'];?>" onClick ="return confirm('Are you sure You want to Delete')" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
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