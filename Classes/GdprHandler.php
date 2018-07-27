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
		
		wp_enqueue_script('wp_gdpr_user_display', WP_GDPR_PLUGIN_DIR_URL.'public/js/wp_gdpr_user_display.js', array('jquery'), WP_GDPR_PLUGIN_DIR_VERSION, true );
		$ConfigDatas = get_option('_gdpr_option_consent', false);

	// styleObj
		$background 	= $ConfigDatas['styleObj']['background'];
		$bottom 		= $ConfigDatas['styleObj']['bottom'];
		$color 			= $ConfigDatas['styleObj']['color'];
		$position		= $ConfigDatas['styleObj']['position'];
		$width 			= $ConfigDatas['styleObj']['width'];
		$top 			= $ConfigDatas['styleObj']['top'];
		$margin 		= $ConfigDatas['styleObj']['margin'];
		$padding		= $ConfigDatas['styleObj']['padding'];
		$left 			= $ConfigDatas['styleObj']['left'];
		$right 			= $ConfigDatas['styleObj']['right'];
		$borderRadius 	= $ConfigDatas['styleObj']['borderRadius'];
		$maxWidth 		= $ConfigDatas['styleObj']['maxWidth'];
		$marginTop 		= $ConfigDatas['styleObj']['marginTop'];
		$marginLeft 	= $ConfigDatas['styleObj']['marginLeft'];
		$float 		    = $ConfigDatas['styleObj']['float'];
		$display 		= $ConfigDatas['styleObj']['display'];

		// styleMsg
		$padding_msg = $ConfigDatas['styleMsg']['padding'];
		$margin_msg = $ConfigDatas['styleMsg']['margin'];
		$display_msg = $ConfigDatas['styleMsg']['display'];
		$color_msg = $ConfigDatas['styleMsg']['color'];
		$fontSize_msg = $ConfigDatas['styleMsg']['fontSize'];

		// Confirmation BTN 
		$display_conf = $ConfigDatas['confirmationBtn']['display'];
		$float_conf = $ConfigDatas['confirmationBtn']['float'];
		$marginTop_conf = $ConfigDatas['confirmationBtn']['margin-top'];
		$marginRight_conf = $ConfigDatas['confirmationBtn']['margin-right'];

			
			
				echo "<div style=' background:".$background."; bottom:".$bottom."; color:".$color."; position:".$position.";
				 width:".$width.";   top:".$top.";   margin:".$margin.";   padding:".$padding.";  left:".$left.";  right:".$right."; 
				  borderRadius:".$borderRadius.";   maxWidth:".$maxWidth.";   marginTop:".$marginTop.";   marginLeft:".$marginLeft."; 
				    float:".$float.";   display:".$display.";  '".  ">
							<p style='padding:" .$padding_msg. "; margin:".$margin_msg."; display:".$display_msg."; color:" .$color_msg."; font-size:" .$fontSize_msg."'>" .$ConfigDatas['message'] . "</p>
							<p style='padding:" .$padding_msg. "; margin:".$margin_msg."; display:".$display_msg."; color:" .$color_msg."; font-size:" .$fontSize_msg."'> " . $ConfigDatas['policyLinkText']. "</p>
							<div style=' display:" .$display_conf."; float:" .$float_conf."; margin-top:" .$marginTop_conf."; margin-right:" .$marginRight_conf.";'>
						    <p> " . $ConfigDatas['dismissBtnText']. "</p>
						    </div>

					</div>";
			
			
		

		



		// echo '<div style="margin-top:-100px; background-color:red">
		// 		<p style="">hi ruhel khan</p> 
		// 			<a href="" target="_blank" style="">Learn More</a>
		// 			<div style="">
		// 				<a style="">Decline</a> 
		// 				<button type="button" class="" style="">
		// 					<span>Got it!</span>
		// 				</button>
		// 			</div>
		// 	</div>


		// ';

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