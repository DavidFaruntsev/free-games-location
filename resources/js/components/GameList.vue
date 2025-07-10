<template>
    <div>
        <h1 class="text-2xl font-bold mb-4">🎮 Games</h1>

        <ul v-if="games.length">
            <li v-for="game in games" :key="game.id" class="mb-2">
                {{ game.title }}
            </li>
        </ul>
        <p v-else>Geen games gevonden...</p>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const games = ref([])

onMounted(async () => {
    const response = await axios.get('/api/games')
    games.value = response.data
})
</script>
