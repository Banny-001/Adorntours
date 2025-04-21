<template>
    <div class="p-4 md:p-6 bg-[#f9f9fb] min-h-screen">
        <!-- Header Card -->
        <v-card class="rounded-2xl mb-6 bg-[#f7f4fb]" flat elevation="2">
            <v-card-text
                class="d-flex justify-space-between align-center py-6 px-4"
            >
                <h1 class="text-3xl font-bold text-[#201444] tracking-wide">
                    Contact Messages
                </h1>
            </v-card-text>
       

        <div class="mb-4 flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center gap-6">
                <v-text-field
                    v-model="search"
                    label="Search contacts"
                    prepend-inner-icon="mdi-magnify"
                    density="compact"
                    hide-details
                    variant="outlined"
                    class="max-w-md"
                    @input="handleSearch"
                ></v-text-field>
                <v-btn
                    color="primary"
                    class="flex-end"
                    prepend-icon="mdi-refresh"
                    @click="fetchContacts"
                    :loading="loading"
                >
                    Refresh
                </v-btn>
            </div>
        </div>
    </v-card>

        <v-data-table
            :headers="headers"
            :items="contacts"
            :items-per-page="itemsPerPage"
            :page="page"
            :items-per-page-options="[10, 25, 50]"
            @update:options="updateOptions"
            :loading="loading"
            class="elevation-2 rounded"
            :search="search"
        >
            <!-- Date Column -->
            <template v-slot:item.created_at="{ item }">
                <div class="font-medium">{{ formatDate(item.created_at) }}</div>
                <div class="text-xs text-gray-500">
                    {{ formatTime(item.created_at) }}
                </div>
            </template>

            <!-- Message Column -->
            <template v-slot:item.message="{ item }">
                <div class="max-w-md truncate" :title="item.message">
                    {{ item.message }}
                </div>
            </template>

            <!-- Actions Column -->
            <template v-slot:item.actions="{ item }">
                <div class="flex gap-2">
                    <v-tooltip text="View Details">
                        <template v-slot:activator="{ props }">
                            <v-btn
                                density="compact"
                                icon
                                v-bind="props"
                                color="info"
                                @click="viewContact(item)"
                            >
                                <v-icon>mdi-eye</v-icon>
                            </v-btn>
                        </template>
                    </v-tooltip>

                    <v-tooltip text="Delete">
                        <template v-slot:activator="{ props }">
                            <v-btn
                                density="compact"
                                icon
                                v-bind="props"
                                color="error"
                                @click="confirmDelete(item)"
                            >
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </template>
                    </v-tooltip>
                </div>
            </template>

            <!-- No data state -->
            <template v-slot:no-data>
                <div class="text-center py-4">
                    <v-icon
                        size="large"
                        icon="mdi-email-off"
                        class="mb-2"
                    ></v-icon>
                    <p>No contact messages found</p>
                </div>
            </template>
        </v-data-table>

        <!-- Contact Details Dialog -->
        <v-dialog v-model="detailDialog" max-width="600">
            <v-card v-if="selectedContact">
                <v-card-title class="text-h5 bg-blue-50 py-4">
                    Contact Details
                </v-card-title>
                <v-card-text class="pt-4">
                    <v-list>
                        <v-list-item>
                            <template v-slot:prepend>
                                <v-icon
                                    icon="mdi-account"
                                    class="mr-2"
                                ></v-icon>
                            </template>
                            <v-list-item-title>{{
                                selectedContact.name
                            }}</v-list-item-title>
                            <v-list-item-subtitle>Name</v-list-item-subtitle>
                        </v-list-item>

                        <v-list-item>
                            <template v-slot:prepend>
                                <v-icon icon="mdi-email" class="mr-2"></v-icon>
                            </template>
                            <v-list-item-title>{{
                                selectedContact.email
                            }}</v-list-item-title>
                            <v-list-item-subtitle>Email</v-list-item-subtitle>
                        </v-list-item>

                        <v-list-item>
                            <template v-slot:prepend>
                                <v-icon
                                    icon="mdi-calendar"
                                    class="mr-2"
                                ></v-icon>
                            </template>
                            <v-list-item-title>{{
                                formatFullDate(selectedContact.created_at)
                            }}</v-list-item-title>
                            <v-list-item-subtitle
                                >Submitted on</v-list-item-subtitle
                            >
                        </v-list-item>
                    </v-list>

                    <div class="mt-4">
                        <div class="text-subtitle-1 font-medium mb-2">
                            Message:
                        </div>
                        <v-card class="bg-blue-50 pa-3" variant="outlined">
                            <p class="whitespace-pre-wrap">
                                {{ selectedContact.message }}
                            </p>
                        </v-card>
                    </div>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                        color="primary"
                        variant="text"
                        @click="detailDialog = false"
                    >
                        Close
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>

        <!-- Delete Confirmation Dialog -->
        <v-dialog v-model="deleteDialog" max-width="400">
            <v-card>
                <v-card-title class="text-h5 bg-red-50">
                    Confirm Deletion
                </v-card-title>
                <v-card-text class="pt-4">
                    Are you sure you want to delete this contact message from
                    <strong>{{ selectedContact?.name }}</strong
                    >? This action cannot be undone.
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                        color="grey-darken-1"
                        variant="text"
                        @click="deleteDialog = false"
                    >
                        Cancel
                    </v-btn>
                    <v-btn
                        color="error"
                        variant="text"
                        @click="deleteContact"
                        :loading="deleteLoading"
                    >
                        Delete
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const headers = [
    { title: "Name", key: "name", sortable: true },
    { title: "Email", key: "email", sortable: true },
    { title: "Message", key: "message" },
    { title: "Date", key: "created_at", sortable: true },
    { title: "Actions", key: "actions", sortable: false },
];

const contacts = ref([]);
const page = ref(1);
const itemsPerPage = ref(10);
const totalItems = ref(0);
const loading = ref(false);
const search = ref("");

// Dialog control
const detailDialog = ref(false);
const deleteDialog = ref(false);
const selectedContact = ref(null);
const deleteLoading = ref(false);

// Format date as "Apr 13, 2025"
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

// Format time as "10:30 AM"
const formatTime = (dateStr) => {
    if (!dateStr) return "";
    const date = new Date(dateStr);
    if (isNaN(date)) return "";
    return date.toLocaleTimeString("en-US", {
        hour: "numeric",
        minute: "2-digit",
        hour12: true,
    });
};

// Format full date with day of week
const formatFullDate = (dateStr) => {
    if (!dateStr) return "";
    const date = new Date(dateStr);
    if (isNaN(date)) return dateStr;
    return date.toLocaleDateString("en-US", {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
        hour: "numeric",
        minute: "2-digit",
        hour12: true,
    });
};

const updateOptions = (options) => {
    page.value = options.page;
    itemsPerPage.value = options.itemsPerPage;
    fetchContacts();
};

const handleSearch = () => {
    // Debounce search if needed
    fetchContacts();
};

const fetchContacts = async () => {
    loading.value = true;
    try {
        const { data } = await axios.get("/api/contact", {
            params: {
                page: page.value,
                per_page: itemsPerPage.value,
                search: search.value,
            },
        });

        contacts.value = data.data;
        totalItems.value = data.total || data.data.length;
    } catch (error) {
        console.error("Failed to fetch contacts:", error);
    } finally {
        loading.value = false;
    }
};

const viewContact = (contact) => {
    selectedContact.value = contact;
    detailDialog.value = true;
};

const confirmDelete = (contact) => {
    selectedContact.value = contact;
    deleteDialog.value = true;
};

const deleteContact = async () => {
    if (!selectedContact.value) return;

    deleteLoading.value = true;
    try {
        await axios.delete(`/api/contact/${selectedContact.value.id}`);

        // Remove from local array
        contacts.value = contacts.value.filter(
            (contact) => contact.id !== selectedContact.value.id
        );

        // Close dialogs
        deleteDialog.value = false;
        detailDialog.value = false;
    } catch (error) {
        console.error("Failed to delete contact:", error);
    } finally {
        deleteLoading.value = false;
    }
};

onMounted(() => {
    fetchContacts();
});
</script>

<style scoped>
.v-data-table {
    background-color: #fff;
    border-radius: 8px;
    overflow: hidden;
    width: 100%;
}

@media (max-width: 960px) {
    .v-data-table {
        font-size: 0.875rem;
    }
}
</style>
