<template>
    <div class="ninja-radio-group">
        <div class="ninja-radio-group-inner">
            <el-radio-group v-model="model" size="small">
                <el-radio 
                v-for="item in options" 
                :label="item.value"
                :key="item.value"
                >{{item.label}}</el-radio>
            </el-radio-group>
        </div>
    </div>
</template>

<script>
export default {
    name : 'NinjaRadioGroup',
    props:['value','options'],
    computed: {
        model: {
            get(){
                return this.value;
            },
            set(newValue){
                this.$emit('input',newValue)
            }
        }
    }
}
</script>


<style lang="scss">
    .ninja-radio-group-inner {
        .el-radio-group {
            display: flex;
            flex-direction: column;

            .el-radio {
                margin-left: 0px;
                margin-bottom: 15px;

                &:last-child {
                    margin: 0px;
                }
            }
        }
    }
    
</style>

