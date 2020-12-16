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

$paypal_url = "https://www.paypal.com/";


?>

<h2>Please Wait, Loading...</h2>

<form action="<?= $paypal_url;?>/cgi-bin/webscr" method="Post" name="buyCredit" id="buyCredit">
	<input type="hidden" name="cmd" value="_xclick">
	<input type="hidden" name="business" value="yawbeey49@gmail.com">
	<input type="hidden" name="currency_code" value="USD">
	<input type="hidden" name="item_name" value="<?= $product_name; ?>">
	<input type="hidden" name="amount" value="<?= $total_amount;?>">
	<input type="hidden" name="amount_1" value="<?= $total_amount;?>">
	<input type="hidden" name="notify_url" value="https://hvafrica.com/complete_order.php">
	<input type="hidden" name="return" value="https://hvafrica.com/complete_order.php">
    <input type="hidden" name="rm" value="2">
    <input type="hidden" name="cbt" value="Return to The Store">
    <input type="hidden" name="cancel_return" value="https://hvafrica.com/checkout.php">

</form>

<script type="text/javascript">
	document.getElementById('buyCredit').submit();
</script>
