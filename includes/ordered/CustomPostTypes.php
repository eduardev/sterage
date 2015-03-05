<?php

/*
 * Sterage - a set of scripts/classes/files to help kickstart wordpress theme using Roots/Sage.
 * All code under MIT license.
 * @author Eduardo Pereira
 * @url http://edu.ardo.pt
 * @date 5/mar/2015 19:06:00
 */

/**
 * Description of CustomPostTypes
 *
 * @author Eduardo Pereira <email@edu.ardo.pt>
 */
class CustomPostTypes {
	
	/**
	 * Load all custom post type files
	 */
	function __construct() {
		$dir = new DirectoryIterator(dirname(__FILE__) . '/../../cpts');
		foreach ($dir as $fileinfo) {
			if ('php' === $fileinfo->getExtension()) {
				require_once $fileinfo->getPathname();
			}
		}
		unset($dir, $fileinfo);
	}

	
}
$cpts	= new CustomPostTypes();
