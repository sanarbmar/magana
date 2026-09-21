<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);
    $telefono = trim($_POST["telefono"]);

    if (empty($nombre) || empty($telefono)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    $to = "somos@magnacomunicaciones.com";
    $subject = "Solicitud de llamada desde sitio web";
    $message = "Nombre: $nombre\nTeléfono: $telefono";
    $headers = "From: no-reply@magnacomunicaciones.com\r\n" .
               "Reply-To: $to\r\n" .
               "Content-Type: text/plain; charset=UTF-8";

    if (mail($to, $subject, $message, $headers)) {
        echo "Enviado .";
    } else {
        echo "Hubo un error al enviar el correo.";
    }
}
?>
