<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = 2;                      // Enable verbose debug output
    $mail->isSMTP();                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                   // Enable SMTP authentication
    $mail->Username   = 'jordygongora11@gmail.com';  // SMTP username
    $mail->Password   = 'pgry pwtg wbmh ycmt';        // SMTP password
    $mail->SMTPSecure = 'tls';                  // Enable TLS encryption
    $mail->Port       = 587;                    // TCP port to connect to

    // Recipients
    $mail->setFrom('jordygongora11@gmail.com', 'Jordi Marrufo');
    $mail->addAddress('jordyedersonmarrufogongora@gmail.com', 'Juanito'); // Add a recipient

    // Content
    $subject = $_POST['subject']; // Get subject from form
    $message = $_POST['message']; // Get message from form

    $mail->isHTML(true);                    // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header("location: listar_servicio.php");
} catch (Exception $e) {
    header("location: formulario.php");
}

