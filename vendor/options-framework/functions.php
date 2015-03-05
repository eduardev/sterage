<?php

/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/sterage/vendor/options-framework/inc/' );
require_once __DIR__ . '/inc/options-framework.php';

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

});
</script>

<?php
}

/*
 * This is an example of filtering menu parameters
 */
function prefix_options_menu_filter( $menu ) {
	$menu['mode']		= 'menu';
	$menu['page_title'] = __( 'Options', 'sage');
	$menu['menu_title'] = __( 'Options', 'sage');
	$menu['menu_slug']	= THEME_NAME . '-options';
	return $menu;
}
add_filter( 'optionsframework_menu', 'prefix_options_menu_filter' );