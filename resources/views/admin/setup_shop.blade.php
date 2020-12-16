@extends('admin.layout.app')
@section('content')

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Header -->
			 
					 <!-- For animations -->
                <div class="content bg-gray-lighter visibility-hidden"   data-toggle="appear" data-class="animated bounceIn">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                Slider FORM <small>Add new Slide Here, by filling the form below.</small>
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Slider form</li>
                                
                            </ol>
                        </div>
                    </div>
                    {{-- MESSAGE --}}
                    @include('admin.message')
                </div>

                
			
                <!-- END Page Header -->

                <!-- Page Content -->
                <div class="content content-narrow">
				   <!-- For animations -->
					 <div class="block visibility-hidden"  data-toggle="appear" data-timeout="100" data-class="animated fadeInLeft">
                                <div class="block-content block-content-narrow">
                                        {!! Form::open(['action' => 'setupController@store', 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t'] ) !!}
                                       
                                           <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-material floating">
                                                        <input class="form-control" type="text" id="material-text2" name="shop_name" required >
                                                        <label for="material-text2">Enter Shop Name</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-material floating">
                                                        <select class="form-control" id="material-select2" name="country" size="1" required>
                                                            <option></option><!-- Empty value for demostrating material select box -->
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
                                                            <option  selected='selected' value="GB">United Kingdom (UK)</option>
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
                                                        <label for="material-select2">Where is your store based?</label>
                                                    </div>
                                                </div>
                                            </div>
                                              
                                         
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <div class="form-material floating">
                                                        <input class="form-control" type="text" id="material-email2" name="address" >
                                                        <label for="material-email2">Address</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <div class="form-material floating">
                                                        <input class="form-control" type="text" id="material-email2" name="address_2" >
                                                        <label for="material-email2">Address 2</label>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <div class="form-material floating">
                                                        <input class="form-control" type="text" id="material-email2" name="city" >
                                                        <label for="material-email2">City</label>
                                                    </div>
                                                </div>

                                                <div class="col-xs-6">
                                                    <div class="form-material floating">
                                                        <input class="form-control" type="text" id="material-email2" name="postcode_zip" >
                                                        <label for="material-email2">Postcode / ZIP</label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-material floating">
                                                        <select class="form-control" id="material-select2" name="currencyq" size="1" required>
                                                            <option value="">Choose a currency&hellip;</option>
                                                            <option value="AED" >
                                                United Arab Emirates dirham (&#x62f;.&#x625; AED)					</option>
                                                            <option value="AFN" >
                                                Afghan afghani (&#x60b; AFN)					</option>
                                                            <option value="ALL" >
                                                Albanian lek (L ALL)					</option>
                                                            <option value="AMD" >
                                                Armenian dram (AMD)					</option>
                                                            <option value="ANG" >
                                                Netherlands Antillean guilder (&fnof; ANG)					</option>
                                                            <option value="AOA" >
                                                Angolan kwanza (Kz AOA)					</option>
                                                            <option value="ARS" >
                                                Argentine peso (&#036; ARS)					</option>
                                                            <option value="AUD" >
                                                Australian dollar (&#036; AUD)					</option>
                                                            <option value="AWG" >
                                                Aruban florin (Afl. AWG)					</option>
                                                            <option value="AZN" >
                                                Azerbaijani manat (AZN)					</option>
                                                            <option value="BAM" >
                                                Bosnia and Herzegovina convertible mark (KM BAM)					</option>
                                                            <option value="BBD" >
                                                Barbadian dollar (&#036; BBD)					</option>
                                                            <option value="BDT" >
                                                Bangladeshi taka (&#2547;&nbsp; BDT)					</option>
                                                            <option value="BGN" >
                                                Bulgarian lev (&#1083;&#1074;. BGN)					</option>
                                                            <option value="BHD" >
                                                Bahraini dinar (.&#x62f;.&#x628; BHD)					</option>
                                                            <option value="BIF" >
                                                Burundian franc (Fr BIF)					</option>
                                                            <option value="BMD" >
                                                Bermudian dollar (&#036; BMD)					</option>
                                                            <option value="BND" >
                                                Brunei dollar (&#036; BND)					</option>
                                                            <option value="BOB" >
                                                Bolivian boliviano (Bs. BOB)					</option>
                                                            <option value="BRL" >
                                                Brazilian real (&#082;&#036; BRL)					</option>
                                                            <option value="BSD" >
                                                Bahamian dollar (&#036; BSD)					</option>
                                                            <option value="BTC" >
                                                Bitcoin (&#3647; BTC)					</option>
                                                            <option value="BTN" >
                                                Bhutanese ngultrum (Nu. BTN)					</option>
                                                            <option value="BWP" >
                                                Botswana pula (P BWP)					</option>
                                                            <option value="BYR" >
                                                Belarusian ruble (old) (Br BYR)					</option>
                                                            <option value="BYN" >
                                                Belarusian ruble (Br BYN)					</option>
                                                            <option value="BZD" >
                                                Belize dollar (&#036; BZD)					</option>
                                                            <option value="CAD" >
                                                Canadian dollar (&#036; CAD)					</option>
                                                            <option value="CDF" >
                                                Congolese franc (Fr CDF)					</option>
                                                            <option value="CHF" >
                                                Swiss franc (&#067;&#072;&#070; CHF)					</option>
                                                            <option value="CLP" >
                                                Chilean peso (&#036; CLP)					</option>
                                                            <option value="CNY" >
                                                Chinese yuan (&yen; CNY)					</option>
                                                            <option value="COP" >
                                                Colombian peso (&#036; COP)					</option>
                                                            <option value="CRC" >
                                                Costa Rican col&oacute;n (&#x20a1; CRC)					</option>
                                                            <option value="CUC" >
                                                Cuban convertible peso (&#036; CUC)					</option>
                                                            <option value="CUP" >
                                                Cuban peso (&#036; CUP)					</option>
                                                            <option value="CVE" >
                                                Cape Verdean escudo (&#036; CVE)					</option>
                                                            <option value="CZK" >
                                                Czech koruna (&#075;&#269; CZK)					</option>
                                                            <option value="DJF" >
                                                Djiboutian franc (Fr DJF)					</option>
                                                            <option value="DKK" >
                                                Danish krone (DKK)					</option>
                                                            <option value="DOP" >
                                                Dominican peso (RD&#036; DOP)					</option>
                                                            <option value="DZD" >
                                                Algerian dinar (&#x62f;.&#x62c; DZD)					</option>
                                                            <option value="EGP" >
                                                Egyptian pound (EGP)					</option>
                                                            <option value="ERN" >
                                                Eritrean nakfa (Nfk ERN)					</option>
                                                            <option value="ETB" >
                                                Ethiopian birr (Br ETB)					</option>
                                                            <option value="EUR" >
                                                Euro (&euro; EUR)					</option>
                                                            <option value="FJD" >
                                                Fijian dollar (&#036; FJD)					</option>
                                                            <option value="FKP" >
                                                Falkland Islands pound (&pound; FKP)					</option>
                                                            <option value="GBP"  selected='selected'>
                                                Pound sterling (&pound; GBP)					</option>
                                                            <option value="GEL" >
                                                Georgian lari (&#x20be; GEL)					</option>
                                                            <option value="GGP" >
                                                Guernsey pound (&pound; GGP)					</option>
                                                            <option value="GHS" >
                                                Ghana cedi (&#x20b5; GHS)					</option>
                                                            <option value="GIP" >
                                                Gibraltar pound (&pound; GIP)					</option>
                                                            <option value="GMD" >
                                                Gambian dalasi (D GMD)					</option>
                                                            <option value="GNF" >
                                                Guinean franc (Fr GNF)					</option>
                                                            <option value="GTQ" >
                                                Guatemalan quetzal (Q GTQ)					</option>
                                                            <option value="GYD" >
                                                Guyanese dollar (&#036; GYD)					</option>
                                                            <option value="HKD" >
                                                Hong Kong dollar (&#036; HKD)					</option>
                                                            <option value="HNL" >
                                                Honduran lempira (L HNL)					</option>
                                                            <option value="HRK" >
                                                Croatian kuna (kn HRK)					</option>
                                                            <option value="HTG" >
                                                Haitian gourde (G HTG)					</option>
                                                            <option value="HUF" >
                                                Hungarian forint (&#070;&#116; HUF)					</option>
                                                            <option value="IDR" >
                                                Indonesian rupiah (Rp IDR)					</option>
                                                            <option value="ILS" >
                                                Israeli new shekel (&#8362; ILS)					</option>
                                                            <option value="IMP" >
                                                Manx pound (&pound; IMP)					</option>
                                                            <option value="INR" >
                                                Indian rupee (&#8377; INR)					</option>
                                                            <option value="IQD" >
                                                Iraqi dinar (&#x639;.&#x62f; IQD)					</option>
                                                            <option value="IRR" >
                                                Iranian rial (&#xfdfc; IRR)					</option>
                                                            <option value="IRT" >
                                                Iranian toman (&#x62A;&#x648;&#x645;&#x627;&#x646; IRT)					</option>
                                                            <option value="ISK" >
                                                Icelandic kr&oacute;na (kr. ISK)					</option>
                                                            <option value="JEP" >
                                                Jersey pound (&pound; JEP)					</option>
                                                            <option value="JMD" >
                                                Jamaican dollar (&#036; JMD)					</option>
                                                            <option value="JOD" >
                                                Jordanian dinar (&#x62f;.&#x627; JOD)					</option>
                                                            <option value="JPY" >
                                                Japanese yen (&yen; JPY)					</option>
                                                            <option value="KES" >
                                                Kenyan shilling (KSh KES)					</option>
                                                            <option value="KGS" >
                                                Kyrgyzstani som (&#x441;&#x43e;&#x43c; KGS)					</option>
                                                            <option value="KHR" >
                                                Cambodian riel (&#x17db; KHR)					</option>
                                                            <option value="KMF" >
                                                Comorian franc (Fr KMF)					</option>
                                                            <option value="KPW" >
                                                North Korean won (&#x20a9; KPW)					</option>
                                                            <option value="KRW" >
                                                South Korean won (&#8361; KRW)					</option>
                                                            <option value="KWD" >
                                                Kuwaiti dinar (&#x62f;.&#x643; KWD)					</option>
                                                            <option value="KYD" >
                                                Cayman Islands dollar (&#036; KYD)					</option>
                                                            <option value="KZT" >
                                                Kazakhstani tenge (KZT)					</option>
                                                            <option value="LAK" >
                                                Lao kip (&#8365; LAK)					</option>
                                                            <option value="LBP" >
                                                Lebanese pound (&#x644;.&#x644; LBP)					</option>
                                                            <option value="LKR" >
                                                Sri Lankan rupee (&#xdbb;&#xdd4; LKR)					</option>
                                                            <option value="LRD" >
                                                Liberian dollar (&#036; LRD)					</option>
                                                            <option value="LSL" >
                                                Lesotho loti (L LSL)					</option>
                                                            <option value="LYD" >
                                                Libyan dinar (&#x644;.&#x62f; LYD)					</option>
                                                            <option value="MAD" >
                                                Moroccan dirham (&#x62f;.&#x645;. MAD)					</option>
                                                            <option value="MDL" >
                                                Moldovan leu (MDL)					</option>
                                                            <option value="MGA" >
                                                Malagasy ariary (Ar MGA)					</option>
                                                            <option value="MKD" >
                                                Macedonian denar (&#x434;&#x435;&#x43d; MKD)					</option>
                                                            <option value="MMK" >
                                                Burmese kyat (Ks MMK)					</option>
                                                            <option value="MNT" >
                                                Mongolian t&ouml;gr&ouml;g (&#x20ae; MNT)					</option>
                                                            <option value="MOP" >
                                                Macanese pataca (P MOP)					</option>
                                                            <option value="MRO" >
                                                Mauritanian ouguiya (UM MRO)					</option>
                                                            <option value="MUR" >
                                                Mauritian rupee (&#x20a8; MUR)					</option>
                                                            <option value="MVR" >
                                                Maldivian rufiyaa (.&#x783; MVR)					</option>
                                                            <option value="MWK" >
                                                Malawian kwacha (MK MWK)					</option>
                                                            <option value="MXN" >
                                                Mexican peso (&#036; MXN)					</option>
                                                            <option value="MYR" >
                                                Malaysian ringgit (&#082;&#077; MYR)					</option>
                                                            <option value="MZN" >
                                                Mozambican metical (MT MZN)					</option>
                                                            <option value="NAD" >
                                                Namibian dollar (&#036; NAD)					</option>
                                                            <option value="NGN" >
                                                Nigerian naira (&#8358; NGN)					</option>
                                                            <option value="NIO" >
                                                Nicaraguan c&oacute;rdoba (C&#036; NIO)					</option>
                                                            <option value="NOK" >
                                                Norwegian krone (&#107;&#114; NOK)					</option>
                                                            <option value="NPR" >
                                                Nepalese rupee (&#8360; NPR)					</option>
                                                            <option value="NZD" >
                                                New Zealand dollar (&#036; NZD)					</option>
                                                            <option value="OMR" >
                                                Omani rial (&#x631;.&#x639;. OMR)					</option>
                                                            <option value="PAB" >
                                                Panamanian balboa (B/. PAB)					</option>
                                                            <option value="PEN" >
                                                Sol (S/ PEN)					</option>
                                                            <option value="PGK" >
                                                Papua New Guinean kina (K PGK)					</option>
                                                            <option value="PHP" >
                                                Philippine peso (&#8369; PHP)					</option>
                                                            <option value="PKR" >
                                                Pakistani rupee (&#8360; PKR)					</option>
                                                            <option value="PLN" >
                                                Polish z&#x142;oty (&#122;&#322; PLN)					</option>
                                                            <option value="PRB" >
                                                Transnistrian ruble (&#x440;. PRB)					</option>
                                                            <option value="PYG" >
                                                Paraguayan guaran&iacute; (&#8370; PYG)					</option>
                                                            <option value="QAR" >
                                                Qatari riyal (&#x631;.&#x642; QAR)					</option>
                                                            <option value="RON" >
                                                Romanian leu (lei RON)					</option>
                                                            <option value="RSD" >
                                                Serbian dinar (&#x434;&#x438;&#x43d;. RSD)					</option>
                                                            <option value="RUB" >
                                                Russian ruble (&#8381; RUB)					</option>
                                                            <option value="RWF" >
                                                Rwandan franc (Fr RWF)					</option>
                                                            <option value="SAR" >
                                                Saudi riyal (&#x631;.&#x633; SAR)					</option>
                                                            <option value="SBD" >
                                                Solomon Islands dollar (&#036; SBD)					</option>
                                                            <option value="SCR" >
                                                Seychellois rupee (&#x20a8; SCR)					</option>
                                                            <option value="SDG" >
                                                Sudanese pound (&#x62c;.&#x633;. SDG)					</option>
                                                            <option value="SEK" >
                                                Swedish krona (&#107;&#114; SEK)					</option>
                                                            <option value="SGD" >
                                                Singapore dollar (&#036; SGD)					</option>
                                                            <option value="SHP" >
                                                Saint Helena pound (&pound; SHP)					</option>
                                                            <option value="SLL" >
                                                Sierra Leonean leone (Le SLL)					</option>
                                                            <option value="SOS" >
                                                Somali shilling (Sh SOS)					</option>
                                                            <option value="SRD" >
                                                Surinamese dollar (&#036; SRD)					</option>
                                                            <option value="SSP" >
                                                South Sudanese pound (&pound; SSP)					</option>
                                                            <option value="STD" >
                                                S&atilde;o Tom&eacute; and Pr&iacute;ncipe dobra (Db STD)					</option>
                                                            <option value="SYP" >
                                                Syrian pound (&#x644;.&#x633; SYP)					</option>
                                                            <option value="SZL" >
                                                Swazi lilangeni (L SZL)					</option>
                                                            <option value="THB" >
                                                Thai baht (&#3647; THB)					</option>
                                                            <option value="TJS" >
                                                Tajikistani somoni (&#x405;&#x41c; TJS)					</option>
                                                            <option value="TMT" >
                                                Turkmenistan manat (m TMT)					</option>
                                                            <option value="TND" >
                                                Tunisian dinar (&#x62f;.&#x62a; TND)					</option>
                                                            <option value="TOP" >
                                                Tongan pa&#x2bb;anga (T&#036; TOP)					</option>
                                                            <option value="TRY" >
                                                Turkish lira (&#8378; TRY)					</option>
                                                            <option value="TTD" >
                                                Trinidad and Tobago dollar (&#036; TTD)					</option>
                                                            <option value="TWD" >
                                                New Taiwan dollar (&#078;&#084;&#036; TWD)					</option>
                                                            <option value="TZS" >
                                                Tanzanian shilling (Sh TZS)					</option>
                                                            <option value="UAH" >
                                                Ukrainian hryvnia (&#8372; UAH)					</option>
                                                            <option value="UGX" >
                                                Ugandan shilling (UGX)					</option>
                                                            <option value="USD" >
                                                United States (US) dollar (&#036; USD)					</option>
                                                            <option value="UYU" >
                                                Uruguayan peso (&#036; UYU)					</option>
                                                            <option value="UZS" >
                                                Uzbekistani som (UZS)					</option>
                                                            <option value="VEF" >
                                                Venezuelan bol&iacute;var (Bs F VEF)					</option>
                                                            <option value="VES" >
                                                Bol&iacute;var soberano (Bs.S VES)					</option>
                                                            <option value="VND" >
                                                Vietnamese &#x111;&#x1ed3;ng (&#8363; VND)					</option>
                                                            <option value="VUV" >
                                                Vanuatu vatu (Vt VUV)					</option>
                                                            <option value="WST" >
                                                Samoan t&#x101;l&#x101; (T WST)					</option>
                                                            <option value="XAF" >
                                                Central African CFA franc (CFA XAF)					</option>
                                                            <option value="XCD" >
                                                East Caribbean dollar (&#036; XCD)					</option>
                                                            <option value="XOF" >
                                                West African CFA franc (CFA XOF)					</option>
                                                            <option value="XPF" >
                                                CFP franc (Fr XPF)					</option>
                                                            <option value="YER" >
                                                Yemeni rial (&#xfdfc; YER)					</option>
                                                            <option value="ZAR" >
                                                South African rand (&#082; ZAR)					</option>
                                                            <option value="ZMW" >
                                                Zambian kwacha (ZK ZMW)					</option>
                                                    </select>
                                                        </select>
                                                        <label for="material-select2">What Current do you accept payments in?</label>
                                                    </div>
                                                </div>
                                            </div>
                                            

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-material floating">
                                                        <select class="form-control" id="material-select2" name="type" size="1" required>
                                                            <option value="both"  selected='selected'>I plan to sell both physical and digital products</option>
                                                            <option value="physical" >I plan to sell physical products</option>
                                                            <option value="virtual" >I plan to sell digital products</option>
                                                        </select>
                                                        
                                                        <label for="material-select2">What type of products do you plan to sell?</label>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-material floating">
                                                        <input
                                                        type="checkbox"
                                                        id="woocommerce_sell_in_person"
                                                        name="sell_in_person"
                                                        value="yes"
                                                                    />
                                                    <label class="location-prompt" for="woocommerce_sell_in_person">  I will also be selling products or services in person.</label>
                                            </div>
                                        </div>
                                    </div> --}}
                            
 
                                           
                                            <div class="form-group">
                                                <label class="col-xs-12" for="example-file-input">File Input</label>
                                                <div class="col-xs-12">
                                                    <div class="fileupload add-new-plus">
                                                         <input id="imageupload" type="file" name="pic" required>
                                                    </div>
                                                  <div id="preview-image"></div>
                                                </div>
                                            </div>
    
                                    <div class="form-group text-right m-b-0 visibility-hidden" data-toggle="appear" data-class="animated bounceIn">
                                        <button class="btn btn-sm btn-primary " type="submit"  name="submit">Publish</button>
                                    </div>
                                </div>
                            </div>
                            <!-- END Floating Labels -->
                     {!! Form::close() !!}
            </main>

@endsection
       