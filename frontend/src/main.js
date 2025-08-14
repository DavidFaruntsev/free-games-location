import '@/assets/main.css';
import 'vue-awesome-paginate/dist/style.css';

import { createApp } from 'vue';
import App from '@/App.vue';
import router from '@/router';
import {useAuth} from "@/composables/useAuth.js";

const { initAuth } = useAuth();
await initAuth();

const app = createApp(App);
app.use(router);
app.mount('#app');
