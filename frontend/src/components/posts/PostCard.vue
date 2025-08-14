<template>
    <div class="p-4 mb-4 border rounded flex justify-between">

        <div>
            <p>{{ post.body}}</p>
            <img :src="post.image" alt="Post image" loading="eager">
            <p class="text-sm text-gray-400">By: {{ post.user.username }}</p>
            <p class="text-sm text-gray-400">Likes: {{ post.likes }}</p>
            <p class="text-sm text-gray-400">Dislikes: {{ post.dislikes }}</p>
        </div>

        <div v-if="auth.isAuthenticated.value && auth.user.value.id === post.user.id" class="mb-4 text-right">
            <button
                @click="deletePost"
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
            >
                - Delete Post
            </button>
        </div>

    </div>
</template>

<script setup>
import { useAuth } from '@/composables/useAuth'
import api from "@/config/api.js";
const auth = useAuth()

const props = defineProps({
    post: Object
});

const emit = defineEmits(['deleted'])

const deletePost = async () => {
    const confirmed = confirm('Delete Post???');

    if (!confirmed) return;

    try {
        await api.delete(`/posts/${props.post.id}`);
        emit('deleted');
    } catch (error) {
        console.error("Error deleting post:", error);
    }
};
</script>
