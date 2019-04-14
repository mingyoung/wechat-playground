<template>
    <div class="flex justify-center py-16 bg-gray-100">
        <img :src="source" />
    </div>
</template>

<script>
    export default {
        props: ['response'],

        mounted() {
            console.log(this.response)
        },

        computed: {
            source() {
                return `data:image/${this.getExtension()};base64,${this.getContent()}`
            }
        },

        methods: {
            getExtension() {
                return this.response.extension.substr(1)
            },

            getContent() {
                return this.response.content
            }
        }
    }
</script>
