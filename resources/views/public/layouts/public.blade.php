<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
    <script src="{{ asset('js/auto-write.js') }}"></script> 

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/algolia.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/emerald-theme.css') }}">
</head>
<body>

    {{-- Header --}}

    <header>
    
      <!-- End of top part of header -->
    
      <!-- Middle part of header -->
    
      <section id="middleHeader">
        <div class="container">
          <div class="row align-items-center my-4">
    
            <!-- Logo -->
    
            <div class="col-lg-2 d-flex align-items-center justify-content-between align-self-end">
              <div class="align-self-end d-flex">
                <div id="logoIcon">
                <a href="{{ Route('public.index') }}">
                <img src="{{ asset('images/logo/logo-herceg.png') }}" alt="navbar-brand-logo" width="130">
                </a>
                </div> 
              </div> 
            </div>				

            <!-- Left side -->
            <div class="col-lg-4 p-3 p-sm-3 p-md-3 p-lg-0">
              <div class="d-flex align-items-center justify-content-center">
                <div class="py-1 pr-2 mr-2 border-right">
                  <a class="text-dark text-decoration-none">
                    <i class="fas fa-phone-alt fa-lg text-red shadow-lg"></i>
                    <span class="h6 font-weight-bold pl-1">00-62-658-658</span>
                  </a>
                </div>
                <div class="py-1 pl-1 pr-2">
                  <a class="text-dark text-decoration-none">
                    <i class="fas fa-envelope fa-lg text-theme-color"></i>
                    <span class="h6 font-weight-bold pl-1">emina@herceg.ba</span>
                  </a>
                </div>
              </div>
            </div>
    
            <!-- Search -->
    
            <div class="col-lg-4 p-3 p-sm-3 p-md-3 p-lg-0" id="search">
              <form class="d-flex" id="aa-input-container" action="{{ Route('public.search') }}" method="GET">
                <div class="input-group mb-0">
                  <input type="search" id="aa-search-input" class="form-control rounded-left border-secondary" aria-describedby="basic-addon2" name="search" required>
                  <div class="input-group-append rounded-right">
                    <button type="submit" class="input-group-text bg-theme-color border-theme-color h-100 btn rounded-right" id="basic-addon2"><i class="fas fa-search px-1 text-light"></i></button>
                  </div>
                </div>
              </form>
            </div>
              
            <!-- Shopping Cart [big screen] -->
    
            <div class="col-lg-1 offset-lg-1 d-none d-lg-flex justify-content-end align-self-end shopping-cart border-left">
              <a class="text-center text-decoration-none" href="">
                <i class="fa fa-shopping-basket fa-3x"></i>
                <sup class="bg-red rounded-circle text-white px-2 py-1 ml-n3">2</sup>
              </a>
            </div>
    
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </section>
    
      <!-- End of middle part of header -->
    
      <!-- Bottom part of header -->
    
      <section id="bottomHeader">
        <nav class="navbar navbar-expand-lg navbar-dark fw-500 py-2 py-lg-0" style="background: linear-gradient(115deg,#FF4E50, #F9D423);">
          <div class="container">
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item pr-xl-2 pr-lg-2 px-md-0 px-sm-0 px-0">
                  <a class="nav-link lead text-uppercase fw-500" aria-current="page" href="{{ Route('public.index') }}" id="indexPage">{{ __('Početna') }}</a>
                </li>
                <li class="nav-item px-xl-2 px-lg-2 px-md-0 px-sm-0 px-0">
                  <a class="nav-link lead text-uppercase fw-500" href="{{ Route('public.products', ['category_id' => '4'])}}">{{ __('Prehrambeni proizvodi') }}</a>
                </li>
                <li class="nav-item px-xl-2 px-lg-2 px-md-0 px-sm-0 px-0">
                  <a class="nav-link lead text-uppercase fw-500" href="{{ Route('public.products', ['category_id' => '3'])}}">{{ __('Alternativna apoteka') }}</a>
                </li> 		        		        
                <li class="nav-item px-xl-2 px-lg-2 px-md-0 px-sm-0 px-0">
                  <a class="nav-link lead text-uppercase fw-500" href="{{ Route('public.products', ['category_id' => '2'])}}">{{ __('Kozmetika') }}</a>
                </li> 
                <li class="nav-item px-xl-2 px-lg-2 px-md-0 px-sm-0 px-0">
                  <a class="nav-link lead text-uppercase fw-500" href="{{ Route('public.about') }}">{{ __('O nama') }}</a>
                </li>
                <li class="nav-item pl-xl-2 pl-lg-2 px-md-0 px-sm-0 px-0">
                  <a class="nav-link lead text-uppercase fw-500" href="{{ Route('public.contact') }}">{{ __('Kontakt') }}</a>
                </li>
              </ul>
            </div>  
          </div>
        </nav>
      </section>
    
      <!-- End of bottom part of header -->
    
    </header>


  <!-- Main Content -->

        <main>
            
            @yield('content')
        
        </main>

  <!-- End of Main Content -->


        <!-- Newsletter Section -->

        <section class="bg-light" id="newsletterSection">
          <div class="container">
            <div class="row d-flex justify-content-center py-5">
              <div class="col-auto text-center">
                <span class="h3 text-uppercase fw-500">Želite li dobijati obavijesti o akcijama?</span>
                <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
                <div class="input-group">
                  <input type="text" class="form-control rounded-0" placeholder="Your email" aria-label="Recipient's username" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn text-light fw-500 text-uppercase rounded-0" type="button">Pretplati se</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- End of Newsletter Section -->

        <!-- Footer -->

        <footer class="bg-dark text-white">
          <div class="container">
            <div class="row py-5">
              <div class="col-12 col-md-6 col-lg-4 d-flex flex-column align-items-center">
                <div id="logoIcon">
                <a href="{{ Route('public.index') }}">
                <img src="{{ asset('images/logo/logo-herceg.png') }}" alt="navbar-brand-logo" width="130">
                </a>
                </div>
                <div class="ml-2" id="logo">
                  <h3 class="mb-0 tight-text">{{ __('OP') }}<span class="colored-text">{{ __('Herceg') }}</span></h3>
                  <span class="pt-0 text-uppercase text-wide">20 godina tradicije</span>
                </div>
              </div>
              <div class="col-12 mt-3 col-md-6 mt-md-0 col-lg-4 d-flex flex-column align-items-center">
               <h4>{{ __('Korisni linkovi') }}</h4>
                <a href="" class="text-decoration-none text-muted">{{ __('Početna') }}</a>
                <a href="" class="text-decoration-none text-muted">{{ __('Naši proizvodi') }}i</a>
                <a href="" class="text-decoration-none text-muted">{{ __('O nama') }}</a>
                <a href="" class="text-decoration-none text-muted">{{ __('Kontaktirajte nas') }}</a>
              </div>
              <div class="col-12 mt-3 col-md-6 col-lg-4 mt-lg-0 d-flex flex-column align-items-center">
                <h4>{{ __('Pravila privatnosti') }}</h4>
                <a href="" class="text-decoration-none text-muted">{{ __('Faq?') }}</a>
                <a href="" class="text-decoration-none text-muted">{{ __('Kontakt') }}</a>
                <a href="" class="text-decoration-none text-muted">O nama</a>
                <a href="" class="text-decoration-none text-muted">Kontaktirajte nas</a>
              </div>
            </div>
          </div>
          <hr>
          <div class="container pb-2">
            <div class="row py-2 text-center text-muted pb-3">
              <div class="col-12">
                <span>Copyright &copy; Herceg {{ now()->year }}</span>
              </div>
            </div>
          </div>
        </footer>

        <!-- End of footer -->


   <!-- Scripts -->

      @yield('scripts')

</body>
</html>