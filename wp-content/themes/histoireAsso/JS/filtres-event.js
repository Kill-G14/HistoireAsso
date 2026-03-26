/**
 * Filtres Event — Système de filtres AJAX pour événements
 */

jQuery(document).ready(function ($) {
  const $resultsContainer = $(".filtres-results");
  const $resultsCount = $(".results-count");

  // Clic sur chip de filtre
  $(".chip").on("click", function () {
    const $chip = $(this);
    const era = $chip.data("era");

    // Toggle active state
    $(".chip").removeClass("active");
    $chip.addClass("active");

    // Lancer la requête AJAX
    filterEvents(era);
  });

  function filterEvents(era) {
    // Ajouter classe loading
    $resultsContainer.addClass("loading");

    // Requête AJAX
    $.ajax({
      url: ajaxFiltresEvent.ajax_url,
      type: "POST",
      data: {
        action: "filtrer_events",
        nonce: ajaxFiltresEvent.nonce,
        era: era,
      },
      success: function (response) {
        if (response.success) {
          // Remplacer le HTML
          $resultsContainer.html(response.data.html);

          // Mettre à jour le compteur
          updateResultsCount(response.data.count, era);

          // Animation d'entrée
          $resultsContainer.find(".card").css("opacity", "0");
          setTimeout(function () {
            $resultsContainer.find(".card").css({
              opacity: "1",
              transition: "opacity 0.5s ease",
            });
          }, 100);
        } else {
          console.error("Erreur filtre:", response.data);
        }
      },
      error: function (xhr, status, error) {
        console.error("Erreur AJAX:", error);
        $resultsContainer.html(
          '<p class="no-results">Une erreur est survenue. Veuillez réessayer.</p>'
        );
      },
      complete: function () {
        // Retirer classe loading
        $resultsContainer.removeClass("loading");
      },
    });
  }

  function updateResultsCount(count, era) {
    let eraLabel = "tous les événements";
    if (era && era !== "all") {
      const $activeChip = $('.chip[data-era="' + era + '"]');
      eraLabel = $activeChip.text().toLowerCase();
    }

    $resultsCount.html(
      `<strong>${count}</strong> événement${count > 1 ? "s" : ""} trouvé${
        count > 1 ? "s" : ""
      } pour <em>${eraLabel}</em>`
    );
  }
});
