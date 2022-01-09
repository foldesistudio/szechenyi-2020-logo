<?php
/**
 * Add several menus on the plugins page
 *
 * @package szechenyi-2020-logo
 */
	
	if (!defined('ABSPATH')) exit;
	
	function szechenyi_2020_619_get_extra_meta_links($meta, $file, $data, $status)
	{
		
		if (SZECHENYI_2020_619_PLUGIN_BASE == $file) {
			
			$meta[] = '<a href="https://wordpress.org/support/plugin/szechenyi-2020-logo/reviews/">' .
				__('Please rating!', 'szechenyi-2020') .
				'</a>';
		}
		return $meta;
	}
	
	add_filter("plugin_row_meta", 'szechenyi_2020_619_get_extra_meta_links', 10, 4);
	
	function szechenyi_2020_619_add_settings_link($links)
	{
		$settings_link = '<a href="' . admin_url('options-general.php?page=szechenyi-2020-setting-admin') . '">' . __('Settings') . '</a>';
		array_unshift($links, $settings_link);
		return $links;
	}
	
	add_filter("plugin_action_links_" . SZECHENYI_2020_619_PLUGIN_BASE, 'szechenyi_2020_619_add_settings_link');
	
	
	/**
	 * Add a Menu for Toolbar
	 */
	
	function szechenyi_2020_custom_toolbar()
	{
		global $wp_admin_bar;
		
		$args = array(
			'id' => 'szechenyi_2020_toolbar',
			'title' => __('Széchenyi 2020 Logo', 'szechenyi-2020'),
		);
		$wp_admin_bar->add_menu($args);
		
		$args = array(
			'id' => 'szechenyi_2020_child-menu',
			'parent' => 'szechenyi_2020_toolbar',
			'title' => __('Settings'),
			'href' => admin_url('options-general.php?page=szechenyi-2020-setting-admin'),
		);
		$wp_admin_bar->add_menu($args);
		
	}
	
	add_action('wp_before_admin_bar_render', 'szechenyi_2020_custom_toolbar', 999);
	