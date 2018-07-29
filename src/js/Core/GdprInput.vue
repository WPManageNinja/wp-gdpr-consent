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
        pcHolder:'',
        setectedType: {
            default: 'text'
        }
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
