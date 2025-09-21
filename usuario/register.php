<?php
// Conectar con la base de datos
include("conexion.php");

// Verificar que los datos vienen del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validar que no estén vacíos
    if (!empty($nombre) && !empty($email) && !empty($password)) {
        
        // Encriptar contraseña (seguridad)
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Insertar usuario
        $sql = "INSERT INTO users (nombre, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nombre, $email, $passwordHash);

        if ($stmt->execute()) {
            echo "<h3>✅ Usuario registrado con éxito</h3>";
            echo "<a href='user.html'>Volver al login</a>";
        } else {
            echo "<h3>❌ Error: " . $stmt->error . "</h3>";
        }

        $stmt->close();
    } else {
        echo "<h3>⚠️ Todos los campos son obligatorios</h3>";
    }
}

$conn->close();
?>
