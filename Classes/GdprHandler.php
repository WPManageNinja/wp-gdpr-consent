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


	public static function get_gdpr($returnType = 'ajax')
	
	{
		$getGdprConfig = get_option('_gdpr_option_consent', false);
		wp_send_json_success(array(
			'getGdprConfig' => $getGdprConfig,
		));
	}


	public static function updateGdprOption($gdprConfig)
	{
		
		$consentKey =  update_option('_gdpr_option_consent', $gdprConfig);

		// $update =  get_option('_gdpr_option_consent', false);
		wp_send_json_success(array(
            // 'message' => $update,
            'message' => __('Successfuly updated', 'wp_gdpr')
		));
	}


	public static function populateDemoAddData()
	{
		$demoData = static::getGDPRConfig(); 
		add_option( '_gdpr_option_consent',  $demoData, '', 'yes' );
	}


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
			),

	 		'styleMsg'=> array(
				'padding'	=> '15px',
                'margin'	=> '0',
                'display'	=> 'inline-block',
                'color'		=> '#fff',
                'fontSize'	=> ''
			),
                    
            'stylePolicy' => array (
            	'color'=> 'wheat'
			),
                
            'styleDismissBtn'  => array(
                'float'		 => 'right',
                'marginTop'	 => '9px',
                'marginRight'=> '8px',
                'background' => '#152CB5',
                'borderColor'=> '#152CB5'
            ),
            
            'message' => 'This website uses cookies to ensure you get the best experience on our website.',
			'policyLinkText' => 'Learn More',
			'dismissBtnText' => 'Got it!'

		);

	}





}