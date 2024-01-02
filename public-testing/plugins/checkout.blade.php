  <!doctype html>
  <html lang="en">
  <head>
    <title>Skin Gourmet | Checkout</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">





    <!-- include header and  navigation -->
    <?php require_once("includes/header.php");?>

    <?php require_once("includes/navigation.php");?>
    <!-- include header and  navigation -->




    <!-- main category -->

    <section class="globaltopspace">
     <div class="container-fluid container-sgm">
      <div class="row">

        <div class="col-12 col-md-8 ">
          <div class="my-4">
            <p class="text-mid-sgm">Your details</p>


            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="firstname2">First name*</label>
                  <input type="text" class="form-control" id="firstname2" placeholder="Frist name">
                </div>

                <div class="form-group col-md-6">
                  <label for="lastname2">last name*</label>
                  <input type="text" class="form-control" id="lastname2" placeholder="Last name">
                </div>
              </div>
              
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputCity">Street address *</label>
                  <input type="text" class="form-control" id="inputCity" placeholder="Enter Street address">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputCity">City *</label>
                  <input type="text" class="form-control" id="inputCity" placeholder="Enter City">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputState">Country *</label>
                  <select id="inputState" class="custom-select ">
                    <option selected>Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputState">Region</label>
                  <select id="inputState" class="custom-select ">
                    <option selected>Choose...</option>
                    <option>...</option>
                  </select>
                </div>

              </div>


              <div class="form-group">
                <p class="text-mid-sgm my-3">Your details</p>
                <div class="">
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="creditcard" name="customRadioInline1" class="custom-control-input">
                    <label class="custom-control-label" for="creditcard">Credit card</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="paypal" name="customRadioInline1" class="custom-control-input">
                    <label class="custom-control-label" for="paypal">Paypal</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="momo" name="customRadioInline1" class="custom-control-input">
                    <label class="custom-control-label" for="momo">Mobile Money</label>
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6 my-3">

                  <button type="button" class="btn btn-dark btn-dark-sgm btn-block hvr-sweep-to-right text-center">Pay now <span class="pl-2 text-right"><img src="img/icons/arrorright.svg" width="9" alt=""></span></button>
                </div>
              </div>
              
            </form>

          </div>


        </div>



        <div class="col-12 col-md-4">
          <div class="my-4">
            <p class="fot-titile">Checkout bag</p>
          </div>

          <div class="card checckoutbox "> 
            <div class="card-body mt-4">

              <div class="row">
                <div class="col-3">
                  <img src="img/pro1.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-7">
                  <p class="mb-0 newsmalltext"> Peppermint Black Soap</p>
                  <small class="">x1,  <span>500ml</span></small>
                </div>
                <div class="col-2 text-right">
                  <p class="newsmalltext2">$<span>25</span></p>
                </div>
                <div class="col-12">
                   <hr>
                </div>
              </div>

               <div class="row">
                <div class="col-3">
                  <img src="img/pro1.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-7">
                  <p class="mb-0 newsmalltext"> Peppermint Black Soap</p>
                  <small class="">x1,  <span>500ml</span></small>
                </div>
                <div class="col-2 text-right">
                  <p class="newsmalltext2">$<span>25</span></p>
                </div>
                <div class="col-12">
                   <hr>
                </div>
              </div>

              <div class="row">
                <div class="col-8">
                  <p class="mb-0 newsmalltext2">Shipping:</p>
                </div>
                <div class="col-4 text-right">
                  <p class="newsmalltext2">$<span>50</span></p>
                </div>
                <div class="col-12">
                   <hr>
                </div>
              </div>

              <div class="row">
                <div class="col-8">
                  <p class="mb-0 newsmalltext ">Total</p>
                </div>
                <div class="col-4 text-right">
                  <p class="newsmalltext2">$<span>99</span></p>
                </div>
                
              </div>

            </div>
          </div>


        </div>


      </div>
    </div>
  </section>
  <!-- main category -->









  <!-- footer includes -->
  <?php require_once("includes/footer.php");?>
  <?php require_once("includes/footerlinks.php");?>
  <!-- footer includes -->

</body>
</html>