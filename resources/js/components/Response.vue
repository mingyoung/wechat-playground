<style scoped>
    .bg-code {
        background: #141414
    }
</style>
<template>
    <div>
        <div v-if="requestResponse" class="mt-12 bg-white rounded-t-lg shadow">
            <div class="">
                <ul class="flex">
                    <li @click="currentTab = 'response'" :class="{ 'text-gray-900 font-bold border-b-2 border-black' : isCurrent('response') }" class="cursor-pointer mx-3 px-2 py-3">Response</li>
                    <li @click="currentTab = 'details'" :class="{ 'text-gray-900 font-bold border-b-2 border-black' : isCurrent('details') }" class="cursor-pointer mx-3 px-2 py-3">Detail</li>
                    <li @click="currentTab = 'payload'" :class="{ 'text-gray-900 font-bold border-b-2 border-black' : isCurrent('payload') }" class="cursor-pointer mx-3 px-2 py-3">Payload</li>
                </ul>
            </div>
            <div v-show="isCurrent('response')">
                <div v-if="requestResponse">
                    <div v-if="requestResponse.response.type === 'json'" class="bg-code p-4 text-white break-all">
                        <vue-json-pretty :data="requestResponse.response.content" />
                    </div>
                    <div v-else>
                        <image-view :response="requestResponse.response" />
                    </div>
                </div>
            </div>

            <div v-show="isCurrent('payload')">
                <div v-if="requestResponse">
                    <div class="bg-code p-4 text-white break-all">
                        <vue-json-pretty :data="requestResponse.payload" />
                    </div>
                </div>
            </div>

            <div v-show="isCurrent('details')" class="bg-gray-100 px-4 pt-2 pb-4">
                <span class="text-xs" v-if="!requestResponse">暂无内容</span>
                <table v-else class="w-full break-all text-black">
                    <tbody>
                        <tr v-for="detail in requestResponse.details">
                            <td class="pr-4 w-24 font-bold">{{ Object.keys(detail)[0] }}</td>
                            <td class="text-sm">{{ Object.values(detail)[0] }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</template>

<script>
    import VueJsonPretty from 'vue-json-pretty'
    import ImageView from './ImageView'

    export default {
        components: { VueJsonPretty, ImageView },

        data() {
            return {
                currentTab: 'response',
                requestResponse: null
            }
        },

        mounted() {
            bus.$on('http:requesting', () => this.requestResponse = null)
            bus.$on('response', response => this.requestResponse = response)
        },

        methods: {
            isCurrent(name) {
                return this.currentTab === name
            },

            setResponse(response) {
                this.requestResponse = response.data
            }
        }
    }
</script>
