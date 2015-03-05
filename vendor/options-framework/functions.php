<?php

/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/sterage/vendor/options-framework/inc/' );
require_once __DIR__ . '/inc/options-framework.php';

// Loads options.php from child or parent theme
$optionsfile = __DIR__ . '/options.php';
load_template( $optionsfile );

/*
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 *
 * You can delete it if you not using that option
 */
add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#home_show_box_links').click(function() {
  		jQuery('.home-page-links').fadeToggle(400);
	});

	if (jQuery('#home_show_box_links:checked').val() !== undefined) {
		jQuery('.home-page-links').show();
	}
	
	jQuery('#home_show_news').click(function() {
  		jQuery('.home-page-news').fadeToggle(400);
	});

	if (jQuery('#home_show_news:checked').val() !== undefined) {
		jQuery('.home-page-news').show();
	}

});
</script>

<?php
}

/*
 * This is an example of filtering menu parameters
 */
function prefix_options_menu_filter( $menu ) {
	$menu['mode']		= 'menu';
	$menu['page_title'] = __( 'Horizon Options', 'roots');
	$menu['menu_title'] = __( 'Horizon Options', 'roots');
	$menu['menu_slug']	= 'horizon-options';
	return $menu;
}
add_filter( 'optionsframework_menu', 'prefix_options_menu_filter' );