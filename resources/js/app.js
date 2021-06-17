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
  var swiper = new Swiper('.swiper-container', {
    slidesPerView: 1,
    slidesPerGroup: 3,
    spaceBetween: 10,
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
  
  // Aos Init
  AOS.init({
    once: true,
  });
}