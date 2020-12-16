<?php require_once("includes/session.php");?>
<?php
   if(count($_SESSION["cart_array"]) < 1 ){
     // REDIRECT 
     echo "<script> window.location.replace('index') </script>";

   }
?>
<?php require_once("includes/connection.php");?>
<?php require_once("includes/function.php");?>


<?php

if(isset($_POST['submit'])){
  echo "Loading, Please wait...";
try{
        $check  = "";

        $fname = htmlentities($_POST['fname']);
        $lname = htmlentities($_POST['lname']);
        $fullname = $fname." ".$lname;
        $_SESSION['fullname'] = $fullname;
        $company_name = htmlentities($_POST['company_name']);
        $email = htmlentities($_POST['email']);
        $_SESSION['email'] = $email;
        $phone = htmlentities($_POST['phone']);
        $country = htmlentities($_POST['country']);
        $address = htmlentities($_POST['address']);
        $apartment = htmlentities($_POST['apartment']);
        $city = htmlentities($_POST['city']);
        $state = htmlentities($_POST['state']);
        $zip = htmlentities($_POST['zip']);
        $date = date('Y-m-d');

       //############################# CHECK USER  ##########################//

         $sql = "SELECT * from customer_tb WHERE fname = :fname  AND phone = :phone AND email = :email ORDER BY ID DESC limit 1";
 
                   // QUERY
                    $q = $conn->prepare($sql);
                    // SET PARAMETERS
                    $q->bindParam(':fname', $fname);
                   // $q->bindParam(':date', $date);
                    $q->bindParam(':phone', $phone);
                    $q->bindParam(':email', $email);
                   // EXECUTE
                   $q->execute();
                   // FETCH RESULT
                   $q->setFetchMode(PDO::FETCH_ASSOC);

                   while ($row = $q->fetch()):
              
                   $check = $row['id'];
                   $customer_id = $row['id'];
             
                   endwhile;

   //####################### CHECK USER ##########################//


      if($check == ""){

     $stmt = $conn->prepare("INSERT INTO customer_tb(fname,  lname, company_name, email, phone, country, address, apartment, city, state, zip, date)
    VALUES(:fname, :lname, :company_name, :email, :phone, :country, :address, :apartment, :city, :state, :zip, :date)");

    
        // SET PARAMETERS
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':company_name', $company_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':apartment', $apartment);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':zip', $zip);
        $stmt->bindParam(':date', $date);
        // EXECUTE
        $stmt->execute();


        //############################# GET CURRENT ID ##########################//

         $sql = "SELECT * from customer_tb WHERE fname = :fname AND date = :date AND phone = :phone AND email = :email ORDER BY ID DESC limit 1";
 
                   // QUERY
                    $q = $conn->prepare($sql);
                    // SET PARAMETERS
                    $q->bindParam(':fname', $fname);
                    $q->bindParam(':date', $date);
                    $q->bindParam(':phone', $phone);
                    $q->bindParam(':email', $email);
                   // EXECUTE
                   $q->execute();
                   // FETCH RESULT
                   $q->setFetchMode(PDO::FETCH_ASSOC);
                   $customer_id = 0;
                   while ($row = $q->fetch()):
              
                   $customer_id = $row['id'];
             
                   endwhile;

                  // SUCCESS MESSAGE
     //####################### GET CURRENT ID ##########################//
 }

//#################  ORDER TABLE ###################################//

         
    
           $stmt = $conn->prepare("INSERT INTO order_tb(customer_id, customer_name, phone_number, quantity, ship_to, date, time, totalamount, payment_method, complete_status, email, ship_code, country, coupon_code, coupon_amount, shipping_amt, tracking_code)
     
   VALUES(:customer_id, :customer_fullname, :phone, :quantity, :ship_to, :date, :time, :totalamount, :payment_method, :complete_status, :email, :ship_code, :country, :coupon_code, :coupon_amount, :shipping_amt, :tracking_code)");

        $fname = htmlentities($_POST['fname']);
        $lname = htmlentities($_POST['lname']);
        $customer_fullname = $fname."  ".$lname;
        $phone = htmlentities($_POST['phone']);
        $quantity = count($_SESSION["cart_array"]);
        
        if(!empty($_POST['fullname'])){

        $delivery_fullname = htmlentities($_POST['fullname']);
        $delivery_address = htmlentities($_POST['ship_address']);
        $email = htmlentities($_POST['ship_email']);
        $delivery_phone = htmlentities($_POST['ship_phone']);
        $delivery_country = htmlentities($_POST['country']);
        //$delivery_state = htmlentities($_POST['ship_state']);
        $ship_apartment = htmlentities($_POST['ship_apartment']);
        $ship_city = htmlentities($_POST['city']);
        $ship_state = htmlentities($_POST['ship_state']);
        $ship_zip = htmlentities($_POST['ship_zip']);

        $ship_to = $delivery_fullname." ".$delivery_address." ".$ship_apartment." ".$delivery_country." ".$delivery_phone." ".$email." ".$ship_city." ".$ship_state." ".$ship_zip;

         }else{

        $delivery_fullname = $customer_fullname;
        $delivery_address = htmlentities($_POST['address']);
        $email = htmlentities($_POST['email']);
        $delivery_phone = htmlentities($_POST['phone']);
        $delivery_country = htmlentities($_POST['country']);
        $delivery_state = htmlentities($_POST['state']);
        $ship_apartment = htmlentities($_POST['apartment']);
        $ship_city = htmlentities($_POST['city']);
        $ship_state = htmlentities($_POST['state']);
        $ship_zip = htmlentities($_POST['zip']);

         $ship_to = $delivery_fullname." ".$delivery_address." ".$ship_apartment." ".$delivery_country." ".$delivery_phone." ".$email." ".$ship_city." ".$ship_state." ".$ship_zip;

         }

         $date = date('Y-m-d');
         $time = date("h:m:s");
         $tracking_code = "";
         //$totalamount =  $_SESSION['totalAmt'];
         
         $payment_method = htmlentities($_POST['payment_method']);
         $complete_status = "Pending" ;  
         $_SESSION['ship_email'] = $email;
         $ship_code = "";
         $country = $_SESSION['country'];
          if(count($_SESSION['coupon_code']) >= 1 ){
            $coupon_code = $_SESSION['coupon_code']; 
          }else{
           $coupon_code = ""; 
          }
         

         $shipping_amount = $_POST['shipping_amount'];
         $_SESSION['shipp_amount'] = $shipping_amount;
         $coupon_total_amount = $_POST['coupon_total_amount']; 
         $totalamount =  ($_SESSION['totalAmt'] + $shipping_amount) - $coupon_total_amount ;
         

        // SET PARAMETERS
        $stmt->bindParam(':customer_id', $customer_id);
        $stmt->bindParam(':customer_fullname', $customer_fullname);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':ship_to', $ship_to);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':totalamount', $totalamount);
        $stmt->bindParam(':payment_method', $payment_method);
        $stmt->bindParam(':complete_status', $complete_status);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':ship_code', $ship_code);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':coupon_code', $coupon_code);
        $stmt->bindParam(':coupon_amount', $coupon_total_amount);
        $stmt->bindParam(':shipping_amt', $shipping_amount);
        $stmt->bindParam(':tracking_code', $tracking_code);
        // EXECUTE
        $stmt->execute();
           

       //############################# GET CURRENT ID ##########################//

         $sql = "SELECT * from order_tb WHERE customer_id = :customer_id AND date = :date AND phone_number = :phone AND time = :time ORDER BY id DESC limit 1";
 
                   // QUERY
                    $q = $conn->prepare($sql);
                    // SET PARAMETERS
                    $q->bindParam(':customer_id', $customer_id);
                    $q->bindParam(':date', $date);
                    $q->bindParam(':phone', $phone);
                    $q->bindParam(':time', $time);
                   // EXECUTE
                   $q->execute();
                   // FETCH RESULT
                   $q->setFetchMode(PDO::FETCH_ASSOC);
                   $order_id = 0;
                   while ($row = $q->fetch()):

                   $order_id = $row['id'];
                   $_SESSION['order_id'] = $row['id'];
             
                   endwhile;

                  // SUCCESS MESSAGE
   //####################### GET CURRENT ID ##########################//


//#################  END OF ORDER TABLE #############################//
          
          // FOR SHIPPING ONLY
     $fullname = htmlentities($_POST['fullname']);
     if(!empty($fullname)){  
        
         $stmt = $conn->prepare("INSERT INTO shipping_tb(fullname,  ship_address, ship_email, ship_apartment, ship_phone, ship_country, ship_city, ship_state, ship_zip, secret_code, customer_id, date)
     
    VALUES(:fullname, :ship_address, :ship_email, :ship_apartment, :ship_phone, :ship_country, :ship_city, :ship_state, :ship_zip, :secret_code, :customer_id, :date)");

        $fullname = htmlentities($_POST['fullname']);
        $ship_address = htmlentities($_POST['ship_address']);
        $ship_email = htmlentities($_POST['ship_email']);
        $ship_apartment = htmlentities($_POST['ship_apartment']);
        $ship_phone = htmlentities($_POST['ship_phone']);
        $ship_country = htmlentities($_POST['ship_country']);
        $ship_city = htmlentities($_POST['ship_city']);
        $ship_state = htmlentities($_POST['ship_state']);
        $ship_zip = htmlentities($_POST['ship_zip']);
        $secret_code = htmlentities($_POST['secret_code']);
        $date = date('Y-m-d');

        // SET PARAMETERS
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':ship_address', $ship_address);
        $stmt->bindParam(':ship_email', $ship_email);
        $stmt->bindParam(':ship_apartment', $ship_apartment);
        $stmt->bindParam(':ship_phone', $ship_phone);
        $stmt->bindParam(':ship_country', $ship_country);
        $stmt->bindParam(':ship_city', $ship_city);
        $stmt->bindParam(':ship_state', $ship_state);
        $stmt->bindParam(':ship_zip', $ship_zip);
        $stmt->bindParam(':secret_code', $secret_code);
        $stmt->bindParam(':customer_id', $customer_id);
        $stmt->bindParam(':date', $date);
        // EXECUTE
        $stmt->execute();

        //######################## INSERT INTO SHIPPING TABLE ##########################//
   }

  // ########################  ORDER PRODUCT #############################//
     
     if($customer_id >= 1 && $order_id >= 1){

     if(!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"])< 1){

 
       }else{

        // $i =0;
        foreach($_SESSION["cart_array"] as  $each_item){
        $item_id = $each_item['item_id'];
        $quantity = $each_item['quantity'];
        $price = $each_item['price'];
        $attribute = 0;
        
         //New Additions
         if($each_item['child']){
              $child = 1;
         }else{
              $child = 0;
         }
         //End new additions

        $stmt = $conn->prepare("INSERT INTO order_product_tb(quantity, product_id, client_id, order_id, attribute, price, child)
     
    VALUES(:quantity, :item_id, :customer_id, :order_id, :attribute, :price, :child)");

        $_SESSION["order_id"] = $order_id;
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':item_id', $item_id);
        $stmt->bindParam(':customer_id', $customer_id);
        $stmt->bindParam(':order_id', $order_id);
        $stmt->bindParam(':attribute', $attribute);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':child', $child);
       
        // EXECUTE
        $stmt->execute();

        }

}

}

  // ######################     ORDER PRODUCT ############################//
        

        // $message = $customer_id." New records created successfully";
             if($payment_method == "hubtel"){

      echo "<script> window.location.replace('mpowerv2.php') </script>";

             }elseif($payment_method == "paypal"){
			 
             echo "<script> window.location.replace('paypal.php') </script>";

			     }else{
				 
		  echo "<script> window.location.replace('complete_order.php') </script>";

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



<!DOCTYPE html>
<html>

	<head>
		<!-- Website Title & Description for Search Engine purposes -->
		<title>Haute Vie - Checkout</title>
        <link rel="shortcut icon" type="image/jpg" href="images/favicon.jpg">
        <meta charset="utf-8">
		<meta name="description" content="">
		<!-- Mobile viewport optimized -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!-- Bootstrap CSS -->

		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-glyphicons.css" rel="stylesheet">

		<!-- Custom CSS -->

		<link href="css/global-styles.css" rel="stylesheet">
		<link href="css/checkout-styles.css" rel="stylesheet">
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
	</head>

	<body>

        <?php require_once("includes/header.php");?>

        <div class="checkout">

            <div class="container">

                <div class="row">

                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

                        <div class="panel panel-1 panel-with-form">

                            <div class="panel-heading">

                                <h3>Delivery <?= $message;?></h3>

                            </div>

                            <div class="panel-body">

                                <h4>Delivery Address</h4>

                                        <form  action="checkout.php" method="POST">

                                    <div class="row">

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">

                                            <label>First Name *</label>

                                            <input type="text" name="fname" class="form-control" required>

                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">

                                            <label>Last Name *</label>

                                            <input type="text" name="lname" class="form-control" required>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                       <!-- <label>Company Name</label>-->

                                        <input type="hidden" name="company_name" value="" class="form-control">

                                    </div>

                                    <div class="row">

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">

                                            <label>Email Address *</label>

                                            <input type="email" name="email" class="form-control" required>

                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">

                                            <label>Phone *</label>

                                            <input type="text" name="phone" class="form-control" required>

                                        </div>

                                    </div>
                           <?php if($_SESSION['country'] == 1){ ?>


                             <?php
                                      
                            try {
                            $type = 1;
                            $sql = "SELECT * from country_tb WHERE type = '$type' ";
                            $q = $conn->query($sql);
                            $q->setFetchMode(PDO::FETCH_ASSOC);
                           
                                // $id = $row['id'];
                       
                                } catch (PDOException $e) {
                                    die("Could not connect to the database $dbname :" . $e->getMessage());
                                }
                              ?>

                              <input type="hidden" name="city" class="form-control"  id="domestic_city" required>

                                    <div class="form-group">

                                       <label>Town / City *</label>
                                  
                                      <select name="" class="form-control" id="zonechecked"  <?php if($_SESSION['coupon_type'] != "Delivery"): ?> onchange="myFunction()"  <?php endif; ?> required >
                                         <option value="">None</option>
                                        <?php   while ($row = $q->fetch()):  ?>
                                        <option value="<?= $row['zone'];?>"><?= $row['country']; ?></option>
                                         <?php endwhile; ?>
                                      </select>
                                    </div>

                                        <input type="hidden" name="country" class="form-control"  value="Ghana">


                        <?php }else if($_SESSION['country'] == 2){ ?>
                             
                              <input type="hidden" name="country" class="form-control"  id="domestic_city">

                               <?php
                            $type = 2;    
                            try {
                           
                            $sql = "SELECT * from country_tb WHERE type = '$type' ";
                            $q = $conn->query($sql);
                            $q->setFetchMode(PDO::FETCH_ASSOC);
                           
                                // $id = $row['id'];
                       
                                } catch (PDOException $e) {
                                    die("Could not connect to the database $dbname :" . $e->getMessage());
                                }
                              ?>
                                    <div class="form-group">

                                        <label>Country *</label>
                                  
                                      <select name="" class="form-control" id="zonechecked" onchange="myFunction()" required>
                                         <option value="">None</option>
                                        <?php   while ($row = $q->fetch()):  ?>
                                        <option value="<?= $row['zone'];?>"><?= $row['country']; ?></option>
                                         <?php endwhile; ?>
                                      </select>
                                    </div>

                                     <div class="form-group">

                                        <label>Town / City *</label>

                                        <input type="text" name="city" class="form-control" required >
                                   </div>

                        <?php }?>
                            


                                    <div class="form-group">

                                        <label>Address *</label>

                                        <input type="text" name="address" class="form-control" placeholder="Street address" required>

                                    </div>

                                    <div class="form-group">

                                        <input type="text" name="apartment" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">

                                    </div>

                                   

                                    <div class="row">

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">

                                            <label>State </label>

                                            <input type="text" name="state" class="form-control">

                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">

                                            <label>Postcode / ZIP</label>

                                            <input type="text" name="zip" class="form-control">

                                        </div>

                                    </div>

                                    <div class="checkbox" style="display:none">

                                        <label style="font-size: 15px;">
                                        <input type="checkbox" value="checked" class="to-ship" checked style="margin-top: 6px;" id="check_shipping" onchange="myFunction()"><strong>Shipping address same as billing</strong></label>

                                    </div>

                               

                         <div class="ship hide-me" style="padding-top: 10px;">

                     <h3>Shipping Address</h3>

                                  

                                        <div class="row">

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">

                      <label>Full Name *</label>

                    <input type="text" name="fullname" class="form-control" >

                                            </div>


                                        </div>

                                       <div class="form-group">

                                            <label>Address *</label>

                                            <input type="text" name="ship_address" class="form-control" placeholder="Street address" >

                                        </div>

                                        <div class="form-group">

                                            <input type="text" name="ship_apartment" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">

                                        </div>

                                       <!-- <div class="form-group">

                            <label>Company Name</label>

                                            <input type="text" name="" class="form-control">

                                        </div> -->

                                        <div class="row">

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">

                                                <label>Email Address *</label>

                                                <input type="email" name="ship_email" class="form-control" >

                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">

                                                <label>Phone *</label>

                                                <input type="text" name="ship_phone" class="form-control" >

                                            </div>

                                        </div>
                     <?php if($_SESSION['country'] == 1){ ?>

                         
                           <?php
                                      
                            try {
                            $type = 1;
                            $sql = "SELECT * from country_tb WHERE type = $type ";
                            $q = $conn->query($sql);
                            $q->setFetchMode(PDO::FETCH_ASSOC);
                           
                                // $id = $row['id'];
                       
                                } catch (PDOException $e) {
                                    die("Could not connect to the database $dbname :" . $e->getMessage());
                                }
                              ?>
                                    <div class="form-group">

                                        <label>Town / City *</label>
                                  
                                      <select name="" class="form-control" id="zone" onchange="myFunction()"  required >
                                         <option >None</option>
                                        <?php   while ($row = $q->fetch()):  ?>
                                        <option value="<?= $row['zone'];?>"><?= $row['country']; ?></option>
                                         <?php endwhile; ?>
                                      </select>
                                    </div>

                        <input type="hidden" name="country" class="form-control" value="Ghana" >


                    <?php  }elseif ($_SESSION['country'] == 2) { ?>


                         <?php
                                      
                            try {
                           $type = 2;
                            $sql = "SELECT * from country_tb WHERE type = '$type' ";
                            $q = $conn->query($sql);
                            $q->setFetchMode(PDO::FETCH_ASSOC);
                           
                                // $id = $row['id'];
                       
                                } catch (PDOException $e) {
                                    die("Could not connect to the database $dbname :" . $e->getMessage());
                                }
                              ?>
                                    <div class="form-group">

                                        <label>Country *</label>
                                  
                                      <select name="" class="form-control" id="zone" onchange="myFunction()" >
                                         <option value="">None</option>
                                        <?php   while ($row = $q->fetch()):  ?>
                                        <option value="<?= $row['zone'];?>"><?= $row['country']; ?></option>
                                         <?php endwhile; ?>
                                      </select>
                                    </div>
                                     

                                        <div class="form-group">

                                            <label>Town / City *</label>

                                    <input type="text" name="city" class="form-control" >

                                        </div>
                       
                                <?php   } ?>
                                       
                            

                                        <div class="row">

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">

                                                <label>State</label>

                                                <input type="text" name="ship_state" class="form-control">

                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">

                                                <label>Postcode / ZIP</label>

                                                <input type="text" name="ship_zip" class="form-control">

                                            </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">

         <label>Security access code:</label>

 <input type="text" name="secret_code" class="form-control" placeholder="e.g. Access code '123' or 'Buzzer -#504' or 'Key' or 'Smart Card'">

                    </div>


                                        </div>

                                   

                                </div> 

                            </div>

                        </div>

                        <div class="panel panel-1">

                            <div class="panel-heading">

                                <h3>Payment Option</h3>

                            </div>

                            <div class="panel-body">
                               <?php if($_SESSION['country'] == 1){?>
                                <!-- <div class="pay-opt">

                                    <label><input type="radio" value="pay on delivery" name="payment_method"> Pay on Delivery</label>

                                </div>

                                <div class="pay-opt">

                                    <label><input type="radio" value="hubtel" name="payment_method"> Pay by Hubtel</label>

                                </div> 
                              
                                <div class="pay-opt">
                                    <label style="display:block;"><input type="radio" value="pay on delivery" name="payment_method" required=""> Pay on Delivery <i class="fa fa-truck pull-right" style="font-size: 24px;"></i></label>
                                </div>
                                  -->
                              
                                
                                <div class="pay-opt">
                                    <label style="display:block;"><input type="radio" value="hubtel" name="payment_method" required=""> Pay with Mobile Money / Debit Card <img src="images/plans-grayscale.png" style="margin-left:10px;max-height:21px;"></label>
                                </div>
                                
							   <?php }else{?>

                                

                                <div class="pay-opt">
                                    <label style="display:block;"><input type="radio" value="paypal" name="payment_method" required=""> Pay by Paypal <img src="images/paypal1.png" style="margin-left:10px;max-height:21px;float:right;"></label>

                                </div>
                <?php } ?>

    

                            </div>

                        </div>

                        

                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                       

                        <div class="panel">

                            <div class="panel-body">

                                <div class="clearfix">

                 <p class="smally pull-left"><?= count($_SESSION["cart_array"]);?> Item(s) </p>

                                    <a href="cart.php" class="edit pull-right">EDIT BAG</a>

                                </div>

                            </div>

                            <div class="panel-footer">

                                <ul class="items">
			                <?php
			
			                foreach($_SESSION["cart_array"] as  $each_item){
			                $item_id = $each_item['item_id'];
			                $quantity = $each_item['quantity'];
			                $price = $each_item['price'];
			                
			                
			                 //New Additions
			                if($each_item['child']){
			                $sql = "SELECT * from product_tb  WHERE id = $item_id LIMIT 1";
			                	
			                }else{
			                	$sql = "SELECT * from product_tb  WHERE id = $item_id LIMIT 1";
			                }
			                //End new additions
						     
			                    //$sql = "SELECT * from product_tb  WHERE id = $item_id LIMIT 1";
			                    $q = $conn->query($sql);
			                    $q->setFetchMode(PDO::FETCH_ASSOC);
			
			                     while ($row = $q->fetch()): 
			
			             $totalweight = $totalweight + $row['weight'];
			 
			                            ?>  
	                                <li>
		                    	    <div class="media">
						<div class="media-left">
							<img src="<?= $row['img1'];?>" class="media-object" style="height: 90px; width: 70px; object-fit: cover;">
						</div>
					  	<div class="media-body">
					    		<h4 style="margin-top:0px;margin-bottom:10px;font-size:16px;"><?= ucwords($row['title']);?></h4>
					    		<p style="font-size: 13px;margin-bottom:10px;">
					                        <?php $str = strip_tags(decode_entities($row["content"]));
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
							        <p class="small pull-left">
							        	QTY: <?= $quantity; ?> X GHS
							        	<?php
							        	    if($row['sales_gh'] > 0){
							        	     	$single_price = $row['sales_gh'];
							        	       	echo number_format($single_price,2);
                                                 $total_amount_cost = $quantity * $single_price;
							        	    }else{
							        	      	$single_price = $row['regular_gh'];
							        	      	echo number_format($single_price,2);
                                                 $total_amount_cost = $quantity * $single_price;
							        	    } 
							    	    ?>
							        </p>

							 <p class="pull-right" style="font-weight: 600;">GHS <?= number_format($total_amount_cost,2); ?></p>

							    <?php }elseif($_SESSION['country'] == 2){ ?>
							        <p class="small pull-left">
							            QTY: <?= $quantity; ?> X &#36 
							            <?php
							                if($row['sales_us'] > 0){
                        
							                    $single_price = $row['sales_us'];
							                    echo number_format($single_price,2);
                                                $total_amount_cost = $quantity * $single_price;

							                }else{

							                    $single_price = $row['regular_us'];
							                    echo number_format($single_price,2);
                                                $total_amount_cost = $quantity * $single_price;


							                }
							            ?>      
							        </p>

						<p class="pull-right" style="font-weight: 600;">&#36  <?= number_format($total_amount_cost,2); ?></p>


							    <?php } ?>
						          </div>
				                       </div>
					  	</div>
			                
       					       <!--  <p class="small">SIZE: <?= $row['size'];?></p>-->		   
                        		       <!--    <p class="text-danger">Item available in stock</p>-->
   				</li>
                        <?php
                    endwhile;

                    }
                    ?>

                                    

                                </ul>

                            </div>

                        </div>

                         <div class="panel panel-1">

                            <div class="panel-heading text-center">

                                <h3>Order Summary </h3>

                            </div>
                            <div class="panel-body">

                                <div class="clearfix">

                        <h3 class="pull-left">Total Item(s):</h3>
                              

                 <p class="pull-right tt"><strong><?= count($_SESSION["cart_array"]);?></strong></p>

        
                                

                                </div>

                            </div>

                            <div class="panel-body">

                                <div class="clearfix">

                                    <h3 class="pull-left">Sub Total:</h3>
                               <?php if($_SESSION['country'] == 1){?>

                                    <p class="pull-right tt"><strong>GHS <?= number_format($_SESSION['totalAmt'],2); ?></strong></p>

                                <?php }elseif ($_SESSION['country'] == 2) { ?>
                                  
                                   <p class="pull-right tt"><strong>&#36  <?= number_format($_SESSION['totalAmt'],2); ?></strong></p>

                                <?php 
                                }

                                ?>

                                </div>

                            </div>

                            <div class="panel-body">

                                <div class="clearfix">

                        <h3 class="pull-left">Shipping:</h3>
                             
      <p class="pull-right tt"><strong id="ship_amt">GHS 33</strong></p>
                                </div>
          
                            </div>
                          <?php if(!empty($_SESSION['coupon_amount']) AND $_SESSION['totalAmt'] >= $_SESSION['min_amount'] AND $_SESSION['coupon_amount'] != 0){  ?>

                       <div class="panel-body">
                                <div class="clearfix">
                        <h3 class="pull-left">Coupon :</h3>
                             <?php 

                             $coupon_amount = $_SESSION['coupon_amount'];
                               

                              ?>
      <p class="pull-right tt"><strong><?= $_SESSION['coupon_amount']*100; ?>% Discount</strong></p>
                                </div>
                            </div>
                <?php 
                     }
                    
                    ?>

                        <div class="panel-body">

                          <div class="clearfix">

                        <h3 class="pull-left">Total Amount:</h3>
                             
                             <?php if($_SESSION['country'] == 1){?>

                                    <p class="pull-right tt"><strong>GHS <span id="net_amt_1"><?php
                                      $total_amount = $_SESSION['totalAmt'];
                                     echo number_format($total_amount,2); 
                                     ?></span></strong></p>


                                <?php }elseif ($_SESSION['country'] == 2) { ?>
                                  
                                   <p class="pull-right tt"><strong>&#36 <span id="net_amt_2">  
                                    <?php
                                      $total_amount = $_SESSION['totalAmt'];
                                     echo number_format($total_amount,2); 

                                     ?></span>
                                   </strong></p>

                                <?php 

                                }

                                ?>
                              </div>

                        </div>
<input type="hidden" id="shipping_qty" value="<?= $totalweight;?>">
<input type="hidden" id="shipping_total_amount" value="<?= $total_amount;?>">

<input type="hidden" name="shipping_amount" id="shipping_amount" value="<?= 0.0;?>">
<input type="hidden" name="coupon_total_amount" value="<?= $coupon_amount; ?>">
<input type="hidden" id="sel_country" value="<?= $_SESSION['country']; ?>">

                         

                           <!-- <div class="panel-footer">

                                <p>Abeni Darego</p>

                                <p>21, Nii Amon Street, East-Legon, Accra-Ghana.</p>

                                <br>

                                <p><strong>Pay by delivery.</strong></p>

                            </div> -->

                        </div>
                        
                        <!--<button type="button" class="modal-button" data-toggle="modal" data-target="#myModal">Enter Coupon Code</button>-->

                         <button class="conf" type="submit" name="submit">CONFIRM ORDER</button>

                    </div>

                </div>

            </div>

        </div>
 </form>
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

        <script type="text/javascript">

            $(document).ready(function(){
              
                myFunction();

                var ship = $('.to-ship');

                ship.click(function(){

                    if (ship.is(':checked')) {

                        $('.ship').addClass('hide-me');

                    } 

                    else {

                        $('.ship').removeClass('hide-me');

                    }

                })

            })

        </script>

        <script>
          function myFunction(){

                    var ship = $('.to-ship');

                    if (ship.is(':checked')) {

                  var zone = document.getElementById("zonechecked").value;
                  var e = document.getElementById("zonechecked");
                  var strUser = e.options[e.selectedIndex].text;
                  document.getElementById("domestic_city").value = strUser;
                  
                    } else {
                 
                  var zone = document.getElementById("zone").value;
                  var e = document.getElementById("zone");
                  var strUser = e.options[e.selectedIndex].text;
                  document.getElementById("domestic_city").value = strUser;
                  //alert(strUser);
                    }

      var shipping_qty = document.getElementById("shipping_qty").value;
      var shipping_total_amount = document.getElementById("shipping_total_amount").value;
      var sel_country = document.getElementById("sel_country").value;
      
     // var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
      
    if(zone != ""){

         $.ajax({
        type:'post',
        url:'shipping_cost.php',
        data:{
          //item_src:img_src,
          zone:zone,shipping_qty:shipping_qty
         
        },
        success:function(response){
         var net_cost = parseFloat(shipping_total_amount) + parseFloat(response);
            if(sel_country == 1 ){

        document.getElementById("ship_amt").innerHTML = "Ghs " +response;
        document.getElementById("net_amt_1").innerHTML = parseFloat(net_cost).toFixed(2);
        document.getElementById("shipping_amount").value = response;

            }else if(sel_country == 2){
         
        document.getElementById("ship_amt").innerHTML = "$ "+response;
        document.getElementById("net_amt_2").innerHTML = parseFloat(net_cost).toFixed(2);
        document.getElementById("shipping_amount").value = response;

            }// end of if statement

         //alert(response);
        //window.location.replace('cart.php');
         //toastr.success('Thank you for Subscribing!');
          //document.getElementById("email").value = "";

        }
      });


         
          
      }else{
            
             document.getElementById("ship_amt").innerHTML = "";

         if(sel_country == 1 ){

       document.getElementById("net_amt_1").innerHTML = shipping_total_amount.toFixed(2);

               }else if(sel_country == 2 ){
             
       document.getElementById("net_amt_2").innerHTML = shipping_total_amount.toFixed(2);
            
               }
      }// end of if statement
     
    
}
</script>

	</body>

</html>



