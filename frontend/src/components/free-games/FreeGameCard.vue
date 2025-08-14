<template>
    <RouterLink
        :to="`/freegames/${game.game_id}`"
        class="block p-4 border-2 border-gray-300 rounded-lg shadow-lg hover:bg-blue-100 transition"
    >
        <div class="pb-5">
            <img
                :src="game.thumbnail"
                alt="Game thumbnail"
                class="mx-auto rounded-lg shadow-lg"
            />
        </div>

        <h1 class="font-semibold">{{ game.title }}</h1>

        <div class="text-sm space-y-1">
            <p><strong>🎮 Genre:</strong> {{ game.genre }}</p>
            <p><strong>🖥 Platform:</strong> {{ game.platform }}</p>
        </div>
    </RouterLink>
</template>

<script setup>
import { RouterLink } from 'vue-router';
defineProps({ game: Object });
</script>
