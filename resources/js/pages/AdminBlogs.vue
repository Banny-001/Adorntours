<template>
    <div class="p-4 md:p-6 bg-[#f9f9fb] min-h-screen">
        <!-- Header Card -->
        <v-card class="rounded-2xl mb-6 bg-[#f7f4fb]" flat elevation="2">
            <v-card-text
                class="d-flex justify-space-between align-center py-6 px-4"
            >
                <h1 class="text-3xl font-bold text-[#201444] tracking-wide">
                    📝 Blogs
                </h1>
                <v-btn
                    color="primary"
                    class="text-white"
                    to="/admin/blogs/create"
                   
                >
                    Create New Blog
                </v-btn>
            </v-card-text>
        </v-card>

        <!-- Blogs Table Card -->
        <v-card flat elevation="2" class="rounded-2xl overflow-hidden">
            <v-data-table
                :headers="headers"
                :items="blogs"
                class="elevation-1"
                item-key="id"
                density="comfortable"
                :items-length="totalItems"
                :server-items-length="totalItems"
                :items-per-page="itemsPerPage"
                :page.sync="page"
                :items-per-page-options="[10, 20, 50, 100]"
                :loading="loading"
                loading-text="Loading blogs..."
               
            >
              <template v-slot:item.image_url="{ item }">
                <img
                    :src="item.image_url"
                    class="w-20 h-14 object-cover rounded shadow-sm"
                    :alt="item.title"
                    max-width="100"
                    max-height="60"
                />
            </template>
                

                <!-- Content preview -->
                <template #item.content="{ item }">
                    <div>{{ truncateContent(item.content) }}</div>
                </template>

                <template #item.published_at="{ item }">
                    {{ format12Hour(item.published_at) }}
                </template>

                <!-- Actions -->
                <template #item.actions="{ item }">
                    <v-btn icon 
                    @click="editBlog(item)"
                    :to="`/blogs/${item.id}/edit`"
                    >
                        <v-icon class="rounded-full"
                        color="primary">mdi-pencil</v-icon>
                    </v-btn>
                    <v-btn
                            @click="handleArchive(item.id)"
                            class="text-red-600 hover:text-red-800"
                            
                        >
                            <v-icon small class="text-red-600"
                                >mdi-archive</v-icon
                            >
                </v-btn>
                </template>
            </v-data-table>
        </v-card>
    </div>
</template>

<script setup>
import { ref, reactive, onMounted } from "vue";
import axios from "axios";

const headers = ref ([
  
   { title: "Title", key: "title", sortable: true },
    { title: "Image", key: "image_url", sortable: false },
    { title: "Content", key: "content", sortable: false },
    {title:'Category',key:'category',sortable:false},
    {title:'Author Name',key:'author_name',sortable:false},
    {title:'Published Date',key:'published_at',sortable:false},
    { title: "Actions", key: "actions", sortable: false },

]);

const blogs = ref([]);

const page = ref(1);
const itemsPerPage = ref(10);
const totalItems = ref(0);
const loading = ref(false);

const newBlog = reactive({
    title: "",
    image: "",
    content: "",
});

const fetchBlogs = async () => {
    loading.value = true;
    try {
        const { data } = await axios.get("/api/blogs",{
        params: {
                page: page.value,
                per_page: itemsPerPage.value,
            }
    })
    blogs.value = data.data;
        totalItems.value = data.total;
        console.log(blogs.value)
    } catch (error) {
        console.error("Error fetching blogs:", error);
    }finally {
        loading.value = false;
    }
};
onMounted(() => {
    fetchBlogs();
});


const handleArchive = async (id) => {
    const confirmed = window.confirm(
        "Are you sure you want to archive this blog?"
    );
    if (!confirmed) return;

    try {
    await axios.put(`/api/blogs/${id}/archive`);
    alert("Blog archived successfully!");
    blogs.value = blogs.value.filter(blog => blog.id !== id); 
} catch (error) {
    console.error("Error archiving blog:", error);
    alert("Something went wrong while archiving.");
}
};

const truncateContent = (content) => {
    const maxLength = 100;
    return content.length > maxLength
        ? content.slice(0, maxLength) + "..."
        : content;
};

const format12Hour = (datetime) => {
    if (!datetime) return "";
    return new Date(datetime).toLocaleString("en-US", {
        hour: "numeric",
        minute: "2-digit",
        hour12: true,
        year: "numeric",
        month: "short",
        day: "numeric",
    });
};
</script>
