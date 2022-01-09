<?php
	if (!defined('ABSPATH')) exit;
	
	/**
	 * @param $filename
	 */
	function szechenyi_2020_619_include($filename)
	{
		if (file_exists(SZECHENYI_2020_619_ROOT . $filename)) {
			include_once(SZECHENYI_2020_619_ROOT . $filename);
		}
	}
	
	/**
	 * Search all *.php files from a dir and include
	 * @param $path
	 * @param string[] $ext
	 */
	function szechenyi_2020_619_include_files($path, array $ext = array('php'))
	{
		$files = array();
		$handle = @opendir(SZECHENYI_2020_619_ROOT . $path);
		if ($handle) {
			while (false !== ($file = readdir($handle))) {
				if (!is_dir(SZECHENYI_2020_619_ROOT . $path . DS . $file)) {
					$info = pathinfo(SZECHENYI_2020_619_ROOT . $path . DS . $file);
					if (!isset($info['extension'])) {
						$info['extension'] = '';
					}
					
					if (in_array(strtolower($info['extension']), $ext)) {
						include_once(SZECHENYI_2020_619_ROOT . $path . DS . $file);
					}
				}
			}
		}
	}
	
	/**
	 * Search and include all shortcodes
	 */
	
	if (!is_admin()) {
		
		szechenyi_2020_619_include_files('/libs/shortcodes', array('php'));
	} else {
	
	}
	
	/**
	 * Search and include all hooks
	 */
	
	if (!is_admin() or defined('DOING_AJAX')) {
		
		szechenyi_2020_619_include('/libs/hooks.php');
		
	}
