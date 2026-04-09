/**
 * Carousel Intervenants - Navigation & Interactions
 * Design System: Digital Archivist
 */

(function () {
  "use strict";

  /**
   * Initialise tous les carousels sur la page
   */
  function initCarousels() {
    const carousels = document.querySelectorAll(".carousel-intervenants");

    carousels.forEach((carousel) => {
      const wrapper = carousel.querySelector(".carousel-wrapper");
      const prevBtn = carousel.querySelector(".carousel-nav-prev");
      const nextBtn = carousel.querySelector(".carousel-nav-next");
      const dots = carousel.querySelectorAll(".carousel-dot");

      if (!wrapper) return;

      // Navigation par flèches
      if (prevBtn) {
        prevBtn.addEventListener("click", () => {
          wrapper.scrollBy({ left: -400, behavior: "smooth" });
        });
      }

      if (nextBtn) {
        nextBtn.addEventListener("click", () => {
          wrapper.scrollBy({ left: 400, behavior: "smooth" });
        });
      }

      // Navigation par dots
      dots.forEach((dot, index) => {
        dot.addEventListener("click", () => {
          const slides = wrapper.querySelectorAll(".carousel-slide");
          if (slides[index]) {
            slides[index].scrollIntoView({
              behavior: "smooth",
              block: "nearest",
              inline: "center",
            });
          }
        });
      });

      // Update active dot on scroll
      wrapper.addEventListener("scroll", () => {
        updateActiveDot(carousel);
      });

      // Drag to scroll (desktop)
      let isDown = false;
      let startX;
      let scrollLeft;

      wrapper.addEventListener("mousedown", (e) => {
        isDown = true;
        wrapper.style.cursor = "grabbing";
        startX = e.pageX - wrapper.offsetLeft;
        scrollLeft = wrapper.scrollLeft;
      });

      wrapper.addEventListener("mouseleave", () => {
        isDown = false;
        wrapper.style.cursor = "grab";
      });

      wrapper.addEventListener("mouseup", () => {
        isDown = false;
        wrapper.style.cursor = "grab";
      });

      wrapper.addEventListener("mousemove", (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - wrapper.offsetLeft;
        const walk = (x - startX) * 1.5;
        wrapper.scrollLeft = scrollLeft - walk;
      });

      // Touch support
      wrapper.style.cursor = "grab";
    });
  }

  /**
   * Met à jour le dot actif en fonction du scroll
   */
  function updateActiveDot(carousel) {
    const wrapper = carousel.querySelector(".carousel-wrapper");
    const slides = wrapper.querySelectorAll(".carousel-slide");
    const dots = carousel.querySelectorAll(".carousel-dot");

    if (!dots.length) return;

    const wrapperCenter = wrapper.scrollLeft + wrapper.offsetWidth / 2;

    let activeIndex = 0;
    let minDistance = Infinity;

    slides.forEach((slide, index) => {
      const slideCenter = slide.offsetLeft + slide.offsetWidth / 2;
      const distance = Math.abs(wrapperCenter - slideCenter);

      if (distance < minDistance) {
        minDistance = distance;
        activeIndex = index;
      }
    });

    dots.forEach((dot, index) => {
      if (index === activeIndex) {
        dot.classList.add("active");
      } else {
        dot.classList.remove("active");
      }
    });
  }

  /**
   * Initialisation au chargement du DOM
   */
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initCarousels);
  } else {
    initCarousels();
  }
})();
