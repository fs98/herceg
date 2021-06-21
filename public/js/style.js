// Navbar Active Class

function addingActiveClass(id) {
  var element = document.getElementById(id);
  element.classList.add("active");
}

// Tooltip

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

// Card animation

$("#nav-tabContent .card, #randomItems .card").hover(function() {
		$(this).find(".animated-card-buttons").css("display","flex").hide().fadeIn();
	}, function() {
		$(this).find(".animated-card-buttons").css("display","none");
	})

$("#imageCards .card").hover(function() {
	$(this).find("img").css({
		'transform' : 'scale(1.2)',
	'-webkit-transform' : 'scale(1.2)',
	'-o-transform': 'scale(1.2)',
	'-moz-transform': 'scale(1.2)',
	'transition-duration': '0.7s'
	});
	$(this).find("h2").css({
		'color' : '#f27935',
		'transition' : '0.5s'
	});
	$(this).find(".card-img-overlay").css({
		'background-color' : 'rgba(255, 255, 255, 0.5)',
	});
}, function() {
	$(this).find("img").css({
		'transform' : 'scale(1)',
	'-webkit-transform' : 'scale(1)',
	'-o-transform': 'scale(1)',
	'-moz-transform': 'scale(1)',
	'transition-duration': '0.7s'
	});
	$(this).find("h2").css({
		'color' : 'white'
	});
	$(this).find(".card-img-overlay").css({
		'background-color' : 'transparent',
	});
})