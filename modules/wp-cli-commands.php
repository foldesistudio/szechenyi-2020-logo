<?php
	
	function is_cli_running(): bool
	{
		return defined('WP_CLI') && WP_CLI;
	}
	
	if (is_cli_running()) {
		/**
		 * Just a few sample commands to learn how WP-CLI works
		 */
		class cli_site_info extends WP_CLI_Command
		{
			/**
			 * Display version information.
			 * ## OPTIONS
			 *
			 * [--wponly]
			 * : Shows only WP version info, omitting the plugin one.
			 */
			function about($args, $assoc_args)
			{
				//$ wp szechenyi-2020-logo about --wponly
				if (!empty($assoc_args['wponly'])) {
					WP_CLI::line(WP_CLI::colorize('Version of WordPress is %G' . get_bloginfo('version') . '%n.'));
				} //$ wp szechenyi-2020-logo version
				else {
					
					$option = get_option('szechenyi_2020_options');
					
					WP_CLI::line(WP_CLI::colorize('Logo has been placed as %m' . $option['misi_szechenyi2020_position_place'] . ' position%n at %m' . $option['misi_szechenyi2020_position_y'] . '\'s ' . $option['misi_szechenyi2020_position_x'] . '%n side.'));
					
					WP_CLI::line(WP_CLI::colorize('Plug-in version of %YSzéchenyi 2020 Logo%n is %Yv' . SZECHENYI_2020_619_VERSION . '%n , and version of %GWordPress v' . get_bloginfo('version') . '%n.'));
				}
			}
			
			//$ wp szechenyi-2020-logo debug
			function list_options($args, $assoc_args)
			{
				$options = get_option('szechenyi_2020_options');
				
				$progress = \WP_CLI\Utils\make_progress_bar("The option' values of 'szechenyi_2020_options':", $options);
				
				foreach ($options as $option_key => $option_value):
					//$ wp szechenyi-2020-logo list_options --all-fields
					if (!empty($assoc_args['all-fields'])):
						WP_CLI::line(WP_CLI::colorize('%p       [' . esc_js(esc_js($option_key) . ']%n') . WP_CLI::colorize('%Y => %n') . WP_CLI::colorize('%G' . esc_js($option_value) . '%n')));
					else:
						if (!empty($option_value)):
							WP_CLI::line(WP_CLI::colorize('%p       [' . esc_js(esc_js($option_key) . ']%n') . WP_CLI::colorize('%Y => %n') . WP_CLI::colorize('%G' . esc_js($option_value) . '%n')));
						endif;
					endif;
					
					$progress->tick();
				endforeach;
				$progress->finish();
				
			}
			
			
			function update_option($args, $assoc_args)
			{
WP_CLI::line('
If you want to update a nested value in option of Széchenyi 2020 Logo, use the official way:
');
WP_CLI::line(WP_CLI::colorize('%Y%Uwp option patch update%n%g szechenyi_2020_options misi_szechenyi2020_width%n %1300%n'));
WP_CLI::line('
See more information:
* wp szechenyi-2020-logo list_options
* developer.wordpress.org/cli/commands/option/patch
');
				
			}
		}
		
		
		WP_CLI::add_command('szechenyi-2020-logo', 'cli_site_info');
	}
	