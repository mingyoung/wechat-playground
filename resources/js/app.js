import Vue from 'vue'
import router from './router.js'

window.Vue = new Vue
window.bus = new Vue
require('./components.js')
require('./http.js')

new Vue({
    el: '#app', router
})
