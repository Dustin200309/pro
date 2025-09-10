<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"] ?? "";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Correo inválido.";
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.office365.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'u22248827@utp.edu.pe'; 
        $mail->Password   = 'SamirDustin09';        
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Remitente
        $mail->setFrom('u22248827@utp.edu.pe', 'DYR Marketplace');

        // Destinatario 
        $mail->addAddress($email);

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Bienvenido a DYR 🎮';
        $mail->Body    = "
            <h2>¡Te has suscrito a DYR!</h2>
            <p>Bienvenido a ser parte de nuestra familia gamer 🎮✨</p>
            <p>Esperamos que encuentres lo que estás buscando.</p>
        ";

        $mail->send();
        echo "¡Suscripción exitosa! Revisa tu correo: $email";
    } catch (Exception $e) {
        echo "Error al enviar el correo. Detalles: {$mail->ErrorInfo}";
    }
} else {
    echo "Acceso inválido.";
}
