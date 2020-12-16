@php

    $email = $paymentinfo->email;
    $amt = $paymentinfo->amt;
    $phone = $paymentinfo->phone;
    $desc = $paymentinfo->desc;
    $fullname = $paymentinfo->fullname;
    $trans_id = $paymentinfo->trans_id;
    $country = $paymentinfo->country;
    $currency =  $paymentinfo->currency;
    $api =  $paymentinfo->api;

    $invoice ="rave-".$trans_id;

@endphp

<h2>Please Wait, Loading...</h2>

<form>
<script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
<input type="hidden" id="email" value="{{$email}}">
<input type="hidden" id="Amt" value="{{ $amt }}">
<input type="hidden" id="phone" value="{{$phone}}">
<input type="hidden" id="desc" value="{{ $desc }}">
<input type="hidden" id="fullname" value="{{ $fullname }}">
<input type="hidden" id="trans_id" value="{{ $invoice }}">
@php
if($country == "INT" || $country == "int"){
    $country = "US";
    $currency = "USD";
}
@endphp

<input type="hidden" id="country" value="{{ $country }}">
<input type="hidden" id="currency" value="{{ $currency }}">
<input type="hidden" id="api" value="{{ $api }}">

@if($country == "GH")
<input type="hidden" id="payment_options" value="card,mobilemoneyghana">
@else
<input type="hidden" id="payment_options" value="card">
@endif
</form>

  <script>
         
    // RAVE API 
//const API_publicKey = "FLWPUBK-c43f7df42d996456a0e8cfb761ba75a1-X";
const API_publicKey = document.getElementById('api').value;
const email = document.getElementById('email').value;
const amt = document.getElementById('Amt').value;
const phone = document.getElementById('phone').value;
const desc = document.getElementById('desc').value;
const fullname = document.getElementById('fullname').value;
const country = document.getElementById('country').value;
const trans_id = document.getElementById('trans_id').value;
const currency = document.getElementById('currency').value;
const payment_options = document.getElementById('payment_options').value;

    function payWithRave() {
        var x = getpaidSetup({
            PBFPubKey: API_publicKey,
            customer_email: email,
            amount: amt,
            customer_phone: phone,
            country: country,
            currency: currency,
            payment_options: payment_options,
            txref: trans_id,
            meta: [{
                metaname: desc,
                metavalue: fullname
            }],
            onclose: function() {
                var link = "/checkout";
           window.location.replace(link);
            },
            callback: function(response) {
                var txref = response.tx.txRef; // collect txRef returned and pass to a          server page to complete status check.
           console.log("This is the response returned after a charge", response);
                if (
                    response.tx.chargeResponseCode == "00" ||
                    response.tx.chargeResponseCode == "0"
                ) {
                    // redirect to a success page
                    var link = "/thankyou";
             window.location.replace(link);
                } else {
                    var link = "/checkout";
                window.location.replace(link);
                    // redirect to a failure page.
                }

                x.close(); // use this to close the modal immediately after payment.
            }
        });
    }
</script>

<script>
    window.onload = function () {
        payWithRave();
 }
</script>
