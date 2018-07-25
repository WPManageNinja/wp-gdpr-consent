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
                message: 'This website uses cookies to ensure you get the best experience on our website.',
				policyLinkText: 'Learn More',
				dismissBtnText: 'Got it!'
            }
        },
        methods: {
            updateGDPR() {
                let allGdprObj = {
                    styleObj: this.styleObj,
                    styleMsg: this.styleMsg,
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