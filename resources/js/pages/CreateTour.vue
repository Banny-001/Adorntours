<template>
    <div class="max-w-6xl mx-auto px-4 md:px-6 pb-28 pt-6 font-[Poppins]">
        <h1 class="text-3xl font-bold text-[#201444] mb-8">
            Create a New Tour
        </h1>

        <v-form @submit.prevent="submitTour" class="space-y-10">
            <!-- Section: Basic Tour Info -->
            <v-card elevation="2" class="p-6 rounded-xl">
                <v-card-title class="text-xl font-semibold mb-4 text-[#201444]">
                    Basic Information
                </v-card-title>
                <v-container fluid>
                    <v-row dense>
                        <v-col cols="12" sm="6">
                            <v-text-field
                                v-model="form.title"
                                label="Title*"
                                outlined
                                dense
                                :rules="[(v) => !!v || 'Title is required']"
                            />
                        </v-col>
                        <v-col cols="12" sm="6">
                            <v-text-field
                                v-model="form.slug"
                                label="Slug*"
                                outlined
                                dense
                                :rules="[(v) => !!v || 'Slug is required']"
                            />
                        </v-col>
                        <v-col cols="12" sm="6">
                            <v-select
                                v-model="form.country_id"
                                :items="countries"
                                item-title="name"
                                item-value="id"
                                label="Country*"
                                outlined
                                dense
                                :rules="[(v) => !!v || 'Country is required']"
                            />
                        </v-col>
                        <v-col cols="12" sm="6">
                            <v-text-field
                                v-model="form.region"
                                label="Region*"
                                outlined
                                dense
                                :rules="[(v) => !!v || 'Region is required']"
                            />
                        </v-col>
                        <v-col cols="12" sm="6">
                            <v-text-field
                                v-model="form.destination"
                                label="Destination*"
                                outlined
                                dense
                                :rules="[
                                    (v) => !!v || 'Destination is required',
                                ]"
                            />
                        </v-col>
                        <v-col cols="12" sm="6">
                            <v-text-field
                                v-model="form.duration"
                                label="Duration*"
                                outlined
                                dense
                                :rules="[(v) => !!v || 'Duration is required']"
                            />
                        </v-col>
                        <v-col cols="12" sm="6">
                            <v-text-field
                                v-model.number="form.price"
                                label="Price (KES)*"
                                type="number"
                                outlined
                                dense
                                :rules="[(v) => !!v || 'Price is required']"
                            />
                        </v-col>
                        <v-col cols="12" sm="6">
                            <v-switch
                                v-model="form.is_featured"
                                label="Mark as Featured"
                                inset
                                color="purple"
                                :true-value="true"
                                :false-value="false"
                            />
                        </v-col>
                        <v-col cols="12">
                            <v-file-input
                                v-model="form.image"
                                label="Tour Image*"
                                accept="image/*"
                                outlined
                                dense
                                prepend-icon="mdi-image"
                                :rules="[(v) => !!v || 'Image is required']"
                            />
                        </v-col>
                    </v-row>
                </v-container>
            </v-card>

            <!-- Section: Group Size -->
            <v-card elevation="2" class="p-6 rounded-xl">
                <v-card-title class="text-xl font-semibold mb-4 text-[#201444]"
                    >Group Size</v-card-title
                >
                <v-container fluid>
                    <v-row dense>
                        <v-col cols="12" sm="6">
                            <v-text-field
                                v-model.number="form.min_group_size"
                                label="Min Group Size"
                                type="number"
                                outlined
                                dense
                            />
                        </v-col>
                        <v-col cols="12" sm="6">
                            <v-text-field
                                v-model.number="form.max_group_size"
                                label="Max Group Size"
                                type="number"
                                outlined
                                dense
                            />
                        </v-col>
                    </v-row>
                </v-container>
            </v-card>

            <!-- Section: Dates -->
            <v-card elevation="2" class="p-6 rounded-xl">
                <v-card-title class="text-xl font-semibold mb-4 text-[#201444]"
                    >Dates</v-card-title
                >
                <v-container fluid>
                    <v-row dense>
                        <v-col cols="12" sm="6">
                            <v-text-field
                                v-model="form.start_date"
                                label="Start Date"
                                type="date"
                                outlined
                                dense
                            />
                        </v-col>
                        <v-col cols="12" sm="6">
                            <v-text-field
                                v-model="form.end_date"
                                label="End Date"
                                type="date"
                                outlined
                                dense
                                :rules="[
                                    (v) =>
                                        !form.start_date ||
                                        !v ||
                                        v >= form.start_date ||
                                        'End date must be after or equal to start date',
                                ]"
                            />
                        </v-col>
                    </v-row>
                </v-container>
            </v-card>

            <!-- Section: Descriptions -->
            <v-card elevation="2" class="p-6 rounded-xl">
                <v-card-title class="text-xl font-semibold mb-4 text-[#201444]"
                    >Descriptions</v-card-title
                >
                <v-container fluid>
                    <v-row dense>
                        <v-col cols="12">
                            <v-textarea
                                v-model="form.short_description"
                                label="Short Description*"
                                outlined
                                rows="3"
                                :rules="[
                                    (v) =>
                                        !!v || 'Short description is required',
                                ]"
                            />
                        </v-col>
                        <v-col cols="12">
                            <v-textarea
                                v-model="form.full_description"
                                label="Full Description*"
                                outlined
                                rows="6"
                                :rules="[
                                    (v) =>
                                        !!v || 'Full description is required',
                                ]"
                            />
                        </v-col>
                    </v-row>
                </v-container>
            </v-card>

            <!-- Section: JSON Fields -->
            <v-card elevation="2" class="p-6 rounded-xl">
                <v-card-title class="text-xl font-semibold mb-4 text-[#201444]"
                    >Detailed Lists</v-card-title
                >
                <v-container fluid>
                    <v-row dense>
                        <v-col cols="12">
                            <v-textarea
                                v-model="includedText"
                                label="Included Features (one per line)"
                                outlined
                                rows="3"
                            />
                        </v-col>
                        <v-col cols="12">
                            <v-textarea
                                v-model="notIncludedText"
                                label="Not Included Features (one per line)"
                                outlined
                                rows="3"
                            />
                        </v-col>
                        <v-col cols="12">
                            <v-textarea
                                v-model="itineraryText"
                                label="Itinerary (e.g., Day 1: Description)"
                                outlined
                                rows="6"
                            />
                        </v-col>
                    </v-row>
                </v-container>
            </v-card>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <v-btn
                    color="primary"
                    size="large"
                    type="submit"
                    :loading="loading"
                    >Save Tour</v-btn
                >
            </div>
        </v-form>
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

const router = useRouter();
const loading = ref(false);
const countries = ref([]);

const form = ref({
    title: "",
    slug: "",
    country_id: "",
    region: "",
    destination: "",
    image: null,
    short_description: "",
    full_description: "",
    duration: "",
    price: null,
    is_featured: false,
    min_group_size: null,
    max_group_size: null,
    included: [],
    not_included: [],
    itinerary: [],
    start_date: "",
    end_date: "",
});

onMounted(async () => {
    try {
        const res = await axios.get("/api/countries");
        countries.value = res.data;
    } catch (e) {
        console.error("Failed to fetch countries:", e);
    }
});

const includedText = computed({
    get: () => form.value.included.join("\n"),
    set: (val) =>
        (form.value.included = val.split("\n").filter((i) => i.trim())),
});

const notIncludedText = computed({
    get: () => form.value.not_included.join("\n"),
    set: (val) =>
        (form.value.not_included = val.split("\n").filter((i) => i.trim())),
});

const itineraryText = computed({
    get: () => form.value.itinerary.join("\n"),
    set: (val) =>
        (form.value.itinerary = val.split("\n").filter((i) => i.trim())),
});

const submitTour = async () => {
    loading.value = true;

    try {
        const data = new FormData();
        for (const [key, value] of Object.entries(form.value)) {
            if (Array.isArray(value)) {
                data.append(key, JSON.stringify(value));
            } else if (key === "is_featured") {
                data.append(key, value ? "1" : "0");
            } else {
                data.append(key, value);
            }
        }

        await axios.post("/api/tours", data);
        alert("Tour created successfully");
        router.push({ name: "tours.index" });
    } catch (error) {
        console.error("Tour creation failed:", error);
        alert("Failed to create tour");
    } finally {
        loading.value = false;
    }
};
</script>

<style scoped>
.v-card {
    background: #fff;
}
</style>
