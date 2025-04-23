<template>
    <v-card>
        <div class="max-w-6xl mx-auto px-4 md:px-6 pb-28 pt-6 font-[Poppins]">
            <h1 class="text-3xl font-bold text-[#201444] mb-8 text-center">
                Create a New Tour
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
                                    density="compact"
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
                                    density="compact"
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
                                    density="compact"
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
                                    density="compact"
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
                                    density="compact"
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
                                    density="compact"
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
                                    density="compact"
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
                                <div class="mb-2 text-sm font-medium text-[#201444]">Tour Image</div>
                              
                                <!-- File icon label -->
                                <label for="image-upload" class="cursor-pointer text-2xl text-purple-700">
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
                                <div v-if="selectedFileName" class="mt-1 text-sm text-gray-700">
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
                                    density="compact"
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
                                    density="compact"
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
                                    density="compact"
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
                                    density="compact"
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
                      
                            <div
                                class="text-sm font-medium text-[#201444] mb-1"
                            >
                                Short Description
                            </div>
                            <v-textarea
                                v-model="form.short_description"
                                outlined
                                class="bg-[#f2f2f2] text-sm py-2"
                                rows="2"
                                hide-details
                                density="compact"
                                :rules="[
                                    (v) =>
                                        !!v || 'Short description is required',
                                ]"
                            />
                            <div>Full Description</div>
                            <v-textarea
                                v-model="form.full_description"
                                outlined
                               density="compact"
                                class="bg-[#f2f2f2]"
                                :rules="[
                                    (v) =>
                                        !!v || 'Full description is required',
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

<script setup>
import { ref, computed, onMounted } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

const router = useRouter();
const loading = ref(false);
const countries = ref([]);
const imagePreview = ref(null)
const selectedFileName = ref('');

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


function handleImageChange(event) {
  const file = event.target?.files?.[0];
  if (file && file instanceof File) {
    imagePreview.value = URL.createObjectURL(file);
    selectedFileName.value = file.name;
    form.value.image = file;
  }
}

onMounted(async () => {
    try {
        const res = await axios.get("/api/countries");
        countries.value = res.data;
    } catch (e) {
        console.error("Failed to fetch countries:", e);
    }
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
        router.push("/admin/tours");
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
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
</style>
