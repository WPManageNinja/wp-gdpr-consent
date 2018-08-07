<?php namespace WP_GDPR\Classes;

class GdprHandler
{
	// public $config;

	public static function handleAjaxCalls()
	{
		$route = sanitize_text_field($_REQUEST['route']);
		
		if ($route == 'update_config') {
			$gdpr_Con = wp_unslash($_REQUEST['gdprConfig']); 
			$gdprConfig = json_decode(trim(stripslashes($gdpr_Con)), true);
			static::updateGdprOption($gdprConfig);
		}

		if ($route == 'get_gdprconfig') {
			static::get_gdpr();
		}
	}

	/**
	 * Fetch gdpr options from db.
	 * @return HTTP JSON Response
	 */
	public static function get_gdpr()
	{
		wp_send_json_success(array(
			'getGdprConfig' => get_option('_gdpr_option_consent', false),
		));
	}

	public static function addGDPRNotice()
	{
		$ConfigDatas = get_option('_gdpr_option_consent', false);

		// styleMsg
		$color_msg 	= $ConfigDatas['styleMsg']['color'];

    	// styleObj
		$link 			= $ConfigDatas['customLink'];
		$color 			= $ConfigDatas['styleObj']['color'];
    	$background 	= $ConfigDatas['styleObj']['background'];
		$selected_obj   = $ConfigDatas['styleObj']['selectedBanner'];

		// styleDismissBtn
		$dismissBtnColor 	= $ConfigDatas['styleDismissBtn']['color'];
		$dismissBtnBg 		= $ConfigDatas['styleDismissBtn']['background'];

		// settings
		$delay				= $ConfigDatas['settings']['delay'];
		$duration 			= $ConfigDatas['settings']['duration'];
		$showDeclineBtn 	= $ConfigDatas['settings']['showDeclineBtn'];

		wp_enqueue_script(
			'wp_gdpr_user_display',
			WP_GDPR_PLUGIN_DIR_URL.'public/js/wp_gdpr_user_display.js',
			array('jquery'),
			WP_GDPR_PLUGIN_DIR_VERSION,
			true
		);

		wp_localize_script('wp_gdpr_user_display','gpd_settings_vars', array(
			'delay' => $delay,
			'duration' => $duration
		));

        if ($selected_obj && !isset($_COOKIE['wp_gdpr_permission'])) {
        	include(WP_GDPR_PLUGIN_DIR_PATH."views/{$selected_obj}.php");
        }
	}

	/**
     *  Data Update when update button click..
    */
	public static function updateGdprOption($gdprConfig)
	{
		update_option('_gdpr_option_consent', $gdprConfig);
		wp_send_json_success(array(
            'message' => __('Successfuly updated', 'wp_gdpr')
		));
	}

	/**
     *  initially Added data..
     */
	public static function populateDemoAddData()
	{
		$demoData = static::getGDPRConfig(); 
		add_option( '_gdpr_option_consent',  $demoData, '', 'yes' );
	}

	/**
     *  Demo data..
     */
	public static function getGDPRConfig()
	{
		return array(

	 		'styleObj' => array(
                'bottom' 	  => '0px',
				'background'  => '#A3549E',
				'color' 	  => 'white',
				'position'	  => 'relative',
				'width' 	  => '100%',
				'padding'	  =>'0px',
				'left'		  =>'0px',
				'right'		  =>'0px',
				'borderRadius'=>'0px',
                'display'     => 'block',
                'selectedBanner' => 'banner_bottom'
			),

	 		'styleMsg'=> array(
				'padding'	=> '15px',
                'margin'	=> '0',
                'display'	=> 'inline-block',
                'color'		=> '#fff'
			),
                    
            'stylePolicy' => array(
            	'color'=> 'wheat'
            ),
            
            'confirmationBtn' => array(
                'display' => 'inline',
                'float' => 'right',
                'margin-top' => '10px',
                'margin-right' => '12px'            
            ),
                
            'styleDismissBtn'  => array(
                'float'		 => '',
                'marginTop'	 => '0px',
                'marginRight'=> '0px',
                'marginLeft' => '10px',
                'background' => '#152CB5',
                'borderColor'=> '#152CB5',
                'color' => '#fff',
                'display' => ''
            ),

            'settings' => array(
                'duration'  => '20',
                'delay' => '10',
                'showDeclineBtn'  => false
            ),
            
            'message' => 'This website uses cookies to ensure you get the best experience on our website.',
			'policyLinkText' => 'Learn More',
            'dismissBtnText' => 'Got it!',
            'customLink' => ''
		);
	}
}
