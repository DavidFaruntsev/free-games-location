<template>
    <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>
        <form @submit.prevent="handleRegister" class="space-y-4">
            <input
                v-model="form.username"
                type="text"
                placeholder="Username"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
            />
            <input
                v-model="form.email"
                type="email"
                placeholder="E-mail"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
            />
            <input
                v-model="form.password"
                type="password"
                placeholder="Password"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
            />
            <button
                type="submit"
                :disabled="isLoading"
                class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 transition disabled:opacity-50"
            >
                {{ isLoading ? 'Registering...' : 'Register' }}
            </button>
            <p v-if="error" class="text-red-500 text-sm text-center">{{ error }}</p>
        </form>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import { useAuth } from '@/composables/useAuth';

const router = useRouter();
const { register, isLoading } = useAuth();

const form = ref({
    username: '',
    email: '',
    password: ''
});

const error = ref('');

const handleRegister = async () => {
    error.value = '';

    try {
        await register(form.value);
        router.push('/');
    } catch (err) {
        error.value = err.response?.data?.message || 'Registration failed!';
    }
};
</script>
