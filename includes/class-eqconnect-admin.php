<?php

defined( 'ABSPATH' ) || exit;

class EQConnect_Admin {

    private const PAGE_SLUG = 'eqcn-settings';
    private const SETTINGS_GROUP = 'eqconnect';

    public static function init() {
        add_action( 'admin_menu', array( __CLASS__, 'register_page' ) );
        add_action( 'admin_init', array( __CLASS__, 'register_settings' ) );
        add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_assets' ) );
    }

    public static function register_page() {
        add_menu_page(
            __( 'EQConnect', 'eqconnect' ),
            __( 'EQConnect', 'eqconnect' ),
            'manage_options',
            self::PAGE_SLUG,
            array( __CLASS__, 'render_page' ),
            EQCONNECT_PLUGIN_URL . 'admin/img/icon.png'
        );
    }

    public static function register_settings() {
        for ( $slot = 1; $slot <= 4; ++$slot ) {
            register_setting( self::SETTINGS_GROUP, 'eqcn_icocta' . $slot );
            register_setting( self::SETTINGS_GROUP, 'eqcn_linkcta' . $slot );
            register_setting( self::SETTINGS_GROUP, 'eqcn_watext' . $slot );
        }

        register_setting( self::SETTINGS_GROUP, 'eqcn_primario' );
    }

    public static function render_page() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        $views = EQCONNECT_DIR . 'admin/templates/';
        require $views . 'header-template.php';
        require $views . 'tap1-template.php';
        require $views . 'tap2-template.php';
        require $views . 'tap3-template.php';
        require $views . 'tap4-template.php';
        require $views . 'tap6-template.php';
        require $views . 'footer-template.php';
        require $views . 'side-template.php';
    }

    public static function enqueue_assets( $hook ) {
        if ( 'toplevel_page_' . self::PAGE_SLUG !== $hook ) {
            return;
        }

        wp_enqueue_script( 'eqcn-sidebar', EQCONNECT_PLUGIN_URL . 'admin/js/sidebar.js', array( 'jquery' ), EQCONNECT_VERSION );
        wp_enqueue_script( 'eqcn-sendmail', EQCONNECT_PLUGIN_URL . 'include/sendmail/sendmail.js', array( 'jquery' ), EQCONNECT_VERSION );
        wp_localize_script(
            'eqcn-sendmail',
            'eqcn_object',
            array(
                'url'   => admin_url( 'admin-ajax.php' ),
                'nonce' => wp_create_nonce( EQConnect_Feedback::NONCE_ACTION ),
                'hook'  => EQConnect_Feedback::AJAX_ACTION,
            )
        );
        wp_enqueue_script( 'eqcn-bootstrap-bundle', EQCONNECT_PLUGIN_URL . 'include/bootstrap/bootstrap.bundle.js', array( 'jquery' ), EQCONNECT_VERSION );
        wp_enqueue_script( 'eqcn-taps', EQCONNECT_PLUGIN_URL . 'admin/js/taps.js', array( 'jquery' ), EQCONNECT_VERSION );
        wp_enqueue_script( 'eqcn-colorpicker', EQCONNECT_PLUGIN_URL . 'admin/js/colorpicker.js', array( 'wp-color-picker' ), EQCONNECT_VERSION, true );

        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_style( 'eqcn-admin-css', EQCONNECT_PLUGIN_URL . 'admin/css/admin.css', array(), EQCONNECT_VERSION );
        wp_enqueue_style( 'eqcn-bootstrap-utilities-css', EQCONNECT_PLUGIN_URL . 'include/bootstrap/bootstrap-utilities.css', array(), EQCONNECT_VERSION );
        wp_enqueue_style( 'eqcn-gicon-font', EQCONNECT_PLUGIN_URL . 'include/gicon/style.css', array(), EQCONNECT_VERSION );
    }
}
