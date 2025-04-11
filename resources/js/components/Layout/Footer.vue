<template>
  <footer class="bg-gradient-to-b from-[#1a0d36] to-[#0d061f] text-white pt-16 pb-8 border-t border-white/10">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
      <!-- Main Footer Content -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
        <!-- Brand + Description -->
        <div class="space-y-4">
          <div class="flex items-center gap-3">
            <img 
              :src=adorn
              alt="ACIS Logo" 
              class="w-10 h-10 object-contain animate-spin-slow"
            >
            <h2 class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-cyan-400">
              Adorn Tours
            </h2>
          </div>
          <p class="text-sm leading-relaxed text-gray-400">
            Where learning meets adventure. We offer curated educational travel experiences for students, teachers, and families to explore the world together.
          </p>
          <div class="flex gap-4 pt-2">
            <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
              <v-icon size="20">mdi-facebook</v-icon>
            </a>
            <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
              <v-icon size="20">mdi-twitter</v-icon>
            </a>
            <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
              <v-icon size="20">mdi-instagram</v-icon>
            </a>
            <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
              <v-icon size="20">mdi-linkedin</v-icon>
            </a>
          </div>
        </div>

        <!-- Quick Links -->
        <div>
          <h3 class="text-lg font-semibold mb-5 text-white/90 relative pb-2 after:absolute after:bottom-0 after:left-0 after:w-10 after:h-0.5 after:bg-gradient-to-r after:from-purple-500 after:to-cyan-500">
            Quick Links
          </h3>
          <ul class="space-y-3">
            <li>
              <router-link 
                to="/" 
                class="text-gray-400 hover:text-white transition-colors duration-300 flex items-center group"
              >
                <v-icon size="16" class="mr-2 opacity-0 group-hover:opacity-100 transition-opacity">mdi-chevron-right</v-icon>
                Home
              </router-link>
            </li>
            <li>
              <router-link 
                to="/tours" 
                class="text-gray-400 hover:text-white transition-colors duration-300 flex items-center group"
              >
                <v-icon size="16" class="mr-2 opacity-0 group-hover:opacity-100 transition-opacity">mdi-chevron-right</v-icon>
                Tours
              </router-link>
            </li>
            <li>
              <router-link 
                to="/blog" 
                class="text-gray-400 hover:text-white transition-colors duration-300 flex items-center group"
              >
                <v-icon size="16" class="mr-2 opacity-0 group-hover:opacity-100 transition-opacity">mdi-chevron-right</v-icon>
                Blog
              </router-link>
            </li>
            <li>
              <router-link 
                to="/about" 
                class="text-gray-400 hover:text-white transition-colors duration-300 flex items-center group"
              >
                <v-icon size="16" class="mr-2 opacity-0 group-hover:opacity-100 transition-opacity">mdi-chevron-right</v-icon>
                About Us
              </router-link>
            </li>
            <li>
              <router-link 
                to="/contact" 
                class="text-gray-400 hover:text-white transition-colors duration-300 flex items-center group"
              >
                <v-icon size="16" class="mr-2 opacity-0 group-hover:opacity-100 transition-opacity">mdi-chevron-right</v-icon>
                Contact
              </router-link>
            </li>
          </ul>
        </div>

        <!-- Community -->
        <div>
          <h3 class="text-lg font-semibold mb-5 text-white/90 relative pb-2 after:absolute after:bottom-0 after:left-0 after:w-10 after:h-0.5 after:bg-gradient-to-r after:from-purple-500 after:to-cyan-500">
            Community
          </h3>
          <ul class="space-y-3">
            <li>
              <router-link 
                to="/community/teachers" 
                class="text-gray-400 hover:text-white transition-colors duration-300 flex items-center group"
              >
                <v-icon size="16" class="mr-2 opacity-0 group-hover:opacity-100 transition-opacity">mdi-account-tie</v-icon>
                For Teachers
              </router-link>
            </li>
            <li>
              <router-link 
                to="/community/learners" 
                class="text-gray-400 hover:text-white transition-colors duration-300 flex items-center group"
              >
                <v-icon size="16" class="mr-2 opacity-0 group-hover:opacity-100 transition-opacity">mdi-school</v-icon>
                For Learners
              </router-link>
            </li>
            <li>
              <router-link 
                to="/community/parents" 
                class="text-gray-400 hover:text-white transition-colors duration-300 flex items-center group"
              >
                <v-icon size="16" class="mr-2 opacity-0 group-hover:opacity-100 transition-opacity">mdi-account-group</v-icon>
                For Parents
              </router-link>
            </li>
          </ul>
        </div>

        <!-- Contact Info -->
        <div>
          <h3 class="text-lg font-semibold mb-5 text-white/90 relative pb-2 after:absolute after:bottom-0 after:left-0 after:w-10 after:h-0.5 after:bg-gradient-to-r after:from-purple-500 after:to-cyan-500">
            Contact Us
          </h3>
          <div class="space-y-4">
            <div class="flex items-start">
              <v-icon size="18" class="mt-0.5 mr-3 text-purple-400">mdi-email</v-icon>
              <div>
                <p class="text-sm text-gray-400">Email us at</p>
                <a href="mailto:info@adorn.com" class="text-white hover:text-purple-300 transition-colors">info@adorn.com</a>
              </div>
            </div>
            <div class="flex items-start">
              <v-icon size="18" class="mt-0.5 mr-3 text-purple-400">mdi-phone</v-icon>
              <div>
                <p class="text-sm text-gray-400">Call us</p>
                <a href="tel:+254700000000" class="text-white hover:text-purple-300 transition-colors">+254 700 000 000</a>
              </div>
            </div>
            <div class="flex items-start">
              <v-icon size="18" class="mt-0.5 mr-3 text-purple-400">mdi-map-marker</v-icon>
              <div>
                <p class="text-sm text-gray-400">Visit us</p>
                <p class="text-white">Nairobi, Kenya</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Copyright + Bottom Links -->
      <div class="border-t border-white/10 pt-6 flex flex-col md:flex-row justify-between items-center">
        <div class="text-sm text-gray-500 mb-4 md:mb-0">
          &copy; {{ new Date().getFullYear() }} Adorn. All rights reserved.
        </div>
        <div class="flex gap-6 text-sm">
          <router-link to="/privacy" class="text-gray-500 hover:text-white transition-colors">Privacy Policy</router-link>
          <router-link to="/terms" class="text-gray-500 hover:text-white transition-colors">Terms of Service</router-link>
          <router-link to="/cookies" class="text-gray-500 hover:text-white transition-colors">Cookie Policy</router-link>
        </div>
      </div>
    </div>
  </footer>
</template>

<script setup>
import adorn from "@/images/adorn.png";

</script>

<style scoped>
.animate-spin-slow {
  animation: spin 15s linear infinite;
}

@keyframes spin {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}
</style>