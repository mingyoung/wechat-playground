<template>
    <field-wrapper>
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">{{ field.name }}</label>
            <input
                v-model="value"
                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                type="text"
                :placeholder="field.placeholder"
            >
        </div>
    </field-wrapper>
</template>

<script>
    import FormField from './mixins/FormField'
    import FieldWrapper from './FieldWrapper'

    export default {
        mixins: [FormField],

        components: { FieldWrapper }
    }
</script>
