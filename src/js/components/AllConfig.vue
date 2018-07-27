<template>
	<div class="wp_gdpr_all_config">
		<div class="preview">
            <div :style="styleObj">
				<p :style="styleMsg">{{ message }}</p>
				<a :href="customLink" target="_blank" :style="styleMsg">{{ policyLinkText }}</a> 
                <div :style="confirmationBtn">
                    <a style="display: inline; color: #fff" v-if="settingsObj.showDeclineBtn==true">Decline</a> 
                    <el-button type="primary" round size="mini" :style="styleDismissBtn">{{ dismissBtnText }}</el-button>
                </div>
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
                                <el-radio v-model="theme" label="banner_left">Left</el-radio>
                            </li>
                            <li>
                                <el-radio v-model="theme" label="banner_right">Right</el-radio>
                            </li>
                            <li>
                                <el-radio v-model="theme" label="hide">Hide</el-radio>
                            </li>
                        </ul>
                    </el-collapse-item>
                    <el-collapse-item title="Color Customization" name="2">
                        <div class="color-customization"> 
                             <div class="bgColorList">
                                <p>Background Color</p>

                                <el-input type="text" v-model="bg_color"></el-input>

                                <el-color-picker @active-change="(color) => {bg_color = color}" v-model="bg_color" size="mini" class="gdpr_bg_color_picker"></el-color-picker>
                            </div>
                            <div class=textColorList>
                                <p>Text Color</p>

                                <el-input type="text" v-model="text_color"></el-input>

                                <el-color-picker @active-change="(color) => {text_color = color}" v-model="text_color" size="mini" class="gdpr_text_color-picker"></el-color-picker>
                            </div>
                            <div class=btnbackground>
                                <p>Button Background</p>

                                <el-input type="text" v-model="btn_bg"></el-input>

                                <el-color-picker @active-change="(color) => {btn_bg = color}" v-model="btn_bg" size="mini" class="gdpr_btn_bg_color"></el-color-picker>
                            </div>
                            <div class=btnColorList>
                                <p>Button Color</p>

                                <el-input type="text" v-model="btn_clr"></el-input>

                                <el-color-picker @active-change="(color) => {btn_clr = color}" v-model="btn_clr" size="mini" class="gdpr_btn_bg_color"></el-color-picker>
                            </div>
                        </div>
                    </el-collapse-item>    
                    <el-collapse-item title="Custom Text" name="3">
                        <div class="cstm_text">
                            <el-row :gutter="12" class="cstm_msg">
                                <el-col :span="24">
                                    <label>Message</label>
                                    <el-input type="textarea" v-model="show_message" :rows="3" placeholder="This website uses cookies to ensure you get the best experience on our website."></el-input>
                                </el-col>
                            </el-row>
                            <el-row :gutter="12">
                                <el-col :span="12">
                                    <label>Dismiss button text</label>
                                    <el-input v-model="getDismissBtn" placeholder="Got it!"></el-input>
                                </el-col>
                                <el-col :span="12">
                                    <label>Policy link text</label>
                                    <el-input v-model="getPolicy" placeholder="Learn More"></el-input>
                                </el-col>
                            </el-row>
                        </div>
                    </el-collapse-item>
                    <el-collapse-item title="Policy Link" name="4">
                        <el-row>
                            <el-col :span="24">
                                <div class="custom_link">
                                    <label>Custom Link</label>
                                    <el-input type="text" placeholder="Custom Link(ex - https://www.google.com/)" v-model="link"></el-input>
                               </div>
                            </el-col>
                        </el-row>
                    </el-collapse-item>
                    <el-collapse-item title="Settings" name="6">
                        <div class="settings">
                            <el-row :gutter="15">
                                <el-col :span="24">
                                    <label class="settings_label">Duration of Cookie(in days)</label>
                                    <el-input v-model="settingsObj.duration" type="number"></el-input>
                                </el-col>
                                <el-col :span="24">
                                    <label class="settings_label">Delay of Cookie(in sec)</label>
                                    <el-input v-model="settingsObj.delay" type="number"></el-input>
                                </el-col>
                                <el-col :span="24">
                                    <label class="settings_label">Show Decline Button</label>
                                    <el-switch v-model="settingsObj.showDeclineBtn">
                                    </el-switch>
                                </el-col>
                            </el-row>
                        </div>

                    </el-collapse-item>
                    </el-collapse>
            </div>
		</div>
	</div>
</template>

<script>
	export default {
        props: [
            'styleObj',
            'styleMsg',
            'stylePolicy',
            'styleDismissBtn',
            'message',
            'policyLinkText',
            'dismissBtnText',
            'customLink',
            'settingsObj',
            'confirmationBtn'
        ],
		data() {
			return {
				activeName: '',
				bottom: true,
				top: false,
				left: false,
                right: false,
                duration: 0,
                delay: 0,
				theme: '',
				bgBlackColor: false,
				bgBlueColor: false,
				bgRedColor: false,
				bgPurpleColor: false,
                comp_type: '',
                options: [
                    { value: '10px', label: '10px' },
                    { value: '15px', label: '15px' },
                    { value: '20px', label: '20px' },
                    { value: '25px', label: '25px' }
                ],
                bool: false
			}
        },

        created() {},

        computed: {
            show_message: {
                get() {
                    return this.message;
                },
                set(newValue) {
                    this.updateMessage(newValue)
                }
            },
            getPolicy: {
                get() {
                    return this.policyLinkText;
                },
                set(newValue) {
                    this.updatePolicy(newValue)
                }
            },
            getDismissBtn: {
                get() {
                    return this.dismissBtnText
                },
                set(newValue) {
                    this.updateDismissBtn(newValue)
                }
            },
            bg_color: {
                get() {
                    return this.styleObj.background;
                },
                set(newValue) {
                    this.updateStyleObjBackground(newValue);
                }
            },
            text_color: {
                get() {
                    return this.styleMsg.color;
                },
                set(newValue) {
                    this.updateStyleMsgColor(newValue);
                }
            },
            btn_bg: {
                get() {
                    return this.styleDismissBtn.background;
                },
                set(newValue) {
                    this.updateDismissBtnBg(newValue);
                }
            },
            btn_clr: {
                get() {
                    return this.styleDismissBtn.color;
                },
                set(newValue) {
                    this.updateDismissBtnClr(newValue);
                }
            },
            link: {
                get() {
                    this.bool = true;
                    return this.customLink;
                },
                set(newValue) {
                    this.setCustomLink(newValue)
                }
            }
        },

		watch: {
            
			theme() {
				if( this.theme == 'banner_bottom' ) {
                    this.styleObj.color = 'white';
                    this.styleObj.width = '100%';
                    this.styleObj.margin = '0px';
                    this.styleObj.padding = '0px';
                    this.styleObj.marginTop = '401px';
                    this.styleObj.float = '';
                    this.styleObj.maxWidth = '';
                    this.styleObj.display = 'block';
                    this.styleObj.borderRadius = '';
                    this.styleObj.selectedBanner = 'banner_bottom';
                    this.confirmationBtn.display = 'inline';
                    this.confirmationBtn.float = 'right';
                    this.confirmationBtn.marginTop = '10px';
                    this.confirmationBtn.marginRight = '12px';
                    this.styleDismissBtn.display = 'inline';
                    this.styleDismissBtn.float = '';
                    this.styleDismissBtn.marginTop = '0px';
                    this.styleDismissBtn.marginRight = '0px';
				}
				if( this.theme == 'banner_top' ) {
                    this.styleObj.color = 'white';
                    this.styleObj.width = '100%';
                    this.styleObj.margin = '0px';
                    this.styleObj.padding = '0px';
                    this.styleObj.top = '0px';
                    this.styleObj.maxWidth = '';
                    this.styleObj.marginTop = '0px';
                    this.styleObj.marginLeft = '0px';
                    this.styleObj.marginRight = '0px'
                    this.styleObj.borderRadius = '0px';
                    this.styleObj.float = '';
                    this.styleObj.display = 'block';

                    this.styleObj.selectedBanner = 'banner_top';
				}
				else if( this.theme == 'banner_left' ) {
                    this.styleObj.bottom = '0px';
                    this.styleObj.top = '';
                    this.styleObj.color = 'white';
                    this.styleObj.maxWidth = '24em';
                    this.styleObj.padding = '3em';
                    this.styleObj.float = 'left';
                    this.styleObj.marginTop = '276px';
                    this.styleObj.marginLeft = '15px'; 
                    this.styleObj.borderRadius = '10px';
                    this.styleObj.float = '';
                    this.styleObj.display = 'block';

                    this.styleObj.selectedBanner = 'banner_left';
				}
				else if( this.theme == 'banner_right' ) {
                    this.styleObj.bottom = '0px';
                    this.styleObj.color = 'white';
                    this.styleObj.maxWidth = '24em';
                    this.styleObj.padding = '3em';
                    this.styleObj.float = 'right';
                    this.styleObj.marginRight = '15px';
                    this.styleObj.borderRadius = '10px';
                    this.styleObj.top = '';
                    this.styleObj.marginTop = '276px';
                    this.styleObj.marginLeft = '0px';
                    this.styleObj.right = '9px';
                    this.styleObj.display = 'block';

                    this.styleObj.selectedBanner = 'banner_right';
                }
                else if( this.theme == 'hide' ) {
                    this.styleObj.display = 'none';
                    this.styleObj.bottom = '0px';
                    this.styleObj.color = 'white';
                    this.styleObj.maxWidth = '0px';
                    this.styleObj.padding = '0px';
                    this.styleObj.float = 'right';
                    this.styleObj.marginRight = '0px';
                    this.styleObj.borderRadius = '0px';
                    this.styleObj.top = '0px';
                    this.styleObj.marginTop = '0px';
                    this.styleObj.marginLeft = '0px';
                    this.styleObj.right = '0px';

                    this.styleObj.selectedBanner = 'hide';
                }
			}
        },

        methods: {
            updateMessage(val) {
                this.$emit('showMsg', val)
            },
            updatePolicy(val) {
                this.$emit('postPolicy', val);
            },
            updateDismissBtn(val) {
                this.$emit('postDismissBtn', val);
            },
            updateStyleObjBackground(val) {
                this.styleObj.background = val;
            },
            updateStyleMsgColor(val) {
                this.styleMsg.color = val;
            },
            updateDismissBtnBg(val) {
                this.styleDismissBtn.background = val;
                this.styleDismissBtn.borderColor = val;
            },

            setCustomLink(val) {
                this.$emit('setCustomLink', val);
            },

            updateDismissBtnClr(val) {
                this.styleDismissBtn.color = val;
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


        .color-customization{
          padding:15px;
            .bgColorList {
                width: 48%;
                float: left;
                .gdpr_bg_color_picker {
                    position: relative;
                    top: -34px;
                    left: 189px;
                    display: block;
                }
            }
             
            .textColorList {
                width: 48%;
                float: right;
                .gdpr_text_color-picker {
                    position: relative;
                    top: -34px;
                    left: 189px;
                    display: block;
                }
            }


            .btnbackground {
                width: 48%;
                float: left;
                margin-top: -23px;
                .gdpr_btn_bg_color {
                    position: relative;
                    top: -34px;
                    left: 189px;
                    display: block;
                }
            } 

            .btnColorList {
                width: 48%;
                float: right;
                margin-top: -23px;
                .gdpr_btn_bg_color {
                    position: relative;
                    top: -34px;
                    left: 189px;
                    display: block;
                }
            }
        }

		
        .cstm_text {
            padding: 20px 20px 0 20px;
             .cstm_msg {
                 padding-bottom: 10px;
             }
        }
        
        .custom_link{
            padding: 15px 15px 0 15px;
            label{
                margin-left: 2px;
            }
            .el-input{
                padding-top:5px;
            }
        }

		.settings{
            padding:20px 20px 0px 20px;

            .el-input {
                padding-top: 5px;
                 padding-bottom: 5px;
            }
        }
	}
</style>