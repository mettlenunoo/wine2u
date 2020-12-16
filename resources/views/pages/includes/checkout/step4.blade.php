


<div class="row border-between">
   <!-- left  side -->
   <div class="col-12 col-md-6 pr-md-5">

  
      <p> <small>4 out 4  steps</small></p>
      <h1 class="checkout-titile1">
      Review and Confirm Order
      </h1>

      <div class="row mt-4">
             <div class="col-12">
             <h1 class="f_titile_p2b mt-3 ">Billing Address </h1>
             <p class="mb-1" id="billingFullname"></p>
             <p class="mb-1" id="billingEmail"></p>
             <p class="mb-1" id="billingPhoneNumber"></p>
             <p class="mb-1" id="billingCountry"></p>
             <p class="mb-1" id="billingState"></p>
             <p class="mb-1" id="billingCity"></p>
             <p class="mb-1" id="billingStreet"></p>
             <p class="mb-1" id="billingApartment"></p>
             <p class="mb-1" id="billingZipcode"></p>
             </div>
        </div>

        <div class="row mt-4">
             <div class="col-12">
             <h1 class="f_titile_p2b mt-3 ">Shipping Address</h1>
             <p class="mb-1" id="shippingFullname"></p>
             <p class="mb-1" id="shippingEmail"></p>
             <p class="mb-1" id="shippingPhoneNumber"></p>
             <p class="mb-1" id="shippingCountry"></p>
             <p class="mb-1" id="shippingState"></p>
             <p class="mb-1" id="shippingCity"></p>
             <p class="mb-1" id="shippingStreet"></p>
             <p class="mb-1" id="shippingApartment"></p>
             <p class="mb-1" id="shippingZipcode"></p>
             </div>
        </div>

        <div class="row mt-4">
             <div class="col-12">
             <h1 class="f_titile_p2b mt-3 ">Payment Method</h1>
             <p class="mb-1" id="summary_payment_method"></p>
             </div>
        </div>
 
   </div>
   <!-- left  side -->
   <!-- right side -->
   <div class="col-12 col-md-6 pl-md-5">

      @include("pages.includes.checkout.checkout_cart")

      <div class="row pt-5">
         <!--Promotional Code?  -->
         <div class="col-12">
            <hr>
            <div class="form-group ">
               <a class="newsmalltext collapsed" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
               <strong>Promotional Code?</strong>
               </a>
               <div class="multi-collapse collapse" id="multiCollapseExample1" style="">
                 {{-- <form class="coupon_form"> --}}
                     <div class="my-3">
                         <div class="input-group" >
                             <input type="text" class="form-control  form-control-wine2u coupon-code" placeholder="Coupon code" aria-label="Coupon code" aria-describedby="button-addon4" name="coupon_code4" value="">
                             <div class="input-group-append" id="button-addon4">
                                 <button class="btn btn-dark couponAdd"  type="button"  onclick="addCoupon(this.form.coupon_code4.value)">Apply </button>
                             </div>
                         </div>
                         <br>
                         {{-- onclick="addCoupon()" --}}
                         <p class="coupon_message"> </p>
                     </div>
                 {{-- </form> --}}
               </div>
            </div>
            <hr>
         </div>
         <!--Promotional Code?  -->
      </div>

      @include("pages.includes.checkout.subtotal")
      
   </div>
   <!-- right side -->
</div>

<div class="row">
<div class="col-12">
<div class="form-group clearfix mt-5">
   <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
   <button class="form-wizard-submit float-right" type="submit">Submit</button>
</div>
</div>
</div>
