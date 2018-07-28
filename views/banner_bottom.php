<?php
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
?>


<div style='position:fixed; bottom:0px; width:100%; background:".$background."; color:".$color."; z-index: 99999; padding: 10px;' id='wpgdpr_banner_bottom'>
    <p style='margin-left: 20px; display: inline; position: relative; top: 12px; color:".$color_msg.";'>" .$ConfigDatas['message'] . "</p>
    <a href='".$link."' target='_blank' style='display: inline; position: relative; top: 12px; margin-left:8px; color:". $color_msg.";'>" . $ConfigDatas['policyLinkText']. "</a>
    <div style='display:inline; float:right; margin-right:20px'> 
        <span style='margin-right:15px; position: relative; top: 10px;'> 
            <a href='#' style='font-size:17px; color:#fff;' class='gdprDecBtn'> ".($showDeclineBtn == true ? "Decline" : " ")." </a>
        </span>
        <a href='#' style='font-size:17px; color:".$dismissBtnColor.";' class='gdprAcptBtn'>
            <span style='position: relative; float: right; background-color:".$dismissBtnBg."; padding:10px; margin-right: 10px;'>
                ".$ConfigDatas['dismissBtnText']."
            </span>
        </a>
    </div>
</div>