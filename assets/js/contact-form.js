(function () {
  "use strict";

  const forms = document.querySelectorAll(".php-email-form");

  forms.forEach((form) => {
    form.addEventListener("submit", async (event) => {
      event.preventDefault();

      const loading = form.querySelector(".loading");
      const errorMessage = form.querySelector(".error-message");
      const sentMessage = form.querySelector(".sent-message");
      const submitButton = form.querySelector("[type='submit']");
      const recaptchaInput = form.querySelector("[name='recaptcha_token']");
      const siteKey = form.getAttribute("data-recaptcha-site-key");

      setMessage(loading, true);
      setMessage(errorMessage, false);
      setMessage(sentMessage, false);

      if (submitButton) {
        submitButton.disabled = true;
      }

      try {
        if (siteKey && recaptchaInput && window.grecaptcha) {
          await new Promise((resolve) => window.grecaptcha.ready(resolve));
          recaptchaInput.value = await window.grecaptcha.execute(siteKey, { action: "contact" });
        }

        const data = new FormData(form);
        if (data.has("service_focus")) {
          data.set("subject", "Bitree Studio: " + data.get("service_focus"));
          data.set("message", data.get("message") + "\n\nTarget timeline: " + (form.querySelector("[name='timeline'] option:checked")?.textContent || "Not specified"));
        }
        const response = await fetch(form.action, {
          method: form.method || "POST",
          body: data,
          headers: {
            "X-Requested-With": "XMLHttpRequest"
          }
        });

        let result;
        try {
          result = await response.json();
        } catch {
          throw new Error("We couldn't send your inquiry. Please try again or email contact@bitreemw.com.");
        }

        if (!response.ok || !result.success) {
          throw new Error(result.message || "Message could not be sent.");
        }

        form.reset();
        setMessage(sentMessage, true, result.message || "Message sent successfully.");
      } catch (error) {
        setMessage(errorMessage, true, error.message || "Message could not be sent.");
      } finally {
        setMessage(loading, false);

        if (submitButton) {
          submitButton.disabled = false;
        }
      }
    });
  });

  function setMessage(element, visible, text) {
    if (!element) {
      return;
    }

    if (text) {
      element.textContent = text;
    }

    element.style.display = visible ? "block" : "none";
  }
})();
