<?php 
/*Opciones de Administración*/

defined( 'ABSPATH' ) || die();

/*Configuración de opciones de administración para EQConnect. */

function eqconnect_admin_setup() {
    // Agrega la página al menú del administrador de WordPress.
	add_menu_page(
		__('EQConnect', 'eqconnect'),
		__('EQConnect', 'eqconnect'), 
		'manage_options', basename(__FILE__), 
		'eqconnect_settings', plugin_dir_url(__FILE__) . '/img/icon.png');

	// Registrar las opciones de configuración
	register_setting('eqconnect', 'eqconnect_icocta1');
	register_setting('eqconnect', 'eqconnect_linkcta1');
	register_setting('eqconnect', 'eqconnect_icocta2');
	register_setting('eqconnect', 'eqconnect_linkcta2');
	register_setting('eqconnect', 'eqconnect_icocta3');
	register_setting('eqconnect', 'eqconnect_linkcta3');
	register_setting('eqconnect', 'eqconnect_icocta4');
	register_setting('eqconnect', 'eqconnect_linkcta4');

	register_setting('eqconnect', 'eqconnect_watext1');
	register_setting('eqconnect', 'eqconnect_watext2');
	register_setting('eqconnect', 'eqconnect_watext3');
	register_setting('eqconnect', 'eqconnect_watext4');



 	register_setting('eqconnect', 'eqcprimario');
	register_setting('eqconnect', 'eqcprimario_claro');
	register_setting('eqconnect', 'eqcprimario_oscuro');

}

 
// Las opciones de configuración
function eqconnect_settings()
{  

// Incluir las plantillas
	require_once EQCONNECT_DIR . 'admin/templates/header-template.php';
	require_once EQCONNECT_DIR . 'admin/templates/tap1-template.php';
	require_once EQCONNECT_DIR . 'admin/templates/tap2-template.php';
	require_once EQCONNECT_DIR . 'admin/templates/tap3-template.php';
	require_once EQCONNECT_DIR . 'admin/templates/tap4-template.php';
	require_once EQCONNECT_DIR . 'admin/templates/tap6-template.php';
	require_once EQCONNECT_DIR . 'admin/templates/footer-template.php';	
	require_once EQCONNECT_DIR . 'admin/templates/side-template.php';	

}
 
// Cargamos los scripts y css
function eqconnect_admin_scripts() {

	$phpmpurl= EQCONNECT_PLUGIN_URL;
	$colorprimario= esc_attr(get_option('qcprimario'));
	?>
	<script >

		window.jsmpurl = "<?php echo $phpmpurl ;?>";
		window.jscolorprimario = "<?php echo $colorprimario ;?>";
         // Justo aquí estamos pasando la variable ----
     </script>
     <?php 

     if ( is_admin() ) {

		wp_enqueue_media(); // Carga la API de JavaScript para utilizar wp.media.
		wp_register_script(
			'eqconnect-image-meta-box',
			EQCONNECT_PLUGIN_URL . 'admin/js/img.js',
			array( 'jquery' )
		);
		wp_enqueue_script( 'eqconnect-image-meta-box' );

		wp_register_script(
			'eqconnect-sidebar',
			EQCONNECT_PLUGIN_URL . 'admin/js/sidebar.js',
			array( 'jquery' )
		);
		wp_enqueue_script( 'eqconnect-sidebar' );

		wp_register_script(
			'eqconnect-feed',
			EQCONNECT_PLUGIN_URL . 'include/sendmail/ajax.js',
			array( 'jquery' )
		);
		wp_enqueue_script( 'eqconnect-feed' ); 

		wp_register_script(
			'bcbootstrap.bundle',
			EQCONNECT_PLUGIN_URL . 'include/bootstrap/bootstrap.bundle.js',
			array( 'jquery' )
		);
		wp_enqueue_script( 'bcbootstrap.bundle' );


		wp_register_script(
			'eqconnect-taps',
			EQCONNECT_PLUGIN_URL . 'admin/js/taps.js',
			array( 'jquery' )
		);
		wp_enqueue_script( 'eqconnect-taps' );


		wp_enqueue_script( 'eqconnect-colorpicker', EQCONNECT_PLUGIN_URL . 'admin/js/colorpicker.js', array( 'wp-color-picker' ), false, true );
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( 'eqconnect-colorpicker-css' );


		wp_register_style(
			'eqconnect-admin-css',
			EQCONNECT_PLUGIN_URL . 'admin/css/admin.css'
		);
		wp_enqueue_style( 'eqconnect-admin-css' );

		wp_register_style(
			'bootstrap-utilities-css',
			EQCONNECT_PLUGIN_URL . 'include/bootstrap/bootstrap-utilities.css'
		);
		wp_enqueue_style( 'bootstrap-utilities-css' );

		wp_register_style(
			'gicon-font',
			EQCONNECT_PLUGIN_URL . 'include/gicon/style.css'
		);
		wp_enqueue_style( 'gicon-font' );
	}
} 

// Agregar página de configuración y registrar la configuración con WordPress
add_action('admin_menu', 'eqconnect_admin_setup');
// Agregar los scripts y css
add_action( 'admin_enqueue_scripts', 'eqconnect_admin_scripts' );

 