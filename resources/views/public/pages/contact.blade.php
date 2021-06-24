@extends('public.layouts.public')

@section('content')


	<!-- Image Card -->

	<section id="imageCard">
		<div class="card bg-dark border-0 text-white rounded-0">
		  <img src="{{ asset('images/kontakt/contact.jpg') }}" class="card-img img-responsive" alt="..." height="300">
		  <div class="card-img-overlay rounded-0 d-flex flex-column align-items-center justify-content-center py-0">
	    	<h1 class="card-title font-weight-bold text-uppercase">Kontaktirajte nas</h5>
	    	<nav aria-label="breadcrumb" class="justify-content-center text-white">
			  <ol class="breadcrumb bg-transparent mb-0">
			    <li class="breadcrumb-item"><a href="{{ Route('public.index') }}" class="text-decoration-none text-white">Početna</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Kontakt</li>
			  </ol>
			</nav>
		  </div>
		</div>
	</section>

	<!-- End of Image card -->



	<section id="loginAndRegister" class="bg-white">
		<div class="container py-5">
			<div class="row py-5">

				<!-- Login -->

				<div class="col-12 col-md-6 order-md-1 order-2">
					<h5 class="h4 text-center text-md-start">Gdje se nalazimo</h5>
					<hr class="border-0">
					 <div id="map" style="height:530px;"></div>
				</div>

				<!-- Register -->

				<div class="col-12 mt-3 col-md-6 mt-md-0 order-md-2 order-1">
					<h5 class="h4 text-center text-md-start">Ispunite formu</h5>
					<hr class="border-0">
					 	<form method="POST" id="contactForm" action="{{ Route('public.contact.store') }}">
              @csrf
		          <div class="mb-4">
		            <label for="firstName" class="col-form-label font-size-14">Ime: <span class="text-danger">*</span></label>
		            <input type="text" class="form-control rounded-0" placeholder="Ime" id="firstName" name="firstName">
		          </div>
		          <div class="mb-4">
		            <label for="lastName" class="col-form-label font-size-13">Prezime: <span class="text-danger">*</span></label>
		            <input type="text" class="form-control rounded-0" id="lastName" name="lastName" placeholder="Prezime">
		          </div>
		          <div class="mb-4">
		            <label for="phoneNumber" class="col-form-label font-size-13">Broj telefona: <span class="text-danger">*</span></label>
		            <input type="text" class="form-control rounded-0" id="phoneNumber" name="phoneNumber" placeholder="Broj telefona">
		          </div>
		          <div class="mb-4">
		            <label for="password" class="col-form-label font-size-13">Email: <span class="text-danger">*</span></label>
		            <input type="email" class="form-control rounded-0" id="email" name="email" placeholder="Email">
		          </div>
		          <div class="form-group">
                <label for="question" class="col-form-label">Vaša poruka</label>
                <textarea id="question" class="form-control textarea-custom @error('question') is-invalid @enderror" placeholder="Vaša poruka" name="question" maxlength="1024"></textarea>
            
                @error('question')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
		          <div class="mb-2 mt-4 d-flex justify-content-center">
		       		 <button type="button" class="btn rounded-0 font-size-13 py-2 px-4 text-light" id="loginButton" form="contactForm">Pošalji</button>
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
  $("#loginButton").on("click", function(event) {
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

<script>
    function initMap() {
      var centrala = {lat: 44.174620, lng: 17.759190};
      var centerPoint = {lat: 44.172584, lng: 17.757464};
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: centerPoint
      });
      var contentString1 = '<div id="content">'+
          '<div id="siteNotice">'+
          '</div>'+
          '<h1 id="firstHeading" class="firstHeading">Trgovina Tom</h1>'+
          '<div id="bodyContent">'+
          '<p>Trgovina Tom<br>Bila bb<br>Bosnia & Herzegovina</p>'+ 
          '<p><a target="_blank" href="https://www.google.com/maps/place/Bo%C5%A1njak+Commerce+Centrala/@44.1745967,17.7569901,17z/data=!3m1!4b1!4m5!3m4!1s0x475f03d5be8a0f27:0x15f0038c44b12e53!8m2!3d44.1745967!4d17.7591788">'+
          'Pogledaj na Google Mapi</a>'+
          '</p>'+
          '<p>Tom Trgovina se bavi prodajom domaćih proizvoda<br>'+
          'Značajan dio proizvoda izvozi se u zemlje Europske unije.<br></p>'+
          '<p></p>'+      
          '</div>'+
          '</div>';
      var contentString2 = '<div id="content">'+
          '<div id="siteNotice">'+
          '</div>'+
          '<h1 id="firstHeading" class="firstHeading">Bošnjak Commerce Proizvodnja</h1>'+
          '<div id="bodyContent">'+
          '<p>Bošnjak Commerce Proizvodnja<br>Tvornička 1, Vitez<br>Bosnia & Herzegovina</p>'+ 
          '<p><a target="_blank" href="https://www.google.com/maps/place/Bo%C5%A1njak+Commerce+Proizvodnja/@44.153877,17.7637829,17z/data=!3m1!4b1!4m5!3m4!1s0x475f033ea8329947:0x2c88448afdd1f928!8m2!3d44.153877!4d17.7659716">'+
          'Pogledaj na Google Mapi</a> '+
          '</p>'+
          '</div>'+
          '</div>';
      var infowindow1 = new google.maps.InfoWindow({
    content: contentString1
  });
  var infowindow2 = new google.maps.InfoWindow({
    content: contentString2
  });
  var marker1 = new google.maps.Marker({
    position: centrala,
    map: map,
    icon: "http://localhost:3000/front/images/tom-location.svg",
    title: 'Trgovina Tom'
  });
  marker1.addListener('click', function() {
    infowindow1.open(map, marker1);
  });
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDobyETeoVl2PU3AZ_2pjucSrfSQHOWwfQ&callback=initMap"></script>

@endsection