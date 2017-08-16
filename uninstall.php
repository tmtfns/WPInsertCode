<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
    if ( get_option('WPInsertCode_options') )  {
        delete_option('WPInsertCode_options');
    }    


//global $wpdb, $wp_version;


