<template>
    <div
        class="relative h-[100vh] w-full overflow-hidden rounded-none md:rounded-xl shadow-lg"
    >
        <!-- Slides -->
        <transition-group name="fade" tag="div">
            <img
                v-for="(slide, index) in slides"
                v-show="current === index"
                :key="slide"
                :src="slide"
                class="absolute inset-0 w-full h-full object-cover brightness-75 transition-opacity duration-1000"
            />
        </transition-group>

        <!-- Dots Navigation -->
        <div
            class="absolute bottom-5 left-1/2 transform -translate-x-1/2 z-20 flex space-x-2"
        >
            <span
                v-for="(dot, i) in slides"
                :key="i"
                class="w-3 h-3 rounded-full"
                :class="current === i ? 'bg-white' : 'bg-white/40'"
            ></span>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";

// 🔄 Imported .webp images (make sure they exist in this path)
import hero1 from "../images/hero1.webp";
import hero2 from "../images/hero2.webp";
import hero3 from "../images/hero3.webp";

const slides = [hero1, hero2, hero3];
const current = ref(0);

onMounted(() => {
    setInterval(() => {
        current.value = (current.value + 1) % slides.length;
    }, 6000);
});
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 1s ease-in-out;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

.animate-fadein {
    animation: fadein 1.2s ease forwards;
    opacity: 0;
}
.delay-200 {
    animation-delay: 0.2s;
}
.delay-400 {
    animation-delay: 0.4s;
}

@keyframes fadein {
    to {
        opacity: 1;
        transform: translateY(0);
    }
    from {
        opacity: 0;
        transform: translateY(20px);
    }
}
</style>
