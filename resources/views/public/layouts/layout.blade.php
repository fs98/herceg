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
    <script src="{{ asset('js/login.js') }}" defer></script>
    <script src="{{ asset('js/navbar-active-class.js') }}" defer></script>
    <script src="{{ asset('js/product-items.js') }}" defer></script>
    <script src="{{ asset('js/style.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-classes.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/themes/default-theme.css') }}" rel="stylesheet">
</head>
<body>

<!-- Header -->

<header>  

  <!-- Top part of header -->

  <section id="topHeader" class="border-bottom">
    <div class="container">
      <div class="row d-flex flex-wrap justify-content-between">
        <div class="col-xl-12 d-flex justify-content-between">

          <!-- Left side -->

          <div class="d-flex">
            <div class="dropdown py-1 pe-2 mr-2 border-end">
              <a class="dropdown-toggle font-size-13 text-uppercase text-dark text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="assets/icons/united-kingdom.png" class="img-fluid">
                <span class="">English</span>
              </a>
              <ul class="dropdown-menu font-size-13 text-uppercase" aria-labelledby="dropdownMenuButton1">
                <li>
                  <a class="dropdown-item" href="#">
                    <img src="assets/icons/germany.png" class="img-fluid">
                    <span>german</span>
                  </a>
                </li>
              </ul>
            </div>
            <div class="dropdown py-1 pe-2 mx-2 border-end">
              <a class="dropdown-toggle font-size-13 text-uppercase text-dark text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="assets/icons/dollar-symbol.png" class="img-fluid">
                <span>USD</span>
              </a>
              <ul class="dropdown-menu font-size-13 text-uppercase" aria-labelledby="dropdownMenuButton1">
                <li class="">
                  <a class="dropdown-item" href="#">
                    <img src="assets/icons/euro.png" class="img-fluid">
                    <span>euro</span>
                  </a>
                </li>
              </ul>
            </div>
            <div class="dropdown py-1 pe-2">
              <a class="font-size-13 text-uppercase text-dark text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="assets/icons/phone-call.png" class="img-fluid">
                <span class="">00-62-658-658</span>
              </a>
            </div>            
          </div>

          <!-- Right side -->

          <div class="d-flex">
            <a href="#" class="font-size-13 text-dark text-decoration-none ms-2 p-2 border-end">My account</a>
            <a href="#" class="font-size-13 text-dark text-decoration-none p-2 d-none d-sm-none d-md-none d-lg-block d-xl-block border-end">Wishlist</a>
            <a href="#" class="font-size-13 text-dark text-decoration-none p-2 d-none d-sm-none d-md-none d-lg-block d-xl-block border-end">My Cart</a>
            <a href="#" class="font-size-13 text-dark text-decoration-none p-2 d-none d-sm-none d-md-none d-lg-block d-xl-block border-end">Checkout</a>
            <a href="#" class="font-size-13 text-dark text-decoration-none ps-2 py-2 pe-0" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
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
            <span class="fa fa-shopping-cart fa-3x"></span>
            </div>
            <div class="ms-2" id="logo">
              <h3 class="mb-0 tight-text">shop<span class="colored-text">Zilla</span></h3>
              <span class="pt-0 text-uppercase font-size-12 text-wide">your shopping partner</span>
            </div>
          </div>
          <div class="align-self-end d-flex d-lg-none shopping-cart">
            <a class="text-center text-decoration-none" href="">
              <i class="fa fa-shopping-basket fa-lg"></i>
              <div class="text-center text-uppercase font-size-13 text-dark"><span class="fw-500">Shopping Cart</span></div>
            </a>
          </div>
        </div>        

        <!-- Search -->

        <div class="col-lg-5 p-3 p-sm-3 p-md-3 p-lg-0 align-self-end" id="search">
          <div class="input-group mb-0">
            <input type="text" class="form-control rounded-0" placeholder="Search here ex. 'shoes'" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="input-group-text rounded-0 h-100 btn" id="basic-addon2"><i class="fas fa-search px-1 text-light"></i></button>
            </div>
          </div>
        </div>

        <!-- Shopping Cart [big screen] -->

        <div class="col-lg-2 d-none d-lg-flex justify-content-end align-self-end shopping-cart">
          <a class="text-center text-decoration-none" href="">
            <i class="fa fa-shopping-basket fa-lg"></i>
            <div class="text-center text-uppercase font-size-13 text-dark"><span class="fw-500">Shopping Cart</span></div>
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
    <nav class="navbar navbar-expand-lg navbar-dark fw-500 font-size-15 py-2 py-lg-0">
      <div class="container">
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item pe-xl-2 pe-lg-2 px-md-0 px-sm-0 px-0">
              <a class="nav-link" aria-current="page" href="index.html" id="indexPage">Home</a>
            </li>
            <li class="nav-item dropdown px-xl-2 px-lg-2 px-md-0 px-sm-0 px-0">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Men
              </a>
              <ul class="dropdown-menu font-size-13" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item fw-500 py-2" href="#">Casual</a></li>
                <li><a class="dropdown-item fw-500 py-2" href="#">Sports</a></li>
                <li><a class="dropdown-item fw-500 py-2" href="#">Formal</a></li>
                <li><a class="dropdown-item fw-500 py-2" href="#">Standard</a></li>
                <li><a class="dropdown-item fw-500 py-2" href="#">T-shirts</a></li>
                <li><a class="dropdown-item fw-500 py-2" href="#">Shirts</a></li>
                <li><a class="dropdown-item fw-500 py-2" href="#">Jeans</a></li>
                <li><a class="dropdown-item fw-500 py-2" href="#">Trousers</a></li> 
              </ul>
            </li>
            <li class="nav-item dropdown px-xl-2 px-lg-2 px-md-0 px-sm-0 px-0">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Women
              </a>
              <ul class="dropdown-menu font-size-13" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item fw-500 py-2" href="#">Trousers</a></li> 
                <li><a class="dropdown-item fw-500 py-2" href="#">Casual</a></li>
                <li><a class="dropdown-item fw-500 py-2" href="#">Sports</a></li>
                <li><a class="dropdown-item fw-500 py-2" href="#">Formal</a></li>
                <li><a class="dropdown-item fw-500 py-2" href="#">Shoes</a></li>
                <li><a class="dropdown-item fw-500 py-2" href="#">Bags</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown px-xl-2 px-lg-2 px-md-0 px-sm-0 px-0">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Kids
              </a>
              <ul class="dropdown-menu font-size-13" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item fw-500 py-2" href="#">Casual</a></li>
                <li><a class="dropdown-item fw-500 py-2" href="#">Sports</a></li>
                <li><a class="dropdown-item fw-500 py-2" href="#">Formal</a></li>
                <li><a class="dropdown-item fw-500 py-2" href="#">Trousers</a></li> 
              </ul>
            </li>                         
            <li class="nav-item px-xl-2 px-lg-2 px-md-0 px-sm-0 px-0">
              <a class="nav-link" href="#">Sports</a>
            </li>
            <li class="nav-item dropdown px-xl-2 px-lg-2 px-md-0 px-sm-0 px-0">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Digital
              </a>
              <ul class="dropdown-menu font-size-13" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Camera</a></li>
                <li><a class="dropdown-item" href="#">Mobile phones</a></li>
                <li><a class="dropdown-item" href="#">Laptops</a></li>
              </ul>
            </li>
            <li class="nav-item px-xl-2 px-lg-2 px-md-0 px-sm-0 px-0">
              <a class="nav-link" href="#">Furniture</a>
            </li>
            <li class="nav-item ps-xl-2 ps-lg-2 px-md-0 px-sm-0 px-0">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </section>

  <!-- End of bottom part of header -->

</header>

<!-- End of Header -->


    <!-- Main Content -->

        <main>
            
            @yield('content')
        
        </main>

   <!-- End of Main Content -->


   <!-- Footer -->

    <!-- Newsletter Section -->

    <section class="bg-light" id="newsletterSection">
      <div class="container">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-auto text-center">
            <span class="h4 text-uppercase fw-500">Subscribe to our newsletter</span>
            <p class="font-size-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
            <div class="input-group">
              <input type="text" class="form-control rounded-0" placeholder="Your email" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn text-light fw-500 text-uppercase rounded-0" type="button">Subscribe</button>
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
        <div class="row py-2 text-center text-muted pb-3 font-size-15">
          <span>Copyright &copy; Fata Sefer 2021</span>
        </div>
      </div>
    </footer>

   <!-- End of Footer -->


   <!-- Scripts -->

      @yield('scripts')

      

</body>
</html>
