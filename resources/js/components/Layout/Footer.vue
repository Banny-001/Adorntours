<template>
  <footer class="bg-[#201444] text-white pt-12 pb-6">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8">
      <!-- Brand + Description -->
      <div>
        <h2 class="text-xl font-semibold mb-2 tracking-tight">ACIS Tours</h2>
        <p class="text-sm leading-relaxed text-gray-300">
          Where learning meets adventure. We offer curated educational travel experiences for students, teachers, and families to explore the world together.
        </p>
      </div>

      <!-- Quick Links -->
      <div>
        <h3 class="text-lg font-semibold mb-3">Quick Links</h3>
        <ul class="space-y-1 text-sm">
          <li><router-link to="/" class="hover:text-purple-300">Home</router-link></li>
          <li><router-link to="/tours" class="hover:text-purple-300">Tours</router-link></li>
          <li><router-link to="/blog" class="hover:text-purple-300">Blog</router-link></li>
          <li><router-link to="/about" class="hover:text-purple-300">About Us</router-link></li>
          <li><router-link to="/contact" class="hover:text-purple-300">Contact</router-link></li>
        </ul>
      </div>

      <!-- Community -->
      <div>
        <h3 class="text-lg font-semibold mb-3">Community</h3>
        <ul class="space-y-1 text-sm">
          <li><router-link to="/community/teachers" class="hover:text-purple-300">For Teachers</router-link></li>
          <li><router-link to="/community/learners" class="hover:text-purple-300">For Learners</router-link></li>
          <li><router-link to="/community/parents" class="hover:text-purple-300">For Parents</router-link></li>
        </ul>
      </div>

      <!-- Social & Contact -->
      <div>
        <h3 class="text-lg font-semibold mb-3">Stay Connected</h3>
        <div class="flex gap-4 text-lg mb-4">
          <a href="#" class="hover:text-purple-300">🌐</a>
          <a href="#" class="hover:text-purple-300">📘</a>
          <a href="#" class="hover:text-purple-300">📸</a>
          <a href="#" class="hover:text-purple-300">🐦</a>
        </div>
        <p class="text-sm text-gray-300">Email: info@acistours.com</p>
        <p class="text-sm text-gray-300">Phone: +254 700 000 000</p>
      </div>
    </div>

    <div class="text-center text-xs text-gray-400 mt-8">
      &copy; {{ new Date().getFullYear() }} ACIS Tours. All rights reserved.
    </div>
  </footer>
</template>
