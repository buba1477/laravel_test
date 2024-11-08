import './bootstrap';
import {createApp} from 'vue';
import Alpine from 'alpinejs';
import App from '../components/App.vue';
import Router from "./router.js";

window.Alpine = Alpine;
import Vuex from './store/index.js';

// Vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

const vuetify = createVuetify({
    components,
    directives,
})

Alpine.start();


let app = createApp({});

app.component('app', App);
//app.component('single-component', SingleComponent);
app.use(Router);
app.use(Vuex);
app.use(vuetify);

app.mount('#app');
