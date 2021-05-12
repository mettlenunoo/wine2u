 <!-- promotion / subtotal and Total -->
 <div class="row  pt-5">
    <!-- subtotal  -->
    <div class="col-12">
       <div class="d-flex bd-highlight mb-3">
          <div class="mr-auto p-2 bd-highlight " >Subtotal</div>
          <div class="p-2 bd-highlight"> GHS <span class="subtotal-amount"> {{ number_format($calculation->subTotal,2) }}</span> </div>
          <input type="hidden" class="subtotal" value="{{ $calculation->subTotal }}">
       </div>
       <hr>
    </div>
    <!-- subtotal -->
    <!-- Shipping Cost  -->
    <div class="col-12">
       <div class="d-flex bd-highlight mb-3">
          <div class="mr-auto p-2 bd-highlight totalAmm">Shipping Cost</div>
          <div class="p-2 bd-highlight  "> GHS  <span class="shipping-amount"> {{ number_format($calculation->shipping,2) }} </span> </div>
          <input type="hidden" class="shipping" value="{{ $calculation->shipping }}">
       </div>
    </div>
    <!-- Shipping Cost -->
    <!-- Tax  -->
    <div class="col-12">
       <div class="d-flex bd-highlight mb-3">
          <div class="mr-auto p-2 bd-highlight  ">Tax</div>
          <div class="p-2 bd-highlight"> GHS <span> {{ number_format($calculation->taxAmt,2) }} </span> </div>
          <input type="hidden" class="tax" value="{{ $calculation->taxAmt }}">
       </div>
    </div>
    <!-- Tax -->

     <!-- Discount  -->
     <div class="col-12">
        <div class="d-flex bd-highlight mb-3">
           <div class="mr-auto p-2 bd-highlight">Discount </div>
           <div class="p-2 bd-highlight"> GHS  (<span class="discount-amount"> {{ number_format($calculation->discount,2) }}</span>) </div>
           <input type="hidden" class="discount" value="{{ $calculation->discount }}">
        </div>
     </div>
     <!-- Discount -->

    <!--  Total -->
    <div class="col-12">
       <div class="d-flex bd-highlight mb-3 totalback px-3 py-2">
          <div class="mr-auto p-2 bd-highlight  font-weight-bold">Total</div>
          <div class="p-2 bd-highlight  font-weight-bold "> GHS <span class="total-amount"> {{ number_format($calculation->totalAmount,2) }} </span> </div>
          <input type="hidden" class="total-amt" value="{{ $calculation->totalAmount }}">

        
       </div>
    </div>
    <!--  Total -->
 </div>
 <!-- promotion / subtotal and Total -->