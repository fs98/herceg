var products = [
{ ticket : 'Sale!',
	imgSrc: 'assets/img/sellingItems/886-282s.jpg',
	name : 'Kids Pants',
	price: '$35.00',
	oldPrice: '$41.00'
},
{	ticket : 'HOT!',
	imgSrc: 'assets/img/sellingItems/966-529s.jpg',
	name : 'Grey Spot Cotton Blend Pyjamas',
	price: '45.50',
	oldPrice: ''
},
{	ticket : '',
	imgSrc: 'assets/img/sellingItems/652-299s.jpg',
	name : 'Joggers',
	price: '$30.00',
	oldPrice: '$39.99'
},
{	ticket : 'Sold Out!',
	imgSrc: 'assets/img/sellingItems/211917s.jpg',
	name : 'Black Square Toe T-Bar Heels',
	price: '$25.50',
	oldPrice: ''
},
{	ticket : 'Sold Out!',
	imgSrc: 'assets/img/sellingItems/223-428s.jpg',
	name : 'Cosy Raglan Top',
	price: '$45.50',
	oldPrice: '$65.60'
},
{	ticket : 'HOT!',
	imgSrc: 'assets/img/sellingItems/421-099s.jpg',
	name : 'Graphic Sweatshirt',
	price: '$50',
	oldPrice: '$'
}
];

for (var i = 0; i < products.length; i++) {
	switch(products[i].ticket) {

		case 'Sale!':
		$("#nav-tabContent .swiper-wrapper").append('<div class="swiper-slide"><div><div class="card text-dark p-0 border-0 rounded-0 h-75"><img src="' + products[i].imgSrc + '" class="card-img rounded-0 h-100 img-fluid" alt="..."><div class="card-img-overlay px-0"><span class="p-2 text-light fw-500 bg-success position-absolute">' + products[i].ticket + '</span><div class="flex-column align-items-center position-absolute bottom-0 w-100 animated-card-buttons"><div class="mb-4"><button class="btn btn-light rounded-0 me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><i class="fas fa-heart"></i></button><button class="btn btn-light rounded-0 ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Quick view"><i class="fas fa-search"></i></button></div><button class="btn btn-block btn-dark w-100 rounded-0 p-3 text-uppercase fw-500 font-size-15"><i class="fas fa-shopping-cart me-2" ></i>Add to cart</button></div></div></div><div class="card-body text-center h-25"><h6 class="card-title fw-normal">'+ products[i].name +'</h6><p class="card-text fw-500">'+ products[i].price +'<del class="text-muted ms-2">'+ products[i].oldPrice +'</del></p></div></div></div>');
		break;

		case 'HOT!':
		$("#nav-tabContent .swiper-wrapper").append('<div class="swiper-slide"><div><div class="card text-dark p-0 border-0 rounded-0 h-75"><img src="' + products[i].imgSrc + '" class="card-img rounded-0 h-100 img-fluid" alt="..."><div class="card-img-overlay px-0"><span class="p-2 text-light fw-500 bg-warning position-absolute">' + products[i].ticket + '</span><div class="flex-column align-items-center position-absolute bottom-0 w-100 animated-card-buttons"><div class="mb-4"><button class="btn btn-light rounded-0 me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><i class="fas fa-heart"></i></button><button class="btn btn-light rounded-0 ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Quick view"><i class="fas fa-search"></i></button></div><button class="btn btn-block btn-dark w-100 rounded-0 p-3 text-uppercase fw-500 font-size-15"><i class="fas fa-shopping-cart me-2" ></i>Add to cart</button></div></div></div><div class="card-body text-center h-25"><h6 class="card-title fw-normal">'+ products[i].name +'</h6><p class="card-text fw-500">'+ products[i].price +'<del class="text-muted ms-2">'+ products[i].oldPrice +'</del></p></div></div></div>');
		break;

		case 'Sold Out!':
		$("#nav-tabContent .swiper-wrapper").append('<div class="swiper-slide"><div><div class="card text-dark p-0 border-0 rounded-0 h-75"><img src="' + products[i].imgSrc + '" class="card-img rounded-0 h-100 img-fluid" alt="..."><div class="card-img-overlay px-0"><span class="p-2 text-light fw-500 bg-danger position-absolute">' + products[i].ticket + '</span><div class="flex-column align-items-center position-absolute bottom-0 w-100 animated-card-buttons"><div class="mb-4"><button class="btn btn-light rounded-0 me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><i class="fas fa-heart"></i></button><button class="btn btn-light rounded-0 ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Quick view"><i class="fas fa-search"></i></button></div><button class="btn btn-block btn-dark w-100 rounded-0 p-3 text-uppercase fw-500 font-size-15"><i class="fas fa-shopping-cart me-2" ></i>Add to cart</button></div></div></div><div class="card-body text-center h-25"><h6 class="card-title fw-normal">'+ products[i].name +'</h6><p class="card-text fw-500">'+ products[i].price +'<del class="text-muted ms-2">'+ products[i].oldPrice +'</del></p></div></div></div>');
		break;

		default:
		$("#nav-tabContent .swiper-wrapper").append('<div class="swiper-slide"><div><div class="card text-dark p-0 border-0 rounded-0 h-75"><img src="' + products[i].imgSrc + '" class="card-img rounded-0 h-100 img-fluid" alt="..."><div class="card-img-overlay px-0"><div class="flex-column align-items-center position-absolute bottom-0 w-100 animated-card-buttons"><div class="mb-4"><button class="btn btn-light rounded-0 me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><i class="fas fa-heart"></i></button><button class="btn btn-light rounded-0 ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Quick view"><i class="fas fa-search"></i></button></div><button class="btn btn-block btn-dark w-100 rounded-0 p-3 text-uppercase fw-500 font-size-15"><i class="fas fa-shopping-cart me-2" ></i>Add to cart</button></div></div></div><div class="card-body text-center h-25"><h6 class="card-title fw-normal">'+ products[i].name +'</h6><p class="card-text fw-500">'+ products[i].price +'<del class="text-muted ms-2">'+ products[i].oldPrice +'</del></p></div></div></div>');

	}
};