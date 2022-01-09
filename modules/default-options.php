<?php
	if (!defined('ABSPATH')) exit;
	
	function szechenyi_2020_619_get_options()
	{
		
		$defaults = [
			'misi_szechenyi2020_position_place'             => 'fixed',
			'misi_szechenyi2020_position_y'                 => 'bottom',
			'misi_szechenyi2020_position_x'                 => 'right',
			'misi_szechenyi2020_close_button'               => 'no',
			'misi_szechenyi2020_width'                      => 300,
			'misi_szechenyi2020_height'                     => 300,
			'misi_szechenyi2020_width_unit'                 => 'px',
			'misi_szechenyi2020_background_color_turn_on'   => 'no',
			'misi_szechenyi2020_background_color'           => '#ffffff00',
			'misi_szechenyi2020_margin_top'                 => '',
			'misi_szechenyi2020_margin_right'               => '',
			'misi_szechenyi2020_margin_bottom'              => '',
			'misi_szechenyi2020_margin_left'                => '',
			'misi_szechenyi2020_border_top'                 => '',
			'misi_szechenyi2020_border_right'               => '',
			'misi_szechenyi2020_border_bottom'              => '',
			'misi_szechenyi2020_border_left'                => '',
			'misi_szechenyi2020_border_type'                => 'none',
			'misi_szechenyi2020_border_radius'              => 'straight_cornor',
			'misi_szechenyi2020_border_radius_size'         => '',
			'misi_szechenyi2020_border_color_turn_on'       => 'no',
			'misi_szechenyi2020_border_color'               => '#ffffff00',
			'misi_szechenyi2020_padding_top'                => '',
			'misi_szechenyi2020_padding_right'              => '',
			'misi_szechenyi2020_padding_bottom'             => '',
			'misi_szechenyi2020_padding_left'               => '',
			'misi_szechenyi2020_css_custom_desktop'         => '',
			'misi_szechenyi2020_css_custom_mobile'          => '',
			'misi_szechenyi2020_page_url'                   => '',
			'misi_szechenyi2020_theme'                      => 'none'
		
		];
		$options = get_option('szechenyi_2020_options');
		$options = wp_parse_args($options, $defaults);
		
		return $options;
	}