<?php
$host = "localhost";       // Servidor
$user = "root";            // Usuario de MySQL
$pass = "";                // XAMPP root normalmente NO tiene contraseña
$db   = "login_system";    // Base de datos

$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
