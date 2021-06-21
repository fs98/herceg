@extends('public.layouts.public')

@section('content')

    <!-- Single product card section -->
 
  <section id="randomItems">
    <div class="container my-4 px-0">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
        @foreach($products as $product)
          <div class="col">
            <div class="card text-dark p-0 border-0 rounded-0 h-75">
              <img src="{{ $product->header_image_url }}" class="card-img rounded-0 h-100 img-fluid" alt="...">
              <div class="card-img-overlay px-0">
                <!-- <span class="p-2 text-light fw-500 bg-success position-absolute">Sale!</span> -->
                <div class="flex-column align-items-center position-absolute bottom-0 w-100 animated-card-buttons">
                  <div class="mb-4">
                    <button class="btn btn-light rounded-0 me-1" data-bs-toggle="tooltip" data-bs-placement="top" title=""><i class="fas fa-heart"></i></button>
                    <button class="btn btn-light rounded-0 ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Vidi detaljno"><i class="fas fa-search"></i></button>
                  </div>
                  <button class="btn btn-block btn-dark w-100 rounded-0 p-3 text-uppercase fw-500 font-size-15"><i class="fas fa-shopping-cart me-2" ></i>Dodaj u košaricu</button>
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
    </div>
  </section>

@endsection


@section('scripts')

<script>

// Card animation

$("#nav-tabContent .card, #randomItems .card").hover(function() {
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