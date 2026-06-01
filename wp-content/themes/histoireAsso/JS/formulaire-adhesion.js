/**
 * Gestion du formulaire d'adhésion
 */

document.addEventListener("DOMContentLoaded", function () {
  const adhesionForm = document.getElementById("join-form");

  if (!adhesionForm) return;

  // Intercepter le clic sur le bouton submit (qui est un lien <a>)
  const adhesionSubmitButton = adhesionForm.querySelector(".submit-btn");

  if (adhesionSubmitButton) {
    adhesionSubmitButton.addEventListener("click", function (e) {
      e.preventDefault();

      // Soumettre le formulaire
      submitJoinForm();
    });
  }

  // Soumettre aussi si on appuie sur Entrée dans un champ
  adhesionForm.addEventListener("submit", function (e) {
    e.preventDefault();
    submitJoinForm();
  });

  function submitJoinForm() {
    const adhesionResponseDiv = adhesionForm.querySelector(".form-response");
    const adhesionSubmitButton = adhesionForm.querySelector(".submit-btn");

    // Désactiver le bouton pendant l'envoi
    if (adhesionSubmitButton) {
      adhesionSubmitButton.style.opacity = "0.5";
      adhesionSubmitButton.style.pointerEvents = "none";
    }

    // Récupérer les données du formulaire
    const adhesionFormData = new FormData(adhesionForm);
    adhesionFormData.append("action", "submit_join_form");

    // Envoyer via AJAX
    fetch(ajax_params.ajaxurl, {
      method: "POST",
      body: adhesionFormData,
    })
      .then((response) => response.json())
      .then((ajaxResponse) => {
        // Réactiver le bouton
        if (adhesionSubmitButton) {
          adhesionSubmitButton.style.opacity = "1";
          adhesionSubmitButton.style.pointerEvents = "auto";
        }

        if (ajaxResponse.success) {
          // Succès
          adhesionResponseDiv.textContent = ajaxResponse.data;
          adhesionResponseDiv.classList.remove("error");
          adhesionResponseDiv.classList.add("success");
          adhesionResponseDiv.style.display = "block";
          adhesionForm.reset();
        } else {
          // Erreur
          adhesionResponseDiv.textContent = ajaxResponse.data;
          adhesionResponseDiv.classList.remove("success");
          adhesionResponseDiv.classList.add("error");
          adhesionResponseDiv.style.display = "block";
        }

        // Faire défiler vers le message
        adhesionResponseDiv.scrollIntoView({
          behavior: "smooth",
          block: "nearest",
        });
      })
      .catch((ajaxError) => {
        // Réactiver le bouton
        if (adhesionSubmitButton) {
          adhesionSubmitButton.style.opacity = "1";
          adhesionSubmitButton.style.pointerEvents = "auto";
        }

        console.error("Erreur AJAX formulaire adhésion:", ajaxError);
        adhesionResponseDiv.textContent =
          "Une erreur est survenue. Veuillez réessayer.";
        adhesionResponseDiv.classList.remove("success");
        adhesionResponseDiv.classList.add("error");
        adhesionResponseDiv.style.display = "block";
      });
  }
});
