<template>
    <div class="p-4 md:p-6 max-w-5xl mx-auto">
        <h1 class="text-2xl md:text-3xl font-bold text-[#201444] mb-6">
            Create New Blog Post
        </h1>

        <form @submit.prevent="submitForm" class="space-y-6">
            <!-- Basic Information Section -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Basic Information</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label
                            class="block text-sm font-medium text-gray-700 mb-1"
                            >Title*</label
                        >
                        <input
                            v-model="form.title"
                            type="text"
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
                        />
                    </div>

                    <div>
                        <label
                            class="block text-sm font-medium text-gray-700 mb-1"
                            >Category*</label
                        >
                        <input
                            v-model="form.category"
                            type="text"
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
                        />
                    </div>

                    <div>
                        <label
                            class="block text-sm font-medium text-gray-700 mb-1"
                            >Published Date*</label
                        >
                        <input
                            v-model="form.published_date"
                            type="date"
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
                        />
                    </div>

                    <div>
                        <label
                            class="block text-sm font-medium text-gray-700 mb-1"
                            >Featured Post</label
                        >
                        <label class="inline-flex items-center mt-2">
                            <input
                                v-model="form.featured"
                                type="checkbox"
                                class="form-checkbox h-5 w-5 text-purple-600"
                            />
                            <span class="ml-2 text-gray-700"
                                >Mark as featured</span
                            >
                        </label>
                    </div>

                    <div class="md:col-span-2">
                        <label
                            class="block text-sm font-medium text-gray-700 mb-1"
                            >Tags (comma separated)</label
                        >
                        <input
                            v-model="tagsInput"
                            type="text"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
                        />
                    </div>
                </div>
            </div>

            <!-- Content Section -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Content</h2>

                <div class="space-y-6">
                    <div>
                        <label
                            class="block text-sm font-medium text-gray-700 mb-1"
                            >Content*</label
                        >
                        <textarea
                            v-model="form.content"
                            rows="10"
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
                        ></textarea>
                        <p class="mt-1 text-sm text-gray-500">
                            Supports HTML formatting
                        </p>
                    </div>

                    <div>
                        <label
                            class="block text-sm font-medium text-gray-700 mb-1"
                            >Featured Image</label
                        >
                        <input
                            type="file"
                            @change="handleImageUpload"
                            accept="image/*"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100"
                        />
                        <p class="mt-1 text-sm text-gray-500">
                            JPEG, PNG (Max 2MB)
                        </p>
                        <img
                            v-if="imagePreview"
                            :src="imagePreview"
                            class="mt-2 h-48 object-cover rounded"
                        />
                    </div>
                </div>
            </div>

            <!-- Author Section -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Author Information</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label
                            class="block text-sm font-medium text-gray-700 mb-1"
                            >Author Name*</label
                        >
                        <input
                            v-model="form.author"
                            type="text"
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
                        />
                    </div>

                    <div>
                        <label
                            class="block text-sm font-medium text-gray-700 mb-1"
                            >Author Avatar</label
                        >
                        <input
                            type="file"
                            @change="handleAvatarUpload"
                            accept="image/*"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100"
                        />
                        <p class="mt-1 text-sm text-gray-500">
                            JPEG, PNG (Max 1MB)
                        </p>
                        <img
                            v-if="avatarPreview"
                            :src="avatarPreview"
                            class="mt-2 h-16 w-16 object-cover rounded-full"
                        />
                    </div>
                </div>
            </div>

            <!-- SEO Section -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">SEO Settings</h2>

                <div class="space-y-6">
                    <div>
                        <label
                            class="block text-sm font-medium text-gray-700 mb-1"
                            >Meta Title</label
                        >
                        <input
                            v-model="form.meta_title"
                            type="text"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
                        />
                    </div>

                    <div>
                        <label
                            class="block text-sm font-medium text-gray-700 mb-1"
                            >Meta Description</label
                        >
                        <textarea
                            v-model="form.meta_description"
                            rows="3"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
                        ></textarea>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-4">
                <button
                    type="button"
                    @click="$router.back()"
                    class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-purple-500"
                >
                    Cancel
                </button>
                <button
                    type="submit"
                    :disabled="loading"
                    class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 disabled:opacity-50 disabled:cursor-not-allowed"
                >
                    <span v-if="loading">Publishing...</span>
                    <span v-else>Publish Post</span>
                </button>
            </div>
        </form>
    </div>
</template>

<script setup>
import { ref, computed } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

const router = useRouter();
const loading = ref(false);
const imagePreview = ref(null);
const avatarPreview = ref(null);

const tagsInput = ref("");

const form = ref({
    title: "",
    content: "",
    image: null,
    category: "Education",
    tags: [],
    author: "",
    author_avatar: null,
    featured: false,
    published_date: new Date().toISOString().split("T")[0],
    meta_title: "",
    meta_description: "",
});

const handleImageUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
        form.value.image = file;

        // Create preview
        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.value = e.target.result;
        };
        reader.readAsDataURL(file);
    }
};

const handleAvatarUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
        form.value.author_avatar = file;

        // Create preview
        const reader = new FileReader();
        reader.onload = (e) => {
            avatarPreview.value = e.target.result;
        };
        reader.readAsDataURL(file);
    }
};

const submitForm = async () => {
    loading.value = true;

    try {
        const formData = new FormData();

        // Convert tags input to array
        const tagsArray = tagsInput.value
            .split(",")
            .map((tag) => tag.trim())
            .filter((tag) => tag);

        // Append all form fields to FormData
        Object.keys(form.value).forEach((key) => {
            if (key === "tags") {
                formData.append(key, JSON.stringify(tagsArray));
            } else if (key !== "image" && key !== "author_avatar") {
                formData.append(key, form.value[key]);
            }
        });

        // Append files if they exist
        if (form.value.image instanceof File) {
            formData.append("image", form.value.image);
        }
        if (form.value.author_avatar instanceof File) {
            formData.append("author_avatar", form.value.author_avatar);
        }

        const response = await axios.post("/api/blogs", formData, {
            headers: {
                "Content-Type": "multipart/form-data",
            },
        });

        router.push({ name: "blogs.index" });
    } catch (error) {
        console.error("Error creating blog post:", error);
        alert("Error creating blog post. Please try again.");
    } finally {
        loading.value = false;
    }
};
</script>

<style scoped>
/* Add any custom styles here */
</style>
