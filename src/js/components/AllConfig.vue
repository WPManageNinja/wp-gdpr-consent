<template>
	<div class="wp_gdpr_all_config">
		<div class="preview">
            <div :style="styleObj">
				<p :style="styleMsg" style="font-size: 16px;">{{ message }}
                    <a :href="link" target="_blank" v-if="link && show_message"><span>{{ policyLinkText }}</span></a>
                    <a v-else-if="!link && !show_message">{{ policyLinkText }}</a>
                </p>
                <div :style="confirmationBtn">
                    <a style="display: inline; color: #fff; cursor: pointer;" v-if="settingsObj.showDeclineBtn==true">Decline</a> 
                    <el-button type="primary" size="mini" :style="styleDismissBtn" v-if="dismissBtnText">{{ dismissBtnText }}</el-button>
                </div>
			</div>
		</div>
		<div class="options">
            <div class="options_customization">
                <el-collapse v-model="activeName" accordion>
                    <el-collapse-item title="Select Theme" name="1">
                        
                            <gdpr-radio-group 
                                v-model="styleObj.selectedBanner"
                                :options="radio_options">
                            </gdpr-radio-group>

                    </el-collapse-item>


                    <el-collapse-item title="Color Customization" name="2">

                        <div class="color-customization"> 

                             <gdpr-color-customization
                                title="Background Color" 
                                v-model="bg_color"></gdpr-color-customization>

                            <gdpr-color-customization
                                title="Text Color" 
                                v-model="text_color"></gdpr-color-customization>

                            <gdpr-color-customization
                                title="Button Background" 
                                v-model="btn_bg"></gdpr-color-customization>

                            <gdpr-color-customization
                                title="Button Color" 
                                v-model="btn_clr"></gdpr-color-customization>

                        </div>
                    </el-collapse-item>    


                    <el-collapse-item title="Custom Text" name="3">
                        <div class="cstm_text">
                            <el-row :gutter="12" class="cstm_msg">

                                <el-col :span="24">
                                    <label>Message</label>
                                    <el-input
                                        type="textarea"
                                        :rows="2"
                                        placeholder="This website uses cookies to ensure you get the best experience on our website."
                                        v-model="show_message"></el-input>

                                </el-col>

                            </el-row>
                        
                        </div>

                            <el-row :gutter="12">
                                <el-col :span="12">

                                    <gdpr-input
                                        title="Dismiss button text"
                                        pcHolder="Got it!"
                                        v-model="getDismissBtn"></gdpr-input>

                    
                                </el-col>


                                <el-col :span="12">

                                    <gdpr-input
                                        title="Policy link text"
                                        pcHolder="Learn More"
                                        v-model="getPolicy"></gdpr-input>

                                </el-col>
                            </el-row>
                    </el-collapse-item>
                    <el-collapse-item title="Policy Link" name="4" class="policy_link">

                        <gdpr-input
                            title="Custom Link"
                            pcHolder="Custom Link(ex: https://www.google.com)"
                            selectedType="url"
                            v-model="link"></gdpr-input>

                    </el-collapse-item>
                    <el-collapse-item title="Settings" name="6">
                        <div class="settings">

                            <gdpr-settings 
                                v-model="settingsObj">
                            </gdpr-settings>

                        </div>

                    </el-collapse-item>
                </el-collapse>
            </div>
		</div>
	</div>
</template>

<script>
    import GdprRadioGroup from '../Core/GdprRadioGroup';
    import GdprSettings from '../Core/GdprSettings';
    import GdprInput from '../Core/GdprInput';
    import GdprColorCustomization from '../Core/GdprColorCustomization'

	export default {
        name: 'AllConfig',
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
        components : {
            GdprInput,
            GdprSettings,
            GdprRadioGroup,
            GdprColorCustomization
        },
		data() {
			return {
                radio_options: [
                    {
                        label:'Banner Bottom',
                        value:'banner_bottom'
                    },
                    {
                        label:'Banner Top',
                        value:'banner_top'
                    },
                    
                    {
                        label:'Left',
                        value:'banner_left'
                    },
                    {
                        label:'Right',
                        value:'banner_right'
                    },
                    {
                        label:'Hide',
                        value:'hide'
                    },
                ],
				activeName: '',
				bottom: true,
				top: false,
				left: false,
                right: false,
                duration: 0,
                delay: 0,
				theme: 'banner_bottom',
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
			'styleObj.selectedBanner'() {
				if( this.styleObj.selectedBanner == 'banner_bottom' ) {
                    // styling the root div of GDPR Concent
                    this.styleObj.position = 'absolute';
                    this.styleObj.color = 'white';
                    this.styleObj.width = '100%';
                    this.styleObj.padding = '0px';
                    this.styleObj.display = 'inline-block';
                    this.styleObj.borderRadius = '0px';
                    this.styleObj.top = '';
                    this.styleObj.bottom = 0;
                    this.styleObj.right = '0px';
                    this.styleObj.left = '0px';
                    this.styleObj.selectedBanner = 'banner_bottom';


                    // styling the confirmation button of GDPR Concent
                    this.confirmationBtn.display = 'inline';
                    this.confirmationBtn.float = 'right';
                    this.confirmationBtn.marginTop = '10px';
                    this.confirmationBtn.marginRight = '12px';
                    this.confirmationBtn.marginTop = '13px';

                    // styling the dismiss button of GDPR Concent
                    this.styleDismissBtn.display = 'inline';
                    this.styleDismissBtn.float = '';
                    this.styleDismissBtn.marginTop = '0px';
                    this.styleDismissBtn.marginRight = '0px';
                    

                    // styling the message of GDPR Concent
                    this.styleMsg.padding = '15px';
				}
				if( this.styleObj.selectedBanner == 'banner_top' ) {
                    this.styleObj.position = 'absolute';
                    this.styleObj.color = 'white';
                    this.styleObj.width = '100%';
                    this.styleObj.margin = '0px';
                    this.styleObj.padding = '0px';
                    this.styleObj.top = '0px';
                    this.styleObj.bottom = '';
                    this.styleObj.borderRadius = '0px';
                    this.styleObj.display = 'inline-block';
                    this.styleObj.right = '0px';
                    this.styleObj.left = '0px';


                    this.confirmationBtn.marginTop = '13px';

                    this.styleMsg.padding = '15px';

                    this.styleObj.selectedBanner = 'banner_top';
				}
				else if( this.styleObj.selectedBanner == 'banner_left' ) {

                    this.styleObj.position = 'absolute';
                    this.styleObj.bottom = '15px';
                    this.styleObj.top = '';
                    this.styleObj.left = '15px';
                    this.styleObj.color = 'white';
                    this.styleObj.width = '24em';
                    this.styleObj.padding = '3em';
                    this.styleObj.borderRadius = '10px';
                    this.styleObj.display = 'inline-block';
                    
                    this.confirmationBtn.marginTop = '10px';

                    this.styleMsg.padding = '';

                    this.styleObj.selectedBanner = 'banner_left';
				}
				else if( this.styleObj.selectedBanner == 'banner_right' ) {
                    this.styleObj.position = 'absolute';
                    this.styleObj.bottom = '15px';
                    this.styleObj.color = 'white';
                    this.styleObj.width = '24em';
                    this.styleObj.padding = '3em';
                    this.styleObj.borderRadius = '10px';
                    this.styleObj.top = '';
                    this.styleObj.right = '15px';
                    this.styleObj.left = '';
                    this.styleObj.display = 'inline-block';

                    this.styleMsg.padding = '';

                    this.styleObj.selectedBanner = 'banner_right';
                    this.confirmationBtn.marginTop = '10px';
                }
                else if( this.styleObj.selectedBanner == 'hide' ) {
                    this.styleObj.display = 'none';
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
            position: relative;
            
            .el-button {
                letter-spacing: 2px;
            }
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

         .el-collapse-item {
             .el-collapse-item__wrap {
                padding-left: 10px;
                padding-top: 13px;
                padding-bottom: 15px;
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

        .policy_link {
            .el-collapse-item__wrap {
                .el-row {
                    overflow: hidden;
                    width: 98%;
                }
            }
        }

		.is-active {
			background: #078BA2;
		}


        .color-customization{
            .bgColorList {
                width: 49%;
                float: left;
                max-height: 100px;
                position: relative;
                .el-input {
                    width: 98%;
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
            .el-row {
                overflow: hidden;
                width: 100%;
            }
            .cstm_msg {
                padding-bottom: 10px;
            }
        }

        .el-collapse-item__content {
            .el-row {
                overflow: hidden;
                width: 100%;
            }
        }
        
		.settings{

            .el-input {
                padding-bottom: 5px;
            }
        }
	}

    @media (max-width: 600px) {
        .wp_gdpr_all_config {
            .preview {
                width: 100%;
                > div {
                    padding: 2em !important;
                }
            }
            .options {
                width: 100%;
            }
        }
    }

</style>