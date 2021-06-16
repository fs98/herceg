@extends('public.layouts.public')

@section('content')

    
  <!-- Splash section -->

  <section id="splashAboutUs">
    <div class=""></div>
  </section>


  <!-- Counter section -->
 
  <section id="counterAbout" class="text-dark py-5">
    <div class="container">
      <div class="row justify-content-center text-center">
       <div class="col-12">
          <h1 class="pb-3"></h1>
       </div>
       <div class="col-lg-3 col-12">
          <span id="count1" class="h1 text-danger"></span>
          <p class="h5">Godina postojanja</p>
       </div>
       <div class="col-lg-3 col-12">
          <span id="count2" class="h1 text-danger"></span>
          <span class="h1 text-danger">+</span>
          <p class="h5">Proizvoda</p>
       </div>
       <div class="col-lg-3 col-12">
          <span id="count3" class="h1 text-danger"></span>
          <p class="h5">Poslovnica</p>
       </div>
       <div class="col-lg-3 col-12">
          <span id="count4" class="h1 text-danger"></span>
          <span class="h1 text-danger" >+</span>
          <p class="h5">Sretnih kupaca</p>
        </div>
      </div>
    </div>
  </section>


<!-- Content section -->

  <section>
    <div class="container">
      <div class="row mb-5">
        <div class="col-12">
          <p>"Herceg” egzistira na području općine Novi Travnik i svojevrsni je pionir uvođenja organske poljoprivredne 
            proizvodnje u Bosni i Hercegovini. Neprestano je uključena u ovaj sistem a jedna je od rijetkih koja je, 
            zahvaljujući u prvom redu kvaliteti svojih proizvoda, već u samom startu uspjela dobiti međunarodni certifikat.
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
    </div>
  </section>

  <!-- Secon splash section -->

  <section id="secondSplashAbouUs">
   
  </section>


  <!-- Second content section -->

  <section>
    <div class="container">
      <div class="row mt-5 mb-5">
        <div class="col-12">
          <p>Organska Proizvodnja ”Herceg” je od svog osnutka nadaleko najbolji primjer kako se treba pristupiti organskoj poljoprivredi i kako svoj proizvod prezentirati i predstaviti diljem svijeta. Osnovna orijentacija firme jest organska proizvodnja i plantažni uzgoj nevena – u farmaciji veoma cijenjene biljne kulture, te na bazi takvog proizvoda produkcija čajnih preparata, mehlema, ljekovitih krema i ulja širokog upotrebnog spektra. Imanje raspolaže vlastitim adekvatnim prostorom za sušenje, zamrzavanje i doradu sirovine (na potpuno prirodan način), a posjeduje i prostor na kojem se može instalirati sva potrebna dodatna oprema.
          Uz plantažni uzgoj bilja, proizvodnju biljnih kozmetičkih preparata, firma Herceg se bavi organskom proizvodnjom nadaleko cijenjenih prehrambenih poljoprivrednih kultura (organske bašte), te plantažnim uzgojem maline i drugih raznih poljoprivrednih dobara. Prisustvo na većini specijaliziranih sajmova u zemlji i regionu rezultiralo je činjenicom da svi proizvodi Organske Proizvodnje Herceg danas jesu i cijenjeni, prepoznatljivi i traženi od velikog broja uvaženih kupaca, klijenata, kako u BiH, tako i van nje.
          HERCEG proizvodi su rezultat rada već desetljećima sa tradicijonalnom stogodišnjom recepturom koja se prenosi iz generacije u generaciju
          </p>
        </div>
      </div>
    </div>
  </section>


  <!-- Our team section -->

  <section>
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-3 col-12 our-team">
          <img src="{{ asset('/images/home/who-we-are.png') }}" class="img-fluid">
          <h5 class="text-center">Sejad Herceg</h6>
          <p>Osnivač</p>
        </div>
        <div class="col-lg-3 col-12 our-team">
          <img src="{{ asset('/images/home/who-we-are.png') }}"  class="img-fluid">
          <h5>Sejad Herceg</h6>
          <p>Osnivač</p>
        </div>
        <div class="col-lg-3 col-12 our-team">
          <img src="{{ asset('/images/home/who-we-are.png') }}"  class="img-fluid">
          <h5>Sejad Herceg</h6>
          <p>Osnivač</p>
        </div>
        <div class="col-lg-3 col-12 our-team">
          <img src="{{ asset('/images/home/who-we-are.png') }}"  class="img-fluid">
          <h5>Sejad Herceg</h6>
          <p>Osnivač</p>
        </div>
      </div>
    </div>
  </section>

<!-- Script for counter -->
  <script>
    document.addEventListener("DOMContentLoaded", () => {
     function counter(id, start, end, duration) {
      let obj = document.getElementById(id),
       current = start,
       range = end - start,
       increment = end > start ? 1 : -1,
       step = Math.abs(Math.floor(duration / range)),
       timer = setInterval(() => {
        current += increment;
        obj.textContent = current;
        if (current == end) {
         clearInterval(timer);
        }
       }, step);
     }
     counter("count1", 0, 20, 3000);
     counter("count2", 0, 30, 3000);
     counter("count3", 0, 10, 3000);
     counter("count4", 0, 100, 3000);
    });
  </script>
@endsection


