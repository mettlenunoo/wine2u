<!doctype html>
<html lang="en">
  <head>
    <title>Wine2u | Checkout </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

   
   <!-- include navigation -->
   <link
      rel="stylesheet"
      href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"
    />

  @include("pages.includes.nav-links")
  @include("pages.includes.navigation")


<style>



.form-wizard .form-wizard-header {
  text-align: center;
}
.form-wizard .form-wizard-next-btn, .form-wizard .form-wizard-previous-btn, .form-wizard .form-wizard-submit {
  background-color: #c39154;
  color: #ffffff;
  display: inline-block;
  min-width: 100px;
  min-width: 120px;
  padding: 10px;
  text-align: center;
}

.form-wizard .wizard-fieldset {
  display: none;
}
.form-wizard .wizard-fieldset.show {
  display: block;
}
.form-wizard .wizard-form-error {
  display: none;
  background-color: #d70b0b;
  position: relative;
  left: 0;
  right: 0;
  bottom: 0;
  height: .3px;
  width: 100%;
}
.form-wizard .form-wizard-previous-btn {
    background-color: #ffffff;
    border: 1px solid #c39154;
    color: #c39154;
}

.form-wizard .form-group {
  position: relative;
  /* margin: 25px 0; */
}

.form-wizard .form-wizard-steps li {
  width: 25%;
  float: left;
  position: relative;
}

.form-wizard .form-wizard-steps li span {
  background-color: #dddddd;
  border-radius: 50%;
  display: inline-block;
  height: 40px;
  line-height: 40px;
  position: relative;
  text-align: center;
  width: 40px;
  z-index: 1;
}
.form-wizard .form-wizard-steps li:last-child::after {
  width: 50%;
}
.form-wizard .form-wizard-steps li.active span, .form-wizard .form-wizard-steps li.activated span {
  background-color: #d65470;
  color: #ffffff;
}
.form-wizard .form-wizard-steps li.active::after, .form-wizard .form-wizard-steps li.activated::after {
  background-color: #d65470;
  left: 50%;
  width: 50%;
  border-color: #d65470;
}
.form-wizard .form-wizard-steps li.activated::after {
  width: 100%;
  border-color: #d65470;
}
.form-wizard .form-wizard-steps li:last-child::after {
  left: 0;
}
.form-wizard .wizard-password-eye {
  position: absolute;
  right: 32px;
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
}
@keyframes click-radio-wave {
  0% {
    width: 25px;
    height: 25px;
    opacity: 0.35;
    position: relative;
  }
  100% {
    width: 60px;
    height: 60px;
    margin-left: -15px;
    margin-top: -15px;
    opacity: 0.0;
  }
}
@media screen and (max-width: 767px) {
  .wizard-content-left {
    height: auto;
  }
}

.main-container {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
      }

  

      .radio-buttons {
        width: 100%;
        margin: 0 auto;
        text-align: center;
      }

      .custom-radio input {
        display: none;
      }

      .radio-btn {
        margin: 10px;
        width: 250px;
        height: 200px;
        border: 1px solid #cecece;
        display: inline-block;
        border-radius: 10px;
        position: relative;
        text-align: center;
        cursor: pointer;
      }

      .radio-btn > i {
        color: #ffffff;
        background-color: #c39154;
        font-size: 20px;
        position: absolute;
        top: -15px;
        left: 50%;
        transform: translateX(-50%) scale(4);
        border-radius: 50px;
        padding: 3px;
        transition: 0.2s;
        pointer-events: none;
        opacity: 0;
      }

      .radio-btn .hobbies-icon {
        width: 80px;
        height: 80px;
        position: absolute;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
      }

      .radio-btn .hobbies-icon i {
        color: #c39154;
        line-height: 80px;
        font-size: 60px;
      }

      .radio-btn .hobbies-icon h3 {
        color: #c39154;
        font-family: "Raleway", sans-serif;
        font-size: 16px;
        font-weight: 400;
        text-transform: uppercase;
      }

      .custom-radio input:checked + .radio-btn {
        border: 3px solid #c39154;
      }

      .custom-radio input:checked + .radio-btn > i {
        opacity: 1;
        transform: translateX(-50%) scale(1);
      }


</style>
  

<style>
	.radio-buttons {
		display: grid;
		grid-template-columns: 1fr 1fr;
		grid-gap: 20px;
	}

	.custom-radio {
		margin: 0px;
	}

	.radio-btn .hobbies-icon {
		width: 100%;
	}

	.radio-btn {
		margin: 0px;
		width: 100%;
		height: 180px;
		display: block;
	}

	.form-wizard-submit {
		border: none;
	}

</style>


<section class="profile-topw">
     <div class="container">
      <div class="row">
        <div class="col-12 text-center"><h1 class="sign_title">Checkout</h1>

        </div>
      </div>
     </div>
</section>




<section class="wizard-section">
<div class="container-fluid container-w2u ">
		<div class="row no-gutters">
			<div class="col-lg-12 col-md-12">
				<div class="form-wizard">
          <form action="/checkout/create" method="post" role="form">
            @csrf
						<div class="form-wizard-header  mb-5 ">
							<ul class="list-unstyled form-wizard-steps clearfix">
								<li class="active"><span>1</span></li>
								<li><span>2</span></li>
								<li><span>3</span></li>
								<li><span>4</span></li>
							</ul>
						</div>


            <!-- step 1 -->
						<fieldset class="wizard-fieldset show">
              @include("pages.includes.checkout.step1")
						</fieldset>	
            <!-- step 1 -->


           <!-- step 2 -->
						<fieldset class="wizard-fieldset">
              @include("pages.includes.checkout.step2")
						</fieldset>	
               <!-- step 2 -->


           <!-- step 3 -->
						<fieldset class="wizard-fieldset">
              @include("pages.includes.checkout.step3")
						</fieldset>	
                   <!-- step 3 -->

						<fieldset class="wizard-fieldset">
              @include("pages.includes.checkout.step4")			
						
						</fieldset>	
					</form>
				</div>
			</div>
		</div>
    </div>
	</section>






<!-- footer includes -->
@include("pages.includes.footer")
@include("pages.includes.footer-links")

</html>