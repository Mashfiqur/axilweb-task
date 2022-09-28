import './bootstrap';
import 'bootstrap/dist/css/bootstrap.css'; 
// import auth from "./auth";
import store from "./store";
import App from './views/App.vue';
import router from './router'
import {createApp} from 'vue'

const app = createApp(App)
    .use(store)
    .use(router)

// app.config.globalProperties.$auth = auth;

app.mount('#app');

import 'bootstrap/dist/js/bootstrap.js'; 
