<!DOCTYPE html>
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
				font-family: 'Roboto', sans-serif;
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
				width: 33.3333%;
				padding: 15px 15px 15px 0px;
			}

			.width-2 h4 {
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
				<h2 style="margin-top: 0px;margin-bottom: 10px;border-bottom: 1px solid #e7e7e7;padding-bottom: 20px;">INVOICE</h2>
			</div>
			<div>
				<div class="width-1">
					<h3>Dawud Abdul Manan</h3>
					<p class="small" style="font-weight: 600;">Brief Delivery Address</p>
					<p class="small">21, Nii Amon street, East-Legon, Accra.</p>
					<br>
				</div>
				<div class="width-1" style="width: 39%;"></div>
				<div class="width-1">
					<p class="small">Order Time: 05:02:40</p>
					<p class="small">Order Date: 2018-02-19</p>
					<p class="small">Payment Method: Pay on delivery</p>
					<p class="small">Status: Pending</p>
					<p class="small">Total Quantity: 2 Item(s)</p>
					<p class="small">Total Amount: 14</p>
					<p class="small"><i class="material-icons">phone</i> 543543</p>
					<p class="small"><i class="material-icons">mail</i> dabdulmanan@gmail.com</p>
					<br>
				</div>
			</div>	
			<table style="width:100%">
			  	<tr>
			    	<th></th>
			    	<th>PRODUCT</th> 
			    	<th class="text-center">QUANTITY</th>
			    	<th class="text-right">UNIT</th>
			    	<th class="text-right">AMOUNT</th>
			  	</tr>
			  	<tr>
			    	<td class="text-center"><img src="1.jpg"></td>
			    	<td>Victoria Secret Kente Bag</td>
			    	<td class="text-center">1</td>
			    	<td class="text-right">200.00</td>
			    	<td class="text-right">200.00</td>
			  	</tr>
			  	<tr>
			    	<td class="text-center"><img src="1.jpg"></td>
			    	<td>Victoria Secret Kente Bag</td>
			    	<td class="text-center">1</td>
			    	<td class="text-right">200.00</td>
			    	<td class="text-right">200.00</td>
			  	</tr>
			  	<tr>
			    	<td colspan="4" class="text-right">Subtotal</td>
			    	<td class="text-right">400.00</td>
			  	</tr>
			  	<tr>
			    	<td colspan="4" class="text-right">Vat Rate</td>
			    	<td class="text-right">0.00</td>
			  	</tr>
			  	<tr>
			    	<td colspan="4" class="text-right">Vat Due</td>
			    	<td class="text-right">0.00</td>
			  	</tr>
			  	<tr class="total">
			    	<td colspan="4" class="text-right">TOTAL DUE</td>
			    	<td class="text-right">400.00</td>
			  	</tr>
			</table>
			<div class="width-2">
				<h4>PAYMENT TERMS AND POLICIES</h4>
				<p class="small">All accounts are to be paid within 7 days from receipt of invoice. To  be paid bycheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.</p>
			</div>
			<div class="text-center bord-top">
				<p>Thank you very much for doing business with us. We look forward to working with you again!</p>
			</div>
		</div>
	</body>
</html>