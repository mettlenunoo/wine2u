<?php require_once("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php require_once("includes/function.php");?>
<?php
   if(count($_SESSION["cart_array"]) < 1 ){
     // REDIRECT 
    echo "<script> window.location.replace('index') </script>";

   }

?>

 <?php

#########    COUPON SECTION  ########################


                 if(empty($_SESSION['coupon_code'])){
                    
                    $_SESSION['coupon_code'] = " ";
                 }

                 if(isset($_POST['promo'])){  
                // echo  "<script>toastr.success('Product Added to Cart')</script>";

                   $coupon_code = $_POST['promo'];  
                   $coupon_date = date('Y-m-d'); 
                   
                   if(!isset($_SESSION['promo_applied'])){ 
                  
                  	$_SESSION['promo_applied'] = true;
                  	
                    try {

                        if($_SESSION['country']== 1){ 
                            $coupon_country = "Ghana";
                        }elseif ($_SESSION['country'] == 2) { 
                              $coupon_country = "International"; 
                        }
                        
                        

                    $sql = "SELECT * from coupon_tb WHERE coupon_code = '$coupon_code'  AND date >= '$coupon_date' AND status = 'active' AND usages >= 0 AND country = '$coupon_country' ";
                    	
                    	
                            $q = $conn->query($sql);
                            $q->setFetchMode(PDO::FETCH_ASSOC);
                            $rows = $q->rowCount();
                            
                            if ($rows >= 1){
                        
                            
                            while ($row = $q->fetch()):

                            $id = $row['id'];
                            //$coupon_code= $row['coupon_code'];
                            $_SESSION['coupon_code']  = $row['coupon_code'];
                            $coupon_type= $row['coupon_type'];
                            $_SESSION['coupon_type'] = $coupon_type;
                            $_SESSION['coupon_amount'] = $row['amount'];
                            $date = $row['date'];
                            $_SESSION['min_amount']= $row['min_amount'];
                            $_SESSION['max_amount'] = $row['max_amount'];
                            $_SESSION['coupon_user'] = $row['assigned_to'];
                            $usages = $row['usages'];
                            $usaged = $row['usaged'];
                            $status = $row['status'];
                            $date_used = $row['date_used'];
        
                            endwhile;

                            
			    $_SESSION['coupon_used'] = true;
			    $_SESSION['noPromoTotal'] = $_SESSION['totalAmt'];
			    $_SESSION['totalAmt'] = $_SESSION['totalAmt'] * (1-$_SESSION['coupon_amount']);
                            $coupon_success = "<p class='text-success small'> Thank you for using our coupon! </p> ";
                           
                            
                            }else{

                            $coupon_success = "<p class='text-danger small'> Invalid Coupon code </p>";
                            $_SESSION['coupon_used']  = false;
                            }

                                } catch (PDOException $e) {
                                    die("Could not connect to the database $dbname :" . $e->getMessage());
                                }
                                
                            }

                            }


?>




<?php require_once("includes/connection.php");?>
<?php require_once("includes/function.php");?>

<?php
            if(isset($_GET['index_to_remove']) && $_GET['index_to_remove']!=""){
             // access the array and run code tp remove that array  index
            $key_to_remove = $_GET['index_to_remove'];
            $total_price = $_GET['total_price'];

            if(count($_SESSION["cart_array"]) <= 1){
            
            unset($_SESSION["cart_array"]);
            unset($_SESSION['totalAmt']);
            unset($_SESSION['noPromoTotal']);
            unset($_SESSION['coupon_used']);
            unset($_SESSION['promo_applied']);

            }else{

            unset($_SESSION["cart_array"][$key_to_remove]);

            sort($_SESSION["cart_array"]);
            $_SESSION['totalAmt'] = $_SESSION['totalAmt'] - $total_price;
            
            }
            // REDIRECT 
            echo "<script> window.location.replace('cart.php') </script>";
            }
?>

<!DOCTYPE html>
<html>

	<head>
		<!-- Website Title & Description for Search Engine purposes -->

		<title>Haute Vie - Cart</title>

        <link rel="shortcut icon" type="image/png" src="images/favicon.png">

        <meta charset="utf-8">

		<meta name="description" content="">

		

		<!-- Mobile viewport optimized -->

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		

		<!-- Bootstrap CSS -->

		<link href="css/bootstrap.min.css" rel="stylesheet">

		<link href="css/bootstrap-glyphicons.css" rel="stylesheet">

		

		<!-- Custom CSS -->

		<link href="css/global-styles.css" rel="stylesheet">

		<link href="css/cart-styles.css" rel="stylesheet">



		<!-- Google Fonts -->

		<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">



		<!-- Owl Carousel CSS -->

		<link rel="stylesheet" href="css/owl.carousel.min.css">

		<link rel="stylesheet" href="css/owl.theme.default.min.css">



		<!-- Animate CSS -->

		<link href="css/animate.css" rel="stylesheet">

		<!-- Font Awesome -->

		<link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    
        <!-- Material Icons -->

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        

		<!-- Include Modernizr in the head, before any other Javascript -->

		<script src="js/modernizr-2.6.2.min.js"></script>
        <script type="text/javascript" src="jquery.js"></script> 
		
  
	</head>

	<body>



        <?php require_once("includes/header.php");?>

        

        <div class="bag">

            <div class="container">

                <div class="row">

                    <div class="big-description clearfix">

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                            <h3 class="hidden-xs">Shopping Bag</h3>

                            <div class="visible-xs clearfix flex-sm">

                                <h6 class="pull-left sm-title">Your Shopping Bag</h6>

                                <p class="item-sm pull-right"><?= count($_SESSION['cart_array'])?> Item(s)</p>

                            </div>

                            <br>

                        </div>



                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

                            <ul class="pull-right-md">

                                <li class="hidden-xs">

                                    <h3>Total</h3>

                                </li>

                                <li class="hidden-xs">
                                  
                                  <?php if($_SESSION['country'] == 1){?>

                                    <h4 class="price">GHS <?= number_format($_SESSION['totalAmt'],2)?></h4>

                                  <?php }elseif ($_SESSION['country'] == 2) { ?>

                                  <h4 class="price">&#36 <?= number_format($_SESSION['totalAmt'],2)?></h4>
                                   
                                   <?php
                                  } 

                                  ?>


                                </li>

                                <li>

                                    <a href="checkout.php"><button class="but1">Checkout</button></a>

                                </li>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>

            <div class="items-part hidden-xs">

                <div class="container">

                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="table-responsive">

                                <table class="table">

                                    <thead>

                                        <tr>

                                            <th>Item</th>

                                            <th>Quantity</th>

                                            <th>Price</th>

                                            <th>Subtotal</th>

                                        </tr>

                                    </thead>

                                    <tbody>

            <?php 
            
            # CODE FOR ORDER PRODUCTS 
          if(!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"])< 1){


                }else{

                 $i =0;
                foreach($_SESSION["cart_array"] as  $each_item){
                
                $item_id = $each_item['item_id'];
                $quantity = $each_item['quantity'];
                $price = $each_item['price'];
                
                //New Additions
                if($each_item['child']){
                    $child_item_id = $each_item['child_item_id'];
                $sql = "SELECT * from product_child_tb  WHERE id = $child_item_id LIMIT 1";
                	
                }else{
                	$sql = "SELECT * from product_tb  WHERE id = $item_id LIMIT 1";
                }
                //End new additions
                
                
                    //$sql = "SELECT * from product_tb  WHERE id = $item_id LIMIT 1";
                    $q = $conn->query($sql);
                    $q->setFetchMode(PDO::FETCH_ASSOC);

                     while ($row = $q->fetch()): 
 
                            ?>  
               
                                        <tr>

                                            <td>

                                                <ul class="cart-items clearfix">

                                                    <li>

                                                        <img src="<?= $row['img1'];?>" class="img-responsive">

                                                        <div class="item-descr">

                                                            <h5><?= ucwords($row['title']);?></h5>

                        <p class="small-text">
                    <?php $str = strip_tags(decode_entities($row["content"]));
                           if(strlen($str) > 80){
                            $str = substr($str,0,80)." ...";
                           echo $str;
                            }elseif(strlen($str) <= 80){
                            echo $str;
                            }
                       ?> 
                       </p>
    <?php if($_SESSION['country'] == 1){?>
            <p class="small">
        
        QTY: <?= $quantity; ?> X GHS
        <?php

     if($row['sales_gh'] > 0){

       $single_price = $row['sales_gh'];
       echo number_format($single_price,2);

     }else{

      $single_price = $row['regular_gh'];
      echo number_format($single_price,2);

     }
    
     ?>
        
</p>
    <?php }elseif($_SESSION['country'] == 2){ ?>
  
    <p class="small">
        
        QTY: <?= $quantity; ?> X &#36 
        <?php

     if($row['sales_us'] > 0){

       $single_price = $row['sales_us'];
       echo number_format($single_price,2);

     }else{

      $single_price = $row['regular_us'];
      echo number_format($single_price,2);

     }
    
     ?>
        
</p>

    <?php } ?>




                      <!--  <p class="small">SIZE: M</p>-->

                    <!--  <p class="small text-danger"><?= $row['weight'];?> kg(s) </p>-->

                                                        </div>

                                                    </li>

                                                </ul>

                                               <!-- <div class="wish">

                                                    <a><i class="fa fa-heart-o"></i> Add to wishlist</a>

                                                </div>-->

                                            </td>

                                            <td>

                                                <form class="form-group">

                                                    <!--<i class="fa fa-plus"></i>-->
                       
               <div class="col-sm-3">

  <select id="<?php echo $row['id']; ?>_quantity" onchange="myFunction(<?php echo $row['id'];?>);" style="height:40px;">

                        <?php 
                         $qty = $row['qty'];

                        for($x=1;$x <= $qty; $x++){?>
    <option <?php if($quantity == $x){?> selected="Selected" <?php }?> value="<?php echo $x ?>"><?php echo $x ?></option>
                                    <?php }?>
                                    </select>
          <input type="hidden" value="<?= $single_price; ?>" id="<?php echo $row['id']; ?>_price">
          <input type="hidden" value="<? if($each_item['child']) echo 1; else echo 0; ?>" id="<?php echo $row['id']; ?>_child">
            <!--<input type="number" class="form-control" placeholder="1" value="<?= $quantity; ?>">-->
             </div>  
             <?php  if($_SESSION['country'] == 1){ ?>
                                <?php
                   $sub_total_price = $quantity  * $single_price ;
                                     ?>
                 <?php  }elseif($_SESSION['country'] == 2){ ?>
                                   <?php
                                  $sub_total_price = $quantity  * $single_price ;
                                     ?>
              <?php } ?>
                <div class="col-sm-3">         <!-- <i class="fa fa-minus"></i>-->
                    <a href="cart.php?index_to_remove=<?=$i;?>&total_price=<?=$sub_total_price;?>" class="edit" style="color:#333 !important;"><i class="fa fa-times" style="margin-top: 10px;"></i>  </a>
              </div>
                                                <!-- <a class="rem">Remove</a>-->

                                                </form>

                                            </td>
                    <?php  if($_SESSION['country'] == 1){ ?>
                                    <td class="price">GHS
                                             
                                             <?php
                                  $sub_total = $quantity  * $single_price ;
                               echo number_format($sub_total,2);
                                             ?>

                                    </td>

                                    <td class="price">GHS 
                                     <?php
                               echo  number_format($sub_total,2);

                                     ?>
                                  </td>

                    <?php  }elseif($_SESSION['country'] == 2){ ?>

                                  <td class="price">&#36 
                                             
                                             <?php
                                  $sub_total = $quantity  * $single_price ;
                               echo number_format($sub_total,2);
                                             ?>


                                    </td>
                                    
                                    <td class="price">&#36 
                                     <?php

                               echo  number_format($sub_total,2);

                                     ?>
                                  </td>
                            <?php } ?>


                                        </tr> 
                        <?php
                    endwhile;
                     $i++;

                    }

                    }// END OF ORDER SCRIPT

?>

                                    </tbody>

                                </table>

                            </div>    

                        </div> 

                    </div>    

                </div>    

            </div>

            <div class="list-items visible-xs">

                <div class="container">

                    <div class="row">

                        <ul>
            <?php

                               # CODE FOR ORDER PRODUCTS 
          if(!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"])< 1){


                }else{
                 $i =0;
                foreach($_SESSION["cart_array"] as  $each_item){
                $item_id = $each_item['item_id'];
                $quantity = $each_item['quantity'];
                $price = $each_item['price'];
                
                //New Additions
                if($each_item['child']){
                $sql = "SELECT * from product_child_tb  WHERE id = $item_id LIMIT 1";
                	
                }else{
                	$sql = "SELECT * from product_tb  WHERE id = $item_id LIMIT 1";
                }
                //End new additions

                    //$sql = "SELECT * from product_tb  WHERE id = $item_id LIMIT 1";
                    $q = $conn->query($sql);
                    $q->setFetchMode(PDO::FETCH_ASSOC);

                     while ($row = $q->fetch()): 
 
                            ?>  
                     
                            <li>

                                <img src="<?= $row['img1'];?>" class="img-responsive">

                                <div class="list-items-descr">

                                    <div class="clearfix">

                                        <h5 class="pull-left"><?= ucwords($row['title']);?></h5>
                
                    <a  href="cart.php?index_to_remove=<?=   $i; ?>" ><i class="material-icons pull-right">close</i></a>

                                    </div>

                                    <p> 
                      <?php

                       $str = strip_tags(decode_entities($row["content"]));
                           if(strlen($str) > 80){
                            $str = substr($str,0,80)." ...";
                           echo $str;
                            }elseif(strlen($str) <= 80){
                            echo $str;
                            }

                            ?>
                                
                            </p>

                                    <div class="clearfix">

    <?php if($_SESSION['country'] == 1){?>
            <p class="small">
        
        QTY: <?= $quantity; ?> X GHS 
        <?php

     if($row['sales_gh'] > 0){

       $single_price = $row['sales_gh'];
       echo number_format($single_price,2);

     }else{

      $single_price = $row['regular_gh'];
      echo number_format($single_price,2);

     }

       $sub_total_price = $quantity  * $single_price ;
    
     ?>  
        
</p>
<p class="item-price pull-right">GHS <?= number_format($sub_total_price,2); ?></p>

    <?php }elseif($_SESSION['country'] == 2){ ?>
  
    <p class="small">
        
        QTY: <?= $quantity; ?> X &#36 
        <?php

     if($row['sales_us'] > 0){

       $single_price = $row['sales_us'];
       echo number_format($single_price,2);

     }else{

      $single_price = $row['regular_us'];
      echo number_format($single_price,2);

     }

     $sub_total_price = $quantity  * $single_price ;
     ?>
        
</p>
             
 <p class="item-price pull-right">&#36 <?= number_format($sub_total_price,2); ?></p>
    <?php } ?>

                               </div>

                         <select id="<?php echo $row['id']; ?>_quantitym" onchange="myFunctionm(<?php echo $row['id'];?>);" style="height:40px;">

                        <?php 
                         $qty = $row['qty'];

                        for($x=1;$x <= $qty; $x++){?>
                        <option <?php if($quantity == $x){?> selected="Selected" <?php }?> value="<?php echo $x ?>"><?php echo $x ?></option>
                                    <?php }?>
                        </select>
                        <input type="hidden" value="<?= $single_price; ?>" id="<?php echo $row['id']; ?>_pricem">
                         <input type="hidden" value="<? if($each_item['child']) echo 1; else echo 0; ?>" id="<?php echo $row['id']; ?>_childm">
                                  <!--  <form class="form-group">

                                        <i class="fa fa-plus"></i>

                                        <input type="text" class="quant" placeholder="1">

                                        <i class="fa fa-minus"></i>

                                    </form>-->

                                    

                                </div>

                            </li>

                        <?php
                    endwhile;

                    $i++;

                    }
                    }// END OF ORDER SCRIPT

                    ?>



                        </ul>

                    </div>

                </div>

            </div>

        </div>

        

        <div class="base-section">

            <div class="container hidden-xs">

                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <img src="images/pplans.png" class="img-responsive pull-right-md">

                        <div class="clearfix"></div>

                        <hr>
                        <form action="checkout.php" method="POST">
                        <ul class="pull-right-md">

                            <li>
                         	<!-- <input type="text" name="coupon" placeholder="Enter Coupon Code"> -->
                         	<button type="button" class="modal-button" data-toggle="modal" data-target="#myModal">Enter Coupon Code</button>
                            </li>
                           

                            <li>
                             <?= $coupon_success; ?>
                            </li>

                            <li>
                                <h3>Total</h3>
                            </li>
                            <li>

                    
                    <?php if(!empty($_SESSION['coupon_amount']) AND $_SESSION['totalAmt'] >= $_SESSION['min_amount']  ){
                                  
                                   
	                                  $total_items_amount = $_SESSION['totalAmt']; //* (1-$_SESSION['coupon_amount']);
	                                  $total_desc = "Coupon Applied";
	                                  //$_SESSION['totalAmt'] = $total_items_amount;
	                                  //$_SESSION['coupon_amount'] = 0;
	                           

                            }elseif (!empty($_SESSION['coupon_amount']) AND  $_SESSION['totalAmt'] < $_SESSION['min_amount'] ) {

                                      $total_items_amount = $_SESSION['totalAmt'];
                                      $total_desc = "Total Amount is below the minimum requirement. Please add more product";
                                  }else{
                                     
                                      $total_items_amount = $_SESSION['totalAmt'];
                                  }   

                            ?>
                           <?php if($_SESSION['country']== 1){?>
                                <h4 class="price">GHS <?= number_format($_SESSION['totalAmt'],2)?></h4>
                                 <?= $total_desc; ?>
                            <?php }elseif ($_SESSION['country'] == 2) { ?>

                                <h4 class="price">&#36 <?= number_format($_SESSION['totalAmt'],2)?></h4>
                                  <?= $total_desc; ?>
                           <?php 
                            }?>
                            </li>
                            <li>
                               <button class="but1" type="submit">Checkout</button>

                            </li>

                        </ul>
                    </form>

                    </div>

                </div>

            </div>

            <div class="container visible-xs">

                <div class="row">

                    <div class="col-xs-12">

                        <h3>Summary</h3>

                        <ul class="summary">

                            <li>
                            <!-- <input type="text" name="coupon" placeholder="Enter Coupon Code"> -->
                            <button type="button" class="modal-button" data-toggle="modal" data-target="#myModal">Enter Coupon Code</button>
                            </li>
                           

                            <li>
                             <?= $coupon_success; ?>
                            </li>


                            <li class="clearfix">

                                <p class="pull-left">Subtotal:</p>
                                 <?php if($_SESSION['country']== 1){?>

                                <p class="pull-right">GHS <?= number_format($_SESSION['totalAmt'],2)?></p>

                                 <?php } elseif ($_SESSION['country']== 2) { ?>
                                    <p class="pull-right">&#36 <?= number_format($_SESSION['totalAmt'],2)?></p>
                                  <?php 

                                 }
                                 ?>

                            </li>

                            <li class="clearfix">

                                <p class="pull-left">Coupon Discount:</p>
                                <?php if($_SESSION['country']== 1){ ?>

                                <p class="pull-right">GHS <?= $_SESSION['coupon_amount']; ?></p>

                                <?php }elseif($_SESSION['country']== 2){ ?>

                                 <p class="pull-right">&# <?= $_SESSION['coupon_amount']; ?></p>

                                <?php }?>

                            </li>

                            <li class="divider"></li>

                            <li class="clearfix">

                         <?php if($_SESSION['country']== 1){?>
                                <h4 class="price">GHS <?= number_format($_SESSION['totalAmt'],2)?></h4>
                                 <?= $total_desc; ?>
                            <?php }elseif ($_SESSION['country'] == 2) { ?>

                                <h4 class="price">&#36 <?= number_format($total_items_amount,2)?></h4>
                                  <?= $total_desc; ?>
                           <?php 
                            }?>

                            </li>

                        </ul>

                        <br>

            <a href="checkout.php"><button class="but1">Checkout</button></a>

                    </div>

                </div>

            </div>

        </div>
        
        <!--Coupon Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <i class="material-icons" data-dismiss="modal">close</i>
                        <h2>Have a promo code?</h2>
                        <form action="cart.php" method="POST">
                            <div class="form-group">
                                <label for="promo">Promo Code</label>
                                <input type="text" name="promo" class="form-control">
                                <!--<p class="text-danger small">Promo code doesn't exist.</p>-->
                            </div>
                            <button class="btn btn-success" name="coupon">Apply</button>    
                        </form>    
                    </div>
                </div>
            </div>
        </div>
        <!-- End Coupon Modal -->



		<?php require_once("includes/footer.php");?>

        <script>

            $(document).ready(function(){

                $(".coup").click(function(){

                    $(".coup-in").toggleClass("reveal-coup");

                });

                $('#reveal-it').click(function(){

                    $('#reveal-me').toggleClass("hide-me");

                })

            })

        </script>

          <script>
function myFunction(id){
    
 //toastr.success('Product Added to Cart');
      var product_id = id;
      var quantity = document.getElementById(id+"_quantity").value;
      var price = document.getElementById(id+"_price").value;
      var isChild = document.getElementById(id+"_child").value; 
    //alert(isChild);
      $.ajax({
        type:'post',
        url:'adjust_quantity.php',
        data:{
          //item_src:img_src,
          itemID:product_id,
          item_quantity:quantity,
          price:price,
          isChild: isChild
        },
        success:function(response){
        
       
        window.location.replace('cart.php');
        
        }
      });

    
}
</script>

  <script>
function myFunctionm(id){
    
 //toastr.success('Product Added to Cart');
      var product_id = id;
      var quantity = document.getElementById(id+"_quantitym").value;
      var price = document.getElementById(id+"_pricem").value;
      var isChild = document.getElementById(id+"_childm").value;
    // alert(product_id);
      $.ajax({
        type:'post',
        url:'adjust_quantity.php',
        data:{
          //item_src:img_src,
          itemID:product_id,
          item_quantity:quantity,
          price:price,
          isChild: isChild
        },
        success:function(response){
        
       
        window.location.replace('cart.php');
        
        }
      });

    
}

</script>

       


	</body>

</html>



