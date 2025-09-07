document.addEventListener("DOMContentLoaded", async () => {
  const placeholder = document.getElementById("header-placeholder");

  try {
    // Cargar el HTML del header
    const response = await fetch("../compartido/header.html");
    const html = await response.text();
    placeholder.innerHTML = html;

    // Agregar el CSS del header al <head>
    const cssLink = document.createElement("link");
    cssLink.rel = "stylesheet";
    cssLink.href = "../compartido/header.css"; // revisa la ruta!!
    document.head.appendChild(cssLink);

    console.log("✅ Header y estilos cargados");
  } catch (error) {
    console.error("❌ Error al cargar el header:", error);
  }
});
