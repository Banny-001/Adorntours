import "./bootstrap";

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import vuetify from './plugins/vuetify' 
import axios from "./plugins/axios";
import { createPinia } from "pinia";
import '@mdi/font/css/materialdesignicons.css';

const pinia = createPinia();

createApp(App)
  .use(router)
  .use(vuetify)
  .use(pinia)
  .use(axios)
  .mount('#app')
