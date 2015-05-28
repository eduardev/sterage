<?php

/*
 * Sterage - a set of scripts/classes/files to help kickstart wordpress theme using Roots/Sage.
 * All code under MIT license.
 * @author Eduardo Pereira
 * @url http://edu.ardo.pt
 * @date 5/mar/2015 19:09:15
 */

/**
 * Description of SterageLoader
 *
 * @author Eduardo Pereira <email@edu.ardo.pt>
 */
class SterageLoader {
	
	protected $steragePath;

	/**
	 * 
	 * @param type $themeName
	 * @param type $loadOptions
	 * @param type $loadTGM
	 */
	function __construct($themeName, $steragePath = 'sterage', $loadOptions = true, $loadTGM = true) {
		
		define('THEME_NAME', $themeName);
		
		if ($loadOptions)	{ $this->loadThemeOptions(); }
		if ($loadTGM)		{ $this->loadTGMPluginActivator(); }
		
		$this->steragePath	= $steragePath;
		
		$this->loadOrderedFiles();
		$this->loadUnorderedFiles();
		
	}
	
	/**
	 * Check if we have Theme Options
	 */
	private function loadThemeOptions() {
		$of_functions	= __DIR__ . '/vendor/options-framework/functions.php';
		if (file_exists($of_functions)) {
			require_once $of_functions;
		}
	}
	
	/**
	 * Check if we have TGM plugin requirer.
	 * NOTE: Do not forget to edit file plugins.php, so TGM
	 * knows what to load and from where to load.
	 */
	private function loadTGMPluginActivator() {
		$TGM_functions	= __DIR__ . '/vendor/tgm-plugin-activation/functions.php';
		if (file_exists($TGM_functions)) {
			require_once $TGM_functions;
		}
	}
	
	/**
	 * Ordered custom theme includes
	 *
	 * The $customIncludes array determines the code library included in our theme.
	 * Add or remove files to the array as needed. Supports child theme overrides.
	 *
	 * Please note that missing files will produce a fatal error.
	 *
	 * @link https://github.com/roots/roots/pull/1042
	 */
	private function loadOrderedFiles() {
		$orderedFiles = array(
			'CustomPostTypes.php',		// Custom Post Types
		);
		
		foreach ($orderedFiles as $file) {
			if (!$filepath = locate_template($this->steragePath . '/includes/ordered/' . $file)) {
				trigger_error(sprintf(__('Error locating %s for inclusion', 'roots'), $file), E_USER_ERROR);
			}
			require_once $filepath;
		}
		unset($file, $filepath);
	}
	
	
	/**
	 * Now loop and include all files inside our custom-lib directory.
	 * NOTE: the order to load is alphabetical. If needed any specific order
	 * use the array $customIncludes above.
	 */
	private function loadUnorderedFiles() {
		$dir = new DirectoryIterator(dirname(__FILE__) . '/includes/wild');
		foreach ($dir as $fileinfo) {
			if (!$fileinfo->isDot() && 'php' === $fileinfo->getExtension()) {
				require_once $fileinfo->getPathname();
			}
		}
		unset($dir, $fileinfo);
	}
	
}

$sterage	= new SterageLoader('HERITAGE', 'lib/sterage');