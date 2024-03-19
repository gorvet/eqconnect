<?php defined( 'ABSPATH' ) || die(); ?>
<?php
require_once('../../../../../wp-load.php');
function validar_campos($campo)
{
    $campo = trim($campo);
    $campo = stripslashes($campo);
    $campo = htmlspecialchars($campo);
    return $campo;
}

header('Content-type: application/json');

if (
    !empty($_POST["subscriber_name"]) &&
    !empty($_POST["subscriber_email"]) &&
    !empty($_POST["subscriber_message"])
) {
    $destinoMail = "gconnect@gorvet.com";
    $subscriber_name = substr(validar_campos($_POST["subscriber_name"]), 0, 100);
    $subscriber_email = filter_var(validar_campos($_POST["subscriber_email"]), FILTER_SANITIZE_EMAIL);

    if (!filter_var($subscriber_email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode("correo_invalido");
        exit;
    }

    $subscriber_message = validar_campos($_POST["subscriber_message"]);

    $contenido = "Nombre: " . $subscriber_name . "\n";
    $contenido .= "Correo: " . $subscriber_email . "\n";
    $contenido .= "Mensaje: " . $subscriber_message;

 
    // Obtén la dirección de correo electrónico del administrador de WordPress
    $admin_email = get_option('admin_email');
    //$admin_email = $subscriber_email;


    $cabecera = 'From: ' . $admin_email . "\r\n" .
                'Reply-To: ' . $subscriber_email;

    if (mail($destinoMail, "Desde GConnect", $contenido, $cabecera)) {
        echo json_encode("ok");
    } else {
        echo json_encode("error_envio");
    }

    exit;
}

echo json_encode("campos_vacios");
