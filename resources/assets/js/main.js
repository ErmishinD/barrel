

import { createApp, h } from 'vue';
import axios from 'axios'
import lodash from 'lodash'
import VueAxios from 'vue-axios'
import VueSplide from '@splidejs/vue-splide';

import Barrel from './components/Barrel.vue'

window.axios = axios
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window._ = lodash

const app = createApp({
    render: ()=>h(Barrel)
})

app.use(VueAxios, axios).use(VueSplide)

app.mount('#app')