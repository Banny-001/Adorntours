<template>
  <header class="fixed top-0 left-0 w-full z-50 bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 md:px-8 py-4 flex items-center justify-between">
      <!-- Logo -->
      <router-link
        to="/"
        class="text-2xl font-extrabold tracking-tight text-[#201444] hover:text-purple-700 transition"
      >
        Adorn Tours
      </router-link>

      <!-- Desktop Menu -->
      <nav class="hidden md:flex items-center gap-8">
        <div v-for="(item, index) in navItems" :key="index" class="relative group">
          <router-link
            :to="item.route"
            class="text-sm font-medium text-gray-800 hover:text-[#201444] transition"
          >
            {{ item.label }}
          </router-link>

          <!-- Dropdowns -->
          <div
            v-if="item.children"
            class="absolute top-full left-0 bg-white shadow-lg rounded-lg py-2 w-44 opacity-0 group-hover:opacity-100 pointer-events-none group-hover:pointer-events-auto transition duration-300"
          >
            <router-link
              v-for="(child, cIdx) in item.children"
              :key="cIdx"
              :to="child.route"
              class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-50 hover:text-[#201444] transition"
            >
              {{ child.label }}
            </router-link>
          </div>
        </div>
      </nav>

      <!-- CTA Buttons -->
      <div class="hidden md:flex items-center gap-4">
        <router-link
          to="/login"
          class="text-sm font-medium text-gray-700 hover:text-[#201444]"
        >
          Login
        </router-link>
        <v-btn
          color="primary"
          class="rounded-full text-sm px-6 py-2 text-white"
          variant="flat"
        >
          Register
        </v-btn>
      </div>

      <!-- Mobile Toggle -->
      <div class="md:hidden">
        <v-btn icon variant="text" @click="drawer = !drawer">
          <v-icon class="text-[#201444]">{{ drawer ? 'mdi-close' : 'mdi-menu' }}</v-icon>
        </v-btn>
      </div>
    </div>

    <!-- Mobile Drawer -->
    <v-navigation-drawer
      v-model="drawer"
      temporary
      location="right"
      class="md:hidden"
      width="260"
    >
      <v-list class="pt-4">
        <v-list-item
          v-for="(item, index) in navItems"
          :key="index"
          class="px-4"
        >
          <v-list-item-title class="text-sm font-medium">
            <router-link :to="item.route" @click="drawer = false">
              {{ item.label }}
            </router-link>
          </v-list-item-title>
          <div v-if="item.children" class="pl-4 mt-2 space-y-1">
            <router-link
              v-for="(child, i) in item.children"
              :key="i"
              :to="child.route"
              class="block text-xs text-gray-600 hover:text-[#201444] transition"
              @click="drawer = false"
            >
              • {{ child.label }}
            </router-link>
          </div>
        </v-list-item>

        <v-divider class="my-2" />

        <v-list-item class="px-4">
          <router-link to="/login" class="text-sm text-gray-800" @click="drawer = false">
            Login
          </router-link>
        </v-list-item>

        <v-list-item class="px-4">
          <v-btn color="primary" block @click="drawer = false" class="text-sm">
            Register
          </v-btn>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
  </header>
</template>

<script setup>
import { ref } from 'vue'

const drawer = ref(false)

const navItems = [
  { label: 'Home', route: '/' },
  { label: 'Tours', route: '/tours' },
  {
    label: 'Community',
    route: '/community',
    children: [
      { label: 'For Teachers', route: '/community/teachers' },
      { label: 'For Learners', route: '/community/learners' },
      { label: 'For Parents', route: '/community/parents' },
    ],
  },
  { label: 'Blog', route: '/blog' },
  {
    label: 'About Us',
    route: '/about',
    children: [
      { label: 'Our Team', route: '/about/team' },
      { label: 'Contact', route: '/contact' },
    ],
  },
]
</script>

<style scoped>
/* Optional: animate dropdowns even more smoothly */
.group:hover .group-hover\:pointer-events-auto {
  pointer-events: auto;
}
.group:hover .group-hover\:opacity-100 {
  opacity: 1;
}
</style>
