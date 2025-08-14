<template>
    <div class="p-6">

        <h2 class="text-xl font-bold mb-4">Create New Thread for Game</h2>

        <div v-if="error" class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            {{ error }}
        </div>

        <form @submit.prevent="submitForm">
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="title">Title</label>
                <input
                    v-model="form.title"
                    type="text"
                    class="w-full px-3 py-2 border rounded"
                    required
                    maxlength="255"
                >
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="description">Description</label>
                <textarea
                    v-model="form.description"
                    class="w-full px-3 py-2 border rounded"
                    rows="4"
                    required
                ></textarea>
            </div>

            <div class="flex justify-end space-x-3">
                <button
                    type="button"
                    @click="cancel"
                    class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-100"
                >
                    Cancel
                </button>

                <button
                    type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
                    :disabled="loading"
                >
                    <span v-if="loading">Creating...</span>
                    <span v-else>Create Thread</span>
                </button>
            </div>
        </form>

    </div>
</template>

<script setup>
import { ref } from 'vue';
import api from '@/config/api';

const props = defineProps({
    gameId: { type: [Number, String], required: true }
});

const emit = defineEmits(['thread-created', 'cancel']);

const form = ref({
    title: '',
    description: '',
    free_game_id: Number(props.gameId)
});

const loading = ref(false);
const error = ref(null);

const submitForm = async () => {
    loading.value = true;
    error.value = null;

    try {
        const gameId = Number(props.gameId);

        await api.post(`/freegames/${gameId}/threads`, form.value);

        form.value = { title: '', description: '', free_game_id: Number(props.gameId)  }
        emit('thread-created');
    } catch (err) {
        error.value = err.response?.data?.message || 'Failed to create thread';
    } finally {
        loading.value = false;
    }
};

const cancel = () => {
    emit('cancel');
};
</script>
