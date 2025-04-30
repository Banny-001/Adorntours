<template>
    <v-container class="py-12">
      <div class="text-center mb-10">
        <h1 class="text-4xl font-bold text-gray-900">Teacher Resources</h1>
        <p class="text-lg text-gray-600 mt-2">
          Everything you need to plan and promote your educational tour
        </p>
      </div>
  
      <v-row>
        <v-col
          v-for="(resource, i) in paginatedResources"
          :key="resource.id"
          cols="12"
          sm="6"
          md="4"
        >
          <v-card class="rounded-xl shadow-md hover:shadow-lg transition-shadow h-full">
            <v-card-title class="text-purple-700 font-semibold">
              <v-icon color="purple" class="mr-2">{{ resource.icon }}</v-icon>
              {{ resource.title }}
            </v-card-title>
  
            <v-card-text class="text-gray-700">
              {{ resource.description }}
            </v-card-text>
  
            <v-card-actions>
              <v-btn
                color="purple"
                variant="flat"
                class="ml-auto"
                @click="downloadResource(resource.id)"
              >
                Download
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-col>
      </v-row>
  
      <v-pagination
        v-model="currentPage"
        :length="pageCount"
        class="my-8"
        color="purple"
      ></v-pagination>
  
      <div class="text-center mt-6">
        <v-btn
          color="primary"
          class="px-8 py-3 text-lg font-semibold rounded-lg"
          @click="downloadKit"
        >
          📦 Download Full Resource Kit
        </v-btn>
      </div>
    </v-container>
  </template>
  
  <script setup>
  import { ref, computed, onMounted } from 'vue'
  import axios from 'axios'
  
  const resources = ref([])
  const currentPage = ref(1)
  const itemsPerPage = 6
  
  const paginatedResources = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage
    return resources.value.slice(start, start + itemsPerPage)
  })
  
  const pageCount = computed(() =>
    Math.ceil(resources.value.length / itemsPerPage)
  )
  
  onMounted(async () => {
    try {
      const response = await axios.get('/api/resources')
  
      // Adjust depending on your backend response
      if (Array.isArray(response.data)) {
        resources.value = response.data
      } else if (Array.isArray(response.data.data)) {
        resources.value = response.data.data
      } else {
        console.error('Unexpected API format:', response.data)
      }
    } catch (error) {
      console.error('Failed to fetch resources:', error)
    }
  })
  
  const downloadResource = async (resourceId) => {
    try {
      const response = await axios.get(`/api/resources/${resourceId}/download`, {
        responseType: 'blob',
      })
      const blob = new Blob([response.data])
      const url = window.URL.createObjectURL(blob)
      const a = document.createElement('a')
      a.href = url
      a.download = `resource-${resourceId}.pdf` // Adjust name as needed
      document.body.appendChild(a)
      a.click()
      document.body.removeChild(a)
      window.URL.revokeObjectURL(url)
    } catch (error) {
      console.error('Error downloading resource:', error)
    }
  }
  
  const downloadKit = () => {
    downloadResource('resource-kit') // Assuming `resource-kit` is your ID
  }
  </script>
  
  <style scoped>
  .text-gray-700 {
    color: #4b5563;
  }
  </style>
  