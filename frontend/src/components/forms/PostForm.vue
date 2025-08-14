<template>
    <div class="p-6">

        <h2 class="text-xl font-bold mb-4">Create New Post</h2>

        <div v-if="error" class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            {{ error }}
        </div>

        <form @submit.prevent="submitPost">
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="body">Post</label>
                <textarea
                    v-model="form.body"
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
                    <span v-else>Create Post</span>
                </button>
            </div>
        </form>

    </div>
</template>

<script setup>
import { ref } from 'vue';
import api from '@/config/api';

const props = defineProps({
    threadId: { type: [String, Number], required: true },
    parentId: { type: [String, Number], default: null }
});

const emit = defineEmits(['post-created', 'cancel']);

const form = ref({
    body: '',
    thread_id: Number(props.threadId),
    parent_id: props.parentId,
});

const loading = ref(false);
const error = ref(null);

const submitPost = async () => {
    loading.value = true;
    error.value = null;

    try {
        await api.post(`/threads/${props.threadId}/posts`, form.value);

        form.value.body = '';
        emit('post-created');
    } catch (err) {
        error.value = err.response?.data?.message || 'Failed to create post';
    } finally {
        loading.value = false;
    }
};

const cancel = () => {
    emit('cancel');
};
</script>
