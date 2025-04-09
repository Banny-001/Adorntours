<template>
    <div
        class="relative font-[Poppins] text-[#201444] overflow-x-hidden pt-[100px]"
    >
        <!-- 🌍 Spinning Global Map Background -->
        <div class="fixed inset-0 z-0 opacity-10 pointer-events-none">
            <img
                src="/images/global-map.png"
                alt="Spinning Globe"
                class="w-full h-full object-cover animate-spin-slow blur-sm scale-110"
            />
        </div>

        <!-- 🎓 Hero Section -->
        <section
            class="relative min-h-[95vh] flex items-center justify-center bg-cover bg-center px-4"
            style="background-image: url('/images/learners-hero.jpg')"
        >
            <div class="absolute inset-0 bg-black/50"></div>
            <div
                class="relative z-10 text-center max-w-4xl mx-auto animate-fade-in"
            >
                <h1
                    class="text-5xl md:text-6xl font-extrabold text-white leading-tight"
                >
                    Explore. Learn. Grow.
                </h1>
                <p class="mt-6 text-white text-xl leading-relaxed">
                    Unleash your curiosity through unforgettable learning
                    adventures across Africa and beyond.
                </p>
            </div>
        </section>

        <!-- 🧭 Learning Journey Section -->
        <section class="py-36 px-6 md:px-24 bg-white/70 backdrop-blur-lg">
            <div class="max-w-6xl mx-auto space-y-40">
                <!-- Block 1 -->
                <div class="grid md:grid-cols-2 gap-16 items-center">
                    <div class="space-y-6">
                        <h2 class="text-4xl font-bold animate-slide-in-left">
                            Walk Through History
                        </h2>
                        <p
                            class="text-lg text-gray-700 leading-relaxed animate-fade-in"
                        >
                            Stand where legends stood. From castles to ancient
                            cities, you’ll relive stories that shaped the world.
                        </p>
                    </div>
                    <img
                        src="/images/cape-coast.jpg"
                        class="rounded-2xl shadow-xl w-full h-[360px] object-cover animate-fade-in"
                    />
                </div>

                <!-- Block 2 -->
                <div
                    class="grid md:grid-cols-2 gap-16 items-center md:flex-row-reverse"
                >
                    <div class="space-y-6">
                        <h2 class="text-4xl font-bold animate-slide-in-right">
                            Learn With Friends
                        </h2>
                        <p
                            class="text-lg text-gray-700 leading-relaxed animate-fade-in"
                        >
                            Bond with peers from across cultures. Laugh, lead,
                            and learn together through shared exploration.
                        </p>
                    </div>
                    <img
                        src="/images/learners-group.jpg"
                        class="rounded-2xl shadow-xl w-full h-[360px] object-cover animate-fade-in"
                    />
                </div>

                <!-- Block 3 -->
                <div class="grid md:grid-cols-2 gap-16 items-center">
                    <div class="space-y-6">
                        <h2 class="text-4xl font-bold animate-slide-in-left">
                            Discover Confidence
                        </h2>
                        <p
                            class="text-lg text-gray-700 leading-relaxed animate-fade-in"
                        >
                            From decision-making to communication, our tours
                            help you build independence through active learning.
                        </p>
                    </div>
                    <img
                        src="/images/kilimanjaro.jpg"
                        class="rounded-2xl shadow-xl w-full h-[360px] object-cover animate-fade-in"
                    />
                </div>
            </div>
        </section>

        <!-- 🌟 Vision -->
        <section
            class="py-36 px-6 md:px-20 text-center bg-purple-50/90 backdrop-blur-md"
        >
            <div class="max-w-3xl mx-auto space-y-10 animate-fade-in">
                <h2 class="text-4xl font-bold">A New Way to Learn</h2>
                <p class="text-lg text-gray-700 leading-relaxed">
                    Museums, mountains, and marketplaces become your classroom.
                    Every step is a chance to grow your perspective.
                </p>
            </div>
        </section>

        <!-- 🚀 Final CTA -->
        <section
            class="py-36 px-6 md:px-20 text-center bg-white/80 backdrop-blur"
        >
            <div class="max-w-4xl mx-auto animate-fade-in space-y-10">
                <h2 class="text-4xl font-bold">Begin Your Journey Today</h2>
                <p class="text-lg text-gray-700">
                    Your learning path starts now. See the world, meet people,
                    and become the leader you're meant to be.
                </p>
                <v-btn
                    color="primary"
                    class="rounded-full px-10 py-4 text-white text-lg shadow-lg hover:brightness-110"
                    to="/contact"
                >
                    Ask About Learner Tours
                </v-btn>
            </div>
        </section>
    </div>
</template>

<script setup>
// No logic yet
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

.animate-fade-in {
    animation: fade-in 1s ease-out forwards;
}

.animate-slide-in-left {
    animation: slide-in-left 1s ease-out forwards;
}

.animate-slide-in-right {
    animation: slide-in-right 1s ease-out forwards;
}

.animate-spin-slow {
    animation: spin-slow 200s linear infinite;
}

@keyframes spin-slow {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
</style>
