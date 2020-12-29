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
 <!-- <script src="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script> -->


<script>
jQuery(document).ready(function() {
	// click on next button
	jQuery('.form-wizard-next-btn').click(function() {
		var parentFieldset = jQuery(this).parents('.wizard-fieldset');
		var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
		var next = jQuery(this);
		var nextWizardStep = true;
		parentFieldset.find('.wizard-required').each(function(){
			var thisValue = jQuery(this).val();

			if( thisValue == "") {
				jQuery(this).siblings(".wizard-form-error").slideDown();
				nextWizardStep = false;
			}
			else {
				jQuery(this).siblings(".wizard-form-error").slideUp();
			}
		});
		if( nextWizardStep) {
			next.parents('.wizard-fieldset').removeClass("show","400");
			currentActiveStep.removeClass('active').addClass('activated').next().addClass('active',"400");
			next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show","400");
			jQuery(document).find('.wizard-fieldset').each(function(){
				if(jQuery(this).hasClass('show')){
					var formAtrr = jQuery(this).attr('data-tab-content');
					jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
						if(jQuery(this).attr('data-attr') == formAtrr){
							jQuery(this).addClass('active');
							var innerWidth = jQuery(this).innerWidth();
							var position = jQuery(this).position();
							jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
						}else{
							jQuery(this).removeClass('active');
						}
					});
				}
			});
		}
	});
	//click on previous button
	jQuery('.form-wizard-previous-btn').click(function() {
		var counter = parseInt(jQuery(".wizard-counter").text());;
		var prev =jQuery(this);
		var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
		prev.parents('.wizard-fieldset').removeClass("show","400");
		prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show","400");
		currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active',"400");
		jQuery(document).find('.wizard-fieldset').each(function(){
			if(jQuery(this).hasClass('show')){
				var formAtrr = jQuery(this).attr('data-tab-content');
				jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
					if(jQuery(this).attr('data-attr') == formAtrr){
						jQuery(this).addClass('active');
						var innerWidth = jQuery(this).innerWidth();
						var position = jQuery(this).position();
						jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
					}else{
						jQuery(this).removeClass('active');
					}
				});
			}
		});
	});
	//click on form submit button
	jQuery(document).on("click",".form-wizard .form-wizard-submit" , function(){
		var parentFieldset = jQuery(this).parents('.wizard-fieldset');
		var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
		parentFieldset.find('.wizard-required').each(function() {
			var thisValue = jQuery(this).val();
			if( thisValue == "" ) {
				jQuery(this).siblings(".wizard-form-error").slideDown();
			}
			else {
				jQuery(this).siblings(".wizard-form-error").slideUp();
			}
		});
	});
	// focus on input field check empty or not
	jQuery(".form-control").on('focus', function(){
		var tmpThis = jQuery(this).val();
		if(tmpThis == '' ) {
			jQuery(this).parent().addClass("focus-input");
		}
		else if(tmpThis !='' ){
			jQuery(this).parent().addClass("focus-input");
		}
	}).on('blur', function(){
		var tmpThis = jQuery(this).val();
		if(tmpThis == '' ) {
			jQuery(this).parent().removeClass("focus-input");
			jQuery(this).siblings('.wizard-form-error').slideDown("3000");
		}
		else if(tmpThis !='' ){
			jQuery(this).parent().addClass("focus-input");
			jQuery(this).siblings('.wizard-form-error').slideUp("3000");
		}
	});
});


</script>
 <!-- <script>
 $(document).ready(function(){
 
 // SmartWizard initialize
 $('#smartwizard').smartWizard({
  transition: {
      animation: 'slide-horizontal',
      speed: '400',
  },

  toolbarSettings: {
      toolbarPosition: 'bottom', // none, top, bottom, both
      toolbarButtonPosition: 'right', // left, right, center
      showNextButton: true, // show/hide a Next button
      showPreviousButton: true, // show/hide a Previous button
      toolbarExtraButtons: [] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
  },
 });
 

});
 </script> -->
 <!-- footer includes -->

  </body>
</html>