<template>
    <div class="dashboard-content">
        <!-- Dashboard Header -->
        <div class="d-flex justify-space-between align-center mb-6">
            <div>
                <h1 class="text-h4 font-weight-bold">Dashboard Overview</h1>
                <p class="text-subtitle-1 text--secondary">
                    Welcome back, Admin
                </p>
            </div>
            <v-btn color="primary" @click="refreshData">
                <v-icon left>mdi-refresh</v-icon>
                Refresh
            </v-btn>
        </div>

        <!-- Key Metrics -->
        <v-row class="mb-6">
            <v-col
                cols="12"
                sm="6"
                md="3"
                v-for="(metric, index) in metrics"
                :key="index"
            >
                <v-card
                    elevation="2"
                    class="pa-4 rounded-lg h-100 hover:animate-pulse-subtle"
                >
                    <div class="d-flex justify-space-between align-center">
                        <div>
                            <div class="text-subtitle-2 text--secondary">
                                {{ metric.title }}
                            </div>
                            <div class="text-h4 font-weight-bold">
                                {{ metric.value }}
                            </div>
                            <v-chip
                                small
                                :color="metric.trend.color"
                                :text-color="metric.trend.textColor"
                                class="mt-1"
                            >
                                <v-icon small left>{{
                                    metric.trend.icon
                                }}</v-icon>
                                {{ metric.trend.value }}
                            </v-chip>
                        </div>
                        <v-avatar :color="metric.icon.bg" size="48">
                            <v-icon :color="metric.icon.color">{{
                                metric.icon.name
                            }}</v-icon>
                        </v-avatar>
                    </div>
                </v-card>
            </v-col>
        </v-row>

        <!-- Data Visualization -->
        <v-row class="mb-6">
            <v-col cols="12" md="8">
                <v-card elevation="2" class="pa-4 rounded-lg h-100">
                    <div class="d-flex justify-space-between align-center mb-4">
                        <h2 class="text-h6 font-weight-bold">
                            Monthly Bookings (Ksh)
                        </h2>
                        <v-btn text small color="primary">
                            View Report
                            <v-icon small right>mdi-arrow-right</v-icon>
                        </v-btn>
                    </div>
                    <div style="height: 300px">
                        <div
                            class="d-flex align-center justify-center grey lighten-4 rounded"
                            style="height: 100%"
                        >
                            <div class="text-center">
                                <v-icon color="grey" size="48"
                                    >mdi-chart-line</v-icon
                                >
                                <p class="text-caption grey--text mt-2">
                                    Booking trends visualization
                                </p>
                            </div>
                        </div>
                    </div>
                </v-card>
            </v-col>

            <v-col cols="12" md="4">
                <v-card elevation="2" class="pa-4 rounded-lg h-100">
                    <div class="d-flex justify-space-between align-center mb-4">
                        <h2 class="text-h6 font-weight-bold">
                            Tour Categories
                        </h2>
                        <v-btn text small color="primary">
                            View All
                            <v-icon small right>mdi-arrow-right</v-icon>
                        </v-btn>
                    </div>
                    <div style="height: 300px">
                        <div
                            class="d-flex align-center justify-center grey lighten-4 rounded"
                            style="height: 100%"
                        >
                            <div class="text-center">
                                <v-icon color="grey" size="48"
                                    >mdi-chart-pie</v-icon
                                >
                                <p class="text-caption grey--text mt-2">
                                    Tour categories distribution
                                </p>
                            </div>
                        </div>
                    </div>
                </v-card>
            </v-col>
        </v-row>

        <!-- Recent Activity -->
        <v-row>
            <v-col cols="12" md="6">
                <v-card elevation="2" class="rounded-lg">
                    <v-card-title
                        class="d-flex justify-space-between align-center"
                    >
                        <span class="text-h6 font-weight-bold"
                            >Recent Custom Tours</span
                        >
                        <v-btn text small color="primary" to="/custom-tours"
                            >View All</v-btn
                        >
                    </v-card-title>
                    <v-data-table
                        :headers="customTourHeaders"
                        :items="customTours"
                        :items-per-page="5"
                        hide-default-footer
                        class="elevation-0"
                    >
                        <template v-slot:item.startDate="{ item }">{{
                            formatDate(item.startDate)
                        }}</template>
                    </v-data-table>
                </v-card>
            </v-col>

            <v-col cols="12" md="6">
                <v-card elevation="2" class="rounded-lg">
                    <v-card-title
                        class="d-flex justify-space-between align-center"
                    >
                        <span class="text-h6 font-weight-bold"
                            >Latest Contacts</span
                        >
                        <v-btn text small color="primary" to="/contacts"
                            >View All</v-btn
                        >
                    </v-card-title>
                    <v-data-table
                        :headers="contactHeaders"
                        :items="contacts"
                        :items-per-page="5"
                        hide-default-footer
                        class="elevation-0"
                    >
                        <template v-slot:item.date="{ item }">{{
                            formatDate(item.date)
                        }}</template>
                        <template v-slot:item.status="{ item }">
                            <v-chip
                                small
                                :color="getContactStatusColor(item.status)"
                                dark
                                >{{ item.status }}</v-chip
                            >
                        </template>
                    </v-data-table>
                </v-card>
            </v-col>
        </v-row>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const contactHeaders = [
    { text: "Name", value: "name" },
    { text: "Email", value: "email" },
    { text: "Subject", value: "subject" },
    { text: "Date", value: "created_at" },
];

const customTourHeaders = [
    { text: "Full Name", value: "fullName" },
    { text: "Email", value: "email" },
    { text: "Phone", value: "phone" },
    { text: "Interests", value: "interests" },
    { text: "Start Date", value: "startDate" },
];

const contacts = ref([]);
const customTours = ref([]);

const formatDate = (dateString) => {
    const options = { year: "numeric", month: "short", day: "numeric" };
    return new Date(dateString).toLocaleDateString("en-US", options);
};

const fetchContacts = async () => {
    try {
        const { data } = await axios.get("/api/latest-contacts");
        contacts.value = data.contacts || data;
    } catch (error) {
        console.error("Failed to fetch contacts", error);
    }
};

const fetchCustomTours = async () => {
    try {
        const { data } = await axios.get("/api/latest-custom-tours");
        customTours.value = data;
    } catch (error) {
        console.error("Failed to fetch custom tours", error);
    }
};

const refreshData = () => {
    fetchContacts();
    fetchCustomTours();
};

onMounted(() => {
    refreshData();
});
</script>

<style scoped>
.dashboard-content {
    padding: 24px;
    width: 100%;
    margin-left: 0 !important;
}

@media (min-width: 960px) {
    .dashboard-content {
        margin-left: 220px;
        width: calc(100% - 220px);
    }
}

.v-card {
    transition: box-shadow 0.3s ease;
}

.v-card:hover {
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1) !important;
}

.rounded-lg {
    border-radius: 12px;
}

.v-data-table >>> .v-data-table-header {
    background-color: #f5f5f5;
    font-weight: 600;
}

@keyframes pulse-subtle {
    0%,
    100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.03);
    }
}

.hover\:animate-pulse-subtle:hover {
    animation: pulse-subtle 1.5s ease-in-out;
}
</style>
