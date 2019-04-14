<template>
    <div v-if="bag" class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
        <p class="font-bold">错误</p>
        <p class="mt-2">{{ bag.message }}</p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                bag: null
            }
        },

        mounted() {
            window.bus.$on('http:exception', this.receive)
            window.bus.$on('http:requesting', this.hide)
        },

        methods: {
            receive(data) {
                this.bag = data
            },

            hide() {
                this.bag = null
            }
        }
    }
</script>
