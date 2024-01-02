  <!doctype html>
  <html lang="en">
  <head>
    <title>Skin Gourmet | Edit Profile</title>
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

        <div class="col-12 col-md-12 ">
          <div class="my-4">
            <div class="row">
              <div class="col-7">
                <p class="text-mid-sgm">Hi <span>Firstname</span>, edit your account</p>
              </div>

              <div class="col-5 text-right">
                <ul class="list-inline  ">
                  <li class="list-inline-item "><a href="account.php" class="editfonttop active">Your details</a> | </li>
                  <li class="list-inline-item "><a href="orders.php" class="editfonttop">Orders</a></li>
                </ul>
              </div>
            </div>



            <div class="card editpro">
              <div class="card-body">
                <div class="row">
                  <div class="col-7">
                     <p class="text-mid-sgm">Personal details</p>
                  </div>

                   <div class="col-5 text-right">
                     <p class="bc"><a href="#" class="bc">Save</a></p>
                  </div>
                </div>
               
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

                  <div class="form-group col-md-6">
                    <label for="email">Email*</label>
                    <input type="email" class="form-control" id="email" placeholder="Email">
                  </div>

                </div>




               <!--  <div class="form-row">
                  <div class="form-group col-md-6 my-3">

                    <button type="button" class="btn btn-dark btn-dark-sgm btn-block text-center">Pay now <span class="pl-2 text-right"><img src="img/icons/arrorright.svg" width="9" alt=""></span></button>
                  </div>
                </div> -->

              </form>
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