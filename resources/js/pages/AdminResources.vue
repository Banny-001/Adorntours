<template>
    <div class="p-4 md:p-6 bg-[#f9f9fb] min-h-screen">
      <v-card class="rounded-2xl mb-6 bg-[#f7f4fb]" flat elevation="2">
        <v-card-text class="d-flex justify-space-between align-center py-6 px-4">
          <h1 class="text-3xl font-bold text-[#201444] tracking-wide">
            📚 All Resources
          </h1>
          <v-btn
            color="primary"
            class="text-white"
            to="/admin/resources/create"
          >
            Upload New Resource
          </v-btn>
        </v-card-text>
      </v-card>
  
      <v-card flat elevation="2" class="rounded-2xl overflow-hidden">
        <v-data-table
          :headers="headers"
          :items="resources"
          :items-length="totalItems"
          :server-items-length="totalItems"
          :items-per-page="itemsPerPage"
          :page.sync="page"
          :loading="loading"
          density="comfortable"
          class="elevation-1"
          @update:items-per-page="updateItemsPerPage"
        >
          <!-- Custom Header Styling -->
          <template v-slot:column.title="{ column }">
            <span class="font-semibold text-[#6a4c93]">{{ column.title }}</span>
          </template>
          <template v-slot:column.description="{ column }">
            <span class="font-semibold text-[#6a4c93]">{{ column.title }}</span>
          </template>
          <template v-slot:column.actions="{ column }">
            <span class="font-semibold text-[#6a4c93]">{{ column.title }}</span>
          </template>
  
          <!-- Description Column -->
          <template v-slot:item.description="{ item }">
            <span class="text-gray-700 truncate block max-w-xs">
              {{ item.description || '—' }}
            </span>
          </template>
          <template v-slot:item.created_at="{ item }">
            <span>{{ formatDate12Hour(item.created_at) }}</span>
          </template>
          <template v-slot:item.updated_at="{ item }">
            <span>{{ formatDate12Hour(item.updated_at) }}</span>
          </template>
  
          <!-- Actions Column -->
          <template v-slot:item.actions="{ item }">
            <div class="flex space-x-2">
              <v-btn icon @click="downloadResource(item.id)">
                <v-icon>mdi-download</v-icon>
              </v-btn>
              <v-btn icon @click="handleArchive(item.id)">
                <v-icon class="text-red-600">mdi-archive</v-icon>
              </v-btn>
            </div>
          </template>
        </v-data-table>
      </v-card>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted, watch } from 'vue'
  import axios from 'axios'
  import dayjs from 'dayjs'


  
  const headers = ref([
    { title: 'Title', value: 'title', sortable: true },
    { title: 'Description', value: 'description', sortable: false },
    {title:"Created At",value:'created_at',sortable:false},
    {title:"Updated At",value:'updated_at',sortable:false},
    { title: 'Actions', value: 'actions', sortable: false },
   
  ])
  const formatDate12Hour = (dateStr) => {
  return dayjs(dateStr).format('MMM D, YYYY hh:mm A')
}
  const resources = ref([])
  const page = ref(1)
  const itemsPerPage = ref(10)
  const totalItems = ref(0)
  const loading = ref(false)
  
  const fetchResources = async () => {
    loading.value = true
    try {
      const { data } = await axios.get('/api/resources', {
        params: {
          page: page.value,
          per_page: itemsPerPage.value,
        },
      })
      resources.value = data.data
      totalItems.value = data.total
    } catch (error) {
      console.error('Failed to fetch resources:', error)
    } finally {
      loading.value = false
    }
  }
  
  const downloadResource = (resourceId) => {
    axios
      .get(`/api/resources/${resourceId}/download`, { responseType: 'blob' })
      .then((response) => {
        const url = window.URL.createObjectURL(new Blob([response.data]))
        const a = document.createElement('a')
        a.href = url
        a.download = 'Resource.pdf' // Set dynamic filename if needed
        a.click()
      })
      .catch((error) => {
        console.error('Error downloading resource:', error)
      })
  }
  
  const handleArchive = async (id) => {
    const confirmed = window.confirm('Are you sure you want to archive this resource?')
    if (!confirmed) return
  
    try {
      await axios.put(`/api/resources/${id}/archive`)
      alert('Resource archived successfully!')
      fetchResources()
    } catch (error) {
      console.error('Error archiving resource:', error)
      alert('Something went wrong while archiving.')
    }
  }
  
  const updateItemsPerPage = (value) => {
    itemsPerPage.value = value
    fetchResources()
  }
  
  onMounted(fetchResources)
  
  watch([page, itemsPerPage], () => {
    fetchResources()
  })
  </script>
  
  <style scoped>
  .v-data-table {
    background-color: #ffffff;
    border-radius: 1rem;
    font-family: 'Inter', sans-serif;
  }
  
  ::v-deep .v-data-table-header th {
    background-color: #f6f1f1 !important;
    color: #201444 !important;
    font-weight: 600 !important;
    font-size: 0.95rem;
    padding: 14px 18px !important;
    border-bottom: 1px solid #ddd;
  }
  
  @media (max-width: 960px) {
    .v-data-table {
      font-size: 0.875rem;
    }
  
    ::v-deep .v-data-table-header th {
      padding: 10px 12px !important;
    }
  }
  </style>
  