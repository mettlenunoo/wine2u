<div class="row border-between">
   <!-- left  side -->
   <div class="col-12 col-md-6 pr-md-5">

      @if(!auth('customer')->user())
      <div class="mb-5">
		<div class="alert shadow-sm alert-dismissible fade show" role="alert">
			<strong> Already have an account? </strong> <a href="/sign-in?redirect=checkout">Log in</a> | <span >or  Continue as a Guest </span>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
		</div>
      </div>
	  @endif
      <p> <small>1 out 4  steps</small></p>
      <h1 class="checkout-titile1">
         Payment Information
      </h1>
      <!-- <div class="custom-control custom-checkbox">
         <input type="checkbox" class="custom-control-input" id="customCheck1">
         <label class="custom-control-label" for="customCheck1">Shipping address is the same my billing address</label>
      </div> -->
      <h1 class="f_titile_p2b mt-4 ">Billing address</h1>
      <div class="form-row mt-4">
         {{-- <form> --}}
         <div class="form-group col-12 col-md-12 col-lg-6">
            <label for="checkout-address_FirstName">First Name *</label>
            <input type="text"  name="billingfname" class="form-control form-control-wine2u wizard-required" id="bill_fname" placeholder="" value="{{ $customer->fname }}" required="required"> 
             <div class="wizard-form-error">
               Enter Your First Name
            </div>
         </div>
         <div class="form-group col-12 col-md-12 col-lg-6">
            <label for="checkout-address_LastName">Last Name *</label>
            <input type="text" name="billingsname" class="form-control form-control-wine2u wizard-required" id="bill_lname" placeholder="" value="{{ $customer->lname }}"> 
             <div class="wizard-form-error">

               Enter Your Last Name
            
            </div>
         </div>
         <div class="form-group col-12 col-md-12">
            <label for="checkout-address_line1">Email *</label>
            <input type="email" name="billingemail" class="form-control form-control-wine2u wizard-required wizard-email" id="bill_email" placeholder="" value="{{ $customer->email }}"> 
             <div class="wizard-form-error">
                Enter Your Email
            </div>
         </div>

         <div class="form-group col-12 col-md-12">
            <label for="checkout-address_line1">Phone Number *</label>
            <input type="tel" name="billingpnumber" class="form-control form-control-wine2u wizard-required wizard-phone" id="bill_phonenumber" placeholder="" value="{{ $customer->phone }}"> 
            <div class="wizard-form-error">
                Enter Your Phone Number
            </div>
         </div>

         <div class="form-group col-12 col-md-12 col-lg-6">
            <label for="checkout-country">Country *</label> 
            <select id="bill_country" name="billingcountry" class="form-control  wizard-required" >
                  <option selected value=""> Choose... </option>
                  <option @if($customer->country == "land Islands") selected @endif  value="land Islands">&#197;land Islands</option>
                  <option @if($customer->country == "Afghanistan") selected @endif value="Afghanistan">Afghanistan</option>
                  <option @if($customer->country == "Albania") selected @endif  value="Albania">Albania</option>
                  <option @if($customer->country == "Algeria") selected @endif value="Algeria">Algeria</option>
                  <option @if($customer->country == "American Samoa") selected @endif  value="American Samoa">American Samoa</option>
                  <option @if($customer->country == "Andorra") selected @endif value="Andorra">Andorra</option>
                  <option @if($customer->country == "Angola") selected @endif  value="Angola">Angola</option>
                  <option @if($customer->country == "Anguilla") selected @endif  value="Anguilla">Anguilla</option>
                  <option @if($customer->country == "Antarctica") selected @endif  value="Antarctica">Antarctica</option>
                  <option @if($customer->country == "Antigua and Barbud") selected @endif  value="Antigua and Barbud">Antigua and Barbuda</option>
                  <option @if($customer->country == "Argentina") selected @endif  value="Argentina">Argentina</option>
                  <option @if($customer->country == "Armenia") selected @endif value="Armenia">Armenia</option>
                  <option @if($customer->country == "Aruba") selected @endif value="Aruba">Aruba</option>
                  <option @if($customer->country == "Australia") selected @endif value="Australia">Australia</option>
                  <option @if($customer->country == "Austria") selected @endif value="Austria">Austria</option>
                  <option @if($customer->country == "Azerbaijan") selected @endif value="Azerbaijan">Azerbaijan</option>
                  <option @if($customer->country == "Bahamas") selected @endif value="Bahamas">Bahamas</option>
                  <option @if($customer->country == "Bahrain") selected @endif value="Bahrain">Bahrain</option>
                  <option @if($customer->country == "Bangladesh") selected @endif value="Bangladesh">Bangladesh</option>
                  <option @if($customer->country == "Barbados") selected @endif value="Barbados">Barbados</option>
                  <option @if($customer->country == "Belarus") selected @endif value="Belarus">Belarus</option>
                  <option @if($customer->country == "Belau") selected @endif value="Belau">Belau</option>
                  <option @if($customer->country == "Belgium") selected @endif value="Belgium">Belgium</option>
                  <option @if($customer->country == "Belize") selected @endif value="Belize">Belize</option>
                  <option @if($customer->country == "Benin") selected @endif value="Benin">Benin</option>
                  <option @if($customer->country == "Bermuda") selected @endif value="Bermuda">Bermuda</option>
                  <option @if($customer->country == "Bhutan") selected @endif value="Bhutan">Bhutan</option>
                  <option @if($customer->country == "Bolivia") selected @endif value="Bolivia">Bolivia</option>
                  <option @if($customer->country == "Bonaire, Saint Eustatius and Saba") selected @endif value="Bonaire, Saint Eustatius and Saba">Bonaire, Saint Eustatius and Saba</option>
                  <option @if($customer->country == "Bosnia and Herzegovina") selected @endif value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                  <option @if($customer->country == "Botswana") selected @endif value="Botswana">Botswana</option>
                  <option @if($customer->country == "Bouvet Island") selected @endif value="Bouvet Island">Bouvet Island</option>
                  <option @if($customer->country == "Brazil") selected @endif value="Brazil">Brazil</option>
                  <option @if($customer->country == "British Indian Ocean Territory") selected @endif value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                  <option @if($customer->country == "Brunei") selected @endif value="Brunei">Brunei</option>
                  <option @if($customer->country == "Bulgaria") selected @endif value="Bulgaria">Bulgaria</option>
                  <option @if($customer->country == "Burkina Faso") selected @endif value="Burkina Faso">Burkina Faso</option>
                  <option @if($customer->country == "Burundi") selected @endif value="Burundi">Burundi</option>
                  <option @if($customer->country == "Cambodia") selected @endif value="Cambodia">Cambodia</option>
                  <option @if($customer->country == "Cameroon") selected @endif value="Cameroon">Cameroon</option>
                  <option @if($customer->country == "Canada") selected @endif value="Canada">Canada</option>
                  <option @if($customer->country == "Cape Verde") selected @endif value="Cape Verde">Cape Verde</option>
                  <option @if($customer->country == "Cayman Islands") selected @endif value="Cayman Islands">Cayman Islands</option>
                  <option @if($customer->country == "Central African Republic") selected @endif value="Central African Republic">Central African Republic</option>
                  <option @if($customer->country == "Chad") selected @endif value="Chad">Chad</option>
                  <option @if($customer->country == "Chile") selected @endif value="Chile">Chile</option>
                  <option @if($customer->country == "China") selected @endif value="China">China</option>
                  <option @if($customer->country == "Christmas Island") selected @endif value="Christmas Island">Christmas Island</option>
                  <option @if($customer->country == "Cocos (Keeling) Islands") selected @endif value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                  <option @if($customer->country == "Colombia") selected @endif value="Colombia">Colombia</option>
                  <option @if($customer->country == "Comoros") selected @endif value="Comoros">Comoros</option>
                  <option @if($customer->country == "Congo (Brazzaville)") selected @endif value="Congo (Brazzaville)">Congo (Brazzaville)</option>
                  <option @if($customer->country == "Congo (Kinshasa)") selected @endif value="Congo (Kinshasa)">Congo (Kinshasa)</option>
                  <option @if($customer->country == "Cook Islands") selected @endif value="Cook Islands">Cook Islands</option>
                  <option @if($customer->country == "Costa Rica") selected @endif value="Costa Rica">Costa Rica</option>
                  <option @if($customer->country == "Croatia") selected @endif value="Croatia">Croatia</option>
                  <option @if($customer->country == "Cuba") selected @endif value="Cuba">Cuba</option>
                  <option @if($customer->country == "Cura") selected @endif value="Cura">Cura&ccedil;ao</option>
                  <option @if($customer->country == "Cyprus") selected @endif value="Cyprus">Cyprus</option>
                  <option @if($customer->country == "Czech Republic") selected @endif value="Czech Republic">Czech Republic</option>
                  <option @if($customer->country == "Denmark") selected @endif value="Denmark">Denmark</option>
                  <option @if($customer->country == "DJ") selected @endif value="DJ">Djibouti</option>
                  <option @if($customer->country == "Djibouti") selected @endif value="Djibouti">Dominica</option>
                  <option @if($customer->country == "Dominican Republic") selected @endif value="Dominican Republic">Dominican Republic</option>
                  <option @if($customer->country == "Ecuador") selected @endif value="Ecuador">Ecuador</option>
                  <option @if($customer->country == "Egypt") selected @endif value="Egypt">Egypt</option>
                  <option @if($customer->country == "El Salvador") selected @endif value="El Salvador">El Salvador</option>
                  <option @if($customer->country == "Equatorial Guinea") selected @endif value="Equatorial Guinea">Equatorial Guinea</option>
                  <option @if($customer->country == "Eritrea") selected @endif value="Eritrea">Eritrea</option>
                  <option @if($customer->country == "Estonia") selected @endif value="Estonia">Estonia</option>
                  <option @if($customer->country == "Ethiopia") selected @endif value="Ethiopia">Ethiopia</option>
                  <option @if($customer->country == "Falkland Islands") selected @endif value="Falkland Islands">Falkland Islands</option>
                  <option @if($customer->country == "Faroe Islands") selected @endif value="Faroe Islands">Faroe Islands</option>
                  <option @if($customer->country == "Fiji") selected @endif value="Fiji">Fiji</option>
                  <option @if($customer->country == "Finland") selected @endif value="Finland">Finland</option>
                  <option @if($customer->country == "France") selected @endif value="France">France</option>
                  <option @if($customer->country == "French Guiana") selected @endif value="French Guiana">French Guiana</option>
                  <option @if($customer->country == "French Polynesia") selected @endif value="French Polynesia">French Polynesia</option>
                  <option @if($customer->country == "French Southern Territories") selected @endif value="French Southern Territories">French Southern Territories</option>
                  <option @if($customer->country == "Gabon") selected @endif value="Gabon">Gabon</option>
                  <option @if($customer->country == "Gambia") selected @endif value="Gambia">Gambia</option>
                  <option @if($customer->country == "Georgia") selected @endif value="Georgia">Georgia</option>
                  <option @if($customer->country == "Germany") selected @endif value="Germany">Germany</option>
                  <option @if($customer->country == "Ghana") selected @endif value="Ghana">Ghana</option>
                  <option @if($customer->country == "Gibraltar") selected @endif value="Gibraltar">Gibraltar</option>
                  <option @if($customer->country == "Greece") selected @endif value="Greece">Greece</option>
                  <option @if($customer->country == "Greenland") selected @endif value="Greenland">Greenland</option>
                  <option @if($customer->country == "Grenada") selected @endif value="Grenada">Grenada</option>
                  <option @if($customer->country == "Guadeloupe") selected @endif value="Guadeloupe">Guadeloupe</option>
                  <option @if($customer->country == "Guam") selected @endif value="Guam">Guam</option>
                  <option @if($customer->country == "Guatemala") selected @endif value="Guatemala">Guatemala</option>
                  <option @if($customer->country == "Guernsey") selected @endif value="Guernsey">Guernsey</option>
                  <option @if($customer->country == "Guinea") selected @endif value="Guinea">Guinea</option>
                  <option @if($customer->country == "Guinea-Bissau") selected @endif value="Guinea-Bissau">Guinea-Bissau</option>
                  <option @if($customer->country == "Guyana") selected @endif value="Guyana">Guyana</option>
                  <option @if($customer->country == "Haiti") selected @endif value="Haiti">Haiti</option>
                  <option @if($customer->country == "Heard Island and McDonald Islands") selected @endif value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
                  <option @if($customer->country == "Honduras") selected @endif value="Honduras">Honduras</option>
                  <option @if($customer->country == "Hong Kong") selected @endif value="Hong Kong">Hong Kong</option>
                  <option @if($customer->country == "Hungary") selected @endif value="Hungary">Hungary</option>
                  <option @if($customer->country == "Iceland") selected @endif value="Iceland">Iceland</option>
                  <option @if($customer->country == "India") selected @endif value="India">India</option>
                  <option @if($customer->country == "Indonesia") selected @endif value="Indonesia">Indonesia</option>
                  <option @if($customer->country == "Iran") selected @endif value="Iran">Iran</option>
                  <option @if($customer->country == "Iraq") selected @endif value="Iraq">Iraq</option>
                  <option @if($customer->country == "Ireland") selected @endif value="Ireland">Ireland</option>
                  <option @if($customer->country == "Isle of Man") selected @endif value="Isle of Man">Isle of Man</option>
                  <option @if($customer->country == "Israel") selected @endif value="Israel">Israel</option>
                  <option @if($customer->country == "Italy") selected @endif value="Italy">Italy</option>
                  <option @if($customer->country == "Ivory Coast") selected @endif value="Ivory Coast">Ivory Coast</option>
                  <option @if($customer->country == "Jamaica") selected @endif value="Jamaica">Jamaica</option>
                  <option @if($customer->country == "Japan") selected @endif value="Japan">Japan</option>
                  <option @if($customer->country == "Jersey") selected @endif value="Jersey">Jersey</option>
                  <option @if($customer->country == "Jordan") selected @endif value="Jordan">Jordan</option>
                  <option @if($customer->country == "Kazakhstan") selected @endif value="Kazakhstan">Kazakhstan</option>
                  <option @if($customer->country == "Kenya") selected @endif value="Kenya">Kenya</option>
                  <option @if($customer->country == "Kiribati") selected @endif value="Kiribati">Kiribati</option>
                  <option @if($customer->country == "Kuwait") selected @endif value="Kuwait">Kuwait</option>
                  <option @if($customer->country == "Kyrgyzstan") selected @endif value="Kyrgyzstan">Kyrgyzstan</option>
                  <option @if($customer->country == "Laos") selected @endif value="Laos">Laos</option>
                  <option @if($customer->country == "Latvia") selected @endif value="Latvia">Latvia</option>
                  <option @if($customer->country == "Lebanon") selected @endif value="Lebanon">Lebanon</option>
                  <option @if($customer->country == "Lesotho") selected @endif value="Lesotho">Lesotho</option>
                  <option @if($customer->country == "Liberia") selected @endif value="Liberia">Liberia</option>
                  <option @if($customer->country == "Libya") selected @endif value="Libya">Libya</option>
                  <option @if($customer->country == "Liechtenstein") selected @endif value="Liechtenstein">Liechtenstein</option>
                  <option @if($customer->country == "Lithuania") selected @endif value="Lithuania">Lithuania</option>
                  <option @if($customer->country == "Luxembourg") selected @endif value="Luxembourg">Luxembourg</option>
                  <option @if($customer->country == "Macao S.A.R., China") selected @endif value="Macao S.A.R., China">Macao S.A.R., China</option>
                  <option @if($customer->country == "Madagascar") selected @endif value="Madagascar">Madagascar</option>
                  <option @if($customer->country == "Malawi") selected @endif value="Malawi">Malawi</option>
                  <option @if($customer->country == "Malaysia") selected @endif value="Malaysia">Malaysia</option>
                  <option @if($customer->country == "Maldives") selected @endif value="Maldives">Maldives</option>
                  <option @if($customer->country == "Mali") selected @endif value="Mali">Mali</option>
                  <option @if($customer->country == "Malta") selected @endif value="Malta">Malta</option>
                  <option @if($customer->country == "Marshall Islands") selected @endif value="Marshall Islands">Marshall Islands</option>
                  <option @if($customer->country == "Martinique") selected @endif value="Martinique">Martinique</option>
                  <option @if($customer->country == "Mauritania") selected @endif value="Mauritania">Mauritania</option>
                  <option @if($customer->country == "Mauritius") selected @endif value="Mauritius">Mauritius</option>
                  <option @if($customer->country == "Mayotte") selected @endif value="Mayotte">Mayotte</option>
                  <option @if($customer->country == "Mexico") selected @endif value="Mexico">Mexico</option>
                  <option @if($customer->country == "Micronesia") selected @endif value="Micronesia">Micronesia</option>
                  <option @if($customer->country == "Moldova") selected @endif value="Moldova">Moldova</option>
                  <option @if($customer->country == "Monaco") selected @endif value="Monaco">Monaco</option>
                  <option @if($customer->country == "Mongolia") selected @endif value="Mongolia">Mongolia</option>
                  <option @if($customer->country == "Montenegro") selected @endif value="Montenegro">Montenegro</option>
                  <option @if($customer->country == "Montserrat") selected @endif value="Montserrat">Montserrat</option>
                  <option @if($customer->country == "Morocco") selected @endif value="Morocco">Morocco</option>
                  <option @if($customer->country == "Mozambique") selected @endif value="Mozambique">Mozambique</option>
                  <option @if($customer->country == "Myanmar") selected @endif value="Myanmar">Myanmar</option>
                  <option @if($customer->country == "Namibia") selected @endif value="Namibia">Namibia</option>
                  <option @if($customer->country == "Nauru") selected @endif value="Nauru">Nauru</option>
                  <option @if($customer->country == "Nepal") selected @endif value="Nepal">Nepal</option>
                  <option @if($customer->country == "Netherlands") selected @endif value="Netherlands">Netherlands</option>
                  <option @if($customer->country == "New Caledonia") selected @endif value="New Caledonia">New Caledonia</option>
                  <option @if($customer->country == "New Zealand") selected @endif value="New Zealand">New Zealand</option>
                  <option @if($customer->country == "Nicaragua") selected @endif value="Nicaragua">Nicaragua</option>
                  <option @if($customer->country == "Niger") selected @endif value="Niger">Niger</option>
                  <option @if($customer->country == "Nigeria") selected @endif value="Nigeria">Nigeria</option>
                  <option @if($customer->country == "Niue") selected @endif value="Niue">Niue</option>
                  <option @if($customer->country == "Norfolk Island") selected @endif value="Norfolk Island">Norfolk Island</option>
                  <option @if($customer->country == "North Korea") selected @endif value="North Korea">North Korea</option>
                  <option @if($customer->country == "North Macedonia") selected @endif value="North Macedonia">North Macedonia</option>
                  <option @if($customer->country == "Northern Mariana Islands") selected @endif value="Northern Mariana Islands">Northern Mariana Islands</option>
                  <option @if($customer->country == "Norway") selected @endif value="Norway">Norway</option>
                  <option @if($customer->country == "Oman") selected @endif value="Oman">Oman</option>
                  <option @if($customer->country == "Pakistan") selected @endif value="Pakistan">Pakistan</option>
                  <option @if($customer->country == "Palestinian Territory") selected @endif value="Palestinian Territory">Palestinian Territory</option>
                  <option @if($customer->country == "Panama") selected @endif value="Panama">Panama</option>
                  <option @if($customer->country == "Papua New Guinea") selected @endif value="Papua New Guinea">Papua New Guinea</option>
                  <option @if($customer->country == "Paraguay") selected @endif value="Paraguay">Paraguay</option>
                  <option @if($customer->country == "Peru") selected @endif value="Peru">Peru</option>
                  <option @if($customer->country == "Philippines") selected @endif value="Philippines">Philippines</option>
                  <option @if($customer->country == "Pitcairn") selected @endif value="Pitcairn">Pitcairn</option>
                  <option @if($customer->country == "Poland") selected @endif value="Poland">Poland</option>
                  <option @if($customer->country == "Portugal") selected @endif value="Portugal">Portugal</option>
                  <option @if($customer->country == "Puerto Rico") selected @endif value="Puerto Rico">Puerto Rico</option>
                  <option @if($customer->country == "Qatar") selected @endif value="Qatar">Qatar</option>
                  <option @if($customer->country == "Reunion") selected @endif value="Reunion">Reunion</option>
                  <option @if($customer->country == "Romania") selected @endif value="Romania">Romania</option>
                  <option @if($customer->country == "Russia") selected @endif value="Russia">Russia</option>
                  <option @if($customer->country == "Rwanda") selected @endif value="Rwanda">Rwanda</option>
                  <option @if($customer->country == "So Tom and Prncipe") selected @endif value="So Tom and Prncipe">S&atilde;o Tom&eacute; and Pr&iacute;ncipe</option>
                  <option @if($customer->country == "Saint Barthlemy") selected @endif value="Saint Barthlemy">Saint Barth&eacute;lemy</option>
                  <option @if($customer->country == "Saint Helena") selected @endif value="Saint Helena">Saint Helena</option>
                  <option @if($customer->country == "Saint Kitts and Nevis") selected @endif value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                  <option @if($customer->country == "Saint Lucia") selected @endif value="Saint Lucia">Saint Lucia</option>
                  <option @if($customer->country == "Saint Martin (Dutch part)") selected @endif value="Saint Martin (Dutch part)">Saint Martin (Dutch part)</option>
                  <option @if($customer->country == "Saint Martin (French part)") selected @endif value="Saint Martin (French part)">Saint Martin (French part)</option>
                  <option @if($customer->country == "Saint Pierre and Miquelon") selected @endif value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                  <option @if($customer->country == "Saint Vincent and the Grenadines") selected @endif value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                  <option @if($customer->country == "Samoa") selected @endif value="Samoa">Samoa</option>
                  <option @if($customer->country == "San Marino") selected @endif value="San Marino">San Marino</option>
                  <option @if($customer->country == "Saudi Arabia") selected @endif value="Saudi Arabia">Saudi Arabia</option>
                  <option @if($customer->country == "Senegal") selected @endif value="Senegal">Senegal</option>
                  <option @if($customer->country == "Serbia") selected @endif value="Serbia">Serbia</option>
                  <option @if($customer->country == "Seychelles") selected @endif value="Seychelles">Seychelles</option>
                  <option @if($customer->country == "Sierra Leone") selected @endif value="Sierra Leone">Sierra Leone</option>
                  <option @if($customer->country == "Singapore") selected @endif value="Singapore">Singapore</option>
                  <option @if($customer->country == "Slovakia") selected @endif value="Slovakia">Slovakia</option>
                  <option @if($customer->country == "Slovenia") selected @endif value="Slovenia">Slovenia</option>
                  <option @if($customer->country == "Solomon Islands") selected @endif value="Solomon Islands">Solomon Islands</option>
                  <option @if($customer->country == "Somalia") selected @endif value="Somalia">Somalia</option>
                  <option @if($customer->country == "South Africa") selected @endif value="South Africa">South Africa</option>
                  <option @if($customer->country == "South Georgia/Sandwich Islands") selected @endif value="South Georgia/Sandwich Islands">South Georgia/Sandwich Islands</option>
                  <option @if($customer->country == "South Korea") selected @endif value="South Korea">South Korea</option>
                  <option @if($customer->country == "South Sudan") selected @endif value="South Sudan">South Sudan</option>
                  <option @if($customer->country == "Spain") selected @endif value="Spain">Spain</option>
                  <option @if($customer->country == "Sri Lanka") selected @endif value="Sri Lanka">Sri Lanka</option>
                  <option @if($customer->country == "Sudan") selected @endif value="Sudan">Sudan</option>
                  <option @if($customer->country == "Suriname") selected @endif value="Suriname">Suriname</option>
                  <option @if($customer->country == "Svalbard and Jan Mayen") selected @endif value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                  <option @if($customer->country == "Swaziland") selected @endif value="Swaziland">Swaziland</option>
                  <option @if($customer->country == "Sweden") selected @endif value="Sweden">Sweden</option>
                  <option @if($customer->country == "Switzerland") selected @endif value="Switzerland">Switzerland</option>
                  <option @if($customer->country == "Syria") selected @endif value="Syria">Syria</option>
                  <option @if($customer->country == "Taiwan") selected @endif value="Taiwan">Taiwan</option>
                  <option @if($customer->country == "Tajikistan") selected @endif value="Tajikistan">Tajikistan</option>
                  <option @if($customer->country == "Tanzania") selected @endif value="Tanzania">Tanzania</option>
                  <option @if($customer->country == "Thailand") selected @endif value="Thailand">Thailand</option>
                  <option @if($customer->country == "Timor-Leste") selected @endif value="Timor-Leste">Timor-Leste</option>
                  <option @if($customer->country == "Togo") selected @endif value="Togo">Togo</option>
                  <option @if($customer->country == "Tokelau") selected @endif value="Tokelau">Tokelau</option>
                  <option @if($customer->country == "Tonga") selected @endif value="Tonga">Tonga</option>
                  <option @if($customer->country == "Trinidad and Tobago") selected @endif value="Trinidad and Tobago">Trinidad and Tobago</option>
                  <option @if($customer->country == "Tunisia") selected @endif value="Tunisia">Tunisia</option>
                  <option @if($customer->country == "Turkey") selected @endif value="Turkey">Turkey</option>
                  <option @if($customer->country == "Turkmenistan") selected @endif value="Turkmenistan">Turkmenistan</option>
                  <option @if($customer->country == "Turks and Caicos Islands") selected @endif value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                  <option @if($customer->country == "Tuvalu") selected @endif value="Tuvalu">Tuvalu</option>
                  <option @if($customer->country == "Uganda") selected @endif value="Uganda">Uganda</option>
                  <option @if($customer->country == "Ukraine") selected @endif value="Ukraine">Ukraine</option>
                  <option @if($customer->country == "United Arab Emirates") selected @endif value="United Arab Emirates">United Arab Emirates</option>
                  <option @if($customer->country == "United Kingdom (UK)") selected @endif value="United Kingdom (UK)">United Kingdom (UK)</option>
                  <option @if($customer->country == "United States (US)") selected @endif value="United States (US)">United States (US)</option>
                  <option @if($customer->country == "United States (US) Minor Outlying Islands") selected @endif value="United States (US) Minor Outlying Islands">United States (US) Minor Outlying Islands</option>
                  <option @if($customer->country == "Uruguay") selected @endif value="Uruguay">Uruguay</option>
                  <option @if($customer->country == "Uzbekistan") selected @endif value="Uzbekistan">Uzbekistan</option>
                  <option @if($customer->country == "Vanuatu") selected @endif value="Vanuatu">Vanuatu</option>
                  <option @if($customer->country == "Vatican") selected @endif value="Vatican">Vatican</option>
                  <option @if($customer->country == "Venezuela") selected @endif value="Venezuela">Venezuela</option>
                  <option @if($customer->country == "Vietnam") selected @endif value="Vietnam">Vietnam</option>
                  <option @if($customer->country == "Virgin Islands (British)") selected @endif value="Virgin Islands (British)">Virgin Islands (British)</option>
                  <option @if($customer->country == "Virgin Islands (US)") selected @endif value="Virgin Islands (US)">Virgin Islands (US)</option>
                  <option @if($customer->country == "Wallis and Futuna") selected @endif value="Wallis and Futuna">Wallis and Futuna</option>
                  <option @if($customer->country == "Western Sahara") selected @endif value="Western Sahara">Western Sahara</option>
                  <option @if($customer->country == "Yemen") selected @endif value="Yemen">Yemen</option>
                  <option @if($customer->country == "Zambia") selected @endif value="Zambia">Zambia</option>
                  <option @if($customer->country == "Zimbabwe") selected @endif value="Zimbabwe">Zimbabwe</option>
                </select>

                 <div class="wizard-form-error">
                     Select a Country / Region
                 </div>
           
         </div>
         <div class="form-group col-12 col-md-12 col-lg-6">
            <label for="checkout-address_city">Region / State </label>
            <input type="text" name="billingstate" class="form-control form-control-wine2u" id="bill_region" placeholder="" value="{{ $customer->state }}">
         </div>
       
         <div class="form-group col-12 col-md-6">
            <label for="checkout-address_Zip-code">City </label>
            <input type="text" name="billingcity" class="form-control form-control-wine2u" id="bill_city" placeholder="" value="{{ $customer->city }}">
         </div>
         <div class="form-group col-12 col-md-6">
            <label for="checkout-address_Phone-Number"> Street Address </label>
            <input type="text" name="billingaddress" class="form-control form-control-wine2u " id="bill_street" placeholder="" value="{{ $customer->address }}">
            <div class="wizard-form-error"></div>
         </div>

         <div class="form-group col-12 col-md-6">
            <label for="checkout-address_Zip-code"> Apartment  </label>
            <input type="text" name="billingapartment" class="form-control form-control-wine2u" id="bill_apartment" placeholder="" value="{{ $customer->apartment }}">
         </div>
         <div class="form-group col-12 col-md-6">
            <label for="checkout-address_Phone-Number"> Zip Code </label>
            <input type="text" name="billingzipcode" class="form-control form-control-wine2u" id="bill_zipcode" placeholder="" value="{{ $customer->zip }}">
            <div class="wizard-form-error"></div>
         </div>
       
         <div class="form-group col-12 my-4 text-right">
            <a href="javascript:;" class="form-wizard-next-btn float-right" >Next</a>
         </div>
      </div>
   </div>
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
                             <input type="text" class="form-control  form-control-wine2u coupon-code" placeholder="Coupon code" aria-label="Coupon code" aria-describedby="button-addon4" name="coupon_code" value="">
                             <div class="input-group-append" id="button-addon4">
                                 <button class="btn btn-dark couponAdd"  type="button" onclick="addCoupon(this.form.coupon_code.value)">Apply </button>
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