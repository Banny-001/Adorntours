<template>
    <v-container fluid class="pa-6">
        <!-- Header with "Create New Blog" Button -->
        <v-row class="mb-4" align="center">
            <v-col cols="8">
                <h1 class="text-h5 font-weight-bold">Blogs</h1>
            </v-col>
            <v-col cols="4" class="text-right">
                <v-btn color="primary" @click="openCreateDialog"
                    >Create New Blog</v-btn
                >
            </v-col>
        </v-row>

        <!-- Blogs Data Table -->
        <v-data-table
            :headers="headers"
            :items="blogs"
            :items-per-page="5"
            class="elevation-1"
            item-key="id"
        >
            <!-- Render the blog image thumbnail -->
            <template #item.image="{ item }">
                <v-img
                    :src="item.image"
                    max-width="100"
                    max-height="60"
                    contain
                />
            </template>

            <!-- Render a truncated version of the content -->
            <template #item.content="{ item }">
                <div>{{ truncateContent(item.content) }}</div>
            </template>

            <!-- Action buttons for edit and delete -->
            <template #item.actions="{ item }">
                <v-btn icon @click="editBlog(item)">
                    <v-icon>mdi-pencil</v-icon>
                </v-btn>
                <v-btn icon @click="deleteBlog(item)">
                    <v-icon color="red">mdi-delete</v-icon>
                </v-btn>
            </template>
        </v-data-table>

        <!-- Create New Blog Dialog -->
        <v-dialog v-model="createDialog" max-width="600">
            <v-card>
                <v-card-title>
                    <span class="headline">Create New Blog</span>
                </v-card-title>
                <v-card-text>
                    <v-form ref="blogForm">
                        <v-text-field
                            v-model="newBlog.title"
                            label="Title"
                            required
                        ></v-text-field>
                        <v-text-field
                            v-model="newBlog.image"
                            label="Image URL"
                            required
                        ></v-text-field>
                        <v-textarea
                            v-model="newBlog.content"
                            label="Content"
                            rows="6"
                            required
                        ></v-textarea>
                    </v-form>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn text @click="closeCreateDialog">Cancel</v-btn>
                    <v-btn color="primary" @click="createBlog">Create</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-container>
</template>

<script setup>
import { ref, reactive, onMounted } from "vue";
import axios from "axios";

// Table headers: we have Title, Image, Content, and Actions
const headers = [
    { text: "Title", value: "title" },
    { text: "Image", value: "image", sortable: false },
    { text: "Content", value: "content", sortable: false },
    { text: "Actions", value: "actions", sortable: false },
];

// Reactive array to store blog entries
const blogs = ref([]);

// Dialog state for the create blog dialog
const createDialog = ref(false);

// Object that holds data for a new blog (only title, image, content)
const newBlog = reactive({
    title: "",
    image: "",
    content: "",
});

// Fetch blogs from your API when mounted
const fetchBlogs = async () => {
    try {
        // Adjust API endpoint as required
        const { data } = await axios.get("/api/blogs");
        blogs.value = data;
    } catch (error) {
        console.error("Error fetching blogs:", error);
    }
};
onMounted(() => {
    fetchBlogs();
});

// Open and close the create dialog
const openCreateDialog = () => {
    createDialog.value = true;
};

const closeCreateDialog = () => {
    createDialog.value = false;
};

// Create a new blog entry
const createBlog = async () => {
    try {
        // Adjust API endpoint as required
        const { data } = await axios.post("/api/blogs", newBlog);
        blogs.value.push(data);
        // Optionally display a success message here
        closeCreateDialog();
        // Reset the form values
        newBlog.title = "";
        newBlog.image = "";
        newBlog.content = "";
    } catch (error) {
        console.error("Error creating blog:", error);
        // Optionally display an error message here
    }
};

// Placeholder: Edit blog functionality can be implemented as needed
const editBlog = (blog) => {
    console.log("Edit blog:", blog);
    // For example, open a separate dialog pre-filled with blog details
};

// Delete a blog entry
const deleteBlog = async (blog) => {
    try {
        await axios.delete(`/api/blogs/${blog.id}`);
        blogs.value = blogs.value.filter((b) => b.id !== blog.id);
    } catch (error) {
        console.error("Error deleting blog:", error);
    }
};

// Helper: Truncate content for display (max 100 characters)
const truncateContent = (content) => {
    const maxLength = 100;
    return content.length > maxLength
        ? content.slice(0, maxLength) + "..."
        : content;
};
</script>

<style scoped>
/* You can further adjust or extend these styles */
/* Example: Center the headline in the dialog */
.headline {
    font-size: 1.25rem;
    font-weight: 500;
}
</style>
