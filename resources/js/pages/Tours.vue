<!-- Tours.vue -->
<template>
    <div class="relative text-gray-800 font-[Poppins]">
      <!-- Hero -->
      <section class="relative h-[60vh] md:h-[70vh] overflow-hidden">
        <img
          src="/images/tours-hero.jpg"
          class="absolute inset-0 w-full h-full object-cover z-0"
          alt="Educational Travel"
        />
        <div class="absolute inset-0 bg-[#201444]/70 z-10 flex items-center justify-center text-white text-center px-6">
          <div class="max-w-3xl space-y-4">
            <h1 class="text-4xl md:text-6xl font-bold drop-shadow">Explore Our Educational Tours</h1>
            <p class="text-lg md:text-xl text-white/90">Meaningful journeys that combine cultural exploration and real-world learning.</p>
          </div>
        </div>
      </section>
    <!-- Tours List -->
    <section class="section-spacing bg-transparent">
      <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-[#201444] mb-16">All Tours</h2>
        <div class="grid md:grid-cols-3 gap-12">
          <div
            v-for="tour in tours"
            :key="tour.id"
            class="rounded-2xl overflow-hidden shadow-xl hover:shadow-purple-300 transition-transform hover:-translate-y-1 bg-white/90 backdrop-blur-md animate-fadeup"
          >
            <img :src="tour.image_url" alt="" class="h-48 w-full object-cover" />
            <div class="p-6 space-y-2">
              <h3 class="text-xl font-semibold text-[#201444]">{{ tour.title }}</h3>
              <p class="text-sm text-gray-600">{{ tour.description }}</p>
              <p class="text-sm text-gray-600 italic">Region: {{ tour.region }}</p>
              <router-link
                :to="`/tours/${tour.slug}`"
                class="inline-block mt-4 bg-[#201444] text-white text-sm px-4 py-2 rounded-full hover:bg-[#3700B3] transition"
              >
                View Details
              </router-link>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const tours = ref([])

onMounted(async () => {
  try {
    const response = await axios.get('/api/tours')
    tours.value = response.data
  } catch (error) {
    console.error('Failed to load tours:', error)
  }
})
</script>
  