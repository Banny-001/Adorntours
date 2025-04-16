<template>
    <div class="font-poppins overflow-hidden">
        <!-- Animated Background -->
        <div class="fixed inset-0 z-0 pointer-events-none">
            <div
                class="absolute inset-0 bg-gradient-to-br from-purple-900/10 via-transparent to-indigo-800/10"
            ></div>
            <img
                src="../images/connect.webp"
                class="absolute w-full h-full object-cover animate-spin-slow opacity-5 scale-150"
                alt="Rotating Global Map"
            />
           
        </div>

        <!-- Main Content Container -->
        <div class="relative z-10">
            <!-- Hero Carousel Section with Glassmorphism Overlay -->
            <section class="relative h-screen">
                <!-- Maintain original carousel component -->
                <Carousel />

                <!-- Hero Content Overlay -->
                <div
                    class="absolute inset-0 bg-gradient-to-r from-purple-900/70 to-black/70 z-10 flex flex-col justify-center items-center"
                >
                    <div class="container mx-auto px-6 text-center">
                        <div class="animate-fade-up">
                            <h1
                                class="text-4xl sm:text-5xl md:text-7xl font-bold text-white leading-tight drop-shadow-glow mb-6"
                            >
                                <span
                                    class="text-transparent bg-clip-text bg-gradient-to-r from-purple-200 to-white"
                                    >Travel That Teaches.</span
                                >
                                <br />
                                <span
                                    class="text-transparent bg-clip-text bg-gradient-to-r from-white to-purple-200"
                                    >Explore That Inspires.</span
                                >
                            </h1>

                            <p
                                class="text-lg md:text-xl text-white/90 max-w-2xl mx-auto mb-10 animate-delay-200"
                            >
                                Curated international learning experiences for
                                students, teachers, and families.
                            </p>

                            <v-btn
                                color="primary"
                                size="x-large"
                                rounded="pill"
                                class="px-8 py-3 text-white font-medium animate-pulse-subtle shadow-glow-purple animate-delay-300"
                                :to="{ path: '/tours' }"
                            >
                                <v-icon start>mdi-compass</v-icon>
                                Browse Tours
                            </v-btn>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Why Travel Section with Floating Cards -->
            <section class="py-24 relative z-20">
                <v-container>
                    <v-row justify="center">
                        <v-col cols="12" class="text-center mb-16">
                            <h2
                                class="text-3xl md:text-5xl font-bold text-purple-900 mb-4 animate-fade-up"
                            >
                                Why Travel with
                                <span
                                    class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-indigo-700"
                                    >Adorn Tours</span
                                >
                            </h2>
                            <div
                                class="w-20 h-1 bg-gradient-to-r from-purple-500 to-indigo-600 mx-auto"
                            ></div>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col
                            cols="12"
                            md="4"
                            class="animate-fade-up animate-delay-100"
                        >
                            <div
                                class="glassmorphic-card h-full p-8 flex flex-col items-center text-center transform hover:translate-y-2 transition-all duration-500"
                            >
                                <div class="icon-wrapper mb-6">
                                    <img
                                        src="../images/learn.webp"
                                        class="w-24 h-24 rounded-full object-cover shadow-glow-purple"
                                    />
                                </div>
                                <h3
                                    class="text-2xl font-semibold text-purple-900 mb-4"
                                >
                                    Real-World Learning
                                </h3>
                                <p class="text-gray-700">
                                    Transform traditional classrooms into global
                                    campuses with immersive cultural experiences
                                    that make learning come alive.
                                </p>
                            </div>
                        </v-col>

                        <v-col
                            cols="12"
                            md="4"
                            class="animate-fade-up animate-delay-200"
                        >
                            <div
                                class="glassmorphic-card h-full p-8 flex flex-col items-center text-center transform hover:translate-y-2 transition-all duration-500"
                            >
                                <div class="icon-wrapper mb-6">
                                    <img
                                        src="../images/connect.webp"
                                        class="w-24 h-24 rounded-full object-cover shadow-glow-purple"
                                    />
                                </div>
                                <h3
                                    class="text-2xl font-semibold text-purple-900 mb-4"
                                >
                                    Cultural Exchange
                                </h3>
                                <p class="text-gray-700">
                                    Build global empathy, leadership skills, and
                                    confidence through meaningful interactions
                                    across cultures and communities.
                                </p>
                            </div>
                        </v-col>

                        <v-col
                            cols="12"
                            md="4"
                            class="animate-fade-up animate-delay-300"
                        >
                            <div
                                class="glassmorphic-card h-full p-8 flex flex-col items-center text-center transform hover:translate-y-2 transition-all duration-500"
                            >
                                <div class="icon-wrapper mb-6">
                                    <img
                                        src="../images/support.webp"
                                        class="w-24 h-24 rounded-full object-cover shadow-glow-purple"
                                    />
                                </div>
                                <h3
                                    class="text-2xl font-semibold text-purple-900 mb-4"
                                >
                                    All-Inclusive Support
                                </h3>
                                <p class="text-gray-700">
                                    From planning to execution, we handle every
                                    detail professionally so you can focus on
                                    the journey, not the logistics.
                                </p>
                            </div>
                        </v-col>
                    </v-row>
                </v-container>
            </section>

            <!-- Featured Tours Section with Hover Effects -->
            <section
                class="py-24 bg-gradient-to-b from-white to-purple-50 relative z-20"
            >
                <v-container>
                    <v-row justify="center">
                        <v-col cols="12" class="text-center mb-16">
                            <h2
                                class="text-3xl md:text-5xl font-bold text-purple-900 mb-4 animate-fade-up"
                            >
                                Featured Educational
                                <span
                                    class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-indigo-700"
                                    >Tours</span
                                >
                            </h2>
                            <div
                                class="w-20 h-1 bg-gradient-to-r from-purple-500 to-indigo-600 mx-auto"
                            ></div>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col
                            v-for="(tour, i) in featuredTours"
                            :key="i"
                            cols="12"
                            md="4"
                            class="animate-fade-up"
                            :class="{
                                'animate-delay-100': i === 0,
                                'animate-delay-200': i === 1,
                                'animate-delay-300': i === 2,
                            }"
                        >
                            <div
                                class="tour-card overflow-hidden rounded-xl shadow-xl h-full bg-white hover:shadow-2xl transition-all duration-500"
                            >
                                <div class="relative overflow-hidden">
                                    <img
                                        :src="tour.image"
                                        class="w-full h-64 object-cover transition-transform duration-700 hover:scale-110"
                                    />
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-purple-900/80 to-transparent flex items-end p-6"
                                    >
                                        <h3
                                            class="text-2xl font-bold text-white"
                                        >
                                            {{ tour.title }}
                                        </h3>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <p class="text-gray-700">
                                        {{ tour.description }}
                                    </p>
                                    <v-btn
                                        color="primary"
                                        variant="text"
                                        class="mt-4 font-medium px-0"
                                        :to="{ path: '/tour-details' }"
                                    >
                                        Explore Tour
                                        <v-icon end>mdi-arrow-right</v-icon>
                                    </v-btn>
                                </div>
                            </div>
                        </v-col>
                    </v-row>
                </v-container>
            </section>

            <!-- How It Works Interactive Timeline -->
            <section class="py-24 relative z-20">
                <v-container>
                    <v-row justify="center">
                        <v-col cols="12" class="text-center mb-16">
                            <h2
                                class="text-3xl md:text-5xl font-bold text-purple-900 mb-4 animate-fade-up"
                            >
                                How It
                                <span
                                    class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-indigo-700"
                                    >Works</span
                                >
                            </h2>
                            <div
                                class="w-20 h-1 bg-gradient-to-r from-purple-500 to-indigo-600 mx-auto"
                            ></div>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col cols="12">
                            <div class="relative">
                                <!-- Timeline Connector -->
                                <div
                                    class="absolute top-12 left-0 right-0 h-2 bg-gradient-to-r from-purple-400 to-indigo-500 hidden md:block"
                                ></div>

                                <!-- Timeline Steps -->
                                <div class="grid md:grid-cols-4 gap-8">
                                    <div
                                        class="step-item text-center animate-fade-up animate-delay-100"
                                    >
                                        <div class="step-circle">1</div>
                                        <h3
                                            class="text-xl font-bold text-purple-900 mt-6 mb-4"
                                        >
                                            Choose
                                        </h3>
                                        <p class="text-gray-700">
                                            Select from our curated educational
                                            tours or suggest your own
                                            destination of interest.
                                        </p>
                                    </div>

                                    <div
                                        class="step-item text-center animate-fade-up animate-delay-200"
                                    >
                                        <div class="step-circle">2</div>
                                        <h3
                                            class="text-xl font-bold text-purple-900 mt-6 mb-4"
                                        >
                                            Customize
                                        </h3>
                                        <p class="text-gray-700">
                                            Work with our expert team to tailor
                                            the perfect learning journey for
                                            your specific needs.
                                        </p>
                                    </div>

                                    <div
                                        class="step-item text-center animate-fade-up animate-delay-300"
                                    >
                                        <div class="step-circle">3</div>
                                        <h3
                                            class="text-xl font-bold text-purple-900 mt-6 mb-4"
                                        >
                                            Travel
                                        </h3>
                                        <p class="text-gray-700">
                                            Embark on an immersive, fully
                                            supported global experience with
                                            expert local guides.
                                        </p>
                                    </div>

                                    <div
                                        class="step-item text-center animate-fade-up animate-delay-400"
                                    >
                                        <div class="step-circle">4</div>
                                        <h3
                                            class="text-xl font-bold text-purple-900 mt-6 mb-4"
                                        >
                                            Reflect
                                        </h3>
                                        <p class="text-gray-700">
                                            Return home enriched with new
                                            perspectives, knowledge, and global
                                            awareness.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </v-col>
                    </v-row>
                </v-container>
            </section>

            <!-- Global Impact Stats with Animated Counters -->
            <section
                class="py-24 bg-gradient-to-b from-purple-50 to-white relative z-20"
            >
                <v-container>
                    <v-row justify="center">
                        <v-col cols="12" class="text-center mb-16">
                            <h2
                                class="text-3xl md:text-5xl font-bold text-purple-900 mb-4 animate-fade-up"
                            >
                                Our Global
                                <span
                                    class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-indigo-700"
                                    >Impact</span
                                >
                            </h2>
                            <div
                                class="w-20 h-1 bg-gradient-to-r from-purple-500 to-indigo-600 mx-auto"
                            ></div>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col
                            v-for="(stat, i) in [
                                {
                                    value: '120+',
                                    label: 'Destinations Visited',
                                },
                                { value: '15K+', label: 'Students Impacted' },
                                { value: '98%', label: 'Parent Satisfaction' },
                                {
                                    value: '200+',
                                    label: 'Partner Institutions',
                                },
                            ]"
                            :key="i"
                            cols="6"
                            md="3"
                            class="text-center animate-fade-up"
                            :class="{
                                'animate-delay-100': i === 0,
                                'animate-delay-200': i === 1,
                                'animate-delay-300': i === 2,
                                'animate-delay-400': i === 3,
                            }"
                        >
                            <div class="stat-container">
                                <h3
                                    class="text-4xl md:text-6xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-indigo-600 mb-2"
                                >
                                    {{ stat.value }}
                                </h3>
                                <p class="text-gray-700">{{ stat.label }}</p>
                            </div>
                        </v-col>
                    </v-row>
                </v-container>
            </section>

            <!-- CTA Section with Floating Elements -->
            <section class="py-24 relative overflow-hidden z-20">
                <!-- Decorative floating elements -->
                <div
                    class="absolute top-0 left-0 w-64 h-64 rounded-full bg-purple-500/10 -translate-x-1/2 -translate-y-1/2"
                ></div>
                <div
                    class="absolute bottom-0 right-0 w-96 h-96 rounded-full bg-indigo-500/10 translate-x-1/3 translate-y-1/3"
                ></div>

                <v-container>
                    <v-row justify="center">
                        <v-col cols="12" md="10" lg="8">
                            <div
                                class="cta-card p-12 rounded-3xl shadow-2xl text-center animate-fade-up"
                            >
                                <h2
                                    class="text-3xl md:text-5xl font-bold mb-6 text-purple-900"
                                >
                                    Ready to Customize Your Tour?
                                </h2>
                                <p
                                    class="text-lg text-gray-700 mb-10 max-w-2xl mx-auto"
                                >
                                    Whether you're a teacher, parent, or group
                                    leader — we'll work with you to design a
                                    journey that transforms learning, discovery,
                                    and global awareness.
                                </p>
                                <v-btn
                                    color="primary"
                                    size="x-large"
                                    rounded="pill"
                                    class="px-8 py-3 text-white font-medium shadow-glow-purple"
                                    :to="{ path: '/custom-tour' }"
                                >
                                    <v-icon start>mdi-map-marker-path</v-icon>
                                    Start Planning Your Journey
                                </v-btn>
                            </div>
                        </v-col>
                    </v-row>
                </v-container>
            </section>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import Carousel from "../components/Carousel.vue";
import paris from "../images/paris.webp";
import kenya from "../images/kenya.webp";
import rome from "../images/rome.webp";

const featuredTours = [
    {
        title: "Paris & the Enlightenment",
        description:
            "Explore the Age of Reason in the City of Light, from historical salons to the prestigious Sorbonne.",
        image: paris,
    },
    {
        title: "Kenya: Conservation & Culture",
        description:
            "Experience East Africa's magnificent wildlife, rich heritage, and innovative community-driven tourism.",
        image: kenya,
    },
    {
        title: "Rome & the Renaissance",
        description:
            "Walk through centuries of history with an immersive journey into classical and Renaissance Europe.",
        image: rome,
    },
];
</script>

<style scoped>
/* Custom Animations */
@keyframes fade-up {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes float {
    0%,
    100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

@keyframes pulse-subtle {
    0%,
    100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
}

@keyframes spin-slow {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

/* Animation Classes */
.animate-fade-up {
    animation: fade-up 1s ease-out forwards;
    opacity: 0;
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}

.animate-pulse-subtle {
    animation: pulse-subtle 3s ease-in-out infinite;
}

.animate-spin-slow {
    animation: spin-slow 120s linear infinite;
}

.animate-delay-100 {
    animation-delay: 0.1s;
}

.animate-delay-200 {
    animation-delay: 0.2s;
}

.animate-delay-300 {
    animation-delay: 0.3s;
}

.animate-delay-400 {
    animation-delay: 0.4s;
}

/* Component Styles */
.glassmorphic-card {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(8px);
    border-radius: 16px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 32px rgba(100, 25, 230, 0.1);
    transition: all 0.4s ease;
}

.glassmorphic-card:hover {
    box-shadow: 0 12px 48px rgba(100, 25, 230, 0.2);
    transform: translateY(-8px);
}

.shadow-glow-purple {
    box-shadow: 0 0 20px rgba(124, 58, 237, 0.4);
}

.drop-shadow-glow {
    filter: drop-shadow(0 0 8px rgba(124, 58, 237, 0.5));
}

.tour-card {
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.tour-card:hover {
    transform: translateY(-8px);
}

.step-circle {
    width: 56px;
    height: 56px;
    background: linear-gradient(135deg, #8b5cf6, #6366f1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 24px;
    font-weight: bold;
    margin: 0 auto;
    position: relative;
    z-index: 20;
    box-shadow: 0 0 20px rgba(124, 58, 237, 0.4);
}

.step-item {
    position: relative;
    z-index: 10;
}

.stat-container {
    position: relative;
    padding: 24px;
    transition: transform 0.4s ease;
}

.stat-container:hover {
    transform: translateY(-5px);
}

.stat-container h3 {
    background-size: 200% auto;
    animation: shine 3s linear infinite;
}

.cta-card {
    background: linear-gradient(
        135deg,
        rgba(255, 255, 255, 0.9),
        rgba(255, 255, 255, 0.8)
    );
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 20px 80px rgba(124, 58, 237, 0.2);
}

@keyframes shine {
    to {
        background-position: 200% center;
    }
}
</style>
