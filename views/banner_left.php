<div style='border-radius:10px; position:fixed; width: 25%; padding: 27px; bottom: 17px; background:<?php echo $background;?>; color:<?php echo $color;?>; z-index: 99999; margin-left: 20px;' id='wpgdpr_banner_left'>
	<p style='position: relative; top: 15px; color:<?php echo $color_msg;?>;'> <?php echo $ConfigDatas['message']; ?> </p>
	 <?php if($link): ?>
		<a href="<?php echo esc_url($link);?>" target="_blank" style="display: inline; position: relative; font-size:16px; color:#A2A1A1;">
			<?php echo $ConfigDatas['policyLinkText']; ?>
		</a>
	<?php endif; ?>
	<div style='display:inline; float:right; '> 
		<?php if($showDeclineBtn): ?>
			<span style='margin-right:15px; position: relative; top: 10px;'> 
				<a style='font-size:17px; color:#fff; cursor: pointer;' class='gdprDecBtn'> Decline </a>
			</span>
		<?php endif; ?>
		<a style='font-size:17px; color:<?php echo $dismissBtnColor;?>; cursor: pointer;' class='gdprAcptBtn'>
			<span style='position: relative; float: right; background-color:<?php echo $dismissBtnBg; ?>; padding:10px;'>
				<?php echo wp_kses_post($ConfigDatas['dismissBtnText']); ?>
			</span>
		</a>
	</div>
</div>

