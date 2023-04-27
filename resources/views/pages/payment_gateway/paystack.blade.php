@php

$email = session()->get('paymentinfo')['email'];
$amt = session()->get('paymentinfo')['amt'] * 100;
$phone = session()->get('paymentinfo')['phone'];
$desc = session()->get('paymentinfo')['desc'];
$fullname = session()->get('paymentinfo')['fullname'];
$trans_id = session()->get('paymentinfo')['trans_id'];
$country = session()->get('paymentinfo')['country'];
$currency =  session()->get('paymentinfo')['currency'];
$api =  session()->get('paymentinfo')['api'];
$item_name = "Item(s) bought From Wine2u";
$invoice ="inv-".$trans_id;

@endphp

<meta name="csrf-token" content="{{ csrf_token() }}" />
<h2>Please Wait, Loading...</h2>

 <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form" id="buyCredit">
  
  <input type="hidden" name="email" value="{{ $email }}"> {{-- required --}}
  <input type="hidden" name="orderID" value="{{ $trans_id }} ">
  <input type="hidden" name="amount" value="{{ $amt }}"> {{-- required in kobo --}}
  <input type="hidden" name="quantity" value="">
  <input type="hidden" name="currency" value="{{ strtoupper($currency) }}">
  {{-- <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > --}}
   {{-- For other necessary things you want to add to your payload. it is optional though --}}
  <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
  {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

  <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

</form>

<script type="text/javascript">
	document.getElementById('buyCredit').submit();
</script>