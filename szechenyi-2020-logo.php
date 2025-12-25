<?php
/**
 * Plugin Name:          Széchenyi 2020 Logo
 * Plugin URI:           https://foldesistudio.hu/szechenyi-2020-logo
 * Description:          This plugin places a Széchenyi 2020 logo to the frontend to any position.
 * Version:              1.2
 * Author:               Földesi Mihály
 * Author URI:           https://foldesistudio.hu
 * License:              Attribution 4.0 International (CC BY 4.0)
 * License URI:          https://creativecommons.org/licenses/by/4.0/
 * Text Domain:          szechenyi-2020
 * Domain Path:          /languages
 * Requires at least:    5.0
 * Tested up to:         6.9
 * Requires PHP:         7.4
 *
 * @author               Földesi, Mihály
 * @copyright            © 2023- Földesi, Mihály | FoldesiStudio.hu
 * @license              Attribution 4.0 International (CC BY 4.0)
 * @package              szechenyi-2020-logo
 */

if (!defined('ABSPATH')) exit;

/**
 * Determining Plugin and Content Directories
 * https://developer.wordpress.org/plugins/plugin-basics/determining-plugin-and-content-directories/
 */

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}
if (!defined('SZECHENYI_2020_619_PLUGIN_BASE')) {
    // in main plugin file
    define('SZECHENYI_2020_619_PLUGIN_BASE', plugin_basename(__FILE__));
}

define('SZECHENYI_2020_619_ROOT', dirname(__FILE__));
define('SZECHENYI_2020_619_FILE', __FILE__);
define('SZECHENYI_2020_619_VERSION', '1.2');
if (!defined('SZECHENYI_2020_619_WP_ROOT')) {
    // for Debian users
    $path = explode(DS, SZECHENYI_2020_619_ROOT);
    $path = array_slice($path, 0, -3);
    $path = implode(DS, $path) . DS;
    define('SZECHENYI_2020_619_WP_ROOT', $path);
}

define('SZECHENYI_2020_619_PATH', plugin_dir_path(__FILE__));

/**
 * Load plugin modules...
 */

/* Activation / Deactivation hooks */
require_once SZECHENYI_2020_619_PATH . 'modules' . DS . 'start-stop.php';

/* Admin notices (dependencies, environment checks) */
require_once SZECHENYI_2020_619_PATH . 'modules' . DS . 'admin-notification.php';

/* Default settings */
require_once SZECHENYI_2020_619_PATH . 'modules' . DS . 'default-options.php';

/* i18n (load textdomain) */
require_once SZECHENYI_2020_619_PATH . 'modules' . DS . 'load-textdomain.php';

/* Front-end assets + output */
require_once SZECHENYI_2020_619_PATH . 'modules' . DS . 'frontend.php';

/* Plugin - Widget */
require_once SZECHENYI_2020_619_PATH . 'modules' . DS . 'wp-widget.php';

/* Plugin - Gutenberg Block */
require_once SZECHENYI_2020_619_PATH . 'modules' . DS . 'wp-gutenberg-block.php';

/* Plugin - Settings page (wp-admin) */
require_once SZECHENYI_2020_619_PATH . 'modules' . DS . 'admin-settings-page.php';

/* Plugin - Some option on plugin page */
require_once SZECHENYI_2020_619_PATH . 'modules' . DS . 'plugin-page.php';

/* Plugin - WP CLI support */
require_once SZECHENYI_2020_619_PATH . 'modules' . DS . 'wp-cli-commands.php';
