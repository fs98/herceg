@extends('public.layouts.public')

@section('content')

<!-- Image Card -->

<section id="imageCard">
	<div class="card bg-dark border-0 text-white rounded-0">
  <img src="{{ asset('images/about/novigradsarajevo.jpg') }}" class="card-img img-responsive" height="300" alt="...">
  <div class="card-img-overlay rounded-0 d-flex flex-column align-items-center justify-content-center py-0">
    	<h1 class="card-title font-weight-bold text-uppercase">Ko smo mi?</h1>
			<nav aria-label="breadcrumb" class="justify-content-center text-white">
			  <ol class="breadcrumb bg-transparent mb-0">
			    <li class="breadcrumb-item"><a href="{{ Route('public.index') }}" class="text-decoration-none text-white">Početna</a></li>
			    <li class="breadcrumb-item active" aria-current="page">O nama</li>
			  </ol>
			</nav>
  </div>
</div>
</section>

<!-- End of Image card -->


{{-- First About Us Paragraph --}}

<style>

#paragraphSection::before {
  background-image: url('../images/about/Relief_Map_of_Bosnia_and_Herzegovina.svg.png'); 
  background-repeat: no-repeat; 
  background-size: cover;
  display: block;
  content: '';
  position: absolute;
  opacity: 5%;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
}

</style>

<section class="position-relative" id="paragraphSection">
  <div class="container">
    <div class="row py-5">
      <div class="col-12">
        <p class="h5 text-justify mb-5">
          "Herceg” egzistira na području općine Novi Travnik i svojevrsni je pionir uvođenja organske poljoprivredne 
          proizvodnje u Bosni i Hercegovini. Neprestano je uključena u ovaj sistem a jedna je od rijetkih koja je, 
          zahvaljujući u prvom redu kvaliteti svojih proizvoda, već u samom startu uspjela dobiti međunarodni certifikat.
        </p>
        <p class="h5 text-justify">
          Nadalje, firma ”Herceg” ne samo da je uspjela sačuvati kontinuitet i nivo svoje organske proizvodnje nego je na 
          dobrom putu da ga u doglednoj budućnosti i značajno unaprijedi. Imanje Organske Proizvodnje ”Herceg” 
          smješteno je na pitoresknim padinama planina Vranica i Vlašića nedaleko od putnog pravca Novi Travnik - 
          Gornji Vakuf. Stanovita tradicija u organskoj proizvodnji te izniman kvalitet proizvoda nisu prošli nezapaženo pa 
          firma ”Herceg” već od 2003. godine posjeduje certifikat za organske proizvode dobijen od strane Švedske 
          certifikacijske kuće KRAV International branch of the Swedish certification body, koja je članica međunarodne 
          asocijacije IFOAM.
        </p>
      </div>
    </div>  
    <div class="row">
      <div class="col-6 col-xl-3 pb-5 text-center">
        <img src="https://via.placeholder.com/300x300" alt="tim" height="200" class="img-responsive rounded-circle border-2">
        <h5 class="mt-3">Sejad Herceg</h5>
        <h6 class="text-theme-color text-uppercase">Osnivač</h6>
      </div>
      <div class="col-6 col-xl-3 pb-5 text-center">
        <img src="https://via.placeholder.com/300x300" alt="tim" height="200" class="img-responsive rounded-circle border-2">
        <h5 class="mt-3">Anisa Herceg</h5>
        <h6 class="text-theme-color text-uppercase">Proizvodnja</h6>
      </div>
      <div class="col-6 col-xl-3 pb-5 text-center">
        <img src="https://via.placeholder.com/300x300" alt="tim" height="200" class="img-responsive rounded-circle border-2">
        <h5 class="mt-3">Osman Herceg</h5>
        <h6 class="text-theme-color text-uppercase">Menadžment</h6>
      </div>
      <div class="col-6 col-xl-3 pb-5 text-center">
        <img src="https://via.placeholder.com/300x300" alt="tim" height="200" class="img-responsive rounded-circle border-2
        ">
        <h5 class="mt-3">Emina Herceg</h5>
        <h6 class="text-theme-color text-uppercase">Sales repesentative</h6>
      </div>
    </div>
    <div class="row">  
      <div class="col-12">  
        <p class="h5 text-justify mb-5">
          Organska Proizvodnja ”Herceg” je od svog osnutka nadaleko najbolji primjer kako se treba pristupiti organskoj poljoprivredi i kako svoj proizvod prezentirati i predstaviti diljem svijeta. Osnovna orijentacija firme jest organska proizvodnja i plantažni uzgoj nevena – u farmaciji veoma cijenjene biljne kulture, te na bazi takvog proizvoda produkcija čajnih preparata, mehlema, ljekovitih krema i ulja širokog upotrebnog spektra. Imanje raspolaže vlastitim adekvatnim prostorom za sušenje, zamrzavanje i doradu sirovine (na potpuno prirodan način), a posjeduje i prostor na kojem se može instalirati sva potrebna dodatna oprema.
        </p>
        <p class="h5 text-justify">
          Uz plantažni uzgoj bilja, proizvodnju biljnih kozmetičkih preparata, firma Herceg se bavi organskom proizvodnjom nadaleko cijenjenih prehrambenih poljoprivrednih kultura (organske bašte), te plantažnim uzgojem maline i drugih raznih poljoprivrednih dobara. Prisustvo na većini specijaliziranih sajmova u zemlji i regionu rezultiralo je činjenicom da svi proizvodi Organske Proizvodnje Herceg danas jesu i cijenjeni, prepoznatljivi i traženi od velikog broja uvaženih kupaca, klijenata, kako u BiH, tako i van nje. HERCEG proizvodi su rezultat rada već desetljećima sa tradicijonalnom stogodišnjom recepturom koja se prenosi iz generacije u generaciju
        </p>
      </div>
    </div>
    <div class="row mb-5">
      <div class="col-12">
        <!-- Swiper -->
        <div class="swiper-container w-100 shops-swiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="{{ asset('images/about/poslovnicentar.jpg') }}" height="350" class="img-responsive">
              <h4 class="mt-3">Poslovni centar 96, FIS Vitez</h4>
            </div>
            <div class="swiper-slide">
              <img src="{{ asset('images/about/novigradsarajevo.jpg') }}" height="350" class="img-responsive">
              <h4 class="mt-3">Kurta Schorka 7, Novi Grad Sarajevo</h4>
            </div>
            <div class="swiper-slide">
              <img src="https://via.placeholder.com/750x400" height="350" class="img-responsive">
              <h4 class="mt-3">Fake Street 6, Imaginary City</h4>
            </div> 
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- End of First About Us Paragraph --}}


{{-- About Us --}}
<section id="aboutUsSection" class="position-relative bg-theme-color">
  <div class="container py-5"> 
    <div class="row mt-5 no-gutters" data-aos="fade-up">
      <div class="col-12 col-md-6 mb-5 col-lg-3 text-center">
        <div>
          <span class="font-weight-bold h1"><span class="count">20</span> +</span>
          <h5 class="font-weight-light">{{ __('godina postojanja') }}</h5>
        </div>
      </div>
      <div class="col-12 col-md-6 mb-5 col-lg-3 text-center">
        <div>
          <span class="font-weight-bold h1"><span class="count">30</span> +</span>
          <h5 class="font-weight-light">{{ __('proizvoda') }}</h5>
        </div>
      </div>
      <div class="col-12 col-md-6 mb-5 col-lg-3 text-center">
        <div>
          <span class="font-weight-bold h1"><span class="count">10</span></span>
          <h5 class="font-weight-light">{{ __('poslovnica') }}</h5>
        </div>
      </div>
      <div class="col-12 col-md-6 mb-5 col-lg-3 text-center">
        <div>
          <span class="font-weight-bold h1"><span class="count">100</span> +</span>
          <h5 class="font-weight-light">{{ __('sretnih kupaca') }}</h5>
        </div>
      </div>
    </div>
  </div>
</section> 

@endsection

@section('scripts')
<script>
var counted = 0;
$(window).scroll(function() {

var oTop = $('#aboutUsSection').offset().top - window.innerHeight;
if (counted == 0 && $(window).scrollTop() > oTop) {
  $('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 2500,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});
  counted = 1;
}

});
</script>
@endsection