<?php

defined( 'ABSPATH' ) || exit;

class EQConnect_Update {

    private const SLUG = 'eqconnect';

    public static function init() {
        add_filter( 'update_plugins_repo.gorvet.com', array( __CLASS__, 'check_for_updates' ), 10, 3 );
        add_filter( 'plugins_api', array( __CLASS__, 'plugin_information' ), 10, 3 );
    }

    public static function check_for_updates( $update, $plugin_data, $plugin_file ) {
        if ( EQCONNECT_SLUG !== $plugin_file || EQCONNECT_UPDATE_URL !== ( $plugin_data['UpdateURI'] ?? '' ) ) {
            return $update;
        }

        $info = self::fetch_manifest();

        return array(
            'slug'           => self::SLUG,
            'version'        => $info->version ?? $plugin_data['Version'],
            'url'            => $info->homepage ?? $plugin_data['PluginURI'],
            'package'        => $info->download_url ?? '',
            'requires'       => $info->requires ?? $plugin_data['RequiresWP'],
            'requires_php'   => $info->requires_php ?? $plugin_data['RequiresPHP'],
            'tested'         => $info->tested ?? '',
            'icons'          => array( 'default' => EQCONNECT_PLUGIN_URL . 'admin/img/icon.png' ),
            'upgrade_notice' => $info->upgrade_notice ?? '',
        );
    }

    public static function plugin_information( $result, $action, $args ) {
        if ( 'plugin_information' !== $action || self::SLUG !== ( $args->slug ?? '' ) ) {
            return $result;
        }

        $info = self::fetch_manifest();
        if ( ! $info ) {
            return $result;
        }

        return (object) array(
            'name'          => $info->name ?? 'Easy Quick Connect',
            'slug'          => self::SLUG,
            'version'       => $info->version,
            'author'        => $info->author ?? 'Juank de Gorvet',
            'requires'      => $info->requires ?? '6.0',
            'requires_php'  => $info->requires_php ?? '8.0',
            'tested'        => $info->tested ?? '',
            'last_updated'  => $info->last_updated ?? '',
            'homepage'      => $info->homepage ?? 'https://github.com/gorvet/eqconnect',
            'download_link' => $info->download_url,
            'sections'      => array_filter( (array) ( $info->sections ?? array() ), 'is_string' ),
        );
    }

    private static function fetch_manifest() {
        static $manifest = false;
        if ( false !== $manifest ) {
            return $manifest;
        }

        $manifest = null;
        $response = wp_safe_remote_get( EQCONNECT_UPDATE_URL, array( 'timeout' => 5 ) );
        if ( is_wp_error( $response ) || 200 !== (int) wp_remote_retrieve_response_code( $response ) ) {
            return null;
        }

        $data = json_decode( wp_remote_retrieve_body( $response ) );
        if ( ! is_object( $data ) ||
            self::SLUG !== ( $data->slug ?? self::SLUG ) ||
            ! is_string( $data->version ?? null ) ||
            ! preg_match( '/^[0-9][0-9A-Za-z.+_-]{0,63}$/D', $data->version ) ||
            ! is_string( $data->download_url ?? null ) ||
            ! filter_var( $data->download_url, FILTER_VALIDATE_URL ) ||
            'https' !== wp_parse_url( $data->download_url, PHP_URL_SCHEME )
        ) {
            return null;
        }

        foreach ( array( 'name', 'author', 'homepage', 'requires', 'requires_php', 'tested', 'upgrade_notice', 'last_updated' ) as $field ) {
            if ( isset( $data->$field ) && ( ! is_string( $data->$field ) || '' === $data->$field ) ) {
                unset( $data->$field );
            }
        }

        $manifest = $data;
        return $manifest;
    }
}
