<template>
    <div class="bgColorList">
        <p>{{ title }}</p>
        <!-- <el-input type="text" v-model="model"></el-input> -->
        <el-color-picker
            size="mini" 
            v-model="model" 
            @active-change="activeChangedEvent"

            show-alpha></el-color-picker>
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

<style>

</style>
