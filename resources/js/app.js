import './bootstrap';
import { createApp } from 'vue';
import GameList from './components/GameList.vue';
import '../css/app.css';

const el = document.getElementById('game-list-root');

if (el) {
    createApp({}).component('game-list', GameList).mount(el);
}
