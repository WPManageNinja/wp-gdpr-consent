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


		<app-all-config />
	</div>
</template>

<script>
	import AllConfig from './components/AllConfig.vue'
	export default{
		name: 'App',
		components: {
			'app-all-config': AllConfig
        },
        methods: {
            updateGDPR() {
                
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