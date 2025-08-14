<template>
    <div class="p-6" v-if="thread">
        <ThreadDetail :thread="thread" @refresh="fetchThread" />
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import api from '@/config/api.js';
import ThreadDetail from '@/components/threads/ThreadDetail.vue';

const thread = ref(null);
const route = useRoute();

const fetchThread = async () => {
    const res = await api.get(`/threads/${route.params.id}`);
    thread.value = res.data.data;
};
onMounted(fetchThread);
</script>
