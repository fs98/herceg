@extends('public.layouts.public')

@section('content')

<!-- Carousel --> 

<section id="mainCarousel">
  <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-interval="5000">
        <img src="https://images.pexels.com/photos/5231216/pexels-photo-5231216.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" class="d-block w-100 img-responsive" alt="...">
        <div class="d-flex align-items-center animated-caption">
            <div class="carousel-caption d-none d-lg-flex flex-md-column align-items-center">
              <h5 class="text-uppercase px-4 py-2">20 godina tradicije</h5>
              <h1 class="text-uppercase text-wide display-4 fw-500 w-100 mt-3 py-2">Organska proizvodnja "Herceg"</h1>
              <p class="text-white fw-normal h6 mt-3">"Herceg” egzistira na području općine Novi Travnik i svojevrsni je pionir uvođenja organske poljoprivredne 
                proizvodnje u Bosni i Hercegovini.</p>
              <button class="btn rounded-0 bg-white text-uppercase px-3 py-2 my-3 fw-500" onclick="location.href='proizvodi';">Proizvodi</button>
            </div>
          </div>
      </div>
      <div class="carousel-item" data-interval="5000">
        <img src="https://images.pexels.com/photos/6763421/pexels-photo-6763421.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="d-block w-100 img-responsive" alt="...">
        <div class="d-flex align-items-center animated-caption">
          <div class="carousel-caption d-none d-lg-flex flex-md-column align-items-center">
            <h5 class="text-uppercase px-4 py-2">Kozmetika</h5>
            <h1 class="text-uppercase text-wide display-4 fw-500 w-100 mt-3 py-2">Neven krema - melem</h1>
            <p class="text-white fw-normal h6 mt-3">Pomaže kod opekotina, posjekotina, ogrebotina, akni, upaljenih i proširenih vena.</p>
            <button class="btn rounded-0 bg-white text-uppercase px-3 py-2 my-3 fw-500">Kupi sad</button>
          </div>
        </div>
      </div>
      <div class="carousel-item" data-interval="5000">
        <img src="https://image.freepik.com/free-photo/still-life-loose-tea_169016-2071.jpg" class="d-block w-100 img-responsive " alt="...">
          <div class="d-flex align-items-center animated-caption"> 
            <div class="carousel-caption d-none d-lg-flex flex-md-column align-items-center">
              <h5 class="text-uppercase px-4 py-2">Čajevi</h5>
              <h1 class="text-uppercase text-wide display-4 fw-500 w-100 mt-3 py-2">Čaj kadulja</h1>
              <p class="text-white fw-normal h6 mt-3">Veoma brzo eliminiše bol i svrab, zaustavlja krvarenje, ima protuupalnu i antiseptičko dejstvo...</p>
              <button class="btn rounded-0 bg-white text-uppercase px-3 py-2 my-3 fw-500">Kupi sad</button>
            </div>
          </div>
      </div>
      <div class="carousel-item" data-interval="5000">
        <img src="https://image.freepik.com/free-photo/yellow-flowers-among-other-flowers_1160-706.jpg" class="d-block w-100 img-responsive" alt="...">
        <div class="d-flex align-items-center animated-caption">
            <div class="carousel-caption d-none d-lg-flex flex-md-column align-items-center">
              <h5 class="text-uppercase px-4 py-2">Uštedite do 75%</h5>
              <h1 class="text-uppercase text-wide display-4 fw-500 w-100 mt-3 py-2">Med od maslačka</h1>
              <p class="text-white fw-normal h6 mt-3">Veoma brzo eliminiše bol i svrab, zaustavlja krvarenje, ima protuupalno i antiseptičko dejstvo...</p>
              <button class="btn rounded-0 bg-white text-uppercase px-3 py-2 my-3 fw-500">Kupi sad</button>
            </div>
          </div>
      </div> 
    </div>
    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</section>

<!-- End of Carousel -->

<style>

.items-swiper .swiper-button-next {
  right: -30px;
}

.items-swiper .swiper-button-prev {
  left: -30px;
}

</style>

<!-- Items Section -->

<section class="mt-5">
  <div class="container position-relative">
    <div class="row">
      <div class="col-12">
        <!-- Swiper -->
          <div class="swiper-container items-swiper w-100 h-100" style="position: unset;">
            <div class="swiper-wrapper" id="featuredItems">

              @foreach ($products as $product)

                <div class="swiper-slide">
                  <div class="h-100">
                    <div class="card text-dark p-0 border-0 rounded-0 h-75 img-responsive" style="max-height: 246px; max-width: 196px">
                      <img src="{{ $product->header_image_url }}" class="card-img rounded-0 h-100 img-fluid img-responsive" alt="...">
                      <div class="card-img-overlay px-0"> 
                        <span class="p-2 text-light fw-500 bg-primary position-absolute">Sniženo</span> 
                        <div class="flex-column align-items-center position-absolute bottom-0 w-100 animated-card-buttons">
                        <div class="mb-4">
                          <button class="btn btn-light rounded-0 mr-1" data-toggle="tooltip" data-placement="top" title="Add to wishlist">
                            <i class="fas fa-heart"></i>
                          </button>
                          <button class="btn btn-light rounded-0 mr-1" data-toggle="tooltip" data-placement="top" title="Quick view">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                        <button class="btn btn-block btn-dark w-100 rounded-0 p-3 text-uppercase fw-500">
                          <i class="fas fa-shopping-cart mr-1"></i>
                          <small>Dodaj u košaricu</small>
                        </button>
                        </div>
                      </div>
                    </div>
                    <div class="card-body text-center h-25">
                      <h6 class="card-title fw-normal">{{ $product->title }}</h6>
                      <p class="card-text fw-500 text-theme-color">{{ $product->price }} KM<del class="text-muted ml-2">10 KM</del>
                      </p>
                    </div> 
                  </div>
                </div>

              @endforeach

            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
          </div>
      </div>  
      <div class="col-12 text-center">
          <button class="btn browse-btn rounded-0 font-size-13 py-3 text-light" onclick="location.href='proizvodi';" >Pogledaj sve proizvode<i class="fas fa-long-arrow-alt-right ml-2"></i></button>
      </div> 
  </div> 
</section>

<!-- End of Items Section -->

<div id="autocomplete"></div>

<!-- Image or Add Section -->

<section>
  <div class="container">
    <div class="row">
      <div class="col-12 mt-5">
        <img src="{{ asset('images/home/home-main.png') }}" class="img-responsive w-100 mt-5" height="200">
      </div>
    </div>
  </div>
</section>

<!-- End of Image or Add Section -->

	<!-- Random Items -->

	<section id="randomItems">
		<div class="container my-5">
			<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
				@foreach ($products as $product)
          <div class="col">
            <div class="card text-dark p-0 border-0 rounded-0 h-75">
              <img src="{{ $product->header_image_url }}" class="card-img rounded-0 h-100 img-responsive" alt="..." style="max-height: 246px; max-width: 196px">
              <div class="card-img-overlay px-0">
                <!-- <span class="p-2 text-light fw-500 bg-success position-absolute">Sale!</span> -->
                <div class="flex-column align-items-center position-absolute bottom-0 w-100 animated-card-buttons">
                  <div class="mb-4">
                    <button class="btn btn-light rounded-0 me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><i class="fas fa-heart"></i></button>
                    <button class="btn btn-light rounded-0 ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Quick view"><i class="fas fa-search"></i></button>
                  </div>
                  <button class="btn btn-block btn-dark w-100 rounded-0 p-3 text-uppercase fw-500">
                    <i class="fas fa-shopping-cart mr-1"></i>
                    <small>Dodaj u košaricu</small>
                  </button>
                </div>
              </div>
            </div>
            <div class="card-body text-center h-25">
              <h6 class="card-title fw-normal">{{ $product->title }}</h6>
              <h6>Na stanju: {{ $product->in_stock == '1' ? "Da" : "Ne" }}</h6>
              <p class="card-text fw-500">{{ $product->price }} KM<del class="text-muted ml-2"></del></p>
            </div>
          </div>
        @endforeach
			</div>
			<div class="row mt-4">
				<div class="col-12 text-center">
					<button class="btn browse-btn rounded-0 font-size-13 py-3 text-light" onclick="location.href='proizvodi';">Pogledaj sve proizvode<i class="fas fa-long-arrow-alt-right ml-2"></i></button>
				</div>
			</div>
		</div>
	</section>

	<!-- End of Random Items -->


<!-- Image Cards Section -->

	<section id="imageCards" class="d-none">
		<div class="container">
			<div class="row my-5">
				<div class="col-12 col-lg-5 d-flex p-0">
					<div class="card bg-dark text-white rounded-0 p-0 border-0 overflow-hidden">
					  <img class="card-img rounded-0 w-100 h-100 img-responsive" src="{{ asset('images/home/category (1).jpg') }}" alt="Card image">
					  <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
					    <button class="border-0 rounded-0 bg-white text-uppercase px-3 py-2 my-3 fw-500">do -75%</button>
					    <h2 class="card-title text-uppercase text-wide fw-500 bg-dark rounded-0 px-3 py-2">na zimnicu</h2>
					  </div>
					</div>
				</div>
				<div class="col-12 col-lg-7 d-flex flex-wrap p-0">
					<div class="d-flex flex-row w-100">
						<div class="card bg-dark text-white rounded-0 p-0 border-0 w-50 overflow-hidden">
						  <img class="card-img rounded-0 w-100 h-100 img-responsive" src="{{ asset('images/home/category (2).jpg') }}" alt="Card image">
						  <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
						    <button class="border-0 rounded-0 bg-white text-uppercase px-3 py-2 my-3 fw-500">do -75%</button>
					    	<h2 class="card-title text-uppercase text-wide fw-500 bg-dark rounded-0 px-3 py-2">na čajeve</h2>
						  </div>
						</div>
						<div class="card bg-dark text-white rounded-0 p-0 border-0 w-50 overflow-hidden">
						  <img class="card-img rounded-0 w-100 h-100 img-responsive" src="{{ asset('images/home/category (3).png') }}" alt="Card image">
						  <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
							  <button class="border-0 rounded-0 bg-white text-uppercase px-3 py-2 my-3 fw-500">do -75%</button>
					    	<h2 class="card-title text-uppercase text-wide fw-500 bg-dark rounded-0 px-3 py-2">na sirupe</h2>
						  </div>
						</div>
					</div>
					<div class="d-flex flex-row w-100">
						<div class="card bg-dark text-white rounded-0 p-0 border-0 w-50 h-auto overflow-hidden">
						  <img class="card-img rounded-0 w-100 h-100 img-responsive" src="{{ asset('images/home/category (4).jpg') }}" alt="Card image">
						  <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
						    <button class="border-0 rounded-0 bg-white text-uppercase px-3 py-2 my-3 fw-500">do -75%</button>
					    	<h2 class="card-title text-uppercase text-wide fw-500 bg-dark rounded-0 px-3 py-2">na ulja</h2>
						  </div>
						</div>
						<div class="card bg-dark text-white rounded-0 p-0 border-0 w-50 overflow-hidden">
						  <img class="card-img rounded-0 w-100 h-100 img-responsive" src="{{ asset('images/home/category (5).jpg') }}" alt="Card image">
						  <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
						    <button class="border-0 rounded-0 bg-white text-uppercase px-3 py-2 my-3 fw-500">do -75%</button>
					    	<h2 class="card-title text-uppercase text-wide fw-500 bg-dark rounded-0 px-3 py-2">na prehranu</h2>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- End of Image Cards Section -->

  	<!-- Web shop Info Section -->

	<section class="bg-dark" id="webShopInfoSection">
		<div class="container">
			<div class="row py-5 text-light text-center">
				<div class="col-12 col-lg-4">
					<i class="fas fa-shuttle-van fa-2x"></i>
					<h5 class="text-uppercase fw-bold mt-3">Besplatna dostava</h5>
					<p class="my-0 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</p>
				</div>
				<div class="col-12 mt-5 col-lg-4 mt-lg-0">
					<i class="fas fa-clock fa-2x"></i>
					<h5 class="text-uppercase fw-bold mt-3">30 dana povrat novca</h5>
					<p class="my-0 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</p>
				</div>
				<div class="col-12 mt-5 col-lg-4 mt-lg-0">
					<i class="fas fa-phone-alt fa-2x"></i>
					<h5 class="text-uppercase fw-bold mt-3">Podrška 24/7</h5>
					<p class="my-0 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</p>
				</div>
			</div>
		</div>
	</section>

	<!-- Web shop Info Section -->
    
@endsection

@section('scripts')

<script>

// Card animation

$("#featuredItems .card, #randomItems .card").hover(function() {
		$(this).find(".animated-card-buttons").css("display","flex").hide().fadeIn();
	}, function() {
		$(this).find(".animated-card-buttons").css("display","none");
	})

$("#imageCards .card").hover(function() {
	$(this).find("img").css({
		'transform' : 'scale(1.2)',
	'-webkit-transform' : 'scale(1.2)',
	'-o-transform': 'scale(1.2)',
	'-moz-transform': 'scale(1.2)',
	'transition-duration': '0.7s'
	});
	$(this).find("h2").css({
		'color' : '#3fc380',
		'transition' : '0.5s'
	});
	$(this).find(".card-img-overlay").css({
		'background-color' : 'rgba(255, 255, 255, 0.5)',
	});
}, function() {
	$(this).find("img").css({
		'transform' : 'scale(1)',
	'-webkit-transform' : 'scale(1)',
	'-o-transform': 'scale(1)',
	'-moz-transform': 'scale(1)',
	'transition-duration': '0.7s'
	});
	$(this).find("h2").css({
		'color' : 'white'
	});
	$(this).find(".card-img-overlay").css({
		'background-color' : 'transparent',
	});
})

</script>
    
@endsection