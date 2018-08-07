<template>
    <div class="bgColorList">
        <div class="block-container">
            <div class="title">
                <p>{{ title }}</p>
            </div>
            <div class="color-picker">
                <el-color-picker
                    size="mini" 
                    v-model="model" 
                    @active-change="activeChangedEvent"
                    show-alpha></el-color-picker>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'GdprColorCustomization',
    props: ['title', 'value'],
    methods: {
        activeChangedEvent(color) {
            this.$emit('input', color);
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

<style lang="scss">
    .bgColorList {
        .block-container {
            text-align: center;
            .title {
                display: inline-block;
            }
            .color-picker {
                display: inline-block;
                .el-color-picker  {
                    .el-color-picker__trigger {
                        margin-left: 5px;
                    }
                }
            }
        }
    }
</style>
