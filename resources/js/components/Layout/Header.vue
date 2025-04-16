<template>
    <header
        class="fixed top-0 left-0 w-full z-50 bg-white bg-opacity-90 shadow-sm"
    >
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex items-center justify-between"
        >
            <!-- Logo with high-quality MP4 -->
            <router-link to="/" class="flex items-center focus:outline-none">
                <video
                    autoplay
                    loop
                    muted
                    playsinline
                    preload="auto"
                    width="100"
                    height="60"
                    class="w-[160px] h-[90px] object-contain"
                    aria-hidden="true"
                >
                    <source :src="adornVideo" type="video/webm" />
                </video>
            </router-link>

            <!-- Desktop Navigation -->
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
                            class="flex items-center text-sm font-medium text-gray-800 hover:text-purple-600 transition py-2 px-1 group focus:outline-none"
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
                                class="absolute left-1/2 transform -translate-x-1/2 top-full mt-1 w-48 bg-white rounded-lg shadow-lg border border-purple-100 overflow-hidden z-50"
                                role="menu"
                            >
                                <div class="py-1">
                                    <router-link
                                        v-for="(child, cIdx) in item.children"
                                        :key="cIdx"
                                        :to="child.route"
                                        @click="openDropdown = null"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-50 hover:text-purple-600 transition-all duration-200 flex items-center focus:outline-none"
                                        role="menuitem"
                                    >
                                        <span
                                            class="w-1.5 h-1.5 rounded-full bg-purple-400 mr-2"
                                        ></span>
                                        {{ child.label }}
                                    </router-link>
                                </div>
                            </div>
                        </transition>
                    </template>

                    <router-link
                        v-else
                        :to="item.route"
                        class="text-sm font-medium text-gray-800 hover:text-purple-600 transition py-2 px-1 relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 hover:after:w-full after:bg-purple-600 after:transition-all after:duration-300 focus:outline-none"
                        active-class="after:w-full"
                    >
                        {{ item.label }}
                    </router-link>
                </div>
            </nav>

            <!-- Desktop CTA Buttons -->
            <div class="hidden md:flex items-center gap-4">
                <router-link
                    to="/login"
                    class="text-sm font-medium text-gray-700 hover:text-purple-600 transition focus:outline-none"
                >
                    Login
                </router-link>
                <router-link
                    to="/register"
                    class="text-sm font-medium text-white bg-gradient-to-r from-purple-600 to-indigo-600 rounded-full px-6 py-2 shadow-md hover:shadow-lg transition-all duration-300 focus:outline-none"
                >
                    Register
                </router-link>
            </div>

            <!-- Mobile Menu Button - Purple and Always Visible -->
            <button
                @click="drawer = !drawer"
                class="md:hidden focus:outline-none p-1"
                :aria-expanded="drawer"
                aria-label="Toggle navigation menu"
            >
                <div class="w-6 h-5 flex flex-col justify-between relative">
                    <span
                        class="w-full h-0.5 bg-purple-600 rounded transition-all duration-300"
                        :class="drawer ? 'rotate-45 translate-y-2' : ''"
                    ></span>
                    <span
                        class="w-full h-0.5 bg-purple-600 rounded transition-all duration-300"
                        :class="drawer ? 'opacity-0' : 'opacity-100'"
                    ></span>
                    <span
                        class="w-full h-0.5 bg-purple-600 rounded transition-all duration-300"
                        :class="drawer ? '-rotate-45 -translate-y-2' : ''"
                    ></span>
                </div>
            </button>
        </div>

        <!-- Mobile Drawer -->
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
                class="fixed inset-0 z-50 bg-black/30 md:hidden"
                @click="drawer = false"
            >
                <div
                    class="fixed inset-y-0 left-0 w-72 sm:w-80 bg-white shadow-xl"
                    @click.stop
                >
                    <div class="p-5 h-full flex flex-col">
                        <!-- Mobile Logo -->
                        <div class="flex items-center mb-8">
                            <video
                                autoplay
                                loop
                                muted
                                playsinline
                                class="h-8 w-auto"
                                aria-hidden="true"
                            >
                                <source
                                    src="@/images/adorn.webm"
                                    type="video/webm"
                                />
                                <img
                                    src="@/images/adorn.png"
                                    alt="Adorn Logo"
                                    class="h-8 w-auto animate-spin"
                                />
                            </video>
                        </div>

                        <!-- Mobile Navigation -->
                        <div class="overflow-y-auto flex-1">
                            <nav class="space-y-1">
                                <div
                                    v-for="(item, index) in navItems"
                                    :key="index"
                                    class="py-1"
                                >
                                    <template v-if="item.children">
                                        <button
                                            @click="toggleMobileSubmenu(index)"
                                            class="flex items-center justify-between w-full py-2 px-3 text-left text-gray-800 rounded-md hover:bg-purple-50 transition-colors duration-200 focus:outline-none"
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
                                                class="overflow-hidden ml-4 mt-1 border-l-2 border-purple-100 pl-2"
                                            >
                                                <router-link
                                                    v-for="(
                                                        child, i
                                                    ) in item.children"
                                                    :key="i"
                                                    :to="child.route"
                                                    class="block py-2 px-3 text-sm text-gray-600 hover:text-purple-600 transition-colors duration-200 rounded-md hover:bg-purple-50 focus:outline-none"
                                                    @click="closeMobileMenu"
                                                >
                                                    {{ child.label }}
                                                </router-link>
                                            </div>
                                        </transition>
                                    </template>

                                    <router-link
                                        v-else
                                        :to="item.route"
                                        class="block py-2 px-3 font-medium text-gray-800 hover:text-purple-600 hover:bg-purple-50 rounded-md transition-colors duration-200 focus:outline-none"
                                        @click="closeMobileMenu"
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
                                class="block w-full py-2.5 text-center font-medium text-purple-600 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors duration-200 focus:outline-none"
                                @click="closeMobileMenu"
                            >
                                Login
                            </router-link>
                            <router-link
                                to="/register"
                                class="block w-full py-2.5 text-center font-medium text-white bg-gradient-to-r from-purple-600 to-indigo-600 rounded-lg shadow hover:shadow-md transition-all duration-200 focus:outline-none"
                                @click="closeMobileMenu"
                            >
                                Register
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </header>

    <!-- Spacer for fixed header -->
    <div class="h-16"></div>
</template>

<script setup>
import { ref } from "vue";
import adornVideo from "@/images/adorn.webm"
const drawer = ref(false);
const openDropdown = ref(null);
const mobileOpenSubmenu = ref(null);

const toggleMobileSubmenu = (index) => {
    mobileOpenSubmenu.value = mobileOpenSubmenu.value === index ? null : index;
};

const closeMobileMenu = () => {
    drawer.value = false;
    mobileOpenSubmenu.value = null;
};

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

<style>
@keyframes spin {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}
.animate-spin {
    animation: spin 8s linear infinite;
}

/* Video quality improvements */
video {
    image-rendering: crisp-edges;
    transform: translateZ(0); /* Force GPU acceleration */
    backface-visibility: hidden;
    object-fit: contain;
}

/* Mobile optimizations */
@media (max-width: 767px) {
    video {
        height: 8vw;
        min-height: 32px;
    }
}
</style>
