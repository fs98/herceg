@extends('admin.layouts.main')

@section('content')
  
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">{{ __('Kategorije') }}</h1> 

  {{-- Breadcrumb --}}
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">{{ __('Sve kategorije') }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ __('Nova kategorija') }}</li>
    </ol>
  </nav>

  <!-- Category -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success align-middle">{{ __('Nova kategorija') }}</h6> 
    </div>
    <div class="card-body"> 

      <form action="{{ Route('admin.category.store') }}" method="POST" id="newCategory" autocomplete="off" enctype="multipart/form-data">
        <div class="form-group">
          <label for="category_title" class="col-form-label">{{ ('Naziv') }}</label>
          <label for="category_title" class="label-required">{{ ('(obavezno)') }}</label>
          <input id="category_title" type="text" class="form-control" placeholder="Naziv kategorije" name="category_title" maxlength="128">
        </div>  
        <div class="form-group">
          <label class="col-form-label" for="selected_image">{{ __('Slika') }}</label>
          <label class="label-required" for="selected_image">{{ __('(obavezno)') }}</label>
          <div class="custom-file">
            <input type="file" accept="image/png, image/jpeg, image/jpg" class="custom-file-input" id="selected_image" name="selected_image">
            <label class="custom-file-label color-light-grey" for="selected_image">{{ __('Učitajte sliku') }}</label>
          </div>
        </div>
        <div class="form-group mt-2" id="selected_image_preview_parent" style="display: none;">
          <img class="img-fluid" id="selected_image_preview" width="300">
        </div> 
        <div class="mt-2">
          <button type="button" id="submit-button" form="newCategory" class="btn btn-secondary">Kreiraj</button>
        </div>
      </form>
    </div>  
  </div>

@endsection

@section('scripts')
    
    {{-- Image Preview --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

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
