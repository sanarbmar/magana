<?php
/**
 * Formulario de contacto (conversemos.html)
 * Campos: name, email, subject, message
 */
header('Content-Type: text/plain; charset=UTF-8');

// ---- Configuración -------------------------------------------------------
$DESTINO   = 'somos@magnacomunicaciones.com';
$REMITENTE = 'no-reply@magnacomunicaciones.com'; // debe existir en el dominio del hosting
// --------------------------------------------------------------------------

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo 'Acceso no permitido.';
    exit;
}

// Honeypot anti-spam (si algún bot llena este campo oculto, se ignora en silencio)
if (!empty($_POST['website'])) {
    echo '¡Mensaje enviado con éxito!';
    exit;
}

function una_linea($v, $max = 200) {
    $v = strip_tags(trim((string)$v));
    $v = preg_replace('/[\r\n]+/', ' ', $v);
    return mb_substr($v, 0, $max, 'UTF-8');
}

$name    = una_linea($_POST['name'] ?? '', 120);
$email   = una_linea($_POST['email'] ?? '', 160);
$subject = una_linea($_POST['subject'] ?? '', 160);
$message = mb_substr(strip_tags(trim((string)($_POST['message'] ?? ''))), 0, 5000, 'UTF-8');

if ($name === '' || $message === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo 'Por favor, completa todos los campos correctamente.';
    exit;
}

$asunto = 'Formulario de sitio web: ' . ($subject !== '' ? $subject : 'Contacto');
$cuerpo = "Has recibido un nuevo mensaje del formulario de contacto.\n\n"
        . "Nombre: $name\n"
        . "Correo: $email\n"
        . "Asunto: $subject\n"
        . "Mensaje:\n$message\n";

$headers  = "From: Sitio Web Magna Comunicaciones <$REMITENTE>\r\n";
$headers .= "Reply-To: $name <$email>\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headers .= "Content-Transfer-Encoding: 8bit\r\n";

$asunto_codificado = mb_encode_mimeheader($asunto, 'UTF-8', 'B');

// El quinto parámetro (-f) fija el remitente de sobre; ayuda a la entregabilidad en cPanel/Exim.
if (@mail($DESTINO, $asunto_codificado, $cuerpo, $headers, '-f' . $REMITENTE)) {
    echo '¡Mensaje enviado con éxito!';
} else {
    error_log('send_email.php: mail() falló para ' . $email);
    http_response_code(500);
    echo 'Hubo un problema al enviar el mensaje. Por favor, escríbenos a ' . $DESTINO;
}
