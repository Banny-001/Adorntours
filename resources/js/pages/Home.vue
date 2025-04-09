<template>
    <div class="bg-white text-gray-800 font-[Poppins] relative">
        <!-- Rotating Global Map Background -->
        <div
            class="fixed top-0 left-0 w-full h-full z-0 overflow-hidden opacity-10 pointer-events-none"
        >
            <img
                src="/images/globe-map.jpeg"
                class="absolute w-full h-full object-cover animate-spin-slow scale-250"
                alt="Rotating Global Map"
            />
        </div>

        <!-- Main Content -->
        <div class="relative z-10">
            <!-- Hero Carousel Section -->
            <section class="relative py-24 bg-transparent">
                <Carousel />
                <div
                    class="absolute inset-0 bg-black/50 z-10 flex flex-col justify-center items-center text-white text-center px-4"
                >
                    <h1
                        class="text-4xl md:text-6xl font-bold mb-4 drop-shadow animate-slidefade"
                    >
                        Travel That Teaches. Explore That Inspires.
                    </h1>
                    <p
                        class="text-lg md:text-xl max-w-2xl animate-fadein delay-200"
                    >
                        Curated international learning experiences for students,
                        teachers, and families.
                    </p>
                    <v-btn
                        color="primary"
                        variant="flat"
                        class="mt-6 rounded-full text-white px-8 py-3 text-sm font-semibold shadow-md hover:brightness-110 cursor-pointer animate-fadein delay-400"
                        :to="{ path: '/tours' }"
                    >
                        Browse Tours
                    </v-btn>
                </div>
            </section>

            <!-- Why Travel Section -->
            <section class="section-spacing bg-transparent">
                <div class="max-w-7xl mx-auto px-6 text-center">
                    <h2
                        class="text-3xl md:text-4xl font-bold text-[#201444] mb-14 animate-fadeup"
                    >
                        Why Travel with ACIS?
                    </h2>
                    <div class="grid md:grid-cols-3 gap-12">
                        <div
                            class="bg-white rounded-xl p-6 shadow-xl animate-fadeup delay-100 hover:scale-105 transition-transform duration-500"
                        >
                            <img
                                src="/images/learn.jpg"
                                class="w-20 h-20 mx-auto mb-4 rounded-full shadow-lg"
                            />
                            <h3 class="text-xl font-semibold mb-2">
                                Real-World Learning
                            </h3>
                            <p class="text-sm text-gray-700">
                                Transform classrooms into global campuses with
                                immersive experiences.
                            </p>
                        </div>
                        <div
                            class="bg-white rounded-xl p-6 shadow-xl animate-fadeup delay-200 hover:scale-105 transition-transform duration-500"
                        >
                            <img
                                src="/images/connect.jpg"
                                class="w-20 h-20 mx-auto mb-4 rounded-full shadow-lg"
                            />
                            <h3 class="text-xl font-semibold mb-2">
                                Cultural Exchange
                            </h3>
                            <p class="text-sm text-gray-700">
                                Build global empathy, leadership, and confidence
                                across cultures.
                            </p>
                        </div>
                        <div
                            class="bg-white rounded-xl p-6 shadow-xl animate-fadeup delay-300 hover:scale-105 transition-transform duration-500"
                        >
                            <img
                                src="/images/support.jpg"
                                class="w-20 h-20 mx-auto mb-4 rounded-full shadow-lg"
                            />
                            <h3 class="text-xl font-semibold mb-2">
                                All-Inclusive Support
                            </h3>
                            <p class="text-sm text-gray-700">
                                From planning to execution, we handle every
                                detail professionally.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Featured Tours -->
            <section class="section-spacing bg-transparent">
                <div class="max-w-7xl mx-auto px-6 text-center">
                    <h2
                        class="text-3xl md:text-4xl font-bold text-[#201444] mb-14 animate-fadeup"
                    >
                        Featured Educational Tours
                    </h2>
                    <div class="grid md:grid-cols-3 gap-10">
                        <div
                            v-for="(tour, i) in featuredTours"
                            :key="i"
                            class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transform transition-all duration-500 hover:-translate-y-2 animate-fadeup delay-200"
                        >
                            <img
                                :src="tour.image"
                                class="w-full h-48 object-cover"
                            />
                            <div class="p-6 text-left">
                                <h3
                                    class="text-xl font-semibold text-[#201444] mb-2"
                                >
                                    {{ tour.title }}
                                </h3>
                                <p class="text-sm text-gray-600">
                                    {{ tour.description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- How It Works -->
            <!-- How It Works (Stylish Horizontal Steps) -->
            <section class="section-spacing bg-transparent">
                <div class="max-w-6xl mx-auto px-6">
                    <h2
                        class="text-4xl font-bold text-center text-[#201444] mb-20 animate-fadeup"
                    >
                        How It Works
                    </h2>

                    <div class="relative">
                        <!-- Connecting Line -->
                        <div
                            class="absolute top-8 left-0 right-0 h-1 bg-[#201444]/20 z-0 hidden md:block"
                        ></div>

                        <!-- Steps -->
                        <div class="grid md:grid-cols-4 gap-10 relative z-10">
                            <div
                                class="flex flex-col items-center text-center space-y-4 animate-fadeup delay-100"
                            >
                                <div
                                    class="w-14 h-14 rounded-full bg-[#201444] text-white flex items-center justify-center text-xl font-bold shadow-lg"
                                >
                                    1
                                </div>
                                <h3
                                    class="text-lg font-semibold text-[#201444]"
                                >
                                    Choose
                                </h3>
                                <p class="text-sm text-gray-600">
                                    Pick from curated tours or suggest your
                                    destination.
                                </p>
                            </div>

                            <div
                                class="flex flex-col items-center text-center space-y-4 animate-fadeup delay-200"
                            >
                                <div
                                    class="w-14 h-14 rounded-full bg-[#201444] text-white flex items-center justify-center text-xl font-bold shadow-lg"
                                >
                                    2
                                </div>
                                <h3
                                    class="text-lg font-semibold text-[#201444]"
                                >
                                    Customize
                                </h3>
                                <p class="text-sm text-gray-600">
                                    Work with our team to tailor the learning
                                    journey.
                                </p>
                            </div>

                            <div
                                class="flex flex-col items-center text-center space-y-4 animate-fadeup delay-300"
                            >
                                <div
                                    class="w-14 h-14 rounded-full bg-[#201444] text-white flex items-center justify-center text-xl font-bold shadow-lg"
                                >
                                    3
                                </div>
                                <h3
                                    class="text-lg font-semibold text-[#201444]"
                                >
                                    Travel
                                </h3>
                                <p class="text-sm text-gray-600">
                                    Embark on an immersive, supported global
                                    experience.
                                </p>
                            </div>

                            <div
                                class="flex flex-col items-center text-center space-y-4 animate-fadeup delay-400"
                            >
                                <div
                                    class="w-14 h-14 rounded-full bg-[#201444] text-white flex items-center justify-center text-xl font-bold shadow-lg"
                                >
                                    4
                                </div>
                                <h3
                                    class="text-lg font-semibold text-[#201444]"
                                >
                                    Reflect
                                </h3>
                                <p class="text-sm text-gray-600">
                                    Return enriched, with memories and global
                                    insight.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Traveler Testimonials -->
            <section class="section-spacing bg-transparent">
                <div class="max-w-6xl mx-auto px-6 space-y-20">
                    <h2
                        class="text-4xl font-bold text-center text-[#201444] animate-fadeup"
                    >
                        What Our Travelers Say
                    </h2>

                    <!-- Testimonial 1 -->
                    <div
                        class="flex flex-col md:flex-row items-start md:items-center gap-8 animate-fadeup delay-100"
                    >
                        <div class="text-6xl text-[#201444] leading-none">
                            “
                        </div>
                        <div class="flex-1">
                            <p class="text-lg text-gray-700 leading-relaxed">
                                The ACIS tour was eye-opening. I learned more in
                                two weeks than I ever thought possible. The
                                guides were inspiring, and every moment felt
                                meaningful.
                            </p>
                            <p class="mt-4 font-semibold text-[#201444]">
                                — Alice, Student
                            </p>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div
                        class="flex flex-col md:flex-row-reverse items-start md:items-center gap-8 animate-fadeup delay-200"
                    >
                        <div class="text-6xl text-[#201444] leading-none">
                            “
                        </div>
                        <div class="flex-1 text-right md:text-left">
                            <p class="text-lg text-gray-700 leading-relaxed">
                                Every detail was handled with care. The
                                educational value exceeded expectations, and my
                                students still talk about it months later.
                            </p>
                            <p class="mt-4 font-semibold text-[#201444]">
                                — Mr. Okello, Educator
                            </p>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div
                        class="flex flex-col md:flex-row items-start md:items-center gap-8 animate-fadeup delay-300"
                    >
                        <div class="text-6xl text-[#201444] leading-none">
                            “
                        </div>
                        <div class="flex-1">
                            <p class="text-lg text-gray-700 leading-relaxed">
                                My daughter returned more confident, more
                                inspired, and more curious about the world. It
                                was the best decision we made for her
                                development.
                            </p>
                            <p class="mt-4 font-semibold text-[#201444]">
                                — Jane, Parent
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Our Global Impact -->
            <section class="section-spacing bg-transparent">
                <div class="max-w-6xl mx-auto px-6">
                    <h2
                        class="text-4xl font-bold text-center text-[#201444] mb-16 animate-fadeup"
                    >
                        Our Global Impact
                    </h2>

                    <div
                        class="grid md:grid-cols-4 gap-12 text-center animate-fadeup delay-100"
                    >
                        <div class="space-y-4">
                            <h3
                                class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[#201444] to-purple-600 tracking-wide glow-number"
                            >
                                120+
                            </h3>
                            <p class="text-sm text-gray-700">
                                Destinations Visited
                            </p>
                        </div>

                        <div class="space-y-4">
                            <h3
                                class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[#201444] to-purple-600 tracking-wide glow-number"
                            >
                                15K+
                            </h3>
                            <p class="text-sm text-gray-700">
                                Students Impacted
                            </p>
                        </div>

                        <div class="space-y-4">
                            <h3
                                class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[#201444] to-purple-600 tracking-wide glow-number"
                            >
                                98%
                            </h3>
                            <p class="text-sm text-gray-700">
                                Parent Satisfaction
                            </p>
                        </div>

                        <div class="space-y-4">
                            <h3
                                class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[#201444] to-purple-600 tracking-wide glow-number"
                            >
                                200+
                            </h3>
                            <p class="text-sm text-gray-700">
                                Partner Institutions
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Final CTA -->
            <section class="section-spacing bg-transparent">
                <div
                    class="max-w-4xl mx-auto px-6 text-center backdrop-blur-md bg-white/70 rounded-xl shadow-xl py-16 space-y-8 animate-fadeup"
                >
                    <h2 class="text-4xl font-bold text-[#201444] leading-tight">
                        Ready to Customize a Tour?
                    </h2>
                    <p class="text-gray-700 text-md max-w-2xl mx-auto">
                        Whether you're a teacher, parent, or group leader —
                        we’ll work with you to design a journey that transforms
                        learning, discovery, and global awareness.
                    </p>
                    <v-btn
                        color="primary"
                        variant="flat"
                        class="rounded-full text-white px-8 py-3 text-sm font-semibold shadow-md hover:brightness-110 cursor-pointer"
                        :to="{ path: '/custom-tour' }"
                    >
                        Start Planning
                    </v-btn>
                </div>
            </section>
        </div>
    </div>
</template>

<script setup>
import Carousel from "../components/Carousel.vue";

const featuredTours = [
    {
        title: "Paris & the Enlightenment",
        description:
            "Explore the Age of Reason in the City of Light, from salons to the Sorbonne.",
        image: "/images/paris.jpg",
    },
    {
        title: "Kenya: Conservation & Culture",
        description:
            "Experience East Africa’s wildlife, heritage, and community-driven tourism.",
        image: "/images/kenya.jpg",
    },
    {
        title: "Rome & the Renaissance",
        description:
            "Walk through history with a journey into classical and Renaissance Europe.",
        image: "/images/rome.jpg",
    },
];
</script>

<style scoped>
@keyframes fadeup {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
@keyframes fadein {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}
@keyframes slidefade {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
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

.animate-fadeup {
    animation: fadeup 1s ease forwards;
}
.animate-fadein {
    animation: fadein 1.5s ease forwards;
}
.animate-slidefade {
    animation: slidefade 1.3s ease forwards;
}
.animate-spin-slow {
    animation: spin-slow 120s linear infinite;
}

.delay-100 {
    animation-delay: 0.1s;
}
.delay-200 {
    animation-delay: 0.2s;
}
.delay-300 {
    animation-delay: 0.3s;
}
.delay-400 {
    animation-delay: 0.4s;
}

.section-spacing {
    padding-top: 3rem;
    padding-bottom: 3rem;
}

.card-spacing {
    margin-bottom: 3.5rem;
}

.glow-hover {
    transition: all 0.3s ease;
}

.glow-hover:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 40px rgba(32, 20, 68, 0.2);
}

.fade-card {
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(10px);
    border-radius: 1rem;
}
.glow-number {
    text-shadow: 0 0 12px rgba(32, 20, 68, 0.2);
    animation: pulse-glow 3s ease-in-out infinite;
}

@keyframes pulse-glow {
    0%,
    100% {
        text-shadow: 0 0 10px rgba(64, 34, 122, 0.2);
    }
    50% {
        text-shadow: 0 0 20px rgba(64, 34, 122, 0.4);
    }
}
</style>
