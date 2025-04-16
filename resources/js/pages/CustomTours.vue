<template>
    <div class="p-4 md:p-6">
        <h1 class="text-2xl md:text-3xl font-bold text-[#201444] mb-6">
            All Custom Tour Requests
        </h1>

        <div v-if="loading" class="text-center my-4">Loading...</div>

        <!-- Debug info (remove in production) -->
        <div
            v-if="customTours.length === 0 && !loading"
            class="text-center my-4 text-red-500"
        >
            No data available. Check console for details.
        </div>

        <v-data-table
            :headers="headers"
            :items="customTours"
            :items-per-page="itemsPerPage"
            :page="page"
            :items-per-page-options="[5, 10, 20, 50]"
            @update:options="updateOptions"
            :loading="loading"
            class="elevation-1"
        >
            <template v-slot:item.start_date="{ item }">
                {{ formatDate(item.start_date) }}
            </template>
        </v-data-table>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const headers = [
    { title: "Full Name", key: "full_name" },
    { title: "Email", key: "email" },
    { title: "Phone", key: "phone" },
    { title: "Group Size", key: "group_size" },
    { title: "Destinations", key: "destinations" },
    { title: "Start Date", key: "start_date" },
    { title: "Duration (days)", key: "duration" },
    { title: "Interests", key: "interests" },
    { title: "Additional Info", key: "additional_info" },
];

const customTours = ref([]);
const page = ref(1);
const itemsPerPage = ref(10);
const totalItems = ref(0);
const loading = ref(false);

const formatDate = (dateStr) => {
    if (!dateStr) return "";
    const date = new Date(dateStr);
    if (isNaN(date)) return dateStr;
    return date.toLocaleDateString("en-US", {
        year: "numeric",
        month: "short",
        day: "numeric",
    });
};

const updateOptions = (options) => {
    page.value = options.page;
    itemsPerPage.value = options.itemsPerPage;
    fetchTours();
};

const fetchTours = async () => {
    loading.value = true;
    try {
        const response = await axios.get("/api/custom-tours", {
            params: {
                page: page.value,
                per_page: itemsPerPage.value,
            },
        });

        // Debug: Log the raw response
        console.log("API Response:", response);

        // Check data structure and assign appropriately
        if (response.data && response.data.data) {
            customTours.value = response.data.data;
            totalItems.value = response.data.total || response.data.data.length;

            // Debug: Log the processed data
            console.log("Processed data:", customTours.value);
        } else {
            console.error("Unexpected API response structure:", response.data);
            // Attempt to handle different response formats
            if (Array.isArray(response.data)) {
                customTours.value = response.data;
                totalItems.value = response.data.length;
            }
        }

        // Debug: Log if we have data but it's empty
        if (customTours.value.length === 0) {
            console.log("No data items returned from API");
        }
    } catch (error) {
        console.error("Failed to fetch custom tours:", error);
    } finally {
        loading.value = false;
    }
};

onMounted(() => {
    fetchTours();
});
</script>

<style scoped>
.v-data-table {
    background-color: #fff;
    border-radius: 12px;
    overflow: hidden;
    width: 100%;
}

@media (max-width: 960px) {
    .v-data-table {
        font-size: 0.875rem;
    }
}
</style>
