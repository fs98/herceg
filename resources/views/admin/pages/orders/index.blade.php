@extends('admin.layouts.main')

@section('content')
  
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">{{ __('Narudžbe') }}</h1> 

  {{-- Breadcrumb --}}
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb"> 
      <li class="breadcrumb-item"><a href="{{ route('admin.order.index') }}">{{ __('Sve narudžbe') }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ __('Lista svih narudžbi') }}</li>
    </ol>
  </nav>

  <!-- DataTables Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-success align-middle">{{ __('Sve narudžbe') }}</h6>
    </div>
    <div class="card-body">
        <div class="row">

          @if ($orders->isNotEmpty())

            <div class="table-responsive"> 
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Ime i Prezime</th>
                    <th>Adresa</th>
                    <th>Narudžba napravljena</th>
                    <th>Akcije</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($orders as $order)
                  <tr>
                    <td class="align-middle">{{ $order->first_name . ' ' . $order->last_name }}</td>
                    <td class="align-middle">{{ $order->address . ', ' . $order->city . ' ' . $order->zip }}</td>
                    <td class="align-middle">{{ $order->created_at }}</td>
                    <td class="text-center table-column-controls">
                      <a href="{{ Route('admin.order.show', $order) }}" class="btn btn-success">Vidi detalje</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Ime i Prezime</th>
                    <th>Adresa</th>
                    <th>Narudžba napravljena</th>
                    <th>Akcije</th>
                  </tr>
                </tfoot>
              </table>
            </div>

          @else

            <div class="col-12">
              <div class="alert alert-danger w-100" role="alert">
                U bazi podataka trenutno nemate ni jednu narudžbu.
              </div>
            </div>

          @endif

        </div>
    </div> 
  </div>  

@endsection 