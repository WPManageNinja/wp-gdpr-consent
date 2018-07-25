<?php namespace WP_GDPR\Classes;


class Menu 
{

	public static function addAdminMenuPages()
	{
		
		add_menu_page(
            __( 'WP GDPR', 'wp_gdpr' ),
            __( 'WP GDRP Consent', 'wp_gdpr' ),
            static::managePermission(),
            'ninja-wp-gdpr.php',
            array( static::class, 'renderGDPR'),
            '',
            6
        );
	}

	public static function managePermission()
	{
		return apply_filters('ninja_wp_gdpr_menu_manager_permission', 'manage_options');
	}


	public static function renderGDPR()
	{
		wp_enqueue_script('ninja_wp_gdpr_js', WP_GDPR_PLUGIN_DIR_URL.'public/js/ninja_wp_gdpr.js', array('jquery'), WP_GDPR_PLUGIN_DIR_VERSION, true );
		include	WP_GDPR_PLUGIN_DIR_PATH.'views/admin_view.php';
		
	}

}

