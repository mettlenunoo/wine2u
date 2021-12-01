<!DOCTYPE html>
<html>

<head>
  <!-- Website Title & Description for Search Engine purposes -->
  <title>Haute Vie - Checkout</title>
  <link rel="shortcut icon" type="image/jpg" href="{{ asset('images/favicon.jpg')}}">
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <meta name="description" content="">
  <!-- Mobile viewport optimized -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <!-- Bootstrap CSS -->

  <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap-glyphicons.css')}}" rel="stylesheet">

  <!-- Custom CSS -->

  <link href="{{ asset('css/global-styles.css')}}" rel="stylesheet">
  <link href="{{ asset('css/checkout-styles.css')}}" rel="stylesheet">
  <!-- Google Fonts -->

  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
  <!-- Owl Carousel CSS -->

  <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css')}}">
  <!-- Animate CSS -->
  <link href="{{ asset('css/animate.css')}}" rel="stylesheet">
  <!-- Font Awesome -->

  <link href="{{ asset('fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- Material Icons -->

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Include Modernizr in the head, before any other Javascript -->
  <script src="{{ asset('js/modernizr-2.6.2.min.js')}}"></script>
</head>

<body>

    @include('frontend.inc.header')

    

    <div class="checkout">

        <div class="container">

            <div class="row">

                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    @if(auth('customer')->user() == null)
                    <div class="panel panel-1 panel-with-form">

                        {!! Form::open(['action' => 'publicController@checkout_store', 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t'] ) !!}

                        <div class="panel-heading">
                            <h3>Your Details </h3>
                        </div>

                        <div class="panel-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="firstname2">First name*</label>
                                    <input type="text" class="form-control" name="fname" placeholder="Frist name" required>
                                    <input type="hidden" class="form-control" name="shop_id"  value="{{ $shop->id }}" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="lastname2">last name*</label>
                                    <input type="text" class="form-control" name="lname" placeholder="Last name" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="firstname2">Email*</label>
                                    <input type="text" class="form-control" name="email" placeholder="Email" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="lastname2">Phone Number*</label>
                                    <input type="text" class="form-control" name="phonenumber" placeholder="Phone Number" required>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputState">Country *</label>
                                    <select id="inputState" class="custom-select form-control  " name="country" required>
                                        <option selected>Choose...</option>
                                        <option  value="AX">&#197;land Islands</option>
                                        <option  value="AF">Afghanistan</option>
                                        <option  value="AL">Albania</option>
                                        <option  value="DZ">Algeria</option>
                                        <option  value="AS">American Samoa</option>
                                        <option  value="AD">Andorra</option>
                                        <option  value="AO">Angola</option>
                                        <option  value="AI">Anguilla</option>
                                        <option  value="AQ">Antarctica</option>
                                        <option  value="AG">Antigua and Barbuda</option>
                                        <option  value="AR">Argentina</option>
                                        <option  value="AM">Armenia</option>
                                        <option  value="AW">Aruba</option>
                                        <option  value="AU">Australia</option>
                                        <option  value="AT">Austria</option>
                                        <option  value="AZ">Azerbaijan</option>
                                        <option  value="BS">Bahamas</option>
                                        <option  value="BH">Bahrain</option>
                                        <option  value="BD">Bangladesh</option>
                                        <option  value="BB">Barbados</option>
                                        <option  value="BY">Belarus</option>
                                        <option  value="PW">Belau</option>
                                        <option  value="BE">Belgium</option>
                                        <option  value="BZ">Belize</option>
                                        <option  value="BJ">Benin</option>
                                        <option  value="BM">Bermuda</option>
                                        <option  value="BT">Bhutan</option>
                                        <option  value="BO">Bolivia</option>
                                        <option  value="BQ">Bonaire, Saint Eustatius and Saba</option>
                                        <option  value="BA">Bosnia and Herzegovina</option>
                                        <option  value="BW">Botswana</option>
                                        <option  value="BV">Bouvet Island</option>
                                        <option  value="BR">Brazil</option>
                                        <option  value="IO">British Indian Ocean Territory</option>
                                        <option  value="BN">Brunei</option>
                                        <option  value="BG">Bulgaria</option>
                                        <option  value="BF">Burkina Faso</option>
                                        <option  value="BI">Burundi</option>
                                        <option  value="KH">Cambodia</option>
                                        <option  value="CM">Cameroon</option>
                                        <option  value="CA">Canada</option>
                                        <option  value="CV">Cape Verde</option>
                                        <option  value="KY">Cayman Islands</option>
                                        <option  value="CF">Central African Republic</option>
                                        <option  value="TD">Chad</option>
                                        <option  value="CL">Chile</option>
                                        <option  value="CN">China</option>
                                        <option  value="CX">Christmas Island</option>
                                        <option  value="CC">Cocos (Keeling) Islands</option>
                                        <option  value="CO">Colombia</option>
                                        <option  value="KM">Comoros</option>
                                        <option  value="CG">Congo (Brazzaville)</option>
                                        <option  value="CD">Congo (Kinshasa)</option>
                                        <option  value="CK">Cook Islands</option>
                                        <option  value="CR">Costa Rica</option>
                                        <option  value="HR">Croatia</option>
                                        <option  value="CU">Cuba</option>
                                        <option  value="CW">Cura&ccedil;ao</option>
                                        <option  value="CY">Cyprus</option>
                                        <option  value="CZ">Czech Republic</option>
                                        <option  value="DK">Denmark</option>
                                        <option  value="DJ">Djibouti</option>
                                        <option  value="DM">Dominica</option>
                                        <option  value="DO">Dominican Republic</option>
                                        <option  value="EC">Ecuador</option>
                                        <option  value="EG">Egypt</option>
                                        <option  value="SV">El Salvador</option>
                                        <option  value="GQ">Equatorial Guinea</option>
                                        <option  value="ER">Eritrea</option>
                                        <option  value="EE">Estonia</option>
                                        <option  value="ET">Ethiopia</option>
                                        <option  value="FK">Falkland Islands</option>
                                        <option  value="FO">Faroe Islands</option>
                                        <option  value="FJ">Fiji</option>
                                        <option  value="FI">Finland</option>
                                        <option  value="FR">France</option>
                                        <option  value="GF">French Guiana</option>
                                        <option  value="PF">French Polynesia</option>
                                        <option  value="TF">French Southern Territories</option>
                                        <option  value="GA">Gabon</option>
                                        <option  value="GM">Gambia</option>
                                        <option  value="GE">Georgia</option>
                                        <option  value="DE">Germany</option>
                                        <option  value="GH">Ghana</option>
                                        <option  value="GI">Gibraltar</option>
                                        <option  value="GR">Greece</option>
                                        <option  value="GL">Greenland</option>
                                        <option  value="GD">Grenada</option>
                                        <option  value="GP">Guadeloupe</option>
                                        <option  value="GU">Guam</option>
                                        <option  value="GT">Guatemala</option>
                                        <option  value="GG">Guernsey</option>
                                        <option  value="GN">Guinea</option>
                                        <option  value="GW">Guinea-Bissau</option>
                                        <option  value="GY">Guyana</option>
                                        <option  value="HT">Haiti</option>
                                        <option  value="HM">Heard Island and McDonald Islands</option>
                                        <option  value="HN">Honduras</option>
                                        <option  value="HK">Hong Kong</option>
                                        <option  value="HU">Hungary</option>
                                        <option  value="IS">Iceland</option>
                                        <option  value="IN">India</option>
                                        <option  value="ID">Indonesia</option>
                                        <option  value="IR">Iran</option>
                                        <option  value="IQ">Iraq</option>
                                        <option  value="IE">Ireland</option>
                                        <option  value="IM">Isle of Man</option>
                                        <option  value="IL">Israel</option>
                                        <option  value="IT">Italy</option>
                                        <option  value="CI">Ivory Coast</option>
                                        <option  value="JM">Jamaica</option>
                                        <option  value="JP">Japan</option>
                                        <option  value="JE">Jersey</option>
                                        <option  value="JO">Jordan</option>
                                        <option  value="KZ">Kazakhstan</option>
                                        <option  value="KE">Kenya</option>
                                        <option  value="KI">Kiribati</option>
                                        <option  value="KW">Kuwait</option>
                                        <option  value="KG">Kyrgyzstan</option>
                                        <option  value="LA">Laos</option>
                                        <option  value="LV">Latvia</option>
                                        <option  value="LB">Lebanon</option>
                                        <option  value="LS">Lesotho</option>
                                        <option  value="LR">Liberia</option>
                                        <option  value="LY">Libya</option>
                                        <option  value="LI">Liechtenstein</option>
                                        <option  value="LT">Lithuania</option>
                                        <option  value="LU">Luxembourg</option>
                                        <option  value="MO">Macao S.A.R., China</option>
                                        <option  value="MG">Madagascar</option>
                                        <option  value="MW">Malawi</option>
                                        <option  value="MY">Malaysia</option>
                                        <option  value="MV">Maldives</option>
                                        <option  value="ML">Mali</option>
                                        <option  value="MT">Malta</option>
                                        <option  value="MH">Marshall Islands</option>
                                        <option  value="MQ">Martinique</option>
                                        <option  value="MR">Mauritania</option>
                                        <option  value="MU">Mauritius</option>
                                        <option  value="YT">Mayotte</option>
                                        <option  value="MX">Mexico</option>
                                        <option  value="FM">Micronesia</option>
                                        <option  value="MD">Moldova</option>
                                        <option  value="MC">Monaco</option>
                                        <option  value="MN">Mongolia</option>
                                        <option  value="ME">Montenegro</option>
                                        <option  value="MS">Montserrat</option>
                                        <option  value="MA">Morocco</option>
                                        <option  value="MZ">Mozambique</option>
                                        <option  value="MM">Myanmar</option>
                                        <option  value="NA">Namibia</option>
                                        <option  value="NR">Nauru</option>
                                        <option  value="NP">Nepal</option>
                                        <option  value="NL">Netherlands</option>
                                        <option  value="NC">New Caledonia</option>
                                        <option  value="NZ">New Zealand</option>
                                        <option  value="NI">Nicaragua</option>
                                        <option  value="NE">Niger</option>
                                        <option  value="NG">Nigeria</option>
                                        <option  value="NU">Niue</option>
                                        <option  value="NF">Norfolk Island</option>
                                        <option  value="KP">North Korea</option>
                                        <option  value="MK">North Macedonia</option>
                                        <option  value="MP">Northern Mariana Islands</option>
                                        <option  value="NO">Norway</option>
                                        <option  value="OM">Oman</option>
                                        <option  value="PK">Pakistan</option>
                                        <option  value="PS">Palestinian Territory</option>
                                        <option  value="PA">Panama</option>
                                        <option  value="PG">Papua New Guinea</option>
                                        <option  value="PY">Paraguay</option>
                                        <option  value="PE">Peru</option>
                                        <option  value="PH">Philippines</option>
                                        <option  value="PN">Pitcairn</option>
                                        <option  value="PL">Poland</option>
                                        <option  value="PT">Portugal</option>
                                        <option  value="PR">Puerto Rico</option>
                                        <option  value="QA">Qatar</option>
                                        <option  value="RE">Reunion</option>
                                        <option  value="RO">Romania</option>
                                        <option  value="RU">Russia</option>
                                        <option  value="RW">Rwanda</option>
                                        <option  value="ST">S&atilde;o Tom&eacute; and Pr&iacute;ncipe</option>
                                        <option  value="BL">Saint Barth&eacute;lemy</option>
                                        <option  value="SH">Saint Helena</option>
                                        <option  value="KN">Saint Kitts and Nevis</option>
                                        <option  value="LC">Saint Lucia</option>
                                        <option  value="SX">Saint Martin (Dutch part)</option>
                                        <option  value="MF">Saint Martin (French part)</option>
                                        <option  value="PM">Saint Pierre and Miquelon</option>
                                        <option  value="VC">Saint Vincent and the Grenadines</option>
                                        <option  value="WS">Samoa</option>
                                        <option  value="SM">San Marino</option>
                                        <option  value="SA">Saudi Arabia</option>
                                        <option  value="SN">Senegal</option>
                                        <option  value="RS">Serbia</option>
                                        <option  value="SC">Seychelles</option>
                                        <option  value="SL">Sierra Leone</option>
                                        <option  value="SG">Singapore</option>
                                        <option  value="SK">Slovakia</option>
                                        <option  value="SI">Slovenia</option>
                                        <option  value="SB">Solomon Islands</option>
                                        <option  value="SO">Somalia</option>
                                        <option  value="ZA">South Africa</option>
                                        <option  value="GS">South Georgia/Sandwich Islands</option>
                                        <option  value="KR">South Korea</option>
                                        <option  value="SS">South Sudan</option>
                                        <option  value="ES">Spain</option>
                                        <option  value="LK">Sri Lanka</option>
                                        <option  value="SD">Sudan</option>
                                        <option  value="SR">Suriname</option>
                                        <option  value="SJ">Svalbard and Jan Mayen</option>
                                        <option  value="SZ">Swaziland</option>
                                        <option  value="SE">Sweden</option>
                                        <option  value="CH">Switzerland</option>
                                        <option  value="SY">Syria</option>
                                        <option  value="TW">Taiwan</option>
                                        <option  value="TJ">Tajikistan</option>
                                        <option  value="TZ">Tanzania</option>
                                        <option  value="TH">Thailand</option>
                                        <option  value="TL">Timor-Leste</option>
                                        <option  value="TG">Togo</option>
                                        <option  value="TK">Tokelau</option>
                                        <option  value="TO">Tonga</option>
                                        <option  value="TT">Trinidad and Tobago</option>
                                        <option  value="TN">Tunisia</option>
                                        <option  value="TR">Turkey</option>
                                        <option  value="TM">Turkmenistan</option>
                                        <option  value="TC">Turks and Caicos Islands</option>
                                        <option  value="TV">Tuvalu</option>
                                        <option  value="UG">Uganda</option>
                                        <option  value="UA">Ukraine</option>
                                        <option  value="AE">United Arab Emirates</option>
                                        <option  value="UK">United Kingdom (UK)</option>
                                        <option  value="US">United States (US)</option>
                                        <option  value="UM">United States (US) Minor Outlying Islands</option>
                                        <option  value="UY">Uruguay</option>
                                        <option  value="UZ">Uzbekistan</option>
                                        <option  value="VU">Vanuatu</option>
                                        <option  value="VA">Vatican</option>
                                        <option  value="VE">Venezuela</option>
                                        <option  value="VN">Vietnam</option>
                                        <option  value="VG">Virgin Islands (British)</option>
                                        <option  value="VI">Virgin Islands (US)</option>
                                        <option  value="WF">Wallis and Futuna</option>
                                        <option  value="EH">Western Sahara</option>
                                        <option  value="YE">Yemen</option>
                                        <option  value="ZM">Zambia</option>
                                        <option  value="ZW">Zimbabwe</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Street address </label>
                                    <input type="text" class="form-control" name="street" placeholder="Enter Street address">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Apartment </label>
                                    <input type="text" class="form-control" name="apartment" placeholder="Enter Apartment">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">City </label>
                                    <input type="text" class="form-control" name="city" placeholder="Enter City" >
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">State / Region </label>
                                    <input type="text" class="form-control" name="state" placeholder="Enter Street address">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Zip </label>
                                    <input type="text" class="form-control" name="zip" placeholder="Enter Zip" >
                                </div>

                            </div>
                        </div>
                    </div>

                    @endif

                    <div class="panel panel-1">

                        <div class="panel-heading">

                            <h3>Shipping Details</h3>

                        </div>

                        @if(auth('customer')->user() != null)

                        {!! Form::open(['action' => 'publicController@checkout_user', 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t'] ) !!}

                        @endif


                        <div class="panel-body">

                            <div class="form-row">

                                <div class="form-group col-md-12">
                                  <label for="firstname2">Fullname*</label>
                                  <input type="text" class="form-control form-control2" name="shipfname" placeholder="Full name" required>
                                  <input type="hidden" class="form-control form-control2" name="shop_id"  value="{{ $shop->id }}" required>
                              </div>


                              <div class="form-group col-md-6">
                                <label for="firstname2">Email*</label>
                                <input type="text" class="form-control form-control2" name="shipemail" placeholder="Email" required>
                            </div>

                            <div class="form-group col-md-6">
                              <label for="lastname2">Phone Number*</label>
                              <input type="text" class="form-control form-control2" name="shipphonenumber" placeholder="Phone Number" required>
                          </div>


                      </div>

                      <div class="form-row">

                        @if($shop->country == "INT")

                        <div class="form-group col-md-12">
                           <label for="inputState">Country *</label>
                           <select id="ship_input" name="ship_input" class="custom-select"  name="" onchange="shiprate(this);" required>
                             <option value="">Choose...</option>
                             @foreach ($countries as $item)
                             <option value="{{ $item->zone }}">{{ $item->country }}</option>
                             @endforeach
                         </select>
                     </div>
                     <input id="ship_return" type="hidden" class="form-control form-control2" name="shipcountry" value="">

                     @else

                     @if($shop->country == "GH" || $shop->country == "gh")

                     <input id="inputState" type="hidden" class="form-control form-control2" name="shipcountry" value="Ghana">

                     @elseif($shop->country == "GB" || $shop->country == "gb")

                     <input id="inputState" type="hidden" class="form-control form-control2" name="shipcountry" value="United Kingdom (UK)">

                     @elseif($shop->country == "US" || $shop->country == "us")

                     <input id="inputState" type="hidden" class="form-control form-control2" name="shipcountry" value="United States (US)">

                     @else 

                     <input id="inputState" type="hidden" class="form-control form-control2" name="shipcountry" value="Ghana">

                     @endif

                     <div class="form-group col-md-12">
                       <label for="inputCity">State / Region * </label>

                       <select id="ship_input" name="ship_input" class="custom-select  form-control form-control2"  onchange="shiprate(this);" required>
                           <option value="">Choose...</option>
                           @foreach ($countries as $item)
                           <option value="{{ $item->zone }}">{{ $item->country }}</option>
                           @endforeach
                       </select>

                       <input id="ship_return"  type="hidden" class="form-control form-control2" name="shipstate" value="">

                   </div>

                   @endif

                   <div class="form-group col-md-12">
                       <label for="inputCity">Street address </label>
                       <input type="text" class="form-control form-control2" name="shipaddress"  name="shipstreet" placeholder="Enter Street address">
                   </div>

                   <div class="form-group col-md-12">
                     <label for="inputCity">Apartment </label>
                     <input type="text" class="form-control form-control2" name="apartment" placeholder="Enter Street address">
                 </div>

                 <div class="form-group col-md-6">
                   <label for="inputCity">City </label>
                   <input type="text" class="form-control form-control2" name="shipcity" placeholder="Enter City" >
               </div>


               <div class="form-group col-md-6">
                   <label for="inputCity">Zip </label>
                   <input type="text" class="form-control form-control2" name="shipzip" placeholder="Enter Zip code" >
               </div>

           </div>



       </div>

   </div>


   <div class="panel panel-1">

    <div class="panel-heading">

        <h3>Payment Option</h3>

    </div>

    <div class="panel-body">
           
        
    @if($shop->country == "GH")
        @if($paymentmethods->rave == "Yes")
          <div class="pay-opt">
              <label style="display:block;"><input type="radio" value="Rave" id="momo" name="customRadioInline1" required=""> Pay with Rave <img src="{{ asset('images/momo.jpg')}}" style="margin-left:35px;max-height:21px;"></label>
          </div>
        @endif
     @endif

     @if($paymentmethods->rave == "Yes")
          <div class="pay-opt">
              <label style="display:block;"><input type="radio" id="creditcard" value="Ravevisa" name="customRadioInline1" required=""> Pay with Rave <img src="{{ asset('images/visa.png')}}" style="margin-left:35px;max-height:21px;"></label>
          </div>
      @endif

      @if($paymentmethods->hubtel == "Yes")
          <div class="pay-opt">
              <label style="display:block;"><input type="radio" id="creditcard" value="hubtel" name="customRadioInline1" required=""> Pay with Hubtel  <img src="{{ asset('images/visa.png')}}" style="margin-left:35px;max-height:21px;"></label>
          </div>
      @endif 


      @if($paymentmethods->express_pay == "Yes")
          <div class="pay-opt">
              <label style="display:block;"><input type="radio" id="creditcard" value="express-pay" name="customRadioInline1" required=""> Pay with ExpressPay <img src="{{ asset('images/visa.png')}}" style="margin-left:35px;max-height:21px;"></label>
          </div>
      @endif

      @if($paymentmethods->paypal == "Yes")
          <div class="pay-opt">
              <label style="display:block;"><input type="radio" id="paypal" value="Paypal" name="customRadioInline1" required=""> Pay With Paypal <img src="{{ asset('images/paypal1.png')}}" style="margin-left:10px;max-height:21px;"></label>
          </div>
      @endif


      @if($paymentmethods->cash_on_delivery == "Yes")
          <div class="pay-opt">
              <label style="display:block;"><input type="radio" value="Pay on Delivery" name="customRadioInline1" required=""> Cash on Delivery <img src="{{ asset('images/arrorright.svg')}}" style="margin-left:10px;max-height:21px;"> </label>
          </div>
      @endif
         

    </div>

</div>

<!-- show only o pc -->
<div class="showoPC">
      @if(session()->get('cart'))
   
        <button class="conf" type="submit" name="submit">CONFIRM ORDER</button>

    @else

        <button class="conf" disabled="true">CONFIRM ORDER</button>

    @endif
</div>
<!-- show only o pc -->


</div>


<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">



    <div class="panel">

        @include('frontend.message')

        <div class="panel-body">

            <div class="clearfix">

                <p class="smally pull-left">
                    @if(!empty(session()->get('cart')))

                    {{ count(session()->get('cart')) }} 

                    @else

                    {{ 0 }}

                    @endif 

                Item(s) </p>
                <a href="/{{ strtolower($shop->country) }}/cart" class="edit pull-right">EDIT BAG</a>

            </div>

        </div>

        <div class="panel-footer">

            <ul class="items">

                @php  

                $qty = 0;
                $subTotal = 0;
                $itemSubTotal = 0;
                $totalPrice = 0.0;
                $weight = 0.00;
                $taxAmt = 0.0

                @endphp


                @if(session()->get('cart'))
                @foreach (session()->get('cart') as $key => $item)

                @php
                $itemSubTotal =  ($item['quantity'] * $item['productPrice']);
                $subTotal =  $subTotal + ($item['quantity'] * $item['productPrice']);
                $qty = $qty + $item['quantity'];

                $totalPrice = $totalPrice + ($item['quantity'] * $item['productPrice']);
                $weight =  $weight + ($item['productWeight'] * $item['quantity']);
                @endphp

                <li>
                    <div class="media">

                        <div class="media-left">
                            <img src="{{ asset('product_images/'.$item['productImage'])}}" class="media-object" style="height: 90px; width: 70px; object-fit: cover;" alt="{{ $item['productName'] }}">
                        </div>

                        <div class="media-body">

                            <h4 style="margin-top:0px;margin-bottom:10px;font-size:16px;">{{ $item['productName'] }}</h4>
                            {{-- <p style="font-size: 13px;margin-bottom:10px;">
                                mananan
                            </p> --}}

                            <div class="clearfix">

                                <p class="small pull-left">
                                    QTY: {{ $item['quantity'] }} X  {{ $shop->currency }} <span> {{ $item['productPrice'] }}
                                    </p>

                                    <p class="pull-right" style="font-weight: 600;">{{ $shop->currency }} {{ number_format($itemSubTotal,2) }}</p>


                                </div>
                            </div>

                        </div>

                        <p class="small">SIZE: <b>{{ $item['productAttribute'] }}</b></p>		   
                       
                    </li>

                    @endforeach
                    @else

                    


                    @endif



                </ul>

            </div>

        </div>

        @php
        $shipping = 0.0;

        ####################  CALCULATION FOR PACKAGE WEIGHT ###############
        // $wgt = $weight / 1.75 ;

        // if($wgt > 1 ){
        //     $weight = $weight + ($wgt * 0.25);
        // }else{
        //     $weight = $weight +  0.25;
        // }

        @endphp

        <div class="panel panel-1">

            <div class="panel-heading text-center">
                <h3>Order Summary </h3>
            </div>

            <div class="panel-body">
                <div class="clearfix">
                 <h3 class="pull-left">Total Item(s):</h3>
                 <p class="pull-right tt"><strong>{{ $qty }}</strong></p>
             </div>
         </div>

         <div class="panel-body">
            <div class="clearfix">

                <h3 class="pull-left">Sub Total:</h3>
                <p class="pull-right tt"><strong>{{ $shop->currency }} <span > {{ number_format($subTotal,2) }} </span></strong></p>                              

            </div>
        </div>

        <div class="panel-body">
            @php  $tax = ($shop->tax/100) * $subTotal ; @endphp
            <div class="clearfix">
                <h3 class="pull-left">Tax ( {{ number_format($shop->tax, 0) }} %)</h3>
                <p class="pull-right tt"><strong >{{ $shop->currency }} <span> {{ number_format($tax,2) }}</span></strong></p>
            </div>
        </div>

        <div class="panel-body">
            <div class="clearfix">
                <h3 class="pull-left">Shipping:</h3>

                @if(session()->has('shipping'))

                <p class="pull-right tt"><strong > Free Shipping </strong></p>

                @else

                <p class="pull-right tt"><strong >{{ $shop->currency }}<span id="shpiamt">
                    @if (session()->get('rate') == "" )

                    {{ $shipping }}

                    @else

                    {{  session()->get('rate') }}

                    @endif

                </span></strong></p>
                @endif
            </div>
        </div>

        @php 

        // COUPON CALCULATIONS
    if(session()->get('coupon')['type'] == "percentage"){

        $discountCode = session()->get('coupon')['code'];
        $discountText = "Discount (".session()->get('coupon')['discount']."%)";
        $discountAmt = (session()->get('coupon')['discount'] / 100) * $totalPrice;

    }elseif (session()->get('coupon')['type'] == "fixed") {

        $discountCode = session()->get('coupon')['code'];
        $discountText = "Discount";
        $discountAmt = (session()->get('coupon')['discount']);

    }else{
        
        $discountCode = "";
        $discountText = "Discount";
        $discountAmt = (0.00);

}

@endphp

@if(isset($discountAmt))
<div class="panel-body">
    <div class="clearfix">
        <h3 class="pull-left">{{ $discountText }} :</h3>
        <p class="pull-right tt"><strong>({{ $shop->currency }} <span> {{ number_format($discountAmt,2) }}</span>)</strong></p>
    </div>
</div>
@endif

<div class="panel-body">
    <div class="clearfix">
        <h3 class="pull-left">Total Amount:</h3>
        <p class="pull-right tt">

            <strong>{{ $shop->currency }} <span id="netTotalAmt"> {{ number_format(($totalPrice + $tax + $shipping) - $discountAmt,2) }} </span></strong>

        </p>

    </div>
</div>



{{-- ORDER INPUT --}}

<input type="hidden"  name="totalqty" value="{{ $qty }}" />
<input type="hidden"  name="totalamount" id="totalamount" value="{{ ($totalPrice + $tax ) - $discountAmt  }}" />
<input type="hidden"  name="shippingamt" id="shipamt1" value="{{ $shipping }}"/>
<input type="hidden"  name="weight" id="prod_weight" value="{{ $weight }}" />
<input type="hidden"  name="tax"  value="{{ $tax }}" />
{{-- <input type="hidden"  name="nextDayshipping" id="nextDayshipping" value="{{ $nextDayShipmet }}" /> --}}

{{-- COUPON SECTION --}}
<input type="hidden"  name="coupon_code" value="{{ $discountCode }}" />
<input type="hidden"  name="coupon_amount"  value="{{ $discountAmt }}" />

{{-- style="display:none" --}}



<!-- this will show only on phonne -->
<div class="col-12 showonphoneonly">
    @if(session()->get('cart'))

    <button class="conf" type="submit" name="submit">CONFIRM ORDER</button>

    @else

    <button class="conf" disabled="true">CONFIRM ORDER</button>

    @endif
</div>
<!-- this will show only on phonne -->

{!! Form::close() !!}

</div>



{!! Form::open(['action' => 'publicController@addcoupon', 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t'] ) !!}


<div class="col-12">
  <div class="panel">
    <div class="panel-body ">
        <div class="form-group col-12 fifteenp">
           <label for="inputCity"> </label>
           <input type="text" class="form-control form-control2" name="code" value="{{ old('code') }}" placeholder="Enter Coupon Code" required >
       </div>
       <div class="form-group col-12 fifteenp">
         <label for="inputCity"> </label>
         <button type="submit" class="form-control form-control2" >Submit</button>
     </div>
 </div>
</div>
</div>


{!! Form::close() !!}




</div>

</div>

</div>

</div>



@include('frontend.inc.footer')

<script>

$(window).bind("pageshow", function() {
    $("#ship_input").val('');
   // $("#another_id").val('');
});

// $(window).on('popstate', function(event) {
//  alert("pop");
// });

// if(performance.navigation.type == 2)
// {
//     //Do your code here
    
//     alert("pop");
//     var conceptVal = document.getElementById('shipamt1').value = 1000;
//     alert(conceptVal);

// }

//$(document).ready(function(){
     
  
    
 //var conceptVal = document.getElementById('shipamt1').value;

//   //  var conceptVal = $("#ship_input").filter(":selected").val();
//     //var conceptVal = $("#ship_input").val(2).change();
//    // var zone = $('#ship_input').find(":selected").val();
  //  console.log(conceptVal);
//      //var zone = document.getElementById('ship_input').value ;
//     // alert(zone);
//     // call shipping function on load method;
//    //  nextDayshipmet(0);

//     // shiprate(zone);
     
// });



</script>


<script>
    // jQuery
    // $(window).on('popstate', function (e) {
    //     var state = e.originalEvent.state;
    //     if (state !== null) {
    //         console.log('mk');
    //         //load content with ajax
    //     }
    // });

//     $(window).on("navigate", function (event, data) {
//   var direction = data.state.direction;
//   if (direction == 'back') {
//       alert('mk');
//     // do something
//   }
//   if (direction == 'forward') {
//     // do something else
//   }
// });
    
    // Vanilla javascript
    // window.addEventListener('popstate', function (e) {
    //     var state = e.state;
    //     if (state !== null) {
    //         //load content with ajax
    //     }
    // });
    </script>
<script type="text/javascript"> 

// $(document).ready(function(e) {
//     var $input = $('#refresh');

//     $input.val() == 'yes' ? location.reload(true) : $input.val('yes');
// });

    // If persisted then it is in the page cache, force a reload of the page.
            // window.onpageshow = function(event){
            //     if(event.persisted){        
            //         document.body.style.display ="none";        
            //         location.reload();
            //     }
            // };
    
   

</script>


</body>


<script>


</script>

</html>
