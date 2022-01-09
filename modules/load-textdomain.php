<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
	function szechenyi_2020_619_load_textdomain() {
		load_plugin_textdomain( 'szechenyi-2020', false, basename(SZECHENYI_2020_619_PATH) . DS . 'languages' );
	}
	add_action( 'plugins_loaded', 'szechenyi_2020_619_load_textdomain' );

