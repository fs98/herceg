@extends('public.layouts.public')

@section('content')

    
    <!-- Splash Screen -->

    <section id="splashScreenSection">
      
        <div class="container-fluid px-5">
            <div class="row justify-content-start">
                <div class="mt-5 col-lg-8 main-motivation-content">
                  <h1>Mi smo pioniri u uvođenju organske<br> 
                      poljoprivredne proizvodnje u Bosni i Hercegovini.</h1>
                </div>
            </div>
        </div>

    </section>


    <!-- Who we are -->

    <section id="whoWeAre">
      
      <div class="container-fluid px-5">
            <div class="row">
                <div class="mt-5 col-lg-7 text-center text-lg-left">
                  <h1>Ko smo mi?</h1>
                  <p class="mt-3 lead who-we-are-content">"Herceg” egzistira na području općine Novi Travnik i svojevrsni je pionir uvođenja organske poljoprivredne proizvodnje u Bosni i Hercegovini. Neprestano je uključena u ovaj sistem a jedna je od rijetkih koja je, zahvaljujući u prvom redu kvaliteti svojih proizvoda, već u samom startu uspjela dobiti međunarodni certifikat.
                  Nadalje, firma ”Herceg” ne samo da je uspjela sačuvati kontinuitet i nivo svoje organske proizvodnje nego je na dobrom putu da ga u doglednoj budućnosti i značajno unaprijedi. Imanje Organske Proizvodnje ”Herceg” smješteno je na pitoresknim padinama planina Vranica i Vlašića nedaleko od putnog pravca Novi Travnik - Gornji Vakuf. Stanovita tradicija u organskoj proizvodnji te izniman kvalitet proizvoda nisu prošli nezapaženo pa firma ”Herceg” već od 2003. godine posjeduje certifikat za organske proizvode dobijen od strane Švedske certifikacijske kuće KRAV International branch of the Swedish certification body, koja je članica međunarodne asocijacije IFOAM.
                  </p>
                </div>
                <div class="mt-5 col-lg-5">
                  <img src="{{ asset('/images/home/who-we-are.png') }}" width="100%" class="img-fluid">
                </div>
            </div>
        </div>

    </section>

    <!-- Icons section -->

     <section id="iconsAboutUs">
      
      <div class="container-fluid px-5">
            <div class="row mt-5 mb-5">
                <div class=" col-lg-3 col-6 mt-5 text-center">
                  <img src="{{ asset('/images/icons/bih-icon.png') }}" width="30%" class="img-fluid">
                  <p class="h3 mt-3">20 godina<br> tradicije</p>
                </div>
                <div class="col-lg-3 col-6 mt-5 text-center">
                  <img src="{{ asset('/images/icons/familiy-icon.png') }}" width="30%" class="img-fluid">
                  <p class="h3  mt-3">Porodični<br> biznis</p>
                </div>
                <div class="col-lg-3 col-6 mt-5 text-center">
                  <img src="{{ asset('/images/icons/natural-icon.png') }}" width="30%" class="img-fluid">
                  <p class="h3  mt-3">Prirodni<br> proizvodi</p>
                </div>
                <div class="col-lg-3 col-6 mt-5 text-center">
                  <img src="{{ asset('/images/icons/heart-icon.png') }}" width="30%" class="img-fluid">
                  <p class="h3  mt-3">Proizvedeno<br> sa ljubavlju</p>
                </div>
            </div>
        </div>

    </section>

    <!-- Our products section -->

    <section id="ourProductsPreview">
      
      <div class="container-fluid px-5">
            <div class="row mt-5 mb-5">
              <div class="col-lg-6 col-12">
                <h2 class="h1 text-center text-lg-left">Naši proizvodi</h2>
              </div>  
            </div>
        </div>

    </section>


@endsection


