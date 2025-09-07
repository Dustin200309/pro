// Cargar header dinámicamente
fetch('../compartido/header.html')
  .then(response => response.text())
  .then(data => {
    document.getElementById('header-placeholder').innerHTML = data;

    // Mueve aquí cualquier código relacionado con el header
    const btnMapa = document.getElementById("btnMapa");
    if (btnMapa) {
      btnMapa.addEventListener("click", function () {
        window.open("https://www.google.com/maps/place/Lima,+Perú/", "_blank");
      });
    }
  })
  .catch(error => console.error("Error cargando el header:", error));
