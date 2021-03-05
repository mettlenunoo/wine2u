<section class="footergreen">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-4 mb-4"> 
				<img src="/page_assets/img/wine2ulogo.svg" alt="" width="70">
				<p class="wine_wc ">©2020 wine2u</p>
				<ul class="list-inline">
					<li class="list-inline-item px-2">
						<a href="https://m.facebook.com/wine2uinternational/"><img src="/page_assets/img/facebookw.svg" alt=""></a>
					</li>
					<li class="list-inline-item px-2">
						<a href="https://instagram.com/wine2u__"><img src="/page_assets/img/instagram.svg" alt=""></a>
					</li>
					<li class="list-inline-item px-2">
						<a href="https://twitter.com/wine2u_"><img src="/page_assets/img/twitter.svg" alt=""></a>
					</li>
					<li class="list-inline-item px-2">
						<a href="#"><img src="/page_assets/img/youtube.svg" alt=""></a>
					</li>
				</ul>
			</div>

			<div class="col-12 col-lg-8">
				<div class="footer-grid">
					<div class="mb-4">
						<h1 class="mb-3">Discover</h1>
						<ul class="list-unstyled">
							<li class="mb-2"><a href="#">Wines</a></li>
							<li class="mb-2"><a href="#">Champagnes</a></li>
							<li class="mb-2"><a href="#">Cognacs</a></li>
							<li class="mb-2"><a href="#">Paring</a></li>
						</ul>
					</div>

					<div class="mb-4">
						<h1 class="mb-3">More</h1>
						<ul class="list-unstyled">
							<li class="mb-2"><a href="#">Grapes</a></li>
							<li class="mb-2"><a href="#">Regions</a></li>
							<li class="mb-2"><a href="#">Kɔkɔ's Blog</a></li>
						</ul>
					</div>

					<div class="mb-4">
						<h1 class="mb-3">Legal</h1>
						<ul class="list-unstyled">
							<li class="mb-2"><a href="#">Privacy Policy</a></li>
							<li class="mb-2"><a href="#">Terms of  Use</a></li>
						</ul>
					</div>
					
					<div class="mb-4">
						<h1 class="mb-3">Apps</h1>
						<ul class="list-unstyled">
							<li class="mb-2"><a href="#">IOS</a></li>
							<li class="mb-2"><a href="#">Android</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-12 text-md-right mt-5">
				<p class="wine_wc">
					<small>Copyright © 2020 wine2u  - All rights reserved.</small>
				</p>
			</div>
		</div>
    </div>
</section>

<div class="privacy-policy" id="privacy-policy">
	<div class="privacy-top">
		<p class="fw-bold mb-0">We serve cookies</p>
		<button id="close-cookies">
			<i class="fa fa-close"></i>
		</button>
	</div> 
	<p class="mb-3 small">We use cookies to improve user experience and analyse our website traffic. For these reasons, we may share your information from our site to our analytics partners. By clicking "Accept Cookies", you have given consent for the above to be done whenever you visit our site. <br> You can change your cookie settings at any time by clicking "Cookie Preferences".</p>
	<button class="cookies-btn">Accept Cookies</button>
</div>

<button type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#nw-modal">
	Launch demo modal
  </button>

	<!-- Modal -->
	<div class="modal fade nw-modal" id="nw-modal" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<button class="close-btn" id="closemodal" data-dismiss="modal" style="cursor: pointer" >
					<span aria-hidden="true" class="clr-white">&times;</span>
				</button>
				<div class="nw-popup-img">
					<img src="{{ asset('page_assets/img/modal-he.jpg') }}" alt="" class="as-background"/>
				</div>
				<div class="nw-popup-body">
					<h2>Get the latest updates!</h2>
					<p>
						Enter you email address below to subscribe to Wine2U.
					</p>
					<form id="subscribe_model">
						<div class="form-grid">
							<input id="m_email"  type="email" placeholder="Email Address"  required/>
							<button type="submit" id="model_btn">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

