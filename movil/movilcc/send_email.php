<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = strip_tags(trim($_POST["message"]));

    // Validación de campos
    if (empty($name) || empty($email) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Por favor, completa todos los campos correctamente.";
        exit;
    }

    // Configuración del correo
    $to = "somos@magnacomunicaciones.com";
    $email_subject = "Formulario de sitio web: " . $subject;
    $email_body = "Has recibido un nuevo mensaje del formulario de contacto.\n\n".
                  "Nombre: $name\n".
                  "Correo: $email\n".
                  "Asunto: $subject\n".
                  "Mensaje:\n$message\n";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Enviar correo
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "¡Mensaje enviado con éxito!";
    } else {
        echo "Hubo un problema al enviar el mensaje.";
    }
} else {
    echo "Acceso no permitido.";
}
?>
