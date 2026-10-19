<?php
/**
 * Suscripción al boletín (formularios "newsletter" de todas las páginas)
 * Campo: email. Muestra una página de confirmación y regresa al inicio.
 */
header('Content-Type: text/html; charset=UTF-8');

// ---- Configuración -------------------------------------------------------
$DESTINO   = 'somos@magnacomunicaciones.com';
$REMITENTE = 'no-reply@magnacomunicaciones.com'; // debe existir en el dominio del hosting
// --------------------------------------------------------------------------

function pagina($titulo, $texto) {
    $titulo = htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8');
    $texto  = htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
    echo '<!DOCTYPE html><html lang="es-CO"><head><meta charset="utf-8">'
       . '<meta name="viewport" content="width=device-width, initial-scale=1">'
       . '<meta name="robots" content="noindex">'
       . '<meta http-equiv="refresh" content="4;url=index.html">'
       . '<title>' . $titulo . ' | Magna Comunicaciones</title>'
       . '<style>body{margin:0;min-height:100vh;display:flex;align-items:center;justify-content:center;'
       . 'background:#1d1d1d;color:#fff;font-family:system-ui,Segoe UI,Arial,sans-serif;text-align:center;padding:24px}'
       . 'h1{color:#ff5a27;margin:0 0 12px}a{color:#ff5a27}</style></head><body><main>'
       . '<h1>' . $titulo . '</h1><p>' . $texto . '</p>'
       . '<p><a href="index.html">Volver al inicio</a></p></main></body></html>';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.html');
    exit;
}

$correo = trim((string)($_POST['email'] ?? ''));
$correo = preg_replace('/[\r\n]+/', '', $correo);

if (!filter_var($correo, FILTER_VALIDATE_EMAIL) || strlen($correo) > 160) {
    http_response_code(400);
    pagina('Correo no válido', 'Por favor revisa el correo e inténtalo de nuevo.');
}

$asunto  = 'Nuevo correo para suscripción';
$mensaje = 'Se ha suscrito el siguiente correo: ' . $correo;

$headers  = "From: Sitio Web Magna Comunicaciones <$REMITENTE>\r\n";
$headers .= "Reply-To: $correo\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

if (@mail($DESTINO, mb_encode_mimeheader($asunto, 'UTF-8', 'B'), $mensaje, $headers, '-f' . $REMITENTE)) {
    pagina('¡Gracias por suscribirte!', 'Hemos recibido tu correo. Te mantendremos al tanto de nuestras novedades.');
}

error_log('zsuscripcion.php: mail() falló para ' . $correo);
http_response_code(500);
pagina('No pudimos completar la suscripción', 'Inténtalo de nuevo en unos minutos o escríbenos a ' . $DESTINO . '.');
