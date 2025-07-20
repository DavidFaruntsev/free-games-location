<template>
    <div class="min-h-screen flex flex-col">
        <Header />
        <main class="flex-grow">
            <RouterView />
        </main>
        <Footer />
    </div>
</template>

<script setup>
import { onMounted } from 'vue';
import Header from '@/components/layout/Header.vue';
import Footer from '@/components/layout/Footer.vue';
import { useAuth } from '@/composables/useAuth';

const { initAuth } = useAuth();

onMounted(async () => {
    await initAuth();
});
</script>
