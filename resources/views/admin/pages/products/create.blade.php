@extends('admin.layouts.main')

@section('content')
  
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">{{ __('Proizvodi') }}</h1> 

  {{-- Breadcrumb --}}
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">{{ __('Svi proizvodi') }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ __('Novi proizvod') }}</li>
    </ol>
  </nav>

  <!-- Category -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success align-middle">{{ __('Novi proizvod') }}</h6> 
    </div>
    <div class="card-body"> 

      <form action="{{ Route('admin.product.store') }}" method="POST" id="{{ Helper::RouteCrafter('store') }}" autocomplete="off" enctype="multipart/form-data">
        <div class="row">
          <div class="col-12">

            <div class="form-group">
              <label for="title" class="col-form-label">Naziv proizvoda</label>
              <label for="title" class="label-required">(obavezno)</label>
              <input id="title" value="{{ old('title') }}" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Naziv proizvoda" name="title" maxlength="128">
              
              @error('title')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="category">Kategorija</label>
              <label class="label-required" for="category">(obavezno)</label>
              <select class="form-control" id="category" name="category">
                  <option disabled="" selected="" value="">--Izaberite kategoriju--</option>
                  @foreach($categories as $index => $category)
                    <option value="{{ $category->id }}" {{ old('category') == $category->id ? "selected" : "" }}>{{ $category->title }}</option>
                  @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="price" class="col-form-label">Cijena</label>
                <label for="price" class="label-required">(obavezno)</label>
                <input id="price" value="{{ old('price') }}" type="number" class="form-control @error('price') is-invalid @enderror" placeholder="Unesite cijenu" name="price" maxlength="32">
                
                @error('price')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group">
              <label class="col-form-label" for="selected_image">Slika</label>
              <label class="col-form-label" for="selected_image">(preporučene dimezije: 1280 x 720 pixela)</label>
              <label class="label-required" for="selected_image">(obavezno)</label>
              <div class="custom-file">
                <input type="file" accept="image/png, image/jpeg, image/jpg" class="custom-file-input @error('selected_image') is-invalid @enderror" id="selected_image" name="selected_image">
                <label class="custom-file-label color-light-grey" for="selected_image">Učitajte sliku</label>
              </div>

              @error('selected_image')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form-group mt-2" id="selected_image_preview_parent" style="display: none;">
              <img class="img-fluid" id="selected_image_preview" width="300">
            </div>

            <div class="form-group">
                <label for="product_description" class="col-form-label">Opis proizvoda</label>
                <label for="product_description" class="label-required">(obavezno)</label>
                <textarea id="product_description" class="form-control textarea-custom @error('product_description') is-invalid @enderror" placeholder="Opis proizvoda" name="product_description" maxlength="1024"></textarea>
            
                @error('product_description')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="product_ingredients" class="col-form-label">Sastav</label>
                <label for="product_ingredients" class="label-required">(obavezno)</label>
                <textarea id="product_ingredients" class="form-control textarea-custom @error('product_ingredients') is-invalid @enderror" placeholder="Sastav proizvoda" name="product_ingredients" maxlength="1024"></textarea>
            
                @error('product_ingredients')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
              <label for="product_in_stock" class="col-form-label">Na stanju</label>
              <label for="product_in_stock" class="label-required">(obavezno)</label>
              <br>
              <label class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="product_in_stock" checked="" value="1" class="custom-control-input @error('product_in_stock') is-invalid @enderror"><span class="custom-control-label">Da</span>
              </label>
              <label class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="product_in_stock" value="0" class="custom-control-input @error('selected_image') is-invalid @enderror"><span class="custom-control-label">Ne</span>
              </label>
              
              @error('product_in_stock')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div> 

            <div class="form-group">
              <legend class="h6">Tags</legend>
              @foreach ($tags as $tag)
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}">
                  <label class="form-check-label">
                    <span class="badge {{ $tag->color }}">{{ $tag->name }}</span>
                  </label>
                </div>
              @endforeach
            </div>

            <div class="mt-2 float-right">
              <button type="button" id="submit-button" form="{{ Helper::RouteCrafter('store') }}" class="btn btn-success">Kreiraj</button>
            </div>
          </div>
        </div>
      </form>
    </div>  
  </div>

@endsection

@section('scripts')
    
    {{-- Image Preview --}}

    <script>
      $('#selected_image').on('change',function(e){
        //get the file name
        var fileName = e.target.files[0].name;
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
        var image = document.getElementById('selected_image_preview');
        image.src = URL.createObjectURL(event.target.files[0]);
        $("#selected_image_preview_parent").css('display', 'inherit');
      });
    </script>

    {{-- Sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
