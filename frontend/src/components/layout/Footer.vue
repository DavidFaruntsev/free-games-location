<template>
    <footer class="bg-blue-500 text-white text-center py-4">
        &copy; {{ year }} freegameslocation.com
    </footer>
</template>

<script setup>
const year = new Date().getFullYear();
</script>
