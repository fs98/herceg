require('./bootstrap');

// Import Sweet Alert
import Swal from 'sweetalert2';

// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle'; 

// import Swiper styles
import 'swiper/swiper-bundle.css';

// Custom JS
window.onload = function() { 
  
  // Swiper Init
  var itemsSwiper = new Swiper('.items-swiper', {
    slidesPerView: 1,
    loop: true,
    spaceBetween: 10,
    speed: 1000,
    autoplay: {
      delay: 2000,
    },
    // init: false,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 25,
      },
      992: {
        slidesPerView: 4,
        spaceBetween: 30,
      },
      1200: {
        slidesPerView: 5,
        spaceBetween: 40,
      },
    },
  });
  $('.items-swiper').on('mouseenter', function(){
    itemsSwiper.autoplay.stop();
  })
  $('.items-swiper').on('mouseleave', function(){
    itemsSwiper.autoplay.start();
  })

  var shopsSwiper = new Swiper(".shops-swiper", {
    effect: "coverflow", 
    grabCursor: true,
    slidesPerView: 1,
    coverflowEffect: {
      rotate: 50,
      stretch: 10,
      depth: 100,
      modifier: 1,
      slideShadows: false,
    },
    breakpoints: { 
      992: {
        slidesPerView: 2, 
      }, 
    },
  });
  
  // Aos Init
  AOS.init({
    once: true,
  });
}