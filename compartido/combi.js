document.addEventListener("DOMContentLoaded", async () => {
  async function loadComponent(placeholderId, filePath, cssPath) {
    const placeholder = document.getElementById(placeholderId);
    if (placeholder) {
      try {
        const res = await fetch(filePath);
        const html = await res.text();
        placeholder.innerHTML = html;

        // 👉 Insertar CSS solo si no existe y mantener orden
        if (cssPath && !document.querySelector(`link[href="${cssPath}"]`)) {
          const cssLink = document.createElement("link");
          cssLink.rel = "stylesheet";
          cssLink.href = cssPath;
          const firstLink = document.querySelector("link[rel='stylesheet']");
          if (firstLink) {
            document.head.insertBefore(cssLink, firstLink);
          } else {
            document.head.appendChild(cssLink);
          }
        }

        // 👉 Solo enganchar eventos después de cargar el header
        if (placeholderId === "header-placeholder") {
          const btnRegister = document.getElementById("btnRegister");
          if (btnRegister) {
            btnRegister.addEventListener("click", (e) => {
              e.preventDefault();
              // 🔹 Ruta corregida porque User.html está en /usuario/
              window.location.href = "../usuario/User.html";
            });
          }
        }

      } catch (err) {
        console.error(`❌ Error cargando ${filePath}:`, err);
      }
    }
  }

  // Cargar header y footer
  await loadComponent("header-placeholder", "../compartido/header.html", "../compartido/header.css");
  await loadComponent("footer-placeholder", "../compartido/footer.html", "../compartido/footer.css");
});
