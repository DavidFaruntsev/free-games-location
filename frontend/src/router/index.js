import { createRouter, createWebHistory } from "vue-router";
import routes from "@/router/routes";
import { authGuard } from "@/router/authGuard";

/**
 * Application router instance.
 *
 * @type {import('vue-router').Router}
 */
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
});

router.beforeEach(authGuard);

export default router;
