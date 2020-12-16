<!DOCTYPE html>
<html lang="en">
<head>

	<title>Haute Vie - Terms</title>

	<link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png')}}">

	<meta name="description" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}" />

	<!-- Mobile viewport optimized -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!-- Bootstrap CSS -->
	<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{ asset('css/bootstrap-glyphicons.css')}}" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="{{ asset('css/global-styles.css')}}" rel="stylesheet">
	<link href="{{ asset('css/index-styles.css')}}" rel="stylesheet">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">

	<!-- Owl Carousel CSS -->
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css')}}">

	<!-- Animate CSS -->
	<link href="{{ asset('css/animate.css')}}" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="{{ asset('fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">	

	<!-- Modernizer -->
	<script src="{{ asset('js/modernizr-2.6.2.min.js')}}"></script>	

	<!-- Material Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


	<style type="text/css">
		.term {
			padding-top: 120px;
			padding-bottom: 120px;
			background: #f8f8f8;
		}

		.term h2 {
			font-weight: 400;
			margin-top: 0px;
			font-size: 30px;
			margin-bottom: 40px;
		}

		.term h4 {
			margin-top: 0px;
			font-weight: 600;
			font-size: 15px;
		}

			.form-control {
			background: #fff;
			padding-top: 15px;
			padding-bottom: 15px;
			height: 40px;
			border-radius: 0px;
			color: #333;
			font-weight: 400;
			border: 1px solid #f0f0f0;
			box-shadow: none;
		}

		.form-control:focus {
			border-color: #f8f8f8;
			outline: 0;
			-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102,175,233,.6);
			box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0);
		}

		.loginbtn {
			background: #545454;
			padding: 15px 30px;
			border: 1px solid #545454;
			color: #ffffff !important;
			width: 100%;
			margin-top: 20px;
			margin-bottom: 20px;
			border-radius: 1px;
		}

			.loginbtn:hover {
			background: #545454;
			padding: 15px 30px;
			border: 1px solid #545454;
			color: #ffffff !important; 
			width: 100%;
			margin-top: 20px;
			margin-bottom: 20px;
			border-radius: 1px;
			color: #ffffff;
		}

		.text-mid-sgm {
    font-weight: 600;
    font-size: 24px;
    line-height: 48px;
    color: #000000;
}
	</style>
</head>
<body>

	@include('frontend.inc.header')

	<div class="term">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">



					<section class="globaltopspace">
						<div class="container-fluid container-sgm">
							<div class="row">

								<div class="col-12 col-md-12 ">
									<div class="my-4">
										<div class="row">
											<div class="col-7">
												<h3 class="text-mid-sgm">Hi <span> {{ auth('customer')->user()->fname }}</span>, edit your account</h3>
												<hr>
											</div>

											<div class="col-5 text-right">
												<ul class="list-inline  ">
													<li class="list-inline-item "><a href="/{{ strtolower($shop->country) }}/account" class="editfonttop active">Your details</a> | </li>
													<li class="list-inline-item "><a href="/{{ strtolower( $shop->country) }}/account/orders" class="editfonttop">Orders</a></li>
												</ul>
											</div>
										</div>



										<div class="card editpro">
											<div class="card-body">
												<div class="row">
													<div class="col-7 col-md-7">
														<p class="text-mid-sgm">Personal details</p>
													</div>

													<div class="col-5 col-md-5 text-right">
														{{-- <p class="bc"><a href="#" class="bc">Save</a></p> --}}
													</div>
												</div>

												<form action="/account/profile/update" method="POST">
													@csrf
													<div class="form-row">
														<div class="form-group col-md-6">
															<label for="firstname2">First name*</label>
															<input type="text" class="form-control" name="fname" placeholder="Frist name" value="{{ auth('customer')->user()->fname }}">
															<input type="hidden" class="form-control" name="shop"  value="{{ strtolower($shop->country) }}">
														</div>

														<div class="form-group col-md-6">
															<label for="lastname2">last name*</label>
															<input type="text" class="form-control" name="lname" placeholder="Last name" value="{{ auth('customer')->user()->lname }}">
														</div>
													</div>

													<div class="form-row">
														<div class="form-group col-md-6">
															<label for="firstname2">Email*</label>
															<input type="text" class="form-control" name="email" placeholder="Email" value="{{ auth('customer')->user()->email }}">
														</div>

														<div class="form-group col-md-6">
															<label for="lastname2">Phone Number</label>
															<input type="text" class="form-control" name="phonenumber" placeholder="Phone Number" value="{{ auth('customer')->user()->phone }}">
														</div>
													</div>

													<div class="form-row">

														<div class="form-group col-md-6">
															<label for="inputState">Country *</label>
															<select id="inputState" class="custom-select form-control " name="country">
																<option selected>Choose...</option>
																<option @if(auth('customer')->user()->country == "land Islands") selected @endif  value="land Islands">&#197;land Islands</option>
																<option @if(auth('customer')->user()->country == "Afghanistan") selected @endif value="Afghanistan">Afghanistan</option>
																<option @if(auth('customer')->user()->country == "Albania") selected @endif  value="Albania">Albania</option>
																<option @if(auth('customer')->user()->country == "Algeria") selected @endif value="Algeria">Algeria</option>
																<option @if(auth('customer')->user()->country == "American Samoa") selected @endif  value="American Samoa">American Samoa</option>
																<option @if(auth('customer')->user()->country == "Andorra") selected @endif value="Andorra">Andorra</option>
																<option @if(auth('customer')->user()->country == "Angola") selected @endif  value="Angola">Angola</option>
																<option @if(auth('customer')->user()->country == "Anguilla") selected @endif  value="Anguilla">Anguilla</option>
																<option @if(auth('customer')->user()->country == "Antarctica") selected @endif  value="Antarctica">Antarctica</option>
																<option @if(auth('customer')->user()->country == "Antigua and Barbud") selected @endif  value="Antigua and Barbud">Antigua and Barbuda</option>
																<option @if(auth('customer')->user()->country == "Argentina") selected @endif  value="Argentina">Argentina</option>
																<option @if(auth('customer')->user()->country == "Armenia") selected @endif value="Armenia">Armenia</option>
																<option @if(auth('customer')->user()->country == "Aruba") selected @endif value="Aruba">Aruba</option>
																<option @if(auth('customer')->user()->country == "Australia") selected @endif value="Australia">Australia</option>
																<option @if(auth('customer')->user()->country == "Austria") selected @endif value="Austria">Austria</option>
																<option @if(auth('customer')->user()->country == "Azerbaijan") selected @endif value="Azerbaijan">Azerbaijan</option>
																<option @if(auth('customer')->user()->country == "Bahamas") selected @endif value="Bahamas">Bahamas</option>
																<option @if(auth('customer')->user()->country == "Bahrain") selected @endif value="Bahrain">Bahrain</option>
																<option @if(auth('customer')->user()->country == "Bangladesh") selected @endif value="Bangladesh">Bangladesh</option>
																<option @if(auth('customer')->user()->country == "Barbados") selected @endif value="Barbados">Barbados</option>
																<option @if(auth('customer')->user()->country == "Belarus") selected @endif value="Belarus">Belarus</option>
																<option @if(auth('customer')->user()->country == "Belau") selected @endif value="Belau">Belau</option>
																<option @if(auth('customer')->user()->country == "Belgium") selected @endif value="Belgium">Belgium</option>
																<option @if(auth('customer')->user()->country == "Belize") selected @endif value="Belize">Belize</option>
																<option @if(auth('customer')->user()->country == "Benin") selected @endif value="Benin">Benin</option>
																<option @if(auth('customer')->user()->country == "Bermuda") selected @endif value="Bermuda">Bermuda</option>
																<option @if(auth('customer')->user()->country == "Bhutan") selected @endif value="Bhutan">Bhutan</option>
																<option @if(auth('customer')->user()->country == "Bolivia") selected @endif value="Bolivia">Bolivia</option>
																<option @if(auth('customer')->user()->country == "Bonaire, Saint Eustatius and Saba") selected @endif value="Bonaire, Saint Eustatius and Saba">Bonaire, Saint Eustatius and Saba</option>
																<option @if(auth('customer')->user()->country == "Bosnia and Herzegovina") selected @endif value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
																<option @if(auth('customer')->user()->country == "Botswana") selected @endif value="Botswana">Botswana</option>
																<option @if(auth('customer')->user()->country == "Bouvet Island") selected @endif value="Bouvet Island">Bouvet Island</option>
																<option @if(auth('customer')->user()->country == "Brazil") selected @endif value="Brazil">Brazil</option>
																<option @if(auth('customer')->user()->country == "British Indian Ocean Territory") selected @endif value="British Indian Ocean Territory">British Indian Ocean Territory</option>
																<option @if(auth('customer')->user()->country == "Brunei") selected @endif value="Brunei">Brunei</option>
																<option @if(auth('customer')->user()->country == "Bulgaria") selected @endif value="Bulgaria">Bulgaria</option>
																<option @if(auth('customer')->user()->country == "Burkina Faso") selected @endif value="Burkina Faso">Burkina Faso</option>
																<option @if(auth('customer')->user()->country == "Burundi") selected @endif value="Burundi">Burundi</option>
																<option @if(auth('customer')->user()->country == "Cambodia") selected @endif value="Cambodia">Cambodia</option>
																<option @if(auth('customer')->user()->country == "Cameroon") selected @endif value="Cameroon">Cameroon</option>
																<option @if(auth('customer')->user()->country == "Canada") selected @endif value="Canada">Canada</option>
																<option @if(auth('customer')->user()->country == "Cape Verde") selected @endif value="Cape Verde">Cape Verde</option>
																<option @if(auth('customer')->user()->country == "Cayman Islands") selected @endif value="Cayman Islands">Cayman Islands</option>
																<option @if(auth('customer')->user()->country == "Central African Republic") selected @endif value="Central African Republic">Central African Republic</option>
																<option @if(auth('customer')->user()->country == "Chad") selected @endif value="Chad">Chad</option>
																<option @if(auth('customer')->user()->country == "Chile") selected @endif value="Chile">Chile</option>
																<option @if(auth('customer')->user()->country == "China") selected @endif value="China">China</option>
																<option @if(auth('customer')->user()->country == "Christmas Island") selected @endif value="Christmas Island">Christmas Island</option>
																<option @if(auth('customer')->user()->country == "Cocos (Keeling) Islands") selected @endif value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
																<option @if(auth('customer')->user()->country == "Colombia") selected @endif value="Colombia">Colombia</option>
																<option @if(auth('customer')->user()->country == "Comoros") selected @endif value="Comoros">Comoros</option>
																<option @if(auth('customer')->user()->country == "Congo (Brazzaville)") selected @endif value="Congo (Brazzaville)">Congo (Brazzaville)</option>
																<option @if(auth('customer')->user()->country == "Congo (Kinshasa)") selected @endif value="Congo (Kinshasa)">Congo (Kinshasa)</option>
																<option @if(auth('customer')->user()->country == "Cook Islands") selected @endif value="Cook Islands">Cook Islands</option>
																<option @if(auth('customer')->user()->country == "Costa Rica") selected @endif value="Costa Rica">Costa Rica</option>
																<option @if(auth('customer')->user()->country == "Croatia") selected @endif value="Croatia">Croatia</option>
																<option @if(auth('customer')->user()->country == "Cuba") selected @endif value="Cuba">Cuba</option>
																<option @if(auth('customer')->user()->country == "Cura") selected @endif value="Cura">Cura&ccedil;ao</option>
																<option @if(auth('customer')->user()->country == "Cyprus") selected @endif value="Cyprus">Cyprus</option>
																<option @if(auth('customer')->user()->country == "Czech Republic") selected @endif value="Czech Republic">Czech Republic</option>
																<option @if(auth('customer')->user()->country == "Denmark") selected @endif value="Denmark">Denmark</option>
																<option @if(auth('customer')->user()->country == "DJ") selected @endif value="DJ">Djibouti</option>
																<option @if(auth('customer')->user()->country == "Djibouti") selected @endif value="Djibouti">Dominica</option>
																<option @if(auth('customer')->user()->country == "Dominican Republic") selected @endif value="Dominican Republic">Dominican Republic</option>
																<option @if(auth('customer')->user()->country == "Ecuador") selected @endif value="Ecuador">Ecuador</option>
																<option @if(auth('customer')->user()->country == "Egypt") selected @endif value="Egypt">Egypt</option>
																<option @if(auth('customer')->user()->country == "El Salvador") selected @endif value="El Salvador">El Salvador</option>
																<option @if(auth('customer')->user()->country == "Equatorial Guinea") selected @endif value="Equatorial Guinea">Equatorial Guinea</option>
																<option @if(auth('customer')->user()->country == "Eritrea") selected @endif value="Eritrea">Eritrea</option>
																<option @if(auth('customer')->user()->country == "Estonia") selected @endif value="Estonia">Estonia</option>
																<option @if(auth('customer')->user()->country == "Ethiopia") selected @endif value="Ethiopia">Ethiopia</option>
																<option @if(auth('customer')->user()->country == "Falkland Islands") selected @endif value="Falkland Islands">Falkland Islands</option>
																<option @if(auth('customer')->user()->country == "Faroe Islands") selected @endif value="Faroe Islands">Faroe Islands</option>
																<option @if(auth('customer')->user()->country == "Fiji") selected @endif value="Fiji">Fiji</option>
																<option @if(auth('customer')->user()->country == "Finland") selected @endif value="Finland">Finland</option>
																<option @if(auth('customer')->user()->country == "France") selected @endif value="France">France</option>
																<option @if(auth('customer')->user()->country == "French Guiana") selected @endif value="French Guiana">French Guiana</option>
																<option @if(auth('customer')->user()->country == "French Polynesia") selected @endif value="French Polynesia">French Polynesia</option>
																<option @if(auth('customer')->user()->country == "French Southern Territories") selected @endif value="French Southern Territories">French Southern Territories</option>
																<option @if(auth('customer')->user()->country == "Gabon") selected @endif value="Gabon">Gabon</option>
																<option @if(auth('customer')->user()->country == "Gambia") selected @endif value="Gambia">Gambia</option>
																<option @if(auth('customer')->user()->country == "Georgia") selected @endif value="Georgia">Georgia</option>
																<option @if(auth('customer')->user()->country == "Germany") selected @endif value="Germany">Germany</option>
																<option @if(auth('customer')->user()->country == "Ghana") selected @endif value="Ghana">Ghana</option>
																<option @if(auth('customer')->user()->country == "Gibraltar") selected @endif value="Gibraltar">Gibraltar</option>
																<option @if(auth('customer')->user()->country == "Greece") selected @endif value="Greece">Greece</option>
																<option @if(auth('customer')->user()->country == "Greenland") selected @endif value="Greenland">Greenland</option>
																<option @if(auth('customer')->user()->country == "Grenada") selected @endif value="Grenada">Grenada</option>
																<option @if(auth('customer')->user()->country == "Guadeloupe") selected @endif value="Guadeloupe">Guadeloupe</option>
																<option @if(auth('customer')->user()->country == "Guam") selected @endif value="Guam">Guam</option>
																<option @if(auth('customer')->user()->country == "Guatemala") selected @endif value="Guatemala">Guatemala</option>
																<option @if(auth('customer')->user()->country == "Guernsey") selected @endif value="Guernsey">Guernsey</option>
																<option @if(auth('customer')->user()->country == "Guinea") selected @endif value="Guinea">Guinea</option>
																<option @if(auth('customer')->user()->country == "Guinea-Bissau") selected @endif value="Guinea-Bissau">Guinea-Bissau</option>
																<option @if(auth('customer')->user()->country == "Guyana") selected @endif value="Guyana">Guyana</option>
																<option @if(auth('customer')->user()->country == "Haiti") selected @endif value="Haiti">Haiti</option>
																<option @if(auth('customer')->user()->country == "Heard Island and McDonald Islands") selected @endif value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
																<option @if(auth('customer')->user()->country == "Honduras") selected @endif value="Honduras">Honduras</option>
																<option @if(auth('customer')->user()->country == "Hong Kong") selected @endif value="Hong Kong">Hong Kong</option>
																<option @if(auth('customer')->user()->country == "Hungary") selected @endif value="Hungary">Hungary</option>
																<option @if(auth('customer')->user()->country == "Iceland") selected @endif value="Iceland">Iceland</option>
																<option @if(auth('customer')->user()->country == "India") selected @endif value="India">India</option>
																<option @if(auth('customer')->user()->country == "Indonesia") selected @endif value="Indonesia">Indonesia</option>
																<option @if(auth('customer')->user()->country == "Iran") selected @endif value="Iran">Iran</option>
																<option @if(auth('customer')->user()->country == "Iraq") selected @endif value="Iraq">Iraq</option>
																<option @if(auth('customer')->user()->country == "Ireland") selected @endif value="Ireland">Ireland</option>
																<option @if(auth('customer')->user()->country == "Isle of Man") selected @endif value="Isle of Man">Isle of Man</option>
																<option @if(auth('customer')->user()->country == "Israel") selected @endif value="Israel">Israel</option>
																<option @if(auth('customer')->user()->country == "Italy") selected @endif value="Italy">Italy</option>
																<option @if(auth('customer')->user()->country == "Ivory Coast") selected @endif value="Ivory Coast">Ivory Coast</option>
																<option @if(auth('customer')->user()->country == "Jamaica") selected @endif value="Jamaica">Jamaica</option>
																<option @if(auth('customer')->user()->country == "Japan") selected @endif value="Japan">Japan</option>
																<option @if(auth('customer')->user()->country == "Jersey") selected @endif value="Jersey">Jersey</option>
																<option @if(auth('customer')->user()->country == "Jordan") selected @endif value="Jordan">Jordan</option>
																<option @if(auth('customer')->user()->country == "Kazakhstan") selected @endif value="Kazakhstan">Kazakhstan</option>
																<option @if(auth('customer')->user()->country == "Kenya") selected @endif value="Kenya">Kenya</option>
																<option @if(auth('customer')->user()->country == "Kiribati") selected @endif value="Kiribati">Kiribati</option>
																<option @if(auth('customer')->user()->country == "Kuwait") selected @endif value="Kuwait">Kuwait</option>
																<option @if(auth('customer')->user()->country == "Kyrgyzstan") selected @endif value="Kyrgyzstan">Kyrgyzstan</option>
																<option @if(auth('customer')->user()->country == "Laos") selected @endif value="Laos">Laos</option>
																<option @if(auth('customer')->user()->country == "Latvia") selected @endif value="Latvia">Latvia</option>
																<option @if(auth('customer')->user()->country == "Lebanon") selected @endif value="Lebanon">Lebanon</option>
																<option @if(auth('customer')->user()->country == "Lesotho") selected @endif value="Lesotho">Lesotho</option>
																<option @if(auth('customer')->user()->country == "Liberia") selected @endif value="Liberia">Liberia</option>
																<option @if(auth('customer')->user()->country == "Libya") selected @endif value="Libya">Libya</option>
																<option @if(auth('customer')->user()->country == "Liechtenstein") selected @endif value="Liechtenstein">Liechtenstein</option>
																<option @if(auth('customer')->user()->country == "Lithuania") selected @endif value="Lithuania">Lithuania</option>
																<option @if(auth('customer')->user()->country == "Luxembourg") selected @endif value="Luxembourg">Luxembourg</option>
																<option @if(auth('customer')->user()->country == "Macao S.A.R., China") selected @endif value="Macao S.A.R., China">Macao S.A.R., China</option>
																<option @if(auth('customer')->user()->country == "Madagascar") selected @endif value="Madagascar">Madagascar</option>
																<option @if(auth('customer')->user()->country == "Malawi") selected @endif value="Malawi">Malawi</option>
																<option @if(auth('customer')->user()->country == "Malaysia") selected @endif value="Malaysia">Malaysia</option>
																<option @if(auth('customer')->user()->country == "Maldives") selected @endif value="Maldives">Maldives</option>
																<option @if(auth('customer')->user()->country == "Mali") selected @endif value="Mali">Mali</option>
																<option @if(auth('customer')->user()->country == "Malta") selected @endif value="Malta">Malta</option>
																<option @if(auth('customer')->user()->country == "Marshall Islands") selected @endif value="Marshall Islands">Marshall Islands</option>
																<option @if(auth('customer')->user()->country == "Martinique") selected @endif value="Martinique">Martinique</option>
																<option @if(auth('customer')->user()->country == "Mauritania") selected @endif value="Mauritania">Mauritania</option>
																<option @if(auth('customer')->user()->country == "Mauritius") selected @endif value="Mauritius">Mauritius</option>
																<option @if(auth('customer')->user()->country == "Mayotte") selected @endif value="Mayotte">Mayotte</option>
																<option @if(auth('customer')->user()->country == "Mexico") selected @endif value="Mexico">Mexico</option>
																<option @if(auth('customer')->user()->country == "Micronesia") selected @endif value="Micronesia">Micronesia</option>
																<option @if(auth('customer')->user()->country == "Moldova") selected @endif value="Moldova">Moldova</option>
																<option @if(auth('customer')->user()->country == "Monaco") selected @endif value="Monaco">Monaco</option>
																<option @if(auth('customer')->user()->country == "Mongolia") selected @endif value="Mongolia">Mongolia</option>
																<option @if(auth('customer')->user()->country == "Montenegro") selected @endif value="Montenegro">Montenegro</option>
																<option @if(auth('customer')->user()->country == "Montserrat") selected @endif value="Montserrat">Montserrat</option>
																<option @if(auth('customer')->user()->country == "Morocco") selected @endif value="Morocco">Morocco</option>
																<option @if(auth('customer')->user()->country == "Mozambique") selected @endif value="Mozambique">Mozambique</option>
																<option @if(auth('customer')->user()->country == "Myanmar") selected @endif value="Myanmar">Myanmar</option>
																<option @if(auth('customer')->user()->country == "Namibia") selected @endif value="Namibia">Namibia</option>
																<option @if(auth('customer')->user()->country == "Nauru") selected @endif value="Nauru">Nauru</option>
																<option @if(auth('customer')->user()->country == "Nepal") selected @endif value="Nepal">Nepal</option>
																<option @if(auth('customer')->user()->country == "Netherlands") selected @endif value="Netherlands">Netherlands</option>
																<option @if(auth('customer')->user()->country == "New Caledonia") selected @endif value="New Caledonia">New Caledonia</option>
																<option @if(auth('customer')->user()->country == "New Zealand") selected @endif value="New Zealand">New Zealand</option>
																<option @if(auth('customer')->user()->country == "Nicaragua") selected @endif value="Nicaragua">Nicaragua</option>
																<option @if(auth('customer')->user()->country == "Niger") selected @endif value="Niger">Niger</option>
																<option @if(auth('customer')->user()->country == "Nigeria") selected @endif value="Nigeria">Nigeria</option>
																<option @if(auth('customer')->user()->country == "Niue") selected @endif value="Niue">Niue</option>
																<option @if(auth('customer')->user()->country == "Norfolk Island") selected @endif value="Norfolk Island">Norfolk Island</option>
																<option @if(auth('customer')->user()->country == "North Korea") selected @endif value="North Korea">North Korea</option>
																<option @if(auth('customer')->user()->country == "North Macedonia") selected @endif value="North Macedonia">North Macedonia</option>
																<option @if(auth('customer')->user()->country == "Northern Mariana Islands") selected @endif value="Northern Mariana Islands">Northern Mariana Islands</option>
																<option @if(auth('customer')->user()->country == "Norway") selected @endif value="Norway">Norway</option>
																<option @if(auth('customer')->user()->country == "Oman") selected @endif value="Oman">Oman</option>
																<option @if(auth('customer')->user()->country == "Pakistan") selected @endif value="Pakistan">Pakistan</option>
																<option @if(auth('customer')->user()->country == "Palestinian Territory") selected @endif value="Palestinian Territory">Palestinian Territory</option>
																<option @if(auth('customer')->user()->country == "Panama") selected @endif value="Panama">Panama</option>
																<option @if(auth('customer')->user()->country == "Papua New Guinea") selected @endif value="Papua New Guinea">Papua New Guinea</option>
																<option @if(auth('customer')->user()->country == "Paraguay") selected @endif value="Paraguay">Paraguay</option>
																<option @if(auth('customer')->user()->country == "Peru") selected @endif value="Peru">Peru</option>
																<option @if(auth('customer')->user()->country == "Philippines") selected @endif value="Philippines">Philippines</option>
																<option @if(auth('customer')->user()->country == "Pitcairn") selected @endif value="Pitcairn">Pitcairn</option>
																<option @if(auth('customer')->user()->country == "Poland") selected @endif value="Poland">Poland</option>
																<option @if(auth('customer')->user()->country == "Portugal") selected @endif value="Portugal">Portugal</option>
																<option @if(auth('customer')->user()->country == "Puerto Rico") selected @endif value="Puerto Rico">Puerto Rico</option>
																<option @if(auth('customer')->user()->country == "Qatar") selected @endif value="Qatar">Qatar</option>
																<option @if(auth('customer')->user()->country == "Reunion") selected @endif value="Reunion">Reunion</option>
																<option @if(auth('customer')->user()->country == "Romania") selected @endif value="Romania">Romania</option>
																<option @if(auth('customer')->user()->country == "Russia") selected @endif value="Russia">Russia</option>
																<option @if(auth('customer')->user()->country == "Rwanda") selected @endif value="Rwanda">Rwanda</option>
																<option @if(auth('customer')->user()->country == "So Tom and Prncipe") selected @endif value="So Tom and Prncipe">S&atilde;o Tom&eacute; and Pr&iacute;ncipe</option>
																<option @if(auth('customer')->user()->country == "Saint Barthlemy") selected @endif value="Saint Barthlemy">Saint Barth&eacute;lemy</option>
																<option @if(auth('customer')->user()->country == "Saint Helena") selected @endif value="Saint Helena">Saint Helena</option>
																<option @if(auth('customer')->user()->country == "Saint Kitts and Nevis") selected @endif value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
																<option @if(auth('customer')->user()->country == "Saint Lucia") selected @endif value="Saint Lucia">Saint Lucia</option>
																<option @if(auth('customer')->user()->country == "Saint Martin (Dutch part)") selected @endif value="Saint Martin (Dutch part)">Saint Martin (Dutch part)</option>
																<option @if(auth('customer')->user()->country == "Saint Martin (French part)") selected @endif value="Saint Martin (French part)">Saint Martin (French part)</option>
																<option @if(auth('customer')->user()->country == "Saint Pierre and Miquelon") selected @endif value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
																<option @if(auth('customer')->user()->country == "Saint Vincent and the Grenadines") selected @endif value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
																<option @if(auth('customer')->user()->country == "Samoa") selected @endif value="Samoa">Samoa</option>
																<option @if(auth('customer')->user()->country == "San Marino") selected @endif value="San Marino">San Marino</option>
																<option @if(auth('customer')->user()->country == "Saudi Arabia") selected @endif value="Saudi Arabia">Saudi Arabia</option>
																<option @if(auth('customer')->user()->country == "Senegal") selected @endif value="Senegal">Senegal</option>
																<option @if(auth('customer')->user()->country == "Serbia") selected @endif value="Serbia">Serbia</option>
																<option @if(auth('customer')->user()->country == "Seychelles") selected @endif value="Seychelles">Seychelles</option>
																<option @if(auth('customer')->user()->country == "Sierra Leone") selected @endif value="Sierra Leone">Sierra Leone</option>
																<option @if(auth('customer')->user()->country == "Singapore") selected @endif value="Singapore">Singapore</option>
																<option @if(auth('customer')->user()->country == "Slovakia") selected @endif value="Slovakia">Slovakia</option>
																<option @if(auth('customer')->user()->country == "Slovenia") selected @endif value="Slovenia">Slovenia</option>
																<option @if(auth('customer')->user()->country == "Solomon Islands") selected @endif value="Solomon Islands">Solomon Islands</option>
																<option @if(auth('customer')->user()->country == "Somalia") selected @endif value="Somalia">Somalia</option>
																<option @if(auth('customer')->user()->country == "South Africa") selected @endif value="South Africa">South Africa</option>
																<option @if(auth('customer')->user()->country == "South Georgia/Sandwich Islands") selected @endif value="South Georgia/Sandwich Islands">South Georgia/Sandwich Islands</option>
																<option @if(auth('customer')->user()->country == "South Korea") selected @endif value="South Korea">South Korea</option>
																<option @if(auth('customer')->user()->country == "South Sudan") selected @endif value="South Sudan">South Sudan</option>
																<option @if(auth('customer')->user()->country == "Spain") selected @endif value="Spain">Spain</option>
																<option @if(auth('customer')->user()->country == "Sri Lanka") selected @endif value="Sri Lanka">Sri Lanka</option>
																<option @if(auth('customer')->user()->country == "Sudan") selected @endif value="Sudan">Sudan</option>
																<option @if(auth('customer')->user()->country == "Suriname") selected @endif value="Suriname">Suriname</option>
																<option @if(auth('customer')->user()->country == "Svalbard and Jan Mayen") selected @endif value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
																<option @if(auth('customer')->user()->country == "Swaziland") selected @endif value="Swaziland">Swaziland</option>
																<option @if(auth('customer')->user()->country == "Sweden") selected @endif value="Sweden">Sweden</option>
																<option @if(auth('customer')->user()->country == "Switzerland") selected @endif value="Switzerland">Switzerland</option>
																<option @if(auth('customer')->user()->country == "Syria") selected @endif value="Syria">Syria</option>
																<option @if(auth('customer')->user()->country == "Taiwan") selected @endif value="Taiwan">Taiwan</option>
																<option @if(auth('customer')->user()->country == "Tajikistan") selected @endif value="Tajikistan">Tajikistan</option>
																<option @if(auth('customer')->user()->country == "Tanzania") selected @endif value="Tanzania">Tanzania</option>
																<option @if(auth('customer')->user()->country == "Thailand") selected @endif value="Thailand">Thailand</option>
																<option @if(auth('customer')->user()->country == "Timor-Leste") selected @endif value="Timor-Leste">Timor-Leste</option>
																<option @if(auth('customer')->user()->country == "Togo") selected @endif value="Togo">Togo</option>
																<option @if(auth('customer')->user()->country == "Tokelau") selected @endif value="Tokelau">Tokelau</option>
																<option @if(auth('customer')->user()->country == "Tonga") selected @endif value="Tonga">Tonga</option>
																<option @if(auth('customer')->user()->country == "Trinidad and Tobago") selected @endif value="Trinidad and Tobago">Trinidad and Tobago</option>
																<option @if(auth('customer')->user()->country == "Tunisia") selected @endif value="Tunisia">Tunisia</option>
																<option @if(auth('customer')->user()->country == "Turkey") selected @endif value="Turkey">Turkey</option>
																<option @if(auth('customer')->user()->country == "Turkmenistan") selected @endif value="Turkmenistan">Turkmenistan</option>
																<option @if(auth('customer')->user()->country == "Turks and Caicos Islands") selected @endif value="Turks and Caicos Islands">Turks and Caicos Islands</option>
																<option @if(auth('customer')->user()->country == "Tuvalu") selected @endif value="Tuvalu">Tuvalu</option>
																<option @if(auth('customer')->user()->country == "Uganda") selected @endif value="Uganda">Uganda</option>
																<option @if(auth('customer')->user()->country == "Ukraine") selected @endif value="Ukraine">Ukraine</option>
																<option @if(auth('customer')->user()->country == "United Arab Emirates") selected @endif value="United Arab Emirates">United Arab Emirates</option>
																<option @if(auth('customer')->user()->country == "United Kingdom (UK)") selected @endif value="United Kingdom (UK)">United Kingdom (UK)</option>
																<option @if(auth('customer')->user()->country == "United States (US)") selected @endif value="United States (US)">United States (US)</option>
																<option @if(auth('customer')->user()->country == "United States (US) Minor Outlying Islands") selected @endif value="United States (US) Minor Outlying Islands">United States (US) Minor Outlying Islands</option>
																<option @if(auth('customer')->user()->country == "Uruguay") selected @endif value="Uruguay">Uruguay</option>
																<option @if(auth('customer')->user()->country == "Uzbekistan") selected @endif value="Uzbekistan">Uzbekistan</option>
																<option @if(auth('customer')->user()->country == "Vanuatu") selected @endif value="Vanuatu">Vanuatu</option>
																<option @if(auth('customer')->user()->country == "Vatican") selected @endif value="Vatican">Vatican</option>
																<option @if(auth('customer')->user()->country == "Venezuela") selected @endif value="Venezuela">Venezuela</option>
																<option @if(auth('customer')->user()->country == "Vietnam") selected @endif value="Vietnam">Vietnam</option>
																<option @if(auth('customer')->user()->country == "Virgin Islands (British)") selected @endif value="Virgin Islands (British)">Virgin Islands (British)</option>
																<option @if(auth('customer')->user()->country == "Virgin Islands (US)") selected @endif value="Virgin Islands (US)">Virgin Islands (US)</option>
																<option @if(auth('customer')->user()->country == "Wallis and Futuna") selected @endif value="Wallis and Futuna">Wallis and Futuna</option>
																<option @if(auth('customer')->user()->country == "Western Sahara") selected @endif value="Western Sahara">Western Sahara</option>
																<option @if(auth('customer')->user()->country == "Yemen") selected @endif value="Yemen">Yemen</option>
																<option @if(auth('customer')->user()->country == "Zambia") selected @endif value="Zambia">Zambia</option>
																<option @if(auth('customer')->user()->country == "Zimbabwe") selected @endif value="Zimbabwe">Zimbabwe</option>
															</select>
														</div>

														<div class="form-group col-md-6">
															<label for="inputState">Region / State</label>
															<input type="text" class="form-control" name="state" placeholder="Enter Region" value="{{ auth('customer')->user()->state }}">
														</select>
													</div>

													<div class="form-group col-md-6">
														<label for="inputCity">City </label>
														<input type="text" class="form-control" name="city" placeholder="Enter City" value="{{ auth('customer')->user()->city }}">
													</div>


													<div class="form-group col-md-6">
														<label for="inputCity">Street address </label>
														<input type="text" class="form-control" name="street" placeholder="Enter Street address" value="{{ auth('customer')->user()->street }}">
													</div>

													<div class="form-group col-md-6">
														<label for="inputCity">Apartment </label>
														<input type="text" class="form-control" name="apartment" placeholder="Enter Apartment" value="{{ auth('customer')->user()->apartment }}">
													</div>


													<div class="form-group col-md-6">
														<label for="inputCity">Zip </label>
														<input type="text" class="form-control" name="zip" placeholder="Enter Zip" value="{{ auth('customer')->user()->zip }}">
													</div>


													{{-- <div class="form-group col-md-6">
														<label for="email">Email*</label>
														<input type="email" class="form-control" id="email" placeholder="Email">
													</div> --}}

												</div>


												<div class="form-row">
													<div class="form-group col-md-12 my-3">

														<button type="submit" class="btn loginbtn btn-block text-center">Save </button>
													</div>
												</div> 

											</form>
										</div>
									</div>

								</div>
							</div>


						</div>
					</div>
				</section>

			</div>
		</div>
	</div>
</div>

@include('frontend.inc.footer')

</body>
</html>

