document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("newsletterForm");
  const msg = document.getElementById("nl-msg");

  if (!form) return; // seguridad por si el form no existe

  form.addEventListener("submit", (e) => {
    e.preventDefault();
    const email = (form.email.value || "").trim();

    //  para validar email osea si es gmail 
    const ok = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);

    if (!ok) {
      msg.textContent = "Ingrese un correo válido 🙏";
      msg.className = "newsletter__msg newsletter__msg--err";
      return;
    }

    // Simulamos éxito:
    msg.textContent = "¡Listo! Te enviamos un correo de confirmación 🎉";
    msg.className = "newsletter__msg newsletter__msg--ok";

    form.reset();
  });
});
