<template>
    <div>
        <h1 class="text-2xl font-bold mb-4">🎮 Games</h1>
        <div class="grid grid-cols-3 gap-4">
            <GameCard v-for="game in games" :key="game.id" :game="game" />
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import GameCard from './GameCard.vue'

const games = ref([])

onMounted(async () => {
    const response = await axios.get('/api/games')
    games.value = response.data
})
</script>
