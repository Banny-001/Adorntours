<template>
    <div class="pt-[120px] bg-white font-[Poppins]">
        <!-- Hero Section -->
        <section
            class="relative h-[85vh] flex items-center justify-center bg-cover bg-center mb-32"
            style="background-image: url('/images/teacher-hero.jpg')"
        >
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="relative z-10 text-white text-center px-4">
                <h1 class="text-5xl font-extrabold mb-6">
                    Empowering Educators to Inspire
                </h1>
                <p class="max-w-3xl mx-auto text-xl text-white/80">
                    Transform your classroom into a global learning hub with
                    Adorn Tours.
                </p>
            </div>
        </section>

        <!-- Section: Why Travel -->
        <section class="py-24 px-6 md:px-16 bg-white">
            <div
                class="max-w-7xl mx-auto grid md:grid-cols-2 gap-20 items-center"
            >
                <div class="space-y-6">
                    <h2 class="text-4xl font-bold text-[#201444]">
                        Why Educational Travel?
                    </h2>
                    <p class="text-lg text-gray-700 leading-relaxed">
                        Educational travel ignites curiosity, builds empathy,
                        and strengthens cultural understanding. Teachers unlock
                        real-world experiences that deepen learning and build
                        lifelong memories.
                    </p>
                    <v-btn
                        color="primary"
                        class="rounded-full text-white px-8 py-3 text-md shadow"
                    >
                        Explore Opportunities
                    </v-btn>
                </div>
                <v-img
                    src="/images/teacher-1.jpg"
                    class="rounded-2xl shadow-2xl"
                    height="360"
                    cover
                ></v-img>
            </div>
        </section>

        <!-- Section: Teaching Resources -->
        <section
            class="py-24 px-6 md:px-16 bg-gradient-to-b from-purple-50 to-white"
        >
            <div
                class="max-w-7xl mx-auto grid md:grid-cols-2 gap-20 items-center"
            >
                <v-img
                    src="/images/teacher-2.jpg"
                    class="rounded-2xl shadow-2xl"
                    height="360"
                    cover
                ></v-img>
                <div class="space-y-6">
                    <h2 class="text-4xl font-bold text-[#201444]">
                        Tools for Your Curriculum
                    </h2>
                    <p class="text-lg text-gray-700 leading-relaxed">
                        Access downloadable lesson plans, travel-linked modules,
                        and engaging student activities crafted by experienced
                        educators.
                    </p>
                    <ul
                        class="list-disc list-inside text-md text-gray-700 space-y-2"
                    >
                        <li>Standards-aligned resources</li>
                        <li>Cross-subject projects</li>
                        <li>Student travel prep guides</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Section: Teacher Community -->
        <section class="py-24 px-6 md:px-16 bg-white">
            <div
                class="max-w-7xl mx-auto grid md:grid-cols-2 gap-20 items-center"
            >
                <div class="space-y-6">
                    <h2 class="text-4xl font-bold text-[#201444]">
                        Join Our Teacher Community
                    </h2>
                    <p class="text-lg text-gray-700 leading-relaxed">
                        Be part of a vibrant community where you can exchange
                        ideas, get inspired, and access mentorship from seasoned
                        tour leaders.
                    </p>
                    <v-btn
                        color="primary"
                        class="rounded-full text-white px-8 py-3 text-md shadow"
                    >
                        Connect with Peers
                    </v-btn>
                </div>
                <v-img
                    src="/images/teacher-3.jpg"
                    class="rounded-2xl shadow-2xl"
                    height="360"
                    cover
                ></v-img>
            </div>
        </section>

        <!-- Section: Start Planning -->
        <section class="py-32 px-6 md:px-16 bg-purple-50 text-center">
            <div class="max-w-4xl mx-auto space-y-6">
                <h2 class="text-4xl font-bold text-[#201444]">
                    Start Planning Your First Tour
                </h2>
                <p class="text-lg text-gray-700 leading-relaxed">
                    Whether you're new to student travel or a veteran planner,
                    we're here to guide your journey every step of the way.
                </p>
                <v-btn
                    color="primary"
                    class="rounded-full text-white text-lg px-10 py-4 shadow hover:brightness-110"
                >
                    Schedule a Free Consultation
                </v-btn>
            </div>
        </section>
    </div>
</template>

<script setup>
// no logic required
</script>

<style scoped>
/* Elegant fade animation */
@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
.animate-fade-in {
    animation: fade-in 1s ease-out forwards;
}
</style>
