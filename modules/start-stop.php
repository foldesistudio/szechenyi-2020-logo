<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
/**
* Efficiently Flush Rewrite Rules After Plugin Activation
* https://andrezrv.com/2014/08/12/efficiently-flush-rewrite-rules-plugin-activation/
*/
	
	function szechenyi_2020_619_activation() {
		
		$options = szechenyi_2020_619_get_options();
		update_option('szechenyi_2020_options', $options, true);
		set_transient( 'szechenyi_2020_619_review_notice', 1 );
		// flush_rewrite_rules();
	}
	register_activation_hook( SZECHENYI_2020_619_FILE, 'szechenyi_2020_619_activation' );
	
	function szechenyi_2020_619_deactivation() {
		delete_option('szechenyi_2020_options');
		// flush_rewrite_rules();
		delete_transient('misi_szechenyi2020_css_transient');
		delete_transient('misi_szechenyi2020_html_transient');
	}
	register_deactivation_hook( SZECHENYI_2020_619_FILE, 'szechenyi_2020_619_deactivation' );
	
	function szechenyi_2020_619_uninstall() {
	
	}
	register_uninstall_hook(SZECHENYI_2020_619_FILE, 'szechenyi_2020_619_uninstall' );
	
	function szechenyi_2020_619_upgrade_completed( $upgrader_object, $options ) {
		$our_plugin = plugin_basename( SZECHENYI_2020_619_FILE );
		if( $options['action'] == 'update' && $options['type'] == 'plugin' && isset( $options['plugins'] ) ) {
			foreach( $options['plugins'] as $plugin ) {
				if( $plugin == $our_plugin ) {
					
					set_transient( 'szechenyi_2020_619_review_notice', 1 );
					// flush_rewrite_rules();
					
				}
			}
		}
	}
	add_action( 'upgrader_process_complete', 'szechenyi_2020_619_upgrade_completed', 10, 2 );