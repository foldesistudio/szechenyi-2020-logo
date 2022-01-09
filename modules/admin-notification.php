<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
	
	function szechenyi_2020_619_notice() {
		if( get_transient( 'szechenyi_2020_619_review_notice' ) ) {
			
			
			echo '<div class="notice notice-success is-dismissible"><p>' .
				sprintf( '<strong>'.__('Széchenyi 2020', 'szechenyi-2020'). ':</strong> '.
					/* translators: %s is replaced with "URL" */
					__('Please don\'t forget to <a href="%s" target="_blank">rate the plugin!</a>', 'szechenyi-2020'),
					'https://wordpress.org/support/plugin/szechenyi-2020/reviews/') .
				'</p></div>';
			
			delete_transient( 'szechenyi_2020_619_review_notice' );
		}
	}
	
	
	add_action( 'admin_notices', 'szechenyi_2020_619_notice' );