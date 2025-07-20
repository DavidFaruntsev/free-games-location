<template>
    <span class="text-gray-300">Welcome, {{ user?.username }}!</span>
    <RouterLink to="/dashboard" class="hover:text-gray-300 transition">
        Dashboard
    </RouterLink>
    <button
        @click="handleLogout"
        :disabled="isLoading"
        class="hover:text-gray-300 transition disabled:opacity-50"
    >
        {{ isLoading ? 'Logging out...' : 'Logout' }}
    </button>
</template>

<script setup>
import { useAuth } from '@/composables/useAuth.js';
import router from "@/router/index.js";

const { user, logout, isLoading } = useAuth();

const handleLogout = async () => {
    await logout();
    router.push('/');
};
</script>
