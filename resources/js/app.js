// Vue setup
import { createApp } from 'vue';
import App from './App.vue';

// Icons
import { library } from '@fortawesome/fontawesome-svg-core';
import { faEdit, faTrashCan } from '@fortawesome/free-solid-svg-icons';
library.add(faEdit, faTrashCan);

// Initialise app
const app = createApp(App);
app.mount('#app');

require('./bootstrap');
