@extends('public.layouts.public')

@section('content')

<!-- Order information -->

<section id="myCart">
  <div class="container my-4">
    <div class="row">
      <div class="col-6">

        <div class="row m-3 bg-light ">
      <h4 class="mx-3 mt-4 fw-500">Your Cart <span class="font-size-15">(2 Items)</span></h4>

          <div class="col-3 p-3">
            <img src="assets/img/sellingItems/652-299s.jpg" class="img-fluid rounded">
          </div>
          <div class="col-7 p-3 d-flex flex-column justify-content-between product-info">
              <h5>{{ $cartProduct->name }}</h5>
              <span class="fw-500">Category:<span class="text-dark fw-normal ms-2">Sports</span></span>
              <div class="d-flex flex-column">
              <span class="fw-500">Color:<span class="text-dark fw-normal ms-2">Black</span></span>
              <span class="fw-500 mt-3">Size:<span class="text-dark fw-normal ms-2">M</span></span>
              </div>
              <div>
                <button class="btn p-0 fw-light text-uppercase font-size-14"><i class="far fa-trash-alt me-2 text-muted"></i>remove item</button>
                <button class="btn p-0 ms-3 fw-light text-uppercase font-size-14"><i class="fas fa-heart me-2 text-muted"></i>move to wishlist</button>
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
              <span class="h5 fw-500">$45.00</span>
            </div>
          </div>
        </div>

        <div class="row m-3 bg-light">
          <div class="col-3 align-items-baseline p-3">
            <img src="assets/img/sellingItems/211917s.jpg" class="img-fluid rounded">
          </div>
          <div class="col-7 p-3 d-flex flex-column justify-content-between product-info">
              <h5>Black Square Toe T-Bar Heels</h5>
              <span class="fw-500">Category:<span class="text-dark fw-normal ms-2">Sports</span></span>
              <div class="d-flex flex-column">
              <span class="fw-500">Color:<span class="text-dark fw-normal ms-2">Black</span></span>
              <span class="fw-500 mt-3">Size:<span class="text-dark fw-normal ms-2">M</span></span>
              </div>
              <div>
                <button class="btn p-0 fw-light text-uppercase font-size-14"><i class="far fa-trash-alt me-2 text-muted"></i>remove item</button>
                <button class="btn p-0 ms-3 fw-light text-uppercase font-size-14"><i class="fas fa-heart me-2 text-muted"></i>move to wishlist</button>
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
              <span class="h5 fw-500">$45.00</span>
            </div>
          </div>
        </div>    

        <div class="row m-3 p-3 warning bg-light">
          <span class="h6 fw-light mb-0">
            <i class="fas fa-exclamation-circle fa-lg"></i>
            Do not delay the purchase, adding items to your cart does not mean booking them.</span>
        </div>

        <div class="row m-3 p-3">
          <span class="h4 fw-normal mb-0">Expected shopping delivery</span>
          <span class="h6 fw-light mt-4">Thu., 12.03. - Mon., 16.03.</span>
        </div>            

      </div>
      <div class="col-xl-4 col-lg-4 mt-3 total">
        <div class="m-3 mt-0 p-4 bg-light checkout">
          <h5 class="fw-500 total-heading">Checkout</h5>
          <h5 class="fw-light d-flex justify-content-between mt-5">Items Price<span>$34.90</span></h5>
          <h5 class="fw-light d-flex justify-content-between mt-3">Shipping<span>$6.99</span></h5>
          <hr>
          <h5 class="fw-bold d-flex justify-content-between mt-3">Total<span>$6.99</span></h5>
          <button class="btn w-100 mt-2 rounded-0 font-size-15 py-3 text-light">Pay now</button>
        </div>
        <div class="m-3 p-4">
           <div class="accordion accordion-flush mt-4">
            <h2 class="accordion-header  rounded-0" id="headingTwo">
              <button class="accordion-button collapsed text-dark bg-transparent border-0 ps-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Add a discount code (optional)
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
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

