<template>
    <router-link :to="`/threads/${thread.id}`" class="block">
        <div class="block p-4 border-2 border-gray-300 rounded-lg shadow-lg hover:bg-orange-100 transition">

            <div class="pb-5">
                <img
                    :src="thread.free_game.thumbnail"
                    alt="Game thumbnail"
                    class="mx-auto rounded-lg shadow-lg"
                />
            </div>

            <h1 class="font-semibold">{{ thread.free_game.title }}</h1>

            <h2 class="font-semibold">{{ thread.title }}</h2>

            <p class="text-gray-600 text-sm mt-1">{{ thread.description }}</p>

            <div class="flex justify-between">
                <p class="text-gray-400 text-xs mt-2">By {{ thread.user.username }}</p>
                <p class="text-gray-400 text-xs mt-2">Posts: {{ thread.posts_count }}</p>
            </div>

        </div>
    </router-link>
</template>

<script setup>
defineProps({
    thread: { type: Object, required: true }
});
</script>
