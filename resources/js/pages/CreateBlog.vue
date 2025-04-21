<template>
    <v-card>
        <div class="max-w-6xl mx-auto px-4 md:px-6 pb-28 pt-6 font-[Poppins]">
            <h1 class="text-3xl font-bold text-[#201444] mb-8 text-center">
                Create a New Blog
            </h1>

        <v-form @submit.prevent="submitBlog">
            <v-container fluid>
                <v-row dense>
                    <!-- Title -->
                    <v-col cols="12" sm="6">
                        <div>Title</div>
                        <v-text-field v-model="form.title" 
                        outlined dense
                         density="compact"
                         />
                    </v-col>

                    <!-- Slug -->
                    <v-col cols="12" sm="6">
                        <div>Slug</div>
                        <v-text-field v-model="form.slug" outlined dense  density="compact" />
                    </v-col>

                    <!-- Category -->
                    <v-col cols="12" sm="6">
                        <div>Category</div>
                        <v-text-field v-model="form.category" outlined dense  density="compact" />
                    </v-col>

                    <!-- Tags -->
                    <v-col cols="12" sm="6">
                        <div>Tags (comma-separated)</div>
                        <v-text-field v-model="form.tags" outlined dense  density="compact" />
                    </v-col>

                    <!-- Author Name -->
                    <v-col cols="12" sm="6">
                        <div>Author Name</div>
                        <v-text-field
                            v-model="form.author_name"
                            outlined
                            dense
                             density="compact"
                        />
                    </v-col>

                    <!-- Author Avatar -->
                    <v-col cols="12" sm="6">
                        <div>Author Avatar URL</div>
                        <v-text-field
                            v-model="form.author_avatar_url"
                            outlined
                            dense
                             density="compact"
                        />
                    </v-col>

                    <!-- Is Featured -->
                    <v-col cols="12" sm="6">
                        <v-switch
                            v-model="form.is_featured"
                            label="Mark as Featured"
                            inset
                            color="purple"
                            :true-value="true"
                            :false-value="false"
                        />
                    </v-col>

                    <!-- Published At -->
                    <v-col cols="12" sm="6">
                        <div>Publish Date</div>
                        <v-text-field
                            v-model="form.published_at"
                            type="datetime-local"
                            outlined
                            dense
                             density="compact"
                        />
                    </v-col>

                    <!-- Meta Title -->
                    <v-col cols="12">
                        <div>Meta Title</div>
                        <v-text-field
                            v-model="form.meta_title"
                            outlined
                            dense
                             density="compact"
                        />
                    </v-col>

                    <!-- Meta Description -->
                    <v-col cols="12">
                        <div>Meta Description</div>
                        <v-textarea
                            v-model="form.meta_description"
                            outlined
                            rows="2"
                             density="compact"
                        />
                    </v-col>

                    <!-- SEO Keywords -->
                    <v-col cols="12">
                        <div>SEO Keywords (comma-separated)</div>
                        <v-text-field
                            v-model="form.seo_keywords"
                            outlined
                            dense
                             density="compact"
                        />
                    </v-col>

                    <!-- Content -->
                    <v-col cols="12">
                        <div>Content</div>
                        <v-textarea v-model="form.content" outlined rows="5"  density="compact" />
                    </v-col>

                    <!-- Image Upload -->
                    <v-col cols="12">
                        <div class="mb-1">Blog Image</div>
                        <label
                            for="image-upload"
                            class="cursor-pointer text-purple-700"
                        >
                            <v-icon>mdi-file-image</v-icon> Upload Image
                        </label>
                        <input
                            id="image-upload"
                            type="file"
                            accept="image/*"
                            class="hidden"
                            @change="handleImageChange"
                        />
                        <div v-if="selectedFileName" class="mt-1 text-sm">
                            {{ selectedFileName }}
                        </div>
                    </v-col>

                    <!-- Image Preview -->
                    <v-col cols="12" v-if="imagePreview">
                        <v-img
                            :src="imagePreview"
                            width="300"
                            height="200"
                              class="rounded-lg mt-2 border border-gray-300 object-cover"
                            cover
                        ></v-img>
                    </v-col>
                </v-row>
            </v-container>

            <div class="flex justify-end mt-6">
                <v-btn color="primary" type="submit" :loading="loading"
                    >Submit Blog</v-btn
                >
            </div>
        </v-form>
        </div>
    </v-card>
</template>

<script setup>
import { ref } from "vue";
import axios from "axios";
import { useRouter } from 'vue-router'; 

const router = useRouter(); 
const loading = ref(false);
const imagePreview = ref(null);
const selectedFileName = ref("");

const form = ref({
    title: "",
    slug: "",
    content: "",
    image_url: "",
    category: "",
    tags: "",
    author_name: "",
    author_avatar_url: "",
    is_featured: false,
    published_at: "",
    meta_title: "",
    meta_description: "",
    seo_keywords: "",
});

function handleImageChange(event) {
    const file = event.target?.files?.[0];
    if (file) {
        imagePreview.value = URL.createObjectURL(file);
        selectedFileName.value = file.name;
        form.value.image_url = file;
    }
}

async function submitBlog() {
    loading.value = true;
    try {
        const data = new FormData();
        for (const [key, value] of Object.entries(form.value)) {
            if (key === "tags" && typeof value === "string") {
                data.append(key, JSON.stringify(value.split(",")));
            } else {
                data.append(key, value);
            }
        }

        const res = await axios.post("/api/blogs", data);
        alert("Blog created successfully!");

        router.push("/admin/blogs");
        // Optionally redirect or reset form
    } catch (e) {
        console.error("Error submitting blog:", e);
    } finally {
        loading.value = false;
    }
}
</script>
