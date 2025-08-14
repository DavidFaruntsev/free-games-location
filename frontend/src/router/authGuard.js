import { useAuth } from "@/composables/useAuth";

/**
 * Global navigation guard for authentication.
 *
 * @param {import('vue-router').RouteLocationNormalized} to - Target route being navigated to.
 * @returns {Promise<true | import('vue-router').RouteLocationRaw>} - Returns `true` to allow navigation or a redirect object.
 */
export async function authGuard(to) {
    const { isAuthenticated, initAuth } = useAuth();

    await initAuth();

    if (to.meta.requiresAuth && !isAuthenticated.value) {
        return { name: "login", query: { redirect: to.fullPath } };
    }
}
