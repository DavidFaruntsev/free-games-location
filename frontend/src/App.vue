<template>
    <div class="min-h-screen flex flex-col">

        <Header />

        <main class="flex-1 flex flex-col min-h-0">
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
