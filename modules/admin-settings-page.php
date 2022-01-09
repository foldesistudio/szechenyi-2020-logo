<?php
	if (!defined('ABSPATH')) exit;
	
	new szechenyi_2020_619_settings();
	
	
	class szechenyi_2020_619_settings
	{
		/**
		 * The attributes that are mass assignable.
		 * http://jsonselector.com/
		 * @var array
		 */
		
		private $options;
		
		/**
		 * Render settings
		 */
		
		
		public function __construct()
		{
			add_action('admin_menu', array($this, 'add_plugin_page'));
			add_action('admin_init', array($this, 'page_init'));
		}
		
		public function page_init()
		{
			register_setting(
				'szechenyi_2020_option_main',
				'szechenyi_2020_options',
				array($this, 'sanitize')
			);
			
			add_settings_section(
				'szechenyi_2020_settings_main',
				__('Széchenyi 2020 Custom Settings', 'szechenyi-2020'),
				array($this, 'print_section_info'),
				'szechenyi-2020-setting-admin'
			);
			
			foreach ($this->settings_stable() as $key => $value) {
				
				add_settings_field(
					$key,
					__($value['title'], 'szechenyi-2020'),
					array($this, $key . '_callback'),
					'szechenyi-2020-setting-admin',
					'szechenyi_2020_settings_main',
					array(
						'class' => $key,
						'label_for' => $key
					));
			}
			
			
		}
		
		
		
		public static function fillable()
		{
			return
				array(
					'misi_szechenyi2020_position_place' => [
						'title' => __('Position Place', 'szechenyi-2020'),
						'description' => __('This specifies the type of positioning method used for logo element. If fixed is selected,  it is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled.', 'szechenyi-2020'),
						'values' => [
							'fixed' => __('Fixed', 'szechenyi-2020'),
							'absolute' => __('Absolute', 'szechenyi-2020')
						]
					],
					'misi_szechenyi2020_position_y' => [
						'title' => __('Vertical Position', 'szechenyi-2020'),
						'description' => __('This affects the vertical position of a positioned logo element.', 'szechenyi-2020'),
						'values' => [
							'top' => __('Top', 'szechenyi-2020'),
							'bottom' => __('Bottom', 'szechenyi-2020')
						]
					],
					'misi_szechenyi2020_position_x' => [
						'title' => __('Horizontal Position', 'szechenyi-2020'),
						'description' => __('This affects the horizontal position of a positioned logo element.', 'szechenyi-2020'),
						'values' => [
							'left' => __('Left', 'szechenyi-2020'),
							'right' => __('Right', 'szechenyi-2020')
						]
					],
					'misi_szechenyi2020_close_button' => [
						'title' => __('Close Button', 'szechenyi-2020'),
						'description' => __('This affects to turn the logo element to closeable.', 'szechenyi-2020'),
						'values' => [
							'yes' => __('Yes', 'szechenyi-2020'),
							'no' => __('No', 'szechenyi-2020')
						]
					],
					'misi_szechenyi2020_width' => [
						'title' => __('Width', 'szechenyi-2020'),
						'description' => __('This sets the width of logo element.', 'szechenyi-2020')
					],
					'misi_szechenyi2020_height' => [
						'title' => __('Height', 'szechenyi-2020'),
						'description' => __('This sets the height of logo element.', 'szechenyi-2020')
					],
					'misi_szechenyi2020_width_unit' => [
						'title' => __('Unit', 'szechenyi-2020'),
						'description' => __('Type of sizing. If percentages is selected, it allows the sizing of logo element relative to their containing page.', 'szechenyi-2020'),
						'values' => [
							'px' => __('Pixel', 'szechenyi-2020'),
							'%' => __('Percent', 'szechenyi-2020')
						]
					],
					'misi_szechenyi2020_background_color_turn_on' => [
						'title' => __('Background Color', 'szechenyi-2020'),
						'description' => __('This sets the background color of logo element.', 'szechenyi-2020'),
						'values' => [
							'yes' => __('Yes', 'szechenyi-2020'),
							'no' => __('No', 'szechenyi-2020')
						]
					],
					'misi_szechenyi2020_background_color' => [
						'title' => __('Set Background Color', 'szechenyi-2020'),
						'description' => __('Specifies the background color.', 'szechenyi-2020')
					],
					'misi_szechenyi2020_margin_top' => [
						'title' => __('Margin Top', 'szechenyi-2020'),
						'description' => __('This sets the top margin of logo element.', 'szechenyi-2020')
					],
					'misi_szechenyi2020_margin_right' => [
						'title' => __('Margin Right', 'szechenyi-2020'),
						'description' => __('This sets the right margin of logo element.', 'szechenyi-2020')
					],
					'misi_szechenyi2020_margin_bottom' => [
						'title' => __('Margin Bottom', 'szechenyi-2020'),
						'description' => __('This sets the bottom margin of logo element.', 'szechenyi-2020')
					],
					'misi_szechenyi2020_margin_left' => [
						'title' => __('Margin Left', 'szechenyi-2020'),
						'description' => __('This sets the left margin of logo element.', 'szechenyi-2020')
					],
					'misi_szechenyi2020_border_top' => [
						'title' => __('Border Top', 'szechenyi-2020'),
						'description' => __('This sets the top border of logo element.', 'szechenyi-2020')
					],
					'misi_szechenyi2020_border_right' => [
						'title' => __('Border Right', 'szechenyi-2020'),
						'description' => __('This sets the right border of logo element.', 'szechenyi-2020')
					],
					'misi_szechenyi2020_border_bottom' => [
						'title' => __('Border Bottom', 'szechenyi-2020'),
						'description' => __('This sets the bottom border of logo element.', 'szechenyi-2020')
					],
					'misi_szechenyi2020_border_left' => [
						'title' => __('Border Left', 'szechenyi-2020'),
						'description' => __('Border left Description', 'szechenyi-2020')
					],
					'misi_szechenyi2020_border_type' => [
						'title' => __('Border Type', 'szechenyi-2020'),
						'description' => __('This sets the style of logo element\'s  border', 'szechenyi-2020'),
						'values' => [
							'none' => __('None', 'szechenyi-2020'),
							'dashed' => __('Dashed', 'szechenyi-2020'),
							'dotted' => __('Dotted', 'szechenyi-2020'),
							'double' => __('Double', 'szechenyi-2020'),
							'groove' => __('Groove', 'szechenyi-2020'),
							'inset' => __('Inset', 'szechenyi-2020'),
							'outset' => __('Outset', 'szechenyi-2020'),
							'ridge' => __('Ridge', 'szechenyi-2020'),
							'solid' => __('Solid', 'szechenyi-2020')
						]
					],
					'misi_szechenyi2020_border_color_turn_on' => [
						'title' => __('Border Color', 'szechenyi-2020'),
						'description' => __('This sets the color of logo element\'s all borders.', 'szechenyi-2020'),
						'values' => [
							'yes' => __('Yes', 'szechenyi-2020'),
							'no' => __('No', 'szechenyi-2020')
						]
					],
					'misi_szechenyi2020_border_color' => [
						'title' => __('Set Border Color', 'szechenyi-2020'),
						'description' => __('Specifies the border color.', 'szechenyi-2020')
					],
					'misi_szechenyi2020_border_radius' => [
						'title' => __('Border Radius', 'szechenyi-2020'),
						'description' => __('This affects the sort of logo element\'s border style.', 'szechenyi-2020'),
						'values' => [
							'straight_cornor' => __('Straight Cornor', 'szechenyi-2020'),
							'round_cornor' => __('Round Cornor', 'szechenyi-2020')
						]
					],
					'misi_szechenyi2020_border_radius_size' => [
						'title' => __('Border Radius Size', 'szechenyi-2020'),
						'description' => __('This defines the radius of the logo element\'s corners. You can set it Round Cornor is selected.', 'szechenyi-2020')
					],
					'misi_szechenyi2020_padding_top' => [
						'title' => __('Padding Top', 'szechenyi-2020'),
						'description' => __(' This sets top space between logo element and its top border.', 'szechenyi-2020')
					],
					'misi_szechenyi2020_padding_right' => [
						'title' => __('Padding Right', 'szechenyi-2020'),
						'description' => __('This sets right space between logo element and its right border.', 'szechenyi-2020')
					],
					'misi_szechenyi2020_padding_bottom' => [
						'title' => __('Padding Bottom', 'szechenyi-2020'),
						'description' => __('This sets bottom space between logo element and its bottom border.', 'szechenyi-2020')
					],
					'misi_szechenyi2020_padding_left' => [
						'title' => __('Padding Left', 'szechenyi-2020'),
						'description' => __('This sets left space between logo element and its left border.', 'szechenyi-2020')
					],
					'misi_szechenyi2020_css_custom_desktop' => [
						'title' => __('Custom CSS for Desktop', 'szechenyi-2020'),
						'description' => __('This sets custom css for desktop sizes.', 'szechenyi-2020')
					],
					'misi_szechenyi2020_css_custom_mobile' => [
						'title' => __('Custom CSS for Mobile', 'szechenyi-2020'),
						'description' => __('This sets custom css for mobile sizes.', 'szechenyi-2020')
					],
					'misi_szechenyi2020_page_url' => [
						'title' => __('Page URL', 'szechenyi-2020'),
						'description' => __('This sets page address of destination.', 'szechenyi-2020')
					],
					'misi_szechenyi2020_theme' => [
						'title' => __('Theme Fix', 'szechenyi-2020'),
						'description' => __('This sets some CSS fixes for theme. Sometimes logo element hides functionality of scroll to top.', 'szechenyi-2020'),
						'values' => [
							'none' => __('None', 'szechenyi-2020'),
							'divi' => __('Divi', 'szechenyi-2020'),
							'enfold' => __('Enfold', 'szechenyi-2020')
						]
					]
				);
		}
		
		public function settings_stable()
		{
			$settings_all = $this->fillable();
			$settings_unwanted_beta = [
				// Todo: Release on v1.1.0
				'misi_szechenyi2020_padding_top',
				'misi_szechenyi2020_padding_right',
				'misi_szechenyi2020_padding_bottom',
				'misi_szechenyi2020_padding_left',
				
				// Todo: Release on v1.1.1
				'misi_szechenyi2020_close_button',
				
				// Todo: Release on v1.1.2
				'misi_szechenyi2020_background_color_turn_on',
				'misi_szechenyi2020_background_color',
				'misi_szechenyi2020_border_top',
				'misi_szechenyi2020_border_right',
				'misi_szechenyi2020_border_bottom',
				'misi_szechenyi2020_border_left',
				'misi_szechenyi2020_border_type',
				'misi_szechenyi2020_border_color_turn_on',
				'misi_szechenyi2020_border_color',
				'misi_szechenyi2020_border_radius',
				'misi_szechenyi2020_border_radius_size',
				
				// Todo: Release on v1.1.3
				'misi_szechenyi2020_css_custom_desktop',
				'misi_szechenyi2020_css_custom_mobile',
				
				// Todo: Release on v1.1.4
				'misi_szechenyi2020_theme',
				'misi_szechenyi2020_height',
			];
			
			
			$settings_stable = array_diff_key($settings_all, array_flip($settings_unwanted_beta));
			
			return $settings_stable;
		}
		
		/**
		 * WordPress expanded allowed tags for wp_kses
         * https://gist.github.com/adamsilverstein/10783774
		 * @return array
		 */
		public function expanded_alowed_tags() {
			$my_allowed = wp_kses_allowed_html( 'post' );
			// iframe
            /*	$my_allowed['iframe'] = array(
				'src'             => array(),
				'height'          => array(),
				'width'           => array(),
				'frameborder'     => array(),
				'allowfullscreen' => array(),
			);*/
			// form fields - input
			$my_allowed['input'] = array(
				'class' => array(),
				'id'    => array(),
				'name'  => array(),
				'value' => array(),
				'type'  => array(),
			);
			// select
			$my_allowed['select'] = array(
				'class'  => array(),
				'id'     => array(),
				'name'   => array(),
				'value'  => array(),
				'type'   => array(),
			);
			// select options
			$my_allowed['option'] = array(
				'value'  => array(),
				'selected' => array(),
			);
			// style
			$my_allowed['style'] = array(
				'types' => array(),
			);
			
			return $my_allowed;
		}
  
		/**
		 * Sanitize the inputs
		 *
		 * @param array $inputs
		 * @return array
		 */
		public function sanitize($inputs)
		{
			delete_transient('misi_szechenyi2020_css_transient');
			delete_transient('misi_szechenyi2020_html_transient');
			
			$filteredInputs = array();
			foreach ($inputs as $key => $value) {
				if (in_array($key, array_keys($this->fillable()))) {
					$filteredInputs[$key] = trim($value);
				}
			}
			
			return $filteredInputs;
		}
		
		
		public function add_plugin_page()
		{
			add_options_page(
				__('Széchenyi 2020 Logo', 'szechenyi-2020'),
				__('Széchenyi 2020 Logo', 'szechenyi-2020'),
				'manage_options',
				'szechenyi-2020-setting-admin',
				array($this, 'create_admin_page')
			);
			
		}
		
		public function create_admin_page()
		{
			$this->options = szechenyi_2020_619_get_options();
			$tabs_key = [
				'setup',
				'about'
			];
			$tabs_text = [
				__('Setup', 'szechenyi-2020'),
				__('About', 'szechenyi-2020')
			];
			
			?>
            <style>
				
				.form-table td {
					padding: 10px;
				}
				
				
				/*				.form-table tr:nth-child(even) {
									background-color: #f6f7f7;
								}*/
                <?php
							$option = get_option('szechenyi_2020_options');
			
				if (isset($option['misi_szechenyi2020_background_color_turn_on']) == 'no') {
				?>
				
				.misi_szechenyi2020_background_color {
					display: none;
				}

                <?php
                }
              if (isset($option['misi_szechenyi2020_border_color_turn_on']) == 'no') {
		        ?>
				
				.misi_szechenyi2020_border_color {
					display: none;
				}

                <?php
				}
				?>
            </style>
            <div class="wrap">
                <h1 class="wp-heading-inline"><?php esc_attr_e('Széchenyi 2020 Logo', 'szechenyi-2020'); ?></h1>
				<?php
					$active_tab = isset($_GET['szechenyi-2020-tab']) ? sanitize_text_field($_GET['szechenyi-2020-tab']) : 'setup';
				?>
                <h2 class="nav-tab-wrapper">
					<?php for ($i = 0; $i <= count($tabs_key) - 1; $i++) { ?>
                        <a href="<?php echo esc_attr(esc_url(get_admin_url())); ?>options-general.php?page=szechenyi-2020-setting-admin&szechenyi-2020-tab=<?php echo esc_attr($tabs_key[$i]); ?>"
                           class="nav-tab <?php echo $active_tab == esc_attr($tabs_key[$i]) ? 'nav-tab-active' : ''; ?>"><?php echo esc_attr($tabs_text[$i]); ?></a>
					<?php } ?>
                </h2>
                <div class="szechenyi-2020-setting-page">
					
					<?php
						switch ($active_tab) {
							
							case 'setup':
								?>
                                <div class="card">
                                    <form method="post" action="options.php">
										<?php
											settings_fields('szechenyi_2020_option_main');
											do_settings_sections('szechenyi-2020-setting-admin');
											submit_button();
										?>
                                    </form>
                                </div>
								<?php
								break;
							
							default:
								szechenyi_2020_619_include('/libs/admin/' . $active_tab . '.php');
						}
					?>
					
					<?php require 'admin-credits.php'; ?>
                </div>
            </div>
			<?php
		}
		
		
		/**
		 *
		 */
		public function print_section_info()
		{
			esc_attr_e('Welcome on admin settings page of Széchenyi 2020 Logo. If you would like you can modify default parameters manually with this form. The current default settings are for guidance only. The developer of the plug-in assumes no any responsibility. ', 'szechenyi-2020');
		}
		
		public function misi_szechenyi2020_position_place_callback()
		{
			$html = '<!-- misi_szechenyi2020_position_place -->';
			$html .= '<select name="szechenyi_2020_options[misi_szechenyi2020_position_place]" id="misi_szechenyi2020_position_place">';
			foreach ($this->fillable()['misi_szechenyi2020_position_place']['values'] as $key => $item) {
				$html .= '<option value="' . $key . '"';
				
				if ($this->options['misi_szechenyi2020_position_place'] == $key) {
					$html .= ' selected';
				}
				
				$html .= '>' . $item . '</option>';
			}
			
			$html .= '</select>';
			$html .= '<br /><small>' . $this->fillable()['misi_szechenyi2020_position_place']['description'] . '</small>';
			
     		echo wp_kses($html ,$this->expanded_alowed_tags());
			
			
		}
		
		public function misi_szechenyi2020_position_y_callback()
		{
			$html = '<!-- misi_szechenyi2020_position_y -->';
			$html .= '<select name="szechenyi_2020_options[misi_szechenyi2020_position_y]" id="misi_szechenyi2020_position_y">';
			foreach ($this->fillable()['misi_szechenyi2020_position_y']['values'] as $key => $item) {
				$html .= '<option value="' . $key . '"';
				
				if ($this->options['misi_szechenyi2020_position_y'] == $key) {
					$html .= ' selected';
				}
				
				$html .= '>' . $item . '</option>';
			}
			
			$html .= '</select>';
			$html .= '<br /><small>' . $this->fillable()['misi_szechenyi2020_position_y']['description'] . '</small>';
			
			echo wp_kses($html ,$this->expanded_alowed_tags());
		}
		
		public function misi_szechenyi2020_position_x_callback()
		{
			$html = '<!-- misi_szechenyi2020_position_x -->';
			$html .= '<select name="szechenyi_2020_options[misi_szechenyi2020_position_x]" id="misi_szechenyi2020_position_x">';
			foreach ($this->fillable()['misi_szechenyi2020_position_x']['values'] as $key => $item) {
				$html .= '<option value="' . $key . '"';
				
				if ($this->options['misi_szechenyi2020_position_x'] == $key) {
					$html .= ' selected';
				}
				
				$html .= '>' . $item . '</option>';
			}
			
			$html .= '</select>';
			$html .= '<br /><small>' . $this->fillable()['misi_szechenyi2020_position_x']['description'] . '</small>';
			
			echo wp_kses($html ,$this->expanded_alowed_tags());
		}
		
		public function misi_szechenyi2020_close_button_callback()
		{
			$html = '<!-- misi_szechenyi2020_close_button -->';
			$html .= '<select name="szechenyi_2020_options[misi_szechenyi2020_close_button]" id="misi_szechenyi2020_close_button">';
			foreach ($this->fillable()['misi_szechenyi2020_close_button']['values'] as $key => $item) {
				$html .= '<option value="' . $key . '"';
				
				if ($this->options['misi_szechenyi2020_close_button'] == $key) {
					$html .= ' selected';
				}
				
				$html .= '>' . $item . '</option>';
			}
			
			$html .= '</select>';
			$html .= '<br /><small>' . $this->fillable()['misi_szechenyi2020_close_button']['description'] . '</small>';
			
			echo wp_kses($html ,$this->expanded_alowed_tags());
		}
		
		public function misi_szechenyi2020_width_callback()
		{
			printf(
				'<input type="number" name="szechenyi_2020_options[misi_szechenyi2020_width]" id="misi_szechenyi2020_width" class="all-options" placeholder="%1s" value="%2s" required />' .
				'<br /><small>' . $this->fillable()['misi_szechenyi2020_width']['description'] . '</small>',
				$this->fillable()['misi_szechenyi2020_width']['title'],
				isset($this->options['misi_szechenyi2020_width']) ? esc_attr($this->options['misi_szechenyi2020_width']) : ''
			);
		}
		
		public function misi_szechenyi2020_height_callback()
		{
			printf(
				'<input type="number" name="szechenyi_2020_options[misi_szechenyi2020_height]" id="misi_szechenyi2020_height" class="all-options" placeholder="%1s" value="%2s" />' .
				'<br /><small>' . $this->fillable()['misi_szechenyi2020_height']['description'] . '</small>',
				$this->fillable()['misi_szechenyi2020_height']['title'],
				isset($this->options['misi_szechenyi2020_height']) ? esc_attr($this->options['misi_szechenyi2020_height']) : ''
			);
		}
		
		public function misi_szechenyi2020_width_unit_callback()
		{
			$html = '<!-- misi_szechenyi2020_width_unit -->';
			$html .= '<select name="szechenyi_2020_options[misi_szechenyi2020_width_unit]" id="misi_szechenyi2020_width_unit">';
			foreach ($this->fillable()['misi_szechenyi2020_width_unit']['values'] as $key => $item) {
				$html .= '<option value="' . $key . '"';
				
				if ($this->options['misi_szechenyi2020_width_unit'] == $key) {
					$html .= ' selected';
				}
				
				$html .= '>' . $item . '</option>';
			}
			
			$html .= '</select>';
			$html .= '<br /><small>' . $this->fillable()['misi_szechenyi2020_width_unit']['description'] . '</small>';
			
			echo wp_kses($html ,$this->expanded_alowed_tags());
		}
		
		public function misi_szechenyi2020_background_color_turn_on_callback()
		{
			$html = '<!-- misi_szechenyi2020_width_unit -->';
			$html .= '<select name="szechenyi_2020_options[misi_szechenyi2020_background_color_turn_on]" id="misi_szechenyi2020_background_color_turn_on">';
			foreach ($this->fillable()['misi_szechenyi2020_background_color_turn_on']['values'] as $key => $item) {
				$html .= '<option value="' . $key . '"';
				
				if ($this->options['misi_szechenyi2020_background_color_turn_on'] == $key) {
					$html .= ' selected';
				}
				
				$html .= '>' . $item . '</option>';
			}
			
			$html .= '</select>';
			$html .= '<br /><small>' . $this->fillable()['misi_szechenyi2020_background_color_turn_on']['description'] . '</small>';
			
			echo wp_kses($html ,$this->expanded_alowed_tags());
		}
		
		public function misi_szechenyi2020_background_color_callback()
		{
			
			$options = get_option('szechenyi_2020_options');
			$option_border_radius = $options['misi_szechenyi2020_background_color_turn_on'];
			$disabled = null;
			if ($option_border_radius == 'no') {
				$disabled = " disabled ";
			}
			
			printf(
				'<input type="color" name="szechenyi_2020_options[misi_szechenyi2020_background_color]" id="misi_szechenyi2020_background_color" class="all-options" value="%s"' . $disabled . '/>' .
				'<br /><small>' . $this->fillable()['misi_szechenyi2020_background_color']['description'] . '</small>',
				isset($this->options['misi_szechenyi2020_background_color']) ? esc_attr($this->options['misi_szechenyi2020_background_color']) : ''
			);
		}
		
		public function misi_szechenyi2020_margin_top_callback()
		{
			printf(
				'<input type="number" name="szechenyi_2020_options[misi_szechenyi2020_margin_top]" id="misi_szechenyi2020_margin_top" class="all-options" placeholder="%1s" value="%2s" />' .
				'<br /><small>' . $this->fillable()['misi_szechenyi2020_margin_top']['description'] . '</small>',
				$this->fillable()['misi_szechenyi2020_margin_top']['title'],
				isset($this->options['misi_szechenyi2020_margin_top']) ? esc_attr($this->options['misi_szechenyi2020_margin_top']) : ''
			);
		}
		
		public function misi_szechenyi2020_margin_right_callback()
		{
			printf(
				'<input type="number" name="szechenyi_2020_options[misi_szechenyi2020_margin_right]" id="misi_szechenyi2020_margin_right" class="all-options" placeholder="%1s" value="%2s"/>' .
				'<br /><small>' . $this->fillable()['misi_szechenyi2020_margin_right']['description'] . '</small>',
				$this->fillable()['misi_szechenyi2020_margin_right']['title'],
				isset($this->options['misi_szechenyi2020_margin_right']) ? esc_attr($this->options['misi_szechenyi2020_margin_right']) : ''
			);
		}
		
		public function misi_szechenyi2020_margin_bottom_callback()
		{
			printf(
				'<input type="number" name="szechenyi_2020_options[misi_szechenyi2020_margin_bottom]" id="misi_szechenyi2020_margin_bottom" class="all-options" placeholder="%1s" value="%2s"/>' .
				'<br /><small>' . $this->fillable()['misi_szechenyi2020_margin_bottom']['description'] . '</small>',
				$this->fillable()['misi_szechenyi2020_margin_bottom']['title'],
				isset($this->options['misi_szechenyi2020_margin_bottom']) ? esc_attr($this->options['misi_szechenyi2020_margin_bottom']) : ''
			);
		}
		
		public function misi_szechenyi2020_margin_left_callback()
		{
			printf(
				'<input type="number" name="szechenyi_2020_options[misi_szechenyi2020_margin_left]" id="misi_szechenyi2020_margin_left" class="all-options" placeholder="%1s" value="%2s"/>' .
				'<br /><small>' . $this->fillable()['misi_szechenyi2020_margin_left']['description'] . '</small>',
				$this->fillable()['misi_szechenyi2020_margin_left']['title'],
				isset($this->options['misi_szechenyi2020_margin_left']) ? esc_attr($this->options['misi_szechenyi2020_margin_left']) : ''
			);
		}
		
		public function misi_szechenyi2020_border_top_callback()
		{
			printf(
				'<input type="number" name="szechenyi_2020_options[misi_szechenyi2020_border_top]" id="misi_szechenyi2020_border_top" class="all-options" placeholder="%1s" value="%2s"/>' .
				'<br /><small>' . $this->fillable()['misi_szechenyi2020_border_top']['description'] . '</small>',
				$this->fillable()['misi_szechenyi2020_border_top']['title'],
				isset($this->options['misi_szechenyi2020_border_top']) ? esc_attr($this->options['misi_szechenyi2020_border_top']) : ''
			);
		}
		
		public function misi_szechenyi2020_border_right_callback()
		{
			printf(
				'<input type="number" name="szechenyi_2020_options[misi_szechenyi2020_border_right]" id="misi_szechenyi2020_border_right" class="all-options" placeholder="%1s" value="%2s" />' .
				'<br /><small>' . $this->fillable()['misi_szechenyi2020_border_right']['description'] . '</small>',
				$this->fillable()['misi_szechenyi2020_border_right']['title'],
				isset($this->options['misi_szechenyi2020_border_right']) ? esc_attr($this->options['misi_szechenyi2020_border_right']) : ''
			);
		}
		
		public function misi_szechenyi2020_border_bottom_callback()
		{
			printf(
				'<input type="number" name="szechenyi_2020_options[misi_szechenyi2020_border_bottom]" id="misi_szechenyi2020_border_bottom" class="all-options" placeholder="%1s" value="%2s" />' .
				'<br /><small>' . $this->fillable()['misi_szechenyi2020_border_bottom']['description'] . '</small>',
				$this->fillable()['misi_szechenyi2020_border_bottom']['title'],
				isset($this->options['misi_szechenyi2020_border_bottom']) ? esc_attr($this->options['misi_szechenyi2020_border_bottom']) : ''
			);
		}
		
		public function misi_szechenyi2020_border_left_callback()
		{
			printf(
				'<input type="number" name="szechenyi_2020_options[misi_szechenyi2020_border_left]" id="misi_szechenyi2020_border_left" class="all-options" placeholder="%1s" value="%2s" />' .
				'<br /><small>' . $this->fillable()['misi_szechenyi2020_border_left']['description'] . '</small>',
				$this->fillable()['misi_szechenyi2020_border_left']['title'],
				isset($this->options['misi_szechenyi2020_border_left']) ? esc_attr($this->options['misi_szechenyi2020_border_left']) : ''
			);
		}
		
		public function misi_szechenyi2020_border_type_callback()
		{
			$html = '<!-- misi_szechenyi2020_border_type -->';
			$html .= '<select name="szechenyi_2020_options[misi_szechenyi2020_border_type]" id="misi_szechenyi2020_border_type">';
			foreach ($this->fillable()['misi_szechenyi2020_border_type']['values'] as $key => $item) {
				$html .= '<option value="' . $key . '"';
				
				if ($this->options['misi_szechenyi2020_border_type'] == $key) {
					$html .= ' selected';
				}
				
				$html .= '>' . $item . '</option>';
			}
			
			$html .= '</select>';
			$html .= '<br /><small>' . $this->fillable()['misi_szechenyi2020_border_type']['description'] . '</small>';
			
			echo wp_kses($html ,$this->expanded_alowed_tags());
		}
		
		public function misi_szechenyi2020_border_radius_callback()
		{
			$html = '<!-- misi_szechenyi2020_border_radius -->';
			$html .= '<select name="szechenyi_2020_options[misi_szechenyi2020_border_radius]" id="misi_szechenyi2020_border_radius">';
			foreach ($this->fillable()['misi_szechenyi2020_border_radius']['values'] as $key => $item) {
				$html .= '<option value="' . $key . '"';
				
				if ($this->options['misi_szechenyi2020_border_radius'] == $key) {
					$html .= ' selected';
				}
				
				$html .= '>' . $item . '</option>';
			}
			
			$html .= '</select>';
			$html .= '<br /><small>' . $this->fillable()['misi_szechenyi2020_border_radius']['description'] . '</small>';
			
			echo wp_kses($html ,$this->expanded_alowed_tags());
		}
		
		public function misi_szechenyi2020_border_radius_size_callback()
		{
			$options = get_option('szechenyi_2020_options');
			$option_border_radius = $options['misi_szechenyi2020_border_radius'];
			$disabled = null;
			if ($option_border_radius != 'round_cornor') {
				$disabled = " disabled ";
			}
			printf(
				'<input type="number" name="szechenyi_2020_options[misi_szechenyi2020_border_radius_size]" id="misi_szechenyi2020_border_radius_size" class="all-options" placeholder="%1s" value="%2s"' . $disabled . '/>' .
				'<br /><small>' . $this->fillable()['misi_szechenyi2020_border_radius_size']['description'] . '</small>',
				$this->fillable()['misi_szechenyi2020_border_radius_size']['title'],
				isset($this->options['misi_szechenyi2020_border_radius_size']) ? esc_attr($this->options['misi_szechenyi2020_border_radius_size']) : ''
			);
		}
		
		public function misi_szechenyi2020_border_color_turn_on_callback()
		{
			$html = '<!-- misi_szechenyi2020_border_color_turn_on -->';
			$html .= '<select name="szechenyi_2020_options[misi_szechenyi2020_border_color_turn_on]" id="misi_szechenyi2020_border_color_turn_on">';
			foreach ($this->fillable()['misi_szechenyi2020_border_color_turn_on']['values'] as $key => $item) {
				$html .= '<option value="' . $key . '"';
				
				if ($this->options['misi_szechenyi2020_border_color_turn_on'] == $key) {
					$html .= ' selected';
				}
				
				$html .= '>' . $item . '</option>';
			}
			
			$html .= '</select>';
			$html .= '<br /><small>' . $this->fillable()['misi_szechenyi2020_border_color_turn_on']['description'] . '</small>';
			
			echo wp_kses($html ,$this->expanded_alowed_tags());
		}
		
		public function misi_szechenyi2020_border_color_callback()
		{
			$options = get_option('szechenyi_2020_options');
			$option_border_radius = $options['misi_szechenyi2020_border_color_turn_on'];
			$disabled = null;
			if ($option_border_radius == 'no') {
				$disabled = " disabled ";
			}
			
			printf(
				'<input type="color" name="szechenyi_2020_options[misi_szechenyi2020_border_color]" id="misi_szechenyi2020_border_color" class="all-options" value="%s"' . $disabled . '/>' .
				'<br /><small>' . $this->fillable()['misi_szechenyi2020_border_color']['description'] . '</small>',
				isset($this->options['misi_szechenyi2020_border_color']) ? esc_attr($this->options['misi_szechenyi2020_border_color']) : ''
			);
			
		}
		
		public function misi_szechenyi2020_padding_top_callback()
		{
			printf(
				'<input type="number" name="szechenyi_2020_options[misi_szechenyi2020_padding_top]" id="misi_szechenyi2020_padding_top" class="all-options" placeholder="%1s" value="%2s" />' .
				'<br /><small>' . $this->fillable()['misi_szechenyi2020_padding_top']['description'] . '</small>',
				$this->fillable()['misi_szechenyi2020_padding_top']['title'],
				isset($this->options['misi_szechenyi2020_padding_top']) ? esc_attr($this->options['misi_szechenyi2020_padding_top']) : ''
			);
		}
		
		public function misi_szechenyi2020_padding_right_callback()
		{
			printf(
				'<input type="number" name="szechenyi_2020_options[misi_szechenyi2020_padding_right]" id="misi_szechenyi2020_padding_right" class="all-options" placeholder="%1s" value="%2s" />' .
				'<br /><small>' . $this->fillable()['misi_szechenyi2020_padding_right']['description'] . '</small>',
				$this->fillable()['misi_szechenyi2020_padding_right']['title'],
				isset($this->options['misi_szechenyi2020_padding_right']) ? esc_attr($this->options['misi_szechenyi2020_padding_right']) : ''
			);
		}
		
		public function misi_szechenyi2020_padding_bottom_callback()
		{
			printf(
				'<input type="number" name="szechenyi_2020_options[misi_szechenyi2020_padding_bottom]" id="misi_szechenyi2020_padding_bottom" class="all-options" placeholder="%1s" value="%2s" />' .
				'<br /><small>' . $this->fillable()['misi_szechenyi2020_padding_bottom']['description'] . '</small>',
				$this->fillable()['misi_szechenyi2020_padding_bottom']['title'],
				isset($this->options['misi_szechenyi2020_padding_bottom']) ? esc_attr($this->options['misi_szechenyi2020_padding_bottom']) : ''
			);
		}
		
		public function misi_szechenyi2020_padding_left_callback()
		{
			printf(
				'<input type="number" name="szechenyi_2020_options[misi_szechenyi2020_padding_left]" id="misi_szechenyi2020_padding_left" class="all-options" placeholder="%1s" value="%2s" />' .
				'<br /><small>' . $this->fillable()['misi_szechenyi2020_padding_left']['description'] . '</small>',
				$this->fillable()['misi_szechenyi2020_padding_left']['title'],
				isset($this->options['misi_szechenyi2020_padding_left']) ? esc_attr($this->options['misi_szechenyi2020_padding_left']) : ''
			);
		}
		
		public function misi_szechenyi2020_css_custom_desktop_callback()
		{
			printf(
				'<textarea name="szechenyi_2020_options[misi_szechenyi2020_css_custom_desktop]" id="misi_szechenyi2020_css_custom_desktop" cols="80" rows="10" class="all-options" placeholder="%1s">%2s</textarea>' .
				'<br /><small>' . $this->fillable()['misi_szechenyi2020_css_custom_desktop']['description'] . '</small>',
				$this->fillable()['misi_szechenyi2020_css_custom_desktop']['title'],
				isset($this->options['misi_szechenyi2020_css_custom_desktop']) ? esc_attr($this->options['misi_szechenyi2020_css_custom_desktop']) : ''
			);
		}
		
		public function misi_szechenyi2020_css_custom_mobile_callback()
		{
			printf(
				'<textarea name="szechenyi_2020_options[misi_szechenyi2020_css_custom_mobile]" id="misi_szechenyi2020_css_custom_mobile" cols="80" rows="10" class="all-options" placeholder="%1s">%2s</textarea>' .
				'<br /><small>' . $this->fillable()['misi_szechenyi2020_css_custom_mobile']['description'] . '</small>',
				$this->fillable()['misi_szechenyi2020_css_custom_mobile']['title'],
				isset($this->options['misi_szechenyi2020_css_custom_mobile']) ? esc_attr($this->options['misi_szechenyi2020_css_custom_mobile']) : ''
			);
		}
		
		public function misi_szechenyi2020_page_url_callback()
		{
			printf(
				'<input type="url" name="szechenyi_2020_options[misi_szechenyi2020_page_url]" id="misi_szechenyi2020_page_url" class="all-options" placeholder="%1s" value="%2s" />' .
				'<br /><small>' . $this->fillable()['misi_szechenyi2020_page_url']['description'] . '</small>',
				$this->fillable()['misi_szechenyi2020_page_url']['title'],
				isset($this->options['misi_szechenyi2020_page_url']) ? esc_attr(esc_url($this->options['misi_szechenyi2020_page_url'])) : ''
			
			);
		}
		
		public function misi_szechenyi2020_theme_callback()
		{
			echo '<!--  misi_szechenyi2020_theme -->';
			$html = array();
			
			foreach ($this->fillable()['misi_szechenyi2020_theme']['values'] as $key => $item) {
				$tmp = '<label><input type="radio" name="szechenyi_2020_options[misi_szechenyi2020_theme]" id="misi_szechenyi2020_theme" value="' . $key . '" ';
				if ($this->options['misi_szechenyi2020_theme'] == $key) {
					$tmp .= 'checked="checked" ';
				}
				$tmp .= '/>' . $item;
				$html[] = $tmp;
			}
			$html = '<div>' . implode('<br />', $html) . '</div>';
			$html .= '<small>' . $this->fillable()['misi_szechenyi2020_theme']['description'] . '</small></label';
			
            echo wp_kses($html ,$this->expanded_alowed_tags());
		}
		
		
	}


