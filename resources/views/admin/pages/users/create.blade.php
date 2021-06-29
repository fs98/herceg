@extends('admin.layouts.main')

@section('content')
  
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">{{ __('Novi korisnik') }}</h1> 

  {{-- Breadcrumb --}}
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">{{ __('Svi korisnici') }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ __('Novi korisnik') }}</li>
    </ol>
  </nav>

  <!-- Category -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success align-middle">{{ __('Novi korisnik') }}</h6> 
    </div>
    <div class="card-body"> 

      <form method="POST" id="userForm" action="{{ route('admin.user.store') }}">
        @csrf

        <div class="form-group row">
          
          <div class="col-xl-4 col-md-6 col-12">
              <label for="name" class="col-form-label">{{ __('Ime') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-xl-4 col-md-6 col-12">
              <label for="email" class="col-form-label">{{ __('E-Mail adresa') }}</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
  
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
        </div>

        <div class="form-group row">
          <div class="col-xl-4 col-md-6 col-12">
              <label for="password" class="col-form-label">{{ __('Lozinka') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
          
          <div class="col-xl-4 col-md-6 col-12">
              <label for="password-confirm" class="col-form-label">{{ __('Ponovi lozinku') }}</label>
                <input id="password-confirm" type="password" class="form-control @error('password-confirm') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6">
                <button type="button" form="userForm" class="btn btn-success" id="submit-button">
                    {{ __('Registruj') }}
                </button>
            </div>
        </div>
    </form>
    </div>  
  </div>

@endsection

@section('scripts')
    
    {{-- Image Preview --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    {{-- Sweetalert --}}
    <script>
      $("#submit-button").on("click", function(event) {
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
            title: 'Processiranjee..',
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
