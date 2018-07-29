<?php
echo "<div style='border-radius:10px; position:fixed; width: 25%; padding: 27px; bottom: 17px; background:".$background."; color:".$color."; z-index: 99999; margin-left: 20px;' id='wpgdpr_banner_left'>
		<p style='position: relative; top: 15px; color:".$color_msg.";'>" .$ConfigDatas['message'] . "</p>
		".($link ? "<a href='".$link."' target='_blank' style='display: inline; position: relative; font-size:16px; color:#A2A1A1; '>" . $ConfigDatas['policyLinkText']. "</a>" : "")."
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