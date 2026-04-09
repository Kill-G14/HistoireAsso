/**
 * Navigation avec effet Glassmorphisme
 * Design System: Digital Archivist
 */

(function () {
  "use strict";

  const nav = document.getElementById("mainNav");
  const burger = document.getElementById("navBurger");
  const menuWrapper = document.querySelector(".nav-menu-wrapper");

  let lastScrollTop = 0;
  const scrollThreshold = 100; // Pixels avant d'activer le glassmorphisme

  /**
   * Gestion du scroll - Active glassmorphisme
   */
  function handleScroll() {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    // Ajouter classe "scrolled" pour glassmorphisme
    if (scrollTop > scrollThreshold) {
      nav.classList.add("scrolled");
    } else {
      nav.classList.remove("scrolled");
    }

    // Cacher/Afficher navigation en fonction du sens du scroll
    if (scrollTop > lastScrollTop && scrollTop > 300) {
      // Scroll vers le bas - cacher nav
      nav.classList.add("hidden");
    } else {
      // Scroll vers le haut - afficher nav
      nav.classList.remove("hidden");
    }

    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
  }

  /**
   * Toggle menu mobile
   */
  function toggleMobileMenu() {
    const isExpanded = burger.getAttribute("aria-expanded") === "true";

    burger.setAttribute("aria-expanded", !isExpanded);
    burger.classList.toggle("active");
    menuWrapper.classList.toggle("active");
    document.body.classList.toggle("menu-open");
  }

  /**
   * Fermer le menu mobile au clic sur un lien
   */
  function closeMobileMenuOnLinkClick() {
    const menuLinks = menuWrapper.querySelectorAll("a");

    menuLinks.forEach((link) => {
      link.addEventListener("click", function () {
        if (window.innerWidth <= 768) {
          burger.classList.remove("active");
          menuWrapper.classList.remove("active");
          burger.setAttribute("aria-expanded", "false");
          document.body.classList.remove("menu-open");
        }
      });
    });
  }

  /**
   * Fermer le menu mobile au clic en dehors
   */
  function handleOutsideClick(event) {
    if (
      window.innerWidth <= 768 &&
      menuWrapper.classList.contains("active") &&
      !menuWrapper.contains(event.target) &&
      !burger.contains(event.target)
    ) {
      burger.classList.remove("active");
      menuWrapper.classList.remove("active");
      burger.setAttribute("aria-expanded", "false");
      document.body.classList.remove("menu-open");
    }
  }

  /**
   * Gestion du resize - Fermer menu mobile si passage en desktop
   */
  function handleResize() {
    if (window.innerWidth > 768 && menuWrapper.classList.contains("active")) {
      burger.classList.remove("active");
      menuWrapper.classList.remove("active");
      burger.setAttribute("aria-expanded", "false");
      document.body.classList.remove("menu-open");
    }
  }

  /**
   * Initialisation
   */
  function init() {
    // Event Listeners
    window.addEventListener("scroll", handleScroll, { passive: true });
    window.addEventListener("resize", handleResize);
    document.addEventListener("click", handleOutsideClick);

    if (burger) {
      burger.addEventListener("click", toggleMobileMenu);
    }

    // Fermer menu au clic sur liens
    closeMobileMenuOnLinkClick();

    // Appeler handleScroll au chargement pour état initial
    handleScroll();
  }

  // Lancer l'initialisation quand le DOM est prêt
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }
})();
