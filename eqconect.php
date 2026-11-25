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
 * Version:           1.2.1
 * Author:            Juank de Gorvet
 * Author URI:        https://www.gorvet.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       eqconnect
 * Domain Path:       /languages
 * Requires at least: 6.0
 * Requires PHP:      8.0
 * Update URI:        https://repo.gorvet.com/updates/eqconnect/info.json
 */

defined( 'ABSPATH' ) || exit;

define( 'EQCONNECT_VERSION', '1.2.1' );
define( 'EQCONNECT_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'EQCONNECT_DIR', plugin_dir_path( __FILE__ ) );
define( 'EQCONNECT_PLUGIN_FILE', __FILE__ );
define( 'EQCONNECT_SLUG', plugin_basename( __FILE__ ) );
define( 'EQCONNECT_UPDATE_URL', 'https://repo.gorvet.com/updates/eqconnect/info.json' );

require_once EQCONNECT_DIR . 'includes/class-eqconnect-loader.php';

add_action( 'plugins_loaded', array( 'EQConnect_Loader', 'init' ) );
