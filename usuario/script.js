const auth = document.getElementById('auth');

document.getElementById('goRegister').addEventListener('click', () => {
  auth.classList.add('swap');   // Muestra REGISTRO
});

document.getElementById('goLogin').addEventListener('click', () => {
  auth.classList.remove('swap'); // Vuelve a LOGIN
});

// Para abrir directamente en REGISTRO al cargar:
// auth.classList.add('swap');
