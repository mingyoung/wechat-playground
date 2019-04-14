import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
    base: `${window.Playground.path}`,
    mode: 'history',
    routes: [
        { name: 'home', path: '/', component: require('./views/Home.vue').default },
        { name: 'request', path: '/request', component: require('./views/Request.vue').default }
    ],
})

router.beforeResolve((to, from, next) => {
    window.bus.$emit(`route:${to.name}`, to)

    next()
})

export default router
