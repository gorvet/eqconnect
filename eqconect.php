<?php
/**
 * @link              https://www.gorvet.com
 * @since             1.0.0
 * @package           EQConnect
 *
 * @wordpress-plugin
 * Plugin Name:       Easy Quick Connect
 * Plugin URI:        https://www.gorvet.com/aumenta-la-interaccion-en-tu-web-con-easy-quick-connect/
 * Description:       Ofrece a tus visitantes hasta 4 formas de contacto personalizables, convirtiendo tus visitas en oportunidades. ¡Aumenta la interacción con esta burbuja flotante de contacto!
 * Version:           1.2
 * Author:            Juank de Gorvet
 * Author URI:        https://www.gorvet.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       eqconnect
 * Domain Path:       /languages
 */

defined( 'ABSPATH' ) || die();
 

define( 'EQCONNECT_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'EQCONNECT_DIR', plugin_dir_path( __FILE__ ) );
define( 'EQCONNECT_PLUGIN_FILE', __FILE__ );



require_once EQCONNECT_DIR . 'admin/eqcn_admin.php';
require_once EQCONNECT_DIR . 'public/eqcn_public.php'; 
//require_once EQCONNECT_DIR . 'include/sendmail/sendmail.php';