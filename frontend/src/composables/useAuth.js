import { ref, computed, readonly } from 'vue';
import { useRouter } from 'vue-router';
import api from '@/config/api.js';

// Global state
const user = ref(null);
const token = ref(localStorage.getItem('token'));
const isLoading = ref(false);

export function useAuth() {
    const router = useRouter();

    // Computed properties
    const isAuthenticated = computed(() => !!token.value);
    const isGuest = computed(() => !token.value);

    // Save auth data (after login/register)
    const setAuth = (authData) => {
        // Save token and user
        token.value = authData.token;
        user.value = authData.user;

        // Store token in localStorage (persistent)
        localStorage.setItem('token', authData.token);
    };

    // Clear auth data (on logout)
    const clearAuth = () => {
        token.value = null;
        user.value = null;
        localStorage.removeItem('token');
    };

    // Register function
    const register = async (formData) => {
        isLoading.value = true;
        try {
            // Use api instance - baseURL is already set
            const response = await api.post('/register', formData);
            setAuth(response.data);
            return response.data;
        } catch (error) {
            throw error;
        } finally {
            isLoading.value = false;
        }
    };

    // Login function
    const login = async (formData) => {
        isLoading.value = true;
        try {
            const response = await api.post('/login', formData);
            setAuth(response.data);
            return response.data;
        } catch (error) {
            throw error;
        } finally {
            isLoading.value = false;
        }
    };

    // Logout function
    const logout = async () => {
        isLoading.value = true;
        try {
            await api.post('/logout');
        } catch (error) {
            console.error('Logout error:', error);
        } finally {
            clearAuth();
            isLoading.value = false;
            router.push('/login');
        }
    };

    // Get current user (for when page is refreshed)
    const getCurrentUser = async () => {
        if (!token.value) return;

        isLoading.value = true;
        try {
            const response = await api.get('/user');
            user.value = response.data;
        } catch (error) {
            clearAuth();
        } finally {
            isLoading.value = false;
        }
    };

    // Initialize auth (on app start)
    const initAuth = async () => {
        if (token.value) {
            await getCurrentUser();
        }
    };

    return {
        // State (readonly)
        user: readonly(user),
        token: readonly(token),
        isLoading: readonly(isLoading),

        // Computed
        isAuthenticated,
        isGuest,

        // Methods
        register,
        login,
        logout,
        getCurrentUser,
        initAuth
    };
}
