@extends("public.layouts.layout")

@section("content")

<!-- Carousel -->

	<section id="mainCarousel">
		<div id="carouselExampleDark" class="carousel carousel-dark carousel-fade slide" data-bs-ride="carousel">
		  <div class="carousel-inner">
		    <div class="carousel-item active" data-bs-interval="3000">
		      <img src="{{ asset('images/Fata/slider/4a.jpg') }}" class="d-block w-100" alt="...">
		      <div class="d-flex align-items-center animated-caption">
			      	<div class="carousel-caption d-none d-lg-flex flex-md-column align-items-center">
				        <h5 class="text-uppercase px-4 py-2">Save up to 75%</h5>
				        <h1 class="text-uppercase text-wide display-4 fw-500 w-100 mt-3">Men collection</h1>
				        <p class="text-white fw-normal h6 mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
				        <button class="btn rounded-0 bg-white text-uppercase px-3 py-2 my-3 fw-500">Shop now</button>
				      </div>
			      </div>
		    </div>
		    <div class="carousel-item" data-bs-interval="3000">
		      <img src="{{ asset('images/Fata/slider/2b.jpg') }}" class="d-block w-100" alt="...">
			      <div class="d-flex align-items-center animated-caption"> 
			      	<div class="carousel-caption d-none d-lg-flex flex-md-column align-items-center">
				        <h5 class="text-uppercase px-4 py-2">Save up to 75%</h5>
				        <h1 class="text-uppercase text-wide display-4 fw-500 w-100 mt-3">Wristwatch collection</h1>
				        <p class="text-white fw-normal h6 mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
				        <button class="btn rounded-0 bg-white text-uppercase px-3 py-2 my-3 fw-500">Shop now</button>
				      </div>
			      </div>
		    </div>
		    <div class="carousel-item" data-bs-interval="3000">
		      <img src="{{ asset('images/Fata/slider/1a.jpg') }}" class="d-block w-100" alt="...">
		      <div class="d-flex align-items-center animated-caption">
			      	<div class="carousel-caption d-none d-lg-flex flex-md-column align-items-center">
				        <h5 class="text-uppercase px-4 py-2">Save up to 75%</h5>
				        <h1 class="text-uppercase text-wide display-4 fw-500 w-100 mt-3">Women collection</h1>
				        <p class="text-white fw-normal h6 mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
				        <button class="btn rounded-0 bg-white text-uppercase px-3 py-2 my-3 fw-500">Shop now</button>
				      </div>
			      </div>
		    </div>
		    <div class="carousel-item" data-bs-interval="3000">
		      <img src="{{ asset('images/Fata/slider/3a.jpg') }}" class="d-block w-100" alt="...">
		      <div class="d-flex align-items-center animated-caption">
			      	<div class="carousel-caption d-none d-lg-flex flex-md-column align-items-center">
				        <h5 class="text-uppercase px-4 py-2">Save up to 75%</h5>
				        <h1 class="text-uppercase text-wide display-4 fw-500 w-100 mt-3">Jeans collection</h1>
				        <p class="text-white fw-normal h6 mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
				        <button class="btn rounded-0 bg-white text-uppercase px-3 py-2 my-3 fw-500">Shop now</button>
				      </div>
			      </div>
		    </div>
		  </div>
		  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"  data-bs-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="visually-hidden">Previous</span>
		  </button>
		  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"  data-bs-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="visually-hidden">Next</span>
		  </button>
		</div>
	</section>

	<!-- End of Carousel -->


	<!-- Image Cards Section -->

	<section id="imageCards">
		<div class="container">
			<div class="row my-5">
				<div class="col-12 col-lg-5 d-flex p-0">
					<div class="card bg-dark text-white rounded-0 p-0 border-0 overflow-hidden">
					  <img class="card-img rounded-0 w-100 h-100" src="{{ asset('images/test/promo-banner-1a.jpg') }}" alt="Card image">
					  <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
					    <button class="border-0 rounded-0 bg-white text-uppercase px-3 py-2 my-3 fw-500">75% off</button>
					    <h2 class="card-title text-uppercase text-wide fw-500">for women</h2>
					  </div>
					</div>
				</div>
				<div class="col-12 col-lg-7 d-flex flex-wrap p-0">
					<div class="d-flex flex-row w-100">
						<div class="card bg-dark text-white rounded-0 p-0 border-0 w-50 overflow-hidden">
						  <img class="card-img rounded-0 w-100 h-100" src="{{ asset('images/test/promo-banner-5a.jpg')}}" alt="Card image">
						  <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
						    <button class="border-0 rounded-0 bg-white text-uppercase px-3 py-2 my-3 fw-500">75% off</button>
					    	<h2 class="card-title text-uppercase text-wide fw-500">on bags</h2>
						  </div>
						</div>
						<div class="card bg-dark text-white rounded-0 p-0 border-0 w-50 overflow-hidden">
						  <img class="card-img rounded-0 w-100 h-100" src="{{ asset('images/test/promo-banner-3a.jpg')}}" alt="Card image">
						  <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
							  <button class="border-0 rounded-0 bg-white text-uppercase px-3 py-2 my-3 fw-500">75% off</button>
					    	<h2 class="card-title text-uppercase text-wide fw-500">for men</h2>
						  </div>
						</div>
					</div>
					<div class="d-flex flex-row w-100">
						<div class="card bg-dark text-white rounded-0 p-0 border-0 w-50 h-auto overflow-hidden">
						  <img class="card-img rounded-0 w-100 h-100" src="{{ asset('images/test/promo-banner-2a.jpg')}}" alt="Card image">
						  <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
						    <button class="border-0 rounded-0 bg-white text-uppercase px-3 py-2 my-3 fw-500">75% off</button>
					    	<h2 class="card-title text-uppercase text-wide fw-500">on shoes</h2>
						  </div>
						</div>
						<div class="card bg-dark text-white rounded-0 p-0 border-0 w-50 overflow-hidden">
						  <img class="card-img rounded-0 w-100 h-100" src="{{ asset('images/test/promo-banner-4a.jpg')}}" alt="Card image">
						  <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
						    <button class="border-0 rounded-0 bg-white text-uppercase px-3 py-2 my-3 fw-500">75% off</button>
					    	<h2 class="card-title text-uppercase text-wide fw-500">for kids</h2>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Random Items -->

	<section id="randomItems">
		<div class="container my-4 px-0">
			<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
				<div class="col">
					<div class="card text-dark p-0 border-0 rounded-0 h-75">
						<img src="assets/img/imageCards/250x300.png" class="card-img rounded-0 h-100 img-fluid" alt="...">
						<div class="card-img-overlay px-0">
							<!-- <span class="p-2 text-light fw-500 bg-success position-absolute">Sale!</span> -->
							<div class="flex-column align-items-center position-absolute bottom-0 w-100 animated-card-buttons">
								<div class="mb-4">
									<button class="btn btn-light rounded-0 me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><i class="fas fa-heart"></i></button>
									<button class="btn btn-light rounded-0 ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Quick view"><i class="fas fa-search"></i></button>
								</div>
								<button class="btn btn-block btn-dark w-100 rounded-0 p-3 text-uppercase fw-500 font-size-15"><i class="fas fa-shopping-cart me-2" ></i>Dodaj u košaricu</button>
							</div>
						</div>
					</div>
					<div class="card-body text-center h-25">
						<h6 class="card-title fw-normal">Kids Pants</h6>
						<p class="card-text fw-500">$35.00<del class="text-muted ms-2">$41.00</del></p>
					</div>
				</div>
				<div class="col">
					<div class="card text-dark p-0 border-0 rounded-0 h-75">
						<img src="assets/img/imageCards/250x300.png" class="card-img rounded-0 h-100 img-fluid" alt="...">
						<div class="card-img-overlay px-0">
							<!-- <span class="p-2 text-light fw-500 bg-success position-absolute">Sale!</span> -->		
							<div class="flex-column align-items-center position-absolute bottom-0 w-100 animated-card-buttons">
								<div class="mb-4">
									<button class="btn btn-light rounded-0 me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><i class="fas fa-heart"></i></button>
									<button class="btn btn-light rounded-0 ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Quick view"><i class="fas fa-search"></i></button>
								</div>
								<button class="btn btn-block btn-dark w-100 rounded-0 p-3 text-uppercase fw-500 font-size-15"><i class="fas fa-shopping-cart me-2" ></i>Dodaj u košaricu</button>
							</div>
						</div>
					</div>
					<div class="card-body text-center h-25">
						<h6 class="card-title fw-normal">Kids Pants</h6>
						<p class="card-text fw-500">$35.00<del class="text-muted ms-2">$41.00</del></p>
					</div>
				</div>
				<div class="col">
					<div class="card text-dark p-0 border-0 rounded-0 h-75">
						<img src="assets/img/imageCards/250x300.png" class="card-img rounded-0 h-100 img-fluid" alt="...">
						<div class="card-img-overlay px-0">
							<!-- <span class="p-2 text-light fw-500 bg-success position-absolute">Sale!</span> -->
							<div class="flex-column align-items-center position-absolute bottom-0 w-100 animated-card-buttons">
								<div class="mb-4">
									<button class="btn btn-light rounded-0 me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><i class="fas fa-heart"></i></button>
									<button class="btn btn-light rounded-0 ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Quick view"><i class="fas fa-search"></i></button>
								</div>
								<button class="btn btn-block btn-dark w-100 rounded-0 p-3 text-uppercase fw-500 font-size-15"><i class="fas fa-shopping-cart me-2" ></i>Dodaj u košaricu</button>
							</div>
						</div>
					</div>
					<div class="card-body text-center h-25">
						<h6 class="card-title fw-normal">Kids Pants</h6>
						<p class="card-text fw-500">$35.00<del class="text-muted ms-2">$41.00</del></p>
					</div>
				</div>
				<div class="col">
					<div class="card text-dark p-0 border-0 rounded-0 h-75">
						<img src="assets/img/imageCards/250x300.png" class="card-img rounded-0 h-100 img-fluid" alt="...">
						<div class="card-img-overlay px-0">
							<!-- <span class="p-2 text-light fw-500 bg-success position-absolute">Sale!</span> -->
							<div class="flex-column align-items-center position-absolute bottom-0 w-100 animated-card-buttons">
								<div class="mb-4">
									<button class="btn btn-light rounded-0 me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><i class="fas fa-heart"></i></button>
									<button class="btn btn-light rounded-0 ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Quick view"><i class="fas fa-search"></i></button>
								</div>
								<button class="btn btn-block btn-dark w-100 rounded-0 p-3 text-uppercase fw-500 font-size-15"><i class="fas fa-shopping-cart me-2" ></i>Dodaj u košaricu</button>
							</div>
						</div>
					</div>
					<div class="card-body text-center h-25">
						<h6 class="card-title fw-normal">Kids Pants</h6>
						<p class="card-text fw-500">$35.00<del class="text-muted ms-2">$41.00</del></p>
					</div>
				</div>
				<div class="col">
					<div class="card text-dark p-0 border-0 rounded-0 h-75">
						<img src="assets/img/imageCards/250x300.png" class="card-img rounded-0 h-100 img-fluid" alt="...">
						<div class="card-img-overlay px-0">
							<!-- <span class="p-2 text-light fw-500 bg-success position-absolute">Sale!</span> -->
							<div class="flex-column align-items-center position-absolute bottom-0 w-100 animated-card-buttons">
								<div class="mb-4">
									<button class="btn btn-light rounded-0 me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><i class="fas fa-heart"></i></button>
									<button class="btn btn-light rounded-0 ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Quick view"><i class="fas fa-search"></i></button>
								</div>
								<button class="btn btn-block btn-dark w-100 rounded-0 p-3 text-uppercase fw-500 font-size-15"><i class="fas fa-shopping-cart me-2" ></i>Dodaj u košaricu</button>
							</div>
						</div>
					</div>
					<div class="card-body text-center h-25">
						<h6 class="card-title fw-normal">Kids Pants</h6>
						<p class="card-text fw-500">$35.00<del class="text-muted ms-2">$41.00</del></p>
					</div>
				</div>
				<div class="col">
					<div class="card text-dark p-0 border-0 rounded-0 h-75">
						<img src="assets/img/imageCards/250x300.png" class="card-img rounded-0 h-100 img-fluid" alt="...">
						<div class="card-img-overlay px-0">
							<!-- <span class="p-2 text-light fw-500 bg-success position-absolute">Sale!</span> -->
							<div class="flex-column align-items-center position-absolute bottom-0 w-100 animated-card-buttons">
								<div class="mb-4">
									<button class="btn btn-light rounded-0 me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><i class="fas fa-heart"></i></button>
									<button class="btn btn-light rounded-0 ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Quick view"><i class="fas fa-search"></i></button>
								</div>
								<button class="btn btn-block btn-dark w-100 rounded-0 p-3 text-uppercase fw-500 font-size-15"><i class="fas fa-shopping-cart me-2" ></i>Dodaj u košaricu</button>
							</div>
						</div>
					</div>
					<div class="card-body text-center h-25">
						<h6 class="card-title fw-normal">Kids Pants</h6>
						<p class="card-text fw-500">$35.00<del class="text-muted ms-2">$41.00</del></p>
					</div>
				</div>
				<div class="col">
					<div class="card text-dark p-0 border-0 rounded-0 h-75">
						<img src="assets/img/imageCards/250x300.png" class="card-img rounded-0 h-100 img-fluid" alt="...">
						<div class="card-img-overlay px-0">
							<!-- <span class="p-2 text-light fw-500 bg-success position-absolute">Sale!</span> -->
							<div class="flex-column align-items-center position-absolute bottom-0 w-100 animated-card-buttons">
								<div class="mb-4">
									<button class="btn btn-light rounded-0 me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><i class="fas fa-heart"></i></button>
									<button class="btn btn-light rounded-0 ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Quick view"><i class="fas fa-search"></i></button>
								</div>
								<button class="btn btn-block btn-dark w-100 rounded-0 p-3 text-uppercase fw-500 font-size-15"><i class="fas fa-shopping-cart me-2" ></i>Dodaj u košaricu</button>
							</div>
						</div>
					</div>
					<div class="card-body text-center h-25">
						<h6 class="card-title fw-normal">Kids Pants</h6>
						<p class="card-text fw-500">$35.00<del class="text-muted ms-2">$41.00</del></p>
					</div>
				</div>
				<div class="col">
					<div class="card text-dark p-0 border-0 rounded-0 h-75">
						<img src="assets/img/imageCards/250x300.png" class="card-img rounded-0 h-100 img-fluid" alt="...">
						<div class="card-img-overlay px-0">
							<!-- <span class="p-2 text-light fw-500 bg-success position-absolute">Sale!</span> -->
							<div class="flex-column align-items-center position-absolute bottom-0 w-100 animated-card-buttons">
								<div class="mb-4">
									<button class="btn btn-light rounded-0 me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><i class="fas fa-heart"></i></button>
									<button class="btn btn-light rounded-0 ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Quick view"><i class="fas fa-search"></i></button>
								</div>
								<button class="btn btn-block btn-dark w-100 rounded-0 p-3 text-uppercase fw-500 font-size-15"><i class="fas fa-shopping-cart me-2" ></i>Dodaj u košaricu</button>
							</div>
						</div>
					</div>
					<div class="card-body text-center h-25">
						<h6 class="card-title fw-normal">Kids Pants</h6>
						<p class="card-text fw-500">$35.00<del class="text-muted ms-2">$41.00</del></p>
					</div>
				</div>
				<div class="col">
					<div class="card text-dark p-0 border-0 rounded-0 h-75">
						<img src="assets/img/imageCards/250x300.png" class="card-img rounded-0 h-100 img-fluid" alt="...">
						<div class="card-img-overlay px-0">
							<!-- <span class="p-2 text-light fw-500 bg-success position-absolute">Sale!</span> -->
							<div class="flex-column align-items-center position-absolute bottom-0 w-100 animated-card-buttons">
								<div class="mb-4">
									<button class="btn btn-light rounded-0 me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><i class="fas fa-heart"></i></button>
									<button class="btn btn-light rounded-0 ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Quick view"><i class="fas fa-search"></i></button>
								</div>
								<button class="btn btn-block btn-dark w-100 rounded-0 p-3 text-uppercase fw-500 font-size-15"><i class="fas fa-shopping-cart me-2" ></i>Dodaj u košaricu</button>
							</div>
						</div>
					</div>
					<div class="card-body text-center h-25">
						<h6 class="card-title fw-normal">Kids Pants</h6>
						<p class="card-text fw-500">$35.00<del class="text-muted ms-2">$41.00</del></p>
					</div>
				</div>
				<div class="col">
					<div class="card text-dark p-0 border-0 rounded-0 h-75">
						<img src="assets/img/imageCards/250x300.png" class="card-img rounded-0 h-100 img-fluid" alt="...">
						<div class="card-img-overlay px-0">
							<!-- <span class="p-2 text-light fw-500 bg-success position-absolute">Sale!</span> -->
							<div class="flex-column align-items-center position-absolute bottom-0 w-100 animated-card-buttons">
								<div class="mb-4">
									<button class="btn btn-light rounded-0 me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><i class="fas fa-heart"></i></button>
									<button class="btn btn-light rounded-0 ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Quick view"><i class="fas fa-search"></i></button>
								</div>
								<button class="btn btn-block btn-dark w-100 rounded-0 p-3 text-uppercase fw-500 font-size-15"><i class="fas fa-shopping-cart me-2" ></i>Dodaj u košaricu</button>
							</div>
						</div>
					</div>
					<div class="card-body text-center h-25">
						<h6 class="card-title fw-normal">Kids Pants</h6>
						<p class="card-text fw-500">$35.00<del class="text-muted ms-2">$41.00</del></p>
					</div>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-12 text-center">
					<button class="btn browse-btn rounded-0 font-size-13 py-3 text-light">Browse all products<i class="fas fa-long-arrow-alt-right ms-2"></i></button>
				</div>
			</div>
		</div>
	</section>

	<!-- End of Random Items -->

@endsection