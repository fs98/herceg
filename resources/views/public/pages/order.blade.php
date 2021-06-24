@extends('public.layouts.public')

@section('content')

<section id="myCart" class="bg-white">
  <div class="container py-4 px-0">
    <div class="row">
      <div class="col-12 col-xl-8">
      <h4 class="mx-3 mt-4 fw-500">Moja košarica <span class="">({{ $totalItems }} proizvoda)</span></h4>

        @foreach ($products as $product)

        <div class="row m-3 bg-light ">
          <div class="col-3 align-items-baseline p-3">
            <img src="{{ $product->header_image_url }}" class="img-fluid rounded">
          </div>
          <div class="col-7 p-3 d-flex flex-column justify-content-between product-info">
              <h5>{{ $product->name }}</h5>
              <span class="fw-500">Kategorija:<span class="text-dark fw-normal ms-2"></span></span>
              <div class="d-flex flex-column">
              <span class="fw-500">Akcija:<span class="text-dark fw-normal ms-2">{{ $product->product_tag }}</span></span>
              <span class="fw-500 mt-3">Količina:<span class="text-dark fw-normal ms-2">{{ $product->qty }} kom</span></span>
              </div>
              <div>
                <button class="btn p-0 fw-light text-uppercase font-size-14"><i class="far fa-trash-alt me-2 text-muted"></i>Obriši proizvod</button>
              </div>
          </div>
          <div class="col-2 p-3 d-flex flex-column justify-content-between align-items-end">
            <div class="input-group-sm input-group">
              <div class="input-group-prepend">
                <button class="btn btn-sm text-light rounded-0" type="button" onclick="this.parentNode.parentNode.querySelector('[type=number]').stepDown();"><i class="fas fa-minus fa-sm"></i></button>
              </div>
              <input type="number" min="1" class="form-control text-center" placeholder="" value="1">
              <div class="input-group-append">
                <button class="btn btn-sm text-light rounded-0" type="button" onclick="this.parentNode.parentNode.querySelector('[type=number]').stepUp();"><i class="fas fa-plus"></i></button>
              </div>
            </div>
            <div>
              <span class="h5 fw-500">{{ $product->price }} KM</span>
            </div>
          </div>
        </div>

        @endforeach

            

        <div class="row m-3 p-3 warning bg-light">
          <span class="h6 fw-light mb-0">
            <i class="fas fa-exclamation-circle fa-lg"></i>
            Nemojte odgađati kupovinu, jer dodavanje proizvoda u košaricu ne znači i njihovo rezervisanje.
          </span>
        </div>

        <div class="row m-3">
          <div class="col-12">
            <h4 class="h4 fw-normal">Planirani datum preuzimanja</h4>
            <h6 class="h6 fw-light mt-3">Thu., 12.03. - Mon., 16.03.</h6>
          </div>
        </div>            

      </div>
      <div class="col-lg-4 col-sm-12 mt-5 total">
         <div class="form-group d-flex justify-content-center mt-3 mb-5">
            <select name="shippingType" id="shippingType" class="col-11 border-0 bg-theme-color py-3 text-light" required>
              <option class="h5" selected disabled>Odaberite način plaćanja</option>
              <option value="1">U našim prostorijama</option>
              <option value="2">Brza pošta</option>
            </select> 
          </div>
          <div class="form-group d-flex justify-content-center">
            <label class="date-label h5">Odaberite datum pošiljke Od-Do</label>
            <input name="date" type="date" id="shippingType"  value="" class="col-5 border-0 bg-theme-color py-2 text-light mx-3" required>
            <input name="date" type="date" id="shippingType"  value="" class="col-5 border-0 bg-theme-color py-2 text-light mx-3" required>
          </div>
        <div class="m-3 mt-0 p-4 bg-light checkout">
          <h5 class="fw-500 total-heading">Račun</h5>
          <h5 class="fw-light d-flex justify-content-between mt-5">Ukupno<span>{{ $totalPrice . ' KM' }}</span></h5>
          <hr>
          <button class="btn w-100 mt-2 rounded-0 py-3 text-light">Završi narudžbu</button>
        </div>
        <div class="m-3 p-4">
           <div class="accordion accordion-flush mt-4">
            <h2 class="accordion-header  rounded-0" id="headingTwo">
              <button class="accordion-button collapsed text-dark bg-transparent border-0 ps-0" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Add a discount code (optional)
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="accordion-body">
                <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection

