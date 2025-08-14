<template>
    <div class="p-4">

        <div class="flex justify-between mb-6 border-b pb-4">
            <div class="">
                <h2 class="text-xl font-bold">{{ thread.title }}</h2>
                <p class="text-gray-600">{{ thread.description }}</p>
                <p class="text-sm text-gray-400">By {{ thread.user.username }}</p>
            </div>

            <div v-if="auth.isAuthenticated.value && (auth.user.value.id === thread.user.id)" class="mb-4 text-right">
                <button
                    @click="deleteThread"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                >
                    - Delete Thread
                </button>
            </div>
        </div>

        <PostList :posts="thread.posts" @refresh="fetchThread" />

        <div v-if="auth.isAuthenticated.value" class="mb-4 text-right">
            <button
                @click="showPostForm = true"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
            >
                + Create Post
            </button>
        </div>

        <div
            v-if="showPostForm"
            class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center p-4 z-50"
        >
            <div class="bg-white rounded-lg shadow-xl w-full max-w-md">
                <PostForm
                    :thread-id="thread.id"
                    @postCreated="handlePostCreated"
                    @cancel="showPostForm = false"
                />
            </div>
        </div>

    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useAuth } from '@/composables/useAuth';
import PostList from '@/components/posts/PostList.vue';
import PostForm from '@/components/forms/PostForm.vue';
import router from "@/router/index.js";
import api from "@/config/api.js";

const props = defineProps({
    thread: {
        type: Object,
        required: true
    }
});

const auth = useAuth();
const showPostForm = ref(false);
const emit = defineEmits(['refresh']);

const handlePostCreated = () => {
    showPostForm.value = false;
    emit('refresh');
};

const deleteThread = async () => {
    const confirmed = confirm('Are you sure you want to delete this thread?');

    if (!confirmed) return;

    try {
        await api.delete(`/threads/${props.thread.id}`);
        router.push('/threads');
    } catch (error) {
        console.error('Error deleting thread:', error);
        alert('Failed to delete thread.');
    }
}

const fetchThread = () => {
    emit('refresh');
};
</script>
