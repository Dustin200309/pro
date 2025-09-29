// 👉 Eventos del header
        if (placeholderId === "header-placeholder") {
          // Botón "Regístrate"
          const btnRegister = document.getElementById("btnRegister");
          if (btnRegister) {
            btnRegister.addEventListener("click", (e) => {
              e.preventDefault();
              window.location.href = "../public/futuros.html";
            });
          }
}