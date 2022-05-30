// Vue setup
import { createApp } from 'vue';
import App from './App.vue';

// Initialise app
const app = createApp(App);
app.mount('#app');

require('./bootstrap');
