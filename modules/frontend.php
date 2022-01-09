<?php
	if (!defined('ABSPATH')) exit;
	
	/**
	 * Register scripts on the frontend
	 */
	if (!is_admin()) {
		
		
		add_action('wp_enqueue_scripts', 'szechenyi_2020_619_styles_to_frontend');
		add_action('wp_footer', 'szechenyi_2020_619_logo');
		add_action('wp_footer', 'szechenyi_2020_619_scripts_to_frontend');
		
	}
	
	function szechenyi_2020_619_styles_to_frontend()
	{
		if (file_exists(SZECHENYI_2020_619_ROOT . DS . 'assets' . DS . 'css' . DS . 'szechenyi-2020.css')) {
			wp_register_style('szechenyi-2020', plugins_url('/assets/css/szechenyi-2020.css', SZECHENYI_2020_619_FILE), array(), SZECHENYI_2020_619_VERSION);
			wp_enqueue_style('szechenyi-2020');
			
		}
		
		$option = get_option('szechenyi_2020_options');
		
		if (empty($option['misi_szechenyi2020_margin_top']) and
			empty($option['misi_szechenyi2020_margin_right']) and
			empty($option['misi_szechenyi2020_margin_bottom']) and
			empty($option['misi_szechenyi2020_margin_left'])) {
			$margin = "0px";
		} else {
			$margin = $option['misi_szechenyi2020_margin_top'] ? $option['misi_szechenyi2020_margin_top'] : '0';
			$margin .= 'px ';
			$margin .= $option['misi_szechenyi2020_margin_right'] ? $option['misi_szechenyi2020_margin_right'] : '0';
			$margin .= 'px ';
			$margin .= $option['misi_szechenyi2020_margin_bottom'] ? $option['misi_szechenyi2020_margin_bottom'] : '0';
			$margin .= 'px ';
			$margin .= $option['misi_szechenyi2020_margin_left'] ? $option['misi_szechenyi2020_margin_left'] : '0';
			$margin .= 'px';
		}
		
		
		if (empty($option['misi_szechenyi2020_padding_top']) and
			empty($option['misi_szechenyi2020_padding_right']) and
			empty($option['misi_szechenyi2020_padding_bottom']) and
			empty($option['misi_szechenyi2020_padding_left'])) {
			$padding = "0px";
		} else {
			$padding = $option['misi_szechenyi2020_padding_top'] ? $option['misi_szechenyi2020_padding_top'] : '0';
			$padding .= 'px ';
			$padding .= $option['misi_szechenyi2020_padding_right'] ? $option['misi_szechenyi2020_padding_right'] : '0';
			$padding .= 'px ';
			$padding .= $option['misi_szechenyi2020_padding_bottom'] ? $option['misi_szechenyi2020_padding_bottom'] : '0';
			$padding .= 'px ';
			$padding .= $option['misi_szechenyi2020_padding_left'] ? $option['misi_szechenyi2020_padding_left'] : '0';
			$padding .= 'px';
			
		}
		
		if (empty($option['misi_szechenyi2020_border_top']) and
			empty($option['misi_szechenyi2020_border_right']) and
			empty($option['misi_szechenyi2020_border_bottom']) and
			empty($option['misi_szechenyi2020_border_left'])) {
			$border = "0px";
		} else {
			$border = $option['misi_szechenyi2020_border_top'] ? $option['misi_szechenyi2020_border_top'] : '0';
			$border .= 'px ';
			$border .= $option['misi_szechenyi2020_border_right'] ? $option['misi_szechenyi2020_border_right'] : '0';
			$border .= 'px ';
			$border .= $option['misi_szechenyi2020_border_bottom'] ? $option['misi_szechenyi2020_border_bottom'] : '0';
			$border .= 'px ';
			$border .= $option['misi_szechenyi2020_border_left'] ? $option['misi_szechenyi2020_border_left'] : '0';
			$border .= 'px';
		}
		
		
		$position_y = $option['misi_szechenyi2020_position_y'];
		$position_x = $option['misi_szechenyi2020_position_x'];
		
		
		$styling = "#szechenyi_2020_logo {";
		$styling .= "width:" . $option['misi_szechenyi2020_width'] . $option['misi_szechenyi2020_width_unit'] . ";";
		
		
		if (isset($option['misi_szechenyi2020_background_color_turn_on']) == 'yes') {
			$styling .= "background:" . $option['misi_szechenyi2020_background_color'] . ";";
		}
		$styling .= "position:" . $option['misi_szechenyi2020_position_place'] . ";";
		$styling .= "margin:" . $margin . ';';
		
		$styling .= "padding:" . $padding . ';';
		if ($position_y == "top") {
			$styling .= "top:0px;";
		}
		if ($position_y == "bottom") {
			$styling .= "bottom:0px;";
		}
		if ($position_x == "left") {
			$styling .= "left:0px;";
		}
		if ($position_x == "right") {
			$styling .= "right:0px;";
		}
		
		$option_border_style = $option['misi_szechenyi2020_border_type'] ?? 'none';
		$styling .= "border-style: " . $option_border_style . ";";
		$styling .= "border-width: " . $border . ";";
		
		
		if (isset($option['misi_szechenyi2020_border_color_turn_on']) == 'yes') {
			$styling .= "border-color: " . $option['misi_szechenyi2020_border_color'] . ";";
		}
		if (isset($option['misi_szechenyi2020_border_radius']) == 'round_cornor') {
			$styling .= "border-radius:" . $option['misi_szechenyi2020_border_radius_size'] . "px;";
			$styling .= "-moz-border-radius:" . $option['misi_szechenyi2020_border_radius_size'] . "px;";
			$styling .= "-webkit-border-radius:" . $option['misi_szechenyi2020_border_radius_size'] . "px;";
		}
		$styling .= "}" . "\n";
		
		
		/* TODO: Dektop és asztali CSS-t megoldani */
		//$styling .= $option['misi_szechenyi2020_css_custom_desktop'] . "\n";
		//$styling .= $option['misi_szechenyi2020_css_custom_mobile'] . "\n";
		
		$css_transient = get_transient('misi_szechenyi2020_css_transient');
		
		if (false === $css_transient) {
			// Transient expired, refresh the data
			wp_add_inline_style('szechenyi-2020', $styling);
			set_transient('misi_szechenyi2020_css_transient', $styling, WEEK_IN_SECONDS);
			
		}
		
		wp_add_inline_style('szechenyi-2020', $css_transient);
	}
	
	function szechenyi_2020_619_scripts_to_frontend()
	{
		$options = get_option('szechenyi_2020_options');
		$option_close_button = $options['misi_szechenyi2020_close_button'] ?? NULL;
		
		if (file_exists(SZECHENYI_2020_619_ROOT . DS . 'assets' . DS . 'js' . DS . 'szechenyi-2020.js') and $option_close_button == "yes") {
			wp_register_script('szechenyi-2020', plugins_url('/assets/js/szechenyi-2020.js', SZECHENYI_2020_619_FILE), array('jquery'), SZECHENYI_2020_619_VERSION, true);
			wp_enqueue_script('szechenyi-2020');
		}
	}
	
	function szechenyi_2020_619_logo()
	{
		$options = get_option('szechenyi_2020_options');
		$option_close_button = $options['misi_szechenyi2020_close_button'] ?? NULL;
		$option_position_y = $options['misi_szechenyi2020_position_y'];
		$option_position_width = $options['misi_szechenyi2020_width'];
		$option_position_unit = $options['misi_szechenyi2020_width_unit'];
		$option_url = $options['misi_szechenyi2020_page_url'];
		$html_width = ($option_position_unit == 'px') ? $option_position_width . $option_position_unit : '100%';
		$content = '<div id="szechenyi_2020_logo" class="szechenyi_2020_logo">';
		
		if ($option_close_button == "yes") {
			$content .= '
				<a href="javascript:void()" class="szechenyi_2020_close">
				<span class="dashicons dashicons-dismiss"></span>
				</a>';
		}
		if (!empty($option_url)) {
			$content .= '<a href="' . esc_attr(esc_url($option_url)) . '">';
		}
		if ($option_position_y == "bottom") {
			$content .= '<img src="' . plugins_url('assets' . DS . 'images' . DS . 'szechenyi-2020-logo-' . $option_position_y . '.png', SZECHENYI_2020_619_PLUGIN_BASE) . '" alt="' . __('Széchenyi 2020 logo at bottom position', 'szechenyi-2020') . '" width="'. $html_width .'" loading="lazy" />';
		} else {
			$content .= '<img src="' . plugins_url('assets' . DS . 'images' . DS . 'szechenyi-2020-logo-' . $option_position_y . '.png', SZECHENYI_2020_619_PLUGIN_BASE) . '" alt="' . __('Széchenyi 2020 logo at top position', 'szechenyi-2020') . '" width="'. $html_width .'" loading="lazy" />';
			
		}
		if (!empty($option_url)) {
			$content .= '</a>';
		}
		$content .= '</div>';
		
		$html_content_transient = get_transient('misi_szechenyi2020_html_transient');
		
		
		$allowed_html = wp_kses_allowed_html('post');
		
		if (false === $html_content_transient) {
			// Transient expired, refresh the data
			echo wp_kses($content ,$allowed_html);
			set_transient('misi_szechenyi2020_html_transient', $content, WEEK_IN_SECONDS);
			
		} else {
			echo wp_kses($html_content_transient ,$allowed_html );
		}
	}