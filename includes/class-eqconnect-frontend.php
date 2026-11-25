<?php

defined( 'ABSPATH' ) || exit;

class EQConnect_Frontend {

    public static function init() {
        add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_assets' ) );
        add_action( 'wp_footer', array( __CLASS__, 'render_widget' ) );
    }

    public static function enqueue_assets() {
        wp_enqueue_style( 'eqcn_gicon', EQCONNECT_PLUGIN_URL . 'include/gicon/style.css', array(), EQCONNECT_VERSION );
        wp_enqueue_style( 'eqcn-public-css', EQCONNECT_PLUGIN_URL . 'public/css/public.css', array(), EQCONNECT_VERSION );

        $color = sanitize_hex_color( (string) get_option( 'eqcn_primario' ) );
        if ( ! $color ) {
            return;
        }

        if ( strlen( $color ) === 4 ) {
            $color = '#' . $color[1] . $color[1] . $color[2] . $color[2] . $color[3] . $color[3];
        }

        $light = self::shade( $color, 1.6 );
        $dark  = self::shade( $color, 0.8 );
        wp_add_inline_style(
            'eqcn-public-css',
            ".qc, .qc-action, .qc-action:hover { --Primario: $color; --Primario-claro: $light; --Primario-oscuro: $dark; }"
        );
    }

    public static function render_widget() {
        $actions = array();
        $protocols = array_merge( wp_allowed_protocols(), array( 'tg', 'whatsapp', 'geo', 'facetime', 'viber', 'signal', 'skype' ) );

        for ( $slot = 1; $slot <= 4; ++$slot ) {
            $link = trim( (string) get_option( 'eqcn_linkcta' . $slot ) );
            if ( '' === $link ) {
                continue;
            }

            $icon = sanitize_html_class( trim( (string) get_option( 'eqcn_icocta' . $slot ) ), 'link' );
            switch ( $icon ) {
                case 'phone':
                    $link = 'tel:' . $link;
                    break;
                case 'mail':
                    $link = 'mailto:' . $link;
                    break;
                case 'whatsapp':
                    $message = (string) get_option( 'eqcn_watext' . $slot );
                    $link = 'https://wa.me/' . $link . '/?text=' . rawurlencode( $message );
                    break;
            }

            $url = esc_url( $link, $protocols );
            if ( '' !== $url ) {
                $actions[] = array( 'url' => $url, 'icon' => $icon );
            }
        }

        if ( $actions ) {
            require EQCONNECT_DIR . 'public/templates/widget.php';
        }
    }

    private static function shade( $color, $factor ) {
        $result = '#';

        for ( $offset = 1; $offset < 6; $offset += 2 ) {
            $channel = hexdec( substr( $color, $offset, 2 ) );
            $result .= sprintf( '%02x', min( 255, (int) floor( $channel * $factor ) ) );
        }

        return $result;
    }
}
