<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { useRouter, useRoute } from "vue-router";

const router = useRouter();
const route = useRoute();

const loading = ref(false);
const countries = ref([]);
const imagePreview = ref(null);
const tourId = route.params.id;
const selectedFileName = ref(null);

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

const fetchTour = async () => {
    try {
        const response = await axios.get(`/api/tours/${tourId}`);
        const tour = response.data;

        form.value.title = tour.title ?? "";
        form.value.slug = tour.slug ?? "";
        form.value.country_id = tour.country_id ?? "";
        form.value.region = tour.region ?? "";
        form.value.destination = tour.destination ?? "";
        form.value.short_description = tour.short_description ?? "";
        form.value.full_description = tour.full_description ?? "";
        form.value.duration = tour.duration ?? "";
        form.value.price = tour.price ?? null;
        form.value.is_featured = tour.is_featured ?? false;
        form.value.min_group_size = tour.min_group_size ?? null;
        form.value.max_group_size = tour.max_group_size ?? null;
        form.value.included = tour.included ?? [];
        form.value.not_included = tour.not_included ?? [];
        form.value.itinerary = tour.itinerary ?? [];
        form.value.start_date = tour.start_date ?? "";
        form.value.end_date = tour.end_date ?? "";

        // Only keep image preview if it's not a file object
        imagePreview.value = tour.image_url ?? null;
        selectedFileName.value = tour.image ? "Current Image" : null;
    } catch (error) {
        console.error("Error loading tour:", error);
    }
};

const fetchCountries = async () => {
    try {
        const res = await axios.get("/api/countries");
        countries.value = res.data;
    } catch (e) {
        console.error("Failed to fetch countries:", e);
    }
};

const handleImageChange = (event) => {
    const file = event.target?.files?.[0];
    if (file && file instanceof File) {
        imagePreview.value = URL.createObjectURL(file);
        selectedFileName.value = file.name;
        form.value.image = file;
    }
};

const submitTour = async () => {
    const formData = new FormData();

    formData.append("title", form.value.title);
    formData.append("slug", form.value.slug);
    formData.append("country_id", form.value.country_id);
    formData.append("region", form.value.region);
    formData.append("destination", form.value.destination);
    formData.append("short_description", form.value.short_description);
    formData.append("full_description", form.value.full_description);
    formData.append("duration", form.value.duration);
    formData.append("price", form.value.price);
    formData.append("is_featured", form.value.is_featured ? 1 : 0);
    formData.append("min_group_size", form.value.min_group_size);
    formData.append("max_group_size", form.value.max_group_size);
    formData.append("start_date", form.value.start_date);
    formData.append("end_date", form.value.end_date);
    formData.append("included", JSON.stringify(form.value.included || []));
    formData.append("not_included", JSON.stringify(form.value.not_included || []));
    formData.append("itinerary", JSON.stringify(form.value.itinerary || []));

    if (form.value.image instanceof File) {
        formData.append("image", form.value.image);
    }

    try {
        await axios.post(`/api/tours/${tourId}?_method=PUT`, formData, {
            headers: {
                "Content-Type": "multipart/form-data",
            },
        });
        router.push("/tours"); // Navigate after successful update
    } catch (error) {
        console.error("Submit error:", error.response?.data || error.message);
    }
};

onMounted(() => {
    fetchCountries();
    fetchTour();
});
</script>


<template>
    <v-card>
        <div class="max-w-6xl mx-auto px-4 md:px-6 pb-28 pt-6 font-[Poppins]">
            <h1 class="text-3xl font-bold text-[#201444] mb-8 text-center">
                Edit Tour
            </h1>

            <v-form @submit.prevent="submitTour" class="space-y-10">
                <!-- Section: Basic Tour Info -->
                <v-card elevation="2" class="p-6 rounded-xl bg-[#f7f4fb]">
                    <v-card-title
                        class="text-xl font-semibold mb-2 text-[#201444]"
                    >
                        Basic Information
                    </v-card-title>
                    <v-container fluid>
                        <v-row dense>
                            <v-col cols="12" sm="6">
                                <div>Title</div>
                                <v-text-field
                                    v-model="form.title"
                                    outlined
                                    dense
                                    class="text-field background"
                                    :rules="[(v) => !!v || 'Title is required']"
                                    hide-details
                                />
                            </v-col>
                            <v-col cols="12" sm="6">
                                <div>Slug</div>
                                <v-text-field
                                    v-model="form.slug"
                                    outlined
                                    dense
                                    class="bg-[#f2f2f2]"
                                    :rules="[(v) => !!v || 'Slug is required']"
                                    hide-details
                                />
                            </v-col>
                            <v-col cols="12" sm="6">
                                <div>Country</div>
                                <v-select
                                    v-model="form.country_id"
                                    :items="countries"
                                    item-title="name"
                                    item-value="id"
                                    outlined
                                    dense
                                    class="bg-[#f2f2f2]"
                                    :rules="[
                                        (v) => !!v || 'Country is required',
                                    ]"
                                    hide-details
                                />
                            </v-col>
                            <v-col cols="12" sm="6">
                                <div>Region</div>
                                <v-text-field
                                    v-model="form.region"
                                    outlined
                                    dense
                                    class="bg-[#f2f2f2]"
                                    :rules="[
                                        (v) => !!v || 'Region is required',
                                    ]"
                                    hide-details
                                />
                            </v-col>
                            <v-col cols="12" sm="6">
                                <div>Destination</div>
                                <v-text-field
                                    v-model="form.destination"
                                    outlined
                                    dense
                                    class="bg-[#f2f2f2]"
                                    :rules="[
                                        (v) => !!v || 'Destination is required',
                                    ]"
                                    hide-details
                                />
                            </v-col>
                            <v-col cols="12" sm="6">
                                <div>Duration</div>
                                <v-text-field
                                    v-model="form.duration"
                                    outlined
                                    dense
                                    class="bg-[#f2f2f2]"
                                    :rules="[
                                        (v) => !!v || 'Duration is required',
                                    ]"
                                    hide-details
                                />
                            </v-col>
                            <v-col cols="12" sm="6">
                                <div>Price (KES)*</div>
                                <v-text-field
                                    v-model.number="form.price"
                                    type="number"
                                    outlined
                                    dense
                                    class="bg-[#f2f2f2]"
                                    :rules="[(v) => !!v || 'Price is required']"
                                    hide-details
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
                                <div
                                    class="mb-2 text-sm font-medium text-[#201444]"
                                >
                                    Tour Image
                                </div>

                                <!-- File icon label -->
                                <label
                                    for="image-upload"
                                    class="cursor-pointer text-2xl text-purple-700"
                                >
                                    <v-icon>mdi-file-image</v-icon>
                                </label>

                                <!-- Hidden input -->
                                <input
                                    id="image-upload"
                                    type="file"
                                    accept="image/*"
                                    @change="handleImageChange"
                                    class="hidden"
                                />

                                <!-- Show selected image name -->
                                <div
                                    v-if="selectedFileName"
                                    class="mt-1 text-sm text-gray-700"
                                >
                                    {{ selectedFileName }}
                                </div>
                            </v-col>

                            <!-- Image preview -->
                            <v-col cols="12" v-if="imagePreview">
                                <v-img
                                    :src="imagePreview"
                                    width="300"
                                    height="200"
                                    class="rounded-xl mt-2 border border-gray-300 object-cover"
                                    cover
                                ></v-img>
                            </v-col>
                        </v-row>
                    </v-container>
                    <v-card-title
                        class="text-xl font-semibold mb-4 text-[#201444]"
                        >Group Size</v-card-title
                    >
                    <v-container fluid>
                        <v-row dense>
                            <v-col cols="12" sm="6">
                                <div>Min Group Size</div>
                                <v-text-field
                                    v-model.number="form.min_group_size"
                                    type="number"
                                    outlined
                                    dense
                                    class="bg-[#f2f2f2]"
                                    hide-details
                                />
                            </v-col>
                            <v-col cols="12" sm="6">
                                <div>Max Group Size</div>
                                <v-text-field
                                    v-model.number="form.max_group_size"
                                    type="number"
                                    outlined
                                    dense
                                    class="bg-[#f2f2f2]"
                                    hide-details
                                />
                            </v-col>
                        </v-row>
                    </v-container>
                    <v-card-title
                        class="text-xl font-semibold mb-4 text-[#201444]"
                        >Dates</v-card-title
                    >
                    <v-container fluid>
                        <v-row dense>
                            <v-col cols="12" sm="6">
                                <div>Start Date</div>
                                <v-text-field
                                    v-model="form.start_date"
                                    type="date"
                                    outlined
                                    dense
                                    class="bg-[#f2f2f2]"
                                    hide-details
                                />
                            </v-col>
                            <v-col cols="12" sm="6">
                                <div>End Date</div>
                                <v-text-field
                                    v-model="form.end_date"
                                    type="date"
                                    outlined
                                    dense
                                    class="bg-[#f2f2f2]"
                                    :rules="[
                                        (v) =>
                                            !form.start_date ||
                                            !v ||
                                            v >= form.start_date ||
                                            'End date must be after or equal to start date',
                                    ]"
                                    hide-details
                                />
                            </v-col>
                        </v-row>
                    </v-container>
                    <v-card-title
                        class="text-xl font-semibold mb-4 text-[#201444]"
                        >Description</v-card-title
                    >
                    <v-container fluid>
                        <div class="text-sm font-medium text-[#201444] mb-1">
                            Short Description
                        </div>
                        <v-textarea
                            v-model="form.short_description"
                            outlined
                            class="bg-[#f2f2f2] text-sm py-2"
                            rows="2"
                            hide-details
                            :rules="[
                                (v) => !!v || 'Short description is required',
                            ]"
                        />
                        <div>Full Description</div>
                        <v-textarea
                            v-model="form.full_description"
                            outlined
                            class="bg-[#f2f2f2]"
                            :rules="[
                                (v) => !!v || 'Full description is required',
                            ]"
                            hide-details
                        />
                    </v-container>
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
                </v-card>
            </v-form>
        </div>
    </v-card>
</template>
