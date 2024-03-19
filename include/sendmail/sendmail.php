<?php defined( 'ABSPATH' ) || die(); 

function eqcn_process_sendmail(){
        $nonce=$_POST['nonce']??'';

    if (!wp_verify_nonce($nonce, 'eqcn_nonce')) {
        $res=['status'=>0, 'msg'=>'Error de validación nonce'];
        wp_send_json($res);
        exit;
    }

    $name= sanitize_text_field($_POST['name']??'');
    $email=sanitize_email($_POST['email']??'');
    $msg=sanitize_textarea_field($_POST['msg']??'');


    if (!empty($name) && !empty($email) && !empty($msg)) {

        $destinoMail = "eqconnect@gorvet.com";

        $contenido = "Nombre: " . $name . "\n";
        $contenido .= "Correo: " . $email . "\n";
        $contenido .= "Mensaje: " . $msg;

// Obtén la dirección de correo electrónico del administrador de WordPress
        $admin_email = get_option('admin_email');

        $cabecera = 'From: ' . $admin_email . "\r\n" .
        'Reply-To: ' . $email;

        if (wp_mail($destinoMail, "Desde Easy Quick Connect", $contenido, $cabecera)) {
            $res=['status'=>1, 'msg'=>'Mensaje enviado'];
        } else {
            $res=['status'=>0, 'msg'=>'Error al enviar el mensaje'];
        }

        wp_send_json($res);

    } else{
        $res=['status'=>0, 'msg'=>'Campos vacíos'];
        wp_send_json($res);
        exit;
    }

}

add_action('wp_ajax_eqcn_sendmail','eqcn_process_sendmail');

