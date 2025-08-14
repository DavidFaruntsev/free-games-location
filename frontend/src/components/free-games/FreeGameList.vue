<template>
    <div class="p-4 max-w-7xl mx-auto">

        <h1 class="text-2xl font-bold mb-4">🎮 Explore free games</h1>

        <div class="grid grid-cols-3 gap-4">
            <FreeGameCard v-for="game in games" :key="game.id" :game="game" />
        </div>

        <div class="mt-6 flex justify-center">
            <VueAwesomePaginate
                :total-items="paginationMeta.total"
                :items-per-page="paginationMeta.per_page"
                v-model="currentPage"
                @update:modelValue="loadPage"
                :max-pages-shown="5"
                paginate-buttons-class="w-10 h-10 mx-1 rounded-lg border border-gray-300 text-gray-700 hover:bg-blue-100 transition"
                active-page-class="bg-blue-500 text-white font-bold border-blue-500"
            />
        </div>

    </div>
</template>

<script setup>
import {ref, onMounted} from 'vue';
import FreeGameCard from '@/components/free-games/FreeGameCard.vue';
import {VueAwesomePaginate} from "vue-awesome-paginate";
import api from '@/config/api.js';

const games = ref([]);

const paginationMeta = ref({
    total: 0,
    per_page: 1,
    current_page: 1,
});

const currentPage = ref(1);

const loadPage = async (page = 1) => {
    const response = await api.get(`/freegames?page=${page}`);
    games.value = response.data.data;
    paginationMeta.value = {
        total: response.data.meta.total,
        per_page: response.data.meta.per_page,
        current_page: response.data.meta.current_page,
    };
    currentPage.value = page;
};

onMounted(() => loadPage());
</script>
