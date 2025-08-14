<template>
    <div class="p-4">

        <div v-if="auth.isAuthenticated.value && route.params.game_id" class="mb-4 text-right">
            <button
                @click="showThreadForm = true"
                class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded"
            >
                + Create Thread
            </button>
        </div>

        <ThreadList :threads="threads" />

        <div v-if="showThreadForm" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center p-4 z-50">
            <div class="bg-white rounded-lg shadow-xl w-full max-w-md">
                <ThreadForm
                    :game-id="route.params.game_id"
                    @thread-created="handleThreadCreated"
                    @cancel="showThreadForm = false"
                />
            </div>
        </div>

    </div>
</template>

<script setup>
import { ref, onMounted, watch } from 'vue';
import { useRoute } from 'vue-router';
import { useAuth } from '@/composables/useAuth.js';
import api from '@/config/api.js';
import ThreadList from '@/components/threads/ThreadList.vue';
import ThreadForm from '@/components/forms/ThreadForm.vue';

const route = useRoute();
const auth = useAuth();
const threads = ref([]);
const showThreadForm = ref(false);

const getEndpoint = () => {
    const gameId = route.params.game_id;
    return gameId
        ? `/freegames/${gameId}/threads`
        : `/threads`;
};

const fetchThreads = async () => {
    try {
        const { data } = await api.get(getEndpoint());
        threads.value = data.data;
    } catch (err) {
        console.error('Error loading threads:', err);
    }
}

onMounted(fetchThreads);
watch(() => route.fullPath, fetchThreads);

const handleThreadCreated = () => {
    showThreadForm.value = false;
    fetchThreads();
};
</script>
