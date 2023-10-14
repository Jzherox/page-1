<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo "La dirección de correo electrónico no es válida.";
        exit;
    }

    $destinatario = "eliasballadares2004@gmail.com";
    $asunto_respuesta = "Confirmación de envío del formulario de contacto";
    $mensaje_respuesta = "Se ha recibido un mensaje del formulario de contacto con la siguiente dirección de correo: " . $correo;
    $cabeceras_respuesta = "From: " . $destinatario . "\r\n" .
        "Reply-To: " . $destinatario . "\r\n" .
        "X-Mailer: PHP/" . phpversion();

    if (mail($destinatario, $asunto_respuesta, $mensaje_respuesta, $cabeceras_respuesta)) {
        header("Location: ../morepages/send.html");
        exit;
    } else {
        echo "Hubo un error al enviar el correo electrónico de confirmación.";
    }
} else {
    echo "Hubo un error al enviar el correo electrónico.";
}
?>