<?php
echo"<div style='position:fixed; bottom:0px; width:100%; background:".$background."; color:".$color."; z-index: 99999; padding: 10px;' id='wpgdpr_banner_bottom'>
    <p style='margin-left: 20px; display: inline; position: relative; top:12px; color:".$color_msg.";'>" .$ConfigDatas['message'] . "</p>
    ".($link ? "<a href='".$link."' target='_blank' style='display:inline; position:relative; top:12px; font-size:16px; color:#A2A1A1; margin-left:8px; '>". $ConfigDatas['policyLinkText']. "</a>" : " ")."
   <div style='display:inline; float:right; margin-right:20px'> 
        <span style='margin-right:15px; position: relative; top: 10px;'> 
            <a style='font-size:17px; color:#fff; cursor: pointer;' class='gdprDecBtn'> ".($showDeclineBtn == true ? "Decline" : " ")." </a>
        </span>
        <a style='font-size:17px; color:".$dismissBtnColor."; cursor: pointer;' class='gdprAcptBtn'>
            <span style='position: relative; float: right; background-color:".$dismissBtnBg."; padding:10px; margin-right: 10px;'>
                ".$ConfigDatas['dismissBtnText']."
            </span>
        </a>
    </div>
</div>";