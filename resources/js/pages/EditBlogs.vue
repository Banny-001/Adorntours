<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { useRouter, useRoute } from "vue-router";

const router = useRouter();
const route = useRoute();

const loading = ref(false);
const imagePreview = ref(null);
const blogId = route.params.id;
const selectedFileName = ref(null);

const form = ref({
    title: "",
    slug: "",
    content: "",
    category:'',
    image_url: null,
    meta_description: "",
    tags: "",
    author_name: "",
    is_featured: false,
    author_avatar_url: null,
    published_at: "",
    meta_title: "",
    seo_keywords: "",
});

const fetchBlog = async () => {
    try {
        const response = await axios.get(`/api/blogs/${blogId}`);
        const blog = response.data;

        form.value.title = blog.title ?? "";
        form.value.slug = blog.slug ?? "";
        form.value.content = blog.content ?? "";
        form.value.category = blog.category ?? "";
        form.value.meta_description = blog.meta_description ?? "";
        form.value.tags = blog.tags ?? "";
        form.value.author_name = blog.author_name?? "";
        form.value.is_featured = blog.is_featured ?? false;
        form.value.author_avatar_url = blog.author_avatar_url ?? "";
        imagePreview.value = blog.image_url ?? null;
        selectedFileName.value = blog.image_url ? "Current Image" : null;
    } catch (error) {
        console.error("Error loading blog:", error);
    }
};


const handleImageChange = (event) => {
    const file = event.target?.files?.[0];
    if (file && file instanceof File) {
        imagePreview.value = URL.createObjectURL(file);
        selectedFileName.value = file.name;
        form.value.image = file;
    }
};

const submitBlog = async () => {
    const formData = new FormData();

    formData.append("title", form.value.title);
    formData.append("slug", form.value.slug);
    formData.append("content", form.value.content);
    formData.append("category", form.value.category);
    formData.append("is_featured", form.value.is_featured ? 1 : 0);
    formData.append("meta_description", form.value.meta_description);
    formData.append("tags", form.value.tags);
    formData.append("published_at", form.value.published_at);
    formData.append("author_name", form.value.author_name);
    formData.append("author_avatar_url", form.value.author_avatar_url);
    formData.append("meta_title", form.value.meta_title);
    formData.append("seo_keywords", form.value.seo_keywords);

    if (form.value.image_url instanceof File) {
        formData.append("image_url", form.value.image_url);
    }

    try {
        await axios.post(`/api/blogs/${blogId}?_method=PUT`, formData, {
            headers: {
                "Content-Type": "multipart/form-data",
            },
        });
        router.push("/admin/blogs"); // Navigate after successful update
    } catch (error) {
        console.error("Submit error:", error.response?.data || error.message);
    }
};

onMounted(() => {

    fetchBlog();
});
</script>

<template>
    <v-card>
        <div class="max-w-6xl mx-auto px-4 md:px-6 pb-28 pt-6 font-[Poppins]">
            <h1 class="text-3xl font-bold text-[#201444] mb-8 text-center">
                Edit Blog
            </h1>
            <v-form @submit.prevent="submitBlog" class="space-y-10">
                <!-- Section: Basic Tour Info -->
                <v-card elevation="2" class="p-6 rounded-xl bg-[#f7f4fb]">
                    <v-card-title
                        class="text-xl font-semibold mb-2 text-[#201444]"
                    >
                        Basic Information
                    </v-card-title>
                    <v-container fluid>
                        <v-row dense>
                            <v-col cols="12" sm="6">
                                <div>Title</div>
                                <v-text-field
                                    v-model="form.title"
                                    outlined
                                    dense
                                    class="text-field background"
                                    :rules="[(v) => !!v || 'Title is required']"
                                    hide-details
                                />
                            </v-col>
                            <v-col cols="12" sm="6">
                                <div>Slug</div>
                                <v-text-field
                                    v-model="form.slug"
                                    outlined
                                    dense
                                    class="bg-[#f2f2f2]"
                                    :rules="[(v) => !!v || 'Slug is required']"
                                    hide-details
                                />
                            </v-col>
                            <v-col cols="12" sm="6">
                                <div>Content</div>
                                <v-text-field
                                v-model="form.content"
                                outlined
                                dense
                                class="bg-[#f2f2f2]"
                                :rules="[(v) => !!v || 'Content is required']"
                                hide-details
                            />
                            </v-col>
                            <v-col cols="12" sm="6">
                                <div>Description</div>
                                <v-text-field
                                    v-model="form.meta_description"
                                    outlined
                                    dense
                                    class="bg-[#f2f2f2]"
                                    :rules="[
                                        (v) => !!v || 'Description is required',
                                    ]"
                                    hide-details
                                />
                            </v-col>
                            <v-col cols="12" sm="6">
                                <div>Category</div>
                                <v-text-field
                                v-model="form.category"
                                outlined
                                dense
                                class="bg-[#f2f2f2]"
                                :rules="[(v) => !!v || 'Category is required']"
                                hide-details
                            />
                            </v-col>
                            <v-col cols="12" sm="6">
                                <div>Tags</div>
                                <v-text-field
                                    v-model="form.tags"
                                    outlined
                                    dense
                                    class="bg-[#f2f2f2]"
                                    :rules="[(v) => !!v || 'Tags is required']"
                                    hide-details
                                />
                            </v-col>
                            <v-col cols="12" sm="6">
                                <div>Author Name</div>
                                <v-text-field
                                    v-model="form.author_name"
                                    outlined
                                    dense
                                    class="bg-[#f2f2f2]"
                                    :rules="[(v) => !!v || 'Athour name is required']"
                                    hide-details
                                />
                            </v-col>
                           
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
                            <v-col cols="12" sm="6">
                                <div>Avatar url</div>
                                <v-text-field
                                    v-model="form.author_avatar_url"
                                    outlined
                                    dense
                                    class="bg-[#f2f2f2]"
                                    :rules="[(v) => !!v || 'Avator url is required']"
                                    hide-details
                                />
                            </v-col>
                            <v-col cols="12" sm="6">
                                <div>Published At</div>
                                <v-text-field
                                    v-model="form.published_at"
                                    type="date"
                                    outlined
                                    dense
                                    class="bg-[#f2f2f2]"
                                    hide-details
                                />
                            </v-col>
                            <v-col cols="12" sm="6">
                                <div>Meta Title</div>
                                <v-text-field
                                    v-model="form.meta_title"
                                    outlined
                                    dense
                                    class="bg-[#f2f2f2]"
                                    :rules="[(v) => !!v || 'Meta title is required']"
                                    hide-details
                                />
                            </v-col>
                            <v-col cols="12" sm="6">
                                <div>SEO Keywords</div>
                                <v-text-field
                                    v-model="form.seo_keywords"
                                    outlined
                                    dense
                                    class="bg-[#f2f2f2]"
                                    :rules="[(v) => !!v || 'SEO Keywords is required']"
                                    hide-details
                                />
                            </v-col>
                            <v-col cols="12">
                                <div
                                    class="mb-2 text-sm font-medium text-[#201444]"
                                >
                                    Blog Image
                                </div>

                                <!-- File icon label -->
                                <label
                                    for="image-upload"
                                    class="cursor-pointer text-2xl text-purple-700"
                                >
                                    <v-icon>mdi-file-image</v-icon>
                                </label>

                                <!-- Hidden input -->
                                <input
                                    id="image-upload"
                                    type="file"
                                    accept="image/*"
                                    @change="handleImageChange"
                                    class="hidden"
                                />

                                <!-- Show selected image name -->
                                <div
                                    v-if="selectedFileName"
                                    class="mt-1 text-sm text-gray-700"
                                >
                                    {{ selectedFileName }}
                                </div>
                            </v-col>

                            <!-- Image preview -->
                            <v-col cols="12" v-if="imagePreview">
                                <v-img
                                    :src="imagePreview"
                                    width="300"
                                    height="200"
                                    class="rounded-xl mt-2 border border-gray-300 object-cover"
                                    cover
                                ></v-img>
                            </v-col>
                        </v-row>
                    </v-container>
                    <div class="flex justify-end">
                        <v-btn
                            color="primary"
                            size="large"
                            type="submit"
                            :loading="loading"
                            >Save Blog</v-btn
                        >
                    </div>
                </v-card>
            </v-form>
        </div>
    </v-card>
</template>
