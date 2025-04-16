<script setup>
import Header from './components/Layout/Header.vue'
import Footer from './components/Layout/Footer.vue'
import Navbar from './components/Layout/Navbar.vue'
import { useAuthStore } from "./stores/auth";
import { storeToRefs } from "pinia";
import Loading from "./components/Loading.vue";

const { authenticated } = storeToRefs(useAuthStore());
</script>

<template>
  <v-app>
    <!-- Navbar will handle its own header when authenticated -->
    <Header v-if="!authenticated" />
    <Navbar v-if="authenticated" />

    <v-main>
      <router-view />
      <Loading />
    </v-main>

    <Footer v-if="!authenticated" />
  </v-app>
</template>
