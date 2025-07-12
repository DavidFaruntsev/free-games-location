import './bootstrap';
import { createApp } from 'vue';
import GameList from './components/GameList.vue';
import '../css/app.css';

import VueAwesomePaginate from 'vue-awesome-paginate'
import 'vue-awesome-paginate/dist/style.css'

const el = document.getElementById('game-list-root')

const app = createApp({})

app.use(VueAwesomePaginate)

app.component('game-list', GameList).mount(el)
