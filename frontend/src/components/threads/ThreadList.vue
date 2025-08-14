<template>
    <div class="p-4 max-w-7xl mx-auto">

        <div v-if="threads.length === 0">No threads found</div>

        <div class="grid grid-cols-3 gap-4">
            <ThreadCard v-for="thread in threads" :key="thread.id" :thread="thread" />
        </div>

    </div>
</template>

<script setup>
import ThreadCard from '@/components/threads/ThreadCard.vue';

defineProps({
    threads: { type: Array, required: true }
});
</script>
