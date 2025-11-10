<?php
$destinatario = "ivan.muller@davinci.edu.ar";
$asunto = "Nuevo mensaje desde el formulario de contacto";
$nombre   = $_POST['nombre'] ?? '';
$email    = $_POST['email'] ?? '';
$mensaje  = $_POST['mensaje'] ?? '';


if (empty($nombre) || empty($email) || empty($mensaje)) {
  echo '<div class="container text-center mt-5">
          <div class="alert alert-danger" role="alert">
            ❌ Faltan campos obligatorios. Por favor, completa todos los datos.
          </div>
          <a href="formulario.html" class="btn">Volver</a>
        </div>';
  exit;
}


$cuerpo = "
  <h2>Nuevo mensaje de contacto</h2>
  <p><strong>Nombre:</strong> $nombre</p>
  <p><strong>Email:</strong> $email</p>
  <p><strong>Mensaje:</strong><br>$mensaje</p>
";

$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: $nombre <$email>" . "\r\n";

if (mail($destinatario, $asunto, $cuerpo, $headers)) {
  echo '<div class="container text-center mt-5">
          <div class="alert alert-success" role="alert">
            ✅ Tu mensaje fue enviado con éxito. ¡Gracias por contactarte!
          </div>
          <a href="formulario.html" class="btn btn-primary">Volver al formulario</a>
        </div>';
} else {
  echo '<div class="container text-center mt-5">
          <div class="alert alert-danger" role="alert">
            ❌ Ocurrió un error al enviar el mensaje. Intenta nuevamente más tarde.
          </div>
          <a href="formulario.html" class="btn btn-secondary">Volver</a>
        </div>';
}
?>