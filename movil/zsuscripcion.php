<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Si es el formulario de contacto navideño (tiene nombre, empresa, tipo_experiencia, telefono, email)
    if (
        isset($_POST['nombre']) && isset($_POST['empresa']) && isset($_POST['tipo_experiencia']) && isset($_POST['telefono']) && isset($_POST['email'])
    ) {
        $destinatario = "Somos@magnacomunicaciones.com";
        $asunto = "Nueva solicitud de Planea tu Navidad";
        $nombre = htmlspecialchars($_POST['nombre']);
        $empresa = htmlspecialchars($_POST['empresa']);
        $tipo_experiencia = htmlspecialchars($_POST['tipo_experiencia']);
        $telefono = htmlspecialchars($_POST['telefono']);
        $email = htmlspecialchars($_POST['email']);
        $mensaje = "<h2>Solicitud de Planea tu Navidad</h2>"
                 . "<b>Nombre:</b> $nombre<br>"
                 . "<b>Empresa:</b> $empresa<br>"
                 . "<b>Tipo de experiencia:</b> $tipo_experiencia<br>"
                 . "<b>Teléfono:</b> $telefono<br>"
                 . "<b>Email:</b> $email<br>";
        $cabeceras  = "From: no-reply@magnacomunicaciones.com\r\n";
        $cabeceras .= "Content-Type: text/html; charset=UTF-8\r\n";
        if (mail($destinatario, $asunto, $mensaje, $cabeceras)) {
            header("Location: navidad.html?enviado=1");
            exit;
        } else {
            header("Location: navidad.html?enviado=0");
            exit;
        }
    }
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
