import './bootstrap';
import 'bootstrap/dist/css/bootstrap.css'; 
import store from "./store";
import App from './views/App.vue';
import router from './router'
import {createApp} from 'vue'

const app = createApp(App)
    .use(store)
    .use(router)

app.mount('#app');

import 'bootstrap/dist/js/bootstrap.js'; 
