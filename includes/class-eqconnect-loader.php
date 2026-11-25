<?php

defined( 'ABSPATH' ) || exit;

class EQConnect_Loader {

    public static function init() {
        require_once EQCONNECT_DIR . 'includes/class-eqconnect-frontend.php';
        require_once EQCONNECT_DIR . 'includes/class-eqconnect-update.php';

        add_action( 'init', array( __CLASS__, 'load_translations' ) );
        EQConnect_Frontend::init();
        EQConnect_Update::init();

        if ( is_admin() ) {
            require_once EQCONNECT_DIR . 'includes/class-eqconnect-admin.php';
            require_once EQCONNECT_DIR . 'includes/class-eqconnect-feedback.php';

            EQConnect_Admin::init();
            EQConnect_Feedback::init();
        }
    }

    public static function load_translations() {
        load_plugin_textdomain( 'eqconnect', false, dirname( EQCONNECT_SLUG ) . '/languages' );
    }
}
