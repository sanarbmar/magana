<?php
/**
 * Solicitud de llamada (index.html, como.html, conversemos.html)
 * Campos: nombre, telefono
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

function una_linea($v, $max = 120) {
    $v = strip_tags(trim((string)$v));
    $v = preg_replace('/[\r\n]+/', ' ', $v);
    return mb_substr($v, 0, $max, 'UTF-8');
}

$nombre   = una_linea($_POST['nombre'] ?? '', 120);
$telefono = una_linea($_POST['telefono'] ?? '', 30);

if ($nombre === '' || $telefono === '') {
    http_response_code(400);
    echo 'Todos los campos son obligatorios.';
    exit;
}

if (!preg_match('/^[0-9+()\-\s.]{7,30}$/', $telefono)) {
    http_response_code(400);
    echo 'Por favor, escribe un número de teléfono válido.';
    exit;
}

$asunto  = 'Solicitud de llamada desde sitio web';
$mensaje = "Nombre: $nombre\nTeléfono: $telefono\n";

$headers  = "From: Sitio Web Magna Comunicaciones <$REMITENTE>\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headers .= "Content-Transfer-Encoding: 8bit\r\n";

if (@mail($DESTINO, mb_encode_mimeheader($asunto, 'UTF-8', 'B'), $mensaje, $headers, '-f' . $REMITENTE)) {
    echo 'Tu solicitud ha sido enviada.';
} else {
    error_log('xsend_mail.php: mail() falló para ' . $nombre);
    http_response_code(500);
    echo 'Hubo un error al enviar la solicitud. Por favor, escríbenos a ' . $DESTINO;
}
