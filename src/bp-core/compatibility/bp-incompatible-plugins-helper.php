<?php

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;


/**
 * Remove buddypress follow init hook action
 *
 * Support buddypress follow
 */
remove_action( 'bp_include', 'bp_follow_init' );

/**
 * Remove message of BuddyPress Groups Export & Import
 *
 * Support ddyPress Groups Export & Import
 */
remove_action( 'plugins_loaded', 'bpgei_plugin_init' );

/**
 * Include plugin when plugin is activated
 *
 * Support Rank Math SEO
 */
function bp_helper_plugins_loaded_callback() {
	global $plugins;
	if ( in_array( 'seo-by-rank-math/rank-math.php', $plugins ) && ! is_admin() ) {
		require( buddypress()->plugin_dir . '/bp-core/compatibility/bp-rankmath-plugin-helpers.php' );
	}
}

add_action( 'init', 'bp_helper_plugins_loaded_callback', 1000 );