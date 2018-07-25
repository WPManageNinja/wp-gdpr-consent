<?php

defined("ABSPATH") or die;

/*
Plugin Name: WP GDPR Consent
Description: The Best WP GDPR Consent Plugin for WordPress
Version: 1.0.0
Author: WPManageNinja
Author URI: https://wpmanageninja.com
Plugin URI: https://wpmanageninja.com/products/ninja-mortgage-calculator-plugin
License: GPLv2 or later
Text Domain: wp_gdpr
Domain Path: /languages
*/

include "load.php";
define("WP_GDPR_PLUGIN_DIR_URL", plugin_dir_url(__FILE__));
define("WP_GDPR_PLUGIN_DIR_PATH", plugin_dir_path(__FILE__));
define("WP_GDPR_PLUGIN_DIR_VERSION", plugin_dir_path(__FILE__));


class NINJAWPGDPR
{
	public function boot()
	{
		$this->commonHooks();
		$this->adminHooks();
		$this->publicHooks();
		$this->loadTextDomain();
	}



	public function commonHooks()
	{
		add_action('wp_enqueue_scripts', array($this, 'enqueueScripts') );


	}
	
	public function adminHooks()
	{
	
		add_action('admin_menu', array('WP_GDPR\Classes\Menu','addAdminMenuPages'));
		add_action('wp_ajax_ninja_gdpr_ajax_actions', array('WP_GDPR\Classes\GdprHandler','handleAjaxCalls'));
		add_action('init', array('WP_GDPR\Classes\GdprHandler','populateDemoAddData'));

	}


	public function publicHooks()
	{
		
	}

	public function enqueueScripts()
	
	{
		wp_enqueue_style('ninja_wp_gdpr_css', WP_GDPR_PLUGIN_DIR_URL.'/public/css/styles.css');


	}

	public function loadTextDomain()
	{
		
	}





	
}


add_action('plugins_loaded', function(){
	$ninjaWpGDPR = new NINJAWPGDPR();
	$ninjaWpGDPR->boot(); 
});
