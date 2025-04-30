<template>
    <div class="relative bg-white text-[#201444] font-poppins overflow-hidden">
        <!-- Artistic Background Elements -->
        <div class="fixed inset-0 z-0 opacity-10 pointer-events-none">
            <div class="absolute top-0 left-0 w-full h-full">
                <svg
                    class="w-full h-full"
                    viewBox="0 0 1200 800"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <defs>
                        <linearGradient
                            id="gradient"
                            x1="0%"
                            y1="0%"
                            x2="100%"
                            y2="100%"
                        >
                            <stop
                                offset="0%"
                                stop-color="#6b46c1"
                                stop-opacity="0.3"
                            />
                            <stop
                                offset="100%"
                                stop-color="#4f46e5"
                                stop-opacity="0.3"
                            />
                        </linearGradient>
                    </defs>
                    <path
                        d="M0,0 L1200,0 L1200,800 L0,800 Z"
                        fill="url(#gradient)"
                    />
                    <circle
                        cx="600"
                        cy="400"
                        r="300"
                        fill="none"
                        stroke="#6b46c1"
                        stroke-width="2"
                        class="animate-pulse-slow"
                    />
                    <path
                        d="M300,150 Q600,300 900,150"
                        fill="none"
                        stroke="#4f46e5"
                        stroke-width="2"
                        class="animate-float"
                    />
                    <path
                        d="M300,650 Q600,500 900,650"
                        fill="none"
                        stroke="#6b46c1"
                        stroke-width="2"
                        class="animate-float-reverse"
                    />
                </svg>
            </div>
        </div>

        <!-- Hero Section with Artistic Elements -->
        <section
            class="relative min-h-screen flex items-center justify-center overflow-hidden"
        >
            <div
                class="absolute inset-0 bg-gradient-to-br from-purple-900/80 to-indigo-900/80"
            ></div>
            <!-- Floating Education Icons -->
            <div class="absolute inset-0 pointer-events-none">
                <div
                    class="absolute top-1/4 left-1/4 text-white/20 text-6xl animate-float-slow"
                >
                    🌍
                </div>
                <div
                    class="absolute top-2/3 left-1/3 text-white/20 text-5xl animate-float-medium"
                >
                    🔬
                </div>
                <div
                    class="absolute top-1/5 right-1/4 text-white/20 text-7xl animate-float-fast"
                >
                    📚
                </div>
                <div
                    class="absolute bottom-1/4 right-1/3 text-white/20 text-6xl animate-float-reverse"
                >
                    🎭
                </div>
            </div>
            <div class="relative z-10 container mx-auto px-4 text-center">
                <h1
                    class="text-5xl md:text-7xl font-extrabold text-white mb-4 animate-fade-in"
                >
                    <span
                        class="bg-clip-text text-transparent bg-gradient-to-r from-purple-200 to-indigo-100"
                    >
                        Discover. Learn. Transform.
                    </span>
                </h1>
                <p
                    class="text-xl text-purple-100 mb-8 max-w-2xl mx-auto animate-fade-in-delay"
                >
                    Educational journeys that turn the world into your classroom
                </p>
                <v-btn
                    color="primary"
                    class="rounded-full px-16 h-60 text-xl font-semibold shadow-xl hover:scale-105 transition-transform mt-10"
                    elevation="8"
                >
                    Explore Learning Adventures
                </v-btn>
            </div>
        </section>

        <!-- Educational Paths Section -->
        <section class="py-20 bg-gradient-to-br from-white to-purple-50">
            <div class="container mx-auto px-4">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold mb-6 animate-fade-in">
                        Educational Journeys
                    </h2>
                    <div class="w-24 h-1 bg-purple-500 mx-auto mb-6"></div>
                    <p class="text-lg text-gray-700 max-w-2xl mx-auto">
                        Where curriculum meets adventure, and textbooks come to
                        life
                    </p>
                </div>
                <div class="grid gap-16 md:grid-cols-2 items-center">
                    <!-- Block 1: Interactive History -->
                    <div class="order-2 md:order-1 space-y-4">
                        <div class="flex items-center space-x-2 mb-2">
                            <div
                                class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center"
                            >
                                <span class="text-purple-600 text-lg">01</span>
                            </div>
                            <div
                                class="h-px flex-grow bg-gradient-to-r from-purple-500 to-transparent"
                            ></div>
                        </div>
                        <h2 class="text-4xl font-bold animate-slide-in-left">
                            Interactive History
                        </h2>
                        <p class="text-lg text-gray-700 animate-fade-in">
                            Step into the past at heritage sites where expert
                            guides transform historical facts into unforgettable
                            stories. From ancient kingdoms to freedom struggles,
                            history becomes an immersive experience.
                        </p>
                        <v-chip color="purple" text-color="white" class="mt-4"
                            >Cultural Heritage</v-chip
                        >
                    </div>
                    <div
                        class="order-1 md:order-2 overflow-hidden rounded-2xl shadow-xl"
                    ></div>

                    <!-- Block 2: Global Connections -->
                    <div
                        class="order-2 overflow-hidden rounded-2xl shadow-xl"
                    ></div>
                    <div class="order-1 space-y-4">
                        <div class="flex items-center space-x-2 mb-2">
                            <div
                                class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center"
                            >
                                <span class="text-purple-600 text-lg">02</span>
                            </div>
                            <div
                                class="h-px flex-grow bg-gradient-to-r from-purple-500 to-transparent"
                            ></div>
                        </div>
                        <h2 class="text-4xl font-bold animate-slide-in-right">
                            Global Connections
                        </h2>
                        <p class="text-lg text-gray-700 animate-fade-in">
                            Collaborate with students from diverse backgrounds,
                            exchange perspectives, and build cross-cultural
                            communication skills that last a lifetime. These
                            connections extend learning far beyond the
                            classroom.
                        </p>
                        <v-chip color="purple" text-color="white" class="mt-4"
                            >Cultural Exchange</v-chip
                        >
                    </div>

                    <!-- Block 3: Experiential Learning -->
                    <div class="order-2 md:order-1 space-y-4">
                        <div class="flex items-center space-x-2 mb-2">
                            <div
                                class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center"
                            >
                                <span class="text-purple-600 text-lg">03</span>
                            </div>
                            <div
                                class="h-px flex-grow bg-gradient-to-r from-purple-500 to-transparent"
                            ></div>
                        </div>
                        <h2 class="text-4xl font-bold animate-slide-in-left">
                            Experiential Learning
                        </h2>
                        <p class="text-lg text-gray-700 animate-fade-in">
                            Climb mountains, conduct field research, and solve
                            real-world challenges. Our hands-on approach
                            develops critical thinking, resilience, and
                            leadership skills while creating unforgettable
                            memories.
                        </p>
                        <v-chip color="purple" text-color="white" class="mt-4"
                            >Adventure Education</v-chip
                        >
                    </div>
                    <div
                        class="order-1 md:order-2 overflow-hidden rounded-2xl shadow-xl"
                    ></div>
                </div>
            </div>
        </section>

        <!-- Curriculum Integration Section -->
        <section class="py-20 relative overflow-hidden">
            <div class="absolute inset-0 bg-purple-900 opacity-5 z-0">
                <div
                    class="absolute w-full h-full grid grid-cols-8 grid-rows-8"
                >
                    <div
                        v-for="i in 64"
                        :key="i"
                        class="border border-purple-200"
                    ></div>
                </div>
            </div>
            <div class="container mx-auto px-4 relative z-10">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold mb-6">
                        Educational Excellence
                    </h2>
                    <div class="w-24 h-1 bg-purple-500 mx-auto mb-6"></div>
                    <p class="text-lg text-gray-700 max-w-2xl mx-auto">
                        Curriculum-aligned experiences crafted with educators to
                        enhance classroom learning
                    </p>
                </div>

                <div class="grid gap-8 md:grid-cols-3">
                    <v-card
                        class="rounded-xl hover:shadow-xl transition duration-300 hover:translate-y-2 h-full"
                        elevation="3"
                    >
                        <div
                            class="h-2 bg-gradient-to-r from-purple-500 to-indigo-500"
                        ></div>
                        <v-card-title class="text-xl font-bold text-purple-700"
                            >STEAM Exploration</v-card-title
                        >
                        <v-card-text>
                            <p class="mb-4">
                                Watch science, technology, engineering, arts,
                                and mathematics come alive through interactive
                                workshops and real-world applications.
                            </p>
                            <div class="flex flex-wrap gap-2 mt-4">
                                <v-chip
                                    size="small"
                                    color="purple"
                                    variant="outlined"
                                    >Science Labs</v-chip
                                >
                                <v-chip
                                    size="small"
                                    color="purple"
                                    variant="outlined"
                                    >Tech Hubs</v-chip
                                >
                                <v-chip
                                    size="small"
                                    color="purple"
                                    variant="outlined"
                                    >Innovation Centers</v-chip
                                >
                            </div>
                        </v-card-text>
                    </v-card>

                    <v-card
                        class="rounded-xl hover:shadow-xl transition duration-300 hover:translate-y-2 h-full"
                        elevation="3"
                    >
                        <div
                            class="h-2 bg-gradient-to-r from-purple-500 to-indigo-500"
                        ></div>
                        <v-card-title class="text-xl font-bold text-purple-700"
                            >Cultural Immersion</v-card-title
                        >
                        <v-card-text>
                            <p class="mb-4">
                                Develop language fluency and cultural
                                intelligence through guided immersive
                                experiences with local communities and
                                traditions.
                            </p>
                            <div class="flex flex-wrap gap-2 mt-4">
                                <v-chip
                                    size="small"
                                    color="purple"
                                    variant="outlined"
                                    >Language Practice</v-chip
                                >
                                <v-chip
                                    size="small"
                                    color="purple"
                                    variant="outlined"
                                    >Cultural Workshops</v-chip
                                >
                                <v-chip
                                    size="small"
                                    color="purple"
                                    variant="outlined"
                                    >Community Service</v-chip
                                >
                            </div>
                        </v-card-text>
                    </v-card>

                    <v-card
                        class="rounded-xl hover:shadow-xl transition duration-300 hover:translate-y-2 h-full"
                        elevation="3"
                    >
                        <div
                            class="h-2 bg-gradient-to-r from-purple-500 to-indigo-500"
                        ></div>
                        <v-card-title class="text-xl font-bold text-purple-700"
                            >Leadership & Growth</v-card-title
                        >
                        <v-card-text>
                            <p class="mb-4">
                                Build confidence, teamwork, and problem-solving
                                abilities through challenging outdoor activities
                                and collaborative projects.
                            </p>
                            <div class="flex flex-wrap gap-2 mt-4">
                                <v-chip
                                    size="small"
                                    color="purple"
                                    variant="outlined"
                                    >Team Challenges</v-chip
                                >
                                <v-chip
                                    size="small"
                                    color="purple"
                                    variant="outlined"
                                    >Nature Exploration</v-chip
                                >
                                <v-chip
                                    size="small"
                                    color="purple"
                                    variant="outlined"
                                    >Project-Based Learning</v-chip
                                >
                            </div>
                        </v-card-text>
                    </v-card>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section
            class="py-20 bg-gradient-to-br from-purple-900 to-indigo-800 text-white"
        >
            <div class="container mx-auto px-4">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold mb-6">Voices of Discovery</h2>
                    <div class="w-24 h-1 bg-white mx-auto mb-6"></div>
                </div>

                <v-carousel hide-delimiters show-arrows="hover" height="400">
                    <v-carousel-item v-for="(item, i) in 3" :key="i">
                        <div
                            class="flex flex-col items-center justify-center h-full px-8"
                        >
                            <div class="text-6xl text-purple-300 mb-6">"</div>
                            <p
                                class="text-xl italic text-center max-w-3xl mb-8"
                            >
                                Our science class visited the renewable energy
                                center in Cape Town, and it completely
                                transformed how I understand sustainable
                                development. The hands-on experiments connected
                                everything we learned in textbooks to real-world
                                solutions.
                            </p>
                            <div class="flex items-center">
                                <v-avatar
                                    size="64"
                                    color="purple-200"
                                    class="mr-4"
                                >
                                    <span class="text-2xl">{{
                                        ["MS", "JD", "TK"][i]
                                    }}</span>
                                </v-avatar>
                                <div class="text-left">
                                    <h4 class="font-bold">
                                        {{
                                            [
                                                "Maria S.",
                                                "James D.",
                                                "Tanya K.",
                                            ][i]
                                        }}
                                    </h4>
                                    <p class="text-sm text-purple-200">
                                        {{
                                            [
                                                "12th Grade Student",
                                                "Geography Teacher",
                                                "Parent",
                                            ][i]
                                        }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </v-carousel-item>
                </v-carousel>
            </div>
        </section>

        <!-- Final CTA with Artistic Elements -->
        <section class="py-20 relative overflow-hidden">
            <div
                class="absolute inset-0 bg-gradient-to-br from-purple-50 to-indigo-50"
            ></div>

            <div class="container mx-auto px-4 relative z-10 text-center">
                <h2 class="text-4xl font-bold mb-6 animate-fade-in">
                    Begin Your Educational Journey
                </h2>
                <p
                    class="text-lg text-gray-700 mb-10 max-w-2xl mx-auto animate-fade-in-delay"
                >
                    Transform classroom concepts into life-changing experiences
                    with our custom educational tours
                </p>
                <div class="flex flex-wrap justify-center gap-6">
                    <v-btn
                        color="primary"
                        class="rounded-full text-lg px-10  font-semibold shadow-xl hover:scale-105 transition-transform "
                        elevation="8"
                        to="/tours"
                    >
                        Browse Educational Tours
                    </v-btn>
                    <v-btn
                        variant="outlined"
                        color="secondary"
                        class="rounded-full text-lg px-10  font-semibold hover:bg-purple-50 transition"
                        to="/contact"
                    >
                        Request Custom Tour
                    </v-btn>
                </div>

                <!-- Additional Resources for Teachers & Parents -->
                <div
                    class="mt-16 grid md:grid-cols-2 gap-8 max-w-4xl mx-auto text-left"
                >
                    <div
                        class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition"
                    >
                        <h3 class="text-xl font-bold text-purple-700 mb-4 px-3">
                            For Teachers
                        </h3>
                        <p class="text-gray-700 mb-4 px-3">
                            Curriculum guides, pre-trip classroom activities,
                            and post-trip reflection materials to maximize
                            educational impact.
                        </p>
                        <v-btn
                            color="primary"
                            variant="text"
                            to="/teacher-resource"
                        >
                            Teacher Resources
                            <span class="ml-2 px-3">→</span>
                        </v-btn>
                    </div>
                    <div
                        class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition "
                    >
                        <h3 class="text-xl font-bold text-purple-700 mb-4 px-3">
                            For Parents
                        </h3>
                        <p class="text-gray-700 mb-4 px-3">
                            Safety information, preparation checklists, and
                            details about our educational approach and values.
                        </p>
                        <v-btn
                            color="primary"
                            variant="text"
                            to="/parent-information"
                        >
                            Parent Information
                            <span class="ml-2">→</span>
                        </v-btn>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
// Sample carousel data could be fetched from an API
// Animations and interactions are handled through CSS
</script>

<style scoped>
@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fade-in-delay {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    30% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slide-in-left {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slide-in-right {
    from {
        opacity: 0;
        transform: translateX(30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes pulse-slow {
    0% {
        opacity: 0.4;
        transform: scale(1);
    }
    50% {
        opacity: 0.6;
        transform: scale(1.05);
    }
    100% {
        opacity: 0.4;
        transform: scale(1);
    }
}

@keyframes float {
    0% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-20px);
    }
    100% {
        transform: translateY(0px);
    }
}

@keyframes float-reverse {
    0% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(20px);
    }
    100% {
        transform: translateY(0px);
    }
}

.animate-fade-in {
    animation: fade-in 1s ease-out forwards;
}

.animate-fade-in-delay {
    animation: fade-in-delay 1.5s ease-out forwards;
}

.animate-slide-in-left {
    animation: slide-in-left 1s ease-out forwards;
}

.animate-slide-in-right {
    animation: slide-in-right 1s ease-out forwards;
}

.animate-pulse-slow {
    animation: pulse-slow 6s ease-in-out infinite;
}

.animate-float-slow {
    animation: float 8s ease-in-out infinite;
}

.animate-float-medium {
    animation: float 6s ease-in-out infinite;
}

.animate-float-fast {
    animation: float 4s ease-in-out infinite;
}

.animate-float-reverse {
    animation: float-reverse 7s ease-in-out infinite;
}
</style>
