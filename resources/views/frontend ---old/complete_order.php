<?php require_once("includes/session.php");?>
<?php
   if(empty($_SESSION["fullname"]) && empty($_SESSION["order_id"])){
     // REDIRECT 
     echo "<script> window.location.replace('index') </script>";

  }

?>
<?php require_once("includes/connection.php");?>
<?php require_once("includes/function.php");?>

<?php
require 'vendor/autoload.php';
use Mailgun\Mailgun;
# First, instantiate the SDK with your API credentials
$mg = Mailgun::create('key-8c3cce87820d5d19025f90a7e40b8296');
?>

<?php  if(isset($_SESSION['order_id'])){

$order_id = preg_replace('#[^0-9]#', '', $_SESSION['order_id']);

                    try {
                   
                
                    $sql = "SELECT * from order_tb WHERE id = $order_id ";
                    $q = $conn->query($sql);
                    $q->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $q->fetch()):
                      
                     $id = $row['id']; 
                     $customer_id = $row['customer_id'];
                     $name= $row['customer_name'];
                     $phone_number= $row['phone_number'];
                     $quantity= $row['quantity'];
                     $ship_to = $row['ship_to'];
                     $date= $row['date'];
                     $time= $row['time'];
                     $totalamount= $row['totalamount'];
                     $payment_method = $row['payment_method'];
                     $complete_status= $row['complete_status'];
                     $email= $row['email'];
                     $ship_code= $row['ship_code'];
                     $country= $row['country'];
                     $coupon_code= $row['coupon_code'];
                     $coupon_amount= $row['coupon_amount'];
                     $shipping_amt= $row['shipping_amt'];
                     $tracking_code= $row['tracking_code'];

                    endwhile;
                      
               
                    } catch (PDOException $e) {
                            die("Could not connect to the database $dbname :" . $e->getMessage());
                    }


        ############################# COUPON USAGED #############################################

        $stmt = $conn->prepare("UPDATE coupon_tb SET  usaged = :usaged ,date_used = :date_used WHERE coupon_code = :id");
        $date_used = date('Y-m-d');
        $usaged =  $_SESSION['usaged'] + 1;
       
        // SET PARAMETERS
        $stmt->bindParam(':usaged', $usaged);
        $stmt->bindParam(':date_used', $date_used);
        $stmt->bindParam(':id', $_SESSION['coupon_code']);

        // EXECUTE
        $stmt->execute();

        ############################# COUPON USAGED #############################################



 $total_amount_memory = $totalamount;
 $emails = array();
 $emails[] = $email;
 $emails[]  = "hello@hvafrica.com";
// specify your email here
foreach($emails as $key => $email){
    $totalamount = $total_amount_memory;
    $to = $emails[$key];
    $from = 'sales@hvafrica.com';
    $subject = 'Your Order Confirmation ';

    $body ='
<html>
    <head>
        <title></title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet">

        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <style type="text/css">
            * {
                box-sizing: border-box;
            }

            body {
                height: 100vh;
                overflow-x: hidden;
                font-family: "Roboto", sans-serif;
                line-height: 1.5em;
                font-size: 14px;
                margin: 0px;
                color: #646464;
            }

            .wrapper {
                width: 960px;
                margin-left: auto;
                margin-right: auto;
                padding: 7vh 15px;
            }

            table, th, td {
                border: 1px solid #e7e7e7;
                border-collapse: collapse;
            }

            th {
                font-weight: 400;
                padding: 15px;
                font-size: 16px;
                text-align: left;
            }

            td {
                padding: 7px 10px; 
                text-align: left;
                vertical-align: top;   
            }

            td img {
                max-height: 70px;
            }

            .text-center {
                text-align: center;
            }

            .text-right {
                text-align: right;
            }

            .total {
                background: #f8f8f8;
                font-weight: 600;
            }

            .width-2 {
                float:left;
                width: 30%;
                padding: 15px 15px 15px 0px;
            }

            .width-2 h4 {
                margin-bottom: 0px;
                font-size: 14px;
            }

             .width-3 {
                float:right;
                width: 30%;
                padding: 15px 15px 15px 0px;
            }

            .width-3 h4 {
                margin-bottom: 0px;
                font-size: 14px;
            }

            .small {
                font-size: 12px;
                margin-top: 0px;
            }

            .bord-top {
                margin-top: 60px;
                border-top: 1px solid #e7e7e7;
                padding: 0px 15px;
            }

            .width-1 {
                width: 30%;
                display: inline-grid;
                padding:15px 0px 20px 0px;
            }

            .width-1 h3 {
                margin-top: 0px;
                margin-bottom: 5px;
                font-size: 18px;
            }

            .width-1 p {
                margin-top: 0px;
                margin-bottom: 0px;
            }

            .material-icons {
                font-size: 12px;
            }

        </style>

    </head>

    <body>
        <div class="wrapper">
            <div class="text-center">
            <img src="https://hvafrica.com/images/black-logo.png" width="70px" height="70px">

                <h2 style="margin-top: 0px;margin-bottom: 5px;border-bottom: 1px solid #e7e7e7;padding-bottom: 20px; font-size:16px">INVOICE # '.$id.'</h2>
            </div>
            <div>
                <div class="width-1">
                    <h3>'.ucwords($name).'</h3>
                    <p class="small" style="font-weight: 600;">Brief Delivery Address</p>
                    <p class="small">'.ucwords($ship_to).'</p>
                    <p class="small"> Code :'.$ship_code.'</p>
                    <br>
                </div>
                <div class="width-1" style="width: 39%;"></div>
                <div class="width-1">
                    <p class="small">Order Time: '.$time.'</p>
                    <p class="small">Order Date: '.$date.'</p>
                    <p class="small">Payment Method: '.ucfirst($payment_method).'</p>
                    <p class="small">Status: '.$complete_status.'</p>
                    <p class="small">Total Quantity: '.$quantity.' Item(s)</p>
                    <p class="small">Total Amount: '.number_format($totalamount,2).'</p>
                    <p class="small"><i class="material-icons">phone</i> '.$phone_number.'</p>
                    <p class="small"><i class="material-icons">mail</i> '.$email.'</p>
                    <br>
                </div>
            </div>  
            <table style="width:100%">
                <tr>
                    <th></th>
                    <th>PRODUCT</th> 
                    <th class="text-center">QUANTITY</th>
                    <th class="text-right">UNIT</th>
                    <th class="text-right">AMOUNT'; if($country ==1){ $body .= "GHs "; }else if($country ==2){ $body .= "$ " ;} $body .=' </th>
                </tr>';

                         $sql = "SELECT * from order_product_tb WHERE order_id = $order_id ";
                    $q = $conn->query($sql);
                    $q->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $q->fetch()):
                     $product_id = $row['product_id'];
                     $product_quantity = $row['quantity'];
                     $product_price = $row['price'];
                     $isChild = $row['child'];

                    ####### QUERY FOR PRODUCT ######################
                    if($isChild == 0){
	                    $sql_product = "SELECT * from product_tb WHERE id = $product_id ";
                    }else{
	                    $sql_product = "SELECT * from product_tb WHERE id = $product_id ";
                    }
                    
                    $z = $conn->query($sql_product);
                    $z->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row_product = $z->fetch()):
	
                $body .='
                <tr>
            <td class="text-center"><img src="http://hvafrica.com/'.$row_product["img1"].'" width="50px" height = "50px"></td>
                             <td>
                              <p class="font-w600 push-10">'.$row_product["title"].'</p>
                              
                            </td>';
							
							  if($country == 1){ 
						       
							        	    if($row_product['sales_gh'] > 0){
							        	     	$single_price = $row_product['sales_gh'];
							        	       	//echo number_format($single_price,2);
                                                 $total_amount_cost = $product_quantity * $single_price;
							        	    }else{
							        	      	$single_price = $row_product['regular_gh'];
							        	      //	echo number_format($single_price,2);
                                                 $total_amount_cost = $product_quantity * $single_price;
							        	    } 
							    	  
						 
                          $body .='<td class="text-center"><span class="badge badge-primary">'. $product_quantity.'</span></td>
                            <td class="text-right">'. number_format($single_price,2). '</td>';
							
						  }else{ 
						 
						 
							                if($row_product['sales_us'] > 0){
                        
							                    $single_price = $row_product['sales_us'];
							                   // echo number_format($single_price,2);
                                                $total_amount_cost = $product_quantity * $single_price;

							                }else{

							                    $single_price = $row_product['regular_us'];
							                   // echo number_format($single_price,2);
                                                $total_amount_cost = $product_quantity * $single_price;
							                }
							            
						 
						  $body .='<td class="text-center"><span class="badge badge-primary">'.$product_quantity.'</span></td>
                            <td class="text-right">'.number_format($single_price,2).'</td>';
							
						  } 
							
                         
                                      
                               //$total_price =  number_format($product_price) * number_format($product_quantity);
                               $body .= number_format($total_amount_cost,2);

                              $body .= '
                          </td>
                </tr>';  endwhile; endwhile;
				
				
				
				

                 if($shipping_amt >= 1){ $totalamount = $totalamount - $shipping_amt; }

                 if($coupon_amount >= 1){ 
                 $totalamount = $totalamount + $coupon_amount; 
                }
                  
                  $body .='
                
                <tr>

             <td colspan="4" class="text-right">Subtotal</td>
             <td class="text-right">'.number_format($totalamount,2).'</td>
                </tr>';
                    
                    if($shipping_amt >= 1){ $totalamount = $totalamount + $shipping_amt; 

                $body .= '<tr>
                    <td colspan="4" class="text-right">Shipping </td>
                    <td class="text-right">'.number_format($shipping_amt,2).'</td>
                </tr>'; } 

                if($coupon_amount >= 1){  
                    $totalamount = $totalamount - $coupon_amount;
                
                $body .= '<tr>
                    <td colspan="4" class="text-right">Discount</td>
                    <td class="text-right">( '.number_format($coupon_amount,2).' )</td>
                </tr>';
                        }

                $body .= '<tr class="total">
                    <td colspan="4" class="text-right">TOTAL </td>
                    <td class="text-right">'.number_format($totalamount,2).'</td>
                </tr>
            </table>
             <div class="text-center bord-top">
               <!-- <p> Here is your tracking information:
UPS Tracking Number: <a >1ZA769F50311186243</a></p>-->
            </div>
            <div class="width-2">
               <p> Thanks a million for your purchase. Please be on the lookout for emails on shipping and deliveries. For more information on our shipping policy, please visit  <a href="https://hvafrica.com">our website</a></p>
            </div>';
            if($tracking_code == ""){ }else {
          
           $body .= '       
        <div class="width-3">
        <h2><em>Your Order have been shipped</em> </h2>
    <p> <strong>Here is your tracking information:</strong>
   UPS Tracking Number: <a href="#">'.$tracking_code.'</a> </p>
   <p>Please note it may take 24 hours for your tracking number to return any information.</p>
            </div>';

            }


            
         
                          $body .= '   <center>

                            <h5>CONNECT WITH US:</h5>
                     
                    <p>
                                <a href="https://www.facebook.com/hautevieafrica
" target="new">
                                    <img src="https://hvafrica.com/images/fb.png" width="20px" height="20px"> 
                                </a>
                             <span>
                                <a href="https://www.instagram.com/hautevie_africa/
" target="new">
                                     <img src="https://hvafrica.com/images/ig.png" width="20px" height="20px"> 
                                </a>
                             </span>
                              <span>
                             <a href="https://twitter.com/Hautevie_africa
" target="new">
                                   <img src="https://hvafrica.com/images/twitter.png" width="20px" height="20px"> 
                                </a>
                              </span>
                               
                            </p>

                            </center>

            
        </div>
    </body>
</html>';


    // Construct headers of the message
    //$headers = 'From: ' . $from . "\r\n";
    //$headers .= 'Reply-To: ' . $from . "\r\n";

  $mg->messages()->send('hvafrica.com', [
  'from'    => $from,
  'to'      => $to,
  'subject' => $subject,
  'text'    => $subject,
  'html'    => $body
   ]);


    }


}

    ?>
    
    
    <?php 

        /**
         * Function for Slack Notification
         */

        function slack($message, $channel)
        {
            $ch = curl_init("https://slack.com/api/chat.postMessage");
            $data = http_build_query([
                "token" => "xoxp-397466375269-397194186131-404925035027-6ef57b93a62f8f85bad454ff738080ff",
                "channel" => $channel, //"#mychannel",
                "text" => $message, //"Hello, Foo-Bar channel message.",
                "username" => "Coupon Notifier",
            ]);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $result = curl_exec($ch);
            curl_close($ch);
            
            return $result;
        }

        foreach($_SESSION["cart_array"] as  $each_item){

            $item_id = $each_item['item_id'];
            $quantity = $each_item['quantity'];
            $price = $each_item['price'];
            $attribute = 0;
            
             //New Additions: Update quantity for children
             if($each_item['child']){
                $sql = "SELECT * from product_child_tb  WHERE id = $item_id LIMIT 1";
	            $q = $conn->query($sql);
	            $q->setFetchMode(PDO::FETCH_ASSOC);
	
	            while ($row = $q->fetch()): 
	
	            $total_qty = $row['qty'] - $quantity;
	            if( $total_qty < 1){
	                $stock = "Out of stock";
	                $stm = $conn->prepare("UPDATE product_child_tb SET  qty = :total_qty, stock = :stock WHERE id = :id");
	                $stm->bindParam(':total_qty', $total_qty);
	                $stm->bindParam(':stock', $stock);
	                $stm->bindParam(':id', $item_id);
	
	            }else{
	
	                $stm = $conn->prepare("UPDATE product_child_tb SET  qty = :total_qty WHERE id = :id");
	                $stm->bindParam(':total_qty', $total_qty);
	                $stm->bindParam(':id', $item_id);
	
	            }
 // EXECUTE
            $stm->execute();
endwhile;
                	
             }else{
             
	            $sql = "SELECT * from product_tb  WHERE id = $item_id LIMIT 1";
	            $q = $conn->query($sql);
	            $q->setFetchMode(PDO::FETCH_ASSOC);
	
	            while ($row = $q->fetch()): 
	
	            $total_qty = $row['qty'] - $quantity;
	            if( $total_qty < 1){
	                $stock = "Out of stock";
	                $stm = $conn->prepare("UPDATE product_tb SET  qty = :total_qty, stock = :stock WHERE id = :id");
	                $stm->bindParam(':total_qty', $total_qty);
	                $stm->bindParam(':stock', $stock);
	                $stm->bindParam(':id', $item_id);
	
	            }else{
	
	                $stm = $conn->prepare("UPDATE product_tb SET  qty = :total_qty WHERE id = :id");
	                $stm->bindParam(':total_qty', $total_qty);
	                $stm->bindParam(':id', $item_id);
	
	            }
                	
 // EXECUTE
            $stm->execute();
endwhile;
             }
             //End new additions

            
           
                //endwhile;
         }   

        //Send Slack Notification
        if(!empty($_SESSION['coupon_code']) && $_SESSION['coupon_used'] == true){
            slack("Your ". $_SESSION["coupon_code"]. " coupon code was used on purchases worth GHS".$_SESSION["noPromoTotal"]. " Amount paid: GHS".$_SESSION["totalAmt"], "#coupons"); 
            
            if($_SESSION['coupon_user'] != ''){
            	slack("Your ". $_SESSION["coupon_code"]. " coupon code was used on purchases worth GHS".$_SESSION["noPromoTotal"]. " Amount paid: GHS".$_SESSION["totalAmt"], $_SESSION['coupon_user']);   
            }        
        }
    ?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<title>Haute Vie - Completed Order</title>
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
			.has-background {
				background-size: cover;
				background-position: center;
				background-repeat: no-repeat;
				background-image: url('images/1.jpg');
				min-height: 500px;
			}

			.has-text {
				padding:10vh 20px 20vh 20px;
				background: #f8f8f8;
			}

			.has-text img {
				margin-left: auto;
				margin-right: auto;
				max-height: 100px;
				margin-bottom: 40px;
				margin-top: 40px;
			}

			.has-text button {
				padding: 15px 40px;
				background: transparent;
				border: 1px solid #333;
				color: #333;
				outline: none;
				letter-spacing: 1px;
				margin-top: 40px;
			}

			@media(min-width: 768px) {.flex{display: flex;}}
		</style>

	</head>
		<body>
		<?php require_once("includes/header.php");?>

		<div class="container-fluid">
			<div class="row flex">
				<div class="col-lg-6 col-md-6 col-sm-6 hidden-xs has-background">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center has-text">
					<h2>HI, <?= ucwords($_SESSION['fullname']);?></h2>
					<img src="images/summary.png" class="img-responsive">
					<p>Your order has now been confirmed.</p>
					<p>We will send you some inbox love when your order leaves our warehouse.</p>
					<a href="index"><button>CONTINUE SHOPPING</button></a>
				</div>
			</div>
		</div>
		
	
		<?php require_once("includes/footer.php");?>
	</body>
</html>

<?php
unset($_SESSION["cart_array"]);
unset($_SESSION['fullname']);
unset($_SESSION['email']);
unset($_SESSION['ship_email']);
unset($_SESSION['totalAmt']);
unset($_SESSION['noPromoTotal']);
unset($_SESSION['coupon_amount']);
//unset($_SESSION['items']);
unset($_SESSION['coupon_code']);
unset($_SESSION['coupon_used']);
unset($_SESSION['coupon_user']);
unset($_SESSION['order_id']);
unset($_SESSION['min_amount']);
unset($_SESSION['max_amount']) ;
unset($_SESSION['usaged']);
unset($_SESSION['promo_applied']);
?>




