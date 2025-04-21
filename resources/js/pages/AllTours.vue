<template>
    <div class="p-4 md:p-6 bg-[#f9f9fb] min-h-screen">
        <v-card class="rounded-2xl mb-6 bg-[#f7f4fb]" flat elevation="2">
            <v-card-text
                class="d-flex justify-space-between align-center py-6 px-4"
            >
                <h1 class="text-3xl font-bold text-[#201444] tracking-wide">
                    🌍 All Tours
                </h1>
                <v-btn
                    color="primary"
                    class="text-white"
                    to="/admin/tours/create"
                  
                >
                    Create New Tour
                </v-btn>
            </v-card-text>
        </v-card>

        <v-card flat elevation="2" class="rounded-2xl overflow-hidden">
            <v-data-table
                :headers="headers"
                :items="tours"
                :items-length="totalItems"
                :server-items-length="totalItems"
                :items-per-page="itemsPerPage"
                :page.sync="page"
                :items-per-page-options="[10, 20, 50, 100]"
                :loading="loading"
                class="elevation-1"
                density="comfortable"
                @update:items-per-page="updateItemsPerPage"
            >
                <!-- Customized Headers -->
                <template v-slot:column.image="{ column }">
                    <span class="font-semibold text-[#6a4c93]">{{
                        column.title
                    }}</span>
                </template>
                <template v-slot:column.title="{ column }">
                    <span class="font-semibold text-[#6a4c93]">{{
                        column.title
                    }}</span>
                </template>
                <template v-slot:column.country="{ column }">
                    <span class="font-semibold text-[#6a4c93]">{{
                        column.title
                    }}</span>
                </template>
                <template v-slot:column.region="{ column }">
                    <span class="font-semibold text-[#6a4c93]">{{
                        column.title
                    }}</span>
                </template>
                <template v-slot:column.duration="{ column }">
                    <span class="font-semibold text-[#6a4c93]">{{
                        column.title
                    }}</span>
                </template>
                <template v-slot:column.price="{ column }">
                    <span class="font-semibold text-[#6a4c93]">{{
                        column.title
                    }}</span>
                </template>
                <template v-slot:column.is_featured="{ column }">
                    <span class="font-semibold text-[#6a4c93]">{{
                        column.title
                    }}</span>
                </template>
                <template v-slot:column.actions="{ column }">
                    <span class="font-semibold text-[#6a4c93]">{{
                        column.title
                    }}</span>
                </template>

                <!-- Image column -->
                <template v-slot:item.image="{ item }">
                    <img
                        :src="item.image || '/images/default-tour.jpg'"
                        class="w-20 h-14 object-cover rounded shadow-sm"
                        :alt="item.title"
                    />
                </template>

                <!-- Featured icon -->
                <template v-slot:item.is_featured="{ item }">
                    <v-icon :color="item.is_featured ? 'green' : 'grey'">
                        {{ item.is_featured ? "mdi-star" : "mdi-star-outline" }}
                    </v-icon>
                </template>

                <!-- Price -->
                <template v-slot:item.price="{ item }">
                    <span class="text-[#201444] font-medium"
                        >Ksh {{ item.price.toLocaleString() }}</span
                    >
                </template>

                <!-- Actions -->
                <template v-slot:item.actions="{ item }">
                    <div class="flex space-x-2">
                        <router-link
                            :to="`/tours/${item.id}/edit`"
                            class="text-blue-600 hover:text-blue-800"
                        >
                            <v-icon small>mdi-pencil</v-icon>
                        </router-link>
                        <button
                            @click="handleArchive(item.id)"
                            class="text-red-600 hover:text-red-800"
                        >
                            <v-icon small class="text-red-600"
                                >mdi-archive</v-icon
                            >
                        </button>
                    </div>
                </template>
            </v-data-table>
        </v-card>
    </div>
</template>

<script setup>
import { ref, onMounted, watch } from "vue";
import axios from "axios";

const headers = ref([
    { title: "Image", value: "image", sortable: false },
    { title: "Title", value: "title", sortable: true },
    { title: "Country", value: "country", sortable: true },
    { title: "Region", value: "region", sortable: true },
    { title: "Duration", value: "duration", sortable: true },
    { title: "Price", value: "price", sortable: true },
    { title: "Featured", value: "is_featured", sortable: true },
    { title: "Actions", value: "actions", sortable: false },
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

const handleArchive = async (id) => {
    const confirmed = window.confirm(
        "Are you sure you want to archive this tour?"
    );
    if (!confirmed) return;

    try {
        await axios.put(`/api/tours/${id}/archive`);
        alert("Tour archived successfully!");
        fetchTours(); // re-fetch the list
    } catch (error) {
        console.error("Error archiving tour:", error);
        alert("Something went wrong while archiving.");
    }
};

onMounted(fetchTours);

watch([page, itemsPerPage], () => {
    fetchTours();
});
</script>

<style scoped>
.v-data-table {
    background-color: #ffffff;
    border-radius: 1rem;
    font-family: "Inter", sans-serif;
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
