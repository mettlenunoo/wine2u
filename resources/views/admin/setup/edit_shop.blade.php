@extends('admin.layout.app')
@section('content')

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Header -->
                
                <div class="content bg-gray-lighter visibility-hidden"   data-toggle="appear" data-class="animated bounceIn">
                        <div class="row items-push">
                            <div class="col-sm-7">
                                <h1 class="page-heading">
                                 Edit  Shop 
                                </h1>
                            </div>
                            <div class="col-sm-5 text-right hidden-xs">
                                <ol class="breadcrumb push-10-t">
                                    <li>Shop</li>
                                    <li><a class="link-effect" href="/admin/setup/shop">All Shops</a></li>
                                </ol>
                            </div>
                        </div>
                </div>

                <!-- END Page Header -->

                @include('admin.message')


                <!-- Page Content -->
                <div class="content content-narrow">
				   <!-- For animations -->
					 <div class="block visibility-hidden"  data-toggle="appear" data-timeout="100" data-class="animated fadeInLeft">
                                <div class="block-content block-content-narrow">
                                        {!! Form::open(['action' => ['setupController@update', $shop->id ], 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t'] ) !!}
                                       
                                           <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-material floating">
                                                        <input class="form-control" type="text" id="material-text2" name="shop_name" value="<?= $shop->shop_name?>"    required >
                                                        <label for="material-text2">Enter Shop Name</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-material floating">
                                                        <select class="form-control" id="material-select2" name="country" size="1" required>
                                                            <option></option><!-- Empty value for demostrating material select box -->
                                                            <option  value="AX"  @if($shop->country == "AX") selected='selected' @endif >&#197;land Islands</option>
                                                            <option  value="AF"  @if($shop->country == "AF") selected='selected' @endif >Afghanistan</option>
                                                            <option  value="AL"  @if($shop->country == "AL") selected='selected' @endif >Albania</option>
                                                            <option  value="DZ"  @if($shop->country == "DZ") selected='selected' @endif>Algeria</option>
                                                            <option  value="AS"  @if($shop->country == "AS") selected='selected' @endif>American Samoa</option>
                                                            <option  value="AD"  @if($shop->country == "AD") selected='selected' @endif>Andorra</option>
                                                            <option  value="AO"  @if($shop->country == "AO") selected='selected' @endif>Angola</option>
                                                            <option  value="AI"  @if($shop->country == "AI") selected='selected' @endif>Anguilla</option>
                                                            <option  value="AQ"  @if($shop->country == "AQ") selected='selected' @endif>Antarctica</option>
                                                            <option  value="AG"  @if($shop->country == "AG") selected='selected' @endif>Antigua and Barbuda</option>
                                                            <option  value="AR"  @if($shop->country == "AR") selected='selected' @endif>Argentina</option>
                                                            <option  value="AM"  @if($shop->country == "AM") selected='selected' @endif>Armenia</option>
                                                            <option  value="AW"  @if($shop->country == "AW") selected='selected' @endif>Aruba</option>
                                                            <option  value="AU"  @if($shop->country == "AU") selected='selected' @endif>Australia</option>
                                                            <option  value="AT"  @if($shop->country == "AT") selected='selected' @endif>Austria</option>
                                                            <option  value="AZ"  @if($shop->country == "AZ") selected='selected' @endif>Azerbaijan</option>
                                                            <option  value="BS"  @if($shop->country == "BS") selected='selected' @endif>Bahamas</option>
                                                            <option  value="BH"  @if($shop->country == "BH") selected='selected' @endif>Bahrain</option>
                                                            <option  value="BD"  @if($shop->country == "BD") selected='selected' @endif>Bangladesh</option>
                                                            <option  value="BB"  @if($shop->country == "BB") selected='selected' @endif>Barbados</option>
                                                            <option  value="BY"  @if($shop->country == "BY") selected='selected' @endif>Belarus</option>
                                                            <option  value="PW"  @if($shop->country == "PW") selected='selected' @endif>Belau</option>
                                                            <option  value="BE"  @if($shop->country == "BE") selected='selected' @endif>Belgium</option>
                                                            <option  value="BZ"  @if($shop->country == "BZ") selected='selected' @endif>Belize</option>
                                                            <option  value="BJ"  @if($shop->country == "BJ") selected='selected' @endif>Benin</option>
                                                            <option  value="BM"  @if($shop->country == "BM") selected='selected' @endif>Bermuda</option>
                                                            <option  value="BT"  @if($shop->country == "BT") selected='selected' @endif>Bhutan</option>
                                                            <option  value="BO"  @if($shop->country == "BO") selected='selected' @endif>Bolivia</option>
                                                            <option  value="BQ"  @if($shop->country == "BQ") selected='selected' @endif>Bonaire, Saint Eustatius and Saba</option>
                                                            <option  value="BA"  @if($shop->country == "BA") selected='selected' @endif>Bosnia and Herzegovina</option>
                                                            <option  value="BW"  @if($shop->country == "BW") selected='selected' @endif>Botswana</option>
                                                            <option  value="BV"  @if($shop->country == "BV") selected='selected' @endif>Bouvet Island</option>
                                                            <option  value="BR"  @if($shop->country == "BR") selected='selected' @endif>Brazil</option>
                                                            <option  value="IO"  @if($shop->country == "IO") selected='selected' @endif>British Indian Ocean Territory</option>
                                                            <option  value="BN"  @if($shop->country == "BN") selected='selected' @endif>Brunei</option>
                                                            <option  value="BG"  @if($shop->country == "BG") selected='selected' @endif>Bulgaria</option>
                                                            <option  value="BF"  @if($shop->country == "BF") selected='selected' @endif>Burkina Faso</option>
                                                            <option  value="BI"  @if($shop->country == "BI") selected='selected' @endif>Burundi</option>
                                                            <option  value="KH"  @if($shop->country == "KH") selected='selected' @endif>Cambodia</option>
                                                            <option  value="CM"  @if($shop->country == "CM") selected='selected' @endif>Cameroon</option>
                                                            <option  value="CA"  @if($shop->country == "CA") selected='selected' @endif>Canada</option>
                                                            <option  value="CV"  @if($shop->country == "CV") selected='selected' @endif>Cape Verde</option>
                                                            <option  value="KY"  @if($shop->country == "KY") selected='selected' @endif>Cayman Islands</option>
                                                            <option  value="CF"  @if($shop->country == "CF") selected='selected' @endif>Central African Republic</option>
                                                            <option  value="TD"  @if($shop->country == "TD") selected='selected' @endif>Chad</option>
                                                            <option  value="CL"  @if($shop->country == "CL") selected='selected' @endif>Chile</option>
                                                            <option  value="CN"  @if($shop->country == "CN") selected='selected' @endif>China</option>
                                                            <option  value="CX"  @if($shop->country == "CX") selected='selected' @endif>Christmas Island</option>
                                                            <option  value="CC"  @if($shop->country == "CC") selected='selected' @endif>Cocos (Keeling) Islands</option>
                                                            <option  value="CO"  @if($shop->country == "CO") selected='selected' @endif>Colombia</option>
                                                            <option  value="KM"  @if($shop->country == "KM") selected='selected' @endif>Comoros</option>
                                                            <option  value="CG"  @if($shop->country == "CG") selected='selected' @endif>Congo (Brazzaville)</option>
                                                            <option  value="CD"  @if($shop->country == "CD") selected='selected' @endif>Congo (Kinshasa)</option>
                                                            <option  value="CK"  @if($shop->country == "CK") selected='selected' @endif>Cook Islands</option>
                                                            <option  value="CR"  @if($shop->country == "CR") selected='selected' @endif>Costa Rica</option>
                                                            <option  value="HR"  @if($shop->country == "HR") selected='selected' @endif>Croatia</option>
                                                            <option  value="CU"  @if($shop->country == "CU") selected='selected' @endif>Cuba</option>
                                                            <option  value="CW"  @if($shop->country == "CW") selected='selected' @endif>Cura&ccedil;ao</option>
                                                            <option  value="CY"  @if($shop->country == "CY") selected='selected' @endif>Cyprus</option>
                                                            <option  value="CZ"  @if($shop->country == "CZ") selected='selected' @endif>Czech Republic</option>
                                                            <option  value="DK"  @if($shop->country == "DK") selected='selected' @endif>Denmark</option>
                                                            <option  value="DJ"  @if($shop->country == "DJ") selected='selected' @endif>Djibouti</option>
                                                            <option  value="DM"  @if($shop->country == "DM") selected='selected' @endif>Dominica</option>
                                                            <option  value="DO"  @if($shop->country == "DO") selected='selected' @endif>Dominican Republic</option>
                                                            <option  value="EC"  @if($shop->country == "EC") selected='selected' @endif>Ecuador</option>
                                                            <option  value="EG"  @if($shop->country == "EG") selected='selected' @endif>Egypt</option>
                                                            <option  value="SV"  @if($shop->country == "SV") selected='selected' @endif>El Salvador</option>
                                                            <option  value="GQ"  @if($shop->country == "GQ") selected='selected' @endif>Equatorial Guinea</option>
                                                            <option  value="ER"  @if($shop->country == "ER") selected='selected' @endif>Eritrea</option>
                                                            <option  value="EE"  @if($shop->country == "EE") selected='selected' @endif>Estonia</option>
                                                            <option  value="ET"  @if($shop->country == "ET") selected='selected' @endif>Ethiopia</option>
                                                            <option  value="FK"  @if($shop->country == "FK") selected='selected' @endif>Falkland Islands</option>
                                                            <option  value="FO"  @if($shop->country == "FO") selected='selected' @endif>Faroe Islands</option>
                                                            <option  value="FJ"  @if($shop->country == "FJ") selected='selected' @endif>Fiji</option>
                                                            <option  value="FI"  @if($shop->country == "FI") selected='selected' @endif>Finland</option>
                                                            <option  value="FR"  @if($shop->country == "FR") selected='selected' @endif>France</option>
                                                            <option  value="GF"  @if($shop->country == "GF") selected='selected' @endif>French Guiana</option>
                                                            <option  value="PF"  @if($shop->country == "PF") selected='selected' @endif>French Polynesia</option>
                                                            <option  value="TF"  @if($shop->country == "TF") selected='selected' @endif>French Southern Territories</option>
                                                            <option  value="GA"  @if($shop->country == "GA") selected='selected' @endif>Gabon</option>
                                                            <option  value="GM"  @if($shop->country == "GM") selected='selected' @endif>Gambia</option>
                                                            <option  value="GE"  @if($shop->country == "GE") selected='selected' @endif>Georgia</option>
                                                            <option  value="DE"  @if($shop->country == "DE") selected='selected' @endif>Germany</option>
                                                            <option  value="GH"  @if($shop->country == "GH") selected='selected' @endif>Ghana</option>
                                                            <option  value="GI"  @if($shop->country == "GI") selected='selected' @endif>Gibraltar</option>
                                                            <option  value="GR"  @if($shop->country == "GR") selected='selected' @endif>Greece</option>
                                                            <option  value="GL"  @if($shop->country == "GL") selected='selected' @endif>Greenland</option>
                                                            <option  value="GD"  @if($shop->country == "GD") selected='selected' @endif>Grenada</option>
                                                            <option  value="GP"  @if($shop->country == "GP") selected='selected' @endif>Guadeloupe</option>
                                                            <option  value="GU"  @if($shop->country == "GU") selected='selected' @endif>Guam</option>
                                                            <option  value="GT"  @if($shop->country == "GT") selected='selected' @endif>Guatemala</option>
                                                            <option  value="GG"  @if($shop->country == "GG") selected='selected' @endif>Guernsey</option>
                                                            <option  value="GN"  @if($shop->country == "GN") selected='selected' @endif>Guinea</option>
                                                            <option  value="GW"  @if($shop->country == "GW") selected='selected' @endif>Guinea-Bissau</option>
                                                            <option  value="GY"  @if($shop->country == "GY") selected='selected' @endif>Guyana</option>
                                                            <option  value="HT"  @if($shop->country == "HT") selected='selected' @endif>Haiti</option>
                                                            <option  value="HM"  @if($shop->country == "HM") selected='selected' @endif>Heard Island and McDonald Islands</option>
                                                            <option  value="HN"  @if($shop->country == "HN") selected='selected' @endif>Honduras</option>
                                                            <option  value="HK"  @if($shop->country == "HK") selected='selected' @endif>Hong Kong</option>
                                                            <option  value="HU"  @if($shop->country == "HU") selected='selected' @endif>Hungary</option>
                                                            <option  value="IS"  @if($shop->country == "IS") selected='selected' @endif>Iceland</option>
                                                            <option  value="IN"  @if($shop->country == "IN") selected='selected' @endif>India</option>
                                                            <option  value="ID"  @if($shop->country == "ID") selected='selected' @endif>Indonesia</option>
                                                            <option  value="IR"  @if($shop->country == "IR") selected='selected' @endif>Iran</option>
                                                            <option  value="IQ"  @if($shop->country == "IQ") selected='selected' @endif>Iraq</option>
                                                            <option  value="IE"  @if($shop->country == "IE") selected='selected' @endif>Ireland</option>
                                                            <option  value="IM"  @if($shop->country == "IM") selected='selected' @endif>Isle of Man</option>
                                                            <option  value="IL"  @if($shop->country == "IL") selected='selected' @endif>Israel</option>
                                                            <option  value="IT"  @if($shop->country == "IT") selected='selected' @endif>Italy</option>
                                                            <option  value="CI"  @if($shop->country == "CI") selected='selected' @endif>Ivory Coast</option>
                                                            <option  value="JM"  @if($shop->country == "JM") selected='selected' @endif>Jamaica</option>
                                                            <option  value="JP"  @if($shop->country == "JP") selected='selected' @endif>Japan</option>
                                                            <option  value="JE"  @if($shop->country == "JE") selected='selected' @endif>Jersey</option>
                                                            <option  value="JO"  @if($shop->country == "JO") selected='selected' @endif>Jordan</option>
                                                            <option  value="KZ"  @if($shop->country == "KZ") selected='selected' @endif>Kazakhstan</option>
                                                            <option  value="KE"  @if($shop->country == "KE") selected='selected' @endif>Kenya</option>
                                                            <option  value="KI"  @if($shop->country == "KI") selected='selected' @endif>Kiribati</option>
                                                            <option  value="KW"  @if($shop->country == "KW") selected='selected' @endif>Kuwait</option>
                                                            <option  value="KG"  @if($shop->country == "KG") selected='selected' @endif>Kyrgyzstan</option>
                                                            <option  value="LA"  @if($shop->country == "LA") selected='selected' @endif>Laos</option>
                                                            <option  value="LV"  @if($shop->country == "LV") selected='selected' @endif>Latvia</option>
                                                            <option  value="LB"  @if($shop->country == "LB") selected='selected' @endif>Lebanon</option>
                                                            <option  value="LS"  @if($shop->country == "LS") selected='selected' @endif>Lesotho</option>
                                                            <option  value="LR"  @if($shop->country == "LR") selected='selected' @endif>Liberia</option>
                                                            <option  value="LY"  @if($shop->country == "LY") selected='selected' @endif>Libya</option>
                                                            <option  value="LI"  @if($shop->country == "LI") selected='selected' @endif>Liechtenstein</option>
                                                            <option  value="LT"  @if($shop->country == "LT") selected='selected' @endif>Lithuania</option>
                                                            <option  value="LU"  @if($shop->country == "LU") selected='selected' @endif>Luxembourg</option>
                                                            <option  value="MO"  @if($shop->country == "MO") selected='selected' @endif>Macao S.A.R., China</option>
                                                            <option  value="MG"  @if($shop->country == "MG") selected='selected' @endif>Madagascar</option>
                                                            <option  value="MW"  @if($shop->country == "MW") selected='selected' @endif>Malawi</option>
                                                            <option  value="MY"  @if($shop->country == "MY") selected='selected' @endif >Malaysia</option>
                                                            <option  value="MV"  @if($shop->country == "MV") selected='selected' @endif>Maldives</option>
                                                            <option  value="ML"  @if($shop->country == "ML") selected='selected' @endif>Mali</option>
                                                            <option  value="MT"  @if($shop->country == "MT") selected='selected' @endif>Malta</option>
                                                            <option  value="MH"  @if($shop->country == "MH") selected='selected' @endif>Marshall Islands</option>
                                                            <option  value="MQ"  @if($shop->country == "MQ") selected='selected' @endif>Martinique</option>
                                                            <option  value="MR"  @if($shop->country == "MR") selected='selected' @endif>Mauritania</option>
                                                            <option  value="MU"  @if($shop->country == "MU") selected='selected' @endif>Mauritius</option>
                                                            <option  value="YT"  @if($shop->country == "YT") selected='selected' @endif>Mayotte</option>
                                                            <option  value="MX"  @if($shop->country == "MX") selected='selected' @endif>Mexico</option>
                                                            <option  value="FM"  @if($shop->country == "FM") selected='selected' @endif>Micronesia</option>
                                                            <option  value="MD"  @if($shop->country == "MD") selected='selected' @endif>Moldova</option>
                                                            <option  value="MC"  @if($shop->country == "MC") selected='selected' @endif>Monaco</option>
                                                            <option  value="MN"  @if($shop->country == "MN") selected='selected' @endif>Mongolia</option>
                                                            <option  value="ME"  @if($shop->country == "ME") selected='selected' @endif>Montenegro</option>
                                                            <option  value="MS"  @if($shop->country == "MS") selected='selected' @endif>Montserrat</option>
                                                            <option  value="MA"  @if($shop->country == "MA") selected='selected' @endif>Morocco</option>
                                                            <option  value="MZ"  @if($shop->country == "MZ") selected='selected' @endif>Mozambique</option>
                                                            <option  value="MM"  @if($shop->country == "MM") selected='selected' @endif>Myanmar</option>
                                                            <option  value="NA"  @if($shop->country == "NA") selected='selected' @endif>Namibia</option>
                                                            <option  value="NR"  @if($shop->country == "NR") selected='selected' @endif>Nauru</option>
                                                            <option  value="NP"  @if($shop->country == "NP") selected='selected' @endif>Nepal</option>
                                                            <option  value="NL"  @if($shop->country == "NL") selected='selected' @endif>Netherlands</option>
                                                            <option  value="NC"  @if($shop->country == "NC") selected='selected' @endif>New Caledonia</option>
                                                            <option  value="NZ"  @if($shop->country == "NZ") selected='selected' @endif>New Zealand</option>
                                                            <option  value="NI"  @if($shop->country == "NI") selected='selected' @endif>Nicaragua</option>
                                                            <option  value="NE"  @if($shop->country == "NE") selected='selected' @endif>Niger</option>
                                                            <option  value="NG"  @if($shop->country == "NG") selected='selected' @endif>Nigeria</option>
                                                            <option  value="NU"  @if($shop->country == "NU") selected='selected' @endif>Niue</option>
                                                            <option  value="NF"  @if($shop->country == "NF") selected='selected' @endif>Norfolk Island</option>
                                                            <option  value="KP"  @if($shop->country == "KP") selected='selected' @endif>North Korea</option>
                                                            <option  value="MK"  @if($shop->country == "MK") selected='selected' @endif>North Macedonia</option>
                                                            <option  value="MP"  @if($shop->country == "MP") selected='selected' @endif>Northern Mariana Islands</option>
                                                            <option  value="NO"  @if($shop->country == "NO") selected='selected' @endif>Norway</option>
                                                            <option  value="OM"  @if($shop->country == "OM") selected='selected' @endif>Oman</option>
                                                            <option  value="PK"  @if($shop->country == "PK") selected='selected' @endif>Pakistan</option>
                                                            <option  value="PS"  @if($shop->country == "PS") selected='selected' @endif>Palestinian Territory</option>
                                                            <option  value="PA"  @if($shop->country == "PA") selected='selected' @endif>Panama</option>
                                                            <option  value="PG"  @if($shop->country == "PG") selected='selected' @endif>Papua New Guinea</option>
                                                            <option  value="PY"  @if($shop->country == "PY") selected='selected' @endif>Paraguay</option>
                                                            <option  value="PE"  @if($shop->country == "PE") selected='selected' @endif>Peru</option>
                                                            <option  value="PH"  @if($shop->country == "PH") selected='selected' @endif>Philippines</option>
                                                            <option  value="PN"  @if($shop->country == "PN") selected='selected' @endif>Pitcairn</option>
                                                            <option  value="PL"  @if($shop->country == "PL") selected='selected' @endif>Poland</option>
                                                            <option  value="PT"  @if($shop->country == "PT") selected='selected' @endif>Portugal</option>
                                                            <option  value="PR"  @if($shop->country == "PR") selected='selected' @endif>Puerto Rico</option>
                                                            <option  value="QA"  @if($shop->country == "QA") selected='selected' @endif>Qatar</option>
                                                            <option  value="RE"  @if($shop->country == "RE") selected='selected' @endif>Reunion</option>
                                                            <option  value="RO"  @if($shop->country == "RO") selected='selected' @endif>Romania</option>
                                                            <option  value="RU"  @if($shop->country == "RU") selected='selected' @endif>Russia</option>
                                                            <option  value="RW"  @if($shop->country == "RW") selected='selected' @endif>Rwanda</option>
                                                            <option  value="ST"  @if($shop->country == "ST") selected='selected' @endif>S&atilde;o Tom&eacute; and Pr&iacute;ncipe</option>
                                                            <option  value="BL"  @if($shop->country == "BL") selected='selected' @endif>Saint Barth&eacute;lemy</option>
                                                            <option  value="SH"  @if($shop->country == "SH") selected='selected' @endif>Saint Helena</option>
                                                            <option  value="KN"  @if($shop->country == "KN") selected='selected' @endif>Saint Kitts and Nevis</option>
                                                            <option  value="LC"  @if($shop->country == "LC") selected='selected' @endif>Saint Lucia</option>
                                                            <option  value="SX"  @if($shop->country == "SX") selected='selected' @endif>Saint Martin (Dutch part)</option>
                                                            <option  value="MF"  @if($shop->country == "MF") selected='selected' @endif>Saint Martin (French part)</option>
                                                            <option  value="PM"  @if($shop->country == "PM") selected='selected' @endif>Saint Pierre and Miquelon</option>
                                                            <option  value="VC"  @if($shop->country == "VC") selected='selected' @endif>Saint Vincent and the Grenadines</option>
                                                            <option  value="WS"  @if($shop->country == "WS") selected='selected' @endif>Samoa</option>
                                                            <option  value="SM"  @if($shop->country == "SM") selected='selected' @endif>San Marino</option>
                                                            <option  value="SA"  @if($shop->country == "SA") selected='selected' @endif>Saudi Arabia</option>
                                                            <option  value="SN"  @if($shop->country == "SN") selected='selected' @endif>Senegal</option>
                                                            <option  value="RS"  @if($shop->country == "RS") selected='selected' @endif>Serbia</option>
                                                            <option  value="SC"  @if($shop->country == "SC") selected='selected' @endif>Seychelles</option>
                                                            <option  value="SL"  @if($shop->country == "SL") selected='selected' @endif>Sierra Leone</option>
                                                            <option  value="SG"  @if($shop->country == "SG") selected='selected' @endif>Singapore</option>
                                                            <option  value="SK"  @if($shop->country == "SK") selected='selected' @endif>Slovakia</option>
                                                            <option  value="SI"  @if($shop->country == "SI") selected='selected' @endif>Slovenia</option>
                                                            <option  value="SB"  @if($shop->country == "SB") selected='selected' @endif>Solomon Islands</option>
                                                            <option  value="SO"  @if($shop->country == "SO") selected='selected' @endif>Somalia</option>
                                                            <option  value="ZA"  @if($shop->country == "ZA") selected='selected' @endif>South Africa</option>
                                                            <option  value="GS"  @if($shop->country == "GS") selected='selected' @endif>South Georgia/Sandwich Islands</option>
                                                            <option  value="KR"  @if($shop->country == "KR") selected='selected' @endif>South Korea</option>
                                                            <option  value="SS"  @if($shop->country == "SS") selected='selected' @endif>South Sudan</option>
                                                            <option  value="ES"  @if($shop->country == "ES") selected='selected' @endif>Spain</option>
                                                            <option  value="LK"  @if($shop->country == "LK") selected='selected' @endif>Sri Lanka</option>
                                                            <option  value="SD"  @if($shop->country == "SD") selected='selected' @endif>Sudan</option>
                                                            <option  value="SR"  @if($shop->country == "SR") selected='selected' @endif>Suriname</option>
                                                            <option  value="SJ"  @if($shop->country == "SJ") selected='selected' @endif>Svalbard and Jan Mayen</option>
                                                            <option  value="SZ"  @if($shop->country == "SZ") selected='selected' @endif>Swaziland</option>
                                                            <option  value="SE"  @if($shop->country == "SE") selected='selected' @endif>Sweden</option>
                                                            <option  value="CH"  @if($shop->country == "CH") selected='selected' @endif>Switzerland</option>
                                                            <option  value="SY"  @if($shop->country == "SY") selected='selected' @endif>Syria</option>
                                                            <option  value="TW"  @if($shop->country == "TW") selected='selected' @endif>Taiwan</option>
                                                            <option  value="TJ"  @if($shop->country == "TJ") selected='selected' @endif>Tajikistan</option>
                                                            <option  value="TZ"  @if($shop->country == "TZ") selected='selected' @endif>Tanzania</option>
                                                            <option  value="TH"  @if($shop->country == "TH") selected='selected' @endif>Thailand</option>
                                                            <option  value="TL"  @if($shop->country == "TL") selected='selected' @endif>Timor-Leste</option>
                                                            <option  value="TG"  @if($shop->country == "TG") selected='selected' @endif>Togo</option>
                                                            <option  value="TK"  @if($shop->country == "TK") selected='selected' @endif>Tokelau</option>
                                                            <option  value="TO"  @if($shop->country == "TO") selected='selected' @endif>Tonga</option>
                                                            <option  value="TT"  @if($shop->country == "TT") selected='selected' @endif>Trinidad and Tobago</option>
                                                            <option  value="TN"  @if($shop->country == "TN") selected='selected' @endif>Tunisia</option>
                                                            <option  value="TR"  @if($shop->country == "TR") selected='selected' @endif>Turkey</option>
                                                            <option  value="TM"  @if($shop->country == "TM") selected='selected' @endif>Turkmenistan</option>
                                                            <option  value="TC"  @if($shop->country == "TC") selected='selected' @endif>Turks and Caicos Islands</option>
                                                            <option  value="TV"  @if($shop->country == "TV") selected='selected' @endif>Tuvalu</option>
                                                            <option  value="UG"  @if($shop->country == "UG") selected='selected' @endif>Uganda</option>
                                                            <option  value="UA"  @if($shop->country == "UA") selected='selected' @endif>Ukraine</option>
                                                            <option  value="AE"  @if($shop->country == "AE") selected='selected' @endif>United Arab Emirates</option>
                                                            <option  value="GB"  @if($shop->country == "GB") selected='selected' @endif>United Kingdom (UK)</option>
                                                            <option  value="US"  @if($shop->country == "US") selected='selected' @endif>United States (US)</option>
                                                            <option  value="UM"  @if($shop->country == "UM") selected='selected' @endif>United States (US) Minor Outlying Islands</option>
                                                            <option  value="UY"  @if($shop->country == "UY") selected='selected' @endif>Uruguay</option>
                                                            <option  value="UZ"  @if($shop->country == "UZ") selected='selected' @endif>Uzbekistan</option>
                                                            <option  value="VU"  @if($shop->country == "VU") selected='selected' @endif>Vanuatu</option>
                                                            <option  value="VA"  @if($shop->country == "VA") selected='selected' @endif>Vatican</option>
                                                            <option  value="VE"  @if($shop->country == "VE") selected='selected' @endif>Venezuela</option>
                                                            <option  value="VN"  @if($shop->country == "VN") selected='selected' @endif>Vietnam</option>
                                                            <option  value="VG"  @if($shop->country == "VG") selected='selected' @endif>Virgin Islands (British)</option>
                                                            <option  value="VI"  @if($shop->country == "VI") selected='selected' @endif>Virgin Islands (US)</option>
                                                            <option  value="WF"  @if($shop->country == "WF") selected='selected' @endif>Wallis and Futuna</option>
                                                            <option  value="EH"  @if($shop->country == "EH") selected='selected' @endif>Western Sahara</option>
                                                            <option  value="YE"  @if($shop->country == "YE") selected='selected' @endif>Yemen</option>
                                                            <option  value="ZM"  @if($shop->country == "ZM") selected='selected' @endif>Zambia</option>
                                                            <option  value="ZW"  @if($shop->country == "ZW") selected='selected' @endif>Zimbabwe</option>
                                                            <option  value="INT" @if($shop->country == "INT") selected='selected' @endif>International</option>
                                                        </select>
                                                        <label for="material-select2">Where is your store based?</label>
                                                    </div>
                                                </div>
                                            </div>
                                              
                                         
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <div class="form-material floating">
                                                        <input class="form-control" type="text" id="material-email2" name="address" value="<?= $shop->address_1 ?>" required >
                                                        <label for="material-email2">Address</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <div class="form-material floating">
                                                        <input class="form-control" type="text" id="material-email2" name="address_2" value="<?= $shop->address_2?>" >
                                                        <label for="material-email2">Address 2</label>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <div class="form-material floating">
                                                        <input class="form-control" type="text" id="material-email2" name="city" value="<?= $shop->city?>" >
                                                        <label for="material-email2">City</label>
                                                    </div>
                                                </div>

                                                <div class="col-xs-6">
                                                    <div class="form-material floating">
                                                        <input class="form-control" type="text" id="material-email2" name="postcode_zip" value="<?= $shop->postcode_zip?>" >
                                                        <label for="material-email2">Postcode / ZIP</label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-material floating">
                                                        <select class="form-control" id="material-select2" name="currency" size="1" required>
                                                            <option value="">Choose a currency&hellip;</option>

                                                            <option value="&#x62f;"   @if($shop->currency == "&#x62f;") selected='selected' @endif >
                                                United Arab Emirates dirham (&#x62f;.&#x625; AED)					
                                                             </option>
                                                            <option value="&#x60b;"  @if($shop->currency == "&#x60b;") selected='selected' @endif >
                                                Afghan afghani (&#x60b; AFN)					
                                                              </option>
                                                            <option value="ALL"   @if($shop->currency == "ALL") selected='selected' @endif>
                                                Albanian lek (L ALL)					
                                                              </option>
                                                            <option value="AMD"  @if($shop->currency == "AMD") selected='selected' @endif>
                                                Armenian dram (AMD)					
                                                            </option>
                                                            <option value="&fnof;"   @if($shop->currency == "&fnof;") selected='selected' @endif >
                                                Netherlands Antillean guilder (&fnof; ANG)					
                                                            </option>
                                                            <option value="AOA"  @if($shop->currency == "AOA") selected='selected' @endif >
                                                Angolan kwanza (Kz AOA)					
                                                               </option>
                                                            <option value="ARS;"  @if($shop->currency == "ARS") selected='selected' @endif >
                                                Argentine peso (&#036; ARS)				
                                                          	</option>
                                                            <option value="AUD;"  @if($shop->currency == "AUD") selected='selected' @endif >
                                                Australian dollar (&#036; AUD)				
                                                         	</option>
                                                            <option value="AWG"  @if($shop->currency == "AWG") selected='selected' @endif >
                                                Aruban florin (Afl. AWG)					
                                                            </option>
                                                            <option value="AZN"  @if($shop->currency == "AZN") selected='selected' @endif >
                                                Azerbaijani manat (AZN)					
                                                              </option>
                                                            <option value="BAM"  @if($shop->currency == "BAM") selected='selected' @endif >
                                                Bosnia and Herzegovina convertible mark (KM BAM)				
                                                            	</option>
                                                            <option value="BBD"  @if($shop->currency == "BBD") selected='selected' @endif >
                                                Barbadian dollar (&#036; BBD)					
                                                                </option>
                                                            <option value="BDT"  @if($shop->currency == "BDT") selected='selected' @endif >
                                                Bangladeshi taka (&#2547;&nbsp; BDT)					
                                                                </option>
                                                            <option value="&#1083;"  @if($shop->currency == "&#1083;") selected='selected' @endif >
                                                Bulgarian lev (&#1083;&#1074;. BGN)					
                                                                </option>
                                                            <option value="BHD"  @if($shop->currency == "BHD") selected='selected' @endif >
                                                Bahraini dinar (.&#x62f;.&#x628; BHD)				
                                                         	</option>
                                                            <option value="BIF"  @if($shop->currency == "BIF") selected='selected' @endif >
                                                Burundian franc (Fr BIF)				
                                                        	</option>
                                                            <option value="BMD"  @if($shop->currency == "BMD") selected='selected' @endif >
                                                Bermudian dollar (&#036; BMD)					
                                                            </option>
                                                            <option value="BND"  @if($shop->currency == "BND") selected='selected' @endif >
                                                Brunei dollar (&#036; BND)					</option>
                                                            <option value="BOB"  @if($shop->currency == "BOB") selected='selected' @endif >
                                                Bolivian boliviano (Bs. BOB)					</option>
                                                            <option value="BRL"  @if($shop->currency == "BRL") selected='selected' @endif >
                                                Brazilian real (&#082;&#036; BRL)					</option>
                                                            <option value="BSD"  @if($shop->currency == "BSD") selected='selected' @endif >
                                                Bahamian dollar (&#036; BSD)					</option>
                                                            <option value="BTC"  @if($shop->currency == "BTC") selected='selected' @endif  >
                                                Bitcoin (&#3647; BTC)					</option>
                                                            <option value="BTN"  @if($shop->currency == "BTN") selected='selected' @endif >
                                                Bhutanese ngultrum (Nu. BTN)					</option>
                                                            <option value="BWP"  @if($shop->currency == "BWP") selected='selected' @endif >
                                                Botswana pula (P BWP)					</option>
                                                            <option value="BYR"  @if($shop->currency == "BYR") selected='selected' @endif >
                                                Belarusian ruble (old) (Br BYR)					</option>
                                                            <option value="BYN"  @if($shop->currency == "BYN") selected='selected' @endif >
                                                Belarusian ruble (Br BYN)					</option>
                                                            <option value="BZD"  @if($shop->currency == "BZD") selected='selected' @endif >
                                                Belize dollar (&#036; BZD)					</option>
                                                            <option value="CAD"  @if($shop->currency == "CAD") selected='selected' @endif >
                                                Canadian dollar (&#036; CAD)					</option>
                                                            <option value="CDF"  @if($shop->currency == "CDF") selected='selected' @endif >
                                                Congolese franc (Fr CDF)					</option>
                                                            <option value="CHF"  @if($shop->currency == "CHF") selected='selected' @endif >
                                                Swiss franc (&#067;&#072;&#070; CHF)					</option>
                                                            <option value="CLP"   @if($shop->currency == "CLP") selected='selected' @endif >
                                                Chilean peso (&#036; CLP)					</option>
                                                            <option value="CNY"  @if($shop->currency == "CNY") selected='selected' @endif >
                                                Chinese yuan (&yen; CNY)					</option>
                                                            <option value="COP"  @if($shop->currency == "COP") selected='selected' @endif >
                                                Colombian peso (&#036; COP)					</option>
                                                            <option value="CRC"  @if($shop->currency == "CRC") selected='selected' @endif >
                                                Costa Rican col&oacute;n (&#x20a1; CRC)					</option>
                                                            <option value="CUC"  @if($shop->currency == "CUC") selected='selected' @endif >
                                                Cuban convertible peso (&#036; CUC)					</option>
                                                            <option value="CUP"  @if($shop->currency == "CUP") selected='selected' @endif >
                                                Cuban peso (&#036; CUP)					</option>
                                                            <option value="CVE"  @if($shop->currency == "CVE") selected='selected' @endif >
                                                Cape Verdean escudo (&#036; CVE)					</option>
                                                            <option value="CZK"  @if($shop->currency == "CZK") selected='selected' @endif >
                                                Czech koruna (&#075;&#269; CZK)					</option>
                                                            <option value="DJF"  @if($shop->currency == "DJF") selected='selected' @endif >
                                                Djiboutian franc (Fr DJF)					</option>
                                                            <option value="DKK"  @if($shop->currency == "DKK") selected='selected' @endif >
                                                Danish krone (DKK)					</option>
                                                            <option value="DOP"  @if($shop->currency == "DOP") selected='selected' @endif >
                                                Dominican peso (RD&#036; DOP)					</option>
                                                            <option value="DZD"  @if($shop->currency == "DZD") selected='selected' @endif >
                                                Algerian dinar (&#x62f;.&#x62c; DZD)					</option>
                                                            <option value="EGP"  @if($shop->currency == "EGP") selected='selected' @endif >
                                                Egyptian pound (EGP)					</option>
                                                            <option value="ERN"  @if($shop->currency == "ERN") selected='selected' @endif >
                                                Eritrean nakfa (Nfk ERN)					</option>
                                                            <option value="ETB"  @if($shop->currency == "ETB") selected='selected' @endif >
                                                Ethiopian birr (Br ETB)					</option>
                                                            <option value="EUR"  @if($shop->currency == "EUR") selected='selected' @endif >
                                                Euro (&euro; EUR)					</option>
                                                            <option value="FJD"  @if($shop->currency == "FJD") selected='selected' @endif >
                                                Fijian dollar (&#036; FJD)					</option>
                                                            <option value="FKP;"  @if($shop->currency == "FKP;") selected='selected' @endif >
                                                Falkland Islands pound (&pound; FKP)					</option>
                                                            <option value="GBP"  @if($shop->currency == "GBP") selected='selected' @endif >
                                                Pound sterling (&pound; GBP)					</option>
                                                            <option value="GEL"  @if($shop->currency == "GEL") selected='selected' @endif >
                                                Georgian lari (&#x20be; GEL)					</option>
                                                            <option value="GGP"  @if($shop->currency == "GGP") selected='selected' @endif >
                                                Guernsey pound (&pound; GGP)					</option>
                                                            {{-- <option value="&#x20b5;"  @if($shop->currency == "&#x20b5;") selected='selected' @endif >
                                                Ghana cedi (&#x20b5; GHS)					</option> --}}
                                                <option value="GHS"  @if($shop->currency == "GHS") selected='selected' @endif >
                                                    Ghana cedi (&#x20b5; GHS)					</option>
                                                            <option value="GIP"  @if($shop->currency == "GIP") selected='selected' @endif >
                                                Gibraltar pound (&pound; GIP)					</option>
                                                            <option value="GMD"  @if($shop->currency == "GMD") selected='selected' @endif >
                                                Gambian dalasi (D GMD)					</option>
                                                            <option value="GNF"  @if($shop->currency == "GNF") selected='selected' @endif >
                                                Guinean franc (Fr GNF)					</option>
                                                            <option value="GTQ"  @if($shop->currency == "GTQ") selected='selected' @endif >
                                                Guatemalan quetzal (Q GTQ)					</option>
                                                            <option value="&#036;"  @if($shop->currency == "GYD") selected='selected' @endif >
                                                Guyanese dollar (&#036; GYD)					</option>
                                                            <option value="&#036;"  @if($shop->currency == "HKD") selected='selected' @endif >
                                                Hong Kong dollar (&#036; HKD)					</option>
                                                            <option value="HNL"  @if($shop->currency == "HNL") selected='selected' @endif >
                                                Honduran lempira (L HNL)					</option>
                                                            <option value="HRK"  @if($shop->currency == "HRK") selected='selected' @endif >
                                                Croatian kuna (kn HRK)					</option>
                                                            <option value="HTG"  @if($shop->currency == "HTG") selected='selected' @endif >
                                                Haitian gourde (G HTG)					</option>
                                                            <option value="HUF"  @if($shop->currency == "HUF") selected='selected' @endif >
                                                Hungarian forint (&#070;&#116; HUF)					</option>
                                                            <option value="IDR"  @if($shop->currency == "IDR") selected='selected' @endif >
                                                Indonesian rupiah (Rp IDR)					</option>
                                                            <option value="ILS"  @if($shop->currency == "ILS") selected='selected' @endif >
                                                Israeli new shekel (&#8362; ILS)					</option>
                                                            <option value="IMP"  @if($shop->currency == "IMP") selected='selected' @endif >
                                                Manx pound (&pound; IMP)					</option>
                                                            <option value="INR"  @if($shop->currency == "INR") selected='selected' @endif >
                                                Indian rupee (&#8377; INR)					</option>
                                                            <option value="IQD"  @if($shop->currency == "IQD") selected='selected' @endif >
                                                Iraqi dinar (&#x639;.&#x62f; IQD)					</option>
                                                            <option value="IRR"  @if($shop->currency == "IRR") selected='selected' @endif >
                                                Iranian rial (&#xfdfc; IRR)					</option>
                                                            <option value="IRT"  @if($shop->currency == "IRT") selected='selected' @endif >
                                                Iranian toman (&#x62A;&#x648;&#x645;&#x627;&#x646; IRT)					</option>
                                                            <option value="ISK"  @if($shop->currency == "ISK") selected='selected' @endif >
                                                Icelandic kr&oacute;na (kr. ISK)					</option>
                                                            <option value="JEP"  @if($shop->currency == "JEP") selected='selected' @endif >
                                                Jersey pound (&pound; JEP)					</option>
                                                            <option value="JMD"  @if($shop->currency == "JMD") selected='selected' @endif >
                                                Jamaican dollar (&#036; JMD)					</option>
                                                            <option value="JOD"  @if($shop->currency == "JOD") selected='selected' @endif >
                                                Jordanian dinar (&#x62f;.&#x627; JOD)					</option>
                                                            <option value="JPY"  @if($shop->currency == "JPY") selected='selected' @endif >
                                                Japanese yen (&yen; JPY)					</option>
                                                            <option value="KES"  @if($shop->currency == "KES") selected='selected' @endif >
                                                Kenyan shilling (KSh KES)					</option>
                                                            <option value="KGS"  @if($shop->currency == "KGS") selected='selected' @endif >
                                                Kyrgyzstani som (&#x441;&#x43e;&#x43c; KGS)					</option>
                                                            <option value="KHR"  @if($shop->currency == "KHR") selected='selected' @endif >
                                                Cambodian riel (&#x17db; KHR)					</option>
                                                            <option value="KMF"  @if($shop->currency == "KMF") selected='selected' @endif >
                                                Comorian franc (Fr KMF)					</option>
                                                            <option value="KPW"  @if($shop->currency == "KPW") selected='selected' @endif >
                                                North Korean won (&#x20a9; KPW)					</option>
                                                            <option value="KRW"  @if($shop->currency == "KRW") selected='selected' @endif >
                                                South Korean won (&#8361; KRW)					</option>
                                                            <option value="KWD"  @if($shop->currency == "KWD") selected='selected' @endif >
                                                Kuwaiti dinar (&#x62f;.&#x643; KWD)					</option>
                                                            <option value="KYD"  @if($shop->currency == "KYD") selected='selected' @endif >
                                                Cayman Islands dollar (&#036; KYD)					</option>
                                                            <option value="KZT"  @if($shop->currency == "KZT") selected='selected' @endif >
                                                Kazakhstani tenge (KZT)					</option>
                                                            <option value="LAK"  @if($shop->currency == "LAK") selected='selected' @endif >
                                                Lao kip (&#8365; LAK)					</option>
                                                            <option value="LBP"  @if($shop->currency == "LBP") selected='selected' @endif >
                                                Lebanese pound (&#x644;.&#x644; LBP)					</option>
                                                            <option value="LKR"  @if($shop->currency == "LKR") selected='selected' @endif>
                                                Sri Lankan rupee (&#xdbb;&#xdd4; LKR)					</option>
                                                            <option value="LRD"  @if($shop->currency == "LRD") selected='selected' @endif >
                                                Liberian dollar (&#036; LRD)					</option>
                                                            <option value="LSL"  @if($shop->currency == "LSL") selected='selected' @endif >
                                                Lesotho loti (L LSL)					</option>
                                                            <option value="LYD"  @if($shop->currency == "LYD") selected='selected' @endif >
                                                Libyan dinar (&#x644;.&#x62f; LYD)					</option>
                                                            <option value="MAD"  @if($shop->currency == "MAD") selected='selected' @endif >
                                                Moroccan dirham (&#x62f;.&#x645;. MAD)					</option>
                                                            <option value="MDL"  @if($shop->currency == "MDL") selected='selected' @endif >
                                                Moldovan leu (MDL)					</option>
                                                            <option value="MGA"  @if($shop->currency == "MGA") selected='selected' @endif >
                                                Malagasy ariary (Ar MGA)					</option>
                                                            <option value="MKD"  @if($shop->currency == "MKD") selected='selected' @endif >
                                                Macedonian denar (&#x434;&#x435;&#x43d; MKD)					</option>
                                                            <option value="MMK"  @if($shop->currency == "MMK") selected='selected' @endif >
                                                Burmese kyat (Ks MMK)					</option>
                                                            <option value="MNT"  @if($shop->currency == "MNT") selected='selected' @endif >
                                                Mongolian t&ouml;gr&ouml;g (&#x20ae; MNT)					</option>
                                                            <option value="MOP"  @if($shop->currency == "MOP") selected='selected' @endif >
                                                Macanese pataca (P MOP)					</option>
                                                            <option value="MRO"  @if($shop->currency == "MRO") selected='selected' @endif >
                                                Mauritanian ouguiya (UM MRO)					</option>
                                                            <option value="MUR"   @if($shop->currency == "MUR") selected='selected' @endif >
                                                Mauritian rupee (&#x20a8; MUR)					</option>
                                                            <option value="MVR"  @if($shop->currency == "MVR") selected='selected' @endif >
                                                Maldivian rufiyaa (.&#x783; MVR)					</option>
                                                            <option value="MWK"  @if($shop->currency == "MWK") selected='selected' @endif >
                                                Malawian kwacha (MK MWK)					</option>
                                                            <option value="MXN"   @if($shop->currency == "MXN") selected='selected' @endif >
                                                Mexican peso (&#036; MXN)					</option>
                                                            <option value="MYR"  @if($shop->currency == "MYR") selected='selected' @endif  >
                                                Malaysian ringgit (&#082;&#077; MYR)					</option>
                                                            <option value="MZN"  @if($shop->currency == "MZN") selected='selected' @endif >
                                                Mozambican metical (MT MZN)					</option>
                                                            <option value="NAD"  @if($shop->currency == "NAD") selected='selected' @endif >
                                                Namibian dollar (&#036; NAD)					</option>
                                                            <option value="NGN"  @if($shop->currency == "NGN") selected='selected' @endif >
                                                Nigerian naira (&#8358; NGN)					</option>
                                                            <option value="NIO"  @if($shop->currency == "NIO") selected='selected' @endif >
                                                Nicaraguan c&oacute;rdoba (C&#036; NIO)					</option>
                                                            <option value="NOK"   @if($shop->currency == "NOK") selected='selected' @endif>
                                                Norwegian krone (&#107;&#114; NOK)					</option>
                                                            <option value="NPR"   @if($shop->currency == "NPR") selected='selected' @endif>
                                                Nepalese rupee (&#8360; NPR)					</option>
                                                            <option value="NZD"  @if($shop->currency == "NZD") selected='selected' @endif >
                                                New Zealand dollar (&#036; NZD)					</option>
                                                            <option value="OMR"   @if($shop->currency == "OMR") selected='selected' @endif >
                                                Omani rial (&#x631;.&#x639;. OMR)					</option>
                                                            <option value="PAB"  @if($shop->currency == "PAB") selected='selected' @endif >
                                                Panamanian balboa (B/. PAB)					</option>
                                                            <option value="PEN"  @if($shop->currency == "PEN") selected='selected' @endif >
                                                Sol (S/ PEN)					</option>
                                                            <option value="PGK"  @if($shop->currency == "PGK") selected='selected' @endif >
                                                Papua New Guinean kina (K PGK)					</option>
                                                            <option value="PHP"  @if($shop->currency == "PHP") selected='selected' @endif >
                                                Philippine peso (&#8369; PHP)					</option>
                                                            <option value="PKR"  @if($shop->currency == "PKR") selected='selected' @endif >
                                                Pakistani rupee (&#8360; PKR)					</option>
                                                            <option value="PLN"   @if($shop->currency == "PLN") selected='selected' @endif >
                                                Polish z&#x142;oty (&#122;&#322; PLN)					</option>
                                                            <option value="PRB"  @if($shop->currency == "PRB") selected='selected' @endif >
                                                Transnistrian ruble (&#x440;. PRB)					</option>
                                                            <option value="PYG"  @if($shop->currency == "PYG") selected='selected' @endif >
                                                Paraguayan guaran&iacute; (&#8370; PYG)					</option>
                                                            <option value="QAR"  @if($shop->currency == "QAR") selected='selected' @endif >
                                                Qatari riyal (&#x631;.&#x642; QAR)					</option>
                                                            <option value="RON"  @if($shop->currency == "RON") selected='selected' @endif >
                                                Romanian leu (lei RON)					</option>
                                                            <option value="RSD"  @if($shop->currency == "RSD") selected='selected' @endif >
                                                Serbian dinar (&#x434;&#x438;&#x43d;. RSD)					</option>
                                                            <option value="RUB"  @if($shop->currency == "RUB") selected='selected' @endif >
                                                Russian ruble (&#8381; RUB)					</option>
                                                            <option value="RWF"  @if($shop->currency == "RWF") selected='selected' @endif >
                                                Rwandan franc (Fr RWF)					</option>
                                                            <option value="SAR"  @if($shop->currency == "SAR") selected='selected' @endif >
                                                Saudi riyal (&#x631;.&#x633; SAR)					</option>
                                                            <option value="SBD"  @if($shop->currency == "SBD") selected='selected' @endif >
                                                Solomon Islands dollar (&#036; SBD)					</option>
                                                            <option value="SCR"  @if($shop->currency == "SCR") selected='selected' @endif >
                                                Seychellois rupee (&#x20a8; SCR)					</option>
                                                            <option value="SDG"  @if($shop->currency == "SDG") selected='selected' @endif >
                                                Sudanese pound (&#x62c;.&#x633;. SDG)					</option>
                                                            <option value="SEK"  @if($shop->currency == "SEK") selected='selected' @endif >
                                                Swedish krona (&#107;&#114; SEK)					</option>
                                                            <option value="SGD"  @if($shop->currency == "SGD") selected='selected' @endif >
                                                Singapore dollar (&#036; SGD)					</option>
                                                            <option value="SHP"   @if($shop->currency == "SHP") selected='selected' @endif>
                                                Saint Helena pound (&pound; SHP)					</option>
                                                            <option value="SLL"  @if($shop->currency == "SLL") selected='selected' @endif >
                                                Sierra Leonean leone (Le SLL)					</option>
                                                            <option value="SOS"  @if($shop->currency == "SOS") selected='selected' @endif >
                                                Somali shilling (Sh SOS)					</option>
                                                            <option value="SRD"  @if($shop->currency == "SRD") selected='selected' @endif >
                                                Surinamese dollar (&#036; SRD)					</option>
                                                            <option value="SSP"  @if($shop->currency == "SSP") selected='selected' @endif >
                                                South Sudanese pound (&pound; SSP)					</option>
                                                            <option value="STD"  @if($shop->currency == "STD") selected='selected' @endif >
                                                S&atilde;o Tom&eacute; and Pr&iacute;ncipe dobra (Db STD)					</option>
                                                            <option value="SYP"  @if($shop->currency == "SYP") selected='selected' @endif >
                                                Syrian pound (&#x644;.&#x633; SYP)					</option>
                                                            <option value="SZL"  @if($shop->currency == "SZL") selected='selected' @endif >
                                                Swazi lilangeni (L SZL)					</option>
                                                            <option value="THB"  @if($shop->currency == "THB") selected='selected' @endif >
                                                Thai baht (&#3647; THB)					</option>
                                                            <option value="TJS"  @if($shop->currency == "TJS") selected='selected' @endif >
                                                Tajikistani somoni (&#x405;&#x41c; TJS)					</option>
                                                            <option value="TMT"  @if($shop->currency == "TMT") selected='selected' @endif >
                                                Turkmenistan manat (m TMT)					</option>
                                                            <option value="TND"  @if($shop->currency == "TND") selected='selected' @endif >
                                                Tunisian dinar (&#x62f;.&#x62a; TND)					</option>
                                                            <option value="TOP"   @if($shop->currency == "TOP") selected='selected' @endif>
                                                Tongan pa&#x2bb;anga (T&#036; TOP)					</option>
                                                            <option value="TRY"  @if($shop->currency == "TRY") selected='selected' @endif >
                                                Turkish lira (&#8378; TRY)					</option>
                                                            <option value="TTD"  @if($shop->currency == "TTD") selected='selected' @endif >
                                                Trinidad and Tobago dollar (&#036; TTD)					</option>
                                                            <option value="TWD"  @if($shop->currency == "TWD") selected='selected' @endif >
                                                New Taiwan dollar (&#078;&#084;&#036; TWD)					</option>
                                                            <option value="TZS"  @if($shop->currency == "TZS") selected='selected' @endif >
                                                Tanzanian shilling (Sh TZS)					</option>
                                                            <option value="UAH"  @if($shop->currency == "UAH") selected='selected' @endif >
                                                Ukrainian hryvnia (&#8372; UAH)					</option>
                                                            <option value="UGX"  @if($shop->currency == "UGX") selected='selected' @endif >
                                                Ugandan shilling (UGX)					</option>
                                                            <option value="USD"  @if($shop->currency == "USD") selected='selected' @endif >
                                                United States (US) dollar (&#036; USD)					</option>
                                                            <option value="UYU"  @if($shop->currency == "UYU") selected='selected' @endif >
                                                Uruguayan peso (&#036; UYU)					</option>
                                                            <option value="UZS"  @if($shop->currency == "UZS") selected='selected' @endif >
                                                Uzbekistani som (UZS)					</option>
                                                            <option value="VEF"  @if($shop->currency == "VEF") selected='selected' @endif >
                                                Venezuelan bol&iacute;var (Bs F VEF)					</option>
                                                            <option value="VES"  @if($shop->currency == "VES") selected='selected' @endif >
                                                Bol&iacute;var soberano (Bs.S VES)					</option>
                                                            <option value="VND"  @if($shop->currency == "VND") selected='selected' @endif >
                                                Vietnamese &#x111;&#x1ed3;ng (&#8363; VND)					</option>
                                                            <option value="VUV"  @if($shop->currency == "VUV") selected='selected' @endif>
                                                Vanuatu vatu (Vt VUV)					</option>
                                                            <option value="WST"  @if($shop->currency == "WST") selected='selected' @endif >
                                                Samoan t&#x101;l&#x101; (T WST)					</option>
                                                            <option value="XAF"  @if($shop->currency == "XAF") selected='selected' @endif >
                                                Central African CFA franc (CFA XAF)					</option>
                                                            <option value="XCD"  @if($shop->currency == "XCD") selected='selected' @endif >
                                                East Caribbean dollar (&#036; XCD)					</option>
                                                            <option value="XOF"  @if($shop->currency == "XOF") selected='selected' @endif >
                                                West African CFA franc (CFA XOF)					</option>
                                                            <option value="XPF"  @if($shop->currency == "XPF") selected='selected' @endif >
                                                CFP franc (Fr XPF)					</option>
                                                            <option value="YER"  @if($shop->currency == "YER") selected='selected' @endif >
                                                Yemeni rial (&#xfdfc; YER)					</option>
                                                            <option value="ZAR"  @if($shop->currency == "ZAR") selected='selected' @endif >
                                                South African rand (&#082; ZAR)					</option>
                                                            <option value="ZMW"  @if($shop->currency == "ZMW") selected='selected' @endif >
                                                Zambian kwacha (ZK ZMW)					</option>
                                                    </select>
                                                    
                                                        <label for="material-select2">What Currency do you accept payments in?</label>
                                                    </div>
                                                </div>
                                            </div>
                                            

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-material floating">
                                                        <select class="form-control" id="material-select2" name="type_0f_shop" size="1" required>
                                                            <option value="both"  @if($shop->type_0f_shop == "both") selected  @endif >I plan to sell both physical and digital products</option>
                                                            <option value="physical" @if($shop->type_0f_shop == "physical") selected  @endif >I plan to sell physical products</option>
                                                            <option value="virtual" @if($shop->type_0f_shop == "virtual") selected  @endif >I plan to sell digital products</option>
                                                        </select>
                                                        
                                                        <label for="material-select2">What type of products do you plan to sell?</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <div class="form-material floating">
                                                        <input class="form-control" type="number" id="material-text2" name="tax" value="{{ $shop->tax }}" step=".01" required >
                                                            <label for="material-text2">Tax (%)</label>
                                                        </div>
                                                    </div>
                                            </div>
                                           

                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                       
                                                          
                                                        <label class="location-prompt" for="">
                                                             <input
                                                            type="radio"
                                                            name="status"
                                                            value="Approved"
                                                            @if($shop->status == "Approved")  checked @endif
                                                           
                                                            /> Approved
                                                        </label>
    
                                                        <label class="location-prompt" for="">
                                                                <input
                                                               type="radio"
                                                               name="status"
                                                               @if($shop->status == "Pending")  checked @endif
                                                               value="Pending" /> Pending
                                                        </label>

                                                        <label class="location-prompt" for="">
                                                                <input
                                                               type="radio"
                                                               name="status"
                                                               @if($shop->status == "Blocked")  checked @endif
                                                               value="Blocked" /> Blocked
                                                        </label>
                                                
                                                     </div>
                                             </div>
 
                                           
                                            <div class="form-group">
                                                <label class="col-xs-12" for="example-file-input">File Input</label>
                                                <div class="col-xs-12">
                                                    <div class="fileupload add-new-plus">
                                                         <input id="imageupload" type="file" name="pic">
                                                    </div>
                                                  <div id="preview-image">

                                                      @if($shop->logo == "")
                                                        <img src="{{ asset('img/placeholder.png') }}" height="50px" width="50px">
                                                      @else
                                                        <img src="{{ asset('shop_logos/'.$shop->logo) }}" height="50px" width="50px">
                                                      @endif
                                            
                                                  </div>
                                                </div>
                                            </div>
    
                                    <div class="form-group text-right m-b-0 visibility-hidden" data-toggle="appear" data-class="animated bounceIn">
                                            {{ Form::hidden('_method','PUT')}}
                                            <a href="/admin/setup/shop" class="btn btn-secondary">Back</a>
                                            {{ Form::submit('Update',['class'=>'btn btn-danger'] ) }}
                                        {{-- <button class="btn btn-sm btn-primary " type="submit"  name="submit">Publish</button> --}}
                                    </div>
                                </div>
                            </div>
                            <!-- END Floating Labels -->
                     {!! Form::close() !!}
            </main>

@endsection
       