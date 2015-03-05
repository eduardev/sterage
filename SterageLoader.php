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
	
	function __construct($loadOptions = true, $loadTGM = true) {
		
		if ($loadOptions)	{ $this->loadThemeOptions(); }
		if ($loadTGM)		{ $this->loadTGMPluginActivator(); }
		
	}

	
	/**
	 * Check if we have Theme Options
	 */
	private function loadThemeOptions() {
		$of_functions	= __DIR__ . '/options-framework/functions.php';
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
	
}

$sterage	= new SterageLoader();