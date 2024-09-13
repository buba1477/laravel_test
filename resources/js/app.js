import './bootstrap';
import {createApp} from 'vue';
import Alpine from 'alpinejs';
import App from '../components/App.vue';
import Router from "./router.js";
window.Alpine = Alpine;
import Vuex from './store/index.js';

Alpine.start();


let app = createApp({});

app.component('app', App);
//app.component('single-component', SingleComponent);
app.use(Router);
app.use(Vuex);
app.mount('#app');
