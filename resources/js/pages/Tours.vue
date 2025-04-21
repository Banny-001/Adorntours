<template>
    <div class="relative text-gray-800 font-[Poppins]">
        <!-- Hero Section - Enhanced with parallax effect -->
        <section class="relative h-[65vh] md:h-[75vh] overflow-hidden">
            <div
                class="absolute inset-0 w-full h-full z-0 bg-fixed bg-center bg-cover parallax-bg"
                style="background-image: url('../images/tours-hero.webp')"
            ></div>
            <div
                class="absolute inset-0 bg-gradient-to-b from-[#201444]/80 to-[#201444]/60 z-10 flex items-center justify-center text-white text-center px-6"
            >
                <div class="max-w-3xl space-y-6 animate-fadeIn">
                    <h1
                        class="text-4xl md:text-6xl font-bold drop-shadow-lg tracking-tight leading-tight"
                    >
                        Discover Transformative<br />Educational Journeys
                    </h1>
                    <p
                        class="text-lg md:text-xl text-white/90 max-w-2xl mx-auto"
                    >
                        Immersive experiences that blend cultural exploration
                        with hands-on learning in the world's most inspiring
                        destinations.
                    </p>
                    <button
                        @click="showCustomTourForm = true"
                        class="mt-8 px-8 py-4 bg-gradient-to-r from-pink-500 to-purple-600 text-white font-semibold rounded-full hover:scale-105 transition-all duration-300 shadow-lg transform hover:shadow-purple-500/50 group"
                    >
                        <span class="flex items-center justify-center">
                            Create Your Custom Tour
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 ml-2 group-hover:translate-x-1 transition-transform"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"
                                />
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
        </section>

        <!-- Enhanced Filter Controls with visual indicators -->
        <section class="py-12 bg-gradient-to-r from-purple-50 to-indigo-50">
            <div class="max-w-7xl mx-auto px-6">
                <div
                    class="flex flex-col md:flex-row gap-6 items-start md:items-end justify-between"
                >
                    <div class="animate-fadeInUp">
                        <h2
                            class="text-3xl font-bold text-[#201444] mb-2 relative inline-block"
                        >
                            Discover Tours
                            <span
                                class="absolute bottom-0 left-0 w-1/2 h-1 bg-gradient-to-r from-pink-500 to-purple-600"
                            ></span>
                        </h2>
                        <p class="text-gray-600">
                            Filter from our selection of educational adventures
                        </p>
                    </div>

                    <div
                        class="flex flex-wrap gap-4 animate-fadeInUp"
                        style="animation-delay: 0.2s"
                    >
                        <div class="w-full md:w-auto">
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1"
                                >Country</label
                            >
                            <div class="relative">
                                <select
                                    v-model="filters.country"
                                    class="w-full md:w-48 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-400 focus:border-transparent appearance-none pl-4 pr-10 bg-white"
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
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-purple-600"
                                >
                                    <svg
                                        class="fill-current h-4 w-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                        />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="w-full md:w-auto">
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1"
                                >Region</label
                            >
                            <div class="relative">
                                <select
                                    v-model="filters.region"
                                    class="w-full md:w-48 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-400 focus:border-transparent appearance-none pl-4 pr-10 bg-white"
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
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-purple-600"
                                >
                                    <svg
                                        class="fill-current h-4 w-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                        />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="w-full md:w-auto">
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1"
                                >City</label
                            >
                            <div class="relative">
                                <select
                                    v-model="filters.city"
                                    class="w-full md:w-48 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-400 focus:border-transparent appearance-none pl-4 pr-10 bg-white"
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
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-purple-600"
                                >
                                    <svg
                                        class="fill-current h-4 w-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                        />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <button
                            @click="resetFilters"
                            class="self-end py-4 px-6 bg-gradient-to-r from-pink-500 to-purple-600 text-white border border-purple-300 rounded-full hover:bg-purple-100 transition-all duration-300 flex items-center"

                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 mr-1"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                                />
                            </svg>
                            Reset Filters
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tours List - Completely enhanced layout with hover effects -->
        <section class="py-16 bg-gradient-to-b from-white to-purple-50">
            <div class="max-w-7xl mx-auto px-6">
                <!-- Applied Filters Display -->
                <div
                    v-if="hasActiveFilters"
                    class="mb-8 flex flex-wrap gap-2 items-center animate-fadeInUp"
                >
                    <span class="text-sm text-gray-600">Active filters:</span>
                    <div
                        v-if="filters.country"
                        class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full flex items-center text-sm"
                    >
                        <span>Country: {{ filters.country }}</span>
                        <button
                            @click="filters.country = ''"
                            class="ml-2 text-purple-600 hover:text-purple-800"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4"
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
                    <div
                        v-if="filters.region"
                        class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full flex items-center text-sm"
                    >
                        <span>Region: {{ filters.region }}</span>
                        <button
                            @click="filters.region = ''"
                            class="ml-2 text-indigo-600 hover:text-indigo-800"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4"
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
                    <div
                        v-if="filters.city"
                        class="px-3 py-1 bg-teal-100 text-teal-800 rounded-full flex items-center text-sm"
                    >
                        <span>City: {{ filters.city }}</span>
                        <button
                            @click="filters.city = ''"
                            class="ml-2 text-teal-600 hover:text-teal-800"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4"
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

                <!-- No results message -->
                <div
                    v-if="filteredTours.length === 0"
                    class="text-center py-20 animate-fadeIn"
                >
                    <svg
                        class="mx-auto h-20 w-20 text-purple-200"
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
                    <h3 class="mt-6 text-xl font-medium text-[#201444]">
                        No tours found
                    </h3>
                    <p class="mt-2 text-md text-gray-500 max-w-md mx-auto">
                        Try adjusting your filters or check back later for new
                        tours.
                    </p>
                    <button
                        @click="resetFilters"
                        class="mt-6 px-6 py-2 bg-purple-600 text-purple border border-purple-300 rounded-lg hover:bg-purple-700 transition-colors"
                       

                    >
                        Clear All Filters
                    </button>
                </div>

                <!-- Enhanced Tour Cards -->
                <!-- Update the tours grid section to use paginatedTours instead of filteredTours -->
                <div v-else class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div
                        v-for="(tour, index) in paginatedTours"
                        :key="tour.id"
                        class="tour-card group relative rounded-2xl overflow-hidden shadow-xl transition-all duration-500 animate-fadeInUp flex flex-col justify-between"
                        :style="{ 'animation-delay': `${0.1 * (index % 6)}s` }"
                    >
                        <!-- Card background with overlay -->
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-[#201444] via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10"
                        ></div>

                        <!-- Tour image with zoom effect -->
                        <div class="relative h-56 overflow-hidden">
                            <img
                                :src="tour.image"
                                :alt="tour.title"
                                class="h-full w-full object-cover transform transition-transform duration-700 group-hover:scale-110"
                            />

                            <!-- Country badge -->
                            <div
                                class="absolute top-4 right-4 bg-gradient-to-r from-purple-600 to-indigo-600 text-white text-xs px-3 py-1 rounded-full shadow-md z-20"
                            >
                                {{ tour.country }}
                            </div>

                            <!-- Price badge - floating on image -->
                            <div
                                v-if="tour.price"
                                class="absolute bottom-4 left-4 bg-white/90 backdrop-blur-sm text-[#201444] font-bold px-4 py-2 rounded-lg shadow-lg z-20"
                            >
                                ${{ tour.price }}
                            </div>

                            <!-- Duration badge on image -->
                            <div
                                v-if="tour.duration"
                                class="absolute bottom-4 right-4 bg-white/90 backdrop-blur-sm text-amber-700 px-3 py-1 rounded-lg flex items-center shadow-lg z-20"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 mr-1"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                                {{ tour.duration }} days
                            </div>
                        </div>

                        <!-- Card content with fade effects -->
                        <div class="p-6 space-y-4 bg-white flex-grow">
                            <h3
                                class="text-xl font-semibold text-[#201444] group-hover:text-purple-700 transition-colors duration-300"
                            >
                                {{ tour.title }}
                            </h3>

                            <div class="flex flex-wrap gap-2 text-xs">
                                <span
                                    class="bg-indigo-100 text-indigo-800 px-2 py-1 rounded flex items-center"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-3 w-3 mr-1"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                        />
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                        />
                                    </svg>
                                    {{ tour.region }}
                                </span>
                                <span
                                    class="bg-teal-100 text-teal-800 px-2 py-1 rounded flex items-center"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-3 w-3 mr-1"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                                        />
                                    </svg>
                                    {{ tour.city }}
                                </span>
                            </div>

                            <p class="text-sm text-gray-600">
                                {{
                                    expandedTourId === tour.id
                                        ? tour.full_description
                                        : tour.short_description
                                }}
                            </p>

                            <!-- Features Icons -->
                            <div
                                v-if="
                                    tour.min_group_size ||
                                    tour.has_guide ||
                                    tour.accommodation
                                "
                                class="flex space-x-4 pt-2"
                            >
                                <div
                                    v-if="tour.min_group_size"
                                    class="flex items-center text-xs text-gray-500"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 mr-1 text-purple-500"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                                        />
                                    </svg>
                                    {{ tour.min_group_size }}-{{
                                        tour.max_group_size ||
                                        tour.min_group_size
                                    }}
                                    people
                                </div>
                                <div
                                    v-if="tour.has_guide"
                                    class="flex items-center text-xs text-gray-500"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 mr-1 text-purple-500"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                        />
                                    </svg>
                                    Tour Guide
                                </div>
                                <div
                                    v-if="tour.accommodation"
                                    class="flex items-center text-xs text-gray-500"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 mr-1 text-purple-500"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                                        />
                                    </svg>
                                    Accommodation
                                </div>
                            </div>
                        </div>

                        <!-- Card footer with enhanced buttons -->
                        <button
                            class="text-sm font-medium text-purple-700 hover:text-purple-900 flex items-center cursor-pointer"
                            @click="toggleDescription(tour.id)"
                        >
                            {{
                                expandedTourId === tour.id
                                    ? "Show Less"
                                    : "Learn More"
                            }}
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 ml-1"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    v-if="expandedTourId === tour.id"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 15l7-7 7 7"
                                />
                                <path
                                    v-else
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"
                                />
                            </svg>
                        </button>

                        <!-- Hover effect overlay - indicates clickable card -->
                        <div
                            class="absolute inset-0 border-2 border-transparent group-hover:border-purple-500 rounded-2xl pointer-events-none transition-all duration-300 z-20"
                        ></div>
                    </div>
                </div>

                <!-- Replace the pagination placeholder with functional pagination -->
                <div v-if="filteredTours.length > 0" class="mt-12">
                    <!-- Pagination stats information -->
                    <div class="text-center text-gray-600 mb-4">
                        Showing {{ paginatedTours.length }} of
                        {{ filteredTours.length }} tours - Page
                        {{ currentPage }} of {{ totalPages }}
                    </div>

                    <!-- Enhanced pagination controls -->
                    <div class="flex justify-center">
                        <div class="inline-flex rounded-md shadow">
                            <!-- Previous page button -->
                            <button
                                @click="goToPreviousPage"
                                :disabled="currentPage === 1"
                                :class="[
                                    'py-2 px-4 border border-gray-300 text-sm font-medium rounded-l-md transition-colors',
                                    currentPage === 1
                                        ? 'bg-gray-100 text-gray-400 cursor-not-allowed'
                                        : 'bg-white text-gray-700 hover:bg-gray-50',
                                ]"
                            >
                                <span class="flex items-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 mr-1"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 19l-7-7 7-7"
                                        />
                                    </svg>
                                    Previous
                                </span>
                            </button>

                            <!-- Page numbers -->
                            <template
                                v-for="(page, index) in pageNumbers"
                                :key="index"
                            >
                                <!-- Ellipsis (not clickable) -->
                                <span
                                    v-if="page === '...'"
                                    class="py-2 px-4 border-t border-b border-gray-300 bg-white text-sm font-medium text-gray-700"
                                >
                                    ...
                                </span>

                                <!-- Page number button -->
                                <button
                                    v-else
                                    @click="goToPage(page)"
                                    :class="[
                                        'py-2 px-4 border-t border-b border-gray-300 text-sm font-medium transition-colors',
                                        currentPage === page
                                            ? 'bg-purple-600 text-white border-purple-600'
                                            : 'bg-white text-gray-700 hover:bg-gray-50',
                                    ]"
                                >
                                    {{ page }}
                                </button>
                            </template>

                            <!-- Next page button -->
                            <button
                                @click="goToNextPage"
                                :disabled="currentPage === totalPages"
                                :class="[
                                    'py-2 px-4 border border-gray-300 text-sm font-medium rounded-r-md transition-colors',
                                    currentPage === totalPages
                                        ? 'bg-gray-100 text-gray-400 cursor-not-allowed'
                                        : 'bg-white text-gray-700 hover:bg-gray-50',
                                ]"
                            >
                                <span class="flex items-center">
                                    Next
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 ml-1"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 5l7 7-7 7"
                                        />
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Pagination placeholder - you can implement actual pagination if needed -->
                <div
                    v-if="filteredTours.length > 9"
                    class="mt-12 flex justify-center"
                >
                    <div class="inline-flex rounded-md shadow">
                        <button
                            class="py-2 px-4 border border-gray-300 bg-white text-sm font-medium rounded-l-md text-gray-700 hover:bg-gray-50"
                        >
                            Previous
                        </button>
                        <button
                            class="py-2 px-4 border-t border-b border-gray-300 bg-purple-600 text-sm font-medium text-white"
                        >
                            1
                        </button>
                        <button
                            class="py-2 px-4 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50"
                        >
                            2
                        </button>
                        <button
                            class="py-2 px-4 border border-gray-300 bg-white text-sm font-medium rounded-r-md text-gray-700 hover:bg-gray-50"
                        >
                            Next
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Create Custom Tour Modal - Same as original, with minor enhancements -->
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
                    class="inline-block align-bottom bg-white rounded-3xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full animate-scaleUp"
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
                                    for="full_name"
                                    class="block text-sm font-medium text-gray-700 mb-1"
                                    >Full Name*</label
                                >
                                <input
                                    id="full_name"
                                    v-model="customTour.full_name"
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
                                    for="group_size"
                                    class="block text-sm font-medium text-gray-700 mb-1"
                                    >Group Size*</label
                                >
                                <input
                                    id="group_size"
                                    v-model.number="customTour.group_size"
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
                                    for="start_date"
                                    class="block text-sm font-medium text-gray-700 mb-1"
                                    >Preferred Start Date</label
                                >
                                <input
                                    id="start_date"
                                    v-model="customTour.start_date"
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
                                    for="additional_info"
                                    class="block text-sm font-medium text-gray-700 mb-1"
                                    >Additional Information</label
                                >
                                <textarea
                                    id="additional_info"
                                    v-model="customTour.additional_info"
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
                                class="px-8 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-medium rounded-lg hover:opacity-90 transition-opacity flex items-center"
                                :disabled="isSubmitting"
                            >
                                <svg
                                    v-if="isSubmitting"
                                    class="animate-spin -ml-1 mr-2 h-4 w-4 text-white"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <circle
                                        class="opacity-25"
                                        cx="12"
                                        cy="12"
                                        r="10"
                                        stroke="currentColor"
                                        stroke-width="4"
                                    ></circle>
                                    <path
                                        class="opacity-75"
                                        fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                                    ></path>
                                </svg>
                                <span v-if="isSubmitting">Submitting...</span>
                                <span v-else>Submit Request</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Success Modal - Enhanced with animation -->
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
                    class="inline-block align-bottom bg-white rounded-3xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full animate-scaleUp"
                >
                    <div class="bg-green-100 p-8 text-center">
                        <div
                            class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-600 text-white animate-bounce"
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
                                class="px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-medium rounded-lg hover:shadow-lg transition-all transform hover:translate-y-px"
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
import { ref, computed, onMounted, watch } from "vue";

const tours = ref([]);
const showCustomTourForm = ref(false);
const showSuccessModal = ref(false);
const isSubmitting = ref(false);

// Pagination state
const currentPage = ref(1);
const itemsPerPage = ref(10);
const totalPages = computed(() =>
    Math.ceil(filteredTours.value.length / itemsPerPage.value)
);

const customTour = ref({
    full_name: "",
    email: "",
    phone: "",
    group_size: null,
    destinations: "",
    start_date: "",
    duration: null,
    interests: "",
    additional_info: "",
});

const filters = ref({
    country: "",
    region: "",
    city: "",
});

// Check if any filters are active
const hasActiveFilters = computed(() => {
    return filters.value.country || filters.value.region || filters.value.city;
});

const expandedTourId = ref(null);

const toggleDescription = (id) => {
    expandedTourId.value = expandedTourId.value === id ? null : id;
};

const countries = ref([]);
const uniqueCountries = computed(() =>
    [...new Set(tours.value.map((t) => t.country))].sort()
);

onMounted(async () => {
    try {
        const [toursRes, countriesRes] = await Promise.all([
            axios.get("/api/tours"),
            axios.get("/api/countries"),
        ]);

        tours.value = (
            Array.isArray(toursRes.data) ? toursRes.data : toursRes.data.data
        ).map((tour) => ({
            ...tour,
            showFull: false,
            // Add placeholder feature flags for demo - you can replace with real data
            has_guide: Math.random() > 0.5,
            accommodation: Math.random() > 0.5,
        }));

        countries.value = countriesRes.data;

        // Add staggered animation on load
        staggerTourCards();
    } catch (error) {
        console.error("Failed to load tours or countries:", error);
        tours.value = [];
        countries.value = [];
    }
});

// Reset to first page when filters change
watch(
    filters,
    () => {
        currentPage.value = 1;
    },
    { deep: true }
);

// Function to stagger the animation of tour cards
const staggerTourCards = () => {
    const cards = document.querySelectorAll(".tour-card");
    cards.forEach((card, index) => {
        setTimeout(() => {
            card.classList.add("animate-fadeInUp");
        }, index * 100);
    });
};

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

// Get paginated tours for the current page
const paginatedTours = computed(() => {
    const startIndex = (currentPage.value - 1) * itemsPerPage.value;
    const endIndex = startIndex + itemsPerPage.value;
    return filteredTours.value.slice(startIndex, endIndex);
});

// Generate page numbers for pagination
const pageNumbers = computed(() => {
    const pages = [];

    // Always include first page
    pages.push(1);

    // Calculate range of pages to show
    const rangeStart = Math.max(2, currentPage.value - 1);
    const rangeEnd = Math.min(totalPages.value - 1, currentPage.value + 1);

    // Add ellipsis after first page if needed
    if (rangeStart > 2) {
        pages.push("...");
    }

    // Add page numbers in range
    for (let i = rangeStart; i <= rangeEnd; i++) {
        pages.push(i);
    }

    // Add ellipsis before last page if needed
    if (rangeEnd < totalPages.value - 1) {
        pages.push("...");
    }

    // Always include last page if more than one page
    if (totalPages.value > 1) {
        pages.push(totalPages.value);
    }

    return pages;
});

const goToPage = (page) => {
    if (typeof page === "number" && page >= 1 && page <= totalPages.value) {
        currentPage.value = page;
        window.scrollTo({ top: 0, behavior: "smooth" });
    }
};

const goToPreviousPage = () => {
    if (currentPage.value > 1) {
        currentPage.value--;
        window.scrollTo({ top: 0, behavior: "smooth" });
    }
};

const goToNextPage = () => {
    if (currentPage.value < totalPages.value) {
        currentPage.value++;
        window.scrollTo({ top: 0, behavior: "smooth" });
    }
};

// Reset all filters
const resetFilters = () => {
    filters.value = {
        country: "",
        region: "",
        city: "",
    };
    currentPage.value = 1;
};

const submitCustomTour = async () => {
    isSubmitting.value = true;

    try {
        await axios.post("/api/custom-tours", customTour.value);

        customTour.value = {
            full_name: "",
            email: "",
            phone: "",
            group_size: null,
            destinations: "",
            start_date: "",
            duration: null,
            interests: "",
            additional_info: "",
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

/* Parallax background effect */
.parallax-bg {
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    transform: translateZ(0);
}

/* Card hover effect */
.tour-card {
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
        0 4px 6px -2px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
}

.tour-card:hover {
    box-shadow: 0 20px 25px -5px rgba(102, 126, 234, 0.25),
        0 10px 10px -5px rgba(102, 126, 234, 0.2);
    transform: translateY(-8px);
}

/* Animations */
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes scaleUp {
    from {
        opacity: 0;
        transform: scale(0.95);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.animate-fadeIn {
    animation: fadeIn 0.8s ease-out forwards;
}

.animate-fadeInUp {
    animation: fadeInUp 0.5s ease-out forwards;
    opacity: 0;
    transform: translateY(20px);
}

.animate-scaleUp {
    animation: scaleUp 0.3s ease-out forwards;
}
/* Add these to your existing <style> section */

/* Pagination transition effects */
.page-enter-active,
.page-leave-active {
    transition: opacity 0.3s, transform 0.3s;
}

.page-enter-from,
.page-leave-to {
    opacity: 0;
    transform: translateY(20px);
}

/* Button transitions */
button {
    transition: all 0.2s ease;
}

/* Disabled button styles */
button:disabled {
    cursor: not-allowed;
    opacity: 0.6;
}

/* Active page number highlight pulse effect */
@keyframes pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(124, 58, 237, 0.5);
    }
    70% {
        box-shadow: 0 0 0 6px rgba(124, 58, 237, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(124, 58, 237, 0);
    }
}

/* Apply the pulse animation to the active page button */
.bg-purple-600.text-white {
    animation: pulse 2s infinite;
}

/* Stagger animation for tour cards is now handled in JS for better control */

@media (max-width: 768px) {
    .tour-card:hover {
        transform: translateY(-4px);
    }
}
</style>
