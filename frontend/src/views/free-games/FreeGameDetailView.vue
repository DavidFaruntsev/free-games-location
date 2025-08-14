<template>
    <div class="flex-1 flex items-center justify-center min-h-0">
        <FreeGameDetail v-if="freeGame" :freeGame="freeGame"/>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import api from '@/config/api.js';
import FreeGameDetail from '@/components/free-games/FreeGameDetail.vue';

const route = useRoute();
const id = route.params.game_id;
const freeGame = ref(null);

onMounted(async () => {
    try {
        const { data } = await api.get(`/freegames/${id}`);
        freeGame.value = data.data;
    } catch (err) {
        console.error('Error: ', err);
    }
});
</script>
