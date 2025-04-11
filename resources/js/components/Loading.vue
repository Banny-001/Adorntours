<template>
    <v-dialog
      v-if="loading"
      :model-value="loading"
      persistent
      fullscreen
      transition="none"
    >
      <v-progress-linear
        indeterminate
        color="white"
        :height="3"
      ></v-progress-linear>
    </v-dialog>
  </template>
  
  <script setup>
  import { storeToRefs } from "pinia";
  import { useLoadingStore } from "../stores/loading";
  
  const { loading } = storeToRefs(useLoadingStore());
  </script>
  