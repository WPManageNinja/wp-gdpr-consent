<div style='position:fixed; top:0px; width:100%; background:<?php echo $background;?>; color:<?php echo $color; ?>; z-index: 9999999999; padding: 10px;' id='wpgdpr_banner_top'>
    <p style='margin-left: 20px; display: inline; position: relative; top: 8px; color:<?php echo $color_msg; ?>;'> <?php echo $ConfigDatas['message'];?> </p>
    <?php if($link): ?>
        <a href='<?php echo esc_url($link); ?>' target='_blank' style='margin-left:7px; display: inline; position: relative; top:7px; font-size:16px; color:#A2A1A1; margin-left:8px;'>
            <?php echo $ConfigDatas['policyLinkText'];?>
        </a>
    <?php endif; ?>
        <div style='display:inline; float:right; margin-right:20px'> 
           <?php if($showDeclineBtn): ?>
                <span style='margin-right:15px; position: relative; top: 10px;'> 
                    <a style='font-size:17px; color:#fff; cursor: pointer;' class='gdprDecBtn'> Decline</a>
                </span>
            <?php endif; ?>
            <a style='font-size:17px; color:<?php echo $dismissBtnColor; ?>; cursor: pointer;' class='gdprAcptBtn'>
                <span style='position: relative; float: right; background-color:<?php echo $dismissBtnBg;?>; padding:10px; margin-right: 10px;'>
                    <?php echo wp_kses_post($ConfigDatas['dismissBtnText']); ?>
                </span>
            </a>
        </div>
</div>
