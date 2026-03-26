/**
 * Navbar.js — Navigation avec glassmorphisme et effet scroll
 */

jQuery(document).ready(function ($) {
  const $navbar = $(".navbar");
  let lastScroll = 0;

  // Effet scroll : glassmorphisme + hide/show
  $(window).on("scroll", function () {
    const currentScroll = $(this).scrollTop();

    // Ajouter glassmorphisme après 100px de scroll
    if (currentScroll > 100) {
      $navbar.addClass("scrolled");
    } else {
      $navbar.removeClass("scrolled");
    }

    // Hide navbar on scroll down, show on scroll up
    if (currentScroll > lastScroll && currentScroll > 200) {
      $navbar.addClass("hidden");
    } else {
      $navbar.removeClass("hidden");
    }

    lastScroll = currentScroll;
  });

  // Menu mobile toggle
  $(".menu-toggle").on("click", function () {
    $(".navbar-menu").toggleClass("active");
    $(this).toggleClass("active");
  });

  // Fermer menu mobile au clic sur lien
  $(".navbar-menu a").on("click", function () {
    if ($(window).width() <= 768) {
      $(".navbar-menu").removeClass("active");
      $(".menu-toggle").removeClass("active");
    }
  });
});
