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
                <v-card elevation="2" class="pa-4 rounded-lg h-100">
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
                        <!-- Booking trends chart placeholder -->
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
                        <!-- Categories chart placeholder -->
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
                        <v-btn text small color="primary" to="/custom-tours">
                            View All
                        </v-btn>
                    </v-card-title>
                    <v-data-table
                        :headers="customTourHeaders"
                        :items="customTours"
                        :items-per-page="5"
                        hide-default-footer
                        class="elevation-0"
                    >
                        <template v-slot:item.budget="{ item }">
                            {{ formatCurrency(item.budget) }}
                        </template>
                        <template v-slot:item.date="{ item }">
                            {{ formatDate(item.date) }}
                        </template>
                        <template v-slot:item.status="{ item }">
                            <v-chip
                                small
                                :color="getStatusColor(item.status)"
                                dark
                            >
                                {{ item.status }}
                            </v-chip>
                        </template>
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
                        <v-btn text small color="primary" to="/contacts">
                            View All
                        </v-btn>
                    </v-card-title>
                    <v-data-table
                        :headers="contactHeaders"
                        :items="contacts"
                        :items-per-page="5"
                        hide-default-footer
                        class="elevation-0"
                    >
                        <template v-slot:item.date="{ item }">
                            {{ formatDate(item.date) }}
                        </template>
                        <template v-slot:item.status="{ item }">
                            <v-chip
                                small
                                :color="getContactStatusColor(item.status)"
                                dark
                            >
                                {{ item.status }}
                            </v-chip>
                        </template>
                    </v-data-table>
                </v-card>
            </v-col>
        </v-row>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";

const router = useRouter();

// Key metrics data
const metrics = ref([
    {
        title: "Total Tours",
        value: "42",
        trend: {
            value: "+12%",
            icon: "mdi-arrow-up",
            color: "green lighten-5",
            textColor: "green",
        },
        icon: {
            name: "mdi-map-marker",
            color: "purple",
            bg: "purple lighten-5",
        },
    },
    {
        title: "Custom Requests",
        value: "15",
        trend: {
            value: "+5",
            icon: "mdi-arrow-up",
            color: "orange lighten-5",
            textColor: "orange",
        },
        icon: { name: "mdi-star-cog", color: "orange", bg: "orange lighten-5" },
    },
    {
        title: "New Contacts",
        value: "28",
        trend: {
            value: "+24%",
            icon: "mdi-arrow-up",
            color: "blue lighten-5",
            textColor: "blue",
        },
        icon: {
            name: "mdi-account-group",
            color: "blue",
            bg: "blue lighten-5",
        },
    },
    {
        title: "Revenue (Ksh)",
        value: "1.2M",
        trend: {
            value: "+18%",
            icon: "mdi-arrow-up",
            color: "green lighten-5",
            textColor: "green",
        },
        icon: {
            name: "mdi-currency-usd",
            color: "green",
            bg: "green lighten-5",
        },
    },
]);

// Recent custom tours with Kenyan context
const customTours = ref([
    {
        id: 1,
        name: "James Mwangi",
        tour: "Maasai Mara Safari",
        budget: 450000,
        date: "2023-06-15",
        status: "Pending",
    },
    {
        id: 2,
        name: "Sarah Wambui",
        tour: "School Trip to Coast",
        budget: 320000,
        date: "2023-06-14",
        status: "Approved",
    },
    {
        id: 3,
        name: "David Omondi",
        tour: "Family Vacation",
        budget: 780000,
        date: "2023-06-12",
        status: "Pending",
    },
    {
        id: 4,
        name: "Amina Hassan",
        tour: "Cultural Experience",
        budget: 290000,
        date: "2023-06-10",
        status: "Rejected",
    },
    {
        id: 5,
        name: "Robert Kamau",
        tour: "Corporate Retreat",
        budget: 1200000,
        date: "2023-06-08",
        status: "Approved",
    },
]);

// Recent contacts with Kenyan context
const contacts = ref([
    {
        id: 1,
        name: "Grace Wanjiku",
        email: "grace@school.edu",
        subject: "School Tour Inquiry",
        date: "2023-06-15",
        status: "New",
    },
    {
        id: 2,
        name: "Peter Maina",
        email: "peter@company.co.ke",
        subject: "Team Building Package",
        date: "2023-06-14",
        status: "Responded",
    },
    {
        id: 3,
        name: "Lucy Njeri",
        email: "lucy@university.ac.ke",
        subject: "Educational Tour",
        date: "2023-06-13",
        status: "New",
    },
    {
        id: 4,
        name: "Michael Otieno",
        email: "michael@gmail.com",
        subject: "Honeymoon Package",
        date: "2023-06-12",
        status: "Responded",
    },
    {
        id: 5,
        name: "Elizabeth Atieno",
        email: "elizabeth@org.org",
        subject: "Custom Itinerary",
        date: "2023-06-10",
        status: "New",
    },
]);

// Table headers
const customTourHeaders = ref([
    { text: "Client", value: "name" },
    { text: "Tour", value: "tour" },
    { text: "Budget", value: "budget", align: "end" },
    { text: "Date", value: "date" },
    { text: "Status", value: "status" },
]);

const contactHeaders = ref([
    { text: "Name", value: "name" },
    { text: "Email", value: "email" },
    { text: "Subject", value: "subject" },
    { text: "Date", value: "date" },
    { text: "Status", value: "status" },
]);

// Formatting functions
const formatDate = (dateString) => {
    const options = { year: "numeric", month: "short", day: "numeric" };
    return new Date(dateString).toLocaleDateString("en-US", options);
};

const formatCurrency = (amount) => {
    return new Intl.NumberFormat("en-KE", {
        style: "currency",
        currency: "KES",
        maximumFractionDigits: 0,
    }).format(amount);
};

// Status color helpers
const getStatusColor = (status) => {
    const colors = {
        Pending: "orange",
        Approved: "green",
        Rejected: "red",
    };
    return colors[status] || "grey";
};

const getContactStatusColor = (status) => {
    const colors = {
        New: "blue",
        Responded: "teal",
    };
    return colors[status] || "grey";
};

const refreshData = () => {
    // In a real app, this would fetch fresh data from the backend
    console.log("Refreshing dashboard data...");
};
</script>

<style scoped>
.dashboard-content {
  padding: 20px;
  margin-left: 0; /* Ensure no conflicting margins */
  width: 100%;
}

@media (min-width: 960px) {
  .dashboard-content {
    margin-left: 260px; /* Match navbar width */
    width: calc(100% - 260px);
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
</style>
