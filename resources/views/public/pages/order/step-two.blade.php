@extends('public.layouts.public')

@section('content')

<section id="myCart" class="bg-white">
  <div class="container py-4">
    <div class="row">
      <div class="col-12">
        <form class="contact-form contact-form-main mt-5" id="orderSecondStep" method="POST" action="{{ Route('public.order.final') }}">
          @csrf
          <div class="form-row">
            <div class="form-group col-12 col-md-3">
              <label for="first_name">Ime</label>
              <input id="first_name" type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" placeholder="Ime">
               @error('first_name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
             
            </div>
            <div class="form-group col-12 col-md-3">
              <label for="last_name">Prezime</label>
              <input id="last_name" type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" placeholder="Prezime">
               @error('last_name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
             
            </div>
            <div class="form-group col-12 col-md-6">
              <label for="form_email">Email</label>
              <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="JohnDoe@***.com *">
              <small>Ako želite da Vam dostavimo račun putem interneta, morate upisati email adresu.</small>
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
  
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-12 col-md-6">
              <label for="form_address">Adresa *</label>
              <input id="address" type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" placeholder="">
              
              @error('address')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group col-12 col-md-6">
              <label for="form_phone">Broj telefona *</label>
              <input id="phone" type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="">
              
              @error('phone')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-12 col-md-6">
              <label for="form_city">Grad *</label>
              <input id="city" type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}" placeholder="eg. Sarajevo">
              
              @error('city')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group col-12 col-md-6">
              <label for="form_zip">Poštanski broj</label>
              <input id="zip" type="num" name="zip" class="form-control @error('zip') is-invalid @enderror" value="{{ old('zip') }}" >
              
              @error('zip')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="form-group">
            <label for="form_message">Posebne želje *</label>
            <textarea id="message" name="message" class="form-control @error('message') is-invalid @enderror" value="{{ old('message') }}" placeholder="Unesi poruku *" rows="4"></textarea>
            
            @error('message')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div> 
          <div class="form-group">
            <button class="btn btn-success rounded-1 py-3 px-5 bg-theme-color" type="button" id="submit-btn" form="orderSecondStep">Pošalji</button>
          </div>
        </form>
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

