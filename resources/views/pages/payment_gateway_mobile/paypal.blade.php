@php
//$paypal_url = "https://www.sandbox.paypal.com/";
  $paypal_url = "https://www.paypal.com/";

  $email = $paymentinfo->email;
  $amt = $paymentinfo->amt;
  $phone = $paymentinfo->phone;
  $desc = $paymentinfo->desc;
  $fullname = $paymentinfo->fullname;
  $trans_id = $paymentinfo->trans_id;
  $country = $paymentinfo->country;
  $currency =  $paymentinfo->currency;
  $api =  $paymentinfo->api;
  $item_name = "Item(s) bought From Wine2u";
  $invoice ="inv-".$trans_id;

@endphp

<meta name="csrf-token" content="{{ csrf_token() }}" />

 <h2>Please Wait, Loading...</h2>
 
<form action="<?= $paypal_url;?>cgi-bin/webscr" method="Post" name="buyCredit" id="buyCredit">
  
	<input type="hidden" name="cmd" value="_xclick">
  <input type="hidden" name="business" value="{{ $api }}">
  <input type="hidden" name="currency_code" value="{{ strtoupper($currency) }}">
	<input type="hidden" name="item_name" value="{{$item_name}}"> 
	<input type="hidden" name="amount" value="{{$amt}}">
	<input type="hidden" name="amount_1" value="{{ $amt }}">
	<input type="hidden" name="notify_url" value="{{ "/thankyou"}}">
  <input type="hidden" name="return" value="{{ "/thankyou" }}">
  <input type="hidden" name="rm" value="2">
  <input type="hidden" name="cbt" value="Return to The Store">
  <input type="hidden" name="first_name" value="{{ $fullname }}"> 
  <input type="hidden" name="last_name" value=" ">

  {{-- <input type="hidden" name="address1" id="edit-address1" value="Some street"  /> --}}
  {{-- <input type="hidden" name="city" value="SomeCity"  />
  <input type="hidden" name="country"  value="CA"  />
  <input type="hidden" name="state"  value="AB"  />
  <input type="hidden" name="zip"  value="123"  /> --}}

  <input type="hidden" name="email"  value="{{ $email }}"  />
  <input type="hidden" name="phone_number"  value="{{ $phone }}"  />
  <input type="hidden" name="cancel_return" value="{{ "/checkout" }}">

</form>

<script type="text/javascript">
	document.getElementById('buyCredit').submit();
</script>





