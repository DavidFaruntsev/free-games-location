import axios from 'axios';

export const API_BASE_URL = import.meta.env.VITE_API_BASE_URL;

// One central Axios instance for all API calls
const api = axios.create({
    baseURL: `${API_BASE_URL}/api`,
    withCredentials: true,
    headers: {
        'Content-Type': 'application/json',
    }
});

// Request interceptor - automatically adds token if it exists
api.interceptors.request.use((config) => {
    const token = localStorage.getItem('token');
    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
}, (error) => {
    return Promise.reject(error);
});

// Response interceptor - automatically handles 401 errors (logged out)
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
