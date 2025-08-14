<template>
    <div>

        <Post
            v-for="post in posts"
            :key="post.id"
            :post="post"
            @deleted="refresh"
        />

    </div>
</template>

<script setup>
import Post from '@/components/posts/PostCard.vue';
const props = defineProps({
    posts: Array
})
const emit = defineEmits(['refresh'])
const refresh = () => emit('refresh')
</script>
