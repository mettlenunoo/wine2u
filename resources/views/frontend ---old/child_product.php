<?php require_once("includes/session.php");?>
<?php confirm_session();?> 

<?php require_once("includes/connection.php");?>
<?php require_once("includes/function.php");?>
<?php

   if(isset($_GET['edit_product'])){

   $edit_product = preg_replace('#[^0-9]#', '', $_GET['edit_product']);
    }
    ?>


<?php

if(isset($_POST['submit'])){
    

    $sel_table = "product_child_tb";
    $name = htmlentities($_POST['product']);
    $sku = htmlentities($_POST['sku']);
    $qty = htmlentities($_POST['qty']);
    $stock = htmlentities($_POST['stock']);
    $wty = htmlentities($_POST['wty']);
    $lengh = htmlentities($_POST['lengh']);
    $wth = htmlentities($_POST['wth']);
    $hty = htmlentities($_POST['hty']);
    $size = htmlentities($_POST['size']);
    $color = htmlentities($_POST['color']);
    $publish = htmlentities($_POST['publish']);
    $date = date('Y-m-d');

    $regular_gh = htmlentities($_POST['regular_gh']);
    $sales_gh = htmlentities($_POST['sales_gh']);
    $regular_us = htmlentities($_POST['regular_us']);
    $sales_us = htmlentities($_POST['sales_us']);
    $regular_uk = htmlentities($_POST['regular_uk']);
    $sales_uk = htmlentities($_POST['sales_uk']);



try{

       $stmt = $conn->prepare("INSERT INTO product_child_tb(title, sku, qty, stock, weight, lenght, width, height, size, color, publish, date, regular_gh, sales_gh, regular_us, sales_us, regular_uk, sales_uk)
        VALUES(:name, :sku, :qty, :stock,:wty, :lengh, :wth, :hty, :size, :color, :publish, :date, :regular_gh, :sales_gh, :regular_us, :sales_us, :regular_uk, :sales_uk)");

     
        // SET PARAMETERS
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':sku', $sku);
        $stmt->bindParam(':qty', $qty);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':wty', $wty);
        $stmt->bindParam(':lengh', $lengh);
        $stmt->bindParam(':wth', $wth);
        $stmt->bindParam(':hty', $hty);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':size', $size);
        $stmt->bindParam(':color', $color);
        $stmt->bindParam(':publish', $publish);
        
        // PRICE
        $stmt->bindParam(':regular_gh', $regular_gh);
        $stmt->bindParam(':sales_gh', $sales_gh);
        $stmt->bindParam(':regular_us', $regular_us);
        $stmt->bindParam(':sales_us', $sales_us);
        $stmt->bindParam(':regular_uk', $regular_uk);
        $stmt->bindParam(':sales_uk', $sales_uk);
        
        // EXECUTE
        $stmt->execute();
        
        //############################# GET CURRENT ID ##########################//

         $sql = "SELECT * from product_child_tb WHERE title = :name AND date = :date AND size = :size ORDER BY ID DESC limit 1";
 
                   // QUERY
                    $q = $conn->prepare($sql);
                    // SET PARAMETERS
                    $q->bindParam(':name', $name);
                    $q->bindParam(':date', $date);
                    $q->bindParam(':size', $size);

                   // EXECUTE
                   $q->execute();
                   // FETCH RESULT
                   $q->setFetchMode(PDO::FETCH_ASSOC);
                   $gallery_id = 0;
                   while ($row = $q->fetch()):
              
                   $gallery_id = $row['id'];
             
                   endwhile;

//############################# GET CURRENT ID ##########################//
          

        // SUCCESS MESSAGE
         $message = '<span style="color: red">New records created successfully </span>';
     
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
   
    $name = htmlentities($_POST['product']);
    $sku = htmlentities($_POST['sku']);
    $qty = htmlentities($_POST['qty']);
    $stock = htmlentities($_POST['stock']);
    $wty = htmlentities($_POST['wty']);
    $lengh = htmlentities($_POST['lengh']);
    $wth = htmlentities($_POST['wth']);
    $hty = htmlentities($_POST['hty']);
    $size = htmlentities($_POST['size']);
    $color = htmlentities($_POST['color']);
    $publish = htmlentities($_POST['publish']);
    $date = date('Y-m-d');

    $regular_gh = htmlentities($_POST['regular_gh']);
    $sales_gh = htmlentities($_POST['sales_gh']);
    $regular_us = htmlentities($_POST['regular_us']);
    $sales_us = htmlentities($_POST['sales_us']);
    $regular_uk = htmlentities($_POST['regular_uk']);
    $sales_uk = htmlentities($_POST['sales_uk']);
   

try{
    

     $stmt = $conn->prepare("UPDATE product_child_tb SET title = :name,  sku = :sku, qty = :qty, stock = :stock, weight = :wty, lenght = :lengh, width = :wth, height = :hty, category = :category, size = :size, color = :color, publish = :publish,  regular_gh = :regular_gh, sales_gh = :sales_gh, regular_us = :regular_us, sales_us = :sales_us, regular_uk = :regular_uk, sales_uk = :sales_uk  WHERE id = :id");
 
        // SET PARAMETERS
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':sku', $sku);
        $stmt->bindParam(':qty', $qty);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':wty', $wty);
        $stmt->bindParam(':lengh', $lengh);
        $stmt->bindParam(':wth', $wth);
        $stmt->bindParam(':hty', $hty);

        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':size', $size);
        
        $stmt->bindParam(':color', $color);
        $stmt->bindParam(':publish', $publish);
        // PRICE
        $stmt->bindParam(':regular_gh', $regular_gh);
        $stmt->bindParam(':sales_gh', $sales_gh);
        $stmt->bindParam(':regular_us', $regular_us);
        $stmt->bindParam(':sales_us', $sales_us);
        $stmt->bindParam(':regular_uk', $regular_uk);
        $stmt->bindParam(':sales_uk', $sales_uk);
        $stmt->bindParam(':id', $edit_product);
        // EXECUTE
        $stmt->execute();
        

        // SUCCESS MESSAGE
         $message = "Updated successfully";

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
<html class="ie9 no-focus"> 
<![endif]-->
<!--[if gt IE 9]><!--> 
<html class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title><?= $project_title ;?></title>

        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

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
        <link rel="stylesheet" href="assets/js/plugins/select2/select2.min.css">
        <link rel="stylesheet" href="assets/js/plugins/select2/select2-bootstrap.css">
        <link rel="stylesheet" href="assets/js/plugins/summernote/summernote.min.css">
        <link rel="stylesheet" href="assets/js/plugins/summernote/summernote-bs3.min.css">
        <link rel="stylesheet" href="assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.css">


        <!-- OneUI CSS framework -->
        <link rel="stylesheet" id="css-main" href="assets/css/oneui.css">
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
    </head>
    <body>
        
        <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
            

            <!-- Sidebar -->
<?php require_once("includes/backend_side_bar.php");?>
            <!-- END Header -->

            <!-- Main Container -->
    <main id="main-container">
                <!-- Page Header -->
                  <div class="content">
                    <div class="row items-push">
                        <div class="col-sm-12">
                            <h1 class="page-heading">
                                Add Child Product <small>Fill the forms below</small>

                            </h1>
                            <p><?= $message; ?></p>
                        </div>
                    </div>
                </div>
                <!-- END Page Header -->

                <!-- Page Content -->
                <div class="content">
                    <div class="row">
                         <div class="col-md-8">
                            <!-- Default Elements -->
                            <div class="block">
                               
                    <div class="block-content">
      <?php if(empty($edit_product)){ ?>


    <form class="form-horizontal" action="child_product.php" method="post" enctype="multipart/form-data" >
                                        
        <div class="form-group">
            <label class="col-xs-12" for="example-text-input">Product Name</label>
            <div class="col-sm-12">
                <!-- <input class="form-control" type="text" id="title" name="title" placeholder="Product  Name" onchange="myFunction(this.value)"> -->
                <select  class="js-select2 form-control" id="example2-select2"  style="width: 100%;"  name="product"  required="">
                    <option value="0">None</option>
                    <?php 
                        $sql = "SELECT * from product_tb ";
                        $q = $conn->query($sql);
                        $q->setFetchMode(PDO::FETCH_ASSOC);
                            while ($row = $q->fetch()):
                    ?>
                    <option value="<?= $row['title'];?>"><?= $row['title'];?></option>
                    <?php endwhile;?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12" for="example-text-input">Product Size</label>
            <div class="col-sm-12">
                <select class="js-select2 form-control" name="size"> 
                    <option value=""> None </option>
                    <option value="XS"> Extra Small </option>
                    <option value="S"> Small </option>
                    <option value="M"> Medium </option>
                    <option value="L"> Large </option>
                    <option value="XL"> Extra Large </option>
                    <option value="XXL"> Extra Extra Large </option>
                    <option disabled> ──────────────────── </option>
                    <option value="UK3 F"> UK 3 Women  </option>
                    <option value="UK4 F"> UK 4 Women  </option>
                    <option value="UK5 F"> UK 5 Women  </option>
                    <option value="UK6 F"> UK 6 Women  </option>
                    <option value="UK7 F"> UK 7 Women  </option>
                    <option value="UK8 F"> UK 8 Women  </option>
                    <option value="UK7 M"> UK 7 Men  </option>
                     <option value="UK8 M"> UK 8 Men  </option>
                      <option value="UK9 M"> UK 9 Men  </option>
                    <option value="UK10 M"> UK 10 Men  </option>
                    <option value="UK11 M"> UK 11 Men  </option>
                    <option value="UK12 M"> UK 12 Men  </option>
                    <option value="UK13 M"> UK 13 Men  </option>
                    <option disabled> ──────────────────── </option>
                    <option value="Matte"> Matte </option>
                    <option value="Glossy"> Glossy </option>
                </select>
          </div>
         </div>
        <div class="form-group">
            <label class="col-xs-12" for="example-text-input">Product Color</label>
            <div class="col-sm-12">
                <select class="js-select2 form-control" name="color"> 
                    <option value=""> None </option>
                    <option value="Black"> Black </option>
                    <option value="Blue"> Blue </option>
                    <option value="Brown"> Brown </option>
                    <option value="Gold"> Gold </option>
                    <option value="Green"> Green </option>
                    <option value="Grey"> Grey </option>
                    <option value="Orange"> Orange </option>
                    <option value="Pink"> Pink </option>
                    <option value="Purple"> Purple </option>
                    <option value="Red"> Red </option>
                    <option value="Silver"> Silver </option>
                    <option value="Wine"> Wine </option>
                    <option value="White"> White </option>
                    <option value="Yellow"> Yellow </option>
                    
                </select>
          </div>
         </div>
         
      <!-- Block Tabs Animated Fade -->
        <div class="form-group">
            <div class="block">
                <ul class="nav nav-tabs" data-toggle="tabs">
                    <li class="active">
                        <a href="#btabs-animated-fade-home">General</a>
                    </li>
                    <li>
                        <a href="#btabs-animated-fade-profile">Inventory</a>
                    </li>
                    <li>
                        <a href="#btabs-animated-fade-shpping">Shipping</a>
                    </li> 
                </ul>
            <div class="block-content tab-content">
                <div class="tab-pane fade in active" id="btabs-animated-fade-home">
             
        <div class="form-group">
            <label class="col-xs-2" for="example-text-input">Regular Price (GHC)</label>
            <div class="col-sm-8">
                <input class="form-control" type="text" value="0" id="example-text-input" name="regular_gh" >
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-2" for="example-text-input">Sale Price (GHC)</label>
            <div class="col-sm-8">
                <input class="form-control" value="0" type="text" id="example-text-input" name="sales_gh" >
            </div>
        </div>
        <hr>

        <div class="form-group">
            <label class="col-xs-2" for="example-text-input">Regular Price ($)</label>
            <div class="col-sm-8">
                <input class="form-control" type="text" value="0" id="example-text-input" name="regular_us" >
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-2" for="example-text-input">Sale Price ($)</label>
            <div class="col-sm-8">
                <input class="form-control" type="text" value="0" id="example-text-input" name="sales_us" >
            </div>
        </div>
        <hr>

        <div class="form-group">
            <label class="col-xs-2" for="example-text-input">Regular Price (PD)</label>
            <div class="col-sm-8">
                <input class="form-control" type="text" value="0" id="example-text-input" name="regular_uk" >
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-2" for="example-text-input">Sale Price (PD)</label>
            <div class="col-sm-8">
                <input class="form-control" type="text" value="0" id="example-text-input" name="sales_uk" >
            </div>
        </div>
        <hr>

    </div>


    <div class="tab-pane fade" id="btabs-animated-fade-profile">
        <div class="form-group">
            <label class="col-xs-2" for="example-text-input">SKU</label>
                <div class="col-sm-8">
                <input class="form-control" type="text" id="example-text-input" name="sku" >
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-2" for="example-text-input">Stock quantity</label>
                <div class="col-sm-8">
                <input class="form-control" type="number" id="example-text-input" name="qty" value="0" min="0" >
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-2" for="example-select">Select Category</label>
            <div class="col-sm-8">
                <select class="form-control" id="example-select" name="stock" size="1">
                    <option value="In stock">In stock</option>
                    <option value="Out of Stock">Out of Stock </option>
                </select>
            </div>
        </div>

    </div>



    <div class="tab-pane fade" id="btabs-animated-fade-shpping">
        
        <div class="form-group">
            <label class="col-xs-2" for="example-text-input">Weight (kg) </label>
            <div class="col-sm-8">
                <input class="form-control" type="number" id="example-text-input" name="wty" step="0.01" value="0" min="0">    
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-2" for="example-text-input">Dimensions </label>
            <div class="col-sm-3">
                <input class="form-control" type="number" id="example-text-input" step="0.01" name="lengh" placeholder="Lengh"  value="0" min="0">
            </div>
            <div class="col-sm-3">
                <input class="form-control" type="number" id="example-text-input" step="0.01" name="wth" placeholder="Width" value="0" min="0">
            </div>
            <div class="col-sm-2">
                <input class="form-control" type="number" id="example-text-input" step="0.01"  name="hty" placeholder="Height" value="0" min="0">
            </div>
        </div>

    </div>



</div>
</div>
</div>

    
</div>
</div>
<!-- END Default Elements -->



</div>
        <div class="col-md-4">
            <div class="block">
                <div class="block-content">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <button class="btn btn-sm btn-primary  pull-left" type="submit" name="submit">Publish</button>
                        </div>
                    </div>      
                    <br>              
                </div>
            </div>
        </div>
     </form>

   

    <!-- #####################    END OF INSER STATEMENT ##################################################################################################################################################################################################################################-->

    <?php } else { ?>

          <?php
                              
                    try {
                   
                    $sql = "SELECT * from product_child_tb  WHERE id = $edit_product LIMIT 1";
                    $q = $conn->query($sql);
                    $q->setFetchMode(PDO::FETCH_ASSOC);

                     while ($row = $q->fetch()): 
                       $id = $row['id'];
                       $title = $row['title'];
                       $slug = $row['slug'];
                       $content = $row['content'];
                       $sku = $row['sku'];
                       $qty = $row['qty'];
                       $stock = $row['stock'];
                       $weight = $row['weight'];
                       $lenght = $row['lenght'];
                       $width = $row['width'];
                       $height = $row['height'];
                       $size = $row['size'];
                       $color = $row['color'];
                      // $category = $row['category'];
                       $category = explode(",",$row['category']);
                       //$size = explode(",",$row['size']);
                       //$size = $row['size'];
                       //$tag = $row['tag'];
                       $publish = $row['publish'];
                       //$img1 = $row['img1'];
                       //$img2 = $row['img2'];
                       $date = $row['date'];
                       $regular_gh = $row['regular_gh'];
                       $sales_gh = $row['sales_gh'];
                       $regular_us = $row['regular_us'];
                       $sales_us = $row['sales_us'];
                       $regular_uk = $row['regular_uk'];
                       $sales_uk = $row['sales_uk'];
                       $featured = $row['featured'];
                       $detail_content = $row['detail_content'];
                    
                      endwhile;
                  
                        } catch (PDOException $e) {
                            die("Could not connect to the database $dbname :" . $e->getMessage());
                        }
             ?>

       <form class="form-horizontal" action="child_product.php?edit_product=<?= $id;?>" method="post" enctype="multipart/form-data" >
                                        
       <div class="form-group">
       <label class="col-xs-12" for="example-text-input">Product Name</label>
       <div class="col-sm-12">
           <!-- <input class="form-control" type="text" id="title" name="title" placeholder="Product  Name" onchange="myFunction(this.value)"> -->
           <select  class="js-select2 form-control" id="example2-select2"  style="width: 100%;"  name="product"  required="">
               <option value="0">None</option>
               <?php 
                   $sql = "SELECT * from product_tb ";
                   $q = $conn->query($sql);
                   $q->setFetchMode(PDO::FETCH_ASSOC);
                       while ($row = $q->fetch()):
               ?>
               <option  <?php if($title == $row['title']){?> selected="Selected" <?php }?>   value="<?= $row['title'];?>"><?= $row['title'];?></option>
               <?php endwhile;?>
           </select>
       </div>
   </div>
   <div class="form-group">
       <label class="col-xs-12" for="example-text-input">Product Size</label>
       <div class="col-sm-12">
           <select class="js-select2 form-control" name="size"> 
               <option value="" <?php if($size == ''){?> selected="Selected" <?php }?> > None </option>
               <option value="XS" <?php if($size == 'XS'){?> selected="Selected" <?php }?> > Extra Small </option>
               <option value="S" <?php if($size == 'S'){?> selected="Selected" <?php }?> > Small </option>
               <option value="M" <?php if($size == 'M'){?> selected="Selected" <?php }?> > Medium </option>
               <option value="L" <?php if($size == 'L'){?> selected="Selected" <?php }?> > Large </option>
               <option value="XL" <?php if($size == 'XL'){?> selected="Selected" <?php }?> > Extra Large </option>
               <option value="XXL" <?php if($size == 'XXL'){?> selected="Selected" <?php }?> > XX Large </option>
               <option disabled> ──────────────────── </option>
                <option value="UK3 F" <?php if($size == 'UK3 F'){?> selected="Selected" <?php }?> > UK 3 Women  </option>
                <option value="UK4 F" <?php if($size == 'UK4 F'){?> selected="Selected" <?php }?> > UK 4 Women  </option>
                <option value="UK5 F" <?php if($size == 'UK5 F'){?> selected="Selected" <?php }?> > UK 5 Women  </option>
                <option value="UK6 F" <?php if($size == 'UK6 F'){?> selected="Selected" <?php }?> > UK 6 Women  </option>
                <option value="UK7 F" <?php if($size == 'UK7 F'){?> selected="Selected" <?php }?>> UK 7 Women  </option>
                <option value="UK8 F" <?php if($size == 'UK8 F'){?> selected="Selected" <?php }?>> UK 8 Women  </option>
                <option value="UK7 M" <?php if($size == 'UK7 M'){?> selected="Selected" <?php }?>> UK 7 Men  </option>
                <option value="UK8 M" <?php if($size == 'UK8 M'){?> selected="Selected" <?php }?>> UK 8 Men  </option>
                <option value="UK9 M" <?php if($size == 'UK9 M'){?> selected="Selected" <?php }?>> UK 9 Men  </option>
                <option value="UK10 M" <?php if($size == 'UK10 M'){?> selected="Selected" <?php }?>> UK 10 Men  </option>
                <option value="UK11 M" <?php if($size == 'UK11 M'){?> selected="Selected" <?php }?>> UK 11 Men  </option>
                <option value="UK12 M" <?php if($size == 'UK12 M'){?> selected="Selected" <?php }?> > UK 12 Men  </option>
                <option value="UK13 M" <?php if($size == 'UK13 M'){?> selected="Selected" <?php }?>> UK 13 Men  </option>
                <option disabled> ──────────────────── </option>
                    <option value="Matte" <?php if($color == 'Matte'){?> selected="Selected" <?php }?>> Matte </option>
                    <option value="Glossy" <?php if($color == 'Glossy'){?> selected="Selected" <?php }?>> Glossy </option>
           </select>
     </div>
    </div>
   <div class="form-group">
       <label class="col-xs-12" for="example-text-input">Product Color</label>
       <div class="col-sm-12">
           <select class="js-select2 form-control" name="color"> 
               <option value="" <?php if($color == ''){?> selected="Selected" <?php }?> > None </option>
               <option value="Black" <?php if($color == 'Black'){?> selected="Selected" <?php }?> > Black </option>
               <option value="Blue" <?php if($color == 'Blue'){?> selected="Selected" <?php }?> > Blue </option>
               <option value="Brown" <?php if($color == 'Brown'){?> selected="Selected" <?php }?> > Brown </option>
               <option value="Gold" <?php if($color == 'Gold'){?> selected="Selected" <?php }?> > Gold </option>
               <option value="Green" <?php if($color == 'Green'){?> selected="Selected" <?php }?> > Green </option>
               <option value="Grey" <?php if($color == 'Grey'){?> selected="Selected" <?php }?> > Grey </option>
               <option value="Orange" <?php if($color == 'Orange'){?> selected="Selected" <?php }?> > Orange </option>
               <option value="Pink" <?php if($color == 'Pink'){?> selected="Selected" <?php }?> > Pink </option>
               <option value="Purple" <?php if($color == 'Purple'){?> selected="Selected" <?php }?> > Purple </option>
               <option value="Red" <?php if($color == 'Red'){?> selected="Selected" <?php }?> > Red </option>
               <option value="Silver" <?php if($color == 'Silver'){?> selected="Selected" <?php }?> > Silver </option>
               <option value="Wine" <?php if($color == 'Wine'){?> selected="Selected" <?php }?> > Wine </option>
               <option value="White" <?php if($color == 'White'){?> selected="Selected" <?php }?> > White </option>
               <option value="Yellow" <?php if($color == 'Yellow'){?> selected="Selected" <?php }?> > Yellow </option>
               
           </select>
     </div>
    </div>
    
 <!-- Block Tabs Animated Fade -->
   <div class="form-group">
       <div class="block">
           <ul class="nav nav-tabs" data-toggle="tabs">
               <li class="active">
                   <a href="#btabs-animated-fade-home">General</a>
               </li>
               <li>
                   <a href="#btabs-animated-fade-profile">Inventory</a>
               </li>
               <li>
                   <a href="#btabs-animated-fade-shpping">Shipping</a>
               </li> 
           </ul>
       <div class="block-content tab-content">
           <div class="tab-pane fade in active" id="btabs-animated-fade-home">
        
    <div class="form-group">
    <label class="col-xs-2" for="example-text-input">Regular Price (GHC)</label>
            <div class="col-sm-8">
        <input class="form-control" type="text" id="" value="<?= $regular_gh; ?>" name="regular_gh" >

        </div>
    </div>

   <div class="form-group">
   <label class="col-xs-2" for="example-text-input">Sale Price (GHC)</label>
            <div class="col-sm-8">
            <input class="form-control" type="text" id=""  value="<?= $sales_gh; ?>" name="sales_gh" >

      </div>
    </div>
    <hr>

<div class="form-group">
   <label class="col-xs-2" for="example-text-input">Regular Price ($)</label>
            <div class="col-sm-8">
    <input class="form-control" type="text" id="" value="<?= $regular_us; ?>" name="regular_us" >

      </div>
    </div>

    <div class="form-group">
   <label class="col-xs-2" for="example-text-input">Sale Price ($)</label>
            <div class="col-sm-8">
    <input class="form-control" type="text" id="" value="<?= $sales_us; ?>"  name="sales_us" >

      </div>
    </div>
    <hr>

    <div class="form-group">
   <label class="col-xs-2" for="example-text-input">Regular Price (PD)</label>
            <div class="col-sm-8">
            <input class="form-control" type="text" id="" value="<?= $regular_uk; ?>" name="regular_uk" >

      </div>
    </div>

    <div class="form-group">
   <label class="col-xs-2" for="example-text-input">Sale Price (PD)</label>
            <div class="col-sm-8">
            <input class="form-control" type="text" value="<?= $sales_uk; ?>" name="sales_uk" >

      </div>
    </div>
    <hr>

</div>


<div class="tab-pane fade" id="btabs-animated-fade-profile">

    <div class="form-group">
       <label class="col-xs-2" for="example-text-input">SKU</label>
                <div class="col-sm-8">
            <input class="form-control" type="text" id="example-text-input" name="sku" value="<?= $sku; ?>" >

          </div>
        </div>

     <div class="form-group">
       <label class="col-xs-2" for="example-text-input">Stock quantity</label>
                <div class="col-sm-8">
                <input class="form-control" type="number" id="example-text-input" name="qty" value="<?= $qty; ?>" >

          </div>
        </div>
  <div class="form-group">
    <label class="col-xs-2" for="example-select">Select Category</label>
       <div class="col-sm-8">
        <select class="form-control" id="example-select" name="stock" size="1">
    <option <?php if($stock == "In stock"){ echo "selected"; } ?> value="In stock">In stock</option>
             <option <?php if($stock == "Out of Stock"){ echo "selected"; } ?> value="Out of Stock">Out of Stock </option>
         </select>
     </div>
    </div>

            </div>



<div class="tab-pane fade" id="btabs-animated-fade-shpping">

    <div class="form-group">
          <label class="col-xs-2" for="example-text-input">Weight (kg) </label>
                <div class="col-sm-8">
        <input class="form-control" type="number" id="example-text-input" step="0.01" value="<?= $weight; ?>" name="wty" >

          </div>
   </div>

   <div class="form-group">
       <label class="col-xs-2" for="example-text-input">Dimensions </label>
                <div class="col-sm-3">
        <input class="form-control" type="number" id="example-text-input" step="0.01" name="lengh" value="<?= $lenght; ?>" placeholder="Lengh" >

          </div>

          <div class="col-sm-3">
        <input class="form-control" type="number" id="example-text-input" step="0.01" name="wth" value="<?= $width; ?>" placeholder="Width" >

          </div>

          <div class="col-sm-2">
        <input class="form-control" type="number" id="example-text-input" name="hty" step="0.01" value="<?= $height; ?>" placeholder="Height" >

          </div>
   </div>

</div>



</div>
</div>
</div>


</div>
</div>
<!-- END Default Elements -->



</div>
        <div class="col-md-4">
            <div class="block">
                <div class="block-content">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <button class="btn btn-sm btn-primary  pull-left" type="submit" name="update">Edit Product</button>
                        </div>
                    </div>      
                    <br>              
                </div>
            </div>
        </div>
     </form>


   
    <?php  } ?>


              
                    </div>
                    </div>
                    </div>
                </div>

                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
    <?php require_once("includes/backend_footer.php");?>
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
        <script src="assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js"></script>


        <!-- Page JS Plugins -->
        <script src="assets/js/plugins/summernote/summernote.min.js"></script>
        <script src="assets/js/plugins/ckeditor/ckeditor.js"></script>
         <script src="assets/js/plugins/select2/select2.full.min.js"></script>

     
         <!-- Page JS Code -->
        <script>
            $(function () {
               
                     App.initHelpers(['tags-inputs','summernote', 'select2', 'masked-inputs']);
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

 <script type="text/javascript">
 $("#imageupload_banner").on('change', function () {
 
     //Get count of selected files
     var countFiles = $(this)[0].files.length;
 
     var imgPath = $(this)[0].value;
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
     var image_holder = $("#preview-image_banner");
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

<script>  
function cart(id)
    {
      var ele=document.getElementById(id);
      if(confirm("Are you sure you want to remove this image?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     type:"POST",  
                     data:{
                     id:id,
                     //img:product_img
                     },  
                     success:function(response){  
                          if(response != '')  
                          {  
                             setTimeout(function(){  
                             $('#'+id).fadeOut("Slow");  
                         }, 200);  
                         
                          }  
                     }  
                });  
           }  
           else  
           {  
                return false;  
           }  
    }
      
 </script>
 
        
        <!-- UPLOAD IMAGES JAVASCRIPT CODE -->



    </body>
</html>