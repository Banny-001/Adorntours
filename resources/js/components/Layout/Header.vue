<template>
    <header
        class="fixed top-0 left-0 w-full z-50 backdrop-filter backdrop-blur-lg bg-white/90 shadow-sm"
    >
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex items-center justify-between"
        >
            <!-- Logo with Spinning Globe Image -->
            <router-link
                to="/"
                class="flex items-center gap-2 group focus:outline-none"
            >
                <div class="relative w-10 h-10">
                    <img
                        :src="adorn"
                        alt="Adorn Tours Logo"
                        class="w-full h-full object-contain animate-spin-3d"
                    />
                </div>
                <span class="text-xl sm:text-2xl font-bold text-gray-900">
                    Adorn
                </span>
            </router-link>

            <!-- Desktop Menu -->
            <nav class="hidden md:flex items-center gap-6">
                <div
                    v-for="(item, index) in navItems"
                    :key="index"
                    class="relative"
                    @mouseenter="item.children ? (openDropdown = index) : null"
                    @mouseleave="openDropdown = null"
                >
                    <template v-if="item.children">
                        <button
                            class="flex items-center text-sm font-medium text-gray-800 hover:text-primary-600 transition py-2 px-1 group focus:outline-none"
                            aria-haspopup="true"
                            :aria-expanded="openDropdown === index"
                        >
                            {{ item.label }}
                            <svg
                                class="ml-1 w-4 h-4 transition-transform duration-300 group-hover:rotate-180"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"
                                />
                            </svg>
                        </button>
                    </template>
                    <router-link
                        v-else
                        :to="item.route"
                        class="text-sm font-medium text-gray-800 hover:text-primary-600 transition py-2 px-1 relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 hover:after:w-full after:bg-primary-600 after:transition-all after:duration-300 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 focus:rounded-md"
                        active-class="after:w-full"
                    >
                        {{ item.label }}
                    </router-link>

                    <!-- Dropdown with Animation -->
                    <transition
                        enter-active-class="transition duration-200 ease-out"
                        enter-from-class="opacity-0 translate-y-1"
                        enter-to-class="opacity-100 translate-y-0"
                        leave-active-class="transition duration-150 ease-in"
                        leave-from-class="opacity-100 translate-y-0"
                        leave-to-class="opacity-0 translate-y-1"
                    >
                        <div
                            v-if="item.children && openDropdown === index"
                            class="absolute left-1/2 transform -translate-x-1/2 top-full mt-1 w-48 bg-white rounded-lg shadow-lg border border-primary-100 overflow-hidden z-50"
                            role="menu"
                        >
                            <div class="py-1">
                                <router-link
                                    v-for="(child, cIdx) in item.children"
                                    :key="cIdx"
                                    :to="child.route"
                                    @click="openDropdown = null"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-primary-50 hover:to-indigo-50 hover:text-primary-600 transition-all duration-200 flex items-center focus:outline-none focus:bg-primary-50"
                                    role="menuitem"
                                >
                                    <span
                                        class="w-1.5 h-1.5 rounded-full bg-primary-400 mr-2 transition-opacity duration-200 group-hover:opacity-100 opacity-0"
                                    ></span>
                                    {{ child.label }}
                                </router-link>
                            </div>
                        </div>
                    </transition>
                </div>
            </nav>

            <!-- CTA Buttons -->
            <div class="hidden md:flex items-center gap-4">
                <router-link
                    to="/login"
                    class="text-sm font-medium text-gray-700 hover:text-primary-600 transition focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 rounded-md px-2 py-1"
                >
                    Login
                </router-link>
                <v-btn
                    color="primary"
                    class="rounded-full text-sm px-6 py-2 bg-gradient-to-r from-primary-600 to-indigo-600 hover:from-indigo-600 hover:to-primary-700 border-none shadow-md hover:shadow-lg transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2"
                >
                    Register
                </v-btn>
            </div>

            <!-- Mobile Toggle - Animated Hamburger -->
            <div class="md:hidden">
                <button
                    @click="drawer = !drawer"
                    class="focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 rounded-md p-1"
                    aria-label="Toggle menu"
                    :aria-expanded="drawer"
                >
                    <div class="w-6 h-5 flex flex-col justify-between relative">
                        <span
                            class="w-full h-0.5 bg-primary-600 rounded-lg transition-all duration-300"
                            :class="drawer ? 'rotate-45 translate-y-2' : ''"
                        ></span>
                        <span
                            class="w-full h-0.5 bg-primary-600 rounded-lg transition-all duration-300"
                            :class="drawer ? 'opacity-0' : 'opacity-100'"
                        ></span>
                        <span
                            class="w-full h-0.5 bg-primary-600 rounded-lg transition-all duration-300"
                            :class="drawer ? '-rotate-45 -translate-y-2' : ''"
                        ></span>
                    </div>
                </button>
            </div>
        </div>

        <!-- Mobile Drawer - Enhanced -->
        <transition
            enter-active-class="transition-all duration-300 ease-out"
            enter-from-class="opacity-0 -translate-x-full"
            enter-to-class="opacity-100 translate-x-0"
            leave-active-class="transition-all duration-200 ease-in"
            leave-from-class="opacity-100 translate-x-0"
            leave-to-class="opacity-0 -translate-x-full"
        >
            <div
                v-if="drawer"
                class="fixed inset-0 z-50 bg-black/30 backdrop-blur-sm md:hidden"
                @click="drawer = false"
            >
                <div
                    class="fixed inset-y-0 left-0 w-72 sm:w-80 bg-white shadow-xl"
                    @click.stop
                >
                    <div class="p-5 h-full flex flex-col">
                        <!-- Mobile Logo -->
                        <div class="flex items-center gap-2 mb-8">
                            <div class="relative w-8 h-8">
                                <img
                                    :src="adorn"
                                    alt="Adorn Tours Logo"
                                    class="w-full h-full object-contain animate-spin-3d"
                                />
                            </div>
                            <span
                                class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary-600 to-indigo-600"
                            >
                                Adorn Tours
                            </span>
                        </div>

                        <!-- Mobile Navigation -->
                        <div class="overflow-y-auto flex-1">
                            <nav class="space-y-1">
                                <!-- Regular Menu Items -->
                                <div
                                    v-for="(item, index) in navItems"
                                    :key="index"
                                    class="py-1"
                                >
                                    <template v-if="item.children">
                                        <button
                                            @click="toggleMobileSubmenu(index)"
                                            class="flex items-center justify-between w-full py-2 px-3 text-left text-gray-800 rounded-md hover:bg-primary-50 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2"
                                            :aria-expanded="
                                                mobileOpenSubmenu === index
                                            "
                                        >
                                            <span class="font-medium">{{
                                                item.label
                                            }}</span>
                                            <svg
                                                class="w-4 h-4 transition-transform duration-300"
                                                :class="
                                                    mobileOpenSubmenu === index
                                                        ? 'rotate-180'
                                                        : ''
                                                "
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M19 9l-7 7-7-7"
                                                />
                                            </svg>
                                        </button>

                                        <!-- Submenu Items with Animation -->
                                        <transition
                                            enter-active-class="transition-all duration-300 ease-out"
                                            enter-from-class="max-h-0 opacity-0"
                                            enter-to-class="max-h-60 opacity-100"
                                            leave-active-class="transition-all duration-200 ease-in"
                                            leave-from-class="max-h-60 opacity-100"
                                            leave-to-class="max-h-0 opacity-0"
                                        >
                                            <div
                                                v-if="
                                                    mobileOpenSubmenu === index
                                                "
                                                class="overflow-hidden ml-4 mt-1 border-l-2 border-primary-100 pl-2"
                                            >
                                                <router-link
                                                    v-for="(
                                                        child, i
                                                    ) in item.children"
                                                    :key="i"
                                                    :to="child.route"
                                                    class="block py-2 px-3 text-sm text-gray-600 hover:text-primary-600 transition-colors duration-200 rounded-md hover:bg-primary-50 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2"
                                                    @click="
                                                        drawer = false;
                                                        mobileOpenSubmenu =
                                                            null;
                                                    "
                                                >
                                                    {{ child.label }}
                                                </router-link>
                                            </div>
                                        </transition>
                                    </template>

                                    <router-link
                                        v-else
                                        :to="item.route"
                                        class="block py-2 px-3 font-medium text-gray-800 hover:text-primary-600 hover:bg-primary-50 rounded-md transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2"
                                        @click="drawer = false"
                                    >
                                        {{ item.label }}
                                    </router-link>
                                </div>
                            </nav>
                        </div>

                        <!-- Mobile CTA Buttons -->
                        <div
                            class="mt-6 space-y-3 pt-6 border-t border-gray-100"
                        >
                            <router-link
                                to="/login"
                                class="block w-full py-2.5 text-center font-medium text-primary-600 bg-primary-50 rounded-lg hover:bg-primary-100 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2"
                                @click="drawer = false"
                            >
                                Login
                            </router-link>
                            <router-link
                                to="/register"
                                class="block w-full py-2.5 text-center font-medium text-white bg-gradient-to-r from-primary-600 to-indigo-600 rounded-lg shadow hover:shadow-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2"
                                @click="drawer = false"
                            >
                                Register
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </header>

    <!-- Spacer to prevent content from hiding under fixed header -->
    <div class="h-16"></div>
</template>

<script setup>
import { ref } from "vue";
import adorn from "@/images/adorn.png";
const drawer = ref(false);
const openDropdown = ref(null);
const mobileOpenSubmenu = ref(null);

const toggleMobileSubmenu = (index) => {
    mobileOpenSubmenu.value = mobileOpenSubmenu.value === index ? null : index;
};

// Updated navigation items - Community is not a route
const navItems = [
    { label: "Home", route: "/" },
    { label: "Tours", route: "/tours" },
    {
        label: "Community",
        children: [
            { label: "For Teachers", route: "/community/teachers" },
            { label: "For Learners", route: "/community/learners" },
            { label: "For Parents", route: "/community/parents" },
        ],
    },
    { label: "Blog", route: "/blog" },
    {
        label: "About Us",
        children: [
            { label: "Our Team", route: "/about/team" },
            { label: "Contact", route: "/contact" },
        ],
    },
];
</script>

<style scoped>
/* 3D spin animation for globe */
@keyframes spin-3d {
    0% {
        transform: rotateY(0deg);
    }
    100% {
        transform: rotateY(360deg);
    }
}

.animate-spin-3d {
    animation: spin-3d 8s linear infinite;
    transform-style: preserve-3d;
}

/* Mobile drawer scrollbar styling */
::-webkit-scrollbar {
    width: 6px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: #c4b5fd;
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background: #a78bfa;
}
</style>
