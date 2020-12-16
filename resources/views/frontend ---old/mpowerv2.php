<?php  require_once("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php require_once("includes/function.php");?>

<?php

$manners = array();
foreach($_SESSION["cart_array"] as $item_x => $item){
    //echo "Product ".$item["item_name"];
    $manners[] = array('name' => $item["item_name"],
                        'quantity' => $item["quantity"],
                        'unitPrice' => $item["price"],
                );
}

$total_amount =  $_SESSION['totalAmt'];

if (!empty($_SESSION['shipp_amount'])) {
	$total_amount = $total_amount + $_SESSION['shipp_amount'];
}

/*if(!empty($_SESSION['coupon_amount'])){

       $total_amount = $total_amount - $_SESSION['coupon_amount'];

}elseif (!empty($_SESSION['shipp_amount'])) {

   $total_amount = $total_amount + $_SESSION['shipp_amount'];
}*/


$invoice = array(
    'items' => $manners
    /*array(
        array (
            'name' => 'The Beautiful Ones Are Not Yet Born',
            'quantity' => 1,
            'unitPrice' => 50,
        ),
    )*/
    ,
    'totalAmount' => $total_amount,
    'description' => 'Product Checkout',
    'callbackUrl' => 'http://hvafrica.com/callback',
    'returnUrl' => 'https://hvafrica.com/complete_order.php',
    'merchantBusinessLogoUrl' => 'https://hvafrica.com/images/black-logo.png',
    'merchantAccountNumber' => 'HM3001180020',
    'cancellationUrl' => 'https://hvafrica.com/checkout.php',    
    //'clientReference' => 'MI6TPQ3XK',
    'clientReference' => $_SESSION["order_id"],
	);

$clientId = 'uhbvznty';
$clientSecret = 'smpfjyqd';
$basic_auth_key =  'Basic ' . base64_encode($clientId . ':' . $clientSecret);
$request_url = 'https://api.hubtel.com/v2/pos/onlinecheckout/items/initiate';
// $request_url = 'https://api.hubtel.com/v1/merchantaccount/onlinecheckout/invoice/create';
$create_invoice = json_encode($invoice);

$ch =  curl_init($request_url);  
		curl_setopt( $ch, CURLOPT_POST, true );  
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $create_invoice);  
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );  
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
		    'Authorization: '.$basic_auth_key,
		    'Cache-Control: no-cache',
		    'Content-Type: application/json',
		  ));

$result = curl_exec($ch); 
$error = curl_error($ch);
curl_close($ch);

if($error){
	echo $error;
}else{
	// redirect customer to checkout
	//$response_param = json_decode($result);
	//$redirect_url = $response_param->response_text;
    //header('Location: '.$redirect_url);
   $response = json_decode($result, true);
   $redirect_url = $response["data"]["checkoutUrl"];
   header('Location: '.$redirect_url);
    //echo $response["data"]["checkoutUrl"];
   //print(json_decode($result));
    //echo $response->data["checkoutUrl"];
}
    
	?>