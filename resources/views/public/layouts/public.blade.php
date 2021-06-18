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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/emerald-theme.css') }}">
</head>
<body>

    {{-- Header --}}

    <header>

      <!-- Top part of header -->
    
      <section id="topHeader" class="border-bottom">
        <div class="container">
          <div class="row d-flex flex-wrap justify-content-between">
            <div class="col-xl-12 d-flex justify-content-between">
    
              <!-- Left side -->
    
              <div class="d-flex align-items-center">
                <div class="py-1 pr-2 mr-2 border-right">
                  <a class="text-dark text-decoration-none">
                    <i class="fas fa-envelope fa-xs text-theme-color"></i>
                    <span class="">emina@herceg.ba</span>
                  </a> 
                </div> 
                <div class="py-1 pr-2">
                  <a class="text-dark text-decoration-none">
                    <i class="fas fa-phone fa-xs text-theme-color"></i>
                    <span class="">00-62-658-658</span>
                  </a>
                </div>						
              </div>
    
              <!-- Right side -->
    
              <div class="d-flex">
                <a href="#" class="text-dark text-decoration-none ml-2 p-2 border-right">
                  <i class="far fa-heart text-theme-color"></i>
                  Favoriti
                </a>
                <a href="#" class="text-dark text-decoration-none p-2 d-none d-sm-none d-md-none d-lg-block d-xl-block border-right">
                  <i class="fas fa-shopping-basket text-theme-color"></i>
                  Moja košarica
                </a>
                <a href="#" class="text-dark text-decoration-none px-2 py-2 pr-0 d-none d-sm-none d-md-none d-lg-block d-xl-block border-right">
                  <i class="fas fa-receipt text-theme-color"></i>
                  Naruči
                </a> 
              </div>	
    
    
            </div>
            <!-- /.col -->					
          </div>	
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </section>
    
      <!-- End of top part of header -->
    
      <!-- Middle part of header -->
    
      <section id="middleHeader">
        <div class="container">
          <div class="row align-items-center my-3">
    
            <!-- Logo -->
    
            <div class="col-lg-5 d-flex align-items-center justify-content-between align-self-end">
              <div class="align-self-end d-flex">
                <div id="logoIcon">
                <img src="{{ asset('images/logo/logo-herceg.png') }}" alt="navbar-brand-logo" width="130">
                </div>
                <div class="ml-2 d-none d-xl-block" id="logo">
                  <h3 class="mb-0">OP<span class="colored-text">Herceg</span></h3>
                  <span class="pt-0 text-uppercase text-wide">20 godina tradicije</span>
                </div>
              </div>
              <div class="align-self-end d-flex d-lg-none shopping-cart">
                <a class="text-center text-decoration-none" href="">
                  <i class="fa fa-shopping-basket fa-lg"></i>
                  <div class="text-center text-uppercase text-dark"><span class="fw-500">Shopping Cart</span></div>
                </a>
              </div>
            </div>				
    
            <!-- Search -->
    
            <div class="col-lg-5 p-3 p-sm-3 p-md-3 p-lg-0 align-self-end" id="search">
              <div class="input-group mb-0">
                <input type="text" class="form-control rounded-0" placeholder="{{ __("Pretražite ovdje npr. 'krema'") }}" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="input-group-text rounded-0 h-100 btn" id="basic-addon2"><i class="fas fa-search px-1 text-light"></i></button>
                </div>
              </div>
            </div>
    
            <!-- Shopping Cart [big screen] -->
    
            <div class="col-lg-2 d-none d-lg-flex justify-content-end align-self-end shopping-cart">
              <a class="text-center text-decoration-none" href="">
                <i class="fa fa-shopping-basket fa-lg"></i>
                <div class="text-center text-uppercase text-dark"><span class="fw-500">Shopping Cart</span></div>
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
        <nav class="navbar navbar-expand-lg navbar-dark fw-500 py-2 py-lg-0">
          <div class="container">
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item pr-xl-2 pr-lg-2 px-md-0 px-sm-0 px-0">
                  <a class="nav-link lead" aria-current="page" href="{{ Route('public.index') }}" id="indexPage">{{ __('Početna') }}</a>
                </li>
                <li class="nav-item dropdown px-xl-2 px-lg-2 px-md-0 px-sm-0 px-0">
                  <a class="nav-link dropdown-toggle lead" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ __('Alternativna apoteka') }}
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item fw-500 py-2" href="#">Sirupi</a></li> 
                  </ul>
                </li>
                <li class="nav-item dropdown px-xl-2 px-lg-2 px-md-0 px-sm-0 px-0">
                  <a class="nav-link dropdown-toggle lead" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ __('Prehrambeni proizvodi') }}
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item fw-500 py-2" href="#">Džemovi</a></li>   
                  </ul>
                </li> 		        		        
                <li class="nav-item px-xl-2 px-lg-2 px-md-0 px-sm-0 px-0">
                  <a class="nav-link lead" href="#">{{ __('Kozmetika') }}</a>
                </li> 
                <li class="nav-item px-xl-2 px-lg-2 px-md-0 px-sm-0 px-0">
                  <a class="nav-link lead" href="{{ Route('public.about') }}">{{ __('O nama') }}</a>
                </li>
                <li class="nav-item pl-xl-2 pl-lg-2 px-md-0 px-sm-0 px-0">
                  <a class="nav-link lead" href="#">{{ __('Kontakt') }}</a>
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
              <div class="col-12 col-md-6 col-lg-3 d-flex flex-column align-items-center align-items-md-start">
                <h4>Main menu</h4>
                <a href="" class="text-decoration-none text-muted">Home</a>
                <a href="" class="text-decoration-none text-muted">Our services</a>
                <a href="" class="text-decoration-none text-muted">Our products</a>
                <a href="" class="text-decoration-none text-muted">About us</a>
                <a href="" class="text-decoration-none text-muted">Contact us</a>
              </div>
              <div class="col-12 mt-3 col-md-6 mt-md-0 col-lg-3 d-flex flex-column align-items-center align-items-md-start">
                <h4>Important Info</h4> 
                <a href="" class="text-decoration-none text-muted">Delivery</a>
                <a href="" class="text-decoration-none text-muted">Returns</a>
                <a href="" class="text-decoration-none text-muted">Services</a>
                <a href="" class="text-decoration-none text-muted">Discount</a>
                <a href="" class="text-decoration-none text-muted">Special offer</a>
              </div>
              <div class="col-12 mt-3 col-md-6 col-lg-3 mt-lg-0 d-flex flex-column align-items-center align-items-md-start">
                <h4>Useful Links</h4>
                <a href="" class="text-decoration-none text-muted">Site Map</a>
                <a href="" class="text-decoration-none text-muted">Search</a>
                <a href="" class="text-decoration-none text-muted">Advanced Search</a>
                <a href="" class="text-decoration-none text-muted">Suppliers</a>
                <a href="" class="text-decoration-none text-muted">FAQ</a>
              </div>
              <div class="col-12 mt-3 col-md-6 col-lg-3 mt-lg-0 d-flex flex-column align-items-center align-items-md-start">
                <h4>Contact Us</h4>
                <a href="" class="text-decoration-none text-muted">Home</a>
                <a href="" class="text-decoration-none text-muted">Our services</a>
                <a href="" class="text-decoration-none text-muted">Our products</a>
                <a href="" class="text-decoration-none text-muted">About us</a>
                <a href="" class="text-decoration-none text-muted">Contact us</a>
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