<template>
    <div class="p-4 md:p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl md:text-3xl font-bold text-[#201444]">
                All Tours
            </h1>
           
        </div>

        <v-data-table
            show-headers
            light
            :headers="headers"
            :items="tours"
            :items-length="totalItems"
            :server-items-length="totalItems"
            :items-per-page="itemsPerPage"
            :page.sync="page"
            :items-per-page-options="[10, 20, 50, 100]"
            :footer-props="{
                showFirstLastPage: true,
                firstIcon: 'mdi-page-first',
                lastIcon: 'mdi-page-last',
            }"
            :loading="loading"
            mobile-breakpoint="960"
            density="comfortable"
            class="elevation-1"
            @update:items-per-page="updateItemsPerPage"
        >
            <template v-slot:item.image="{ item }">
                <img
                    :src="item.image || '/images/default-tour.jpg'"
                    class="w-16 h-10 object-cover rounded"
                    :alt="item.title"
                />
            </template>

            <template v-slot:item.is_featured="{ item }">
                <v-icon :color="item.is_featured ? 'green' : 'grey'">
                    {{ item.is_featured ? "mdi-star" : "mdi-star-outline" }}
                </v-icon>
            </template>

            <template v-slot:item.price="{ item }">
                {{ item.price.toLocaleString() }}
            </template>

            <template v-slot:item.actions="{ item }">
                <div class="flex space-x-2">
                    <router-link
                        :to="`/tours/${item.id}/edit`"
                        class="text-blue-500 hover:text-blue-700"
                    >
                        <v-icon small>mdi-pencil</v-icon>
                    </router-link>
                    <button
                        @click="deleteTour(item.id)"
                        class="text-red-500 hover:text-red-700"
                    >
                        <v-icon small>mdi-delete</v-icon>
                    </button>
                </div>
            </template>

            <!-- Custom header template to ensure visibility -->
            <template v-slot:header="{ props: { headers } }">
                <thead>
                    <tr>
                        <th
                            v-for="header in headers"
                            :key="header.value"
                            class="text-left"
                        >
                            {{ header.text }}
                        </th>
                    </tr>
                </thead>
            </template>
        </v-data-table>
    </div>
</template>

<script setup>
import { ref, onMounted, watch } from "vue";
import axios from "axios";

const headers = ref([
    { text: "Image", key: "image", sortable: false },
    { text: "Title", key: "title", sortable: true },
    { text: "Country", key: "country", sortable: true },
    { text: "Region", key: "region", sortable: true },
    { text: "Duration", key: "duration", sortable: true },
    { text: "Price", key: "price", sortable: true },
    { text: "Featured", key: "is_featured", sortable: true },
    { text: "Actions", key: "actions", sortable: false },
]);

const tours = ref([]);
const page = ref(1);
const itemsPerPage = ref(10);
const totalItems = ref(0);
const loading = ref(false);

const fetchTours = async () => {
    loading.value = true;
    try {
        const { data } = await axios.get("/api/tours", {
            params: {
                page: page.value,
                per_page: itemsPerPage.value,
            },
        });
        tours.value = data.data;
        totalItems.value = data.total;
    } catch (error) {
        console.error("Failed to fetch tours:", error);
    } finally {
        loading.value = false;
    }
};

const updateItemsPerPage = (value) => {
    itemsPerPage.value = value;
    fetchTours();
};

const deleteTour = async (id) => {
    if (!confirm("Are you sure you want to delete this tour?")) return;

    try {
        await axios.delete(`/api/tours/${id}`);
        fetchTours();
    } catch (error) {
        console.error("Failed to delete tour:", error);
    }
};

onMounted(fetchTours);

watch([page, itemsPerPage], () => {
    fetchTours();
});
</script>

<style scoped>
/* Force table headers to be visible */
::v-deep .v-data-table-header {
    visibility: visible !important;
    opacity: 1 !important;
    display: table-header-group !important;
}

::v-deep .v-data-table-header th {
    background-color: #f5f5f5 !important;
    color: #201444 !important;
    font-weight: 600 !important;
    padding: 12px 16px !important;
}

.v-data-table {
    background-color: #fff;
    border-radius: 12px;
    overflow: hidden;
}

/* Mobile responsiveness */
@media (max-width: 960px) {
    .v-data-table {
        font-size: 0.875rem;
    }

    ::v-deep .v-data-table-header th {
        padding: 8px 12px !important;
    }
}
</style>
