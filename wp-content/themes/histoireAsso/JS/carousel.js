/**
 * Carousel.js — Artifact Carousel avec Swiper.js
 */

document.addEventListener("DOMContentLoaded", function () {
  // Initialiser tous les carousels sur la page
  const carousels = document.querySelectorAll(".artifact-carousel .swiper");

  carousels.forEach(function (carousel) {
    new Swiper(carousel, {
      // Options principales
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      centeredSlides: true,

      // Effect 3D
      effect: "coverflow",
      coverflowEffect: {
        rotate: 20,
        stretch: 0,
        depth: 200,
        modifier: 1,
        slideShadows: true,
      },

      // Navigation
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },

      // Pagination
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },

      // Autoplay (optionnel)
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },

      // Responsive breakpoints
      breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 30,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 40,
        },
      },
    });
  });
});
