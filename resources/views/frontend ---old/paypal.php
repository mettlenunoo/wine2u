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
//$paypal_url = "https://www.sandbox.paypal.com/";
$paypal_url = "https://www.paypal.com/";

            $pay =  $_SESSION['totalAmt'];
             if(!empty($_SESSION['coupon_amount'])){

                    $pay = $pay - $_SESSION['coupon_amount'];

			}elseif (!empty($_SESSION['shipp_amount'])) {

				$pay = $pay + $_SESSION['shipp_amount'];
			}

$order_id = $_SESSION['order_id'];
          $product_name = "Item(s) order ";
         foreach($_SESSION["cart_array"] as  $each_item){
              
				$item_id = $each_item['item_id'];
				//$quantity = $each_item['quantity'];
				//$price = $each_item['price'];

                    
				    $sql = "SELECT * from product_tb  WHERE id = $item_id LIMIT 1";
                    $q = $conn->query($sql);
                    $q->setFetchMode(PDO::FETCH_ASSOC);

                     while ($row = $q->fetch()): 
                     $product_name = $product_name." , ".$row['title'];
                     endwhile;

                 }


?>



 <h2>Please Wait, Loading...</h2>

<form action="<?= $paypal_url;?>/cgi-bin/webscr" method="Post" name="buyCredit" id="buyCredit">
	<input type="hidden" name="cmd" value="_xclick">
	<!--<input type="hidden" name="business" value="yaw@mam.com">-->
	<input type="hidden" name="business" value="yawbeey49@gmail.com">
	<input type="hidden" name="currency_code" value="USD">
	<input type="hidden" name="item_name" value="<?= $product_name; ?>">
	<input type="hidden" name="amount" value="<?= $pay;?>">
	<input type="hidden" name="amount_1" value="<?= $pay;?>">
	<input type="hidden" name="notify_url" value="https://hvafrica.com/complete_order.php">
	<input type="hidden" name="return" value="https://hvafrica.com/complete_order.php">
    <input type="hidden" name="rm" value="2">
    <input type="hidden" name="cbt" value="Return to The Store">
    <input type="hidden" name="cancel_return" value="https://hvafrica.com/checkout.php">

</form>

<script type="text/javascript">
	document.getElementById('buyCredit').submit();
</script>





