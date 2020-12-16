<?php require_once("includes/session.php");?>
<?php confirm_session();?>
<?php require_once("includes/connection.php");?>
<?php require_once("includes/function.php");?>
<?php
// mail gun API
require 'vendor/autoload.php';
use Mailgun\Mailgun;
# First, instantiate the SDK with your API credentials
$mg = Mailgun::create('key-8c3cce87820d5d19025f90a7e40b8296');

?>

<?php  if(isset($_POST['submit'])){



try {
        //  ASSIGN VALUES TO THE VARIABLES
        $order_id = preg_replace('#[^0-9]#', '', $_GET['order_id']);
        $action = $_POST['action'];
        $tracking = $_POST['tracking'];
        $email_send = $_POST['email_send'];

       
    //sql
      $sql_update = " UPDATE order_tb SET complete_status = :action, tracking_code = :tracking  WHERE id = :order_id ";
     
    // Prepare statement
    $stmt = $conn->prepare($sql_update);
    
    // SET PARAMETERS
    $stmt->bindParam(':action', $action);
    $stmt->bindParam(':tracking', $tracking);
    $stmt->bindParam(':order_id', $order_id);
    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    //$message = $stmt->rowCount() . " Order Updated successfully";
    $message = " Order Updated successfully";

   // $order_id = preg_replace('#[^0-9]#', '', $_SESSION['order_id']);

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

# Now, compose and send your message.


    if(isset($_POST['email'])){
   $total_amount_memory = $totalamount;
 $emails = array();
 $emails[] = $email_send;
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
                    <th class="text-right">AMOUNT'; if($country ==1){ $body .= "GHs "; }else if($country ==2){ $body .= "$ " ;} $body .='</th>
                </tr>';

                         $sql = "SELECT * from order_product_tb WHERE order_id = $order_id ";
                    $q = $conn->query($sql);
                    $q->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $q->fetch()):
                     $product_id = $row['product_id'];
                     $product_quantity = $row['quantity'];
                     $product_price = $row['price'];

                    ####### QUERY FOR PRODUCT ######################
                    $sql_product = "SELECT * from product_tb WHERE id = $product_id ";
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
    $headers = "Content-Type: text/html; charset=UTF-8\r\n";
    # $mg->messages()->send($domain, $params);
      $mg->messages()->send('hvafrica.com', [
      'from'    => 'sales@hvafrica.com',
      'to'      =>  $to,
      'subject' => $subject,
      'text'    => $subject,
      'html'  => $body
        ]);
    
    //$mail_sent = mail($to, $subject, $body, $headers,'-fsales@hvafrica.com');

    }


    }// end of if statement
    
    }// end try 
    
catch(PDOException $e)
    {
   $message = $sql . "<br>" . $e->getMessage();
    }

//$conn = null;



}

?>


<?php  if(isset($_GET['order_id'])){

$order_id = preg_replace('#[^0-9]#', '', $_GET['order_id']);

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

}

    ?>


    

<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title><?= $project_title ;?></title>

        <meta name="description" content="OneUI - Admin Dashboard Template & UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
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

        <!-- OneUI CSS framework -->
        <link rel="stylesheet" id="css-main" href="assets/css/oneui.css">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>
      
        <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
       
            <!-- Sidebar -->
<?php require_once("includes/backend_side_bar.php");?>
            <!-- Main Container -->

            <main id="main-container">
                <!-- Page Header -->
                <!-- You can use the .hidden-print class to hide an element in printing -->
                <div class="content bg-gray-lighter hidden-print">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                           Invoice <small><?= $message; ?></small>
                            </h1>
                        </div>
             <form class="col-sm-5 text-right hidden-xs" action="invoice.php?order_id=<?= $order_id;?>" method="POST">
                     <div class="form-group">
                        
                           <div class="col-sm-6">
                            <select class="form-control" id="example-select" name="action" size="1">
     <option <?php if ($complete_status == "Pending") { echo "Selected";  }?>  value="Pending">Pending Payment</option>
    <option <?php if ($complete_status == "Processing") { echo "Selected";  }?> value="Processing">Processing </option>
    <option <?php if ($complete_status == "On Hold") { echo "Selected";  }?> value="On Hold"> On Hold</option>
    <option <?php if ($complete_status == "Completed") { echo "Selected";  }?> value="Completed">Completed </option>
    <option <?php if ($complete_status == "Cancelled") { echo "Selected";  }?> value="Cancelled">Cancelled</option>
   <option <?php if ($complete_status == "Refunded") { echo "Selected";  }?> value="Refunded">Refunded </option>
   <option <?php if ($complete_status == "Failed") { echo "Selected";  }?> value="Failed">Failed</option>
                             </select>
                         </div>

                <div class="col-sm-6">
        <input class="form-control" type="text" name="tracking"  value="<?= $tracking_code;?>" placeholder="Enter tracking code" >
               <input class="form-control" type="hidden" name="email_send"  value="<?= $email;?>"  >

          </div>
          <div class="col-sm-6">
            Do you want to send an email?
 <input  type="checkbox" name="email"  <?php if ($email == "email") { echo "Selected";  }?> value="<?= "email";?>"  >

          </div>
                       <div class="col-sm-12">
                         <button class="btn btn-sm btn-primary  pull-right" type="submit" name="submit"> Publish </button>
                        </div>

                     </div>
                          <!--  <ol class="breadcrumb push-10-t">
                                <li>Order</li>
                                <li><a class="link-effect" href="">Invoice</a></li>
                            </ol>-->


                        </form>
                    </div>
                </div>
                <!-- END Page Header -->

                <!-- Page Content -->
                <div class="content content-boxed">
                    <!-- Invoice -->
                    <div class="block">
                        <div class="block-header">
                            <ul class="block-options">
                                <li>
                                    <!-- Print Page functionality is initialized in App() -> uiHelperPrint() -->
                                    <button type="button" onclick="App.initHelper('print-page');"><i class="si si-printer"></i> Print Invoice</button>
                                </li>
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                                </li>
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">#INV<?= $id; ?></h3>
                        </div>
                        <div class="block-content block-content-narrow">
                            <!-- Invoice Info -->
                          
                            <div class=" row">
                                <div class="col-6">
                            <div class="h1 text-center push-30-t push-30 hidden-print"><img src="images/black-logo.png" width="70px" height="70px">
                            </div>
                                </div>

                            <div class="col-6">
                                 <div class="h6 push-30-t  hidden-print">INVOICE</div>
                                 
                            </div>
                            </div>

                           
                            <hr class="hidden-print">
                            <div class="row items-push-2x">
                            
                           

                                <!-- Company Info -->
                                <div class="col-xs-6 col-sm-4 col-lg-3">
                                    <p class="h2 font-w400 push-5"><?=  ucwords($name); ?></p>
                                    <address>
                                       <b>Brief Delivery Address</b> <br>
                                        <?= ucwords($ship_to);  ?><br/>
                                         Code : <?= $ship_code;?><br>

                                        <!--Address<br>
                                        Town/City<br>
                                        Region, Zip/Postal Code<br>-->


                                       <br/>
                                    </address>
                                </div>
                                <!-- END Company Info -->
                                 
                                <!-- Client Info -->
                                <div class="col-xs-6 col-sm-4 col-sm-offset-4 col-lg-3 col-lg-offset-6 ">
                                    <!--<p class="h2 font-w400 push-5"></p>-->
                                    <address>
                                        Order Time : <?= $time;?><br>
                                        Order Date : <?= $date;?><br>
                                        Payment Method : <?= ucfirst($payment_method);?><br>
                                        Status : <?= $complete_status;?><br>
                                        Total Quantity : <?= $quantity;?> item(s)<br>
                                        Total Amount : <?= number_format($totalamount,2);?><br>
                                       <i class="si si-call-end"></i> <?= $phone_number; ?> <br/>
                                       <i class="si si-envelope"></i> <?= $email; ?>
                                    </address>
                                </div>
                                <!-- END Client Info -->
                            </div>
                            <!-- END Invoice Info -->

                            <!-- Table -->
                            <div class="table-responsive push-50">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 120px;"></th>
                                            <th>Product</th>
                                            <th class="text-center" style="width: 100px;">Quantity</th>
                                            <th class="text-right" style="width: 120px;">Unit</th>
                                            <th class="text-right" style="width: 120px;">Amount <?php if($country ==1){ echo "GHs "; }else if($country ==2){ echo "$ " ;}?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                    <?php

                    $sql = "SELECT * from order_product_tb WHERE order_id = $order_id ";
                    $q = $conn->query($sql);
                    $q->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $q->fetch()):
                     $product_id = $row['product_id'];
                     $product_quantity = $row['quantity'];
                     $product_price = $row['price'];

                    ####### QUERY FOR PRODUCT ######################
                    $sql_product = "SELECT * from product_tb WHERE id = $product_id ";
                    $z = $conn->query($sql_product);
                    $z->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row_product = $z->fetch()):

                    ?>
                        <tr>
                        <td class="text-center"><img src="<?= $row_product['img1']; ?>" width="50px" height = "50px"></td>
                            <td>
                                <p class="font-w600 push-10"><?= $row_product['title']; ?></p>
                               <!-- <div class="text-muted">Design/Development of iOS and Android application</div>-->
                            </td>
						
						 <?php if($country == 1){ ?>
						       <?php
							        	    if($row_product['sales_gh'] > 0){
							        	     	$single_price = $row_product['sales_gh'];
							        	       	//echo number_format($single_price,2);
                                                 $total_amount_cost = $product_quantity * $single_price;
							        	    }else{
							        	      	$single_price = $row_product['regular_gh'];
							        	      //	echo number_format($single_price,2);
                                                 $total_amount_cost = $product_quantity * $single_price;
							        	    } 
							    	    ?>
						 
                            <td class="text-center"><span class="badge badge-primary"><?= $product_quantity; ?></span></td>
                             
                            <td class="text-right"><?= number_format($single_price,2); ?></td>
							
							
							
						 <?php }else{ ?>
						 
						   <?php
							                if($row_product['sales_us'] > 0){
                        
							                    $single_price = $row_product['sales_us'];
							                   // echo number_format($single_price,2);
                                                $total_amount_cost = $product_quantity * $single_price;

							                }else{

							                    $single_price = $row_product['regular_us'];
							                   // echo number_format($single_price,2);
                                                $total_amount_cost = $product_quantity * $single_price;
							                }
							            ?>   
						 
						  <td class="text-center"><span class="badge badge-primary"><?= $product_quantity; ?></span></td>
                            <td class="text-right"><?= number_format($single_price,2); ?></td>
							
						 <?php } ?>

                            <td class="text-right">

                                <?php 
                //$total_price =  number_format($product_price) * number_format($product_quantity);
                               echo number_format($total_amount_cost,2);
                                ?>

                          </td>
                        </tr>

                 <?php endwhile; ?>

                 <?php endwhile; ?>



                                          <?php if($shipping_amt >= 1){ $totalamount = $totalamount - $shipping_amt;} ?>

                                          <?php if($coupon_amount >= 1){ 
                                           $totalamount = $totalamount + $coupon_amount; }
                                          ?>
                                        <tr>
                                            <td colspan="4" class="font-w600 text-right">Subtotal</td>
                                            <td class="text-right"><?= number_format($totalamount,2);?></td>
                                        </tr>
                                         <?php if($shipping_amt >= 1){ $totalamount = $totalamount + $shipping_amt;  ?>

                                        <tr>
                                            <td colspan="4" class="font-w600 text-right">Shipping </td>
                                            <td class="text-right"><?= $shipping_amt; ?></td>
                                        </tr>

                                        <?php } ?>


                                         <?php if($coupon_amount >= 1){  $totalamount = $totalamount - $coupon_amount; ?>

                                        <tr>
                                            <td colspan="4" class="font-w600 text-right">Discount</td>
                                            <td class="text-right">( <?= $coupon_amount; ?> )</td>
                                        </tr>

                                         <?php } ?>

                                        <tr class="active">
                                            <td colspan="4" class="font-w700 text-uppercase text-right">Total </td>
                                            <td class="font-w700 text-right"><?= number_format($totalamount,2);?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                       <div class="col-md-6 col-sm-6 col-xs-6">
                                                <div class="clearfix m-t-40">
                                                    <!--<h5 class="small text-inverse font-600">PAYMENT TERMS AND POLICIES</h5>
-->
                                                    <small>
                                                       <!-- All accounts are to be paid within 7 days from receipt of
                                                        invoice. To be paid by cheque or credit card or direct payment
                                                        online. If account is not paid within 7 days the credits details
                                                        supplied as confirmation of work undertaken will be charged the
                                                        agreed quoted fee noted above.-->

                                                        Thanks a million for your purchase. Please be on the lookout for emails on shipping and deliveries. For more information on our shipping policy, please visit our website <a href="index">Home</a>
                                                        
                                                        
                                                    </small>
                                                </div>
                                       </div>
                            </div>
                            <!-- END Table -->

                            <!-- Footer -->
                            <hr class="hidden-print">
                            <p class="text-muted text-center">

                                <center>

                            <h5>CONNECT WITH US:</h5>
                     
                    <p>
                                <a href="https://www.facebook.com/hautevieafrica
" target="new">
                                    <img src="images/fb.svg" width="20px" height="20px"> 
                                </a>
                             <span>
                                <a href="https://www.instagram.com/hautevie_africa/
" target="new">
                                     <img src="images/ig.svg" width="20px" height="20px"> 
                                </a>
                             </span>
                              <span>
                             <a href="https://twitter.com/Hautevie_africa
" target="new">
                                   <img src="images/twitter.svg" width="20px" height="20px"> 
                                </a>
                              </span>
                               
                            </p>

                            </center>
                            <small><!--Thanks a million for your purchase. Please be on the lookout for emails on shipping and deliveries. For more information on our shipping policy, please visit our website <a href="index">Home</a>-->
</small></p>

                            <!-- END Footer -->
                        </div>
                    </div>
                    <!-- END Invoice -->
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
                            <h3 class="block-title">Apps</h3>
                        </div>
                        <div class="block-content">
                            <div class="row text-center">
                                <div class="col-xs-6">
                                    <a class="block block-rounded" href="index.html">
                                        <div class="block-content text-white bg-default">
                                            <i class="si si-speedometer fa-2x"></i>
                                            <div class="font-w600 push-15-t push-15">Backend</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-6">
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
    </body>
</html>