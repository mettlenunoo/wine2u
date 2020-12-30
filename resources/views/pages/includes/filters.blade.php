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
				<h6 class="fw-bold card-filter-sect border-top-none">Wine Type</h6>
				@foreach ($menu->wines as $wine)
					@php
						if(isset($_GET['wine'])){
							$selWine = $_GET['wine'];
						}else{
							$selWine = "";
						}
					@endphp
					<div class="filter-group">
						<label class="form-check-label mr-2" for="wines">
							{{ ucwords($wine->title) }}
						</label>
						<input class="form-check-input common_selector wines" type="checkbox" id="wines" value="{{ $wine->slug }}" @if($selWine == $wine->slug ) checked  @endif>
					</div>
					@foreach ($wine->subWines as $subWine)
						<div class="filter-group">
							<label class="form-check-label" for="wines">
							{{ ucwords($subWine->title) }}
							</label>
							<input class="form-check-input common_selector wines" type="checkbox" id="wines" value="{{ $subWine->slug }}" @if($selWine == $subWine->slug ) checked  @endif>
						</div>
					@endforeach
				@endforeach
			</div>
			{{-- @php print_r($menu->wines) @endphp --}}

			<!--  -->
			<div class="mb-3">
				<h6 class="fw-bold card-filter-sect">Grape Variety</h6>
				@foreach ($menu->grapes as $grape)
					@php
						if(isset($_GET['grapes'])){
							$selGrape = $_GET['grapes'];
						}else{
							$selGrape = "";
						}
					@endphp

					<div class="filter-group">
						<label class="form-check-label" for="grape">
							{{ ucwords($grape->title) }}
						</label>
						<input class="form-check-input common_selector grapes" type="checkbox" id="grape"  value="{{ $grape->slug }}" @if($selGrape == $grape->slug ) checked  @endif>
					</div>
					@foreach ($grape->subGrapes as $subGrape)
						<div class="filter-group">
							<label class="form-check-label" for="grape">
								{{ ucwords($subGrape->title) }}
							</label>
							<input class="form-check-input common_selector grapes" type="checkbox" id="grape"  value="{{ $subGrape->slug }}" @if($selGrape == $subGrape->slug ) checked  @endif>
						</div>
					@endforeach
				@endforeach
			</div>
			<!--  -->

			<!--  -->
			<div class="mb-3">
				<h6 class="fw-bold card-filter-sect">Food Pairings</h6>
				@php
					if(isset($_GET['pairing'])){
						$selPairing = $_GET['pairing'];
					}else{
						$selPairing = "";
					}
				@endphp
				@foreach ($menu->pairs as $pair)
					<div class="filter-group">
						<label class="form-check-label" for="pairs">
							{{ ucwords($pair->title) }}
						</label>
						<input class="form-check-input common_selector pairs" type="checkbox" id="pairs" value="{{ $pair->slug }}" @if($selPairing == $pair->slug ) checked  @endif>
					</div>
					@foreach ($pair->subPairing as $subPairing)
					<div class="filter-group">
						<label class="form-check-label" for="pairs">
							{{ ucwords($subPairing->title) }}
						</label>
						<input class="form-check-input common_selector pairs" type="checkbox" id="pairs" value="{{ $subPairing->slug }}" @if($selPairing == $subPairing->slug ) checked  @endif>
					</div>
					@endforeach
				@endforeach
			</div>
			<!--  -->

			<div class="mb-3">
				<h6 class="fw-bold card-filter-sect">country</h6>
				@php
					if(isset($_GET['country'])){
						$selCountry = $_GET['country'];
					}else{
						$selCountry = "";
					}
				@endphp
				@foreach ($menu->countries as $country)
					<div class="filter-group">
						<label class="form-check-label" for="country">
							{{ ucwords($country->name) }}
						</label>
						<input class="form-check-input common_selector country" type="checkbox" id="country" value="{{ $country->slug }}" @if($selCountry == $country->slug ) checked  @endif >
					</div>
					@foreach ($country->regions as $region)
						<div class="filter-group">
							<label class="form-check-label" for="country">
							{{ ucwords($region->name) }}
							</label>
							<input class="form-check-input common_selector country" type="checkbox" id="country" value="{{ $region->slug }}" @if($selCountry == $region->slug ) checked  @endif>
						</div>
					@endforeach
				@endforeach
			</div>
			<!--  -->

			<div class="mb-3">
				<h6 class="fw-bold card-filter-sect">Price</h6>
				<div class="filter-price">
					<span>$10</span>
					<span>$100</span>
				</div>
				<div class="filter-range">
					<input type="range" class="custom-range" min="10" max="100" value="20">
				</div>
			</div>
			<!--  -->
			
			<div class="mb-3">
				<h6 class="fw-bold card-filter-sect">Characteristics</h6>
				<div class="filter-price">
					<span>Light</span>
					<span>Bold</span>
				</div>
				<div class="filter-range">
					<input type="range" class="custom-range" min="0" max="100" value="30">
				</div>
				<div class="filter-price">
					<span>Smooth</span>
					<span>Tannic</span>
				</div>
				<div class="filter-range">
					<input type="range" class="custom-range" min="0" max="100" value="60">
				</div>
			</div>
		</div>
	</div>
 </div>