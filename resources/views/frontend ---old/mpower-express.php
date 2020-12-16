<?php

$_POST = json_decode(file_get_contents("php://input"),true);

$products = array();
foreach($_POST["items"] as $item){
    $products[] = array('name' => $item["title"],
                        'quantity' => $item["qty"],
                        'unitPrice' => $item["cost"],
                );
}

$total_amount =  $_POST['total_amt'];
$order_id = $_POST['order_id'];


$invoice = array(
    'items' => $products,
    'totalAmount' => $total_amount,
    'description' => 'Product Checkout',
    'callbackUrl' => 'https://hvafrica-85e6e.firebaseapp.com/callback',
    'returnUrl' => 'https://hvafrica-85e6e.firebaseapp.com/finish/'.$order_id,
    'merchantBusinessLogoUrl' => 'https://hvafrica.com/images/black-logo.png',
    'merchantAccountNumber' => 'HM3001180020',
    'cancellationUrl' => 'https://hvafrica.com/',    
    'clientReference' => $order_id,
	);

$clientId = 'uhbvznty';
$clientSecret = 'smpfjyqd';
$basic_auth_key =  'Basic ' . base64_encode($clientId . ':' . $clientSecret);
$request_url = 'https://api.hubtel.com/v2/pos/onlinecheckout/items/initiate';
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
		
   $response = json_decode($result, true);
   $redirect_url = $response["data"]["checkoutUrl"];
   //header('Location: '.$redirect_url);
   $feedback->status = 'success';
   $feedback->url = $redirect_url;
   
   $myJSON = json_encode($feedback);
   echo $myJSON;
}



/*$myJSON = json_encode($manners);

echo $myJSON;*/

    
	?>