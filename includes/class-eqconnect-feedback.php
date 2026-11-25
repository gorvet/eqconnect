<?php

defined( 'ABSPATH' ) || exit;

class EQConnect_Feedback {

    public const AJAX_ACTION = 'eqcn_sendmail';
    public const NONCE_ACTION = 'eqcn_nonce';

    public static function init() {
        add_action( 'wp_ajax_' . self::AJAX_ACTION, array( __CLASS__, 'send' ) );
    }

    public static function send() {
        if ( ! current_user_can( 'manage_options' ) || ! wp_verify_nonce( self::field( 'nonce' ), self::NONCE_ACTION ) ) {
            wp_send_json( array( 'status' => 0, 'msg' => __( 'No se pudo autorizar el envío.', 'eqconnect' ) ) );
        }

        $name    = sanitize_text_field( self::field( 'name' ) );
        $email   = sanitize_email( self::field( 'email' ) );
        $message = sanitize_textarea_field( self::field( 'msg' ) );

        if ( '' === $name || ! is_email( $email ) || '' === $message ) {
            wp_send_json( array( 'status' => 0, 'msg' => __( 'Introduce tu nombre, un correo válido y un mensaje.', 'eqconnect' ) ) );
        }

        $body = "Nombre: $name\nCorreo: $email\nMensaje: $message";
        $headers = array(
            'From: ' . get_option( 'admin_email' ),
            'Reply-To: ' . $email,
        );
        $sent = wp_mail( 'eqconnect@gorvet.com', 'Desde Easy Quick Connect', $body, $headers );

        wp_send_json(
            array(
                'status' => $sent ? 1 : 0,
                'msg'    => $sent ? __( 'Mensaje enviado', 'eqconnect' ) : __( 'Error al enviar el mensaje', 'eqconnect' ),
            )
        );
    }

    private static function field( $key ) {
        $value = $_POST[ $key ] ?? '';
        return is_string( $value ) ? wp_unslash( $value ) : '';
    }
}
