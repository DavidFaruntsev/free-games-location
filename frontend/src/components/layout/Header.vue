<template>
    <header class="bg-blue-500 flex items-center justify-between px-4 sticky top-0">

        <div class="flex items-center">
            <img
                alt="Vue logo"
                class="logo"
                src="@/assets/FreeGamesLocationLogo.png"
                width="125"
                height="125"
            />

            <nav class="text-white flex space-x-4 ml-6">
                <RouterLink to="/" class="hover:text-gray-300 transition">Home</RouterLink>
                <RouterLink to="/threads" class="hover:text-gray-300 transition">Threads</RouterLink>
                <RouterLink to="/about" class="hover:text-gray-300 transition">About</RouterLink>
            </nav>
        </div>

        <nav class="text-white flex items-center space-x-4">
            <GuestNavigation v-if="isGuest" />
            <AuthenticatedNavigation v-if="isAuthenticated" />
        </nav>

    </header>
</template>

<script setup>
import { useAuth } from '@/composables/useAuth.js';
import GuestNavigation from '@/components/navigation/GuestNavigation.vue';
import AuthenticatedNavigation from '@/components/navigation/AuthenticatedNavigation.vue';

const { isAuthenticated, isGuest } = useAuth();
</script>
