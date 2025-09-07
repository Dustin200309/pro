document.addEventListener("DOMContentLoaded", () => {
  const footerPlaceholder = document.getElementById("footer-placeholder");

  fetch("../compartido/footer.html")
    .then(res => res.text())
    .then(data => {
      footerPlaceholder.innerHTML = data;

      // Asegurar que el CSS se cargue solo una vez
      if (!document.querySelector('link[href="../compartido/footer.css"]')) {
        const cssLink = document.createElement("link");
        cssLink.rel = "stylesheet";
        cssLink.href = "../compartido/footer.css";
        document.head.appendChild(cssLink);
      }
    })
    .catch(err => console.error("❌ Error cargando footer:", err));
});
