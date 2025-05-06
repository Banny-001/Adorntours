<template>
    <v-footer
        padless
        class="text-white "
        style="
            background: linear-gradient(to bottom, #342536, #472154);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        "
    >
        <v-container class="py-16">
            <v-row>
                <!-- Brand and Description -->
                <v-col cols="12" md="4" class="mb-6 mb-md-0">
                    <div
                        class="flex items-center focus:outline-none bg-transparent"
                    >
                        <video
                            autoplay
                            loop
                            muted
                            playsinline
                            preload="auto"
                            width="50"
                            height="20"
                            class="w-[160px] h-[90px] object-contain rounded-xl bg-transparent mr-4 mb-2 "
                            aria-hidden="true"
                        >
                            <source :src="adornVideo" type="video/webm" />
                        </video>
                        <div>
                            <h3
                                class="text-h6 font-weight-bold mb-1 text-gradient"
                            >
                                Adorn DMC
                            </h3>
                            <div class="text-subtitle-2">
                                Explore. Learn. Grow.
                            </div>
                        </div>
                    </div>
                    <p class="text-body-2 text-white">
                        Championing the power of travel to transform education.
                        At Adorn DMC, we craft immersive, curriculum-aligned
                        journeys that empower students, support educators, and
                        open hearts to the world.
                    </p>

                    <div class="d-flex align-center mt-4">
                        <v-btn
                            icon
                            :href="'https://www.facebook.com/AdornDMC'"
                            target="_blank"
                            class="ma-2"
                            color="blue darken-4"
                            elevation="2"
                            tile
                            rounded
                        >
                            <v-icon>mdi-facebook</v-icon>
                        </v-btn>

                        <v-btn
                            icon
                            :href="'https://www.linkedin.com/company/adorn-dmc/'"
                            target="_blank"
                            class="ma-2"
                            color="blue darken-2"
                            elevation="2"
                            tile
                            rounded
                        >
                            <v-icon color="white" size="24"
                                >mdi-linkedin</v-icon
                            >
                        </v-btn>
                    </div>
                </v-col>

                <!-- Quick Links -->
                <v-col cols="12" md="2">
                    <h4 class="text-h6 font-weight-bold mb-1 text-gradient">
                        Quick Links
                    </h4>

                    <v-list dense nav class="transparent-bg elevation-0">
                        <v-list-item
                            v-for="(item, i) in quickLinks"
                            :key="i"
                            class="px-0"
                        >
                            <router-link
                                :to="item.link"
                                class="font-weight-bold text-white d-flex align-center"
                            >
                                <v-icon left size="18" class="mr-4 text-blue"
                                    >mdi-chevron-right</v-icon
                                >
                                {{ item.label }}
                            </router-link>
                        </v-list-item>
                    </v-list>
                </v-col>

                <!-- Community -->
                <v-col cols="12" md="3">
                    <h4 class="text-h6 font-weight-bold mb-1 text-gradient">
                        Community
                    </h4>

                    <v-list dense nav class="transparent-bg elevation-0">
                        <v-list-item
                            v-for="(item, i) in communityLinks"
                            :key="i"
                            class="px-0"
                        >
                            <router-link
                                :to="item.link"
                                class="font-weight-bold text-white d-flex align-center"
                            >
                                <v-icon left size="18" class="mr-4 text-blue">{{
                                    item.icon
                                }}</v-icon>
                                {{ item.label }}
                            </router-link>
                        </v-list-item>
                    </v-list>
                </v-col>

                <!-- Contact Info -->
                <v-col cols="12" md="3">
                    <h4 class="text-h6 font-weight-bold mb-1 text-gradient">
                        Contact Us
                    </h4>
                    <div class="mb-3 d-flex">
                        <v-icon class="mr-3 text-blue">mdi-email</v-icon>
                        <div>
                            <p class="text-caption text-grey">Email</p>
                            <a
                                href="mailto:info@adorndmc.com"
                                class="text-white text-body-2 hover-blue"
                                >info@adorndmc.com</a
                            >
                        </div>
                    </div>
                    <div class="mb-3 d-flex">
                        <v-icon class="mr-3 text-blue">mdi-phone</v-icon>
                        <div>
                            <p class="text-caption text-grey">Call Us</p>
                            <a
                                href="tel:+254700000000"
                                class="text-white text-body-2 hover-blue"
                                >+254 700 000 000</a
                            >
                        </div>
                    </div>
                    <div class="d-flex">
                        <v-icon class="mr-3 text-blue">mdi-map-marker</v-icon>
                        <div>
                            <p class="text-caption text-grey">Location</p>
                            <p class="text-white text-body-2">Nairobi, Kenya</p>
                        </div>
                    </div>
                </v-col>
            </v-row>

            <v-divider class="my-6" color="white" opacity="0.1" />

            <v-row justify="space-between" align="center">
                <p class="text-caption text-grey">
                    &copy; {{ new Date().getFullYear() }} Adorn DMC. All rights
                    reserved.
                </p>
                <div class="d-flex flex-wrap gap-4">
                    <router-link
                        to="/privacy"
                        class="text-caption text-grey hover-white"
                        >Privacy Policy</router-link
                    >
                    <router-link
                        to="/terms"
                        class="text-caption text-grey hover-white"
                        >Terms of Service</router-link
                    >
                    <router-link
                        to="/cookies"
                        class="text-caption text-grey hover-white"
                        >Cookie Policy</router-link
                    >
                </div>
            </v-row>
        </v-container>
    </v-footer>
</template>

<script setup>
import adorn from "@/images/adorn.png";
import adornVideo from "@/images/adorn.webm";

const quickLinks = [
    { label: "Home", link: "/" },
    { label: "Tours", link: "/tours" },
    { label: "Blog", link: "/blog" },
    { label: "About Us", link: "/about" },
    { label: "Contact", link: "/contact" },
];

const communityLinks = [
    {
        label: "For Teachers",
        link: "/community/teachers",
        icon: "mdi-account-tie",
    },
    { label: "For Learners", link: "/community/learners", icon: "mdi-school" },
    {
        label: "For Parents",
        link: "/community/parents",
        icon: "mdi-account-group",
    },
];
</script>

<style scoped>
.text-gradient {
    background: linear-gradient(to right, #3b82f6, #6366f1);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.transparent-bg {
    background-color: transparent !important;
    box-shadow: none !important;
}

.hover-blue:hover {
    color: #3b82f6 !important;
}

.hover-white:hover {
    color: #ffffff !important;
}

.animate-spin-slow {
    animation: spin 15s linear infinite;
}
video {
    image-rendering: crisp-edges;
    transform: translateZ(0); /* Force GPU acceleration */
    backface-visibility: hidden;
    object-fit: contain;
}

@keyframes spin {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}
</style>
