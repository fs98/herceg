<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Countryside Kashmir') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.js') }}" defer></script> 

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">

    @yield('links')

</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

          <!-- Sidebar - Brand -->
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.order.index') }}">
              <div class="sidebar-brand-icon">
                  <img src="{{ asset('images/logo/herceg.png') }}" alt="sidebar-logo" width="120">
              </div> 
          </a>

          <!-- Divider -->
          <hr class="sidebar-divider my-0">

          <!-- Nav Item - Dashboard -->
          <li class="nav-item {{ Route::currentRouteNamed('admin.order.*') ? 'active' : '' }}">
              <a class="nav-link" href="{{ Route('admin.order.index') }}">
                  <i class="fas fa-fw fa-receipt"></i>
                  <span>{{ __('Narudžbe') }}</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
              {{ __('Osnovno') }}
          </div>

          <!-- Nav Item - Messages Collapse Menu -->
          <li class="nav-item {{ Route::currentRouteNamed('admin.question.*') ? "active" : "" }}">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                  aria-expanded="true" aria-controls="collapseTwo">
                  <i class="fas fa-fw fa-envelope"></i>
                  <span>{{ __('Poruke') }}</span>
              </a>
              <div id="collapseTwo" class="collapse {{ Route::currentRouteNamed('admin.question.*') ? "show" : "" }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                      <h6 class="collapse-header">{{ __('Provjeri:') }}</h6>
                      <a class="collapse-item {{ Route::currentRouteNamed('admin.question.index') ? "active" : "" }}" href="{{ Route('admin.question.index') }}">{{ _('Sve poruke') }}</a>
                  </div>
              </div>
          </li>

          <!-- Nav Item - Mail Collapse Menu -->
          <li class="nav-item {{ Route::currentRouteNamed('admin.user.*') ? "active" : "" }}">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                  aria-expanded="true" aria-controls="collapseUtilities">
                  <i class="fas fa-fw fa-user"></i>
                  <span>{{ __('Korisnici') }}</span>
              </a>
              <div id="collapseUtilities" class="collapse {{ Route::currentRouteNamed('admin.user.*') ? "show" : "" }}" aria-labelledby="headingUtilities"
                  data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                      <h6 class="collapse-header">{{ __('Upravljanje:') }}</h6>
                      <a class="collapse-item {{ Route::currentRouteNamed('admin.user.index') ? "active" : "" }}" href="{{ Route('admin.user.index') }}">{{ __('Svi korisnici') }}</a> 
                      <a class="collapse-item {{ Route::currentRouteNamed('admin.user.create') ? "active" : "" }}" href="{{ Route('admin.user.create') }}">{{ __('Novi korisnik') }}</a> 
                  </div>
              </div>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
              {{ __('Sadržaj') }}
          </div>

          <!-- Nav Item - Content Collapse Menu -->
          <li class="nav-item {{ Route::currentRouteNamed('admin.category.*') ? "active" : "" }}">
              <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                  aria-controls="collapsePages">
                  <i class="fas fa-fw fa-quote-left"></i>
                  <span>{{ __('Proizvodi')}}</span>
              </a>
              <div id="collapsePages" class="collapse {{ Route::currentRouteNamed('admin.category.*') || Route::currentRouteNamed('admin.product.*') ? "show" : "" }}" aria-labelledby="headingPages"
                  data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                      <div class="collapse-divider"></div>
                      <h6 class="collapse-header">{{ __('Kategorije:') }}</h6>
                      <a class="collapse-item {{ Route::currentRouteNamed('admin.category.index') ? "active" : "" }}" href="{{ Route('admin.category.index') }}">{{ __('Kategorije') }}</a>
                      <a class="collapse-item {{ Route::currentRouteNamed('admin.category.create') ? "active" : "" }}" href="{{ Route('admin.category.create') }}">{{ __('Nova kategorija') }}</a>
                      <div class="collapse-divider"></div>
                      <h6 class="collapse-header">{{ __('Proizvodi:') }}</h6>
                      <a class="collapse-item {{ Route::currentRouteNamed('admin.product.index') ? "active" : "" }}" href="{{ Route('admin.product.index') }}">{{ __('Proizvodi') }}</a>
                      <a class="collapse-item {{ Route::currentRouteNamed('admin.product.create') ? "active" : "" }}" href="{{ Route('admin.product.create') }}">{{ __('Novi proizvod') }}</a>
                  </div>
              </div>
          </li>

          <!-- Nav Item - Content Collapse Menu -->
          <li class="nav-item {{ Route::currentRouteNamed('admin.tag.*') ? "active" : "" }}">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTags" aria-expanded="true"
                aria-controls="collapseTags">
                <i class="fas fa-fw fa-quote-left"></i>
                <span>{{ __('Tagovi')}}</span>
            </a>
            <div id="collapseTags" class="collapse {{ Route::currentRouteNamed('admin.tag.*') ? "show" : "" }}" aria-labelledby="headingPages"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">{{ __('Tagovi:') }}</h6>
                    <a class="collapse-item {{ Route::currentRouteNamed('admin.tag.index') ? "active" : "" }}" href="{{ Route('admin.tag.index') }}">{{ __('Tagovi') }}</a>
                    <a class="collapse-item {{ Route::currentRouteNamed('admin.tag.create') ? "active" : "" }}" href="{{ Route('admin.tag.create') }}">{{ __('Novi tag') }}</a>
                </div>
            </div>
          </li>

          <!-- Nav Item - Content Collapse Menu -->
          <li class="nav-item {{ Route::currentRouteNamed('admin.shop.*') ? "active" : "" }}">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseShops" aria-expanded="true"
                aria-controls="collapseShops">
                <i class="fas fa-fw fa-quote-left"></i>
                <span>{{ __('Prodavnice')}}</span>
            </a>
            <div id="collapseShops" class="collapse {{ Route::currentRouteNamed('admin.shop.*') ? "show" : "" }}" aria-labelledby="headingPages"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">{{ __('Prodavnice:') }}</h6>
                    <a class="collapse-item {{ Route::currentRouteNamed('admin.shop.index') ? "active" : "" }}" href="{{ Route('admin.shop.index') }}">{{ __('Prodavnice') }}</a>
                    <a class="collapse-item {{ Route::currentRouteNamed('admin.shop.create') ? "active" : "" }}" href="{{ Route('admin.shop.create') }}">{{ __('Nova prodavnica') }}</a>
                </div>
            </div>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">

          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
              <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>

      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

          <!-- Main Content -->
          <div id="content">

              <!-- Topbar -->
              <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                  <!-- Sidebar Toggle (Topbar) -->
                  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                      <i class="fa fa-bars"></i>
                  </button>

                  <!-- Topbar Search -->
                  {{-- <form
                      class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                      <div class="input-group">
                          <input type="text" class="form-control bg-light border-0 small" placeholder="{{ __('Search...') }}"
                              aria-label="Search" aria-describedby="basic-addon2">
                          <div class="input-group-append">
                              <button class="btn btn-success" type="button">
                                  <i class="fas fa-search fa-sm"></i>
                              </button>
                          </div>
                      </div>
                  </form> --}}

                  <!-- Topbar Navbar -->
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-1">
                      <a class="nav-link">
                          <span>{{ date('D, d M Y') }}</span> 
                      </a>
                  </li>

                      {{-- <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                      <li class="nav-item dropdown no-arrow d-sm-none">
                          <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-search fa-fw"></i>
                          </a>
                          <!-- Dropdown - Messages -->
                          <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                              aria-labelledby="searchDropdown">
                              <form class="form-inline mr-auto w-100 navbar-search">
                                  <div class="input-group">
                                      <input type="text" class="form-control bg-light border-0 small"
                                          placeholder="Search for..." aria-label="Search"
                                          aria-describedby="basic-addon2">
                                      <div class="input-group-append">
                                          <button class="btn btn-success" type="button">
                                              <i class="fas fa-search fa-sm"></i>
                                          </button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </li> --}}

                      <div class="topbar-divider d-none d-sm-block"></div>

                      <!-- Nav Item - User Information -->
                      <li class="nav-item dropdown no-arrow">
                          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              {{-- <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span> --}}
                              <img class="img-profile rounded-circle" src="https://i.pinimg.com/originals/51/f6/fb/51f6fb256629fc755b8870c801092942.png">
                          </a>
                          <!-- Dropdown - User Information -->
                          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                              aria-labelledby="userDropdown"> 
                              <a class="dropdown-item" href="{{ Route('admin.user.edit', auth()->user()) }}">
                                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                  Promjena lozinke
                              </a> 
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="{{ Route('logout') }}" data-toggle="modal" data-target="#logoutModal">
                                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                  Odjava
                              </a>
                          </div>
                      </li>

                  </ul>

              </nav>
              <!-- End of Topbar -->

              <!-- Begin Page Content -->
              <div class="container-fluid">

                @yield('content') 

              </div>
              <!-- /.container-fluid -->

          </div>
          <!-- End of Main Content -->

          <!-- Footer -->
          <footer class="sticky-footer bg-white">
              <div class="container my-auto">
                  <div class="copyright text-center my-auto">
                      <span>Copyright &copy; Herceg {{ now()->year }} | Admin panel designed by <a href="https://getbootstrap.com/">Bootstrap</a></span>
                  </div>
              </div>
          </footer>
          <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">{{ __('Želite se odjaviti?') }}</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">{{ __('Kliknite na tipku "Odjavi se" ako želite nastaviti sa odjavom.') }}</div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">{{ __('Odustani') }}</button>
                  <a class="btn btn-success" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      {{ __('Odjavi se') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
          </div>
      </div>
  </div> 

  @yield('scripts')

</body>
 
</html>
