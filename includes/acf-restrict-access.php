<?php
/**
 * Limit capabilities of editing ACF fields,
 * post types, taxonomies and more in WP Admin.
 */

/**
 * @link https://www.advancedcustomfields.com/resources/how-to-hide-acf-menu-from-clients/
 */
add_filter( 'acf/settings/show_admin', 'custom_acf_blocks_show_acf_admin' );

/**
 * Allow access to ACF screens by WP user role
 * AND a list of allowed email domains.
 *
 * @link https://developer.wordpress.org/reference/functions/current_user_can/
 *
 * @return boolean $show Whether to show the ACF admin.
 *
 * @since 0.1.2
 */
function custom_acf_blocks_show_acf_admin($show) {
    // If our user can manage site options.
    if ( current_user_can( 'manage_options' ) ) {
        $user = wp_get_current_user();
        // Our list of allowed email domains.
        $allowed_email_domains = [
            'clcapili.local',
        ];

        // Make sure we have a WP_User object and email address.
        if ( $user && isset( $user->user_email ) ) {
            // Trim user email to domain only.
            $email_domain = trim( $user->user_email );
            $email_domain = explode( '@', $email_domain );
            $email_domain = strtolower( array_pop( $email_domain ) );

            // Compare current logged in user's email with our allow list.
            if ( in_array( $email_domain, $allowed_email_domains, true ) ) {
                return true;
            }
        }
    }
    
    // If user doesn't meet the criteria, return the original $show value.
    return $show;
}

/**
 * Filters the settings to pass to the block editor for all editor type.
 *
 * @link https://developer.wordpress.org/reference/hooks/block_editor_settings_all/
 */
add_filter( 'block_editor_settings_all', 'custom_acf_blocks_restrict_locking_ui', 10, 2 );

/**
 * Restrict access to the locking UI to designated email domains.
 *
 * @param array $settings Default editor settings.
 *
 * @since 0.1.3
 */
function custom_acf_blocks_restrict_locking_ui( $settings ) {
    // Check if the ACF admin is allowed for the current user.
    $acf_admin_allowed = custom_acf_blocks_show_acf_admin( false );

    // Set the 'canLockBlocks' setting based on ACF admin permission.
    $settings['canLockBlocks'] = $acf_admin_allowed;

    return $settings;
}
