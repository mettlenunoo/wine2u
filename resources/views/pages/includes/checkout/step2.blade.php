<div class="row border-between">
   <!-- left  side -->
   <div class="col-12 col-md-6 pr-md-5">
  
      <p> <small>2 out 4  steps</small></p>
      <h1 class="checkout-titile1">
      Delivery and shipping address
      </h1>
      <div class="custom-control custom-checkbox mt-4">
         <input type="checkbox" class="custom-control-input" name="billingtoo" id="customCheck1" onclick="FillBilling(this.form)">
         <label class="custom-control-label" for="customCheck1">Shipping address is the same my billing address</label>
      </div>
   
      <div class="form-row mt-4">
         <div class="form-group col-12 col-md-12 col-lg-6">
            <label for="checkout-address_FirstName">First Name *</label>
            <input type="text"  name="shippingfname" class="form-control valid form-control-wine2u wizard-required" id="shipping_fname" placeholder=""> 
            <div class="wizard-form-error">
               Enter Your First Name
            </div>
         </div>
         <div class="form-group col-12 col-md-12 col-lg-6">
            <label for="checkout-address_LastName">Last Name *</label>
            <input type="text" name="shippingsname" class="form-control form-control-wine2u wizard-required" id="shipping_last" placeholder=""> 
            <div class="wizard-form-error">

               Enter Your Last Name
            
            </div>
         </div>
         <div class="form-group col-12 col-md-12">
            <label for="checkout-address_line1">Email *</label>
            <input type="email" name="shippingemail" class="form-control form-control-wine2u wizard-required" id="shipping_email" placeholder=""> 
            <div class="wizard-form-error">
                Enter Your Email
            </div>
         </div>
         <div class="form-group col-12 col-md-12">
            <label for="checkout-address_line1">Phone Number *</label>
            <input type="tel" name="shippingpnumber" class="form-control form-control-wine2u wizard-required" id="shipping_pnumber" placeholder=""> 
            <div class="wizard-form-error">
                Enter Your Phone Number
            </div>
         </div>
         <div class="form-group col-12 col-md-12 col-lg-6">
            <label for="checkout-country">Country / Region *</label> 
            <select id="shipping_country" name="shippingcountry" class="form-control form-control-wine2u wizard-required" onchange="shiprate(this);">
               <option selected value="" >Choose...</option>
               @foreach ($countries as $item)
                <option value="{{ $item->zone }}">{{ $item->country }}</option>
               @endforeach
               {{-- <option value="Ghana">Ghana</option> --}}
            </select>
            <input type="" name="country_region" id="country_region">

            <div class="wizard-form-error">
               Select a Shipping Country / Region
            </div>

         </div>
         <div class="form-group col-12 col-md-12 col-lg-6">
            <label for="checkout-address_city"> State </label>
            <input type="text" name="shippingstate" class="form-control form-control-wine2u" id="shipping_state" placeholder="">
         </div>
        
         <div class="form-group col-12 col-md-6">
            <label for="checkout-address_Zip-code">City </label>
            <input type="text" name="shippingcity" class="form-control form-control-wine2u" id="shipping_city" placeholder="">
         </div>
         <div class="form-group col-12 col-md-6">
            <label for="checkout-address_Phone-Number"> Street Address </label>
            <input type="text" name="shippingstate" class="form-control form-control-wine2u " id="shipping_street" placeholder="">
            <div class="wizard-form-error"></div>
         </div>

         <div class="form-group col-12 col-md-6">
            <label for="checkout-address_Zip-code"> Apartment  </label>
            <input type="text" name="shippingapartment" class="form-control form-control-wine2u" id="shipping_apartment" placeholder="">
         </div>
         <div class="form-group col-12 col-md-6">
            <label for="checkout-address_Phone-Number"> Zip Code </label>
            <input type="text" name="shippingzip" class="form-control form-control-wine2u" id="shipping_zipcode" placeholder="">
            <div class="wizard-form-error"></div>
         </div>
      
      </div>
      
      <div class="form-group clearfix">
         <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
         <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
      </div>
   </div>

   {{-- </form> --}}
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
                             <input type="text" class="form-control  form-control-wine2u coupon-code" placeholder="Coupon code" aria-label="Coupon code" aria-describedby="button-addon4" name="coupon_code2" value="">
                             <div class="input-group-append" id="button-addon4">
                                 <button class="btn btn-dark couponAdd"  type="button" onclick="addCoupon(this.form.coupon_code2.value)">Apply </button>
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
