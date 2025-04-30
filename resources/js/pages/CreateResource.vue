<template>
    <div class="p-4 md:p-6 bg-[#f9f9fb] min-h-screen">
      <v-card class="rounded-2xl mb-6 bg-[#f7f4fb]" flat elevation="2">
        <v-card-text class="d-flex justify-space-between align-center py-6 px-4">
          <h1 class="text-3xl font-bold text-[#201444] tracking-wide">
            ➕ Create Resource
          </h1>
          <v-btn color="secondary" class="text-white" @click="$router.back()">
            Back
          </v-btn>
        </v-card-text>
      </v-card>
  
      <v-card flat elevation="2" class="rounded-2xl p-6 bg-white">
        <v-form ref="formRef" @submit.prevent="submitForm">
          <v-text-field
            v-model="form.icon"
            label="Icon"
            color="primary"
            required
          ></v-text-field>
  
          <v-text-field
            v-model="form.title"
            label="Title"
            color="primary"
            required
          ></v-text-field>
  
          <v-textarea
            v-model="form.description"
            label="Description"
            color="primary"
            required
            rows="4"
          ></v-textarea>
  
          <v-text-field
            v-model="form.link"
            label="Link (Optional)"
            color="primary"
          ></v-text-field>
  
          <v-file-input
            v-model="form.file_path"
            label="Upload PDF File "
            color="primary"
            accept=".pdf"
            show-size
            prepend-icon="mdi-upload"
          ></v-file-input>
  
          <div class="d-flex justify-end mt-4">
            <v-btn type="submit" color="primary" class="text-white" :loading="loading">
              Submit
            </v-btn>
          </div>
        </v-form>
      </v-card>
    </div>
  </template>
  
  <script setup>
  import { ref } from "vue";
  import axios from "axios";
  import { useRouter } from "vue-router";
  
  const router = useRouter();
  const loading = ref(false);
  
  const form = ref({
    icon: "",
    title: "",
    description: "",
    link: "",
    file_path: null,
  });
  
  const submitForm = async () => {
    loading.value = true;
    try {
      const formData = new FormData();
      formData.append("icon", form.value.icon);
      formData.append("title", form.value.title);
      formData.append("description", form.value.description);
      if (form.value.link) {
        formData.append("link", form.value.link);
      }
      if (form.value.file_path) {
        formData.append("file_path", form.value.file_path);
      }
  
      await axios.post("/api/resources", formData, {
        headers: {
          "Content-Type": "multipart/form-data",
        },
      });
  
      alert("Resource created successfully!");
      router.push("/admin/resources");
    } catch (error) {
      console.error("Submission error:", error);
      alert("Failed to create resource.");
    } finally {
      loading.value = false;
    }
  };
  </script>
  
  <style scoped>
  .v-card {
    font-family: "Inter", sans-serif;
  }
  </style>
  