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

      <!-- Middle part of header -->
    
      <section id="middleHeader">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-center my-3">
    
            <!-- Logo -->
    
            <div class="col-6 col-xl-2 d-flex order-0 order-xl-0"> 
              <div class="">
                <div id="logoIcon">
                  <a href="{{ Route('public.index') }}">
                  <img src="{{ asset('images/logo/logo-herceg.png') }}" alt="navbar-brand-logo" width="200">
                  </a>
                </div> 
              </div> 
            </div>

          <!-- Contact -->

            <div class="d-none d-md-block col-xl-3 col-12 order-2 order-xl-1 justify-content-end justify-content-lg-start">
                <div class="py-1 pr-2 mr-2">
                  <a href="mailto:emina@herceg.ba" class="text-dark text-decoration-none">
                    <i class="fas fa-envelope fa-lg text-theme-color"></i>
                    <span class="h5 contact-info">emina@herceg.ba</span>
                  </a> 
                </div> 
                <div class="py-1 pr-2">
                  <a href="tel:+387-61 758 733" class="text-dark text-decoration-none">
                    <i class="fas fa-phone fa-lg text-theme-color"></i>
                    <span class="h5 contact-info">061 758 733</span>
                  </a>
                </div>            
              </div>

    
            <!-- Search -->
    
            <div class="col-12 col-xl-4 p-3 p-sm-3 p-md-3 p-lg-0 order-2 order-xl-1 justify-content-end" id="search">
              <form class=""action="{{ Route('public.search') }}" method="GET">
                <div class="input-group mb-0">
                  <input type="search" id="elastic-search-two" class="form-control" aria-describedby="basic-addon2" name="search" required>
                  <div class="input-group-append">
                    <button type="submit" class="input-group-text h-100 btn"><i class="fas fa-search px-1 text-light"></i></button>
                  </div>
                </div>
              </form>
            </div>
              
            <!-- Shopping Cart [big screen] -->
    
            <div class="col-lg-1 col-6 order-1 order-xl-2 shopping-cart d-flex justify-content-end">
              <button type="button" class="cart-button text-center text-decoration-none bg-transparent border-0" href="" data-toggle="modal" data-target="#cart" id="total">
                <i class="fa fa-shopping-basket fa-3x"></i>
                <sup class="bg-danger text-light fw-500 px-2 py-1 rounded-circle ml-n3">{{ $totalItems }}</sup>
              </button> 
            </div>
    
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </section>
    
      <!-- End of middle part of header -->
    
      <!-- Bottom part of header -->
    
      <section id="bottomHeader">
        <nav class="navbar navbar-expand-lg navbar-dark d-flex fw-500 py-2 py-lg-0" style="background-color: #634C25 ;">
          <div class="container">
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->

            

            

            <button class="menu navbar-toggler order-1 justify-content-center ml-auto" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))">
              <svg width="50" height="35" viewBox="0 0 100 100">
                <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                <path class="line line2" d="M 20,50 H 80" />
                <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
              </svg>
            </button>
           


            <div class="collapse navbar-collapse justify-content-center justify-content-lg-end" id="navbarNavDropdown">
              <ul class="navbar-nav align-items-lg-end align-items-center">
                <li class="nav-item pr-xl-2 pr-lg-2 px-md-0 px-sm-0 px-0">
                  <a class="nav-link lead" aria-current="page" href="{{ Route('public.index') }}" id="indexPage">{{ __('Početna') }}</a>
                </li>
                @if ($categories->count() <= 4)
                  
                  @foreach ($categories as $category)
                    <li class="nav-item px-xl-2 px-lg-2 px-md-0 px-sm-0 px-0">
                      <a class="nav-link lead" href="{{ Route('public.category.products', $category )}}">{{ $category->title }}</a>
                    </li> 
                  @endforeach
                
                @else 

                  <li class="nav-item dropdown px-xl-2 px-lg-2 px-md-0 px-sm-0 px-0">
                    <a class="nav-link dropdown-toggle lead" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Kategorije
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      
                      @foreach ($categories as $category)
                        <a class="dropdown-item" href="{{ Route('public.category.products', $category )}}">{{ $category->title }}</a>
                      @endforeach
                      
                    </div>
                  </li>

                @endif
                <li class="nav-item px-xl-2 px-lg-2 px-md-0 px-sm-0 px-0">
                  <a class="nav-link lead" href="{{ Route('public.about') }}">{{ __('O nama') }}</a>
                </li>
                <li class="nav-item pl-xl-2 pl-lg-2 px-md-0 px-sm-0 px-0">
                  <a class="nav-link lead" href="{{ Route('public.contact') }}">{{ __('Kontakt') }}</a>
                </li>
                <!-- Contact -->

                <div class="mt-3 col-xl-3 col-12 order-2 order-xl-1 d-flex justify-content-center justify-content-lg-start d-md-none">
                  <div class="py-1 pr-2 mr-2">
                    <a href="mailto:emina@herceg.ba" class="text-light text-decoration-none">
                      <i class="fas fa-envelope fa-lg text-theme-color"></i>
                      <span class="h5 contact-info">emina@herceg.ba</span>
                    </a> 
                  </div> 
                  <div class="py-1 pr-2">
                    <a href="tel:+387-61 758 733" class="text-light text-decoration-none">
                      <i class="fas fa-phone fa-lg text-theme-color"></i>
                      <span class="h5 contact-info">061 758 733</span>
                    </a>
                  </div>            
                </div>
              </ul>
          </div>
        </nav>
      </section>
    
      <!-- End of bottom part of header -->
    
    </header>

    <!-- Modal -->

      <div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Moja košarica</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="show-cart table"> 
                
                  @foreach ($cartProducts as $cartProduct)
                    <tr> 
                      <td>{{ $cartProduct->name }}</td>
                      <td>{{ $cartProduct->qty }} kom</td>
                      <td>{{ $cartProduct->price }}<span> KM</span></td>
                      <td class="my-0 py-0"> 
                        <form action="{{ Route('cart.remove', $cartProduct->rowId) }}" method="POST" class="p-0 m-0">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm rounded-pill my-2">X</button>
                        </form> 
                      </td> 
                    </tr> 
                  @endforeach  
              </table>
              <div class="ml-3">Ukupno: <strong>{{ $totalPrice . ' KM' }}</strong><span class="total-cart"></span></div>
            </div>
            <div class="modal-footer">
              @if ($totalItems > 0)
                <a href="{{ Route('public.order') }}" class="btn bg-theme-color px-4 py-2 text-white text-uppercase add-to-cart">Uredi ili završi narudžbu</a>
              @else
                <a href="{{ Route('public.products') }}" class="btn bg-theme-color px-4 py-2 text-white text-uppercase add-to-cart">Naruči</a>
              @endif
              
            </div>
          </div> 
        </div>
      </div>


  <!-- Main Content -->

        <main>
            
            @yield('content')
        
        </main>

  <!-- End of Main Content -->


        <!-- Newsletter Section -->

        <section class="bg-light py-5 d-none" id="newsletterSection">
          <div class="container">
            <div class="row d-flex justify-content-center">
              <div class="col-auto text-center">
                <span class="h3 text-uppercase fw-500">Želite li dobijati obavijesti o akcijama?</span>
                <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
                <div class="input-group">
                  <input type="text" class="form-control rounded-1" placeholder="Your email" aria-label="Recipient's username" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn text-light fw-500 text-uppercase rounded-1" type="button">Pretplati se</button>
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
                <a href=" {{ Route('public.index')}}">
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
                <a href="{{ Route('public.index')}}" class="text-decoration-none text-muted">{{ __('Početna') }}</a>
                <a href="{{ Route('public.products')}}" class="text-decoration-none text-muted">{{ __('Naši proizvodi') }}i</a>
                <a href="{{ Route('public.about')}}" class="text-decoration-none text-muted">{{ __('O nama') }}</a>
                <a href="{{ Route('public.contact')}}" class="text-decoration-none text-muted">{{ __('Kontaktirajte nas') }}</a>
              </div>
              <div class="col-12 mt-3 col-md-6 col-lg-4 mt-lg-0 d-flex flex-column align-items-center">
                <h4>{{ __('Kategorije') }}</h4>
                @foreach ($categories as $category)
                      <a class="text-decoration-none text-muted" href="{{ Route('public.category.products', $category )}}">{{ $category->title }}</a>
                  @endforeach
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

<!-- BotMan -->

    <script>
      var botmanWidget = {
          aboutText: 'herceg',
          introMessage: "✋ Zdravo! Kako Vam možemo pomoći?",
          title: "Herceg",
          placeholderText: "Vaša poruka...",
          mainColor: "#39B54A",
          bubbleBackground: "#39B54A" 
      };
    </script>
  
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>


</html>