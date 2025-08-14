import axios from 'axios';

export const API_BASE_URL = import.meta.env.VITE_API_BASE_URL;

/**
 * Axios instance configured for the application's API.
 *
 * @type {import('axios').AxiosInstance}
 */
const api = axios.create({
    baseURL: `${API_BASE_URL}/api`,
    withCredentials: true,
    headers: {
        'Content-Type': 'application/json',
    }
});

/**
 * Request interceptor that automatically attaches the Bearer token
 * from localStorage to the Authorization header if available.
 *
 * @param {import('axios').InternalAxiosRequestConfig} config - The Axios request configuration object.
 * @returns {import('axios').InternalAxiosRequestConfig} The updated Axios request configuration.
 */
api.interceptors.request.use((config) => {
    const token = localStorage.getItem('token');
    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
}, (error) => {
    return Promise.reject(error);
});

/**
 * Response interceptor that handles global API response behavior.
 *
 * - If a 401 Unauthorized response is received, the token is removed from storage
 *   and the default Authorization header is deleted.
 *
 * @param {import('axios').AxiosResponse} response - The successful Axios response.
 * @returns {import('axios').AxiosResponse} The unmodified Axios response.
 */
api.interceptors.response.use(
    (response) => response,
    (error) => {
        if (error.response?.status === 401) {
            localStorage.removeItem('token');
            delete api.defaults.headers.common['Authorization'];
        }
        return Promise.reject(error);
    }
);

export default api;
