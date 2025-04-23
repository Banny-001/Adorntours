<template>
    <div
        class="min-h-screen flex items-center justify-center font-[Poppins] bg-gradient-to-tr from-purple-700 via-purple-500 to-indigo-500 px-4 pt-20"
    >
        <v-card
            class="w-full max-w-md px-8 py-10 bg-white/10 backdrop-blur-2xl rounded-3xl shadow-2xl border border-white/20"
            elevation="10"
        >
            <div class="text-center mb-10">
                <h1 class="text-4xl font-extrabold text-purple drop-shadow-sm">
                    Create&nbsp;Account
                </h1>
                <p class="text-black/75 mt-2">
                    Join Adorn DMC and start exploring.
                </p>
            </div>

            <v-form @submit.prevent="handleRegister" class="space-y-5">
                <v-text-field
                    v-model="form.name"
                    label="Full Name"
                    variant="outlined"
                    hide-details
                    density="comfortable"
                    class="custom-input"
                /><br />

                <v-text-field
                    v-model="form.email"
                    label="Email"
                    type="email"
                    variant="outlined"
                    hide-details
                    density="comfortable"
                    class="custom-input"
                /><br />

                <v-text-field
                    v-model="form.password"
                    :type="showPassword ? 'text' : 'password'"
                    label="Password"
                    variant="outlined"
                    hide-details
                    density="comfortable"
                    class="custom-input"
                    :append-inner-icon="
                        showPassword ? 'mdi-eye-off' : 'mdi-eye'
                    "
                    @click:append-inner="togglePassword"
                /><br />

                <v-btn
                    color="purple-darken-2"
                    type="submit"
                    class="rounded-full font-semibold text-lg py-3 px-6 hover:brightness-110"
                    block
                >
                    Register
                </v-btn>
            </v-form>

            <div class="mt-8 text-center text-white/80 text-sm">
                Already have an account?
                <router-link
                    to="/login"
                    class="font-semibold underline hover:text-white"
                >
                    Log in
                </router-link>
            </div>
        </v-card>
    </div>
</template>

<script setup>
import { ref } from "vue";
import axios from "axios"; // adjust path

const form = ref({
    name: "",
    email: "",
    password: "",
});
const showPassword = ref(false);

function togglePassword() {
    showPassword.value = !showPassword.value;
}

async function handleRegister() {
    try {
        await axios.post("/api/register", form.value);
        // optional: auto‑login or redirect
        alert("Registration successful—please log in!");
        router.push("/login");
    } catch (e) {
        alert("Registration failed. Please check your details.");
    }
}
</script>

<style scoped>
.custom-input .v-field__overlay {
    backdrop-filter: blur(4px);
    background: rgba(255, 255, 255, 0.2);
}
</style>
