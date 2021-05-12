<h1 class="checkout-titile1">Cart 
    <span> (
        @php
           if(session()->has('cart')){

               echo count(session()->get('cart'));

           }else{
                
                echo "0";
           }
        @endphp
            )
    </span>
</h1>
<hr>
<!--  -->
@php 

$totalAmount = 00;
$weight = 0.00;
$tax  = 0.0
@endphp
@if(session()->has('cart'))

@foreach (session()->get('cart') as $key => $item)

@php    
  $totalPrice = $item['productPrice'] * $item['quantity'];
  // $totalQty = $totalQty + $item['quantity'];
  $weight = $weight + $item['productWeight'];
  $totalAmount = $totalAmount + $totalPrice;
@endphp

    <div class="row centerit mb-3">
        <div class="col-6">
            <div class="media centerit">
                <img src="/product_images/{{ $item['productImage'] }}" class="pr-3 cartimage" alt="{{ ucwords($item['productName']) }}">
                <div class="media-body">
                    <p class="mb-0"><small> GHS  {{ number_format($item['productPrice'],2) }}</small></p>
                    <p class="mt-0"><strong>{{ ucwords($item['productName']) }}</strong> </p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <p>Qty: <span class="pl-2"> {{ $item['quantity'] }} </span></p>
        </div>
        <div class="col-3 text-right">
            GHC<span> {{ number_format($totalPrice,2) }} </span>
        </div>
    </div>
@endforeach

@endif
<!--  -->
