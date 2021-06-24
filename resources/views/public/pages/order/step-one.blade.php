@extends('public.layouts.public')

@section('content')

<section id="myCart" class="bg-white">
  <div class="container py-4 px-0">
    <div class="row">
      <div class="col-12 col-xl-8">
      <h4 class="mx-3 mt-4 fw-500">Moja košarica <span class="">({{ $totalItems }} proizvoda)</span></h4>

        @foreach ($products as $product)

        <div class="row m-3 bg-light ">
          <div class="col-3 align-items-baseline p-3">
            <img src="{{ $product->options->image }}" class="img-fluid rounded">
          </div>
          <div class="col-7 p-3 d-flex flex-column justify-content-between product-info">
              <h5>{{ $product->name }}</h5>
              <span class="fw-500">Kategorija:<span class="text-dark fw-normal ms-2"> {{ $product->options->category }}</span></span>
              <span class="fw-500">Jedinstvena cijena:<span class="text-dark fw-normal ms-2"> {{ $product->price . ' KM' }}</span></span>
              <span class="fw-500">Količina:<span class="text-dark fw-normal ms-2"> {{ $product->qty }} kom</span></span>
              <div class="d-flex flex-column mt-3">
              <span class="fw-500">Tagovi:<span class="text-dark fw-normal ms-2">{{ $product->product_tag }}</span></span>
              </div>
              <div>
                <form action="{{ Route('cart.remove', $product->rowId) }}" method="POST" class="p-0 m-0">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-secondary btn-sm rounded-pill my-2">
                    <i class="far fa-trash-alt mr-2"></i>Ukloni iz košarice
                  </button>
                </form>
              </div>
          </div>
          <div class="col-2 p-3 d-flex flex-column justify-content-between align-items-end">
            <div class="input-group-sm input-group">
              <div class="input-group-prepend">
                <form action="{{ Route('cart.decrease', [ 'id' => $product->rowId, 'quantity' => $product->qty ]) }}" method="POST" class="p-0 m-0">
                  @csrf
                  <button type="submit" class="btn btn-sm text-light rounded-0">-</button>
                </form>
              </div>
              <span class="bg-light px-2 border">{{ $product->qty }}</span>
              <div class="input-group-append">
                <form action="{{ Route('cart.increase', [ 'id' => $product->rowId, 'quantity' => $product->qty ]) }}" method="POST" class="p-0 m-0">
                  @csrf
                  <button type="submit" class="btn btn-sm text-light rounded-0">+</button>
                </form>
              </div>
            </div>
            <div>
              <span class="h5 fw-500">{{ $product->price * $product->qty }} KM</span>
            </div>
          </div>
        </div>

        @endforeach

            

        <div class="row m-3 p-3 warning bg-light">
          <span class="h6 fw-light mb-0">
            <i class="fas fa-exclamation-circle fa-lg"></i>
            Nemojte odgađati kupovinu, jer dodavanje proizvoda u košaricu ne znači i njihovo rezervisanje.
          </span>
        </div>

        {{-- <div class="row m-3">
          <div class="col-12">
            <h4 class="h4 fw-normal">Planirani datum preuzimanja</h4>
            <h6 class="h6 fw-light mt-3">Thu., 12.03. - Mon., 16.03.</h6>
          </div>
        </div>             --}}

      </div>
      <div class="col-lg-4 col-sm-12 mt-3 total">

        <form action="{{ Route('public.order.details') }}" method="POST" id="orderFirstStep">
          @csrf
          <div class="form-group mt-5 mb-4 w-100">
            <label for="fromDate">Način preuzimanja</label>
            <select name="shippingType" id="shippingType" class="w-100 border-0 bg-theme-color py-2 px-2 text-light" required>
              <option value="1">U našim prostorijama</option>
              <option value="2">Brza pošta</option>
            </select> 
          </div>
  
          <p class="h5 text-theme-color">Kada ste u mogućnosti preuzeti pošiljku?</p>
  
          <div class="form-group">
            <label for="fromDate">Od</label>
            <input type="date" id="fromDate" name="fromDate" class="form-control border-0 bg-theme-color py-2 px-2 text-light" value="{{ now()->format('Y-m-d') }}">
          </div>
          <div class="form-group">
            <label for="toDate">Do</label>
            <input type="date" id="toDate" name="toDate" class="form-control border-0 bg-theme-color py-2 px-2 text-light" value="{{ now()->addDays(3)->format('Y-m-d') }}">
          </div>
    
          
          <div class="mt-5 mt-0 p-4 bg-light checkout">
            <h5 class="fw-500 total-heading">Račun</h5>
            <h5 class="fw-light d-flex justify-content-between mt-5">Ukupno<span>{{ $totalPrice . ' KM' }}</span></h5>
            <hr>
            <button class="btn w-100 mt-2 rounded-0 py-3 text-light bg-danger" type="submit" form="orderFirstStep">Sljedeći korak</button>
          </div> 

        </form>

        {{-- <div class="mb-3 mt-3">
          <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header bg-theme-color" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-link bg-transparent btn-block text-white text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Dodaj kupon kod (opcionalno) 
                  </button>
                </h2>
              </div>
          
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  <form>
                    <div class="form-group">
                      <label for="coupon">Kupon</label>
                      <input type="text" class="form-control" id="coupon" name="coupon" aria-describedby="couponHelp">
                      <small id="couponHelp" class="form-text text-muted">Kupon kod će biti uračunat u konačnu cijenu.</small>
                    </div> 
                    <button type="submit" class="btn border-0">Potvrdi</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div> --}}

      </div>
    </div>
  </div>
</section>


@endsection

@section('scripts')
    
{{-- Sweetalert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
  $("#submit-btn").on("click", function(event) {
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
        title: 'Procesiranje..',
        text: 'Molimo sačekajte..',
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

