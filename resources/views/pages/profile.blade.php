<!doctype html>
<html lang="en">
  <head>
    <title>Wine2u | Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
  

   
   <!-- include navigation -->
    @include("pages.includes.nav-links")
    @include("pages.includes.navigation")
  <!-- include navigation -->
<section class="profile-top py-5">
	<div class="container-fluid container-w2u">
    	<div class="row align-items-start">
  			<div class="col-12 col-md-3 col-lg-3 mb-4 stick-to-top">
    			<div class="list-group" id="list-tab" role="tablist">
					<a class="list-group-item list-group-item-action "   role="tab" aria-controls="Personal-details">
						<strong>Menu</strong>
					</a>
          <a class="list-group-item list-group-item-action" id="list-Order-History-list" data-toggle="list" href="#list-Order-History" role="tab" aria-controls="Order-History">Order History</a>
					<a class="list-group-item list-group-item-action " id="list-Personal-details-list" data-toggle="list" href="#list-Personal-details" role="tab" aria-controls="Personal-details">
						Personal details
					</a>
      				{{-- <a class="list-group-item list-group-item-action" id="list-Address-list" data-toggle="list" href="#list-Address" role="tab" aria-controls="Address">Address</a>
      				<a class="list-group-item list-group-item-action" id="list-Loyalty-Points-list" data-toggle="list" href="#list-Loyalty-Points" role="tab" aria-controls="Loyalty-Points">Loyalty Points</a>
      				<a class="list-group-item list-group-item-action" id="list-Preferences-list" data-toggle="list" href="#list-Preferences" role="tab" aria-controls="Preferences">Preferences</a> --}}

      				<a class="list-group-item list-group-item-action" id="list-change-password-list" data-toggle="list" href="#list-change-password" role="tab" aria-controls="change-password">Password</a>
      				<a class="list-group-item "   href="/account/logout" > Logout</a>
   				</div>
  			</div>

  			<div class="col-12 col-md-9 col-lg-9  pl-md-5">
    			<div class="tab-content" id="nav-tabContent">

          
          <!-- Order History -->
                <div class="tab-pane fade show active" id="list-Order-History" role="tabpanel" aria-labelledby="list-Order-History">
                  <h1 class="profilet1"> Order History </h1>
                  <p>  <small>Your order history</small>  </p>

                  <table class="table table-hover table-bordered table-striped">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">Order Details</th>
                                  <th scope="col">Date</th>
                                  {{-- <th scope="col">Quantity</th> --}}
                                  <th scope="col">Status</th>
                                  <th scope="col" class="text-right">Amount GHS</th>
                                </tr>
                              </thead>
                              <tbody>

                              @forelse ($profile->orders as $order)

                                    <tr>
                                        <td scope="row">
                                          <!--Add Variable for Product Name?--> 
                                          <strong style="color: #C39154">Tracking No. {{ $order->tracking_code}} </strong><br>
                                          <strong>Shipping Address:</strong>
                                          {{ $order->ship_to }}
                                        </td>
                                        <td>
                                          {{ $order->created_at}}
                                        </td>
                                        {{-- <td>
                                          {{ $order->quantity}} Item(s)
                                        </td> --}}
                                        <td>
                                          {{ $order->complete_status}}
                                        </td>
                                        @php  
                                          $subTotal = $order->totalamount - ($order->taxes + $order->shipping_amt + $order->coupon_amount) 
                                        @endphp
                                        <td class="text-right">
                                          <small>Sub: {{ number_format($subTotal,2)}}</small>
                                          <br>
                                          <small>Tax: {{ $order->taxes}}</small>
                                          <br>
                                          <small>Shipping:{{ $order->shipping_amt}}</small>
                                          <br>
                                          <small>Coupon: {{ $order->coupon_amount }}</small>
                                          <br>
                                          <strong style="color: #C39154">Total: {{ $order->totalamount}}</strong>
                                        </td>
                                    </tr>

                                @empty

                                  <tr>
                                    <strong>No Order yet </strong>
                                  </tr>
                                    
                                @endforelse
                          
                              </tbody>
                  </table>
                  <div class="col-12 text-center my-5">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                          
                        </ul>
                    </nav>
                  </div>

                </div>
          <!-- Order History -->

					<!-- profile Details -->
					<div class="tab-pane fade" id="list-Personal-details" role="tabpanel" aria-labelledby="list-Personal-details-list">
						<h1 class="profilet1 mb-3">Personal details</h1>
            <form id="profile_form" >
              @csrf
              <div class="form-row">
                <p class="col-12 col-md-12" id="profile_message"></p>
                <div class="form-group col-12 col-md-6">
                <label for="profile_FirstName">First Name *</label>
                <input type="text" class="form-control form-control-wine2u" id="profile_FirstName" placeholder="First Name" value="{{ $profile->fname }}" required>
                </div>

                <div class="form-group col-12 col-md-6">
                  <label for="profile_LastName">Last Name *</label>
                  <input type="text" class="form-control form-control-wine2u" id="profile_LastName" placeholder="Last Name" value="{{ $profile->lname }}" required>
                </div>

                  <div class="form-group col-12 col-md-6">
                    <label for="profile-sex">Sex *</label>
                      <select class="form-control " id="profile_sex" required>
                        <option value="">Select your gender </option>
                        <option value="Male" @if($profile->gender == "Male")  Selected  @endif>Male </option>
                        <option value="Female" @if($profile->gender == "Female")  Selected  @endif >Female</option>
                        <option value="Other" @if($profile->gender == "Other")  Selected  @endif>Other</option>
                      </select>
                  </div>
                  <div class="form-group col-12 col-md-6">
                    <label for="profile_DOB">Date of Birth *</label>
                      <input type="date" class="form-control form-control-wine2u" id="profile_DOB" placeholder="" value="{{ $profile->dob }}" required>
                  </div>

            
                <div class="form-group col-12 col-md-6">
                  <label for="profile_LastName">Email *</label>
                  <input type="text" class="form-control form-control-wine2u" id="profile_Email" placeholder="Email" value="{{ $profile->email }}" required>
                </div>

                <div class="form-group col-12 col-md-6">
                  <label for="profile_FirstName">Phone Number *</label>
                    <input type="text" class="form-control form-control-wine2u" id="profile_phone" placeholder="Phone Number" value="{{ $profile->phone }}" required>
                  </div>

                  <div class="form-group col-12 col-md-6">
                    <label for="profile_LastName">Country *</label>
                    <select  class="custom-select" id="profile_country" required>
                      <option selected> Choose... </option>
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
                    {{-- <input type="text" class="form-control form-control-wine2u" id="profile_country" placeholder="Country" value="{{ $profile->country }}" required> --}}
                  </div>

                  <div class="form-group col-12 col-md-6">
                    <label for="profile_LastName">address</label>
                    <input type="text" class="form-control form-control-wine2u" id="profile_street" placeholder="Street" value="{{ $profile->address }}" >
                  </div>

                
                  <div class="form-group col-12 col-md-6">
                    <label for="profile_LastName">State</label>
                    <input type="text" class="form-control form-control-wine2u" id="profile_state" placeholder="State" value="{{ $profile->state }}">
                  </div>

                  <div class="form-group col-12 col-md-6">
                    <label for="profile_LastName">Apartment</label>
                    <input type="text" class="form-control form-control-wine2u" id="profile_apartment" placeholder="Apartment" value="{{ $profile->apartment }}">
                  </div>

                  <div class="form-group col-12 col-md-6">
                    <label for="profile_LastName">City</label>
                    <input type="text" class="form-control form-control-wine2u" id="profile_city" placeholder="City" value="{{ $profile->city }}">
                  </div>


                  <div class="form-group col-12 col-md-6">
                    <label for="profile_LastName">Zip</label>
                    <input type="text" class="form-control form-control-wine2u" id="profile_zip" placeholder="Zip" value="{{ $profile->zip }}">
                  </div>

                <div class="form-group col-12 mt-5 text-center">
                  <button type="submit" class="btn btn-wine2u px-5 " id="profile_btn">Save Changes</button>
                </div>

              </div>
            </form>

					</div>
					<!-- profile Details -->

 <!-- Address -->
      {{-- <div class="tab-pane fade" id="list-Address" role="tabpanel" aria-labelledby="list-Address-list">
      <h1 class="profilet1 mb-5">Address</h1>
        
      <div>
      <ul class="nav nav-pills   nav-justified mb-3" id="pills-tab" role="tablist">
        <li class="nav-item " role="presentation">
          <a class="nav-link nav-link-pro active" id="pills-shipping-tab" data-toggle="pill" href="#pills-shipping" role="tab" aria-controls="pills-shipping" aria-selected="true">1. Shipping</a>
        </li>
        <li class="nav-item " role="presentation">
          <a class="nav-link nav-link-pro" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">2. Billing</a>
        </li>
      
      </ul>
      <div class="tab-content" id="pills-tabContent">

         <!-- shipping Details -->
        <div class="tab-pane fade show active" id="pills-shipping" role="tabpanel" aria-labelledby="pills-shipping-tab">
          <div class="row">
           

          <div class="col-12 col-md-3 mt-4">
          <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                <label class="form-check-label" for="invalidCheck2">
                Shipping address is the same my billing address
                </label>
              </div>
            </div>
          </div>

            <div class="col-12 col-md-6 ">
              <!--  -->
              <div class="form-row mt-4">
                <div class="form-group col-12 col-md-12">
                <label for="profile-address_FirstName">First Name</label>
                  <input type="text" class="form-control form-control-wine2u" id="profile-address_FirstName" placeholder="">
                </div>
                <div class="form-group col-12 col-md-12">
                  <label for="profile-address_LastName">Last Name</label>
                  <input type="text" class="form-control form-control-wine2u" id="profile-address_LastName" placeholder="">
                </div>

                <div class="form-group col-12 col-md-12">
                  <label for="profile-address_line1">Address line 1</label>
                  <input type="text" class="form-control form-control-wine2u" id="profile-address_line1" placeholder="">
                </div>

                <div class="form-group col-12 col-md-12">
                  <label for="profile-address_line2">Address line 2</label>
                  <input type="text" class="form-control form-control-wine2u" id="profile-address_line2" placeholder="">
                </div>

                <div class="form-group col-12 col-md-6">
                <label for="profile-address_city">City</label>
                  <input type="text" class="form-control form-control-wine2u" id="profile-address_city" placeholder="">
                </div>
                <div class="form-group col-12 col-md-6">
                  <label for="profile-address_state">State</label>
                  <input type="text" class="form-control form-control-wine2u" id="profile-address_state" placeholder="">
                </div>

                <div class="form-group col-12 col-md-6">
                <label for="profile-address_Zip-code">Zip Code</label>
                  <input type="text" class="form-control form-control-wine2u" id="profile-address_Zip-code" placeholder="">
                </div>
                <div class="form-group col-12 col-md-6">
                  <label for="profile-address_Phone-Number">Phone Number</label>
                  <input type="tel" class="form-control form-control-wine2u" id="profile-address_Phone-Number" placeholder="">
                </div>

                <div class="form-group col-12 ">
                  <label for="profile-address_Special-instructions">Special instructions </label>
                  <textarea class="form-control  form-control-wine2u " id="profile-address_Special-instructions" rows="3"></textarea>
                </div>

                <div class="form-group col-12 my-5 text-center">
                <button type="submit" class="btn btn-wine2u-deep px-5 " >Save Changes</button>
                </div>
              </div>
              <!--  -->
            </div>
          </div>
        </div> --}}
           <!-- shipping Details -->



      <!-- Billing  Address -->


        {{-- <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
             <div class="row">
              
               <div class="col-12 col-md-6 mx-auto">
                    <!--  -->
              <div class="form-row mt-4">
                <div class="form-group col-12 col-md-12">
                <label for="profile-billing_FirstName">First Name</label>
                  <input type="text" class="form-control form-control-wine2u" id="profile-billing_FirstName" placeholder="">
                </div>
                <div class="form-group col-12 col-md-12">
                  <label for="profile-billing_LastName">Last Name</label>
                  <input type="text" class="form-control form-control-wine2u" id="profile-billing_LastName" placeholder="">
                </div>

                <div class="form-group col-12 col-md-12">
                  <label for="profile-billing_line1">Address line 1</label>
                  <input type="text" class="form-control form-control-wine2u" id="profile-billing_line1" placeholder="">
                </div>

                <div class="form-group col-12 col-md-12">
                  <label for="profile-billing_line2">Address line 2</label>
                  <input type="text" class="form-control form-control-wine2u" id="profile-billing_line2" placeholder="">
                </div>

                <div class="form-group col-12 col-md-6">
                <label for="profile-billing_city">City</label>
                  <input type="text" class="form-control form-control-wine2u" id="profile-billing_city" placeholder="">
                </div>
                <div class="form-group col-12 col-md-6">
                  <label for="profile-billing_state">State</label>
                  <input type="text" class="form-control form-control-wine2u" id="profile-billing_state" placeholder="">
                </div>

                <div class="form-group col-12 col-md-6">
                <label for="profile-billing_Zip-code">Zip Code</label>
                  <input type="text" class="form-control form-control-wine2u" id="profile-billing_Zip-code" placeholder="">
                </div>
                <div class="form-group col-12 col-md-6">
                  <label for="profile-billing_Phone-Number">Phone Number</label>
                  <input type="tel" class="form-control form-control-wine2u" id="profile-billing_Phone-Number" placeholder="">
                </div>

                <div class="form-group col-12 ">
                  <label for="profile-billing_Special-instructions">Special instructions </label>
                  <textarea class="form-control  form-control-wine2u " id="profile-billing_Special-instructions" rows="3"></textarea>
                </div>

                <div class="form-group col-12 my-5 text-center">
                <button type="submit" class="btn btn-wine2u-deep px-5 ">Save Changes</button>
                </div>
              </div>
              <!--  -->
               </div>
             </div>

        </div> --}}

      <!-- Billing Address -->
        
        {{-- </div>
      </div>
      </div> --}}
 <!-- Address -->






<!-- Change password -->

       <div class="tab-pane fade" id="list-change-password" role="tabpanel" aria-labelledby="list-change-password">
       <h1 class="profilet1">Change password</h1>
       <p>  <small>Change your password</small>  </p>

       <div class="row mt-5">
         <div class="col-12 col-md-12">
          <div id="cpMessage"></div>
           <form id="changepassword_form" >
              <div class="form-group col-12 ">
                <label for="Signup_Password1">Old password</label>
                <input type="password" class="form-control form-control-wine2u" placeholder="Enter Old Password" id="current_password" required>
              </div>

              <div class="form-group col-12 ">
                <label for="Signup_Password2">New Password</label>
                <input type="password" class="form-control form-control-wine2u" placeholder="Enter New Password" id="newpassword" required>
              </div>

              <div class="form-group col-12 ">
                <label for="Signup_Password3">Confirm Password</label>
                <input type="password" class="form-control form-control-wine2u" placeholder="Confirm New Password" id="confirm_password" required>
              </div>

              <div class="form-group col-12 my-5 text-right">
                  <button type="submit" class="btn btn-wine2u-deep px-5 " id="cp_btn">Update Password</button>
              </div>
           </form>
         </div>
       </div>
      </div>
    
<!-- Change password -->




    </div>
  </div>
</div>

  </div>
</section>

<!-- footer includes -->
  @include("pages.includes.footer")
  @include("pages.includes.footer-links")
<!-- footer includes -->
  <script src="/page_assets/js/account.js"></script>

 </body>
</html>