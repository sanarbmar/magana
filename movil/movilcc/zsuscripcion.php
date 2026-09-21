<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Dirección a la que se enviará el correo
    $destinatario = "somos@magnacomnicaciones.com";
    // Asunto del correo
    $asunto = "Nuevo correo para suscripción";

    // Obtenemos el correo electrónico ingresado en el formulario
    $correoIngresado = $_POST['email'] ?? '';

    // Preparamos el mensaje
    $mensaje = "Se ha suscrito el siguiente correo: " . $correoIngresado;

    // Cabeceras (para indicar remitente y contenido HTML)
    $cabeceras  = "From: no-reply@magnacomunicaciones.com\r\n";
    $cabeceras .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Enviamos el correo
    if (mail($destinatario, $asunto, $mensaje, $cabeceras)) {
        // Redirección al archivo "exito.html"
        header("Location: index.html");
        exit;
    } else {
        // Redirección al archivo "error.html"
        header("Location: index.html");
        exit;
    }
}
?>
