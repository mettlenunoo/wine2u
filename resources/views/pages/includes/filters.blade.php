<div class="col-12 col-md-5 col-lg-3 mb-4">
	<div class="filter-ctrl d-flex d-md-none">
		<button class="filter-btn" id="toggle-filter">
			Filters
			<i class="fa fa-angle-down ml-3 filter-btn-icon"></i>
		</button>
	</div>
    <div class="card productside" id="filter-wrapper">
      <div class="card-body">
          
      <div class="mb-3">
       <h6> <strong>Wine Type</strong> </h6>
       <hr>
        @foreach ($menu->wines as $wine)
            @php
                if(isset($_GET['wine'])){

                    $selWine = $_GET['wine'];
                }else{

                    $selWine = "";
                }
            @endphp
            <div class="form-group mb-1 row">
                <div class="col-10">
                <label class="form-check-label" for="wines">
                    {{ ucwords($wine->title) }}
                </label>
                </div>
                <div class="col-2">
                <div class="form-check">
                    <input class="form-check-input common_selector wines" type="checkbox" id="wines" value="{{ $wine->slug }}" @if($selWine == $wine->slug ) checked  @endif>
                </div>
                </div>
            </div>
            @foreach ($wine->subWines as $subWine)
                <div class="form-group mb-1 row">
                    <div class="col-10">
                    <label class="form-check-label" for="wines">
                       -- {{ ucwords($subWine->title) }}
                    </label>
                    </div>
                    <div class="col-2">
                    <div class="form-check">
                        <input class="form-check-input common_selector wines" type="checkbox" id="wines" value="{{ $subWine->slug }}" @if($selWine == $subWine->slug ) checked  @endif>
                    </div>
                    </div>
                </div>
            @endforeach
        @endforeach
       
         {{-- @php print_r($menu->wines) @endphp --}}
         <hr>
      </div>

      <!--  -->
      <div>
        <h6> <strong>Grape Variety</strong> </h6>
        <hr>
            @foreach ($menu->grapes as $grape)

                @php
                    if(isset($_GET['grapes'])){

                        $selGrape = $_GET['grapes'];
                    }else{

                        $selGrape = "";
                    }
                @endphp

                <div class="form-group mb-1 row">
                    <div class="col-10">
                        <label class="form-check-label" for="grape">
                            {{ ucwords($grape->title) }}
                        </label>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                        <input class="form-check-input common_selector grapes" type="checkbox" id="grape"  value="{{ $grape->slug }}" @if($selGrape == $grape->slug ) checked  @endif>
                        </div>
                    </div>
                </div>
                @foreach ($grape->subGrapes as $subGrape)
                    <div class="form-group mb-1 row">
                        <div class="col-10">
                            <label class="form-check-label" for="grape">
                                -- {{ ucwords($subGrape->title) }}
                            </label>
                        </div>
                        <div class="col-2">
                            <div class="form-check">
                            <input class="form-check-input common_selector grapes" type="checkbox" id="grape"  value="{{ $subGrape->slug }}" @if($selGrape == $subGrape->slug ) checked  @endif>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        <hr>
      </div>
      
      <!--  -->

      <!--  -->
      <div>
       <h6> <strong>Food Pairings</strong> </h6>
       <hr>

        @php
            if(isset($_GET['pairing'])){

                $selPairing = $_GET['pairing'];
            }else{

                $selPairing = "";
            }
        @endphp
        @foreach ($menu->pairs as $pair)

            <div class="form-group mb-1 row">
                <div class="col-10">
                    <label class="form-check-label" for="pairs">
                        {{ ucwords($pair->title) }}
                    </label>
                </div>
                <div class="col-2">
                    <div class="form-check">
                        <input class="form-check-input common_selector pairs" type="checkbox" id="pairs" value="{{ $pair->slug }}" @if($selPairing == $pair->slug ) checked  @endif>
                    </div>
                </div>
            </div>
            @foreach ($pair->subPairing as $subPairing)
        
                <div class="form-group mb-1 row">
                    <div class="col-10">
                        <label class="form-check-label" for="pairs">
                           -- {{ ucwords($subPairing->title) }}
                        </label>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input class="form-check-input common_selector pairs" type="checkbox" id="pairs" value="{{ $subPairing->slug }}" @if($selPairing == $subPairing->slug ) checked  @endif>
                        </div>
                    </div>
                </div>

           @endforeach

        @endforeach


         <hr>
      </div>
      <!--  -->

      <div>
        <h6> <strong>country</strong> </h6>
        <hr>

        @php
            if(isset($_GET['country'])){

                $selCountry = $_GET['country'];
            }else{

                $selCountry = "";
            }
        @endphp

         @foreach ($menu->countries as $country)

           
             <div class="form-group mb-1 row">
                 <div class="col-10">
                     <label class="form-check-label" for="country">
                         {{ ucwords($country->name) }}
                     </label>
                 </div>
                 <div class="col-2">
                     <div class="form-check">
                         <input class="form-check-input common_selector country" type="checkbox" id="country" value="{{ $country->slug }}" @if($selCountry == $country->slug ) checked  @endif >
                     </div>
                 </div>
             </div>
             @foreach ($country->regions as $region)
         
                 <div class="form-group mb-1 row">
                     <div class="col-10">
                         <label class="form-check-label" for="country">
                            -- {{ ucwords($region->name) }}
                         </label>
                     </div>
                     <div class="col-2">
                         <div class="form-check">
                             <input class="form-check-input common_selector country" type="checkbox" id="country" value="{{ $region->slug }}" @if($selCountry == $region->slug ) checked  @endif>
                         </div>
                     </div>
                 </div>
 
            @endforeach
 
         @endforeach
 
 
          <hr>
       </div>


      <!--  -->
      <div>
       <h6> <strong>Price</strong> </h6>
       <hr>

        {{-- <div class="form-group mb-1 row">
               <div class="col-10">
                 <label class="form-check-label" for="Beef">
                 Beef
                 </label>
               </div>
               <div class="col-2">
                 <div class="form-check">
                   <input class="form-check-input" type="checkbox" id="Beef" name="" value="1">
                 </div>
               </div>
         </div> --}}

 
         {{-- <hr> --}}
      </div>
      <!--  -->

      </div>
    </div>
 </div>