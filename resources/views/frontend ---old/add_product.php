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
    //  ASSIGN VALUES TO THE VARIABLES
       $second_pic = ""; 
       $first_pic = "";
       $dir='img';
       $name2 = "";
       $message = "";

       $num = 1;

      foreach($_FILES['pic']['name'] as $key => $val){
       
        //upload and stored images
       
        if($num == 1){
            $name1=basename($_FILES['pic']['name'][$key]);
            $t_name1 = $_FILES['pic']['tmp_name'][$key];
            $first_pic = $dir.'/'.$name1;
           
        }elseif ($num == 2) {

         $name2=basename($_FILES['pic']['name'][$key]);
         $t_name2 = $_FILES['pic']['tmp_name'][$key];
         $second_pic = $dir.'/'.$name2;
         
        }
     
     $num++;

    }
   
    
   // $name2=basename($_FILES['pic']['name']['1']);
   // $t_name2=$_FILES['pic']['tmp_name']['1'];
     
    

    $sel_table = "product_tb";
    $pic = $first_pic;
    $pic1 = $second_pic;
    $name = htmlentities($_POST['title']);
    $slug = htmlentities($_POST['slug']);
    $content = htmlentities($_POST['content']);
    $sku = htmlentities($_POST['sku']);
    $qty = htmlentities($_POST['qty']);
    $stock = htmlentities($_POST['stock']);
    $wty = htmlentities($_POST['wty']);
    $lengh = htmlentities($_POST['lengh']);
    $wth = htmlentities($_POST['wth']);
    $hty = htmlentities($_POST['hty']);
    //$pic = htmlentities($_POST['pic']);
    //$category = htmlentities($_POST['category']);
    //$size = htmlentities($_POST['size']);
    //$color = htmlentities($_POST['color']);
    $tag = htmlentities($_POST['tag']);
    $publish = htmlentities($_POST['publish']);
    $date = date('Y-m-d');

    $regular_gh = htmlentities($_POST['regular_gh']);
    $sales_gh = htmlentities($_POST['sales_gh']);
    $regular_us = htmlentities($_POST['regular_us']);
    $sales_us = htmlentities($_POST['sales_us']);
    $regular_uk = htmlentities($_POST['regular_uk']);
    $sales_uk = htmlentities($_POST['sales_uk']);

    $detail_content = htmlentities($_POST['detail_content']);
    $featured = htmlentities($_POST['featured']);
    
    
     if (empty($_POST['category'])){
    
    $category ="";
    
      }else{
  
    $category = join(",", $_POST['category']);  // here first (,) is user-define
    }

    if (empty($_POST['size'])){
    
    $size ="";
    
      }else{
  
    $size = join(",", $_POST['size']);  // here first (,) is user-define
    }

     // THIS IS FROM FUNCTION
    $check = check_title($sel_table, $slug);
    // this is function
    if(!empty($name1)){
    $name1 = dub_image($name1);
      }
    if(empty($size)){
      $size = "";

    }


try{

      if($check == ""){

if(move_uploaded_file($t_name2,$dir."/".$name2) && move_uploaded_file($t_name1,$dir."/".$name1)){

     $stmt = $conn->prepare("INSERT INTO product_tb(title,  slug, content, sku, qty, stock, weight, lenght, width, height, category, size, tag, publish, img1, img2, date, regular_gh, sales_gh, regular_us, sales_us, regular_uk, sales_uk, featured, detail_content)
    VALUES(:name,  :slug, :content, :sku, :qty, :stock,:wty, :lengh, :wth, :hty, :category, :size, :tag, :publish, :pic, :pic1,:date, :regular_gh, :sales_gh, :regular_us, :sales_us, :regular_uk, :sales_uk, :featured, :detail_content )");
 
     } elseif(move_uploaded_file($t_name1,$dir."/".$name1)){

       $stmt = $conn->prepare("INSERT INTO product_tb(title,  slug, content, sku, qty, stock, weight, lenght, width, height, category, size, tag, publish, img1, img2, date, regular_gh, sales_gh, regular_us, sales_us, regular_uk, sales_uk, featured, detail_content)
    VALUES(:name,  :slug, :content, :sku, :qty, :stock,:wty, :lengh, :wth, :hty, :category, :size,:tag, :publish, :pic, :pic1,:date, :regular_gh, :sales_gh, :regular_us, :sales_us, :regular_uk, :sales_uk, :featured, :detail_content )");

     }
        // SET PARAMETERS
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':slug', $slug);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':sku', $sku);
        $stmt->bindParam(':qty', $qty);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':wty', $wty);
        $stmt->bindParam(':lengh', $lengh);
        $stmt->bindParam(':wth', $wth);
        $stmt->bindParam(':hty', $hty);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':pic', $pic);
        $stmt->bindParam(':pic1', $pic1);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':size', $size);
        //$stmt->bindParam(':color', $color);
        $stmt->bindParam(':tag', $tag);
        $stmt->bindParam(':publish', $publish);
        $stmt->bindParam(':date', $date);
        // PRICE
        $stmt->bindParam(':regular_gh', $regular_gh);
        $stmt->bindParam(':sales_gh', $sales_gh);
        $stmt->bindParam(':regular_us', $regular_us);
        $stmt->bindParam(':sales_us', $sales_us);
        $stmt->bindParam(':regular_uk', $regular_uk);
        $stmt->bindParam(':sales_uk', $sales_uk);
        $stmt->bindParam(':featured', $featured);
        $stmt->bindParam(':detail_content', $detail_content);

        // EXECUTE
        $stmt->execute();
        
        //############################# GET CURRENT ID ##########################//

         $sql = "SELECT * from product_tb WHERE title = :name AND date = :date AND slug = :slug ORDER BY ID DESC limit 1";
 
                   // QUERY
                    $q = $conn->prepare($sql);
                    // SET PARAMETERS
                    $q->bindParam(':name', $name);
                    $q->bindParam(':date', $date);
                    $q->bindParam(':slug', $slug);

                   // EXECUTE
                   $q->execute();
                   // FETCH RESULT
                   $q->setFetchMode(PDO::FETCH_ASSOC);
                   $gallery_id = 0;
                   while ($row = $q->fetch()):
              
                   $gallery_id = $row['id'];
             
                   endwhile;

//############################# GET CURRENT ID ##########################//
          
                // UPLOAD IMAGE CODE
       foreach($_FILES['picx']['name'] as $key => $val){
        //upload and stored images
        $name=basename($_FILES['picx']['name'][$key]);
        $t_name = $_FILES['picx']['tmp_name'][$key];
        $dir='img';
        if(move_uploaded_file($t_name,$dir."/".$name)){
            $g = $conn->prepare("INSERT INTO photos_tb(gallery_id, image)
             VALUES (:gallery_id, :image)");
        //  ASSIGN VALUES TO THE VARIABLES
            $gallery_id;
            $image = "img/".$name;
            // SET PARAMETERS
            $g->bindParam(':gallery_id', $gallery_id);
            $g->bindParam(':image', $image);
             
            // EXECUTE
           $g->execute();
        }else{

       // SUCCESS MESSAGE
      // $message = "New records created ";

        }
    }

   // UPLOAD IMAGE CODE


        // SUCCESS MESSAGE
         $message = '<span style="color: red">New records created successfully </span>';
     
      }else{

        $message = '<span style="color: red">Slug already Exists </span>';

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
       $second_pic = ""; 
       $first_pic = "";
       $dir='img';

            $name1 = basename($_FILES['pic']['name']);
            $t_name1 = $_FILES['pic']['tmp_name'];
            $first_pic = $dir.'/'.$name1;
           
             $name2=basename($_FILES['pic1']['name']);
             $t_name2 = $_FILES['pic1']['tmp_name'];
             $second_pic = $dir.'/'.$name2;
       
   
    $pic = $first_pic;
    $pic1 = $second_pic;
    $name = htmlentities($_POST['title']);
    $slug = htmlentities($_POST['slug']);
    $content = htmlentities($_POST['content']);
    $sku = htmlentities($_POST['sku']);
    $qty = htmlentities($_POST['qty']);
    $stock = htmlentities($_POST['stock']);
    $wty = htmlentities($_POST['wty']);
    $lengh = htmlentities($_POST['lengh']);
    $wth = htmlentities($_POST['wth']);
    $hty = htmlentities($_POST['hty']);

    //$pic = htmlentities($_POST['pic']);
    //$category = htmlentities($_POST['category']);
    //$size = htmlentities($_POST['size']);
    //$color = htmlentities($_POST['color']);

    $tag = htmlentities($_POST['tag']);
    $publish = htmlentities($_POST['publish']);
    $date = date('Y-m-d');

    $regular_gh = htmlentities($_POST['regular_gh']);
    $sales_gh = htmlentities($_POST['sales_gh']);
    $regular_us = htmlentities($_POST['regular_us']);
    $sales_us = htmlentities($_POST['sales_us']);
    $regular_uk = htmlentities($_POST['regular_uk']);
    $sales_uk = htmlentities($_POST['sales_uk']);

    $detail_content = htmlentities($_POST['detail_content']);
    $featured = htmlentities($_POST['featured']);
   

     // THIS IS FROM FUNCTION
    // $check = check_title($sel_table, $name);
    // this is function

     if (empty($_POST['size'])){
    
    $size ="";
    
      }else{
  
    $size = join(",", $_POST['size']);  // here first (,) is user-define

    }

    if (empty($_POST['category'])){
    
    $category ="";
    
      }else{
  
    $category = join(",", $_POST['category']);  // here first (,) is user-define

      }    

    if(!empty($name1)){
    $name1 = dub_image($name1);
      }

      if(!empty($name2)){
    $name2 = dub_image($name2);
      }

try{
    
if(!empty($name1) && !empty($name2)){

if(move_uploaded_file($t_name1,$dir."/".$name1) && move_uploaded_file($t_name2,$dir."/".$name2)){

       $stmt = $conn->prepare("UPDATE product_tb SET title = :name,  slug =  :slug, content = :content, sku = :sku, qty = :qty, stock = :stock, weight = :wty, lenght = :lengh, width = :wth, height = :hty, category = :category, size = :size, tag = :tag, publish = :publish, img1 = :pic, img2 = :pic1, regular_gh = :regular_gh, sales_gh = :sales_gh, regular_us = :regular_us, sales_us = :sales_us, regular_uk = :regular_uk, sales_uk = :sales_uk, featured = :featured, detail_content = :detail_content  WHERE id = :id");
   }

 }elseif (move_uploaded_file($t_name1,$dir."/".$name1)) {

     $stmt = $conn->prepare("UPDATE product_tb SET title = :name,  slug =  :slug, content = :content, sku = :sku, qty = :qty, stock = :stock, weight = :wty, lenght = :lengh, width = :wth, height = :hty, category = :category, size = :size, tag = :tag, publish = :publish, img1 = :pic,  regular_gh = :regular_gh, sales_gh = :sales_gh, regular_us = :regular_us, sales_us = :sales_us, regular_uk = :regular_uk, sales_uk = :sales_uk, featured = :featured, detail_content = :detail_content WHERE id = :id");


 }elseif (move_uploaded_file($t_name2,$dir."/".$name2)) {

    $stmt = $conn->prepare("UPDATE product_tb SET title = :name,  slug =  :slug, content = :content, sku = :sku, qty = :qty, stock = :stock, weight = :wty, lenght = :lengh, width = :wth, height = :hty, category = :category, size = :size, tag = :tag, publish = :publish, img2 = :pic1,  regular_gh = :regular_gh, sales_gh = :sales_gh, regular_us = :regular_us, sales_us = :sales_us, regular_uk = :regular_uk, sales_uk = :sales_uk, featured = :featured, detail_content = :detail_content  WHERE id = :id");

    
 }else{

        $stmt = $conn->prepare("UPDATE product_tb SET title = :name,  slug =  :slug, content = :content, sku = :sku, qty = :qty, stock = :stock, weight = :wty, lenght = :lengh, width = :wth, height = :hty, category = :category, size = :size, tag = :tag, publish = :publish,  regular_gh = :regular_gh, sales_gh = :sales_gh, regular_us = :regular_us, sales_us = :sales_us, regular_uk = :regular_uk, sales_uk = :sales_uk, featured = :featured, detail_content = :detail_content  WHERE id = :id");
 }
        // SET PARAMETERS
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':slug', $slug);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':sku', $sku);
        $stmt->bindParam(':qty', $qty);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':wty', $wty);
        $stmt->bindParam(':lengh', $lengh);
        $stmt->bindParam(':wth', $wth);
        $stmt->bindParam(':hty', $hty);

        if(!empty($name1)){
        $stmt->bindParam(':pic', $pic);
          }
        if(!empty($name2)){
        $stmt->bindParam(':pic1', $pic1);
          }

        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':size', $size);
        
        $stmt->bindParam(':tag', $tag);
        $stmt->bindParam(':publish', $publish);
        // PRICE
        $stmt->bindParam(':regular_gh', $regular_gh);
        $stmt->bindParam(':sales_gh', $sales_gh);
        $stmt->bindParam(':regular_us', $regular_us);
        $stmt->bindParam(':sales_us', $sales_us);
        $stmt->bindParam(':regular_uk', $regular_uk);
        $stmt->bindParam(':sales_uk', $sales_uk);
        $stmt->bindParam(':featured', $featured);
        $stmt->bindParam(':detail_content', $detail_content);
        $stmt->bindParam(':id', $edit_product);
        // EXECUTE
        $stmt->execute();
        
          
                // UPLOAD IMAGE CODE
       foreach($_FILES['picx']['name'] as $key => $val){
        //upload and stored images
        $name=basename($_FILES['picx']['name'][$key]);
        $t_name = $_FILES['picx']['tmp_name'][$key];
        $dir='img';
        if(move_uploaded_file($t_name,$dir."/".$name)){
            $g = $conn->prepare("INSERT INTO photos_tb(gallery_id, image)
             VALUES (:gallery_id, :image)");
        //  ASSIGN VALUES TO THE VARIABLES
            $gallery_id;
            $image = "img/".$name;
            // SET PARAMETERS
            $g->bindParam(':gallery_id', $edit_product);
            $g->bindParam(':image', $image);
             
            // EXECUTE
           $g->execute();
        }else{

       // SUCCESS MESSAGE
      // $message = "New records created ";

        }
    }

   // UPLOAD IMAGE CODE


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
                                Add Product <small>Fill the forms below</small>

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


                <form class="form-horizontal" action="add_product.php" method="post" enctype="multipart/form-data" onsubmit="modify_product(1)">
                                        
                         <div class="form-group">
            <label class="col-xs-12" for="example-text-input">Product Name</label>
                        <div class="col-sm-12">
        <input class="form-control" type="text" id="title" name="title" placeholder="Product Name" onchange="myFunction(this.value)">
                                            </div>
                                        </div>
        <div class="form-group">
       <label class="col-xs-12" for="example-text-input">Slug</label>
                        <div class="col-sm-12">
                <input class="form-control" type="text" id="slug_title" name="slug" placeholder="Slug">
          </div>
         </div>
         
              <div class="form-group">
                    <div class=" block-content-full">
                         <p class="" for="content">Short Product Description</p>
                                    <!-- Summernote Container -->
                        <textarea id="content" class="js-summernote" name="content"></textarea>
                                    
                 </div>
                </div>
    <br>
    
      <!-- Block Tabs Animated Fade -->
        <div class="form-group" id="inventoryDIV">
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
                <input class="form-control" type="text" value="0" id="regular_gh" name="regular_gh" >

          </div>
        </div>

        <div class="form-group">
       <label class="col-xs-2" for="example-text-input">Sale Price (GHC)</label>
                <div class="col-sm-8">
                <input class="form-control" value="0" type="text" id="sales_gh" name="sales_gh" >

          </div>
        </div>
        <hr>

    <div class="form-group">
       <label class="col-xs-2" for="example-text-input">Regular Price ($)</label>
                <div class="col-sm-8">
        <input class="form-control" type="text" value="0" id="regular_us" name="regular_us" >

          </div>
        </div>

        <div class="form-group">
       <label class="col-xs-2" for="example-text-input">Sale Price ($)</label>
                <div class="col-sm-8">
                <input class="form-control" type="text" value="0" id="sale_us" name="sales_us" >

          </div>
        </div>
        <hr>

        <div class="form-group">
       <label class="col-xs-2" for="example-text-input">Regular Price (PD)</label>
                <div class="col-sm-8">
                <input class="form-control" type="text" value="0" id="regular_uk" name="regular_uk" >

          </div>
        </div>

        <div class="form-group">
       <label class="col-xs-2" for="example-text-input">Sale Price (PD)</label>
                <div class="col-sm-8">
                <input class="form-control" type="text" value="0" id="sales_uk" name="sales_uk" >

          </div>
        </div>
        <hr>



    </div>


<div class="tab-pane fade" id="btabs-animated-fade-profile">

    <div class="form-group">
       <label class="col-xs-2" for="example-text-input">SKU</label>
                <div class="col-sm-8">
                <input class="form-control" type="text" id="sku" name="sku" >

          </div>
        </div>

     <div class="form-group">
       <label class="col-xs-2" for="example-text-input">Stock quantity</label>
                <div class="col-sm-8">
            <input class="form-control" type="number" id="qty" name="qty" value="0" >

          </div>
        </div>
  <div class="form-group">
    <label class="col-xs-2" for="example-select">Select Category</label>
       <div class="col-sm-8">
        <select class="form-control" id="in_stock" name="stock" size="1">
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
        <input class="form-control" type="number" id="weight" name="wty" step="0.01" value="0" >

          </div>
   </div>

   <div class="form-group">
       <label class="col-xs-2" for="example-text-input">Dimensions </label>
                <div class="col-sm-3">
        <input class="form-control" type="number" id="length" step="0.01" name="lengh" placeholder="Lengh"  value="0" >

          </div>

          <div class="col-sm-3">
        <input class="form-control" type="number" id="width" step="0.01" name="wth" placeholder="Width" value="0" >

          </div>

          <div class="col-sm-2">
        <input class="form-control" type="number" id="height" step="0.01"  name="hty" placeholder="Height" value="0" >

          </div>
   </div>

</div>



</div>
                            </div>
                           </div>
                            
                                    <br>
                                    
   
                 <div class="form-group">
                    <div class=" block-content-full">
                      <p class="" for="example-text-input">Detailed Product Description</p>
                                    <!-- Summernote Container -->
                     <textarea class="js-summernote" name="detail_content" id="detail_content"></textarea>
                                    
                 </div>
                </div>
                                   
                                </div>
                            </div>
                            <!-- END Default Elements -->



                        </div>
                     <div class="col-md-4">
                          <div class="block">
                          <!-- featured image here -->
                            <div class="block-content">
                                <div class="form-group">
                                            <label class="" for="example-file-input">Display  Images (Please Upload two images)</label>
    <input type="file" id="imageupload" name="pic[]" multiple="2" required="">  <div id="preview-image" ></div>
      </div>
 </div>
 
                                <div class="block-content">
                             <div class="form-horizontal" >
                                        
 <div class="form-group">
<label class="col-xs-12" for="example-select">Select Category</label>
 <div class="col-sm-12">
            <select  class="js-select2 form-control" id="category"  style="width: 100%;" data-placeholder="Choose many.."  multiple  name="category[]" required="">
            <option value="0">None</option>
                <?php 
           $sql = "SELECT * from category_tb ";
           $q = $conn->query($sql);
           $q->setFetchMode(PDO::FETCH_ASSOC);
            while ($row = $q->fetch()):
            ?>
                 <option value="<?= $row['id'];?>"><?= $row['name'];?></option>

               <?php endwhile;?>
            </select>
                            </div>
                        </div>
                    </div>
                     </div>
                                <!-- select categoy here -->
            </div>


                 <div class="block">    
         <div class="block-content">
        <div class="form-horizontal">
                                        
        <div class="form-group">
    <label class="col-xs-12" for="example-select">Select Attribute(s)</label>
            <div class="col-sm-12">
         <select  class="js-select2 form-control" id="example2-select2-multiple" name="size[]" style="width: 100%;" data-placeholder="Choose many.." multiple >
        <option value="">None</option>
             <?php 
          $attr_parent = 0;
             $sql = "SELECT * from attribute_tb  WHERE parent_id <> $attr_parent ";
           $q = $conn->query($sql);
           $q->setFetchMode(PDO::FETCH_ASSOC);
            while ($row = $q->fetch()):
            ?>
              <option value="<?= $row['id'];?>"><?= $row['name'];?></option>

            <?php endwhile;?>
         </select>
        </div>
     </div>
                               
     </div>
    </div>
                           
 </div>


<div class="block">
                         
         <div class="block-content">
        <div class="form-horizontal">
                                        
          <div class="form-group">
                  <label class="col-xs-12" for="example-tags1">Tag</label>
                     <div class="col-xs-12">
             <input class="js-tags-input form-control" type="text" id="example-tags1" name="tag" >
                                </div>
            </div>
   <div class="form-group">
   <label class="col-xs-12" for="example-select">Publish</label>
            <div class="col-sm-12">
        <select class="form-control" id="example-select" name="publish" size="1">
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select>
            </div>
        </div>

        <div class="form-group">
   <label class="col-xs-12" for="example-select">Featured</label>
            <div class="col-sm-12">
        <select class="form-control" id="example-select" name="featured" size="1">
        <option value="None">None</option>
        <option value="Home">Home</option>
      </select>
            </div>
        </div>
                               
     </div>
    </div>
</div>

<div class="block">
                         
         <div class="block-content">
        <div class="form-horizontal">
                                        
         <div class="block-content">
             <div class="form-group">
      <label class="" for="example-file-input">Gallery Images</label>
      <input type="file" multiple name="picx[]" id="imageupload_banner">

      <div id="preview-image_banner"></div>
             </div>

    

         </div>
                               
     </div>
    </div>
</div>
                            <!-- post btn here --> 
            <div class="form-group">
                <div class="col-xs-12">
    <button class="btn btn-sm btn-primary  pull-right" type="submit" name="submit">Publish</button>
                </div>
            </div>
     </form>
     
      <script>
    
    var checkbox = document.querySelector("input[name=hasChildren]");

	checkbox.addEventListener( 'change', function() {
	    if(this.checked) {
	        // Checkbox is checked..
	        $("#inventoryDIV").css("display","none");
	        //document.getElementById("inventoryDIV").display = "none";
	        //alert('Hello')
	    } else {
	        // Checkbox is not checked..
	        $("#inventoryDIV").css("display","block");
	    }
	});
	
    </script>

   

    <!-- #####################    END OF INSER STATEMENT ##################################################################################################################################################################################################################################-->

    <?php } else { ?>

          <?php
                              
                    try {
                   
                    $sql = "SELECT * from product_tb  WHERE id = $edit_product LIMIT 1";
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
                      // $category = $row['category'];
                       $category = explode(",",$row['category']);
                       $size = explode(",",$row['size']);
                       //$size = $row['size'];
                       $tag = $row['tag'];
                       $publish = $row['publish'];
                       $img1 = $row['img1'];
                       $img2 = $row['img2'];
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


       <form class="form-horizontal" action="add_product.php?edit_product=<?= $id;?>" method="post" enctype="multipart/form-data" onsubmit="modify_product(2)">
            
            <input type="hidden" value="<?= $id; ?>" id="pid">         
                         <div class="form-group">
            <label class="col-xs-12" for="example-text-input">Product Name</label>
                        <div class="col-sm-12">
        <input class="form-control" type="text" id="title" name="title" placeholder="Product  Name" value="<?= $title; ?>" onchange="myFunction(this.value)">
                                            </div>
                                        </div>
        <div class="form-group">
       <label class="col-xs-12" for="example-text-input">Slug</label>
                        <div class="col-sm-12">
                <input class="form-control" type="text" id="slug_title" name="slug" value="<?= $slug; ?>" placeholder="Slug">
          </div>
         </div>
            <div class="form-group">
                    <div class=" block-content-full">
                                    <p class="" for="example-text-input">Short  Description</p>
                                    <!-- Summernote Container -->
                                    <textarea class="js-summernote" name="content" id="production_description""><?= $content; ?></textarea>
                                    
                 </div>
                </div>
    <br>
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
            <input class="form-control" type="text" id="regular_gh" value="<?= $regular_gh; ?>" name="regular_gh" >

          </div>
        </div>

        <div class="form-group">
       <label class="col-xs-2" for="example-text-input">Sale Price (GHC)</label>
                <div class="col-sm-8">
                <input class="form-control" type="text" id="sales_gh"  value="<?= $sales_gh; ?>" name="sales_gh" >

          </div>
        </div>
        <hr>

    <div class="form-group">
       <label class="col-xs-2" for="example-text-input">Regular Price ($)</label>
                <div class="col-sm-8">
        <input class="form-control" type="text" id="regular_us" value="<?= $regular_us; ?>" name="regular_us" >

          </div>
        </div>

        <div class="form-group">
       <label class="col-xs-2" for="example-text-input">Sale Price ($)</label>
                <div class="col-sm-8">
        <input class="form-control" type="text" id="sales_us" value="<?= $sales_us; ?>"  name="sales_us" >

          </div>
        </div>
        <hr>

        <div class="form-group">
       <label class="col-xs-2" for="example-text-input">Regular Price (PD)</label>
                <div class="col-sm-8">
                <input class="form-control" type="text" id="regular_uk" value="<?= $regular_uk; ?>" name="regular_uk" >

          </div>
        </div>

        <div class="form-group">
       <label class="col-xs-2" for="example-text-input">Sale Price (PD)</label>
                <div class="col-sm-8">
                <input class="form-control" id="sales_uk" type="text" value="<?= $sales_uk; ?>" name="sales_uk" >

          </div>
        </div>
        <hr>

    </div>


<div class="tab-pane fade" id="btabs-animated-fade-profile">

    <div class="form-group">
       <label class="col-xs-2" for="example-text-input">SKU</label>
                <div class="col-sm-8">
            <input class="form-control" type="text" id="sku" name="sku" value="<?= $sku; ?>" >

          </div>
        </div>

     <div class="form-group">
       <label class="col-xs-2" for="example-text-input">Stock quantity</label>
                <div class="col-sm-8">
                <input class="form-control" type="number" id="qty" name="qty" value="<?= $qty; ?>" >

          </div>
        </div>
  <div class="form-group">
    <label class="col-xs-2" for="example-select">Select Category</label>
       <div class="col-sm-8">
        <select class="form-control" id="in_stock" name="stock" size="1">
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
        <input class="form-control" type="number" id="weight" step="0.01" value="<?= $weight; ?>" name="wty" >

          </div>
   </div>

   <div class="form-group">
       <label class="col-xs-2" for="example-text-input">Dimensions </label>
                <div class="col-sm-3">
        <input class="form-control" type="number" id="length" step="0.01" name="lengh" value="<?= $lenght; ?>" placeholder="Length" >

          </div>

          <div class="col-sm-3">
        <input class="form-control" type="number" id="width" step="0.01" name="wth" value="<?= $width; ?>" placeholder="Width" >

          </div>

          <div class="col-sm-2">
        <input class="form-control" type="number" id="height" name="hty" step="0.01" value="<?= $height; ?>" placeholder="Height" >

          </div>
   </div>

</div>

</div>
                            </div>
                           </div>
                            
                                    <br>
                  <div class="form-group">
                    <div class=" block-content-full">
                         <p class="" for="example-text-input">Detailed Product Description</p>
                                    <!-- Summernote Container -->
                       <textarea class="js-summernote" name="detail_content" id="detail_content"><?= $detail_content; ?></textarea>
                                    
                 </div>
                </div>

                                   
                                </div>
                            </div>
                            <!-- END Default Elements -->



                        </div>
                     <div class="col-md-4">
                          <div class="block">
                          <!-- featured image here -->
    <div class="block-content">
        <div class="form-group">
            <label class="" for="example-file-input">Front Image</label>
    <input type="file" id="imageupload" name="pic" >  <div id="preview-image"><img src="<?= $img1; ?>" height="100px" width="100px"></div>
      </div>
  </div>

  <div class="block-content">
        <div class="form-group">
            <label class="" for="example-file-input">Back Image</label>
    <input type="file" id="imageupload" name="pic1" >  <div id="preview-image"><img src="<?= $img2; ?>" height="100px" width="100px"></div>
      </div>
  </div>
 
                                <div class="block-content">
                             <div class="form-horizontal" >
                                        
 <div class="form-group">
<label class="col-xs-12" for="example-select">Select Category</label>
 <div class="col-sm-12">
            <select  class="js-select2 form-control" id="example2-select2"  style="width: 100%;" data-placeholder="Choose many.." multiple="" name="category[]"  required="">
            <option value="">None</option>
                <?php 
           $sql = "SELECT * from category_tb ";
           $q = $conn->query($sql);
           $q->setFetchMode(PDO::FETCH_ASSOC);
            while ($row = $q->fetch()):
            ?>
            <?php
             $wasFound = false;

              foreach ($category as $cat){
                                  
               if(trim($cat) == trim($row['id'])){

       echo "<option value=\"{$row['id']}\" selected >{$row['name']} </option>";
                    
                     $wasFound = true;
                       }
                                
                    }
 
             if($wasFound == false){

  echo "<option value=\"{$row['id']}\" >{$row['name']}</option>";
                               }

                               ?>

               <?php endwhile;?>
            </select>
                            </div>
                        </div>
                    </div>
                     </div>
                                <!-- select categoy here -->
            </div>


                 <div class="block">    
         <div class="block-content">
        <div class="form-horizontal">
                                        
        <div class="form-group">
    <label class="col-xs-12" for="example-select">Select Attribute(s) (optional)</label>
            <div class="col-sm-12">
         <select  class="js-select2 form-control" id="category"  style="width: 100%;" data-placeholder="Choose many.." name="size[]"  multiple="">
        <option value="">None</option>
             <?php 
            $attr_parent = 0;
             $sql = "SELECT * from attribute_tb  WHERE parent_id <> $attr_parent ";
           $q = $conn->query($sql);
           $q->setFetchMode(PDO::FETCH_ASSOC);
            while ($row = $q->fetch()):
            ?>
             <?php
             $wasFound = false;

              foreach ($size as $siz){
                                  
               if(trim($siz) == trim($row['id'])){

       echo "<option value=\"{$row['id']}\" selected >{$row['name']} </option>";
                     $wasFound = true;
                       }          
                    }
 
             if($wasFound == false){

  echo "<option value=\"{$row['id']}\" >{$row['name']}</option>";
                               }

                               ?>
           

            <?php endwhile;?>
         </select>
        </div>
     </div>
                               
     </div>
    </div>
                           
 </div>


      

<div class="block">
                         
         <div class="block-content">
        <div class="form-horizontal">
                                        
          <div class="form-group">
                  <label class="col-xs-12" for="example-tags1">Tag</label>
                     <div class="col-xs-12">
             <input class="js-tags-input form-control" type="text" id="example-tags1" name="tag" value="<?= $tag; ?>">
                                </div>


            </div>
   <div class="form-group">
   <label class="col-xs-12" for="example-select">Publish</label>
            <div class="col-sm-12">
        <select class="form-control" id="example-select" name="publish" size="1">
        <option  <?php if($publish == "Yes"){ echo "selected"; } ?> value="Yes">Yes</option>
        <option <?php if($publish == "No"){ echo "selected"; } ?> value="No">No</option>
      </select>
            </div>
  </div>


  <div class="form-group">
   <label class="col-xs-12" for="example-select">Featured</label>
            <div class="col-sm-12">
                   <select class="form-control" id="example-select" name="featured" size="1">
        <option  <?php if($featured == "None"){ echo "selected"; } ?> value="None">None</option>
        <option <?php if($featured == "Home"){ echo "selected"; } ?> value="Home">Home</option>
      </select>
            </div>
  </div>

                                              
                               
     </div>
    </div>
</div>

<div class="block">
                         
         <div class="block-content">
        <div class="form-horizontal">
                                        
         <div class="block-content">
             <div class="form-group">
      <label class="" for="example-file-input">Gallery Images</label>
      <input type="file" multiple name="picx[]" id="imageupload_banner">



      <div id="preview-image_banner"></div>
         <?php
                 
                    try {
                  
                    $sql = 'SELECT * FROM photos_tb WHERE gallery_id = ?';
                    $q = $conn->prepare($sql);
                    $q->execute([$edit_product]);
                    $q->setFetchMode(PDO::FETCH_ASSOC);
                  
                } catch (PDOException $e) {
                    die("Could not connect to the database $dbname :" . $e->getMessage());
                }
                   ?>

               <?php  while ($row_image = $q->fetch()):  ?>
                  <div class="thumbimage" id="<?php echo $row_image['id'];?>" >
   <a  onclick="cart('<?php echo $row_image['id']; ?>')" value="<?php echo $row_image['id'];?>"  class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                    
                    <img src="<?php echo $row_image['image'];?>" width="100px" />
                    </div>
                <?php endwhile; ?>
             </div>
         </div>                  
     </div>
    </div>
</div>
                            <!-- post btn here --> 
            <div class="form-group">
                <div class="col-xs-12">
                 <button class="btn btn-sm btn-primary  pull-right" type="submit" name="update">Publish</button>
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
 
 <script>
 
 var monty = function(){
    alert($("#content").html());
 }
     const modify_product = (type) => {
           
    let path = type == 1 ? 'add-product' : 'update-product';
    let url = `https://hvafrica-85e6e.firebaseapp.com/api/${path}`;
    let today = new Date();
    let pid = type == 1 ? 0 : $("#pid").val();
     
    var payload = {
        pid: pid,
        category: $("#category").val().toString(), 
        date: today.getFullYear() + '-' + today.getMonth() + '-' + today.getDay(),
        detail_content: $("#detail_content").val(),
        featured: "None",
        img1: "TBD",
        img2: "TBD",
        publish: "Yes",
        qty: $("#qty").val(),
        regular_gh: $("#regular_gh").val(),
        regular_us: $("#regular_us").val(),
        sales_gh: $("#sales_gh").val(),
        sales_us: $("#regular_us").val(),
        sku: $("#sku").val(),
        slug: $("#slug_title").val(),
        stock: $("#in_stock").val(),
        title: $("#title").val(),
        height: $("#height").val(),
        length: $("#length").val(),
        weight: $("#weight").val(),
        width: $("#width").val()	            
    };

    
        $.ajax({
            type: 'POST',
            url: url,
            data: payload,
            dataType: 'json',						
            success: function(response){
                console.log(JSON.stringify(response));
            }, error: function(error){
                alert(error);
            }
        });
        
}
 </script>
 
        
        <!-- UPLOAD IMAGES JAVASCRIPT CODE -->



    </body>
</html>