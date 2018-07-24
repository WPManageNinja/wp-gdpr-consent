<template>
	<div class="wp_gdpr_all_config">
		<div class="preview">
			<div :class="{
						  bannerBottom: bottom, 
						  bannerTop: top, 
						  bannerLeft: left, 
						  bannerRight: right,
						  blackBgColor: bgBlackColor,
						  blueBgColor: bgBlueColor,
						  redBgColor: bgRedColor,
						  purpleBgColor: bgPurpleColor
						}">
				<p>{{ message }}</p>
				<a href="#">{{ policyLinkText }}</a> <el-button type="primary" round size="mini" class="gotItBtn">{{ dismissBtnText }}</el-button>
			</div>
		</div>
		<div class="options">
			<el-collapse v-model="activeName" accordion>
			  <el-collapse-item title="Select Theme" name="1">
			    <ul>
			    	<li>
			    		<el-radio v-model="theme"  label="banner_bottom">Banner Bottom</el-radio>
			    	</li>
			    	<li>
			    		<el-radio v-model="theme" label="banner_top">Banner Top</el-radio>
			    	</li>
			    	<li>
			    		<el-radio v-model="theme" label="3">Banner Top(Pushdown)</el-radio>
			    	</li>
			    	<li>
			    		<el-radio v-model="theme" label="banner_left">Left</el-radio>
			    	</li>
			    	<li>
			    		<el-radio v-model="theme" label="banner_right">Right</el-radio>
			    	</li>
			    </ul>
			  </el-collapse-item>
			  <el-collapse-item title="Color Customization" name="2" class="color-customization">
			  	<div class="bgColorList">
			    	<p>Background Color</p>
				    <ul>
				    	<li>
				    		<el-radio v-model="bg_color" label="black">Black</el-radio>
				    	</li>
				    	<li>
				    		<el-radio v-model="bg_color" label="blue">Blue</el-radio>
				    	</li>
				    	<li>
				    		<el-radio v-model="bg_color" label="red">Red</el-radio>
				    	</li>
				    	<li>
				    		<el-radio v-model="bg_color" label="purple">Purple</el-radio>
				    	</li>
				    </ul>
				</div>
				<div class=textColorList>
					<p>Text Color</p>
				    <ul>
				    	<li>
				    		<el-radio v-model="text_color" label="black">Black</el-radio>
				    	</li>
				    	<li>
				    		<el-radio v-model="text_color" label="blue">Blue</el-radio>
				    	</li>
				    	<li>
				    		<el-radio v-model="text_color" label="red">Red</el-radio>
				    	</li>
				    	<li>
				    		<el-radio v-model="text_color" label="purple">Purple</el-radio>
				    	</li>
				    </ul>
				</div>
				<div class=btnColorList>
					<p>Button Background</p>
				    <ul>
				    	<li>
				    		<el-radio v-model="btn_bg" label="black">Black</el-radio>
				    	</li>
				    	<li>
				    		<el-radio v-model="btn_bg" label="blue">Blue</el-radio>
				    	</li>
				    	<li>
				    		<el-radio v-model="btn_bg" label="red">Red</el-radio>
				    	</li>
				    	<li>
				    		<el-radio v-model="btn_bg" label="purple">Purple</el-radio>
				    	</li>
				    </ul>
				</div>
				<div class="fntSize">
					<p>Font Size</p>
				    <ul>
				    	<li>
				    		<el-radio v-model="fnt_size" label="5px">5px</el-radio>
				    	</li>
				    	<li>
				    		<el-radio v-model="fnt_size" label="10px">10px</el-radio>
				    	</li>
				    	<li>
				    		<el-radio v-model="fnt_size" label="15px">15px</el-radio>
				    	</li>
				    	<li>
				    		<el-radio v-model="fnt_size" label="20px">20px</el-radio>
				    	</li>
				    </ul>
				</div>
			  </el-collapse-item>
			  <el-collapse-item title="Custom Text" name="3">
			  	<div class="cstm_text">
				    <el-row :gutter="12" class="cstm_msg">
				    	<el-col :span="24">
				    		<label>Message</label>
				    		<el-input type="textarea" v-model="message" :rows="3" placeholder="This website uses cookies to ensure you get the best experience on our website."></el-input>
				    	</el-col>
				    </el-row>
				    <el-row :gutter="12">
				    	<el-col :span="12">
				    		<label>Dismiss button text</label>
				    		<el-input v-model="dismissBtnText" placeholder="Got it!"></el-input>
				    	</el-col>
				    	<el-col :span="12">
				    		<label>Policy link text</label>
				    		<el-input v-model="policyLinkText" placeholder="Learn More"></el-input>
				    	</el-col>
				    </el-row>
				</div>
			  </el-collapse-item>
			  <el-collapse-item title="Settings" name="4">
			    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			  </el-collapse-item>
			</el-collapse>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				activeName: '',
				message: 'This website uses cookies to ensure you get the best experience on our website.',
				policyLinkText: 'Learn More',
				dismissBtnText: 'Got it!',
				bottom: true,
				top: false,
				left: false,
				right: false,
				theme: 'banner_bottom',
				bg_color: 'black',
				text_color: 'black',
				bgBlackColor: false,
				bgBlueColor: false,
				bgRedColor: false,
				bgPurpleColor: false,
				btn_bg: 'black',
				fnt_size: '5px'
			}
		},
		watch: {
			theme() {
				console.log(this.theme);
				if( this.theme == 'banner_bottom' ) {
					this.bottom = true;
					this.top = false;
					this.left = false;
					this.right = false;
				}
				else if( this.theme == 'banner_top' ) {
					this.top = true;
					this.bottom = false;
					this.left = false;
					this.right = false;
				}
				else if( this.theme == 'banner_left' ) {
					this.left = true;
					this.right = false;
					this.top = false;
					this.bottom = false;
				}
				else if( this.theme == 'banner_right' ) {
					this.right = true;
					this.top = false;
					this.bottom = false;
					this.left = false;
				}
			},
			bg_color() {
				if( this.bg_color == 'black' ) {
					this.bgBlackColor = true;
					this.bgBlueColor = false;
					this.bgRedColor = false;
					this.bgPurpleColor = false;
				}
				else if( this.bg_color == 'blue' ) {
					this.bgBlueColor = true;
					this.bgBlackColor = false;
					this.bgRedColor = false;
					this.bgPurpleColor = false;
				}
				else if( this.bg_color == 'red' ) {
					this.bgRedColor = true;
					this.bgBlackColor = false;
					this.bgBlueColor = false;
					this.bgPurpleColor = false;
				}
				else if( this.bg_color == 'purple' ) {
					this.bgPurpleColor = true;
					this.bgRedColor = false;
					this.bgBlackColor = false;
					this.bgBlueColor = false;
				}
			}
		}
	}
</script>

<style lang="scss">
	.wp_gdpr_all_config {
		.preview {
			width: 70%;
			margin-top: 10px;
			min-height: 450px;
			float: left;
			background: #fff;
		}

		.options {
			width: 29%;
			margin-top: 10px;
			float: right;
			ul{
				
				li{
					padding: 0 0px 0px 13px;
				}
			}
		}


		.color-customization {
			.el-collapse-item__content{
				// padding-left: 13px;
			  p {
		   	    	margin-left: 13px;
		   		}
			}
		 }





		.el-collapse-item__header {
			background: #83C6CF;
			color: #fff;
		}

		.el-collapse-item__header {
			padding-left: 10px;
		    padding-right: 10px;
		    font-size: 16px;
		}

		.is-active {
			background: #078BA2;
		}


		.bannerBottom {
		    bottom: 0px;
		    background: black;
		    color: white;
		    position: relative;
		    width: 100%;
		    top: 403px;
		    margin: 0;
		    padding: 0px;
			p {
			     margin: 0;
			    display: inline-block;
			    padding: 14px;
		    }

			.gotItBtn{
				float: right;
			    margin-top: 9px;
			    margin-right: 8px;	
			}
			a {
				color: wheat;
			}
		}

		.bannerTop {
			background: black;
		    color: white;
		    width: 100%;
		    margin: 0;
		  	padding: 0;
			p {
		    	padding: 15px;
				margin: 0;
				display: inline-block;
			}
			a {
			 	color:wheat;
			}
			.gotItBtn {
				float: right;
				margin-top: 10px;
				margin-right: 8px;
			}
		}

		.bannerLeft {
			background: black;
		    color: white;
		    max-width: 24em;
		    padding: 3em;
		    margin-top: 291px;
		    margin-left: 15px;
		    border-radius: 10px;
		    p {
		    	padding: 0;
			    margin: 0;
			    font-size: 16px;
		    }
		    a {
		    	color: wheat;
		    }

			.gotItBtn {
		    	float: right;
			    margin-top: 6px;
		    }

		}

		.bannerRight {
			background: black;
		    color: white;
		    max-width: 24em;
		    padding: 3em;
		    margin-top: 276px;
		    float: right;
		    margin-right: 15px;
		    border-radius: 10px;
			p {
		    	padding: 0;
			    margin: 0;
			    font-size: 16px;
		    }
		    a {
		    	color: wheat;
		    }

			.gotItBtn {
		    	float: right;
			    margin-top: 6px;
		    }
		}

		.bgColorList {
			width: 50%;
			float: left;
		}

		.textColorList {
			width: 50%;
			float: right;
		}

		.btnColorList {
			width: 50%;
			float: left;
		}

		.fntSize {
			width: 50%;
			float: right;
		}

		.cstm_text {
			padding: 20px;
			.cstm_msg {
				padding-bottom: 10px;
			}
		}


		.blackBgColor {
			background: black;
		}

		.blueBgColor {
			background: blue;
		}

		.redBgColor {
			background: red;
		}

		.purpleBgColor {
			background: purple;
		}
	}
</style>