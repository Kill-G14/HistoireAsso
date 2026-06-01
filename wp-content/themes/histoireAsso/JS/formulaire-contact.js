/**
 * Gestion du formulaire de contact
 */

document.addEventListener("DOMContentLoaded", function () {
  const contactForm = document.getElementById("contact-form");

  if (!contactForm) return;

  // Intercepter le clic sur le bouton submit (qui est un lien <a>)
  const contactSubmitButton = contactForm.querySelector(".submit-btn");

  if (contactSubmitButton) {
    contactSubmitButton.addEventListener("click", function (e) {
      e.preventDefault();

      // Soumettre le formulaire
      submitContactForm();
    });
  }

  // Soumettre aussi si on appuie sur Entrée dans un champ
  contactForm.addEventListener("submit", function (e) {
    e.preventDefault();
    submitContactForm();
  });

  function submitContactForm() {
    const contactResponseDiv = contactForm.querySelector(".form-response");
    const contactSubmitButton = contactForm.querySelector(".submit-btn");

    // Désactiver le bouton pendant l'envoi
    if (contactSubmitButton) {
      contactSubmitButton.style.opacity = "0.5";
      contactSubmitButton.style.pointerEvents = "none";
    }

    // Récupérer les données du formulaire
    const contactFormData = new FormData(contactForm);
    contactFormData.append("action", "submit_contact_form");

    // Envoyer via AJAX
    fetch(ajaxurl, {
      method: "POST",
      body: contactFormData,
    })
      .then((response) => response.json())
      .then((ajaxResponse) => {
        // Réactiver le bouton
        if (contactSubmitButton) {
          contactSubmitButton.style.opacity = "1";
          contactSubmitButton.style.pointerEvents = "auto";
        }

        if (ajaxResponse.success) {
          // Succès
          contactResponseDiv.textContent = ajaxResponse.data;
          contactResponseDiv.classList.remove("error");
          contactResponseDiv.classList.add("success");
          contactResponseDiv.style.display = "block";
          contactForm.reset();
        } else {
          // Erreur
          contactResponseDiv.textContent = ajaxResponse.data;
          contactResponseDiv.classList.remove("success");
          contactResponseDiv.classList.add("error");
          contactResponseDiv.style.display = "block";
        }

        // Faire défiler vers le message
        contactResponseDiv.scrollIntoView({
          behavior: "smooth",
          block: "nearest",
        });
      })
      .catch((ajaxError) => {
        // Réactiver le bouton
        if (contactSubmitButton) {
          contactSubmitButton.style.opacity = "1";
          contactSubmitButton.style.pointerEvents = "auto";
        }

        console.error("Erreur AJAX formulaire contact:", ajaxError);
        contactResponseDiv.textContent =
          "Une erreur est survenue. Veuillez réessayer.";
        contactResponseDiv.classList.remove("success");
        contactResponseDiv.classList.add("error");
        contactResponseDiv.style.display = "block";
      });
  }
});
