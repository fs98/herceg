@extends('public.layouts.public')

@section('content')

<!-- Single product preview card section -->

<section id="imageCard">
    <div class="card border-0 text-dark rounded-0">
      <div class="rounded-0 d-flex flex-column align-items-center justify-content-center mt-5">
        <h1 class="card-title font-weight-bold text-uppercase">{{ $product->title }}</h5>
        <nav aria-label="breadcrumb" class="justify-content-center text-dark breadcrumb-dark">
        <ol class="breadcrumb bg-transparent mb-0">

          <li class="breadcrumb-item"><a href="{{ Route('public.products') }}" class="text-decoration-none text-dark">&#x2190; Svi proizvodi</a></li>
          <li class="breadcrumb-item active" aria-current="page"> {{ $product->category->title }}</li>
         
        </ol>
      </nav>
      </div>
    </div>
  </section>

<!-- Product preview -->

<section class="bg-white">
  <div class="container">
    <div class="row py-5 shadow-lg mb-5 py-5">
      <div class="col-lg-7">
        <img src="{{ $product->header_image_url }}" class="card-img rounded img-responsive" style="height: 31rem">
      </div>
      <div class="col-lg-5">
        <h2 class="mx-5 mt-3 font-weight-bold">{{ $product->price }} KM</h2>
        <div class="mx-5">
          @foreach($product->tags as $tag)
          <span class="badge {{ $tag->color }}">{{ $tag->name }}</span>
          @endforeach            
        </div>
        <div class="mx-5 mt-5">
          <h6 class="h5">{{ $product->description }}</h6>
        </div>
        <div class="mx-5 mt-5">
          <h5>Sastav:</h5>
          <h6>{{ $product->ingredients }}</h6>            
        </div>
        <div class="mx-5 mt-5">
          <form class="w-100" method="POST" action="{{ Route('cart.store', $product) }}" id="{{ Helper::RouteCrafter('store') . $product->id }}">
            @csrf
            <button type="button" class="btn btn-block bg-theme-color w-100 rounded-1 p-3 text-white text-uppercase fw-500 font-size-15 submit-btn" form="{{ Helper::RouteCrafter('store')  . $product->id }}"><i class="fas fa-shopping-cart mx-2 me-2" ></i>Dodaj u košaricu</button>
          </form>            
        </div>
      </div>

  </div>
  </div>
</section>


@endsection


@section('scripts')

<!-- <script src="{{ asset('js/cart.js')}}"></script> -->

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

</script>

@endsection