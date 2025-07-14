import './bootstrap';
import { createApp, h } from 'vue';
import GameList from './components/GameList.vue';
import '../css/app.css';
import 'vue-awesome-paginate/dist/style.css'
import RegisterForm from "./components/RegisterForm.vue";

const components = {
    'game-list': GameList,
    'register-form': RegisterForm,
}

const el = document.getElementById('app')

if (el) {
    const name = el.dataset.component
    const Component = components[name]

    if (Component) {
        createApp({
            render: () => h(Component)
        }).mount(el)
    }
}
