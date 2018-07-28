<?php namespace WP_GDPR\Classes;

class GdprHandler
{
	public $config;

	public static function handleAjaxCalls()
	{
		$route = sanitize_text_field( $_REQUEST['route'] );
		
		if( $_COOKIE['wp_gdpr_permission'] != '' ) {
			return;
		}

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
		$selected_obj   = $ConfigDatas['styleObj']['selectedBanner'];
		$link 			= $ConfigDatas['customLink'];
		
		// styleMsg
		$color_msg 	= $ConfigDatas['styleMsg']['color'];

		// styleDismissBtn
		$dismissBtnBg 		= $ConfigDatas['styleDismissBtn']['background'];
		$dismissBtnColor 	= $ConfigDatas['styleDismissBtn']['color'];
		// settings
		$showDeclineBtn 	= $ConfigDatas['settings']['showDeclineBtn'];
		$duration 			= $ConfigDatas['settings']['duration'];
		$delay				= $ConfigDatas['settings']['delay'];

		$script = static::getScript( $ConfigDatas );

		add_action('wp_footer', function() use ($script) {
			echo $script;
		});


        if( $selected_obj == 'banner_top' && $_COOKIE['wp_gdpr_permission'] == '' ){
			
			include(WP_GDPR_PLUGIN_DIR_PATH.'views/banner_top.php');
			die();

        }

		elseif( $selected_obj == 'banner_bottom' && $_COOKIE['wp_gdpr_permission'] == '') {
			
			include(WP_GDPR_PLUGIN_DIR_PATH.'views/banner_bottom.php');

		}


		elseif( $selected_obj == 'banner_right' && $_COOKIE['wp_gdpr_permission'] == '' ) {

			echo "<div style='border-radius:10px; position:fixed; width: 25%; padding: 27px; bottom: 17px; right: 12px; background:".$background."; color:".$color."; z-index: 99999; margin-right: 9px;' id='wpgdpr_banner_right'>
					<p style='position: relative; top: 15px; color:".$color_msg.";'>" .$ConfigDatas['message'] . "</p>
					<a href='".$link."' target='_blank' style='display: inline; position: relative; font-size: 14px; color: #C5C5C5'>" . $ConfigDatas['policyLinkText']. "</a>
					<div style='display:inline; float:right; '> 
						<span style='margin-right:15px; position: relative; top: 10px;'> 
							<a href='#' style='font-size:17px; color:#fff;' class='gdprDecBtn'> ".($showDeclineBtn == true ? "Decline" : " ")." </a>
						</span>
						<a href='#' style='font-size:17px; color:".$dismissBtnColor.";' class='gdprAcptBtn'>
							<span style='position: relative; float: right; background-color:".$dismissBtnBg."; padding:10px;'>
								". $ConfigDatas['dismissBtnText']." 
							</span>
						</a>
					</div>
				</div>";
		}

		elseif( $selected_obj == 'banner_left' && $_COOKIE['wp_gdpr_permission'] == '' ) {

			echo "<div style='border-radius:10px; position:fixed; width: 25%; padding: 27px; bottom: 17px; background:".$background."; color:".$color."; z-index: 99999; margin-left: 20px;' id='wpgdpr_banner_left'>
					<p style='position: relative; top: 15px; color:".$color_msg.";'>" .$ConfigDatas['message'] . "</p>
					<a href='".$link."' target='_blank' style='display: inline; position: relative; color:". $color_msg.";'>" . $ConfigDatas['policyLinkText']. "</a>
					<div style='display:inline; float:right; '> 
						<span style='margin-right:15px; position: relative; top: 10px;'> 
							<a href='#' style='font-size:17px; color:#fff;' class='gdprDecBtn'> ".($showDeclineBtn == true ? "Decline" : " ")." </a>
						</span>
						<a href='#' style='font-size:17px; color:".$dismissBtnColor.";' class='gdprAcptBtn'>
							<span style='position: relative; float: right; background-color:".$dismissBtnBg."; padding:10px;'>
								". $ConfigDatas['dismissBtnText']." 
							</span>
						</a>
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
                'color'		=> '#fff'
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

	public function getScript($config)
	{
	
		ob_start();

		?>

			<script type="text/javascript">
				var config = "<?php print_r($config); ?>";
				console.log(config)
			</script>


		<?php
		return ob_get_clean();
		
	}




}