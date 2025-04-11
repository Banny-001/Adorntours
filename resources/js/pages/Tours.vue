<!-- Tours.vue -->
<template>
    <div class="relative text-gray-800 font-[Poppins]">
        <!-- Hero -->
        <section class="relative h-[60vh] md:h-[70vh] overflow-hidden">
            <img
                src="../images/tours-hero.webp"
                class="absolute inset-0 w-full h-full object-cover z-0"
                alt="Educational Travel"
            />
            <div
                class="absolute inset-0 bg-[#201444]/70 z-10 flex items-center justify-center text-white text-center px-6"
            >
                <div class="max-w-3xl space-y-4">
                    <h1 class="text-4xl md:text-6xl font-bold drop-shadow">
                        Explore Our Educational Tours
                    </h1>
                    <p class="text-lg md:text-xl text-white/90">
                        Meaningful journeys that combine cultural exploration
                        and real-world learning.
                    </p>
                    <button
                        @click="showCustomTourForm = true"
                        class="mt-6 px-8 py-3 bg-gradient-to-r from-pink-500 to-purple-600 text-white font-semibold rounded-full hover:scale-105 transition-all shadow-lg"
                    >
                        Create Your Custom Tour
                    </button>
                </div>
            </div>
        </section>

        <!-- Filter Controls -->
        <section class="py-10 bg-gradient-to-r from-purple-50 to-indigo-50">
            <div class="max-w-7xl mx-auto px-6">
                <div
                    class="flex flex-col md:flex-row gap-6 items-start md:items-end justify-between"
                >
                    <div>
                        <h2 class="text-3xl font-bold text-[#201444] mb-2">
                            Discover Tours
                        </h2>
                        <p class="text-gray-600">
                            Filter from our selection of educational adventures
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-4">
                        <div class="w-full md:w-auto">
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1"
                                >Country</label
                            >
                            <select
                                v-model="filters.country"
                                class="w-full md:w-48 p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-400 focus:border-transparent"
                            >
                                <option value="">All Countries</option>
                                <option
                                    v-for="country in uniqueCountries"
                                    :key="country"
                                    :value="country"
                                >
                                    {{ country }}
                                </option>
                            </select>
                        </div>

                        <div class="w-full md:w-auto">
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1"
                                >Region</label
                            >
                            <select
                                v-model="filters.region"
                                class="w-full md:w-48 p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-400 focus:border-transparent"
                            >
                                <option value="">All Regions</option>
                                <option
                                    v-for="region in uniqueRegions"
                                    :key="region"
                                    :value="region"
                                >
                                    {{ region }}
                                </option>
                            </select>
                        </div>

                        <div class="w-full md:w-auto">
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1"
                                >City</label
                            >
                            <select
                                v-model="filters.city"
                                class="w-full md:w-48 p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-400 focus:border-transparent"
                            >
                                <option value="">All Cities</option>
                                <option
                                    v-for="city in uniqueCities"
                                    :key="city"
                                    :value="city"
                                >
                                    {{ city }}
                                </option>
                            </select>
                        </div>

                        <button
                            @click="resetFilters"
                            class="self-end px-4 py-2 text-sm text-purple-700 border border-purple-300 rounded-lg hover:bg-purple-50"
                        >
                            Reset Filters
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tours List -->
        <section class="section-spacing bg-transparent">
            <div class="max-w-7xl mx-auto px-6">
                <div
                    v-if="filteredTours.length === 0"
                    class="text-center py-20"
                >
                    <svg
                        class="mx-auto h-16 w-16 text-gray-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                        />
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">
                        No tours found
                    </h3>
                    <p class="mt-1 text-md text-gray-500">
                        Try adjusting your filters or check back later for new
                        tours.
                    </p>
                </div>

                <div v-else class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div
                        v-for="tour in filteredTours"
                        :key="tour.id"
                        class="rounded-2xl overflow-hidden shadow-xl hover:shadow-purple-300 transition-all hover:-translate-y-2 bg-white/90 backdrop-blur-md animate-fadeup"
                    >
                        <div class="relative">
                            <img
                                :src="tour.image_url"
                                alt=""
                                class="h-48 w-full object-cover"
                            />
                            <div
                                class="absolute top-4 right-4 bg-purple-600 text-white text-xs px-3 py-1 rounded-full"
                            >
                                {{ tour.country }}
                            </div>
                        </div>
                        <div class="p-6 space-y-3">
                            <h3 class="text-xl font-semibold text-[#201444]">
                                {{ tour.title }}
                            </h3>
                            <p class="text-sm text-gray-600">
                                {{ tour.description }}
                            </p>
                            <div class="flex flex-wrap gap-2 text-xs">
                                <span
                                    class="bg-indigo-100 text-indigo-800 px-2 py-1 rounded"
                                    >{{ tour.region }}</span
                                >
                                <span
                                    class="bg-teal-100 text-teal-800 px-2 py-1 rounded"
                                    >{{ tour.city }}</span
                                >
                                <span
                                    v-if="tour.duration"
                                    class="bg-amber-100 text-amber-800 px-2 py-1 rounded"
                                    >{{ tour.duration }} days</span
                                >
                            </div>
                            <div class="pt-4 flex justify-between items-center">
                                <span
                                    v-if="tour.price"
                                    class="font-semibold text-lg"
                                >
                                    ${{ tour.price }}
                                </span>
                                <router-link
                                    :to="`/tours/${tour.slug}`"
                                    class="inline-block bg-[#201444] text-white text-sm px-6 py-2 rounded-full hover:bg-[#3700B3] transition-all"
                                >
                                    View Details
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Create Custom Tour Modal -->
        <div
            v-if="showCustomTourForm"
            class="fixed inset-0 z-50 overflow-y-auto"
            aria-labelledby="modal-title"
            role="dialog"
            aria-modal="true"
        >
            <div
                class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
            >
                <div
                    class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                    aria-hidden="true"
                    @click="showCustomTourForm = false"
                ></div>

                <div
                    class="inline-block align-bottom bg-white rounded-3xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full"
                >
                    <div
                        class="bg-gradient-to-r from-purple-600 to-indigo-600 py-6 px-8"
                    >
                        <div class="flex justify-between items-center">
                            <h3
                                class="text-2xl font-bold text-white"
                                id="modal-title"
                            >
                                Create Your Perfect Tour
                            </h3>
                            <button
                                @click="showCustomTourForm = false"
                                class="text-white hover:text-gray-200"
                            >
                                <svg
                                    class="h-6 w-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <form
                        @submit.prevent="submitCustomTour"
                        class="px-8 py-6 space-y-6"
                    >
                        <p class="text-gray-600">
                            Tell us your dream educational journey and we'll
                            make it happen.
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label
                                    for="fullName"
                                    class="block text-sm font-medium text-gray-700 mb-1"
                                    >Full Name*</label
                                >
                                <input
                                    id="fullName"
                                    v-model="customTour.fullName"
                                    type="text"
                                    required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-400 focus:border-transparent"
                                />
                            </div>

                            <div>
                                <label
                                    for="email"
                                    class="block text-sm font-medium text-gray-700 mb-1"
                                    >Email Address*</label
                                >
                                <input
                                    id="email"
                                    v-model="customTour.email"
                                    type="email"
                                    required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-400 focus:border-transparent"
                                />
                            </div>

                            <div>
                                <label
                                    for="phone"
                                    class="block text-sm font-medium text-gray-700 mb-1"
                                    >Phone Number</label
                                >
                                <input
                                    id="phone"
                                    v-model="customTour.phone"
                                    type="tel"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-400 focus:border-transparent"
                                />
                            </div>

                            <div>
                                <label
                                    for="groupSize"
                                    class="block text-sm font-medium text-gray-700 mb-1"
                                    >Group Size*</label
                                >
                                <input
                                    id="groupSize"
                                    v-model.number="customTour.groupSize"
                                    type="number"
                                    min="1"
                                    required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-400 focus:border-transparent"
                                />
                            </div>

                            <div class="md:col-span-2">
                                <label
                                    for="destinations"
                                    class="block text-sm font-medium text-gray-700 mb-1"
                                    >Desired Destinations*</label
                                >
                                <input
                                    id="destinations"
                                    v-model="customTour.destinations"
                                    type="text"
                                    placeholder="e.g. London, Paris, Rome"
                                    required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-400 focus:border-transparent"
                                />
                            </div>

                            <div>
                                <label
                                    for="startDate"
                                    class="block text-sm font-medium text-gray-700 mb-1"
                                    >Preferred Start Date</label
                                >
                                <input
                                    id="startDate"
                                    v-model="customTour.startDate"
                                    type="date"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-400 focus:border-transparent"
                                />
                            </div>

                            <div>
                                <label
                                    for="duration"
                                    class="block text-sm font-medium text-gray-700 mb-1"
                                    >Preferred Duration (days)*</label
                                >
                                <input
                                    id="duration"
                                    v-model.number="customTour.duration"
                                    type="number"
                                    min="1"
                                    required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-400 focus:border-transparent"
                                />
                            </div>

                            <div class="md:col-span-2">
                                <label
                                    for="interests"
                                    class="block text-sm font-medium text-gray-700 mb-1"
                                    >Educational Interests</label
                                >
                                <textarea
                                    id="interests"
                                    v-model="customTour.interests"
                                    rows="3"
                                    placeholder="Tell us what educational aspects you're interested in..."
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-400 focus:border-transparent"
                                ></textarea>
                            </div>

                            <div class="md:col-span-2">
                                <label
                                    for="additionalInfo"
                                    class="block text-sm font-medium text-gray-700 mb-1"
                                    >Additional Information</label
                                >
                                <textarea
                                    id="additionalInfo"
                                    v-model="customTour.additionalInfo"
                                    rows="3"
                                    placeholder="Any other details you'd like us to know..."
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-400 focus:border-transparent"
                                ></textarea>
                            </div>
                        </div>

                        <div class="pt-4 flex justify-end gap-4">
                            <button
                                type="button"
                                @click="showCustomTourForm = false"
                                class="px-6 py-3 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors"
                            >
                                Cancel
                            </button>
                            <button
                                type="submit"
                                class="px-8 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-medium rounded-lg hover:opacity-90 transition-opacity"
                                :disabled="isSubmitting"
                            >
                                <span v-if="isSubmitting">Submitting...</span>
                                <span v-else>Submit Request</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Success Modal -->
        <div
            v-if="showSuccessModal"
            class="fixed inset-0 z-50 overflow-y-auto"
            aria-labelledby="modal-title"
            role="dialog"
            aria-modal="true"
        >
            <div
                class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
            >
                <div
                    class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                    aria-hidden="true"
                ></div>

                <div
                    class="inline-block align-bottom bg-white rounded-3xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                >
                    <div class="bg-green-100 p-8 text-center">
                        <div
                            class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-600 text-white"
                        >
                            <svg
                                class="h-8 w-8"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 13l4 4L19 7"
                                />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mt-4">
                            Request Submitted!
                        </h3>
                        <p class="mt-2 text-gray-600">
                            We've received your custom tour request. Our team
                            will contact you within 24 hours to discuss the
                            details.
                        </p>
                        <div class="mt-6">
                            <button
                                @click="closeSuccessModal"
                                class="px-6 py-3 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition-colors"
                            >
                                Great!
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from "vue";
import axios from "axios";

const tours = ref([]);
const showCustomTourForm = ref(false);
const showSuccessModal = ref(false);
const isSubmitting = ref(false);

const customTour = ref({
    fullName: "",
    email: "",
    phone: "",
    groupSize: 1,
    destinations: "",
    startDate: "",
    duration: 7,
    interests: "",
    additionalInfo: "",
});

const filters = ref({
    country: "",
    region: "",
    city: "",
});

onMounted(async () => {
    try {
        const response = await axios.get("/api/tours");
        // Check whether response.data is the array or if it's nested
        tours.value = Array.isArray(response.data) ? response.data : response.data.data;
    } catch (error) {
        console.error("Failed to load tours:", error);
        tours.value = []; // fallback to empty array to avoid further issues
    }
});


// Get unique filter values
const uniqueCountries = computed(() => {
    return Array.isArray(tours.value)
        ? [...new Set(tours.value.map((tour) => tour.country))].sort()
        : [];
});


const uniqueRegions = computed(() => {
    return [...new Set(tours.value.map((tour) => tour.region))].sort();
});

const uniqueCities = computed(() => {
    return [...new Set(tours.value.map((tour) => tour.city))].sort();
});

// Filter tours based on selected options
const filteredTours = computed(() => {
    return tours.value.filter((tour) => {
        return (
            (!filters.value.country ||
                tour.country === filters.value.country) &&
            (!filters.value.region || tour.region === filters.value.region) &&
            (!filters.value.city || tour.city === filters.value.city)
        );
    });
});

// Reset all filters
const resetFilters = () => {
    filters.value = {
        country: "",
        region: "",
        city: "",
    };
};

// Submit custom tour request
const submitCustomTour = async () => {
    isSubmitting.value = true;

    try {
        // Submit form data to API
        await axios.post("/api/custom-tours", customTour.value);

        // Reset form and show success message
        customTour.value = {
            fullName: "",
            email: "",
            phone: "",
            groupSize: 1,
            destinations: "",
            startDate: "",
            duration: 7,
            interests: "",
            additionalInfo: "",
        };

        showCustomTourForm.value = false;
        showSuccessModal.value = true;
    } catch (error) {
        console.error("Failed to submit custom tour request:", error);
        alert("There was an error submitting your request. Please try again.");
    } finally {
        isSubmitting.value = false;
    }
};

const closeSuccessModal = () => {
    showSuccessModal.value = false;
};
</script>

<style scoped>
.section-spacing {
    padding-top: 4rem;
    padding-bottom: 6rem;
}

/* Animate items fading up from bottom */
.animate-fadeup {
    animation: fadeUp 0.5s ease-out forwards;
    opacity: 0;
    transform: translateY(20px);
}

@keyframes fadeUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Stagger animation for tour cards */
.grid > div:nth-child(1) {
    animation-delay: 0.1s;
}
.grid > div:nth-child(2) {
    animation-delay: 0.2s;
}
.grid > div:nth-child(3) {
    animation-delay: 0.3s;
}
.grid > div:nth-child(4) {
    animation-delay: 0.4s;
}
.grid > div:nth-child(5) {
    animation-delay: 0.5s;
}
.grid > div:nth-child(6) {
    animation-delay: 0.6s;
}
</style>
