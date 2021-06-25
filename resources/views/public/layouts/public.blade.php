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

      <!-- Top part of header -->
    
      <section id="topHeader" class="border-bottom py-2">
        <div class="container">
          <div class="row d-flex flex-wrap justify-content-between">
            <div class="col-xl-12 d-flex justify-content-between">
    
              <!-- Left side -->
    
              <div class="d-flex align-items-center">
                <div class="py-1 pr-2 mr-2 border-right">
                  <a class="text-dark text-decoration-none">
                    <i class="fas fa-envelope fa-lg text-theme-color"></i>
                    <span class="h5 contact-info">emina@herceg.ba</span>
                  </a> 
                </div> 
                <div class="py-1 pr-2">
                  <a class="text-dark text-decoration-none">
                    <i class="fas fa-phone fa-lg text-theme-color"></i>
                    <span class="h5 contact-info">62-658-658</span>
                  </a>
                </div>						
              </div>
    
              <!-- Right side -->
    
              <div class="d-flex">
                <marquee behavior="scroll" direction="up" scrollamount="1">
                    <span class="h5 text-red text-uppercase font-weight-bold">-20% na sve vrste sirupa !!!</span>
                </marquee>
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
          <div class="row align-items-center justify-content-center my-3">
    
            <!-- Logo -->
    
            <div class="col-lg-3 d-flex align-items-center justify-content-between align-self-end">
              <div class="align-self-end d-flex">
                <div id="logoIcon">
                <a href="{{ Route('public.index') }}">
                <img src="{{ asset('images/logo/logo-herceg.png') }}" alt="navbar-brand-logo" width="200">
                </a>
                </div> 
              </div>
              <div class="align-self-end d-flex d-lg-none shopping-cart">
                <a class="text-center text-decoration-none" href="">
                  <i class="fa fa-shopping-basket fa-lg"></i>
                  <div class="text-center text-uppercase text-dark"><span class="fw-500">Moja košarica</span></div>
                </a>
              </div>
            </div>				
    
            <!-- Search -->
    
            <div class="col-lg-7 p-3 p-sm-3 p-md-3 p-lg-0 align-self-center" id="search">
              <form class=""action="{{ Route('public.search') }}" method="GET">
                <div class="input-group mb-0">
                  <input type="search" id="elastic-search" class="form-control" aria-describedby="basic-addon2" name="search" required>
                  <div class="input-group-append">
                    <button type="submit" class="input-group-text h-100 btn"><i class="fas fa-search px-1 text-light"></i></button>
                  </div>
                </div>
              </form>
            </div>
              
            <!-- Shopping Cart [big screen] -->
    
            <div class="col-lg-2 d-none d-lg-flex justify-content-end align-self-center shopping-cart">
              <button type="button" class="text-center text-decoration-none bg-transparent border-0" href="" data-toggle="modal" data-target="#cart" id="total">
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

        <section class="bg-light py-5" id="newsletterSection">
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