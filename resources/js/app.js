import './bootstrap';
import {createApp} from 'vue'
import Alpine from 'alpinejs';
import App from '../components/App.vue';
window.Alpine = Alpine;

Alpine.start();

createApp(App).mount('#app');
