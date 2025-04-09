import { createRouter, createWebHistory } from "vue-router";
import { useAuthStore } from "./stores/auth";

import Home from "./pages/Home.vue";
import Tours from "./pages/Tours.vue";
import Login from './pages/Login.vue'

const ifNotAuthenticated = (to, from) => {
    const authStore = useAuthStore();

    if (authStore.authenticated) return "/dashboard";
};

const ifAuthenticated = (to, from) => {
    const authStore = useAuthStore();

    if (!authStore.authenticated) return "/login";

    const permission = to?.meta?.permission;
    if (permission) {
        if (!ability.can(permission)) return false;
    }
};

const routes = [
    {
        path: "/",
        component: Home,
        name: "Home",
        beforeEnter: ifNotAuthenticated,
    },
    {
        path: "/tours",
        component: Tours,
        name: "Tours",
        beforeEnter: ifNotAuthenticated
    },
    {
        path: "/login",
        component: Login,
        name: "Login",
        beforeEnter: ifNotAuthenticated
    },

];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
