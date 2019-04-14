<template>
    <nav>
        <div>
            <ul>
                <li>
                    <router-link
                        :to="{ name: 'home' }"
                        class="flex items-center text-gray-600 text-sm font-normal hover:text-gray-800"
                        active-class="text-gray-900 font-bold" exact
                    >
                        <svg class="fill-current w-3 h-3 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M8 20H3V10H0L10 0l10 10h-3v10h-5v-6H8v6z"/></svg>
                        <span>首页</span>
                    </router-link>
                </li>
            </ul>
        </div>

        <div class="w-32 border-t my-4"></div>

        <div class="mb-8" v-for="navigation in navigations">
            <h5 class="mb-3 text-gray-600 antialiased tracking-wide font-bold text-sm">{{ navigation.name }}</h5>
            <ul>
                <li class="mb-1" v-for="(name, key) in navigation.links">
                    <router-link
                        :to="{ name: 'request', query: { playground: navigation.playground, key } }"
                        class="px-2 -mx-2 py-1 antialiased relative block text-gray-600 text-sm font-normal hover:text-gray-800"
                        active-class="text-gray-900 font-bold" exact
                    >
                        <span class="rounded absolute inset-0 bg-teal-200 opacity-0"></span>
                        <span class="relative">{{ name }}</span>
                    </router-link>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
    export default {
        props: ['navigations']
    }
</script>
