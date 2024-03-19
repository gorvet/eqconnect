<?php
/**
 * Se activa cuando se desinstala el complemento.
 *
 * @link              https://www.gorvet.com
 * @since             1.0.0
 * @package           EQConnect
 */

if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

/**
 * De forma predeterminada, elimine todos los datos del complemento.
 *
 * Utilice "add_filter('qconnect_delete_all', '__return_false');"
 * antes de desinstalar el plugin para evitar borrar todos los datos del complemento.
 */

if ( apply_filters( 'eqconnect_delete_all', true ) ) {
	global $wpdb;

// Elimina la opción general 'eqconnect' agregada por el complemento
	delete_option( 'eqconnect' );
    
	// Delete post meta '_eqconnect' added by plugin
	$wpdb->delete( $wpdb->prefix . 'postmeta', array( 'meta_key' => '_eqconnect' ) );

// Borra cualquier dato almacenado en caché que haya sido eliminado	
    wp_cache_flush();
}

