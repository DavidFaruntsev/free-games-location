<template>
    <form @submit.prevent="register">
        <input v-model="form.username" type="text" placeholder="Username" required>
        <input v-model="form.email" type="email" placeholder="Email" required>
        <input v-model="form.password" type="password" placeholder="Password" required>
        <button type="submit">Register</button>

        <p v-if="error" class="text-red-500">{{ error }}</p>
    </form>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';

const form = ref({
    username: '',
    email: '',
    password: ''
});

const error = ref('');

async function register() {
    try {
        await axios.post('/api/users', form.value);
        window.location.href = '/';
    } catch (err) {
        error.value = 'Registratie mislukt';
    }
}
</script>
