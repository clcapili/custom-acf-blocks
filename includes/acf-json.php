<?php
/**
 * ACF Set custom load and save JSON points.
 *
 * @link https://www.advancedcustomfields.com/resources/local-json/
 */

add_filter( 'acf/json/load_paths', 'custom_acf_blocks_json_load_paths' );
add_filter( 'acf/settings/save_json/type=acf-field-group', 'custom_acf_blocks_json_save_path_for_field_groups' );
add_filter( 'acf/json/save_file_name', 'custom_acf_blocks_json_filename', 10, 3 );

/**
 * Set a custom ACF JSON load path.
 *
 * @link https://www.advancedcustomfields.com/resources/local-json/#loading-explained
 *
 * @param array $paths Existing, incoming paths.
 *
 * @return array $paths New, outgoing paths.
 *
 * @since 0.1.1
 */
function custom_acf_blocks_json_load_paths( $paths ) {
	$paths[] = CUSTOM_ACF_BLOCKS_PLUGIN_DIR . '/acf-json/field-groups';

	return $paths;
}

/**
 * Set custom ACF JSON save point for
 * ACF generated field groups.
 *
 * @link https://www.advancedcustomfields.com/resources/local-json/#saving-explained
 *
 * @return string $path New, outgoing path.
 *
 * @since 0.1.1
 */
function custom_acf_blocks_json_save_path_for_field_groups() {
	return CUSTOM_ACF_BLOCKS_PLUGIN_DIR . '/acf-json/field-groups';
}

/**
 * Customize the file names for each file.
 *
 * @link https://www.advancedcustomfields.com/resources/local-json/#saving-explained
 *
 * @param string $filename  The default filename.
 * @param array  $post      The main post array for the item being saved.
 *
 * @return string $filename
 *
 * @since  0.1.1
 */
function custom_acf_blocks_json_filename( $filename, $post ) {
	$filename = str_replace(
		[
			' ',
			'_',
		],
		[
			'-',
			'-',
		],
		$post['title']
	);

	$filename = strtolower( $filename ) . '.json';

	return $filename;
}
