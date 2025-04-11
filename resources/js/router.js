import { createRouter, createWebHistory } from "vue-router";
import { useAuthStore } from "./stores/auth";
import CommunityTeachers from './pages/community/Teachers.vue';
import CommunityLearners from './pages/community/Learners.vue';
import CommunityParents from './pages/community/Parents.vue';
import Home from "./pages/Home.vue";
import Tours from "./pages/Tours.vue";
import Login from './pages/Login.vue';
import Blog from './pages/Blog.vue';
import Contact from './pages/Contact.vue';
import Team from './pages/Team.vue';
import Dashboard from './pages/Dashboard.vue';
import AdminBlogs from './pages/AdminBlogs.vue';


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
        path: "/about/team",
        component: Team,
        name: "Team",
        beforeEnter: ifNotAuthenticated
    },
    {
        path: "/dashboard",
        component: Dashboard,
        name: "Dashboard",
        beforeEnter: ifAuthenticated
    },
    {
        path: "/admin/blogs",
        component: AdminBlogs,
        name: "AdminBlogs",
        beforeEnter: ifAuthenticated
    },
    
    {
        path: "/contact",
        component: Contact,
        name: "Contact",
        beforeEnter: ifNotAuthenticated
    },
    {
        path: "/blog",
        component: Blog,
        name: "Blog",
        beforeEnter: ifNotAuthenticated
    },
    {
        path: "/login",
        component: Login,
        name: "Login",
        beforeEnter: ifNotAuthenticated
    },
    {
        path: '/community/teachers',
        name: 'CommunityTeachers',
        component: CommunityTeachers,
      },
      {
        path: '/community/learners',
        name: 'CommunityLearners',
        component: CommunityLearners,
      },
      {
        path: '/community/parents',
        name: 'CommunityParents',
        component: CommunityParents,
      },

];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
