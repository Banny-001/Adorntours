<template>
    <div class="pt-[120px] px-6 md:px-16 bg-white text-[#201444] font-[Poppins] min-h-screen">
      <!-- 🧑‍🤝‍🧑 Hero -->
      <section class="text-center py-20 max-w-4xl mx-auto">
        <h1 class="text-5xl font-extrabold mb-4">Meet the Team</h1>
        <p class="text-lg text-gray-600">
          Behind every unforgettable tour is a team of passionate individuals committed to education, exploration, and experience.
        </p>
      </section>
  
      <!-- 👥 Team Members -->
      <section class="max-w-5xl mx-auto pb-32">
        <div class="grid md:grid-cols-2 gap-12 text-center">
          <!-- Mr. X -->
          <div class="space-y-4">
            <v-avatar size="140" class="mx-auto">
              <v-img
                src="https://ui-avatars.com/api/?name=Mr+X&background=8b5cf6&color=fff&rounded=true&size=140"
                alt="Mr X"
              />
            </v-avatar>
            <h3 class="text-2xl font-bold">Mr X</h3>
            <p class="text-gray-600">Director of Educational Programs</p>
            <p class="text-sm text-gray-500">
              With a background in curriculum development and international travel leadership, Mr X ensures every tour delivers educational impact.
            </p>
          </div>
  
          <!-- Miss Y -->
          <div class="space-y-4">
            <v-avatar size="140" class="mx-auto">
              <v-img
                src="https://ui-avatars.com/api/?name=Miss+Y&background=ec4899&color=fff&rounded=true&size=140"
                alt="Miss Y"
              />
            </v-avatar>
            <h3 class="text-2xl font-bold">Miss Y</h3>
            <p class="text-gray-600">Global Tour Coordinator</p>
            <p class="text-sm text-gray-500">
              Miss Y specializes in logistics, safety, and cultural integration—she’s the reason your trips run smoothly and memorably.
            </p>
          </div>
        </div>
      </section>
    </div>
  </template>
  
  <script setup>
  // purely presentational
  </script>
  