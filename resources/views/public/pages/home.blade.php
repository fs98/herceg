@extends('public.layouts.public')

@section('content')

    
    <!-- Splash Screen -->

    <section id="splashScreenSection">
      
        <div class="container">
            <div class="row justify-content-start">
                <div class="mt-5 col-lg-9 main-motivation-content">
                  <h1>Mi smo pioniri u uvođenju organske<br> 
                      poljoprivredne proizvodnje u Bosni i Hercegovini.</h1>
                </div>
            </div>
        </div>

    </section>


    <!-- Who we are -->

    <section id="whoWeAre">
      
      <div class="container">
            <div class="row">
                <div class="mt-5 col-lg-7 text-center text-lg-left">
                  <h1>Ko smo mi?</h1>
                  <p class="mt-5 lead who-we-are-content">"Herceg” egzistira na području općine Novi Travnik i svojevrsni je pionir uvođenja organske poljoprivredne proizvodnje u Bosni i Hercegovini. Neprestano je uključena u ovaj sistem a jedna je od rijetkih koja je, zahvaljujući u prvom redu kvaliteti svojih proizvoda, već u samom startu uspjela dobiti međunarodni certifikat.
                  Nadalje, firma ”Herceg” ne samo da je uspjela sačuvati kontinuitet i nivo svoje organske proizvodnje nego je na dobrom putu da ga u doglednoj budućnosti i značajno unaprijedi. Imanje Organske Proizvodnje ”Herceg” smješteno je na pitoresknim padinama planina Vranica i Vlašića nedaleko od putnog pravca Novi Travnik - Gornji Vakuf. Stanovita tradicija u organskoj proizvodnji te izniman kvalitet proizvoda nisu prošli nezapaženo pa firma ”Herceg” već od 2003. godine posjeduje certifikat za organske proizvode dobijen od strane Švedske certifikacijske kuće KRAV International branch of the Swedish certification body, koja je članica međunarodne asocijacije IFOAM.
                  </p>
                </div>
                <div class="mt-5 col-lg-5">
                  <img src="{{ asset('/images/home/who-we-are.png') }}" width="100%" class="img-fluid">
                  <img src="{{ asset('/images/home/who-we-are-two.png') }}" width="100%" class="img-fluid mt-3">
                </div>
            </div>
        </div>

    </section>

    <!-- Icons section -->

     <section id="iconsAboutUs">
      
      <div class="container">
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
      
      <div class="container">
            <div class="row mt-5 mb-5 d-flex align-items-center">
              <div class="col-lg-6 col-12">
                <h2 class="h1 text-center text-lg-left">Naši proizvodi</h2>
                <img src="{{ asset('/images/home/home-our-products.png') }}" width="100%" class="img-fluid mt-5">
              </div>
              <div class="col-lg-6 col-12 mt-5">
                <h3 class="text-center text-lg-left">Naša alternativna apoteka</h3>
                <p class="mt-5">orem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy </p>
                <a class="btn btn-danger" href="">Pogledaj više</a>
              </div>    
            </div>

            <div class="row mt-5 mb-5 d-flex align-items-center">
              <div class="col-lg-6 col-12 mt-5">
                <h3 class="text-center text-lg-left">Prehrambeni organski proizvodi</h3>
                <p class="mt-5">orem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy </p>
                <a class="btn btn-danger" href="">Pogledaj više</a>
              </div>
              <div class="col-lg-6 col-12">
                <img src="{{ asset('/images/home/home-our-products-two.png') }}" width="100%" class="img-fluid mt-5">
              </div>    
            </div>

            <div class="row mt-5 mb-5 d-flex align-items-center">
              <div class="col-lg-6 col-12">
                <img src="{{ asset('/images/home/home-our-products-three.png') }}" width="100%" class="img-fluid mt-5">
              </div>
              <div class="col-lg-6 col-12 mt-5">
                <h3 class="text-center text-lg-left">Kozmetika</h3>
                <p class="mt-5">orem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy </p>
                <a class="btn btn-danger" href="">Pogledaj više</a>
              </div>    
            </div>
        </div>

    </section>

    <!-- Coming soon section -->

    <section id="comingSoon">
      
        <div class="container">
            <div class="row">
                <div class="col-12 mt-5">
                  <h3 class="h1 text-center text-white">Uskoro u ponudi</h3>
                  <p class="h5 text-center text-white font-weight-normal mt-5">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
                  <div class="col-lg-6 offset-lg-3 col-12">
                    <img src="{{ asset('/images/home/home-our-products-two.png') }}" width="100%" class="img-fluid mt-5 mb-5">
                  </div>  
                </div>
            </div>
        </div>

    </section>

@endsection


