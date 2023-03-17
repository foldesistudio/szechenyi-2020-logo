<?php
	/**
	 * Plugin Name:          Széchenyi 2020 Logo
	 * Plugin URI:           https://foldesistudio.hu/szechenyi-2020-logo
	 * Description:          This plugin places a Széchenyi 2020 logo to the frontend to any position.
	 * Version:              1.1
	 * Author:               Földesi Mihály
	 * Author URI:           https://foldesistudio.hu
	 * License:              Attribution 4.0 International (CC BY 4.0)
	 * License URI:          https://creativecommons.org/licenses/by/4.0/
	 * Text Domain:          szechenyi-2020
	 * Requires at least:    5.0
	 * Tested up to:         6.2
	 * Requires PHP:         7.0
	 *
	 * @author               Földesi, Mihály
	 * @copyright            © 2022- Földesi, Mihály | FoldesiStudio.hu
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
	define('SZECHENYI_2020_619_VERSION', '1.0');
	if (!defined('SZECHENYI_2020_619_WP_ROOT')) {
		// for Debian users
		$path = explode(DS, SZECHENYI_2020_619_ROOT);
		$path = array_slice($path, 0, -3);
		$path = implode(DS, $path) . DS;
		define('SZECHENYI_2020_619_WP_ROOT', $path);
	}
	
	define('SZECHENYI_2020_619_PATH', plugin_dir_path(__FILE__));
	
	/**
	 * Load modules...
	 */
	
	/* Aktiváció/deaktiváció */
	require_once SZECHENYI_2020_619_PATH . 'modules' . DS . 'start-stop.php';
	
	/* Admin értesítés - függőségek */
	require_once SZECHENYI_2020_619_PATH . 'modules' . DS . 'admin-notification.php';
	
	/* Beállítások - alapértelmezett értékek */
	require_once SZECHENYI_2020_619_PATH . 'modules' . DS . 'default-options.php';
	
	/* Többnyelvűség */
	require_once SZECHENYI_2020_619_PATH . 'modules' . DS . 'load-textdomain.php';
	
	/* Plugin - Szerkezet */
	require_once SZECHENYI_2020_619_PATH . 'modules' . DS . 'plugin-page.php';
	
	/* CSS & JS regisztrálása a frontend-en */
	require_once SZECHENYI_2020_619_PATH . 'modules' . DS . 'frontend.php';
	
	/* Plugin - beállítások oldala */
	require_once SZECHENYI_2020_619_PATH . 'modules' . DS . 'admin-settings-page.php';
	
	/* Plugin - könyvtárból betöltédése egyéb funkcióknak */
	require_once SZECHENYI_2020_619_PATH . 'modules' . DS . 'misc-includes.php';
	
	/* Plugin - WP CLI support */
	require_once SZECHENYI_2020_619_PATH . 'modules' . DS . 'wp-cli-commands.php';
