<template>
    <div class="relative h-[90vh] w-full overflow-hidden rounded-none md:rounded-xl shadow-lg">
      <!-- Slides -->
      <transition-group name="fade" tag="div">
        <img
          v-for="(slide, index) in slides"
          v-show="current === index"
          :key="slide"
          :src="slide"
          class="absolute inset-0 w-full h-full object-cover brightness-75 transition-opacity duration-1000"
        />
      </transition-group>
  
      <!-- Overlay -->
      <!-- <div class="absolute inset-0 z-10 bg-gradient-to-b from-black/50 to-black/30 flex items-center justify-center text-center text-white px-6">
        <div class="max-w-3xl">
          <h1 class="text-4xl md:text-6xl font-bold tracking-tight mb-4 animate-fadein drop-shadow-lg">
            Explore the World. Learn for Life.
          </h1>
          <p class="text-lg md:text-xl text-gray-100 animate-fadein delay-200">
            Discover destinations that educate, inspire, and connect. Tailored educational tours across the globe.
          </p>
          <router-link
            to="/tours"
            class="mt-8 inline-block bg-[#201444] hover:bg-[#3700B3] text-white font-medium px-6 py-3 rounded-full shadow-md transition animate-fadein delay-400"
          >
            Browse Tours
          </router-link>
        </div>
      </div> -->
  
      <!-- Dots Navigation (Optional) -->
      <div class="absolute bottom-5 left-1/2 transform -translate-x-1/2 z-20 flex space-x-2">
        <span
          v-for="(dot, i) in slides"
          :key="i"
          class="w-3 h-3 rounded-full"
          :class="current === i ? 'bg-white' : 'bg-white/40'"
        ></span>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue'
  
  const slides = [
    '/images/hero1.jpg',
    '/images/hero2.jpg',
    '/images/hero3.jpg',
  ]
  
  const current = ref(0)
  
  onMounted(() => {
    setInterval(() => {
      current.value = (current.value + 1) % slides.length
    }, 6000)
  })
  </script>
  
  <style scoped>
  .fade-enter-active,
  .fade-leave-active {
    transition: opacity 1s ease-in-out;
  }
  .fade-enter-from,
  .fade-leave-to {
    opacity: 0;
  }
  
  .animate-fadein {
    animation: fadein 1.2s ease forwards;
    opacity: 0;
  }
  .delay-200 {
    animation-delay: 0.2s;
  }
  .delay-400 {
    animation-delay: 0.4s;
  }
  
  @keyframes fadein {
    to {
      opacity: 1;
      transform: translateY(0);
    }
    from {
      opacity: 0;
      transform: translateY(20px);
    }
  }
  </style>
  