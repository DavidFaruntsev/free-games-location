<template>
    <span>Welcome, {{ user.username }}!</span>

    <RouterLink to="/account">Account</RouterLink>

    <button @click="handleLogout" :disabled="isLoading">
        {{ isLoading ? 'Logging out…' : 'Logout' }}
    </button>
</template>

<script setup>
import {useRouter} from 'vue-router';
import {useAuth} from '@/composables/useAuth.js';

const router = useRouter();
const {user, logout, isLoading} = useAuth();

const handleLogout = async () => {
    await logout();
    router.replace('/');
};
</script>
