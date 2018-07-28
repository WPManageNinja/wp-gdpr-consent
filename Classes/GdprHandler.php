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
		$color 			= $ConfigDatas['styleObj']['color'];
		$padding		= $ConfigDatas['styleObj']['padding'];
        $left 			= $ConfigDatas['styleObj']['left'];
        $float 		    = $ConfigDatas['styleObj']['float'];
		$right 			= $ConfigDatas['styleObj']['right'];
		$borderRadius 	= $ConfigDatas['styleObj']['borderRadius'];
		$maxWidth 		= $ConfigDatas['styleObj']['maxWidth'];
		$marginTop_db 	= $ConfigDatas['styleObj']['marginTop'];
		$marginLeft 	= $ConfigDatas['styleObj']['marginLeft'];
		$float_db 		= $ConfigDatas['styleObj']['float'];
        $display 		= $ConfigDatas['styleObj']['display'];
        $selected_obj   = $ConfigDatas['styleObj']['selectedBanner'];
        $link 			= $ConfigDatas['customLink'];
       
        // styleMsg
		 $color_msg 	= $ConfigDatas['styleMsg']['color'];

		// styleDismissBtn
		 $dismissBtnBg 		= $ConfigDatas['styleDismissBtn']['background'];
		 $dismissBtnColor 	= $ConfigDatas['styleDismissBtn']['color'];

		// settings
		$showDeclineBtn 	= $ConfigDatas['settings']['showDeclineBtn'];
		
		$delay				= $ConfigDatas['settings']['delay'];



        if( $selected_obj == 'banner_top'){
            
            echo "<div style='position:fixed; top:0px; width:100%; background:".$background."; color:".$color."; z-index: 99999; padding: 10px;'>
            		<p style='margin-left: 20px; display: inline; position: relative; top: 8px; color:".$color_msg.";'>" .$ConfigDatas['message'] . "</p>
                    <a href='".$link."' target='_blank' style='margin-left:7px; display: inline; position: relative; top:7px; color:". $color_msg.";'>" . $ConfigDatas['policyLinkText']. "</a>
                    	<div style='display:inline; float:right; margin-right:20px'> 
                        	<span style='margin-right:15px; position: relative; top: 10px;'> 
                        		<a href='#' style='font-size:17px; color:#fff;'> ".($showDeclineBtn == true ? "Decline" : " ")." </a>
                        	</span>
							<span style='position: relative; float: right; background-color:".$dismissBtnBg."; padding:10px; margin-right: 10px;'>
		                        <a href='#' style='font-size:17px; color:".$dismissBtnColor.";'>" . $ConfigDatas['dismissBtnText']. "</a>
		                    </span>
	                    </div>
				</div>";

           }

           elseif( $selected_obj == 'banner_bottom') {

                echo "<div style='position:fixed; bottom:0px; width:100%; background:".$background."; color:".$color."; z-index: 99999; padding: 10px;'>
                        <p style='margin-left: 20px; display: inline; position: relative; top: 12px; color:".$color_msg.";'>" .$ConfigDatas['message'] . "</p>
                        <a href='".$link."' target='_blank' style='display: inline; position: relative; top: 12px; margin-left:8px; color:". $color_msg.";'>" . $ConfigDatas['policyLinkText']. "</a>
                        <div style='display:inline; float:right; margin-right:20px'> 
                        	<span style='margin-right:15px; position: relative; top: 10px;'> 
                        		<a href='#' style='font-size:17px; color:#fff;'> ".($showDeclineBtn == true ? "Decline" : " ")." </a>
                        	</span>
							<span style='position: relative; float: right; background-color:".$dismissBtnBg."; padding:10px; margin-right: 10px;'>
		                        <a href='#' style='font-size:17px; color:".$dismissBtnColor.";'>" . $ConfigDatas['dismissBtnText']. "</a>
		                    </span>
	                    </div>
					</div>";

           }


           elseif( $selected_obj == 'banner_right' ) {

            echo "<div style='border-radius:10px; position:fixed; width: 25%; padding: 27px; bottom: 17px; right: 12px; background:".$background."; color:".$color."; z-index: 99999; margin-right: 9px;'>
                    <p style='position: relative; top: 15px; color:".$color_msg.";'>" .$ConfigDatas['message'] . "</p>
                    <a href='".$link."' target='_blank' style='display: inline; position: relative; color:". $color_msg.";'>" . $ConfigDatas['policyLinkText']. "</a>
                    <div style='display:inline; float:right; '> 
                    	<span style='margin-right:15px; position: relative; top: 10px;'> 
                    		<a href='#' style='font-size:17px; color:#fff;'> ".($showDeclineBtn == true ? "Decline" : " ")." </a>
                    	</span>
						<span style='position: relative; float: right; background-color:".$dismissBtnBg."; padding:10px;'>
	                        <a href='#' style='font-size:17px; color:".$dismissBtnColor.";'>" . $ConfigDatas['dismissBtnText']. "</a>
	                    </span>
                    </div>
				</div>";
			}

           elseif( $selected_obj == 'banner_left' ) {

            echo "<div style='border-radius:10px; position:fixed; width: 25%; padding: 27px; bottom: 17px; background:".$background."; color:".$color."; z-index: 99999; margin-left: 20px;'>
                    <p style='position: relative; top: 15px; color:".$color_msg.";'>" .$ConfigDatas['message'] . "</p>
                    <a href='".$link."' target='_blank' style='display: inline; position: relative; color:". $color_msg.";'>" . $ConfigDatas['policyLinkText']. "</a>
                    <div style='display:inline; float:right; '> 
                    	<span style='margin-right:15px; position: relative; top: 10px;'> 
                    		<a href='#' style='font-size:17px; color:#fff;'> ".($showDeclineBtn == true ? "Decline" : " ")." </a>
                    	</span>
						<span style='position: relative; float: right; background-color:".$dismissBtnBg."; padding:10px;'>
	                        <a href='#' style='font-size:17px; color:".$dismissBtnColor.";'>" . $ConfigDatas['dismissBtnText']. "</a>
	                    </span>
                    </div>
				</div>";
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
                'display'     => 'block',
                'selectedBanner' => 'banner_bottom'
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
