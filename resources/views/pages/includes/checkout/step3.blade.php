


<div class="row border-between">
   <!-- left  side -->
   <div class="col-12 col-md-6 pr-md-5">

  
      <p> <small>3 out 4  steps</small></p>
      <h1 class="checkout-titile1">
      Payment Method
      </h1>
   
   
      <div class="form-row mt-5">
   <div class="main-container">
      <div class="radio-buttons">

         @if($calculation->shop->payment_gateways->rave == "Yes")
            <label class="custom-radio">
               <input type="radio" class="payment_method" name="payment_method"  value="Rave" checked />
               <span class="radio-btn"
                  ></i>
                  <div class="hobbies-icon">
                  <i class="lab la-cc-visa"></i>
                  <h3>Rave</h3>
                  </div>
               </span>
            </label>
         @endif

         @if($calculation->shop->payment_gateways->paystack == "Yes")
            <label class="custom-radio">
               <input type="radio" class="payment_method" name="payment_method" value="Paystack"  />
               <span class="radio-btn"
                  ></i>
                  <div class="hobbies-icon">
                  <i class="lab la-cc-visa"></i>
                  <h3>Paystack</h3>
                  </div>
               </span>
            </label>
         @endif

         @if($calculation->shop->payment_gateways->paypal == "Yes")
            <label class="custom-radio">
               <input type="radio" class="payment_method" name="payment_method"  value="Paypal"   />
               <span class="radio-btn"
                  ></i>
                  <div class="hobbies-icon">
                  <i class="lab la-cc-visa"></i>
                  <h3>Paypal</h3>
                  </div>
               </span>
            </label>
         @endif

         @if($calculation->shop->payment_gateways->express_pay == "Yes")
               <label class="custom-radio">
                  <input type="radio" class="payment_method" name="payment_method"  value="express-pay" />
                  <span class="radio-btn"
                     ></i>
                     <div class="hobbies-icon">
                     <i class="lab la-cc-visa"></i>
                     <h3>Express-pay</h3>
                     </div>
                  </span>
               </label>
         @endif

         @if($calculation->shop->payment_gateways->hubtel == "Yes")
               <label class="custom-radio">
                  <input type="radio" class="payment_method" name="payment_method" value="hubtel"  />
                  <span class="radio-btn"
                     ></i>
                     <div class="hobbies-icon">
                     <i class="lab la-cc-visa"></i>
                     <h3>Hubtel</h3>
                     </div>
                  </span>
               </label>
         @endif

         @if($calculation->shop->payment_gateways->cash_on_delivery == "Yes")
            <label class="custom-radio">
               <input type="radio" class="payment_method" name="payment_method"  value="pay_on_delivery"  />
               <span class="radio-btn"
                  ></i>
                  <div class="hobbies-icon">
                  <i class="lab la-cc-visa"></i>
                  <h3>Pay on Delivery</h3>
                  </div>
               </span>
            </label>
         @endif
           
      </div>
    </div>

      </div>
      <div class="form-group clearfix  mt-5">
            <a href="javascript:;" class="form-wizard-previous-btn float-left" >Previous</a>
            <a href="javascript:;" class="form-wizard-next-btn float-right" onclick="billing_summary()">Next</a>
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
                             <input type="text" class="form-control  form-control-wine2u coupon-code" placeholder="Coupon code" aria-label="Coupon code" aria-describedby="button-addon4" name="coupon_code3" value="">
                             <div class="input-group-append" id="button-addon4">
                                 <button class="btn btn-dark couponAdd"  type="button" onclick="addCoupon(this.form.coupon_code3.value)">Apply </button>
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
