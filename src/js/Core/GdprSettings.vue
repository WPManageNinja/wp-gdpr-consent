<template>
    
    <el-row :gutter="15">
        <el-col :span="24">
            <label class="settings_label">Duration of Cookie(in days)</label>
            <el-input v-model="setting.duration" type="number"></el-input>
        </el-col>
        <el-col :span="24">
            <label class="settings_label">Delay of Cookie(in sec)</label>
            <el-input v-model="setting.delay" type="number"></el-input>
        </el-col>
        <el-col :span="24">
            <label class="settings_label">Show Decline Button</label>
            <el-switch v-model="setting.showDeclineBtn">
            </el-switch>
        </el-col>
    </el-row>

</template>

<script>

export default {
    name: 'GdprSettings',
    props: ['value'],
    computed: {
        setting: {
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
