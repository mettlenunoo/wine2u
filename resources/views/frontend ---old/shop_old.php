<?php require_once("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php require_once("includes/function.php");?>
<?php require_once("includes/check_country.php");?>

<?php  
if(isset($_GET['filter'])){

  $filter = $_GET['filter'];

}
  ?>
<?php  
if(isset($_GET['category'])){

    $category_slug = preg_replace('/[^\-\s\pN\pL]+/u', '', $_GET['category']);

    $sql_slug = "SELECT * from category_tb WHERE slug = '$category_slug' ";
    $slug = $conn->query($sql_slug);
    $slug->setFetchMode(PDO::FETCH_ASSOC);
    while ($row_slug = $slug->fetch()):
    $_SESSION['cat'] = $row_slug['id'];
    $category_id = $row_slug['id'];
    $category_name = $row_slug['name'];
    $category_image = $row_slug['image'];
    $category_description = decode_entities($row_slug['content']);

    endwhile;

    $all_cat_id[] = $category_id;
    $sql_all = "SELECT * from category_tb WHERE parent_id like $category_id ";
    $all = $conn->query($sql_all);
    $all->setFetchMode(PDO::FETCH_ASSOC);
    while ($row_all = $all->fetch()):

    $sub_id = $row_all['id'];
    $all_cat_id[] = $row_all['id'];

    $sql_all_sub = "SELECT * from category_tb WHERE parent_id like $sub_id ";
    $all_sub = $conn->query($sql_all_sub);
    $all_sub->setFetchMode(PDO::FETCH_ASSOC);
    while ($row_all_sub = $all_sub->fetch()):

        $all_cat_id[] = $row_all_sub['id'];
   
    endwhile;

  endwhile;


     if(!empty($all_cat_id)){
    $imploded_arr = implode(',', $all_cat_id);
      }


//SELECT * from table Where comp_id IN ($imploded_arr)


}

if(isset($_GET['sub_category'])){

    $category_slug_sub = preg_replace('/[^\-\s\pN\pL]+/u', '', $_GET['sub_category']);
    $category_id_sub = 0;
    $category_name_sub = "";
    $sql_slug_sub = "SELECT * from category_tb WHERE slug = '$category_slug_sub' ";
    $slug_sub = $conn->query($sql_slug_sub);
    $slug_sub->setFetchMode(PDO::FETCH_ASSOC);
    while ($row_slug_sub = $slug_sub->fetch()):
    $_SESSION['cat'] = $row_slug_sub['id'];
    $category_id_sub = $row_slug_sub['id'];
    $category_name_sub = $row_slug_sub['name'];
    $category_image = $row_slug_sub['image'];
    $category_description_sub = decode_entities($row_slug_sub['content']);
    endwhile;

     $all_cat_id_sub[] = $category_id_sub;
    $sql_all = "SELECT * from category_tb WHERE parent_id like $category_id_sub ";
    $all = $conn->query($sql_all);
    $all->setFetchMode(PDO::FETCH_ASSOC);
    while ($row_all = $all->fetch()):

    $sub_id = $row_all['id'];
    $all_cat_id_sub[] = $row_all['id'];

     endwhile;


     if(!empty($all_cat_id_sub)){
    $imploded_arr = implode(',', $all_cat_id_sub);
      }
}
?>

<?php

                 if($_SESSION['country'] == 1){
					
                           $check_price = "  AND regular_gh   > 0  ";
							  
                      }elseif ($_SESSION['country'] == 2) {
						  
                           $check_price = "  AND regular_us > 0  ";
							
                      }

$status = "Yes";
// This first query is just to get the total count of 
                $rows = 0;
                 try {
                      $limit = " ";
                    if(isset($category_slug_sub)){

                        $look = " ";
                           $nu = 1;
						   
                          foreach ($all_cat_id_sub as  $value) {

                                if($nu ==1){
                                    $nu = 2;
							 $look = " AND category like '%{$value}%' " ;
							 $limit .= 'SELECT * from product_tb WHERE publish = "Yes" '.$check_price.$look;
                              

                            }else{
                             
							 $limit .= " Union All ";
							 $look = " AND category like '%{$value}%' " ;
							 $limit .= 'SELECT * from product_tb WHERE publish = "Yes" '.$check_price.$look;
							 
                                //$look = $look. " OR category like '%{$value}%' " ;

                            }

                          }
						  
				
      
                  // $limit = 'SELECT * from product_tb WHERE publish = "Yes" '.$check_price.$look;


                  //  $sql = $limit;
                     // This sets the range of rows to query for the chosen $pagenum
        // $limit = 'SELECT * from product_tb WHERE publish = "Yes"  AND category = '.$category_id_sub .' LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
        // This is your query again, it is for grabbing just one page worth of rows by applying $limit
                    //$sql = $limit;

                    }elseif (isset($category_slug)) {


                         //$limit = 'SELECT * from product_tb WHERE publish = "Yes"  AND category IN ('.$imploded_arr.') LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
                          $look = " ";
                           $nu = 1;
                          foreach ($all_cat_id as  $value) {
							  
                           if($nu == 1){
                             $nu = 2;
							 $look = " AND category like '%{$value}%' " ;
							 $limit .= 'SELECT * from product_tb WHERE publish = "Yes" '.$check_price.$look;
                              
                            }else{
								
                             $limit .= " Union All ";
							 $look = " AND category like '%{$value}%' " ;
							 $limit .= 'SELECT * from product_tb WHERE publish = "Yes" '.$check_price.$look;
							 
                                //$look = $look. " OR category like '%{$value}%' " ;
                            }

                          }

                         // $limit = 'SELECT * from product_tb WHERE publish = "Yes" '.$check_price.$look;
                          
                    }
					
					$sql = $limit;
                    //$sql = "SELECT * from product_tb ";
                    $q = $conn->query($sql);
                    $q->setFetchMode(PDO::FETCH_ASSOC);
                    $rows = $q->rowCount();
                    
                  
                  } catch (PDOException $e) {
                      die("Could not connect to the database $dbname :" . $e->getMessage());
                  }

// Here we have the total row count
//$rows = $row[0];
// This is the number of results we want displayed per page
$page_rows = 12;
// This tells us the page number of our last page
$last = ceil($rows/$page_rows);
// This makes sure $last cannot be less than 1
if($last < 1){
  $last = 1;
}
// Establish the $pagenum variable
$pagenum = 1;
// Get pagenum from URL vars if it is present, else it is = 1
if(isset($_GET['pn'])){
  $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}
// This makes sure the page number isn't below 1, or more than our $last page
if ($pagenum < 1) { 
    $pagenum = 1; 
} else if ($pagenum > $last) { 
    $pagenum = $last; 
}
// This shows the user what page they are on, and the total number of pages
$textline1 = "Blogs (<b>$rows</b>)";
$textline2 = "<b>$pagenum</b> of <b>$last</b>";
// Establish the $paginationCtrls variable
$paginationCtrls = '';
// If there is more than 1 page worth of results
if($last != 1){
  /* First we check if we are on page one. If we are then we don't need a link to 
     the previous page or the first page so we do nothing. If we aren't then we
     generate links to the first page, and to the previous page. */
  if ($pagenum > 1) {
        $previous = $pagenum - 1;

       if(isset($category_slug_sub) && isset($filter)){

    $paginationCtrls .= '<li><a href="shop_filters/'.$category_slug.'/'.$category_slug_sub.'/'.$filter.'/'.$previous.'"><i class="fa fa-chevron-left"></i></a></li>';

        }elseif(isset($category_slug) && isset($filter)){

    $paginationCtrls .= '<li><a href="shop_filter/'.$category_slug.'/'.$filter.'/'.$previous.'"><i class="fa fa-chevron-left"></i></a></li>';

        }elseif (isset($category_slug_sub)){

    $paginationCtrls .= '<li><a href="shop_sub/'.$category_slug.'/'.$category_slug_sub.'/'.$previous.'"><i class="fa fa-chevron-left"></i></a></li>';

        }elseif (isset($category_slug)) {

    $paginationCtrls .= '<li><a href="shop/'.$category_slug.'/'.$previous.'"><i class="fa fa-chevron-left"></i></a></li>';

           }
    // Render clickable number links that should appear on the left of the target page number
    for($i = $pagenum-4; $i < $pagenum; $i++){
      if($i > 0){
        
         if(isset($category_slug_sub) && isset($filter)){

   $paginationCtrls .= '<li><a href="shop_filters/'.$category_slug.'/'.$category_slug_sub.'/'.$filter.'/'.$i.'">'.$i.'</a></li>';

        }elseif(isset($category_slug) && isset($filter)){

   $paginationCtrls .= '<li><a href="shop_filter/'.$category_slug.'/'.$filter.'/'.$i.'">'.$i.'</a></li>';

        }elseif(isset($category_slug_sub)){

    $paginationCtrls .= '<li><a href="shop_sub/'.$category_slug.'/'.$category_slug_sub.'/'.$i.'">'.$i.'</a></li>';

        }elseif(isset($category_slug)) {
 $paginationCtrls .= '<li><a href="shop/'.$category_slug.'/'.$i.'">'.$i.'</a></li>';

           }

          
      }
      }
    }
  // Render the target page number, but without it being a link
  $paginationCtrls .='<li class="active"><a>'.$pagenum.'</a></li>';
  // Render clickable number links that should appear on the right of the target page number

  for($i = $pagenum+1; $i <= $last; $i++){

    if(isset($category_slug_sub) && isset($filter)){

     $paginationCtrls .= '<li><a href="shop_filters/'.$category_slug.'/'.$category_slug_sub.'/'.$filter.'/'.$i.'">'.$i.'</a></li>';

        }elseif(isset($category_slug) && isset($filter)){

   $paginationCtrls .= '<li><a href="shop_filter/'.$category_slug.'/'.$filter.'/'.$i.'">'.$i.'</a></li>';

        } elseif(isset($category_slug_sub)){

    $paginationCtrls .= '<li><a href="shop_sub/'.$category_slug.'/'.$category_slug_sub.'/'.$i.'">'.$i.'</a></li>';

        }elseif(isset($category_slug)) {
 $paginationCtrls .= '<li><a href="shop/'.$category_slug.'/'.$i.'">'.$i.'</a></li>';

           }
 

    if($i >= $pagenum+4){
      break;
    }
  }
  // This does the same as above, only checking if we are on the last page, and then generating the "Next"
    if ($pagenum != $last) {
        $next = $pagenum + 1;

        if(isset($category_slug_sub) && isset($filter)){

   $paginationCtrls .= '<li><a href="shop_filters/'.$category_slug.'/'.$category_slug_sub.'/'.$filter.'/'.$next.'"><i class="fa fa-chevron-right"></i></a></li>';

        }elseif(isset($category_slug) && isset($filter)){

   $paginationCtrls .= '<li><a href="shop_filter/'.$category_slug.'/'.$filter.'/'.$next.'"><i class="fa fa-chevron-right"></i></a></li>';

        }elseif(isset($category_slug_sub)){
          

   $paginationCtrls .= '<li><a href="shop_sub/'.$category_slug.'/'.$category_slug_sub.'/'.$next.'"><i class="fa fa-chevron-right"></i></a></li>';

        }elseif(isset($category_slug)) {

 $paginationCtrls .= '<li><a href="shop/'.$category_slug.'/'.$next.'"><i class="fa fa-chevron-right"></i></a></li>';

           }
       
    }
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<title>Haute Vie - <?= ucwords($category_slug); ?></title>
		<?= $base; ?>


		<link rel="shortcut icon" type="image/png" href="images/favicon.png">
		<meta name="description" content="">
		<!-- Mobile viewport optimized -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-glyphicons.css" rel="stylesheet">
		<!-- Custom CSS -->
		<link href="css/global-styles.css" rel="stylesheet">
		<link href="css/shop-styles.css" rel="stylesheet">
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
		<!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="css/owl.carousel.min.css">
		<link rel="stylesheet" href="css/owl.theme.default.min.css">
		<!-- Animate CSS -->
		<link href="css/animate.css" rel="stylesheet">
		<!-- Font Awesome -->
		<link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">	
		<!-- Modernizer -->
		<script src="js/modernizr-2.6.2.min.js"></script>	
		<!-- Material Icons -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    
    <style type="text/css">

      .out-of-stock {

        position: absolute;

        width: 100%;

        height: 100%;

        background: rgba(255,255,255,.7);

        z-index: 1;
        top: 0;
        border: 1px solid #e3e3e3;

      }



      .out-of-stock h4 {

        margin: 0px;

        padding: 15px;

        background: #e3e3e3;

        margin-top: 150px;

        text-align: center;

        font-weight: 600;

      }



      .third-section .panel {

        position: relative;

      }

    </style>


	</head>
    
     <body>

    <?php require_once("includes/header.php");?>
    <?php  if(empty($category_image)){ ?>
    <div class="top-section" style="background-image: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.3) ),url(img/default_img.jpg);" >
    <?php }else{ ?>
    <div class="top-section" style="background-image: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.3) ),url(<?= $category_image; ?>);" >

    <?php } ?>


      <div class="container">
        <div class="row">

                        <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12 col-lg-offset-3 col-md-offset-2 col-sm-offset-2 text-center" style="color:#ffffff;">
                 <?php 

                     if(isset($category_name_sub)){ 

                         echo "<h3>$category_name_sub</h3>";
                 echo  "<p>$category_description_sub </p>";
                     
                                   }else{

                     echo   "<h3>$category_name</h3>";
                     echo  "<p>$category_description </p>";

                    }

                ?>
            
            <br>
            <!--<p><strong><?= $textline2; ?> results </strong></p>-->
          </div>
        </div>
      </div>
    </div>


    <div class="third-section accordion-styles">

      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-md-3 col-sm-4 hidden-xs">

            <div class="panel-group accordion-head" id="accordion">

                            <div class="panel panel-default">

                                <div class="panel-heading">

                                    <h4 class="panel-title clearfix">

                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1">

                                            <h6>

                                              <i class="material-icons">&#xE313;</i> 
                                              <?= strtoupper($category_name);?> 

                                            </h6>

                                        </a>

                                    </h4>

                                </div>

                                <div id="collapse1" class="panel-collapse collapse in">

                                    <div class="panel-body">

                                        <ul class="clothes">

                                     <?php 

              $sql_child_child = "SELECT * from category_tb WHERE parent_id = $category_id  ORDER BY POSITION ASC";
                            $y = $conn->query($sql_child_child);
                            $y->setFetchMode(PDO::FETCH_ASSOC);
                          
                              ?>
                     <?php   while ($row_child_child = $y->fetch()):  
                   
                        $childs = $row_child_child['id']; 
                     ?>

                  <li><a href="shop_sub/<?= $category_slug;?>/<?= $row_child_child['slug'];?>"><p><?= $row_child_child['name']; ?></p></a></li>

                                    <?php 

                            $sql_child_childs = "SELECT * from category_tb WHERE parent_id = $childs  ORDER BY POSITION ASC";
                            $ys = $conn->query($sql_child_childs);
                            $ys->setFetchMode(PDO::FETCH_ASSOC);
                          while ($row_child_childs = $ys->fetch()):
                              ?>

                              <li style="font-size: 12px"> <a href="shop_sub/<?= $category_slug;?>/<?= $row_child_childs['slug'];?>"><p> <?= ucfirst($row_child_childs['name']); ?></p></a></li>


                     <?php endwhile; ?>
                            <?php endwhile; ?>

                                    

                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </div>

                       <!-- <div class="panel-group accordion-head" id="accordion1">

                            <div class="panel panel-default">

                                <div class="panel-heading">

                                    <h4 class="panel-title clearfix">

                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse2">

                                            <h6>

                                              <i class="material-icons" style="margin-top: 5px;">&#xE313;</i> SIZE

                                            </h6>

                                        </a>

                                    </h4>

                                </div>

                                <div id="collapse2" class="panel-collapse collapse in">

                                    <div class="panel-body">

                                        <ul class="clothes size">

                                          <!--<li>

                                            <input type="radio" name="size"> XXS (75)

                                          </li>

                                          <li>

                                            <input type="radio" name="size"> XS (75)

                                          </li>

                                          <li>

                                            <input type="radio" name="size"> S (75)

                                          </li>

                                          <li>

                                            <input type="radio" name="size"> M (75)

                                          </li>

                                          <li>

                                            <input type="radio" name="size"> L (75)

                                          </li>

                                          <li>

                                            <input type="radio" name="size"> XL (75)

                                          </li> 

                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </div>-->

                       <!-- <div class="panel-group accordion-head" id="accordion2">

                            <div class="panel panel-default">

                                <div class="panel-heading">

                                    <h4 class="panel-title clearfix">

                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse3">

                                            <h6>

                                              <i class="material-icons" style="margin-top: 5px;">&#xE313;</i> REFINE BY COLOUR

                                            </h6>

                                        </a>

                                    </h4>

                                </div>

                                <div id="collapse3" class="panel-collapse collapse in">

                                    <div class="panel-body">

                                        <ul class="clothes">
                                          
                                          <!--<li>

                                            <a href="">

                                              <p>Black (100)</p>

                                            </a>

                                          </li>

                                          <li>

                                            <a href="">

                                              <p>White (100)</p>

                                            </a>

                                          </li>

                                          <li>

                                            <a href="">

                                              <p>Blue (100)</p>

                                            </a>

                                          </li>

                                          <li>

                                            <a href="">

                                              <p>Navy Blue (100)</p>

                                            </a>

                                          </li>

                                          <li>

                                            <a href="">

                                              <p>Green (100)</p>

                                            </a>

                                          </li>

                                        </ul>

                                    </div>

                                </div> 

                            </div>

                        </div> -->

                       <!-- <div class="panel-group accordion-head" id="accordion3">

                            <div class="panel panel-default">

                                <div class="panel-heading">

                                    <h4 class="panel-title clearfix">

                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse4">

                                            <h6>

                                              <i class="material-icons" style="margin-top: 5px;">&#xE313;</i> PRICE

                                            </h6>

                                        </a>

                                    </h4>

                                </div>

                                <div id="collapse4" class="panel-collapse collapse in">

                                    <div class="panel-body">

                                        <input type="text" name="" placeholder="50" class="range">

                                        to

                                        <input type="text" name="" placeholder="100" class="range">

                                    </div>

                                </div>

                            </div>

                        </div> -->

          </div>

          <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">

            <div class="row">

              <div class="col-lg-12 clearfix" style="margin-bottom: 20px;">

                <div class="dropdown pull-left contains-button" style="padding-right: 5px;">

                    <button id="dropdownMenuButton" data-toggle="dropdown" class="fav-btn">

                      <div class="clearfix">

                        <span class="pull-left"> <?php if(empty($filter)){ echo "Latest"; }else{ echo ucfirst($filter); }    ?></span>    <i class="fa fa-angle-down pull-right" style="line-height: 1.5em;"></i>

                      </div>  

                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                    <!--  <a class="dropdown-item" >Our Favourites</a>

                      <a class="dropdown-item" >Bestsellers</a>-->

                <a <?php  if(empty($category_slug_sub)){ ?>

                href="shop_filter/<?=$category_slug;?>/latest" 

                      <?php }else{  ?>

                 href="shop_filters/<?=$category_slug;?>/<?= $category_slug_sub; ?>/latest" 

                     <?php } ?>
                class="dropdown-item" >Latest</a>

                <a <?php  if(empty($category_slug_sub)){ ?>

                href="shop_filter/<?=$category_slug;?>/low" 

                      <?php }else{  ?>

                 href="shop_filters/<?=$category_slug;?>/<?=$category_slug_sub?>/low" 

                     <?php } ?> 

                 class="dropdown-item" >Price Low - High</a>

                <a <?php  if(empty($category_slug_sub)){ ?>

                href="shop_filter/<?=$category_slug;?>/high" 

                      <?php }else{  ?>

                href="shop_filters/<?=$category_slug;?>/<?= $category_slug_sub;?>/high" 

                     <?php } ?> class="dropdown-item" >Price High - Low</a>

                    </div>

                </div>
                
                <!-- Refine search button with dropdown. Visible on mobile -->
                <div class="dropdown pull-right contains-button visible-xs" style="padding-left: 5px;">
			<button id="dropdownMenuButton" data-toggle="dropdown" class="fav-btn">
				<div class="clearfix">
					<span class="pull-left">Refine Search</span>    <i class="fa fa-angle-down pull-right" style="line-height: 1.5em;"></i>
				</div>	
			</button>

			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">


                                     <?php 

              $sql_child_child = "SELECT * from category_tb WHERE parent_id = $category_id  ORDER BY POSITION ASC";
                            $y = $conn->query($sql_child_child);
                            $y->setFetchMode(PDO::FETCH_ASSOC);
                          
                              ?>
                     <?php   while ($row_child_child = $y->fetch()):  
                   
                        $childs = $row_child_child['id']; 
                     ?>
          
                  <a href="shop_sub/<?= $category_slug;?>/<?= $row_child_child['slug'];?>" class="dropdown-item"><?= $row_child_child['name']; ?></a>

                                    <?php 

                            $sql_child_childs = "SELECT * from category_tb WHERE parent_id = $childs  ORDER BY POSITION ASC";
                            $ys = $conn->query($sql_child_childs);
                            $ys->setFetchMode(PDO::FETCH_ASSOC);
                          while ($row_child_childs = $ys->fetch()):
                              ?>

                           <a href="shop_sub/<?= $category_slug;?>/<?= $row_child_childs['slug'];?>" class="dropdown-item"> <?= ucfirst($row_child_childs['name']); ?></a>


                     <?php endwhile; ?>
                            <?php endwhile; ?>
                 
                                    
				<!--<a class="dropdown-item" href="#">Our Favourites</a>
				<a class="dropdown-item" href="#">Bestsellers</a>
				<a class="dropdown-item" href="#">Newest</a>
				<a class="dropdown-item" href="#">Price Low - High</a>
				<a class="dropdown-item" href="#">Price High - Low</a>-->
			</div>
		</div>

                <!-- <button class="fav-btn pull-right visible-xs" id="show-refine"> Refine Search </button> -->

                <ul class="page pull-right hidden-xs" style="margin-top: 0px;">
                                 <?= $paginationCtrls; ?>

          
                </ul>

              </div>

                          <?php
                              
                    try {

          //$sql = "SELECT * from product_tb  WHERE id = $edit_product LIMIT 1";
                      if($_SESSION['country'] == 2){
                        
                         $order_price =  " regular_us ";

                      }else{
                          
                          $order_price =  " regular_gh ";

                      }
                     

                    if(isset($category_slug_sub)){
                         $limit = " ";
                        $look = " ";
                           $nu = 1;
                          foreach ($all_cat_id_sub as  $value) {
							  
							if($nu ==1){
                              $nu = 2;
							 $look = " AND category like '%{$value}%' " ;
							 $limit .= 'SELECT * from product_tb WHERE publish = "Yes" '.$check_price.$look;
                              

                            }else{
                             $limit .= " Union All ";
							 $look = " AND category like '%{$value}%' " ;
							 $limit .= 'SELECT * from product_tb WHERE publish = "Yes" '.$check_price.$look;
							 
                                //$look = $look. " OR category like '%{$value}%' " ;

                            }

                              /*  if($nu ==1){
                                    $nu = 2;
                                $look = $look. " AND category like '%{$value}%' " ;

                            }else{
                              
                                $look = $look. " OR category like '%{$value}%' " ;

                            } */

                          }

                
                      if($filter == "low"){

                          $limit .= ' ORDER BY regular_gh ASC LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
                          $sql = $limit;

                        }elseif ($filter == "high") {

                         $limit .=' ORDER BY regular_gh DESC LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
                          $sql = $limit;

                        }else{

                         $limit .= ' ORDER BY date DESC LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
                          $sql = $limit;

                        }

                     // This sets the range of rows to query for the chosen $pagenum
        // $limit = 'SELECT * from product_tb WHERE publish = "Yes"  AND category = '.$category_id_sub .' LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
        // This is your query again, it is for grabbing just one page worth of rows by applying $limit
                    //$sql = $limit;

                    }elseif (isset($category_slug)) {


                       //$limit = 'SELECT * from product_tb WHERE publish = "Yes"  AND category IN ('.$imploded_arr.') LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
					   
                          $look = " ";
						  $limit = " ";
                           $nu = 1;
                          foreach ($all_cat_id as  $value) {
							  
                                if($nu ==1){
									
                             $nu = 2;
							 $look = " AND category like '%{$value}%' " ;
							 $limit .= 'SELECT * from product_tb WHERE publish = "Yes" '.$check_price.$look;
                              
                            }else{
								
                             $limit .= " Union All ";
							 $look = " AND category like '%{$value}%' " ;
							 $limit .= 'SELECT * from product_tb WHERE publish = "Yes" '.$check_price.$look;
							 
                            //$look = $look. " OR category like '%{$value}%' " ;
                            }

                          }
                          

                        if($filter == "low"){

                          $limit .= ' ORDER BY regular_gh ASC LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
                          $sql = $limit;

                        }elseif ($filter == "high") {

                         $limit .=' ORDER BY regular_gh DESC LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
                          $sql = $limit;

                        }else{

                         $limit .= ' ORDER BY date DESC LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
                          $sql = $limit;

                        }


                    }
                   // $sql = "SELECT * from product_tb ";
                    $q = $conn->query($sql);
                    $q->setFetchMode(PDO::FETCH_ASSOC);
                    $rows_total = $q->rowCount();

                        } catch (PDOException $e) {
                            die("Could not connect to the database $dbname :" . $e->getMessage());
                        }
             ?>


                     <?php if(!empty($rows_total)){ ?>

                  <?php  while ($row = $q->fetch()):  ?>
                <?php
                   $c_price =1;
                if($_SESSION['country'] == 1){
                           
                          if ($row['regular_gh'] <= 0) {
                              
                              $c_price = 0;
                           } 

                         
                      }elseif ($_SESSION['country'] == 2) {

                            if ($row['regular_us'] <= 0) {

                              $c_price = 0;
                           }

                      }

                  ?>

                  <?php if($c_price > 0){  ?>

              <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                
        <div class="panel">
                 <input type="hidden" name="pid" id="<?= $row['id']; ?>product_id" value="<?= $row['id']; ?>">
                                    <div class="panel-body">

                                        <div class="image-in">

                                            <a href="product/<?= $row['slug'];?>">
                                                <img src="<?= $row['img1'];?>" class="img-responsive img-resize">
                                            </a>    

                                        </div>

                                        <div class="hover-image">

                                            <img src="<?= $row['img2'];?>" class="img-responsive img-resize">

                                        </div>

        <div class="bag-func" onclick="cart('<?= $row['id']; ?>')">

        <i  style="cursor: pointer;"class="fa fa-shopping-bag"></i>

                                        </div>

                                    </div>

                                    <div class="panel-footer clearfix">

                                        <div class="clearfix">

                                            <h4 class="pull-left"><?= ucwords(decode_entities($row['title']));?></h4>

                        <p class="price pull-right">

              <?php if($_SESSION['country'] == 1){ ?>

                <?php if($row['sales_gh'] > 0){ ?>
                 GHS <?= number_format($row['sales_gh'],2);?>
                <strike>GHS <?= number_format($row['regular_gh'],2);?> </strike>
                <input type="hidden" id="<?= $row['id']; ?>_price" value="<?= $row['sales_gh'];?>"> 

                <?php }else{  ?> 

                GHS <?= number_format($row['regular_gh'],2);?>
                <input type="hidden" id="<?= $row['id']; ?>_price" value="<?= $row['regular_gh'];?>"> 

                <?php } ?> 

                <?php }elseif ($_SESSION['country'] == 2) {?>

                  <?php if($row['sales_us'] > 0){ ?>
                 $ <?= number_format($row['sales_us'],2);?>
                <strike>$ <?= number_format($row['regular_us'],2);?> </strike>
                <input type="hidden" id="<?= $row['id']; ?>_price" value="<?= $row['sales_us'];?>"> 

                <?php }else{  ?> 

                $ <?= number_format($row['regular_us'],2);?>
                <input type="hidden" id="<?= $row['id']; ?>_price" value="<?= $row['regular_us'];?>"> 

                <?php } ?> 
                   
               <?php  } ?>

                        </p>

                                        </div>

                                        <?php
                    $str = strip_tags(decode_entities($row["content"]));
                        if(strlen($str) > 110){
                          $str = substr($str,0,110)." ...";
                       echo "<p class='descr'>{$str}</p>";
                    }elseif(strlen($str) <= 110){
                    echo "<p class='descr'>{$str}</p>";
                    }
                      ?>
                                    </div>
                      <?php if($row['qty'] < 1){ ?>
                    <div class="out-of-stock">

                    <h4>OUT OF STOCK</h4>

                  </div>

                  <?php } ?>

                                </div>


              </div>

                 <?php }  ?>


                   <?php  endwhile;  ?>

                 <?php } else{  ?>
  
                <h4 class="pull-left">No Product Under This category.<br/>Please Come Again Next Time. Thank you!. </h4>

                 <?php } ?>




      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <ul class="page pull-right hidden-xs" style="margin-top: 0px;">
                                 <?= $paginationCtrls; ?>

    

                </ul>
                  
      </div>
            </div>

            <div class="row visible-xs">

              <div class="col-xs-12 text-center">

                <ul class="page">

               <?= $paginationCtrls; ?>

                </ul>

              </div>

            </div>

          </div>

          

        </div>

      </div>  

    </div>



    <div class="refine-search visible-xs go-out">

      <div class="head-part">

        <a class="go-back"><i class="fa fa-angle-left" data-target="#myCarousel" data-slide-to="0"></i></a>

        <h3>Refine</h3>

        <p><?= $textline2; ?> results</p>

        <a class="close-refine"><i class="material-icons">close</i></a>

      </div>
      

      <div class="body-part">

        <div id="myCarousel" class="carousel slide" data-interval="0">

          <div class="carousel-inner">

              <div class="item active" >

                <ul class="refine-param">

                 <li  class="" data-target="#myCarousel" data-slide-to="1">

                      <div class="clearfix">

                        <h4 class="pull-left">REFINE BY <?= strtoupper($category_name);?></h4>

                        <i class="fa fa-angle-right pull-right"></i>

                      </div>

                    </li>
                    

                    <!--<li data-target="#myCarousel" data-slide-to="2" class="active">

                      <div class="clearfix">

                        <h4 class="pull-left">REFINE BY COLOUR</h4>

                        <i class="fa fa-angle-right pull-right"></i>

                      </div>

                    </li>

                    <li data-target="#myCarousel" data-slide-to="3" class="active">

                      <div class="clearfix">

                        <h4 class="pull-left">SIZE</h4>

                        <i class="fa fa-angle-right pull-right"></i>

                      </div>

                    </li>

                    <li data-target="#myCarousel" data-slide-to="4" class="active">

                      <div class="clearfix">

                        <h4 class="pull-left">PRICE</h4>

                        <i class="fa fa-angle-right pull-right"></i>

                      </div>

                    </li> -->

                </ul> 

              </div>



              <div class="item">

                <ul class="refine-param sub-items">

                                 <?php 

                            $sql_child_child = "SELECT * from category_tb WHERE parent_id = $category_id  ORDER BY POSITION ASC";
                            $y = $conn->query($sql_child_child);
                            $y->setFetchMode(PDO::FETCH_ASSOC);
                          
                              ?>
                     <?php   while ($row_child_child = $y->fetch()):  
                   
                        $childs = $row_child_child['id']; 
                     ?>

                            <li><a href="shop_sub/<?= $category_slug;?>/<?= $row_child_child['slug'];?>"><h4><?= $row_child_child['name']; ?></h4></a></li>

                                    <?php 

                            $sql_child_childs = "SELECT * from category_tb WHERE parent_id = $childs  ORDER BY POSITION ASC";
                            $ys = $conn->query($sql_child_childs);
                            $ys->setFetchMode(PDO::FETCH_ASSOC);
                          while ($row_child_childs = $ys->fetch()):
                              ?>

                              <li> <a href="shop_sub/<?= $category_slug;?>/<?= $row_child_childs['slug'];?>"><h4>- <?= $row_child_childs['name']; ?></h4></a></li>


                               <?php endwhile; ?>
                            <?php endwhile; ?>

                  <!--<li>

                      <a class="an-item clearfix">

                        <h4 class="pull-left">Tops (120)</h4>

                        <i class="material-icons pull-right">check_circle</i>

                      </a>

                    </li>

                    <li>

                      <a class="an-item clearfix">

                        <h4 class="pull-left">Shorts (200)</h4>

                        <i class="material-icons pull-right">check_circle</i>

                      </a>

                    </li>

                    <li>

                      <a class="an-item clearfix">

                        <h4 class="pull-left">Hoodie (50)</h4>

                        <i class="material-icons pull-right">check_circle</i>

                      </a>

                    </li>

                    <li>

                      <a class="an-item clearfix">

                        <h4 class="pull-left">Crop Tops (100)</h4>

                        <i class="material-icons pull-right">check_circle</i>

                      </a>

                    </li> -->

                </ul>

              </div>



              <div class="item">

                <ul class="refine-param">

                  <li>

                    <input type="radio" name="colour"> Grey (200)

                  </li>

                  <li>

                    <input type="radio" name="colour"> White (200)

                  </li>

                  <li>

                    <input type="radio" name="colour"> Green (200)

                  </li>

                  <li>

                    <input type="radio" name="colour"> Orange (200)

                  </li>

                  <li>

                    <input type="radio" name="colour"> Yellow (200)

                  </li>

                  <li>

                    <input type="radio" name="colour"> Black (200)

                  </li>

                  <li>

                    <input type="radio" name="colour"> Red (200)

                  </li>

                  <li>

                    <input type="radio" name="colour"> Purple (200)

                  </li>

                </ul>

              </div>



              <div class="item">

                <ul class="refine-param">

                  <li>

                    <input type="radio" name="colour"> XXS (200)

                  </li>

                  <li>

                    <input type="radio" name="colour"> XS (200)

                  </li>

                  <li>

                    <input type="radio" name="colour"> S (200)

                  </li>

                  <li>

                    <input type="radio" name="colour"> M (200)

                  </li>

                  <li>

                    <input type="radio" name="colour"> L (200)

                  </li>

                  <li>

                    <input type="radio" name="colour"> XL (200)

                  </li>

                </ul>

              </div>



              <div class="item text-center p-range">

                GHS <input type="text" name="" placeholder="1"> <span style="margin-left: 10px;margin-right: 15px;">TO</span> GHS<input type="text" name="" placeholder="50">

              </div>

            </div>

        </div>

      </div>

      <div class="base-part clearfix">

        <button class="base-btn pull-left">Clear all</button>

        <button class="base-btn pull-right">Apply</button>

      </div>

    </div>

  

    <?php require_once("includes/footer.php");?>



    <script type="text/javascript">

      $(document).ready(function(){

        $('.accordion-toggle').on('click', function() {

                  var $icon = $(this).find('.material-icons');

                  if ($icon.hasClass('add')) {

                      $icon.html('&#xE313;');

                  } else {

                      $icon.html('&#xE316;');

                  }

                  $icon.toggleClass('add');

              });

              $('.sub-items li a').click(function(){

                $(this).toggleClass('you-selected');

              });  

              $('.close-refine').click(function(){

                $('.refine-search').addClass('go-out');

              });   

              $('#show-refine').click(function(){

                $('.refine-search').removeClass('go-out');

              });           

      })

    </script>

  </body>

</html>



