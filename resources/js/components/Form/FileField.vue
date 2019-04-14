<template>
    <field-wrapper>
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">{{ field.name }}</label>

            <div class="inline-block overflow-hidden relative cursor-pointer">
                <div class="flex items-center">
                    <button type="button" class="select-none bg-white text-black px-5 py-2 text-sm border rounded">添加文件</button>
                    <input @change="fileChanged" class="absolute opacity-0 inset-0" type="file" name="media" />
                    <span class="ml-2">{{ fileName }}</span>
                </div>
            </div>
        </div>
    </field-wrapper>
</template>

<script>
    import FormField from './mixins/FormField'
    import FieldWrapper from './FieldWrapper'

    export default {
        mixins: [FormField],

        components: { FieldWrapper },

        data() {
            return {
                files: null
            }
        },

        methods: {
            fill() {
                let response = { key: this.field.key, value: '' }
                if (!this.files) return response

                response.value = this.files[0]

                return response
            },

            fileChanged(e) {
                this.files = e.target.files
            }
        },

        computed: {
            fileName() {
                if (!this.files || this.files.length === 0) return

                return this.files[0].name
            }
        }
    }
</script>
