<template>
    <div class="min-h-full flex items-center justify-center">

        <div class="p-6 bg-gray-800 rounded-lg shadow-lg text-white">
            <h2>Username: {{ user.username }}</h2>
            <p>Email: {{ user.email }}</p>
        </div>

    </div>
</template>

<script setup>
import { useAuth } from '@/composables/useAuth.js';

const { user } = useAuth();
</script>
