<template>
    <div
        class="bg-white font-[Poppins] text-[#201444] pt-[100px] overflow-x-hidden"
    >
        <!-- 🌍 Hero Section -->
        <section
            class="relative min-h-[90vh] flex items-center justify-center bg-cover bg-center px-6"
            style="background-image: url('/images/family-hero.jpg')"
        >
            <div class="absolute inset-0 bg-black/50"></div>
            <div
                class="relative z-10 text-center max-w-4xl mx-auto animate-fade-in"
            >
                <h1
                    class="text-5xl md:text-6xl font-extrabold text-white leading-tight"
                >
                    Travel That Brings Families Together
                </h1>
                <p class="mt-6 text-white text-xl leading-relaxed">
                    Create unforgettable experiences through safe, meaningful
                    and enriching adventures.
                </p>
            </div>
        </section>

        <!-- 🛡️ Safety Section -->
        <section
            class="py-28 px-6 md:px-20 bg-gradient-to-b from-white via-white to-purple-50"
        >
            <div class="max-w-5xl mx-auto text-center space-y-10">
                <h2 class="text-4xl font-bold animate-fade-in">
                    Safety Comes First
                </h2>
                <p
                    class="text-lg text-gray-700 leading-relaxed animate-fade-in delay-200"
                >
                    From the moment your child leaves home to the moment they
                    return, we prioritize safety above all. With trained staff,
                    vetted accommodations, and 24/7 support, you can focus on
                    what really matters—watching your child grow.
                </p>
                <img
                    src="/images/safety.jpg"
                    class="rounded-2xl shadow-xl w-full max-h-[400px] object-cover animate-fade-in delay-300"
                />
            </div>
        </section>

        <!-- 📚 Education Meets Adventure -->
        <section
            class="py-28 px-6 md:px-20 bg-purple-50 bg-opacity-60 relative"
        >
            <div class="absolute inset-0 z-0">
                <img
                    src="/images/globe-map.jpeg"
                    alt="Map Background"
                    class="w-full h-full object-cover opacity-10 animate-spin-slow blur-md scale-125 pointer-events-none"
                />
            </div>
            <div class="relative z-10 max-w-5xl mx-auto space-y-10 text-center">
                <h2 class="text-4xl font-bold animate-slide-in-left">
                    Education Meets Adventure
                </h2>
                <p
                    class="text-lg text-gray-700 leading-relaxed animate-fade-in"
                >
                    Our journeys combine cultural exploration, historical
                    insights, and personal growth. Every location becomes a
                    living classroom, helping your child see the world in a new
                    way.
                </p>
                <img
                    src="/images/education-adventure.jpg"
                    class="rounded-2xl shadow-lg w-full max-h-[400px] object-cover animate-fade-in delay-300"
                />
            </div>
        </section>

        <!-- 🧘🏽 Stress-Free Planning -->
        <section class="py-28 px-6 md:px-20 bg-white">
            <div class="max-w-5xl mx-auto text-center space-y-10">
                <h2 class="text-4xl font-bold animate-slide-in-right">
                    Planning Made Simple
                </h2>
                <p
                    class="text-lg text-gray-700 leading-relaxed animate-fade-in"
                >
                    We handle all the logistics—so you don’t have to. From
                    flights and meals to guided excursions and accommodations,
                    our family-focused team ensures a seamless experience from
                    start to finish.
                </p>
                <img
                    src="/images/planning-family.jpg"
                    class="rounded-2xl shadow-lg w-full max-h-[400px] object-cover animate-fade-in delay-300"
                />
            </div>
        </section>

        <!-- 👨‍👩‍👧 Call to Action -->
        <section
            class="py-28 px-6 md:px-20 bg-gradient-to-b from-white to-purple-100 text-center relative overflow-hidden"
        >
            <div class="absolute inset-0">
                <img
                    src="/images/global-map.png"
                    class="w-full h-full object-cover opacity-5 animate-spin-slow blur-md scale-150 pointer-events-none"
                />
            </div>
            <div
                class="relative z-10 max-w-4xl mx-auto space-y-6 animate-fade-in"
            >
                <h2 class="text-4xl font-bold">
                    Ready to Start Your Family’s Journey?
                </h2>
                <p class="text-lg text-gray-700">
                    Our tour consultants are ready to help you plan the perfect
                    experience tailored to your family's dreams.
                </p>
                <v-btn
                    color="primary"
                    class="rounded-full text-white px-10 py-4 text-lg shadow-lg hover:brightness-110"
                    to="/contact"
                >
                    Contact Our Family Tour Experts
                </v-btn>
            </div>
        </section>
    </div>
</template>

<script setup>
// No logic needed
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
