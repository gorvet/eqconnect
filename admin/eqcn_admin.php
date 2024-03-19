<?php 
/*Opciones de Administración*/

defined( 'ABSPATH' ) || die();

/*Configuración de opciones de administración para EQConnect. */

function eqcn_admin_setup() {
    // Agrega la página al menú del administrador de WordPress.
	add_menu_page(
		__('EQConnect', 'eqconnect'),
		__('EQConnect', 'eqconnect'), 
		'manage_options', 'eqcn-settings', 
		'eqcn_settings', plugin_dir_url(__FILE__) . '/img/icon.png');

 // Registrar las opciones de configuración
	register_setting('eqconnect', 'eqcn_icocta1');
	register_setting('eqconnect', 'eqcn_linkcta1');

	register_setting('eqconnect', 'eqcn_icocta2');
	register_setting('eqconnect', 'eqcn_linkcta2');

	register_setting('eqconnect', 'eqcn_icocta3');
	register_setting('eqconnect', 'eqcn_linkcta3');

	register_setting('eqconnect', 'eqcn_icocta4');
	register_setting('eqconnect', 'eqcn_linkcta4');

	register_setting('eqconnect', 'eqcn_watext1');
	register_setting('eqconnect', 'eqcn_watext2');
	register_setting('eqconnect', 'eqcn_watext3');
	register_setting('eqconnect', 'eqcn_watext4');

 	register_setting('eqconnect', 'eqcn_primario');


}

 
// Las opciones de configuración
function eqcn_settings()
{  

// Incluir las plantillas
	include EQCONNECT_DIR . 'admin/templates/header-template.php';
	include EQCONNECT_DIR . 'admin/templates/tap1-template.php';
	include EQCONNECT_DIR . 'admin/templates/tap2-template.php';
	include EQCONNECT_DIR . 'admin/templates/tap3-template.php';
	include EQCONNECT_DIR . 'admin/templates/tap4-template.php';
	include EQCONNECT_DIR . 'admin/templates/tap6-template.php';
	include EQCONNECT_DIR . 'admin/templates/footer-template.php';	
	include EQCONNECT_DIR . 'admin/templates/side-template.php';	

}

// Cargamos los scripts y css
function eqcn_admin_scripts() {

	$phpmpurl= esc_html(EQCONNECT_PLUGIN_URL);
	$colorprimario= esc_attr(get_option('eqcn_primario'));
	?>
	<script >
		window.jsmpurl = "<?php echo esc_html($phpmpurl) ;?>";
		window.jscolorprimario = "<?php echo esc_html($colorprimario) ;?>";
         // Justo aquí estamos pasando la variable ----
     </script>
     <?php 

     if ( is_admin() ) {

		wp_register_script(
			'eqcn-sidebar',
			EQCONNECT_PLUGIN_URL . 'admin/js/sidebar.js',
			array( 'jquery' ),
			'1.2',
		);
		wp_enqueue_script( 'eqcn-sidebar' );

		wp_register_script(
			'eqcn-sendmail',
			EQCONNECT_PLUGIN_URL . 'include/sendmail/sendmail.js',
			array( 'jquery' ),
			'1.2',
		);
		wp_localize_script('eqcn-sendmail','eqcn_object',array(
			'url'=>admin_url('admin-ajax.php'),
			'nonce'=>wp_create_nonce('eqcn_nonce'),
			'hook'=>'eqcn_sendmail',
		));
		wp_enqueue_script( 'eqcn-sendmail' ); 

		wp_register_script(
			'eqcn-bootstrap-bundle',
			EQCONNECT_PLUGIN_URL . 'include/bootstrap/bootstrap.bundle.js',
			array( 'jquery' ),
			'1.2',
		);
		wp_enqueue_script( 'eqcn-bootstrap-bundle' );


		wp_register_script(
			'eqcn-taps',
			EQCONNECT_PLUGIN_URL . 'admin/js/taps.js',
			array( 'jquery' ),
			'1.2',
		);
		wp_enqueue_script( 'eqcn-taps' );


		wp_enqueue_script( 'eqcn-colorpicker', EQCONNECT_PLUGIN_URL . 'admin/js/colorpicker.js', array( 'wp-color-picker' ), false, true );
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( 'eqcn-colorpicker-css' );


		wp_register_style(
			'eqcn-admin-css',
			EQCONNECT_PLUGIN_URL . 'admin/css/admin.css'
		);
		wp_enqueue_style( 'eqcn-admin-css' );

		wp_register_style(
			'eqcn-bootstrap-utilities-css',
			EQCONNECT_PLUGIN_URL . 'include/bootstrap/bootstrap-utilities.css'
		);
		wp_enqueue_style( 'eqcn-bootstrap-utilities-css' );

		wp_register_style(
			'eqcn-gicon-font',
			EQCONNECT_PLUGIN_URL . 'include/gicon/style.css'
		);
		wp_enqueue_style( 'eqcn-gicon-font' );
	}
}

// Agregar página de configuración y registrar la configuración con WordPress
add_action('admin_menu', 'eqcn_admin_setup');
// Agregar los scripts y css
add_action( 'admin_enqueue_scripts', 'eqcn_admin_scripts' );



 