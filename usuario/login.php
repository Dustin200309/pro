<?php
// Conectar con la base de datos
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar que no estén vacíos
    if (!empty($email) && !empty($password)) {

        // Buscar usuario por email
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();

            // Validar contraseña
            if (password_verify($password, $usuario['password'])) {
                echo "<h2> Bienvenido, " . $usuario['nombre'] . "!</h2>";
                echo "<a href='user.html'>Cerrar sesión</a>";
            } else {
                echo "<h3> Contraseña incorrecta</h3>";
                echo "<a href='user.html'>Intentar de nuevo</a>";
            }
        } else {
            echo "<h3>⚠️ No existe un usuario con ese email</h3>";
            echo "<a href='user.html'>Registrarse</a>";
        }

        $stmt->close();
    } else {
        echo "<h3>⚠️ Completa todos los campos</h3>";
    }
}

$conn->close();
?>
