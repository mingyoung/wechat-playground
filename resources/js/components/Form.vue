<template>
    <div>
        <div class="flex w-1/4 text-gray-700 pb-4" v-if="fields.length === 0">
            <span class="text-xs">该接口无参数，可直接发起请求</span>
        </div>
        <form v-else class="w-full mb-4 max-w-lg">
            <div v-for="field in fields" class="mb-3">
                <component :is="`form-${field.component}`" :field="field" />
            </div>
        </form>

        <button @click="store" class="select-none bg-indigo-600 text-white px-5 py-2 text-sm rounded-full hover:bg-indigo-700 focus:outline-none">发起请求</button>
    </div>
</template>

<script>
    export default {
        components: {
            FormText: require('./Form/TextField.vue').default,
            FormTextarea: require('./Form/TextareaField.vue').default,
            FormSelect: require('./Form/SelectField.vue').default,
            FormFile: require('./Form/FileField.vue').default,
        },

        data() {
            return {
                method: null,
                uri: null,
                fields: [],
            }
        },

        mounted() {
            this.index(this.$route.query.playground, this.$route.query.key)

            bus.$on('route:request', route => {
                this.index(route.query.playground, route.query.key)
            })
        },

        methods: {
            index(playground, key) {
                axios.get('/wechat-playground-api/request', { params: { playground, key } }).then(response => {
                    let { fields, method, uri } = response.data

                    this.fields = fields
                    this.method = method
                    this.uri = uri
                })
            },

            store() {
                const form = new FormData

                this.fields.forEach(field => {
                    let { key, value } = field.fill()

                    form.append(key + '[as]', JSON.stringify(field.as))
                    form.append(key + '[value]', value)
                })

                axios.post(`/wechat-playground-api/request?method=${this.method}&uri=${this.uri}`, form)
                    .then(({ data }) => bus.$emit('response', data))
            }
        }
    }
</script>
