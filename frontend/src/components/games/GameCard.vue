<template>
    <div class="p-4 border rounded shadow">
        <h2>{{ game.title }}</h2>

        <p>{{ game.short_description }}</p>
        <p>{{ game.genre }}</p>
    </div>
</template>

<script setup>
defineProps({game: Object});
</script>
