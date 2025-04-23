<template>
    <div
        class="pt-[120px] px-6 md:px-16 bg-white text-[#201444] font-[Poppins] min-h-screen"
    >
        <section class="text-center py-10 max-w-2xl mx-auto mt-6">
            <h3
                class="text-3xl font-semibold mb-2 leading-tight tracking-tight text-purple-900"
            >
                Connect with Adorn DMC
            </h3>

            <p class="text-base text-gray-600">
                Curious about our tours, need help planning, or just want to
                chat? Our team is here to assist every step of the way.
            </p>
        </section>

        <section
            class="max-w-6xl mx-auto pb-32 grid md:grid-cols-2 gap-16 items-start"
        >
            <!-- Snackbar Message -->
            <v-snackbar
                v-model="snackbarVisible"
                :color="snackbarType"
                top
                right
                timeout="3000"
            >
                {{ snackbarMessage }}
            </v-snackbar>
            <form
                @submit.prevent="submitForm"
                class="space-y-6 bg-gray-50 p-10 rounded-2xl shadow-xl px-3"
            >
                <h2
                    class="text-2xl font-semibold text-purple-700 mb-6 text-center"
                >
                    Send Us a Message
                </h2>

                <div>
                    <label class="block text-sm font-medium mb-1 text-gray-700"
                        >Full Name*</label
                    >
                    <v-text-field
                        v-model="form.name"
                        placeholder="Jane Doe"
                        dense
                        variant="solo"
                        outlined
                        required
                    />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1 text-gray-700"
                        >Email Address*</label
                    >
                    <v-text-field
                        v-model="form.email"
                        type="email"
                        placeholder="you@example.com"
                        dense
                        variant="solo"
                        outlined
                        required
                        :error="!!errors.email"
                        :error-messages="errors.email"
                    />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1 text-gray-700"
                        >Message*</label
                    >
                    <v-textarea
                        v-model="form.message"
                        placeholder="How can we help you?"
                        rows="5"
                        outlined
                        variant="solo"
                        required
                    />
                </div>

                <!-- Centered Button -->
                <div class="text-center pt-4">
                    <v-btn
                        :loading="isSubmitting"
                        :disabled="isSubmitting"
                        type="submit"
                        color="primary"
                        class="rounded-full px-10 py-3 text-white font-semibold shadow-md text-lg mb-4"
                    >
                        Send Message
                    </v-btn>
                </div>
            </form>

            <div class="space-y-10 text-center md:text-left">
                <div>
                    <h3 class="text-2xl font-bold text-purple-700 mb-2">
                        Our Office
                    </h3>
                    <p class="text-gray-600 leading-relaxed">
                        Kilimani, Nairobi<br />
                        Suite 12B, NairoPoint Plaza
                    </p>
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-purple-700 mb-2">
                        Mailing Address
                    </h3>
                    <p class="text-gray-600 leading-relaxed">
                        P.O. Box 45678-00100<br />
                        Nairobi, Kenya
                    </p>
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-purple-700 mb-2">
                        Email
                    </h3>
                    <p>
                        <a
                            href="mailto:info@adorndmc.com"
                            class="text-purple-600 hover:underline text-lg"
                        >
                            info@adorndmc.com
                        </a>
                    </p>
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-purple-700 mb-2">
                        Phone
                    </h3>
                    <p class="text-gray-600 text-lg">+254 725 608 207</p>
                    <br />
                    <p class="text-gray-600 text-lg">+254 726 678 163</p>
                </div>
            </div>
        </section>
    </div>
</template>
<script setup>
import { ref, watch } from "vue";
import axios from "axios";
import { useSnackbar } from "@/composables/snackbar";

const snackbarVisible = ref(false); // Control snackbar visibility
const snackbarMessage = ref("");
const snackbarType = ref("success");

const form = ref({
    name: "",
    email: "",
    message: "",
});

const errors = ref({
    email: null,
});

const isSubmitting = ref(false);

const isValidEmail = (email) => {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
};

watch(
    () => form.value.email,
    (newEmail) => {
        if (!newEmail) {
            errors.value.email = "Email is required.";
        } else if (!isValidEmail(newEmail)) {
            errors.value.email = "Please enter a valid email address.";
        } else {
            errors.value.email = null;
        }
    }
);

const submitForm = async () => {
    if (!form.value.name || !form.value.email || !form.value.message) {
        snackbarMessage.value = "Please fill all required fields.";
        snackbarType.value = "error";
        snackbarVisible.value = true;
        return;
    }

    if (errors.value.email) {
        snackbarMessage.value = "Please fix the email field.";
        snackbarType.value = "error";
        snackbarVisible.value = true;
        return;
    }

    isSubmitting.value = true;
    try {
        await axios.post("/api/contact", form.value);
        snackbarMessage.value = "Message sent successfully!";
        snackbarType.value = "success";
        snackbarVisible.value = true;
        form.value = {
            name: "",
            email: "",
            message: "",
        };
    } catch (error) {
        snackbarMessage.value =
            error?.response?.data?.message || "Something went wrong.";
        snackbarType.value = "error";
        snackbarVisible.value = true;
    } finally {
        isSubmitting.value = false;
    }
};
</script>
