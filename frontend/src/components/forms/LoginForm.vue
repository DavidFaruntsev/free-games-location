<template>
    <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">

        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

        <form @submit.prevent="handleLogin" class="space-y-4">
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
                class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition disabled:opacity-50"
            >
                {{ isLoading ? 'Logging in...' : 'Login' }}
            </button>

            <p v-if="error" class="text-red-500 text-sm text-center">{{ error }}</p>
        </form>

        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">
                Don't have an account?
                <RouterLink to="/register" class="text-green-600 hover:underline">
                    Register here
                </RouterLink>
            </p>
        </div>

    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import { useAuth } from '@/composables/useAuth';

const router = useRouter();
const { login, isLoading } = useAuth();

const form = ref({
    email: '',
    password: ''
});

const error = ref('');

const handleLogin = async () => {
    error.value = '';

    try {
        await login(form.value);
        router.push('/');
    } catch (err) {
        error.value = err.response?.data?.message || 'Login failed!';
    }
};
</script>
