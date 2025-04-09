<template>
    <div class="min-h-screen flex items-center justify-center relative bg-black font-[Poppins] overflow-hidden">
      <!-- 🌍 Rotating Global Map Background -->
      <div class="absolute inset-0 z-0 opacity-10 pointer-events-none">
        <img
          src="/images/global-map.png"
          alt="Map"
          class="w-full h-full object-cover animate-spin-slow blur-lg scale-125"
        />
      </div>
  
      <!-- 🔒 Login Card -->
      <v-card
        class="relative z-10 w-full max-w-md py-10 px-8 mx-auto backdrop-blur-lg bg-white/5 border border-white/10 rounded-3xl shadow-xl"
        elevation="10"
      >
        <div class="text-center mb-8 space-y-2">
          <h1 class="text-3xl font-extrabold text-white">Welcome Back</h1>
          <p class="text-white/70 text-sm">Login to access your educational journey</p>
        </div>
  
        <v-form @submit.prevent="login" class="space-y-6">
          <v-text-field
            v-model="form.email"
            label="Email"
            type="email"
            variant="outlined"
            class="custom-input"
            hide-details
            density="comfortable"
          />
  
          <v-text-field
            v-model="form.password"
            :type="showPassword ? 'text' : 'password'"
            label="Password"
            variant="outlined"
            class="custom-input"
            hide-details
            density="comfortable"
            :append-inner-icon="showPassword ? 'mdi-eye-off' : 'mdi-eye'"
            @click:append-inner="togglePassword"
          />
  
          <v-btn
            color="primary"
            block
            size="large"
            class="rounded-full font-semibold text-white shadow-lg hover:brightness-110"
            type="submit"
          >
            Login
          </v-btn>
        </v-form>
  
        <div class="mt-6 text-center text-sm text-white/70">
          Don’t have an account?
          <router-link to="/register" class="underline font-semibold text-white hover:text-purple-300">
            Sign up
          </router-link>
        </div>
      </v-card>
    </div>
  </template>
  
  <script setup>
  import { ref, reactive, onMounted } from 'vue';
  import { useRouter } from 'vue-router';
  import { useAuthStore } from '../stores/auth';
  import { useSnackbar } from '../composables/snackbar';
  import { useLoading } from '../composables/loading';
  
  const router = useRouter();
  const { getToken, getUser } = useAuthStore();
  const loader = useLoading();
  
  const form = reactive({
    email: '',
    password: '',
  });
  
  const showPassword = ref(false);
  const togglePassword = () => {
    showPassword.value = !showPassword.value;
  };
  
  onMounted(() => {
    getToken();
  });
  
  async function login() {
    loader.load();
    try {
      await axios.post('/login', form);
      localStorage.setItem('auth', true);
      await getUser();
      router.replace('/dashboard');
    } catch (error) {
      useSnackbar(error?.response?.data?.message || 'Login failed', 'error');
    } finally {
      loader.quit();
    }
  }
  </script>
  
  <style scoped>
  @keyframes spin-slow {
    0% {
      transform: rotate(0deg);
    }
    100% {
      transform: rotate(360deg);
    }
  }
  
  .animate-spin-slow {
    animation: spin-slow 200s linear infinite;
  }
  
  /* ✅ Custom white-input Vuetify styling */
  .custom-input .v-field {
    background-color: rgba(255, 255, 255, 0.08);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.2);
  }
  
  .custom-input .v-label {
    color: rgba(255, 255, 255, 0.7) !important;
  }
  
  .custom-input input {
    color: white !important;
  }
  
  .custom-input .v-field__input {
    color: white !important;
  }
  
  .custom-input .v-field__outline {
    --v-field-border-color: rgba(255, 255, 255, 0.5);
  }
  </style>
  