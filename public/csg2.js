document.addEventListener("DOMContentLoaded", () => {
  const toggleBtn = document.getElementById("toggle-btn");
  const cajasOcultas = document.querySelectorAll(".case-card.hidden");
  let mostrandoMas = false;

  toggleBtn.addEventListener("click", () => {
    if (!mostrandoMas) {
      cajasOcultas.forEach(caja => caja.classList.remove("hidden"));
      toggleBtn.textContent = "Ver menos";
      mostrandoMas = true;
    } else {
      cajasOcultas.forEach(caja => caja.classList.add("hidden"));
      toggleBtn.textContent = "Ver más";
      mostrandoMas = false;
    }
  });
});
