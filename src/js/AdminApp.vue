<template>
	<div class="wp_gdpr_root_component">
		<el-row class="header">
			<el-col :span="24">
				<el-col :span="20">
					<h1>WP GDPR CONSENT</h1>
				</el-col>
				<el-col :span="4">
					<el-button class="common_btn" type="success" @click="updateGDPR">Update</el-button>
					<a style="color: #fff; text-decoration: none;">
						<el-button class="common_btn" type="primary">Preview</el-button>
					</a>
				</el-col>
			</el-col>
		</el-row>


		<app-all-config :styleObj="styleObj" :styleMsg="styleMsg" 
                        :stylePolicy="stylePolicy" 
                        :styleDismissBtn="styleDismissBtn" 
                        :message="message"
                        :policyLinkText="policyLinkText" 
                        :dismissBtnText="dismissBtnText"
                        @showMsg="show_msg($event)"
                        @postPolicy="post_policy($event)"
                        @postDismissBtn="postDismissBtn($event)" />
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
                styleObj: {},
                styleMsg: {},
                stylePolicy: {},
                styleDismissBtn: {},
                message: '',
				policyLinkText: '',
				dismissBtnText: ''
            }
        },
        created() {
            jQuery.get(ajaxurl, {
                action: 'ninja_gdpr_ajax_actions',
                route: 'get_gdprconfig'
            }).then(
                response => {
                    console.log(response.data.getGdprConfig.styleObj)
                    this.styleObj = response.data.getGdprConfig.styleObj;
                    this.styleMsg = response.data.getGdprConfig.styleMsg;
                    this.styleDismissBtn = response.data.getGdprConfig.styleDismissBtn;
                    this.message = response.data.getGdprConfig.message;
                    this.dismissBtnText = response.data.getGdprConfig.dismissBtnText;
                    this.policyLinkText = response.data.getGdprConfig.policyLinkText; 
                }
            )
        },
        methods: {
            updateGDPR() {
                let allGdprObj = {
                    styleObj: this.styleObj,
                    styleMsg: this.styleMsg,
                    stylePolicy: this.stylePolicy,
                    styleDismissBtn: this.styleDismissBtn,
                    message: this.message,
                    policyLinkText: this.policyLinkText,
                    dismissBtnText: this.dismissBtnText
                }
                // console.log(allGdprObj);
                jQuery.post(ajaxurl, {
                    action:'ninja_gdpr_ajax_actions',
                    route: 'update_config',
                    gdprConfig: JSON.stringify(allGdprObj),
                }).then(
                    response => {
                        console.log(response)
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
		    padding-top: 22px;
		    margin-right: -20px;
		    margin-left: -20px;
		    padding-left: 24px;
		}

		.common_btn {
			margin: 0 !important;
		}
	}
	
</style>