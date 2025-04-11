<template>
    <div class="font-sans bg-gray-50">
        <!-- Hero Section -->
        <section
            class="relative min-h-[80vh] bg-cover bg-center flex items-center"
            style="background-image: url('/images/teacher-hero.jpg')"
        >
            <div class="absolute inset-0 bg-purple-900/70"></div>
            <div class="relative z-10 container mx-auto px-6 text-center">
                <div class="max-w-3xl mx-auto">
                    <h1
                        class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6"
                    >
                        Transform Learning Through Global Experiences
                    </h1>
                    <p class="text-xl text-white/90 mb-8">
                        Lead your students on unforgettable educational journeys
                        that bring classroom lessons to life.
                    </p>
                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                        <v-btn
                            color="primary"
                            size="x-large"
                            rounded="lg"
                            class="px-8 py-3 font-semibold"
                            :to="{ path: '/plan-tour' }"
                        >
                            Plan Your Tour
                        </v-btn>
                        <v-btn
                            variant="outlined"
                            color="white"
                            size="x-large"
                            rounded="lg"
                            class="px-8 py-3 font-semibold"
                            :to="{ path: '/teacher-resources' }"
                        >
                            Explore Resources
                        </v-btn>
                    </div>
                </div>
            </div>
        </section>

        <!-- Benefits Section -->
        <section class="py-16 md:py-24 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h2
                        class="text-3xl md:text-4xl font-bold text-gray-900 mb-4"
                    >
                        Why Teachers Love Our Tours
                    </h2>
                    <p class="text-lg text-gray-600">
                        Designed by educators for educators, our tours
                        seamlessly integrate with your curriculum while
                        providing transformative experiences.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div
                        class="bg-white rounded-xl shadow-md p-8 border border-gray-100 hover:shadow-lg transition-all"
                    >
                        <div class="text-purple-600 mb-4">
                            <v-icon size="48">mdi-book-education</v-icon>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">
                            Curriculum Integration
                        </h3>
                        <p class="text-gray-600">
                            Pre-designed lesson plans and activities that align
                            with common core standards and learning objectives.
                        </p>
                    </div>

                    <div
                        class="bg-white rounded-xl shadow-md p-8 border border-gray-100 hover:shadow-lg transition-all"
                    >
                        <div class="text-purple-600 mb-4">
                            <v-icon size="48">mdi-certificate</v-icon>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">
                            Professional Development
                        </h3>
                        <p class="text-gray-600">
                            Earn continuing education credits and recognition
                            for your leadership in global education.
                        </p>
                    </div>

                    <div
                        class="bg-white rounded-xl shadow-md p-8 border border-gray-100 hover:shadow-lg transition-all"
                    >
                        <div class="text-purple-600 mb-4">
                            <v-icon size="48">mdi-account-group</v-icon>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">
                            Student Transformation
                        </h3>
                        <p class="text-gray-600">
                            Witness remarkable growth in your students'
                            confidence, independence, and global awareness.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Resources Section -->
        <section class="py-16 md:py-24 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="flex flex-col lg:flex-row items-center gap-12">
                    <div class="lg:w-1/2">
                        <v-img
                            src="/images/teacher-resources.jpg"
                            class="rounded-xl shadow-lg"
                            aspect-ratio="16/9"
                            cover
                        ></v-img>
                    </div>
                    <div class="lg:w-1/2">
                        <h2
                            class="text-3xl md:text-4xl font-bold text-gray-900 mb-6"
                        >
                            Comprehensive Teacher Resources
                        </h2>
                        <p class="text-lg text-gray-600 mb-8">
                            We provide everything you need to plan, promote, and
                            execute a successful educational tour.
                        </p>

                        <div class="space-y-6">
                            <div
                                v-for="(resource, i) in resources"
                                :key="i"
                                class="flex items-start"
                            >
                                <div
                                    class="flex-shrink-0 bg-purple-100 rounded-lg p-2 mr-4"
                                >
                                    <v-icon color="purple">{{
                                        resource.icon
                                    }}</v-icon>
                                </div>
                                <div>
                                    <h3
                                        class="text-lg font-semibold text-gray-900"
                                    >
                                        {{ resource.title }}
                                    </h3>
                                    <p class="text-gray-600">
                                        {{ resource.description }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <v-btn
                            color="primary"
                            size="large"
                            rounded="lg"
                            class="mt-8 px-8 py-3 font-semibold"
                        >
                            Download Resource Kit
                        </v-btn>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section class="py-16 md:py-24 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h2
                        class="text-3xl md:text-4xl font-bold text-gray-900 mb-4"
                    >
                        Hear From Fellow Educators
                    </h2>
                    <p class="text-lg text-gray-600">
                        Teachers share how our educational tours have
                        transformed their classrooms.
                    </p>
                </div>

                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"
                >
                    <div
                        v-for="(testimonial, i) in testimonials"
                        :key="i"
                        class="bg-gray-50 rounded-xl p-8"
                    >
                        <div class="flex items-center mb-4">
                            <div
                                class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 mr-4"
                            >
                                <v-icon>mdi-account</v-icon>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">
                                    {{ testimonial.name }}
                                </h4>
                                <p class="text-sm text-gray-500">
                                    {{ testimonial.role }}
                                </p>
                            </div>
                        </div>
                        <p class="text-gray-700 italic">
                            "{{ testimonial.quote }}"
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section
            class="py-16 md:py-24 bg-gradient-to-r from-purple-600 to-indigo-700"
        >
            <div class="container mx-auto px-6 text-center">
                <div class="max-w-3xl mx-auto">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                        Ready to Lead the Journey?
                    </h2>
                    <p class="text-xl text-white/90 mb-8">
                        Join thousands of educators who are expanding their
                        students' horizons through global learning experiences.
                    </p>
                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                        <v-btn
                            color="white"
                            size="x-large"
                            rounded="lg"
                            class="px-8 py-3 font-semibold text-purple-700"
                            :to="{ path: '/contact' }"
                        >
                            Speak to a Tour Consultant
                        </v-btn>
                        <v-btn
                            variant="outlined"
                            color="white"
                            size="x-large"
                            rounded="lg"
                            class="px-8 py-3 font-semibold"
                            :to="{ path: '/teacher-faq' }"
                        >
                            View FAQs
                        </v-btn>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
const resources = [
    {
        icon: "mdi-file-document",
        title: "Pre-Departure Materials",
        description:
            "Lesson plans, activities, and reading lists to prepare students",
    },
    {
        icon: "mdi-email",
        title: "Parent Communication Templates",
        description:
            "Ready-to-use emails and presentations for parent meetings",
    },
    {
        icon: "mdi-cash-multiple",
        title: "Fundraising Guides",
        description: "Proven strategies to help students finance their trip",
    },
    {
        icon: "mdi-check-decagram",
        title: "Administrative Approval Kit",
        description: "Documents to streamline school approval processes",
    },
];

const testimonials = [
    {
        name: "Sarah Johnson",
        role: "High School History Teacher",
        quote: "The curriculum connections made our tour to Rome an extension of our classroom. Students returned with deeper understanding and enthusiasm.",
    },
    {
        name: "Michael Chen",
        role: "Middle School Science Teacher",
        quote: "The professional development component gave me new teaching strategies I still use in my classroom today.",
    },
    {
        name: "Emily Rodriguez",
        role: "Language Department Chair",
        quote: "Watching my students gain confidence speaking Spanish in Barcelona was more rewarding than any test score.",
    },
];
</script>

<style scoped>
/* Smooth scrolling for anchor links */
html {
    scroll-behavior: smooth;
}

/* Custom animation for elements */
.fade-in {
    animation: fadeIn 1s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
