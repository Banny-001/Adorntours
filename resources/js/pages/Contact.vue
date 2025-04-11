<template>
    <div
        class="pt-[120px] px-6 md:px-16 bg-white text-[#201444] font-[Poppins] min-h-screen"
    >
        <!-- 📬 Header -->
        <section class="text-center py-20 max-w-4xl mx-auto">
            <h1 class="text-5xl font-extrabold mb-4">Get in Touch</h1>
            <p class="text-lg text-gray-600">
                We’d love to hear from you! Whether you have a question,
                feedback, or want to plan a tour — reach out.
            </p>
        </section>

        <!-- 📝 Form + Info -->
        <section
            class="max-w-6xl mx-auto pb-32 grid md:grid-cols-2 gap-12 items-start"
        >
            <!-- Form -->
            <form @submit.prevent="submitForm" class="space-y-6">
                <div>
                    <label class="block text-sm font-medium mb-1"
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
                    <label class="block text-sm font-medium mb-1"
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
                    />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1"
                        >Message*</label
                    >
                    <v-textarea
                        v-model="form.message"
                        placeholder="Your message..."
                        rows="5"
                        outlined
                        variant="solo"
                        required
                    />
                </div>

                <v-btn
                    type="submit"
                    color="primary"
                    class="rounded-full px-8 py-3 text-white font-medium shadow-md"
                >
                    Send Message
                </v-btn>
            </form>

            <!-- Contact Info -->
            <div class="space-y-8 text-center md:text-left">
                <div>
                    <h3 class="text-xl font-bold mb-1">Our Office</h3>
                    <p class="text-gray-600">
                        Kilimani, Nairobi<br />Suite 12B, NairoPoint Plaza
                    </p>
                </div>

                <div>
                    <h3 class="text-xl font-bold mb-1">Mailing Address</h3>
                    <p class="text-gray-600">
                        P.O. Box 45678-00100<br />Nairobi, Kenya
                    </p>
                </div>

                <div>
                    <h3 class="text-xl font-bold mb-1">Email</h3>
                    <p class="text-gray-600">
                        <a
                            href="mailto:info@adorn.com"
                            class="text-purple-600 hover:underline"
                            >info@adorn.com</a
                        >
                    </p>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
import { ref } from "vue";

const form = ref({
    name: "",
    email: "",
    message: "",
});

const submitForm = () => {
    if (!form.value.name || !form.value.email || !form.value.message) {
        alert("Please fill all required fields.");
        return;
    }

    // TODO: send to backend
    alert("Message sent! We'll get back to you soon.");
    form.value = { name: "", email: "", message: "" };
};
</script>
