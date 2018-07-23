<template>
	<div class="wp_gdpr_all_config">
		<div class="preview">
			<div :class="{bannerBottom: bottom, bannerTop: top}">
				<p>This website uses cookies to ensure you get the best experience on our website.</p>
				<a href="#">Learn More</a> <el-button type="primary" round size="mini" class="gotItBtn">Got it</el-button>
			</div>
		</div>
		<div class="options">
			<el-collapse v-model="activeName" accordion>
			  <el-collapse-item title="Select Theme" name="1">
			    <ul>
			    	<li>
			    		<el-radio v-model="radio"  label="banner_bottom">Banner Bottom</el-radio>
			    	</li>
			    	<li>
			    		<el-radio v-model="radio" label="banner_top">Banner Top</el-radio>
			    	</li>
			    	<li>
			    		<el-radio v-model="radio" label="3">Banner Top(Pushdown)</el-radio>
			    	</li>
			    	<li>
			    		<el-radio v-model="radio" label="4">Left</el-radio>
			    	</li>
			    	<li>
			    		<el-radio v-model="radio" label="5">Right</el-radio>
			    	</li>
			    </ul>
			  </el-collapse-item>
			  <el-collapse-item title="Color Customization" name="2">
			    <div>Operation feedback: enable the users to clearly perceive their operations by style updates and interactive effects;</div>
			    <div>Visual feedback: reflect current state by updating or rearranging elements of the page.</div>
			  </el-collapse-item>
			  <el-collapse-item title="Settings" name="3">
			    <div>Simplify the process: keep operating process simple and intuitive;</div>
			    <div>Definite and clear: enunciate your intentions clearly so that the users can quickly understand and make decisions;</div>
			    <div>Easy to identify: the interface should be straightforward, which helps the users to identify and frees them from memorizing and recalling.</div>
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
				bottom: true,
				top: false,
				radio: 'banner_bottom'
			}
		},
		watch: {
			radio() {
				console.log(this.radio);
				if( this.radio == 'banner_bottom') {
					this.bottom = true;
					this.top = false;
				}
				else if( this.radio == 'banner_top' ) {
					this.top = true;
					this.bottom = false;
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
		    background: purple;
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
			background: purple;
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
		}

		.gotItBtn {
			float: right;
			margin-top: 10px;
			margin-right: 8px;
		}
	}
</style>