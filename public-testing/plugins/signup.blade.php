<!doctype html>
<html lang="en">
<head>
  <title>Skin Gourmet | Signup</title>
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

  <section class="">
   <div class="container-fluid">
    <div class="row centerit">

      <div class="col-12 col-md-6 logspace">
        <div class="my-4">
          <p class="text-mid-sgm">Create an account</p>

        </div>


        <div>
          <form>
            <div class="form-group">
              <label for="firstname">First Name*</label>
              <input type="text" class="form-control" id="firstname"  placeholder="Enter first name">
            </div>
            <div class="form-group">
              <label for="lastname">Last Name*</label>
              <input type="text" class="form-control" id="lastname"  placeholder="Enter last name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address*</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password*</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>

            <p class="fot-smalltxt "><a href="login.php" class="bc pb-2">Have an account? Login</a></p>

            <div class="custom-control custom-checkbox mb-4">
              <input type="checkbox" class="custom-control-input" id="customCheck1">
              <label class="custom-control-label" for="customCheck1">Join our mailing list to hear about our newest products and latest offers!</label>
            </div>
            
            <button type="button" class="btn btn-dark btn-dark-sgm btn-block text-center hvr-sweep-to-right">Create accoun <span class="pl-2 text-right"><img src="img/icons/arrorright.svg" width="8" alt=""></span></button>
          </form>
        </div>

      </div>





      <div class="col-12 col-md-6 signup ">        
      </div>
    </div>
  </div>
</section>
<!-- main category -->










<!-- footer includes -->

<?php require_once("includes/footerlinks.php");?>
<!-- footer includes -->

</body>
</html>