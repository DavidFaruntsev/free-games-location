import HomeView from "@/views/HomeView.vue";

/**
 * Application route definitions.
 *
 * @type {import('vue-router').RouteRecordRaw[]}
 */
export default [
    {
        path: "/",
        name: "home",
        component: HomeView,
    },
    {
        path: "/about",
        name: "about",
        component: () => import("@/views/AboutView.vue"),
    },
    {
        path: "/register",
        name: "register",
        component: () => import("@/views/auth/RegisterView.vue"),
    },
    {
        path: "/login",
        name: "login",
        component: () => import("@/views/auth/LoginView.vue"),
    },
    {
        path: "/freegames/:game_id(\\d+)",
        name: "freegame.detail",
        component: () => import("@/views/free-games/FreeGameDetailView.vue"),
    },
    {
        path: "/account",
        name: "account",
        component: () => import("@/views/AccountView.vue"),
        meta: { requiresAuth: true },
    },
    {
        path: "/threads",
        name: "threads",
        component: () => import("@/views/threads/ThreadListView.vue"),
    },
    {
        path: "/freegames/:game_id/threads",
        name: "freegame.threads",
        component: () => import("@/views/threads/ThreadListView.vue"),
    },
    {
        path: "/threads/:id(\\d+)",
        name: "thread.detail",
        component: () => import("@/views/threads/ThreadDetailView.vue"),
    },
];
