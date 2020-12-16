<!doctype html>
<html lang="en">
  <head>
    <title>Wine2u | Checkout -  Review and Confirm Order </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

   

   <!-- include navigation -->
   <?php require_once("includes/nav-links.php");?>
   <?php require_once("includes/navigation.php");?>
  <!-- include navigation -->






<section class="profile-top">
  <div class="container-fluid">
    <div class="row">
    <div class="col-12 px-0 text-center checkout-top-bar">
    <ul class="list-inline">
      <li class="list-inline-item px-md-4">
        <a href="checkout-1.php" >1. Shipping</a>
      </li>
      <li class="list-inline-item px-md-4">
        <a href="checkout-2.php" >2. Payment</a>
      </li>
      <li class="list-inline-item px-md-4">
        <a href="checkout-3.php" class="wine2upc ">3. Review & Confirm</a>
      </li>
    </ul>
    </div>
</div>
  </div>
</section>


<section class="mb-5 pb-4">
  <div class="container-fluid container-w2u mt-5 ">
   <div class="row border-between">
     <!-- left  side -->
     <div class="col-12 col-md-6 pr-md-5">
    <p> <small>3 out 3  steps</small></p>
          <h1 class="checkout-titile1">
          Review and Confirm Order
          </h1>

    

          <div class="row mt-4">
             <div class="col-12">
             <h1 class="f_titile_p2b mt-3 ">Shipping Address</h1>
             <p  class="mb-1">Micheal Doe</p>
             <p  class="mb-1">Phoenix Street, Martinson square</p>
             <p  class="mb-1">Arizona, Phoenix</p>
             <p  class="mb-1">8300, +1 343 - 343 - 4354</p>
             </div>
        </div>


        <div class="row mt-4">
             <div class="col-12">
             <h1 class="f_titile_p2b mt-3 ">Billing Address</h1>
             <p  class="mb-1">Micheal Doe</p>
             <p  class="mb-1">Phoenix Street, Martinson square</p>
             <p  class="mb-1">Arizona, Phoenix</p>
             <p  class="mb-1">8300, +1 343 - 343 - 4354</p>
             <p class="mb-1">United States of America</p>
             </div>
        </div>

        <div class="row mt-4">
             <div class="col-12">
             <h1 class="f_titile_p2b mt-3 ">Payment Method</h1>
             <p  class="mb-1">**** **** **** 3423</p>
             </div>
        </div>
     </div>
    <!-- left  side -->



    <!-- right side -->
       <div class="col-12 col-md-6 pl-md-5">
       <h1 class="checkout-titile1">Cart <span> (1)</span></h1>
       <hr>
       
       <!--  -->
       <div class="row centerit mb-3">
         <div class="col-6">
         <div class="media centerit">
            <img src="img/wineholder.jpg" class="pr-3 cartimage" alt="...">
            <div class="media-body">
              <p class="mb-0"><small><span>Bordeaux </span> |  <span>France</span></small></p>
              <p class="mt-0"><strong>2018 Estate Chardonnay</strong> </p>
            </div>
          </div>
         </div>

         <div class="col-3">
            <p>Qty: <span class="pl-2">1</span></p>
         </div>

         <div class="col-3 text-right">
           $120.00
         </div>
      
       </div>
        <!--  -->

         
      



        <!-- promotion / subtotal and Total -->
         <div class="row mt-5 pt-5">

            <!--Promotional Code?  -->
            <div class="col-12">
              <hr>
            <div class="form-group ">
              <a class="newsmalltext collapsed" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                <strong>Promotional Code?</strong>
              </a>
              <div class="multi-collapse collapse" id="multiCollapseExample1" style="">
                <div class="my-3">
                          <div class="input-group">
                              <input type="text" class="form-control  form-control-wine2u" placeholder="Coupon code" aria-label="Coupon code" aria-describedby="button-addon4">
                              <div class="input-group-append" id="button-addon4">
                                <button class="btn btn-dark  type="button">Apply </button>
                              </div>
                            </div>
                    </div>
                </div>
              </div>
                <hr>
            </div>
              <!--Promotional Code?  -->

              <!-- subtotal  -->
               <div class="col-12">
               <div class="d-flex bd-highlight mb-3">
                <div class="mr-auto p-2 bd-highlight  ">Subtotal</div>
                <div class="p-2 bd-highlight  ">$120</div>
              </div>
              <hr>
               </div>
             <!-- subtotal -->

              <!-- Shipping Cost  -->
              <div class="col-12">
               <div class="d-flex bd-highlight mb-3">
                <div class="mr-auto p-2 bd-highlight  ">Shipping Cost</div>
                <div class="p-2 bd-highlight  ">$10</div>
              </div>
               </div>
             <!-- Shipping Cost -->

             <!-- Tax  -->
             <div class="col-12">
               <div class="d-flex bd-highlight mb-3">
                <div class="mr-auto p-2 bd-highlight  ">Tax</div>
                <div class="p-2 bd-highlight  ">$10</div>
              </div>
               </div>
             <!-- Tax -->

             <!--  Total -->
             <div class="col-12 totalback">
               <div class="d-flex bd-highlight mb-3">
                <div class="mr-auto p-2 bd-highlight  font-weight-bold">Total</div>
                <div class="p-2 bd-highlight  font-weight-bold">$140</div>
              </div>
               </div>
             <!--  Total -->


          
         </div>
       <!-- promotion / subtotal and Total -->

       </div>
     <!-- right side -->


     <div class="col-12 text-center my-5">
     <button type="submit" class="btn btn-wine2u-deep px-5 ">Make Purchase</button>
     </div>
   </div>
  </div>
</section>




<!-- footer includes -->
 <?php require_once("includes/footer.php");?>
 <?php require_once("includes/footer-links.php");?>
 <!-- footer includes -->

  </body>
</html>