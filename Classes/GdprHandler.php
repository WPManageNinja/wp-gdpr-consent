<?php namespace WP_GDPR\Classes;

class GdprHandler
{
	
	public static function handleAjaxCalls()
	{
		$route = sanitize_text_field( $_REQUEST['route'] );
		
		if($route == 'update_config'){
			$gdpr_Con = wp_unslash($_REQUEST['gdprConfig']); 
			$gdprConfig = json_decode(trim(stripslashes($gdpr_Con)), true);
			static::updateGdprOption($gdprConfig);
		}

		if( $route == 'get_gdprconfig' ){
			static::get_gdpr('ajax');
		}


		
	}

	/**
     *  Fatching data
    */
	public static function get_gdpr($returnType = 'ajax')
	{
		$getGdprConfig = get_option('_gdpr_option_consent', false);
		wp_send_json_success(array(
			'getGdprConfig' => $getGdprConfig,
		));
	}



	public static function gdprConfigVars()
	{	
		$gdprConfigData = get_option('_gdpr_option_consent', false);
		wp_enqueue_script('wp_gdpr_user_display', WP_GDPR_PLUGIN_DIR_URL.'public/js/wp_gdpr_user_display.js', array('jquery'), WP_GDPR_PLUGIN_DIR_VERSION, true );
		wp_localize_script('wp_gdpr_user_display', 'getGdprConfig_vars',  $gdprConfigData) ;
		return "<div id='wp_gdpr_userDisplay'></div>";
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
				'top'		  => '403px',
				'margin'	  => '0',
				'padding'	  =>'0px',
				'left'		  =>'0px',
				'right'		  =>'0px',
				'borderRadius'=>'0px',
				'maxWidth'	  => '',
				'marginTop'	  => '0px',
				'marginLeft'  =>'0px',
                'float'		  =>'',
                'display'     => 'block'
			),

	 		'styleMsg'=> array(
				'padding'	=> '15px',
                'margin'	=> '0',
                'display'	=> 'inline-block',
                'color'		=> '#fff',
                'fontSize'	=> '10px'
			),
                    
            'stylePolicy' => array (
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
                'delay' => '',
                'showDeclineBtn'  => false
            ),
            
            'message' => 'This website uses cookies to ensure you get the best experience on our website.',
			'policyLinkText' => 'Learn More',
            'dismissBtnText' => 'Got it!',
            'customLink' => ''

		);

	}





}