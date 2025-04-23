<template>
    <div
    class="min-h-screen flex items-center justify-center font-[Poppins] bg-gradient-to-tr from-purple-700 via-purple-500 to-indigo-500 px-4 pt-20"
    >
        
        <v-card
            class="relative z-10 w-full max-w-md px-8 py-10 bg-white/10 backdrop-blur-lg rounded-2xl shadow-xl border border-white/20"
            elevation="10"
        >
            <div class="text-center mb-10">
                <h1 class="text-4xl font-extrabold text-purple">Welcome Back</h1>
                <p class="text-black/70 mt-2">
                    Login to ADORN DMC
                </p>
            </div>

            <v-form @submit.prevent="handleLogin" class="space-y-4">
                <v-text-field
                    v-model="form.email"
                    label="Email"
                    type="email"
                    variant="outlined"
                    class="custom-input"
                    hide-details
                    density="comfortable"
                /><br>

                <v-text-field
                    v-model="form.password"
                    :type="showPassword ? 'text' : 'password'"
                    label="Password"
                    variant="outlined"
                    class="custom-input"
                    hide-details
                    density="comfortable"
                    :append-inner-icon="
                        showPassword ? 'mdi-eye-off' : 'mdi-eye'
                    "
                    @click:append-inner="togglePassword"
                /><br>

                <div class="pt-2">
                    <v-btn
                        color="primary"
                        type="submit"
                        class="rounded-full font-semibold text-white text-lg py-3 px-6 hover:brightness-110"
                        block
                    >
                        Login
                    </v-btn>
                </div>
            </v-form>

            <div class="mt-8 text-center text-white/70 text-sm">
                Don’t have an account?
                <router-link
                    to="/register"
                    class="text-white font-semibold underline hover:text-purple-300 ml-1"
                >
                    Sign up
                </router-link>
            </div>
        </v-card>
    </div>
</template>

<script setup>
import { ref, reactive } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";
import { useAuthStore } from "../stores/auth";
import { useSnackbar } from "../composables/snackbar";
import { useLoading } from "../composables/loading";

const router = useRouter();
const authStore = useAuthStore();
const loader = useLoading();

const form = reactive({
    email: "",
    password: "",
});

const showPassword = ref(false);
const togglePassword = () => {
    showPassword.value = !showPassword.value;
};

const handleLogin = async () => {
    loader.load();
    try {
        const { data } = await axios.post("api/login", form);

        authStore.token = true;
        localStorage.setItem("auth", true);

        router.replace("/dashboard");
    } catch (err) {
        console.error(err);
        useSnackbar(err?.response?.data?.message || "Login failed", "error");
    } finally {
        loader.quit();
    }
};
</script>

<style scoped>

.custom-input .v-field {
    background-color: rgba(255, 255, 255, 0.07);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.3);
}
.custom-input .v-label {
    color: rgba(255, 255, 255, 0.6) !important;
}
.custom-input input,
.custom-input .v-field__input {
    color: white !important;
}
</style>
