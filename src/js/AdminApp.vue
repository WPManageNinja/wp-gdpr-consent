<template>
	<div class="wp_gdpr_root_component">
		<el-row class="header">
			<el-col :span="24">
				<el-col :span="20">
					<h1>
						WP GDPR CONSENT
						<a style="font-size: 15px;border: 1px solid #008ba3;padding: 4px 10px;text-decoration: none;color: #008ba3;" :href="preview_url" target="_blank">Preview</a></h1>
				</el-col>
				<el-col :span="4">
					<el-button class="common_btn" type="success" @click="updateGDPR" size="small">Update</el-button>
				</el-col>
			</el-col>
		</el-row>
		
		<app-all-config 
            :styleObj="styleObj" 
            :styleMsg="styleMsg" 
            :stylePolicy="stylePolicy" 
            :styleDismissBtn="styleDismissBtn" 
            :message="message"
            :policyLinkText="policyLinkText" 
            :dismissBtnText="dismissBtnText"
            :customLink="customLink"
            :settingsObj="settings"
            :confirmationBtn="confirmationBtn"
            @showMsg="show_msg($event)"
            @postPolicy="post_policy($event)"
            @postDismissBtn="postDismissBtn($event)"
            @setCustomLink="postCustomLink($event)"></app-all-config>
	</div>
</template>

<script>
	import AllConfig from './components/AllConfig.vue'
	export default{
		name: 'App',
		components: {
			'app-all-config': AllConfig
        },
        data() {
            return {
                preview_url: window.ninja_wp_gdpr.preview_url,
                message: '',
                settings: {},
                styleObj: {},
                styleMsg: {},
                customLink: '',
                stylePolicy: {},
                styleDismissBtn: {},
                confirmationBtn: {},
				policyLinkText: '',
                dismissBtnText: ''
            }
        },
        created() {
            this.fetchdata();
        },
        methods: {

            fetchdata(){

                const data = {
                    action: 'ninja_gdpr_ajax_actions',
                    route: 'get_gdprconfig'
                }

                jQuery.get(ajaxurl,data)
                    .then(
                        response => {
                            this.styleObj = response.data.getGdprConfig.styleObj;
                            this.styleMsg = response.data.getGdprConfig.styleMsg;
                            this.styleDismissBtn = response.data.getGdprConfig.styleDismissBtn;
                            this.message = response.data.getGdprConfig.message;
                            this.dismissBtnText = response.data.getGdprConfig.dismissBtnText;
                            this.policyLinkText = response.data.getGdprConfig.policyLinkText;
                            this.customLink = response.data.getGdprConfig.customLink; 
                            this.settings = response.data.getGdprConfig.settings;
                            this.confirmationBtn = response.data.getGdprConfig.confirmationBtn;
                        }
                    )
                    .fail(error=>{
                        console.log(error.data.response);
                    })
                    .always(() => {})
            },
            updateGDPR() {
                let regexp = /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/gi; 
                this.customLink = this.customLink.match(regexp) ? this.customLink : ""; // Using the regular expression to check if it is a valid url or not
                let allGdprObj = {
                    styleObj: this.styleObj,
                    styleMsg: this.styleMsg,
                    stylePolicy: this.stylePolicy,
                    styleDismissBtn: this.styleDismissBtn,
                    confirmationBtn: this.confirmationBtn,
                    message: this.message,
                    policyLinkText: this.policyLinkText,
                    dismissBtnText: this.dismissBtnText,
                    customLink: this.customLink,
                    settings: this.settings
                }
                jQuery.post(ajaxurl, {
                    action:'ninja_gdpr_ajax_actions',
                    route: 'update_config',
                    gdprConfig: JSON.stringify(allGdprObj),
                }).then(
                    response => {
                        this.$notify.success({
                            title: 'Success',
                            message: response.data.message
                        });
                    }
                ).fail(
                    error => {
                        this.$notify.error({
                            title: 'Error',
                            message: error.responseJSON.data.message
                        });
                    }
                );
            },
            show_msg(val) {
                this.message = val;
            },
            post_policy(val) {
                this.policyLinkText = val;
            },

            postDismissBtn(val) {
                this.dismissBtnText = val;
            },

            postCustomLink(val) {
                this.customLink = val;
            }
        }
	}
</script>

<style lang="scss">
	.wp_gdpr_root_component {
		.header {
			font-size: 20px;
		    padding-bottom: 10px;
		    background: #fff;
		    margin-top: -20px;
		    padding-top: 20px;
		    margin-right: -20px;
		    margin-left: -20px;
		    padding-left: 24px;

            .el-col {
                .el-button--small {
                    float: right;
                    position: relative;
                    right: 19px;
                    top: 6px;
                }
            }
		}

		.common_btn {
			margin: 0 !important;
		}
	}
	
</style>