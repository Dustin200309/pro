<?php
session_start();
include ("Location: ../config/conexion.php"); 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST['nombre'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($nombre === '' || $email === '' || $password === '') {
        header("Location: " . ($_SERVER['HTTP_REFERER'] ?? "../public/principal.html"));
        exit;
    }

    // Verificar duplicado
    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        // correo duplicado: redirige de vuelta (podrías agregar un ?error=1)
        header("Location: " . ($_SERVER['HTTP_REFERER'] ?? "../public/principal.html"));
        exit;
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (nombre, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $email, $hash);
    if ($stmt->execute()) {
        // crear sesión
        $_SESSION['user_id'] = $stmt->insert_id;
        $_SESSION['nombre'] = $nombre;
    }
    // redirigir de vuelta a la página anterior (o a principal)
    header("Location: " . ($_SERVER['HTTP_REFERER'] ?? "../public/principal.html"));
    exit;
}
?>
