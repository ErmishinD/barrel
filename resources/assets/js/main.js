

import { createApp, h } from 'vue';
import axios from 'axios'
import lodash from 'lodash'
import VueAxios from 'vue-axios'
import VueSplide from '@splidejs/vue-splide';
import { GDialog } from 'gitart-vue-dialog'
import { Slide } from 'vue3-burger-menu'

import Barrel from './components/Barrel.vue'

window.axios = axios
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window._ = lodash

const app = createApp({
    render: ()=>h(Barrel)
})

app.use(VueAxios, axios).use(VueSplide).use(GDialog).use(Slide)

app.mount('#app')