@extends('public.layouts.public')

@section('content')

  <!-- Single product card section -->
 
  <section id="randomItems" class="pt-4 bg-white">
    <div class="container my-4">
      <div class="row">
        @foreach($products as $product)
          <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-5" style="height: 35rem">
             <div class="card text-dark p-0 border-0 h-100 shadow-lg bg-light">
              <img src="{{ $product->header_image_url }}" class="card-img rounded img-responsive h-75" alt="...">
              <div class="card-img-overlay px-0">
                  @if($product->tags->first())
                    <span class="badge rounded-0 py-2 px-3 {{ $product->tags->first()->color }}">
                      <span class="h5">{{ $product->tags->first()->name }}</span>
                    </span>    
                  @endif
                <!-- <span class="p-2 text-light fw-500 bg-success position-absolute">Sale!</span> -->
                <div class="flex-column align-items-center position-absolute bottom-0 w-100 animated-card-buttons">
                  <div class="mb-4">
                    <a class="btn btn-light rounded-0 ms-1 bg-dark" href="{{ Route('public.products.show', ['category' => $product->category, 'product' => $product->slug]) }}" title="Vidi detaljno"><i class="fas fa-2x fa-search rounded text-theme-color"></i></a>
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
    </div>
  </section>

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