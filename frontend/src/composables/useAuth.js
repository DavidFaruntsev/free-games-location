import { ref, computed, readonly } from 'vue';
import api from '@/config/api.js';

const user = ref(null);
const token = ref(localStorage.getItem('token'));
const isLoading = ref(false);

/**
 * Authentication composable for managing user state and API auth actions.
 *
 * @returns {{
 *   user: import('vue').Ref<Object|null>,
 *   token: import('vue').Ref<string|null>,
 *   isLoading: import('vue').Ref<boolean>,
 *   isAuthenticated: import('vue').ComputedRef<boolean>,
 *   isGuest: import('vue').ComputedRef<boolean>,
 *   register: (formData: Object) => Promise<Object>,
 *   login: (formData: Object) => Promise<Object>,
 *   logout: () => Promise<void>,
 *   getCurrentUser: () => Promise<void>,
 *   initAuth: () => Promise<void>
 * }}
 */
export function useAuth() {
    /**
     * Whether the current user is authenticated.
     * @type {import('vue').ComputedRef<boolean>}
     */
    const isAuthenticated = computed(() => !!token.value);

    /**
     * Whether the current user is not authenticated.
     * @type {import('vue').ComputedRef<boolean>}
     */
    const isGuest = computed(() => !token.value);

    /**
     * Save auth token and user info in state and localStorage.
     * @param {{ token: string, user: Object }} authData
     */
    const setAuth = authData => {
        token.value = authData.token;
        user.value = authData.user;
        localStorage.setItem('token', authData.token);
    };

    /**
     * Clear auth token and user info from state and localStorage.
     */
    const clearAuth = () => {
        token.value = null;
        user.value = null;
        localStorage.removeItem('token');
    };

    /**
     * Register a new user.
     * @param {Object} formData - Registration form data.
     * @returns {Promise<Object>} The API response data.
     */
    const register = async formData => {
        isLoading.value = true;
        try {
            const response = await api.post('/register', formData);
            setAuth(response.data);
            return response.data;
        } finally {
            isLoading.value = false;
        }
    };

    /**
     * Log in a user.
     * @param {Object} formData - Login form data.
     * @returns {Promise<Object>} The API response data.
     */
    const login = async formData => {
        isLoading.value = true;
        try {
            const response = await api.post('/login', formData);
            setAuth(response.data);
            return response.data;
        } finally {
            isLoading.value = false;
        }
    };

    /**
     * Log out the current user.
     * @returns {Promise<void>}
     */
    const logout = async () => {
        isLoading.value = true;
        try {
            await api.post('/logout');
        } catch (e) {
            console.error('Logout error:', e);
        } finally {
            clearAuth();
            isLoading.value = false;
        }
    };

    /**
     * Fetch the current authenticated user's details.
     * @returns {Promise<void>}
     */
    const getCurrentUser = async () => {
        if (!token.value) return;
        isLoading.value = true;
        try {
            const { data } = await api.get('/me');
            user.value = data.data;
        } catch {
            clearAuth();
        } finally {
            isLoading.value = false;
        }
    };

    /**
     * Initialize authentication by loading the current user if a token exists.
     * @returns {Promise<void>}
     */
    const initAuth = async () => {
        if (token.value) await getCurrentUser();
    };

    return {
        user: readonly(user),
        token: readonly(token),
        isLoading: readonly(isLoading),
        isAuthenticated,
        isGuest,
        register,
        login,
        logout,
        getCurrentUser,
        initAuth
    };
}
