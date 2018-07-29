<?php
echo "<div style='position:fixed; top:0px; width:100%; background:".$background."; color:".$color."; z-index: 9999999999; padding: 10px;' id='wpgdpr_banner_top'>
    <p style='margin-left: 20px; display: inline; position: relative; top: 8px; color:".$color_msg.";'>" .$ConfigDatas['message'] . "</p>
    ".($link ? "<a href='".$link."' target='_blank' style='margin-left:7px; display: inline; position: relative; top:7px; font-size:16px; color:#A2A1A1; margin-left:8px; '>" . $ConfigDatas['policyLinkText']. "</a>" : "")."
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
</div>";

