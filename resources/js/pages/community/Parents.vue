<template>
    <div class="font-sans bg-gray-50">
        <!-- Hero Section -->
        <section
            class="relative min-h-[80vh] bg-cover bg-center flex items-center"
            style="
                background-image: url(https://img.freepik.com/free-photo/active-family-couple-children-hiking-along-seaside-walking-path-boy-riding-dads-neck-full-length-nature-recreation-concept_74855-11512.jpg?t=st=1745411071~exp=1745414671~hmac=bcf6ee13b3825680da2dec24d08a3de9a57d9beb9d1fbf6ac3ebaef7f9d46b6d&w=740);
            "
        >
            <div class="absolute inset-0"></div>
            <div class="relative z-10 container mx-auto px-6 text-center">
                <div class="max-w-3xl mx-auto">
                    <div class="flex justify-center mb-6">
                        <h1
                            class="text-4xl md:text-5xl lg:text-6xl font-bold text-purple"
                        >
                            For Parents
                        </h1>
                    </div>
                    <p class="text-xl md:text-4xl text-white/90 mb-8">
                        Safe, Educational Travel Experiences for Your Child
                    </p>

                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                        <v-btn
                            color="primary"
                            size="x-large"
                            rounded="lg"
                            class="px-8 py-3 font-semibold"
                            :to="{ path: '/parent-faq' }"
                        >
                            <v-icon left>mdi-help-circle</v-icon>
                            Parent FAQs
                        </v-btn>
                        <v-btn
                            variant="outlined"
                            color="white"
                            size="x-large"
                            rounded="lg"
                            class="px-8 py-3 font-semibold"
                            :to="{ path: '/safety' }"
                        >
                            <v-icon left>mdi-shield-check</v-icon>
                            Safety Info
                        </v-btn>
                    </div>
                </div>
            </div>
        </section>

        <!-- Why Parents Choose Us -->
        <section class="py-16 md:py-24 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h2
                        class="text-3xl md:text-4xl font-bold text-purple-900 mb-4"
                    >
                        Why Parents Trust Our Educational Tours
                    </h2>
                    <p class="text-lg text-gray-600">
                        We combine safety, education, and personal growth to
                        create meaningful travel experiences.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div
                        class="bg-white rounded-xl shadow-md p-8 border border-gray-100 hover:shadow-lg transition-all text-center"
                    >
                        <div
                            class="w-14 h-14 mx-auto mb-4 rounded-full bg-purple-100 flex items-center justify-center text-purple-600"
                        >
                            <v-icon size="28">mdi-shield-lock</v-icon>
                        </div>
                        <h3 class="text-xl font-semibold text-purple-900 mb-3">
                            Safety First
                        </h3>
                        <p class="text-gray-600">
                            24/7 support, vetted accommodations, and trained
                            staff ensure your child's wellbeing throughout their
                            journey.
                        </p>
                    </div>

                    <div
                        class="bg-white rounded-xl shadow-md p-8 border border-gray-100 hover:shadow-lg transition-all text-center"
                    >
                        <div class="flex justify-center text-purple-600 mb-4">
                            <v-icon size="48">mdi-school</v-icon>
                        </div>
                        <h3 class="text-xl font-semibold text-purple-900 mb-3">
                            Educational Value
                        </h3>
                        <p class="text-gray-600">
                            Curriculum-aligned experiences that complement
                            classroom learning and broaden perspectives.
                        </p>
                    </div>

                    <div
                        class="bg-white rounded-xl shadow-md p-8 border border-gray-100 hover:shadow-lg transition-all text-center"
                    >
                        <div class="flex justify-center text-purple-600 mb-4">
                            <v-icon size="48">mdi-account-group</v-icon>
                        </div>
                        <h3 class="text-xl font-semibold text-purple-900 mb-3">
                            Personal Growth
                        </h3>
                        <p class="text-gray-600">
                            Students return more confident, independent, and
                            culturally aware.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Safety Deep Dive -->
        <section class="py-16 md:py-24 bg-purple-50">
            <div class="container mx-auto px-6">
                <div class="flex flex-col lg:flex-row items-center gap-12">
                    <div class="lg:w-1/2">
                        <v-img
                            src="https://img.freepik.com/free-photo/safari-casual-hipster-camping-off-morning_1253-1036.jpg?t=st=1745412884~exp=1745416484~hmac=fbc8d38ca2d60f1f46dd9badada17a0d6cea0ea514f86f2581f6932a3b1cf158&w=1380"
                            class="rounded-xl shadow-lg"
                            aspect-ratio="16/9"
                            cover
                        ></v-img>
                    </div>
                    
                    <div class="lg:w-1/2">
                        <h2
                            class="text-3xl md:text-4xl font-bold text-gray-900 mb-6"
                        >
                            Our Comprehensive Safety Approach
                        </h2>
                        <p class="text-lg text-gray-600 mb-8">
                            We implement multiple layers of protection to give
                            you peace of mind while your child explores the
                            world.
                        </p>

                        <div class="space-y-6">
                            <div
                                v-for="(item, i) in safetyFeatures"
                                :key="i"
                                class="flex items-start"
                            >
                                <div
                                    class="flex-shrink-0 bg-purple-100 rounded-lg p-2 mr-4"
                                >
                                    <v-icon color="purple">{{
                                        item.icon
                                    }}</v-icon>
                                </div>
                                <div>
                                    <h3
                                        class="text-lg font-semibold text-gray-900"
                                    >
                                        {{ item.title }}
                                    </h3>
                                    <p class="text-gray-600">
                                        {{ item.description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Educational Benefits -->
        <section class="py-16 md:py-24 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h2
                        class="text-3xl md:text-4xl font-bold text-purple-900 mb-4"
                    >
                        More Than Just a Trip
                    </h2>
                    <p class="text-lg text-gray-600">
                        Our tours are designed to deliver lasting educational
                        impact.
                    </p>
                </div>

                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6"
                >
                <div
                v-for="(benefit, i) in educationalBenefits"
                :key="i"
                class="bg-gray-50 p-6 rounded-lg border border-gray-200 hover:border-purple-400 transition-all text-center"
              >
                <div class="flex justify-center mb-3 text-purple-600">
                  <v-icon size="36">{{ benefit.icon }}</v-icon>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                  {{ benefit.title }}
                </h3>
                <p class="text-gray-600 text-sm">
                  {{ benefit.description }}
                </p>
              </div>
              
                </div>
            </div>
        </section>

        <!-- Parent Testimonials -->
        <section class="py-16 md:py-24 bg-purple-50">
            <div class="container mx-auto px-6">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h2
                        class="text-3xl md:text-4xl font-bold text-purple-900 mb-4"
                    >
                        What Parents Say
                    </h2>
                    <p class="text-lg text-gray-600">
                        Hear from families who have experienced our educational
                        tours.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div
                        v-for="(testimonial, i) in parentTestimonials"
                        :key="i"
                        class="bg-white p-8 rounded-xl shadow-md"
                    >
                        <div class="flex items-center mb-6">
                            <div
                                class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 mr-4 px-3"
                            >
                                <v-icon>mdi-account</v-icon>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">
                                    {{ testimonial.name }}
                                </h4>
                                <p class="text-sm text-gray-500">
                                    Parent of {{ testimonial.student }}
                                </p>
                            </div>
                        </div>
                        <div class="flex mb-4 px-4">
                            <v-rating
                                v-model="testimonial.rating"
                                color="amber"
                                readonly
                                size="small"
                                density="compact"
                            ></v-rating>
                        </div>
                        <p class="text-gray-700 italic px-4">
                            "{{ testimonial.quote }}"
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section
            class="py-16 md:py-24 bg-gradient-to-r from-purple-600 to-indigo-700 text-white"
        >
            <div class="container mx-auto px-6 text-center">
                <div class="max-w-3xl mx-auto">
                    <h2 class="text-3xl md:text-4xl font-bold  mb-6">
                        Have Questions About Our Tours?
                    </h2>
                    <p class="text-xl mb-8 text-black/90">
                        Our parent support team is ready to address all your
                        concerns and help you make an informed decision.
                    </p>
                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                        <v-btn
                            color="white"
                            size="x-large"
                            rounded="lg"
                            class="px-8 py-3 font-semibold text-purple-700"
                            :to="{ path: '/contact' }"
                        >
                            <v-icon left>mdi-email</v-icon>
                            Email Our Team
                        </v-btn>
                        <v-btn
                            variant="outlined"
                            color="white"
                            size="x-large"
                            rounded="lg"
                            class="px-8 py-3 font-semibold"
                            :to="{ path: '/parent-resources' }"
                        >
                            <v-icon left>mdi-file-document</v-icon>
                            View Resources
                        </v-btn>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
import adorn from "@/images/adorn.png";
const safetyFeatures = [
    {
        icon: "mdi-account-supervisor",
        title: "Trained Group Leaders",
        description:
            "Experienced educators with first-aid certification and safety training",
    },
    {
        icon: "mdi-cellphone",
        title: "24/7 Support",
        description:
            "Dedicated emergency phone line available throughout the tour",
    },
    {
        icon: "mdi-bed",
        title: "Vetted Accommodations",
        description:
            "Hotels and residences selected for safety and student-friendly environments",
    },
    {
        icon: "mdi-bus",
        title: "Secure Transportation",
        description:
            "Professional drivers and maintained vehicles for all ground travel",
    },
];

const educationalBenefits = [
    {
        icon: "mdi-globe-model",
        title: "Cultural Immersion",
        description:
            "Authentic interactions with local communities and traditions",
    },
    {
        icon: "mdi-history",
        title: "Historical Context",
        description: "Firsthand experiences at significant historical sites",
    },
    {
        icon: "mdi-chart-line",
        title: "Academic Enhancement",
        description:
            "Reinforces classroom learning through real-world applications",
    },
    {
        icon: "mdi-account-arrow-up",
        title: "Personal Growth",
        description: "Develops independence, confidence, and global awareness",
    },
];

const parentTestimonials = [
    {
        name: "Jennifer K.",
        student: "Sophomore, age 16",
        quote: "My daughter returned from her trip to Spain more confident and curious about the world. The daily updates from the tour leaders gave me peace of mind throughout her journey.",
        rating: 5,
    },
    {
        name: "Michael T.",
        student: "Junior, age 17",
        quote: "The educational depth of the Japan tour exceeded our expectations. Our son came home with a new appreciation for cultural differences and even started learning Japanese!",
        rating: 5,
    },
];
</script>

<style scoped>
.animate-spin-slow {
    animation: spin 15s linear infinite;
}

@keyframes spin {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

/* Smooth scrolling for anchor links */
html {
    scroll-behavior: smooth;
}
</style>
