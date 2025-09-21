<?php
include 'conexion.php';

if ($conn && !$conn->connect_error) {
    echo "✅ Conexión exitosa a la base de datos";
} else {
    echo "❌ Error en la conexión: " . $conn->connect_error;
}
?>
