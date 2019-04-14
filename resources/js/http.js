import axios from 'axios'

window.axios = axios
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

axios.interceptors.request.use(config => {
    window.bus.$emit('http:requesting')

    return config
}, error => {
    return Promise.reject(error)
})

axios.interceptors.response.use(response => {
    window.bus.$emit('http:replied', response)

    return response
}, error => {
    window.bus.$emit('http:exception', error.response.data)

    return Promise.reject(error)
})
