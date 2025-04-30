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
import CreateBlog from './pages/CreateBlog.vue';
// import AdminBlogs from "@/views/admin/AdminBlogs.vue";

import CustomTours from "./pages/CustomTours.vue";
import Contacts from "./pages/Contacts.vue";
import AllTours from "./pages/AllTours.vue";
import CreateTour from "./pages/CreateTour.vue";
import EditTour from './pages/EditTour.vue';
import EditBlog from './pages/EditBlogs.vue';
import Register from './pages/register.vue';
import TeacherResources from './pages/teacherResources.vue';
import AdminResources from './pages/AdminResources.vue';
import CreateResource from './pages/CreateResource.vue';

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
        path: "/admin/tours/create",
        component: CreateTour,
        name: "CreateTour",
        beforeEnter: ifAuthenticated
    },
    {
        path: "/tours/:id/edit",
        component: EditTour,
        name: "EditTour",
        beforeEnter: ifAuthenticated
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
        path:"/admin/blogs/create",
        component:CreateBlog,
        name:'CreateBlog',
        beforeEnter: ifAuthenticated
    },
    {
        path: "/blogs/:id/edit",
        component: EditBlog,
        name: "EditBlog",
        beforeEnter: ifAuthenticated
    },
    {
        path:"/teacher-resource",
        component:TeacherResources,
        name:"TeacherResources",
        
    },
    {
        path:"/admin/resource/create",
        component:CreateResource,
        name:"CreateRosource",
        beforeEnter: ifAuthenticated
    },
    {
        path: "/admin/tours",
        component: AllTours,
        name: "AllTours",
        beforeEnter: ifAuthenticated
    },
    {
        path: "/admin/contacts",
        component: Contacts,
        name: "Contacts",
        beforeEnter: ifAuthenticated
    },
    {
        path: "/admin/custom-tours",
        component: CustomTours,
        name: "CustomTours",
        beforeEnter: ifAuthenticated
    },
    {
        path:"/admin/resources",
        component:AdminResources,
        name:"AdminResources",
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
        path: "/register",
        component: Register,
        name: "Register",
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
