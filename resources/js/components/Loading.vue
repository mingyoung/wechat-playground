<template>
    <div class="vld-parent">
        <loading :active.sync="isLoading" loader="dots" :is-full-page="false" />
        <slot />
    </div>
</template>

<script>
    import Loading from 'vue-loading-overlay'
    import 'vue-loading-overlay/dist/vue-loading.css'

    export default {
        components: { Loading },

        data() {
            return {
                isLoading: false
            }
        },

        mounted() {
            bus.$on('http:requesting', this.show)
               .$on(['http:replied', 'http:exception'], this.hide)
        },

        methods: {
            show() {
                this.isLoading = true
            },

            hide() {
                this.isLoading = false
            }
        }
    }
</script>
