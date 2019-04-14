export default {
    props: ['field'],

    data() {
        return {
            value: ''
        }
    },

    created() {
        this.field.fill = this.fill
    },

    updated() {
        this.field.fill = this.fill
    },

    watch: {
        $route: function () {
            this.reset()
        }
    },

    methods: {
        fill() {
            return { key: this.field.key, value: String(this.value) }
        },

        reset() {
            this.value = ''
        }
    }
}
