document.addEventListener("DOMContentLoaded", async () => {
  async function loadComponent(placeholderId, filePath, cssPath) {
    const placeholder = document.getElementById(placeholderId);
    if (placeholder) {
      try {
        const res = await fetch(filePath);
        const html = await res.text();
        placeholder.innerHTML = html;

        if (cssPath && !document.querySelector(`link[href="${cssPath}"]`)) {
          const cssLink = document.createElement("link");
          cssLink.rel = "stylesheet";
          cssLink.href = cssPath;
          document.head.appendChild(cssLink);
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
