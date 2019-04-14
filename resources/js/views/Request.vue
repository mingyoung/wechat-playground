<template>
    <div>
        <div class="bg-white rounded-t-lg shadow">
            <div class="p-4">参数构造</div>
            <loading class="bg-gray-100">
                <div class="p-8">
                    <form-component ref="form" />
                </div>
            </loading>
        </div>

        <response />
    </div>
</template>

<script>
    import Loading from '../components/Loading'
    import FormComponent from '../components/Form'
    import Response from '../components/Response'

    export default {
        components: {
            Loading, FormComponent, Response
        },
    }
</script>
