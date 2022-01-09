<?php
	/**
	 * For DEBUG propose only
	 */
	
	if (!defined('ABSPATH')) exit;
	
	function szechenyi_2020_619_styles_and_scripts_to_frontend_szechenyi_2020_logo()
	{
		
		define('SZECHENYI_2020_619_SZECHENYI_2020_LOGO', 1);
		
		if (file_exists(SZECHENYI_2020_619_ROOT . DS . 'assets' . DS . 'css' . DS . 'shortcode-szechenyi-2020-logo-debug.css')) {
			wp_register_style('shortcode-szechenyi-2020-logo', plugins_url('/assets/css/shortcode-szechenyi-2020-logo-debug.css', SZECHENYI_2020_619_FILE), array(), SZECHENYI_2020_619_VERSION);
			wp_enqueue_style('shortcode-szechenyi-2020-logo');
		}
		if (file_exists(SZECHENYI_2020_619_ROOT . DS . 'assets' . DS . 'js' . DS . 'shortcode-szechenyi-2020-logo-debug.js')) {
			wp_register_script('shortcode-szechenyi-2020-logo-js', plugins_url('/assets/js/shortcode-szechenyi-2020-logo-debug.js', SZECHENYI_2020_619_FILE), array('jquery'), SZECHENYI_2020_619_VERSION, true);
			wp_enqueue_script('shortcode-szechenyi-2020-logo-js');
		}
	}
	
	/**
	 * WordPress expanded allowed tags for wp_kses
	 * https://gist.github.com/adamsilverstein/10783774
	 * @return array
	 */
	
	function expanded_alowed_tags()
	{
		$my_allowed = wp_kses_allowed_html('post');
		// iframe
			$my_allowed['iframe'] = array(
			'src'             => array(),
			'height'          => array(),
			'width'           => array(),
			'frameborder'     => array(),
			'allowfullscreen' => array(),
		);
		// form fields - input
		$my_allowed['input'] = array(
			'class' => array(),
			'id' => array(),
			'name' => array(),
			'value' => array(),
			'type' => array(),
		);
		// select
		$my_allowed['select'] = array(
			'class' => array(),
			'id' => array(),
			'name' => array(),
			'value' => array(),
			'type' => array(),
		);
		// select options
		$my_allowed['option'] = array(
			'value' => array(),
			'selected' => array(),
		);
		// style
		$my_allowed['style'] = array(
			'types' => array(),
		);
		
		return $my_allowed;
	}
	
	function szechenyi_2020_619_shortcode_szechenyi_2020_logo($args)
	{
		
		$options = szechenyi_2020_619_get_options();
		$args = wp_parse_args($args, $options);
		
		if (!defined('SZECHENYI_2020_619_SZECHENYI_2020_LOGO')) {
			szechenyi_2020_619_styles_and_scripts_to_frontend_szechenyi_2020_logo();
		}
		
		$my_plugin = new JSzechenyi2020619_szechenyi_2020_logo($args);
		
		$html = $my_plugin->prepareContent();
		
		return wp_kses($html, expanded_alowed_tags());
	}
	
	add_shortcode('szechenyi-2020-logo-debug', 'szechenyi_2020_619_shortcode_szechenyi_2020_logo');
	
	class JSzechenyi2020619_szechenyi_2020_logo extends stdClass
	{
		private $options = null;
		private $errors = array();
		
		public function __construct($options)
		{
			$this->options = $options;
			$this->options['token'] = $this->getToken();
			
			
		}
		
		private function getToken()
		{
			$chars = 'ABCDEFGHIJKLMNOPQURSTXYVWZ0123456789';
			$token = '';
			for ($i = 1; $i <= 10; $i++) {
				$token .= substr($chars, rand(0, strlen($chars) - 1), 1);
			}
			return $token;
		}
		
		function addError($text)
		{
			// $this->addError(sprintf( __('Message (%s)', 'szechenyi-2020'), $variable));
			// $this->addError(__('Message', 'szechenyi-2020'));
			$this->errors[] = "\t" . $text;
		}
		
		function prepareContent()
		{
			$html = "\r\n" .
				'<div id="szechenyi_2020_' . $this->options['token'] . '"
                      class="szechenyi-2020-szechenyi-2020-logo"
                      data-plugin="szechenyi_2020"
                      data-token="' . $this->options['token'] . '">' . "\r\n" .
				'</div>' . "\r\n" .
				'<div>' . "\r\n" .
				'<pre>' . "\r\n" .
				print_r($this->options, true) .
				'</pre>' . "\r\n" .
				'</div>' . "\r\n" .
				$this->showErrors();
			
			return $html;
		}
		
		function showErrors()
		{
			
			$html = '';
			if (!empty($this->errors)) {
				$html = "\r\n" . '<!-- ' . "\r\n\t" . __('Széchenyi 2020 message:', 'szechenyi-2020') . "\r\n" .
					implode("\r\n", $this->errors) .
					"\r\n" . '-->' . "\r\n";
			}
			return $html;
		}
		
	}
