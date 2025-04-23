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
                <!-- Fullscreen Carousel -->
                <Carousel />

                <!-- Hero Content Overlay -->
                <div
                    class="absolute inset-0 z-10 flex flex-col justify-center items-center bg-black/20"
                >
                    <div class="container mx-auto px-4 text-center">
                        <div class="animate-fade-up">
                            <h1
                                class="text-3xl sm:text-4xl md:text-5xl font-semibold text-white leading-snug drop-shadow-md mb-4"
                            >
                                Transformative Student Travel
                            </h1>

                            <p
                                class="text-base sm:text-lg md:text-xl text-white/90 max-w-3xl mx-auto mb-6"
                            >
                                At Adorn DMC, we believe travel should be more
                                than just sightseeing—it should transform lives.
                                Our teacher-led educational journeys foster
                                critical thinking, cultural appreciation, and
                                global awareness.
                            </p>

                            <v-btn
                                color="primary"
                                size="large"
                                rounded="pill"
                                class="px-6 py-2 text-white font-medium animate-pulse-subtle shadow-glow-purple animate-delay-300"
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
            <section class="py-24 relative z-20 bg-white">
                <v-container>
                    <v-row justify="center">
                        <v-col cols="12" class="text-center mb-16">
                            <h2
                                class="text-3xl md:text-5xl font-bold text-purple-900 mb-4 animate-fade-up"
                            >
                                Why Travel with
                                <span
                                    class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-indigo-700"
                                >
                                    Adorn DMC
                                </span>
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
                                class="relative h-[400px] w-full rounded-xl overflow-hidden shadow-xl group"
                            >
                                <img
                                    src="../images/planning-family.jpg"
                                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                />
                                <div
                                    class="absolute inset-0 p-6 flex flex-col justify-end text-left"
                                >
                                    <h3
                                        class="text-2xl bg-white/70 p-2 font-bold text-black px-4"
                                    >
                                        Transformative Learning
                                    </h3>
                                    <p
                                        class="text-purple-800 bg-white/70 text-sm md:text-base px-4"
                                    >
                                        Go beyond the classroom with immersive
                                        experiences that nurture critical
                                        thinking, independence, and lifelong
                                        curiosity.
                                    </p>
                                </div>
                            </div>
                        </v-col>

                        <v-col
                            cols="12"
                            md="4"
                            class="animate-fade-up animate-delay-200"
                        >
                            <div
                                class="relative h-[400px] w-full rounded-xl overflow-hidden shadow-xl group"
                            >
                                <img
                                    src="../images/support.webp"
                                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                />
                                <div
                                    class="absolute inset-0 p-6 flex flex-col justify-end text-left"
                                >
                                    <h3
                                        class="text-2xl bg-white/70 p-2 font-bold text-black px-4"
                                    >
                                        End-to-End Safety
                                    </h3>
                                    <p
                                        class="text-purple-800 bg-white/70 text-sm md:text-base px-4"
                                    >
                                        Your safety is our priority. From vetted
                                        local partners to 24/7 global support
                                        and top-tier insurance, we’ve got you
                                        covered.
                                    </p>
                                </div>
                            </div>
                        </v-col>

                        <v-col
                            cols="12"
                            md="4"
                            class="animate-fade-up animate-delay-300"
                        >
                            <div
                                class="relative h-[400px] w-full rounded-xl overflow-hidden shadow-xl group"
                            >
                                <img
                                    src="../images/learners-group.webp"
                                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                />
                                <div
                                    class="absolute inset-0 p-6 flex flex-col justify-end text-left"
                                >
                                    <h3
                                        class="text-2xl bg-white/70 p-2 font-bold text-black px-4"
                                    >
                                        Custom-Tailored Trips
                                    </h3>
                                    <p
                                        class="text-purple-800 bg-white/70 text-sm md:text-base px-4"
                                    >
                                        Every journey is crafted around your
                                        group’s unique goals, budget, and
                                        curriculum—with flexibility and finesse.
                                    </p>
                                </div>
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
                                >
                                    Tours
                                </span>
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
                                        class="w-full h-[400px] object-cover transition-transform duration-700 hover:scale-110"
                                    />

                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-purple-900/80 to-transparent flex items-end p-6"
                                    >
                                        <h3
                                            class="text-2xl p-2 font-bold text-black px-4"
                                        >
                                            {{ tour.title }}
                                        </h3>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <p
                                        class="text-purple-700 bg-white/70 text-sm leading-relaxed md:text-base px-4"
                                    >
                                        {{ tour.short_description}}
                                    </p>
                                    <v-btn
                                        color="primary"
                                        variant="text"
                                        class="mt-4 font-medium px-5"
                                        :to="{ path: '/tours' }"
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
            <section class="py-24 relative z-20 bg-white">
                <v-container>
                    <v-row justify="center">
                        <v-col cols="12" class="text-center mb-16">
                            <h2
                                class="text-3xl md:text-5xl font-bold text-purple-900 mb-4 animate-fade-up"
                            >
                                How It
                                <span
                                    class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-indigo-700"
                                >
                                    Works
                                </span>
                            </h2>
                            <div
                                class="w-20 h-1 bg-gradient-to-r from-purple-500 to-indigo-600 mx-auto"
                            ></div>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col cols="12">
                            <div class="relative">
                                <!-- Timeline Line -->
                                <div
                                    class="absolute top-12 left-0 right-0 h-2 bg-gradient-to-r from-purple-400 to-indigo-500 hidden md:block"
                                ></div>

                                <!-- Timeline Steps -->
                                <div class="grid md:grid-cols-5 gap-8">
                                    <div
                                        class="step-item text-center animate-fade-up animate-delay-100"
                                    >
                                        <div class="step-circle">1</div>
                                        <h3
                                            class="text-xl font-bold text-purple-900 mt-6 mb-4"
                                        >
                                            Connect
                                        </h3>
                                        <p class="text-gray-700 px-3">
                                            Talk to an Adorn travel consultant
                                            to discover the ideal destination
                                            and goals for your group.
                                        </p>
                                    </div>

                                    <div
                                        class="step-item text-center animate-fade-up animate-delay-200"
                                    >
                                        <div class="step-circle">2</div>
                                        <h3
                                            class="text-xl font-bold text-purple-900 mt-6 mb-4"
                                        >
                                            Plan
                                        </h3>
                                        <p class="text-gray-700 px-3">
                                            We design a fully customized
                                            itinerary based on your learning
                                            outcomes, budget, and travel
                                            timeline.
                                        </p>
                                    </div>

                                    <div
                                        class="step-item text-center animate-fade-up animate-delay-300"
                                    >
                                        <div class="step-circle">3</div>
                                        <h3
                                            class="text-xl font-bold text-purple-900 mt-6 mb-4"
                                        >
                                            Execute
                                        </h3>
                                        <p class="text-gray-700 px-3">
                                            From enrollment tools to logistics,
                                            we handle everything while you
                                            prepare your students for adventure.
                                        </p>
                                    </div>

                                    <div
                                        class="step-item text-center animate-fade-up animate-delay-400"
                                    >
                                        <div class="step-circle">4</div>
                                        <h3
                                            class="text-xl font-bold text-purple-900 mt-6 mb-4"
                                        >
                                            Support
                                        </h3>
                                        <p class="text-gray-700 px-3">
                                            Benefit from 24/7 support and safety
                                            coverage before, during, and after
                                            your journey.
                                        </p>
                                    </div>

                                    <div
                                        class="step-item text-center animate-fade-up animate-delay-500"
                                    >
                                        <div class="step-circle">5</div>
                                        <h3
                                            class="text-xl font-bold text-purple-900 mt-6 mb-4"
                                        >
                                            Enjoy
                                        </h3>
                                        <p class="text-gray-700 px-3">
                                            Travel with confidence and create
                                            lifelong memories through immersive,
                                            educator-led global learning.
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
                                >
                                    Impact
                                </span>
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
                                    value: '10+ Years',
                                    label: 'of Educational Travel Expertise',
                                },
                                {
                                    value: '15,000+',
                                    label: 'Students Empowered Worldwide',
                                },
                                {
                                    value: '98%',
                                    label: 'Educator & Parent Satisfaction',
                                },
                                {
                                    value: '200+',
                                    label: 'Schools & Institutions Served',
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
                                    class="text-4xl md:text-6xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-indigo-600 mb-2"
                                >
                                    {{ stat.value }}
                                </h3>
                                <p class="text-gray-700 text-base md:text-lg">
                                    {{ stat.label }}
                                </p>
                            </div>
                        </v-col>
                    </v-row>
                </v-container>
            </section>

            <!-- CTA Section with Floating Elements -->
            <section class="py-24 relative overflow-hidden z-20 bg-white">
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
                        class="cta-card p-12 rounded-3xl shadow-2xl bg-gradient-to-br from-purple-50 to-white text-center animate-fade-up"
                      >
                        <h2 class="text-3xl md:text-5xl font-bold mb-6 text-purple-900 leading-snug">
                          Let’s Craft a Journey<br />
                          That Transforms Learning
                        </h2>
                        <p class="text-lg md:text-xl text-gray-700 mb-10 max-w-2xl mx-auto leading-relaxed">
                          Collaborate with our travel consultants to build a customized educational tour
                          that aligns with your curriculum, fits your goals, and creates memories that last
                          a lifetime.
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
import axios from 'axios';


const featuredTours = ref([]);

const fetchFeaturedTours = async () => {
    try {
        const response = await axios.get('/api/tours', {
            params: { is_featured: true } 
        });
        featuredTours.value = response.data.data;

        console.log('Featured tours:', featuredTours.value);
    } catch (error) {
        console.error('Error fetching featured tours:', error);
    }
};
onMounted(() => {
    fetchFeaturedTours()
})
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
