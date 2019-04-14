<template>
    <div>
        <error />

        <router-view />
    </div>
</template>

<script>
    import Error from '../components/Error'

    export default {
        components: { Error }
    }
</script>
