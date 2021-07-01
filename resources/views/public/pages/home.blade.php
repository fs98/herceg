@extends('public.layouts.public')

@section('content')

<!-- Home page splash -->

		<section id="mainSplash" class="position-relative">
			<div class="container-fluid h-100">
				<div class="row overflow-hidden h-100">
					<div class="col-lg-7">
						<img src="{{ asset('images/home/opg.png') }}" class="tradition-logo img-responsive">
					</div>
					<div class="col-lg-5 h-100 herceg d-none d-lg-block">
						<img src="{{ asset('images/home/herceg-products.jpg') }}" class="rounded-circle position-absolute">
					</div>
				</div>
			</div>
		</section> 

		<!-- Items Section -->

		<section class="mt-5">
		  <div class="container position-relative">
		    <div class="row">
		      <div class="col-12">
		        <!-- Swiper -->
		          <div class="swiper-container bg-transparent items-swiper w-100 h-100" style="position: unset;">
		            <div class="swiper-wrapper" id="featuredItems">

		              @foreach ($products as $product)

		                <div class="swiper-slide bg-transparent">
		                  <div class="" style="height: 28rem">
		                    <div class="card text-dark p-0 border-0 h-100 bg-light">
						              <img src="{{ $product->header_image_url }}" class="card-img rounded img-responsive h-50" alt="...">
						              <div class="card-img-overlay px-0">
						                <!-- <span class="p-2 text-light fw-500 bg-success position-absolute">Sale!</span> -->
						                <div class="flex-column align-items-center position-absolute bottom-0 w-100">
						                  <div class="mb-4 justify-content-center align-items-center animated-card-buttons">
						                    <a class="btn btn-light rounded-0 py-2 bg-dark" href="{{ Route('public.products.show', ['category' => $product->category, 'product' => $product->slug]) }}"  title="Vidi detaljno"><i class="fas fa-2x fa-search routooltipnded text-theme-color"></i></a>
						                  </div>
						                  <form class="w-100" method="POST" action="{{ Route('cart.store', $product) }}" id="{{ Helper::RouteCrafter('store') . $product->id }}">
		                            @csrf
		                            <button type="button" class="btn btn-block btn-dark w-100 rounded-lg p-3 text-uppercase fw-500 font-size-15 submit-btn" form="{{ Helper::RouteCrafter('store')  . $product->id }}"><i class="fas fa-shopping-cart mr-2" ></i>Dodaj u košaricu</button>
		                          </form>
						                </div>
						              </div>
						              <div class="card-body text-center h-25">
						                <h6 class="card-title font-weight-bold text-theme-color h4"> {{ $product->title }} </h6>
						                <p class="card-text text-center text-dark h3 font-weight-bold"> {{ $product->price }} KM<del class="text-muted ml-2"></del></p>
						              </div>
						            </div>
		                	</div>
		              	</div>

		              @endforeach

		            </div>  
		          </div>
		      </div>  
		      <div class="col-12 text-center mt-5">
		          <button class="btn browse-btn rounded-1 font-size-13 py-3 text-light" onclick="location.href='proizvodi';" >Pogledaj sve proizvode<i class="fas fa-long-arrow-alt-right ml-2"></i></button>
		      </div> 
		  </div> 
		</section>

		<!-- End of Items Section -->

		<div id="autocomplete"></div>


		<!-- Image or Add Section -->

		<section id="nevenSplash" class="mt-5">
		  <div class="container-fluid">
		    <div class="row">
				    <div class="col-lg-8 offset-lg-2 col-12 text-dark d-flex align-items-center border-1 mt-4" style="background-color:rgb(255,255,255,0.8);">
				      <p class="h3 text-center py-3">Firma "Herceg” egzistira na području općine Novi Travnik i svojevrsni je pionir uvođenja organske poljoprivredne proizvodnje u Bosni i Hercegovini. Neprestano je uključena u ovaj sistem a jedna je od rijetkih koja je, zahvaljujući u prvom redu kvaliteti svojih proizvoda, već u samom startu uspjela dobiti međunarodni certifikat.
							Nadalje, firma ”Herceg” ne samo da je uspjela sačuvati kontinuitet i nivo svoje organske proizvodnje nego je na dobrom putu da ga u doglednoj budućnosti i značajno unaprijedi</p>
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
					<div class=" col-12 col-md-4 col-xl-3 mb-5" style="height: 24rem">
		          <div class="card text-dark p-0 border-0 h-100 shadow-lg bg-light">
		            <img src="{{ $product->header_image_url }}" class="card-img rounded img-responsive h-50" alt="...">
		            <div class="card-img-overlay px-0">
		              <div class="flex-column align-items-center position-absolute bottom-0 w-100">
		                <div class="mb-5 justify-content-center align-items-center animated-card-buttons">
		                  <a class="btn btn-dark rounded-0 py-2" href="{{ Route('public.products.show', ['category' => $product->category, 'product' => $product->slug]) }}" title="Vidi detaljno"><i class="fas fa-2x fa-search rounded text-theme-color"></i></a>
		                </div>
		                <form class="w-100" method="POST" action="{{ Route('cart.store', $product) }}" id="{{ Helper::RouteCrafter('store') . $product->id }}">
		                  @csrf
		                  <button type="button" class="btn btn-block btn-dark w-100 rounded-lg p-3 text-uppercase fw-500 font-size-15 submit-btn" form="{{ Helper::RouteCrafter('store')  . $product->id }}"><i class="fas fa-shopping-cart mr-2" ></i>Dodaj u košaricu</button>
		                </form>
		              </div>
		            </div>
		            <div class="card-body text-center h-25">
		              <h6 class="card-title font-weight-bold text-theme-color h4">{{ $product->title }}</h6>
		              <p class="card-text text-center text-dark h3 font-weight-bold">{{ $product->price }} KM<del class="text-muted ml-2"></del></p>
		            </div>
		      	</div>
		      </div>
		      @endforeach
				</div>
				<div class="row mt-4">
					<div class="col-12 text-center">
						<button class="btn browse-btn rounded-1 font-size-13 py-3 text-light" onclick="location.href='proizvodi';">Pogledaj sve proizvode<i class="fas fa-long-arrow-alt-right ml-2"></i></button>
					</div>
				</div>
			</div>
		</section>

		<!-- End of Random Items -->

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

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

	<script>
	$(".submit-btn").on("click", function(event) {
	if($(event.target.form)[0] != undefined) {
	  var form = $(event.target.form)[0];
	  if (!form.checkValidity()) {
	    var tmpSubmit = document.createElement('button');
	    form.appendChild(tmpSubmit);
	    tmpSubmit.click();
	    form.removeChild(tmpSubmit);
	    return false;
	  }
	  var form_data = new FormData(form);
	  Swal.fire({
	    toast: false,
	    title: 'Processing..',
	    text: 'One moment please..',
	    allowEscapeKey : false,
	    allowOutsideClick: false,
	    onOpen: function() {
	      $.ajax({
	        type: $(form).attr('method'),
	        url: $(form).attr('action'),
	        processData: false,
	        contentType: false,
	        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	        data: form_data,
	      }).done(function(data) {
	      }).fail(function(data) {
	      }).always(function(data) {
	        $(form).find(".form-error-box").remove();
	        $(form).find(".invalid-feedback").remove();
	        $(form).find(".is-invalid").removeClass('is-invalid');
	        if(data != undefined) {
	          if(data.responseJSON != undefined && (data.responseJSON.errors != undefined || data.responseJSON.exception != undefined)) {
	            Swal.update({
	              allowEscapeKey : false,
	              allowOutsideClick: false,
	              icon: 'error',
	              text: 'Došlo je do greške, molimo pokušajte ponovo.',
	              title: 'Greška!',
	            });
	            Swal.hideLoading();
	            var html_error_segment = '<div class="form-group p-4 form-error-box"><h2 id="errors-title">Folgende Fehler sind aufgetreten:</h2></div>';
	            var error_title_element = $("#errors-top").append(html_error_segment);
	            if(data.responseJSON.errors != undefined) {
	              for (var key in data.responseJSON.errors) {
	                error_title_element.find("#errors-title").after("<li>" + data.responseJSON.errors[key] + "</li>");
	                $("#" + key).addClass('is-invalid');
	                $("#" + key).after('<span class="invalid-feedback mb-3" role="alert"><strong>' + data.responseJSON.errors[key] + '</strong></span>');
	              }
	            } else if(data.responseJSON.exception != undefined) {
	              error_title_element.find("#errors-title").after("<li>" + data.responseJSON.exception + "</li>");
	            }
	            $("#errors-top").show();
	            throw new Error;
	          }
	          Swal.fire({
	            icon: 'success',
	            text: data.swal_message,
	            title: data.swal_title,
	            allowEscapeKey : false,
	            allowOutsideClick: false,
	          }).then(function() { 
	            $('#total').load(window.location.href + " #total > *");
	            $('#cart').load(window.location.href + " #cart > *");
	            if(data.redirect_url != null && data.redirect_url != '') {
	              window.location.href = data.redirect_url;
	            }
	          });
	          Swal.hideLoading();
	        }
	      });
	      Swal.showLoading();
	    }
	  });
	}
	});

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