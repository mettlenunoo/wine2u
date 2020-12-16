<!DOCTYPE html>

<html>

<head>

  <!-- Website Title & Description for Search Engine purposes -->
  <title>Haute Vie - Signin</title>
  <link rel="shortcut icon" type="image/png" src="images/favicon.png">
  <meta charset="utf-8">
  <meta name="description" content="">

  <!-- Mobile viewport optimized -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-glyphicons.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="css/global-styles.css" rel="stylesheet">
  <link href="css/cart-styles.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">

  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <!-- Animate CSS -->
  <link href="css/animate.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Include Modernizr in the head, before any other Javascript -->
  <script src="js/modernizr-2.6.2.min.js"></script>

  <style>
    .sign-up-col {
      border-left: 1px solid #e3e3e3;
    }

    .for-log-in {
      display: flex;
      justify-content: space-between;
    }

    .py-80 {
      padding: 80px 0px;
    }

    .but1 {
      width: auto !important;
    }

    @media(max-width: 767.96px) {
      .sign-up-col {
        border-top: 1px solid #e3e3e3;
        padding-top: 25px;
      }
    }
  </style>

</head>

<body>
  <?php require_once("includes/header.php");?>

  <section class="py-80">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <h3>Have an account? Sign In</h3>
          <br>
          <form>
            <div class="form-group">
              <label for="username">Username or Email</label>
              <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
              <label for="Password">Password</label>
              <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
              <input class="form-check-input" type="checkbox" value="" name="remember-me">
              <label class="form-check-label pb-2" for="remember-me">
                Remember Me
              </label>
            </div>
            <div class="form-group">
              <button type="submit" class="but1">Sign In</button>
            </div>
          </form>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 sign-up-col">
          <h3>New User? Register Now</h3>
          <br>
          <form>
            <div class="form-group">
              <label for="fullName">Full Name</label>
              <input type="text" class="form-control" name="fullname">
            </div>
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" name="username">
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <label for="password">Paasword</label>
                  <input type="password" class="form-control" name="password">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <label for="re-password">Re-enter Password</label>
                  <input type="password" class="form-control" name="re-password">
                </div>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="but1">REGISTER</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <?php require_once("includes/footer.php");?>
  <script>
    $(document).ready(function () {
      $(".coup").click(function () {
        $(".coup-in").toggleClass("reveal-coup");
      });
      $('#reveal-it').click(function () {
        $('#reveal-me').toggleClass("hide-me");
      })
    })
  </script>
</body>

</html>