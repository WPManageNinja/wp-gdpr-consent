<template>
	<div class="wp_gdpr_all_config">
		<div class="preview">
            <div :style="styleObj">
				<p :style="styleMsg">{{ message }}</p>
				<a href="#" :style="stylePolicy">{{ policyLinkText }}</a> <el-button type="primary" round size="mini" class="gotItBtn" :style="styleDismissBtn">{{ dismissBtnText }}</el-button>
			</div>
		</div>
		<div class="options">
            <div class="options_customization">
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

                            <el-input type="text" v-model="bg_color"></el-input>

                            <el-color-picker v-model="bg_color" size="mini" class="gdpr_bg_color_picker"></el-color-picker>
                        </div>
                        <div class=textColorList>
                            <p>Text Color</p>

                            <el-input type="text" v-model="text_color"></el-input>

                            <el-color-picker v-model="text_color" size="mini" class="gdpr_text_color-picker"></el-color-picker>
                        </div>
                        <div class=btnColorList>
                            <p>Button Background</p>

                            <el-input type="text" v-model="btn_bg"></el-input>

                            <el-color-picker v-model="btn_bg" size="mini" class="gdpr_btn_bg_color"></el-color-picker>
                        </div>
                        <div class="fntSize">
                            <p>Font Size</p>
                            <el-select v-model="fnt_size" placeholder="Select">
                                <el-option
                                v-for="item in options"
                                :key="item.value"
                                :label="item.label"
                                :value="item.value">
                                </el-option>
                            </el-select>
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
	</div>
</template>

<script>
	export default {
		data() {
			return {
                styleObj: {
                    bottom: '0px',
                    background: '#A3549E',
                    color: 'white',
                    position: 'relative',
                    width: '100%',
                    top: '403px',
                    margin: '0',
                    padding: '0px',
                    left: '0px',
                    right: '0px',
                    borderRadius: '0px',
                    maxWidth: '',
                    marginTop: '0px',
                    marginLeft: '0px',
                    float: ''
                },
                styleMsg: {
                    padding: '15px',
                    margin: '0',
                    display: 'inline-block',
                    color: '#fff',
                    fontSize: ''
                },
                stylePolicy: {
                    color: 'wheat'
                },
                styleDismissBtn: {
                    float: 'right',
                    marginTop: '9px',
                    marginRight: '8px',
                    background: '#152CB5',
                    borderColor: '#152CB5'
                },
				activeName: '',
				message: 'This website uses cookies to ensure you get the best experience on our website.',
				policyLinkText: 'Learn More',
				dismissBtnText: 'Got it!',
				bottom: true,
				top: false,
				left: false,
				right: false,
				theme: 'banner_bottom',
				bg_color: '#A3549E',
				text_color: '#fff',
				bgBlackColor: false,
				bgBlueColor: false,
				bgRedColor: false,
				bgPurpleColor: false,
				btn_bg: '#152CB5',
                fnt_size: '',
                options: [
                    { value: '10px', label: '10px' },
                    { value: '15px', label: '15px' },
                    { value: '20px', label: '20px' },
                    { value: '25px', label: '25px' }
                ]
			}
		},
		watch: {
			theme() {
				if( this.theme == 'banner_bottom' ) {
                    this.styleObj.color = 'white';
                    this.styleObj.width = '100%';
                    this.styleObj.margin = 0;
                    this.styleObj.padding = 0;
                    this.styleObj.top = '401px';
                    this.styleObj.float = '';
                    this.styleObj.maxWidth = '';
				}
				if( this.theme == 'banner_top' ) {
                    this.styleObj.color = 'white';
                    this.styleObj.width = '100%';
                    this.styleObj.margin = 0;
                    this.styleObj.padding = 0;
                    this.styleObj.top = 0;
                    this.styleObj.maxWidth = '';
                    this.styleObj.marginTop = '';
                    this.styleObj.marginLeft = '';
                    this.styleObj.borderRadius = '';
                    this.styleObj.float = '';
				}
				else if( this.theme == 'banner_left' ) {
                    this.styleObj.bottom = '0px';
                    this.styleObj.margin = '';
                    this.styleObj.top = '0px';
                    this.styleObj.color = 'white';
                    this.styleObj.maxWidth = '24em';
                    this.styleObj.padding = '3em';
                    this.styleObj.marginTop = '291px';
                    this.styleObj.marginLeft = '15px';
                    this.styleObj.borderRadius = '10px';
                    this.styleObj.float = '';
				}
				else if( this.theme == 'banner_right' ) {
                    this.styleObj.color = 'white';
                    this.styleObj.maxWidth = '24em';
                    this.styleObj.padding = '3em';
                    this.styleObj.marginTop = '276px';
                    this.styleObj.float = 'right';
                    this.styleObj.marginRight = '15px';
                    this.styleObj.borderRadius = '10px';
                    this.styleObj.top = '';
                    this.styleObj.margin = '';
                    this.styleObj.marginLeft = '';
                    this.styleObj.right = '9px';
				}
			},
			bg_color() {
                this.styleObj.background = this.bg_color;
            },
            text_color() {
                this.styleMsg.color = this.text_color;
            },
            btn_bg() {
                this.styleDismissBtn.background = this.btn_bg;
                this.styleDismissBtn.borderColor = this.btn_bg;
            },
            fnt_size() {
                this.styleMsg.fontSize = this.fnt_size;
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
		.bgColorList {
			width: 48%;
			float: left;
            .gdpr_bg_color_picker {
                position: relative;
                top: -34px;
                left: 200px;
                display: block;
            }
		}

		.textColorList {
			width: 48%;
			float: right;
            .gdpr_text_color-picker {
                position: relative;
                top: -34px;
                left: 200px;
                display: block;
            }
		}

		.btnColorList {
			width: 48%;
			float: left;
            margin-top: -6px;
            .gdpr_btn_bg_color {
                position: relative;
                top: -34px;
                left: 200px;
                display: block;
            }
		}

		.fntSize {
			width: 48%;
			float: right;
            .el-select {
                margin-top: -6px;
                width: 100%;
            }
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