@extends('admin.layouts.main')

@section('content')
  
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">{{ __('Narudžbe') }}</h1> 

  {{-- Breadcrumb --}}
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb"> 
      <li class="breadcrumb-item"><a href="{{ route('admin.order.index') }}">{{ __('Sve narudžbe') }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ '#' . $order->id }}</li>
    </ol>
  </nav>

  <!-- DataTables Example -->
  <div class="row">
    <div class="col-12">
      <div class="card text-center">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs" id="orderDetails" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" href="#details" role="tab" aria-selected="true" aria-controls="details">{{ __('Detalji narudžbe') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#products" role="tab" aria-selected="false" aria-controls="products">{{ __('Naručeni proizvodi') }}</a>
            </li> 
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="detalji">
            <div class="tab-pane active text-left" id="details" role="tabpanel">
              
              <div class="row">

                <div class="col-12 col-lg-6">

                  <div>
                    <h6 class="font-weight-bold">{{ __('Ime i prezime:') }}</h6>
                    <p>{{ $order->first_name . ' ' . $order->last_name }}</p>
                  </div>
    
                  <div>
                    <h6 class="font-weight-bold">{{ __('Broj telefona:') }}</h6>
                    <p>{{ $order->phone }}</p>
                  </div>
    
                  <div>
                    <h6 class="font-weight-bold">{{ __('Email:') }}</h6>
                    <p>{{ $order->email }}</p>
                  </div>
    
                  <div>
                    <h6 class="font-weight-bold">{{ __('Adresa:') }}</h6>
                    <p>{{ $order->address . ', ' . $order->city . ' ' . $order->zip }}</p>
                  </div>

                </div>

                <div class="col-12 col-lg-6">

                  <div>
                    <h6 class="font-weight-bold">{{ __('Način dostave:') }}</h6>
                    <p>{{ $order->shipping_type }}</p>
                  </div>
    
                  <div>
                    <h6 class="font-weight-bold">{{ __('Očekivan datum preuzimanja/isporuke:') }}</h6>
                    <p>{{ $order->from_date . ' - ' . $order->until_date }}</p>
                  </div>

                  <div>
                    <h6 class="font-weight-bold">{{ __('Poruka/Posebni zahtjevi:') }}</h6>
                    <p>{{ $order->message }}</p>
                  </div>

                  <div>
                    <h6 class="font-weight-bold">{{ __('Datum kreiranja narudžbe:') }}</h6>
                    <p>{{ $order->created_at }}</p>
                  </div>

                </div>

              </div>

            </div>
            <div class="tab-pane text-left" id="products" role="tabpanel">
              
                <div class="row">

                  <div class="col-12 d-flex justify-content-between align-items-center">
                    
                    <p>Lista prozvoda:</p>

                    <a href="{{ "/storage/receipts/" . $order->receipt }}" download="" class="btn btn-success btn-sm mb-3">
                      <i class="fas fa-long-arrow-alt-down"></i>
                      Preuzmi račun
                    </a>
                  
                  </div>

                  @forelse ($order_items as $item)

                  <div class="col-12 col-sm-6 col-lg-4 col-xl-2">
                    <div class="card">
                      <img class="card-img-top" style="object-fit: cover; max-height: 200px" src="{{ $item->product->header_image_url }}" alt="Card image cap">
                      <div class="card-body bg-light text-left d-flex flex-column justify-content-center">
                        <h5 class="card-title">{{ $item->product->title }}</h5>
                        <h6>Količina: {{ $item->quantity }}</h6>
                        <h6>Ukupna cijena: {{ $item->price }} KM</h6>
                      </div>
                    </div>
                  </div>

                @empty
                    
                @endforelse

                </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  

@endsection

@section('scripts')
<script>
  $('#orderDetails a').on('click', function (e) {
    e.preventDefault()
    $(this).tab('show')
  })
</script>
@endsection