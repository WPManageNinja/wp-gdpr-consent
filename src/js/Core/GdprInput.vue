<template>
    
    <el-row>

        <el-col :span="24">

            <div class="custom_link">
                <label>{{title}}</label>
                <el-input 
                    :type="setectedType"
                    :placeholder="pcHolder" 
                    v-model="model"></el-input>
            </div>
            
        </el-col>

    </el-row>

</template>

<script>

export default {
    name: 'GdprInput',
    props: {
        value:{
            default: '',
        },
        title: {
            default: 'Please Input Title',
        },
        setectedType: {
            default:'text'
        },
        pcHolder:''
    },

    computed: {
        model: {
            get() {
                return this.value
            },
            set(newValue) {
                this.$emit('input', newValue)
            }
        }
    }

}

</script>
