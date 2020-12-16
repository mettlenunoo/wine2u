<?php  require_once("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php require_once("includes/function.php");?>
<?php
$total_amount =  $_SESSION['totalAmt'];
             if(!empty($_SESSION['coupon_amount'])){

                    $total_amount = $total_amount - $_SESSION['coupon_amount'];

			}elseif (!empty($_SESSION['shipp_amount'])) {

				$total_amount = $total_amount + $_SESSION['shipp_amount'];
			}

$invoice = array(
	'invoice' => array(
		/*'items' => array(
			'item_0' => array(
			      'name' => 'T Shirt',
			      'quantity' => 2,
			      'unit_price' => '35.0',
			      'total_price' => '700.0',
			      'description' => '{Customer Name} order from Mycompany.com'
				)
			),*/

			
		'total_amount' => $total_amount,
		'description' => 'Total cost of Product(s)'

		),
	'store' => array(
		'name' => 'Hauti Vie',
		'tagline' => 'Your tagline',
		'phone' => '+233',
		'website_url' => 'http://effectstudiosgh.com/haute/'
		),

	'actions' => array(
		'cancel_url' => 'https://hvafrica.com/',
		'return_url' => 'https://hvafrica.com/complete_order.php'
		),
	);

$clientId = 'uhbvznty';
$clientSecret = 'smpfjyqd';
$basic_auth_key =  'Basic ' . base64_encode($clientId . ':' . $clientSecret);
$request_url = 'https://api.hubtel.com/v1/merchantaccount/onlinecheckout/invoice/create';
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
	$response_param = json_decode($result);
	$redirect_url = $response_param->response_text;
	header('Location: '.$redirect_url);

}
    
	?>