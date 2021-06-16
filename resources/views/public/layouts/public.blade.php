<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>

    <!-- Header -->

        <header>

          <!-- Navigational bar -->
            <nav class="navbar navbar-expand-lg navbar-2 px-0 mx-5">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                    <!-- Site logo -->
                    <a class="navbar-brand" href="">
                      <img class="header-logo mb-n4" src="{{ asset('/images/logo/logo-herceg.png') }}" alt="main-logo" width="200">
                    </a>
                      <!-- Toggling button for mobile responsivnes -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-2" aria-controls="navbar-2"  aria-expanded="false" aria-label="Toggle navigation">
                        <img src="{{ asset('front/images/icons/menu-bar.svg') }}">
                    </button>
                  </div>
                  </div>
                <div class="row">
                 
                 <!-- Email and Phone links -->
                  <div class="col-lg-12 d-none d-lg-block">
                    <div class="collapse navbar-collapse" id="navbar-2">
                      <ul class="navbar-nav mr-auto"></ul>
                      <ul class="navbar-nav text-lg-right contact-info rounded-right">
                        <li class="nav-item">
                          <a class="navbar-brand navbar-brand-1" href="tel:+387-61-758-733">
                            <img src="{{ asset('/images/icons/phone.png') }}" width="17">
                            <span class="navbar-info" style="color: black;">061 758 733</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="navbar-brand navbar-brand-1" href="mailto:emina@herceg.ba">
                            <img src="{{ asset('/images/icons/email.png') }}" width="20">
                            <span class="navbar-info" style="color: black;">emina@herceg.ba</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>

                  <!-- Links to the other pages on site -->
                  <div class="col-lg-12">
                    <div class="collapse navbar-collapse" id="navbar-2">
                      <ul class="navbar-nav mr-auto"></ul>
                      <ul class="navbar-nav text-lg-right">
                        <li class="nav-item">
                          <a class="nav-link nav-link-2 h5 font-weight-normal" href="">Početna</a>
                        </li>
                        <li class="nav-item">
                         <a class="nav-link nav-link-2 h5 font-weight-normal" href="">O nama</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link nav-link-2 h5 font-weight-normal" href="">Proizvodi</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link nav-link-2 h5 font-weight-normal" href="">Kontakt</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link nav-link-2 market-link position-relative" href="">
                            <span class="accented-button">
                              <img class="market-link-cart" src="{{ asset('/images/icons/cart.png') }}" alt="">
                              <span>Naruči proizvode</span>
                            </span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </nav>

        </header>

    <!-- End of Header -->


    <!-- Main Content -->

        <main class="py-4">
            
            @yield('content')
        
        </main>

   <!-- End of Main Content -->


   <!-- Footer -->

        <footer>
          
        </footer>

   <!-- End of Footer -->


   <!-- Scripts -->

      @yield('scripts')

</body>
</html>
