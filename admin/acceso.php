<?php
$servername = "localhost"; // Nombre del servidor (normalmente localhost para XAMPP)
$username = "root";       // Nombre de usuario (por defecto es root en XAMPP)
$password = "";           // Contraseña (por defecto está vacía para root)
$database = "DYR"; // El nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}
echo "¡Conexión exitosa!";

$conn->close(); // Cerrar la conexión
?>
