<template>

    <el-row :gutter="15">
        <el-col :span="24" style="padding-top: 8px; padding-right: 0.5px;">
            <label class="settings_label">Accept Cookie Duration (in days)</label>
            <el-input v-model="setting.duration" type="number"></el-input>
        </el-col>
        <el-col :span="24" style="padding-right: 0.5px;">
            <label class="settings_label">Hide GDP Concent(after <span v-if="setting.delay==''">0</span><span v-else>{{setting.delay}}</span>
                sec)</label>
            <el-input v-model="setting.delay" type="number"></el-input>
        </el-col>
        <el-col :span="24">
            <label class="settings_label">Show Decline Button</label>
            <el-switch v-model="setting.showDeclineBtn">
            </el-switch>

            <div v-if="setting.showDeclineBtn">
                <label>Decline Button Text</label>
                <el-input size="mini" v-model="setting.decline_button_text"></el-input>
                
                <label class="settings_label">Denied Cookie Duration (in days)</label>
                <el-input v-model="setting.declined_duration" type="number"></el-input>
            </div>
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
