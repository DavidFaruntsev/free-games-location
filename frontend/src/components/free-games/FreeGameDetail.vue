<template>
    <div class="mx-auto p-6">

        <div class="flex bg-white rounded-lg shadow-lg border-2 border-gray-300 overflow-hidden">

            <div class="flex-grow p-6 space-y-6">
                <img
                    :src="freeGame.thumbnail"
                    :alt="`Thumbnail van ${freeGame.title}`"
                    class="mx-auto rounded-lg shadow-lg"
                    loading="eager"
                />

                <div class="space-y-2 max-w-md">
                    <h1 class="text-3xl font-bold text-gray-800">{{ freeGame.title }}</h1>
                    <p class="text-gray-800 font-medium">Status: {{ freeGame.status }}</p>
                    <div
                        class="text-gray-700 whitespace-pre-line break-words h-[512px] overflow-y-auto p-2 border-2 border-solid rounded">
                        {{ freeGame.description }}
                    </div>
                </div>

                <div class="text-sm space-y-1">
                    <p>🎮 Genre: {{ freeGame.genre }}</p>
                    <p>🖥 Platform: {{ freeGame.platform }}</p>
                    <p>🏢 Publisher: {{ freeGame.publisher }}</p>
                    <p>👨‍💻 Developer: {{ freeGame.developer }}</p>
                    <p>📅 Release date: {{ freeGame.release_date }}</p>
                </div>

                <div class="flex flex-wrap gap-2 pt-4">
                    <a
                        :href="freeGame.game_url"
                        target="_blank"
                        class="
                          flex items-center justify-center
                          w-[160px] h-12 whitespace-nowrap overflow-hidden
                          bg-blue-600 text-white rounded
                          px-4 hover:bg-blue-700 transition text-xs sm:text-sm
                        "
                    >
                        Visit the game page!
                    </a>

                    <RouterLink
                        :to="{ name: 'freegame.threads', params: { game_id: freeGame.id } }"
                        class="
                          flex items-center justify-center
                          w-[160px] h-12 whitespace-nowrap overflow-hidden
                          bg-green-600 text-white rounded
                          px-4 hover:bg-green-700 transition text-xs sm:text-sm
                        "
                    >
                        Check threads
                    </RouterLink>
                </div>

            </div>

            <div class="w-px bg-gray-300"></div>

            <div class="flex-shrink p-6 overflow-y-auto max-h-[1100px] min-w-0">
                <div class="grid grid-rows-3 gap-4 justify-center">
                    <img
                        v-for="(shot, idx) in freeGame.screenshots"
                        :key="idx"
                        :src="shot.image"
                        :alt="`Screenshot ${idx + 1}: ${freeGame.title}`"
                        class="w-full max-w-[1280px] aspect-video object-cover rounded transition-shadow hover:shadow-lg"
                        loading="eager"
                    />
                </div>
            </div>

        </div>
    </div>
</template>

<script setup>
import {defineProps} from 'vue';

defineProps({
    freeGame: {
        type: Object,
        required: true
    }
});
</script>
