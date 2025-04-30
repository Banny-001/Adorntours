<template>
    <div>
        <!-- App Bar - Full Width -->
        <v-app-bar app fixed color="primary" dark height="64">
            <v-app-bar-nav-icon
                @click.stop="drawer = !drawer"
            ></v-app-bar-nav-icon>
            <v-toolbar-title class="ml-2">Adorn Admin</v-toolbar-title>
            <v-spacer></v-spacer>

            <!-- User Menu with Logout -->
            <v-menu>
                <template v-slot:activator="{ props }">
                    <v-btn icon v-bind="props">
                        <v-avatar size="36">
                            <v-img
                                src="https://ui-avatars.com/api/?name=Admin&background=ffffff&color=201444"
                            />
                        </v-avatar>
                    </v-btn>
                </template>
                <v-list>
                    <v-list-item @click="logout">
                        <v-list-item-title>Logout</v-list-item-title>
                        <v-list-item-icon>
                            <v-icon>mdi-logout</v-icon>
                        </v-list-item-icon>
                    </v-list-item>
                </v-list>
            </v-menu>
        </v-app-bar>

        <!-- Navigation Drawer with All Menus -->
        <v-navigation-drawer
            v-model="drawer"
            app
            permanent
            width="260"
            color="white"
            class="border-r"
        >
            <v-list nav dense class="pt-4">
                <!-- Dashboard -->
                <v-list-item
                    to="/dashboard"
                    active-class="active-nav-item"
                    rounded="xl"
                    class="mb-1"
                >
                    <template v-slot:prepend>
                        <v-icon color="primary">mdi-view-dashboard</v-icon>
                    </template>
                    <v-list-item-title>Dashboard</v-list-item-title>
                </v-list-item>

                <!-- Tours -->
                <v-list-group value="Tours">
                    <template v-slot:activator="{ props }">
                        <v-list-item
                            v-bind="props"
                            prepend-icon="mdi-earth"
                            title="Tours"
                            rounded="xl"
                            class="mb-1"
                        ></v-list-item>
                    </template>
                    <v-list-item
                        to="/admin/tours"
                        active-class="active-nav-item"
                        rounded="xl"
                        class="mb-1 ml-4"
                    >
                        <template v-slot:prepend>
                            <v-icon color="primary"
                                >mdi-format-list-bulleted</v-icon
                            >
                        </template>
                        <v-list-item-title>All Tours</v-list-item-title>
                    </v-list-item>
                    <v-list-item
                        to="/admin/tours/create"
                        active-class="active-nav-item"
                        rounded="xl"
                        class="mb-1 ml-4"
                    >
                        <template v-slot:prepend>
                            <v-icon color="primary">mdi-plus-circle</v-icon>
                        </template>
                        <v-list-item-title>Create Tour</v-list-item-title>
                    </v-list-item>
                </v-list-group>

                <!-- Blogs -->
                <v-list-group value="Blogs">
                    <template v-slot:activator="{ props }">
                        <v-list-item
                            v-bind="props"
                            prepend-icon="mdi-post"
                            title="Blogs"
                            rounded="xl"
                            class="mb-1"
                        ></v-list-item>
                    </template>
                    <v-list-item
                        to="/admin/blogs"
                        active-class="active-nav-item"
                        rounded="xl"
                        class="mb-1 ml-4"
                    >
                        <template v-slot:prepend>
                            <v-icon color="primary"
                                >mdi-format-list-bulleted</v-icon
                            >
                        </template>
                        <v-list-item-title>All Blogs</v-list-item-title>
                    </v-list-item>
                    <v-list-item
                        to="/admin/blogs/create"
                        active-class="active-nav-item"
                        rounded="xl"
                        class="mb-1 ml-4"
                    >
                        <template v-slot:prepend>
                            <v-icon color="primary">mdi-plus-circle</v-icon>
                        </template>
                        <v-list-item-title>Create Blog</v-list-item-title>
                    </v-list-item>
                </v-list-group>
               <!-- resources -->
               <v-list-group value="Blogs">
                <template v-slot:activator="{ props }">
                    <v-list-item
                        v-bind="props"
                        prepend-icon=" mdi-semanticWeb"
                        title="Teacher Resources"
                        rounded="xl"
                        class="mb-1"
                    ></v-list-item>
                </template>
                <v-list-item
                        to="/admin/resources"
                        active-class="active-nav-item"
                        rounded="xl"
                        class="mb-1 ml-4"
                    >
                        <template v-slot:prepend>
                            <v-icon color="primary"
                                >mdi-format-list-bulleted</v-icon
                            >
                        </template>
                        <v-list-item-title>Teacher Resources</v-list-item-title>
                    </v-list-item>
                    <v-list-item
                    to="/admin/resource/create"
                    active-class="active-nav-item"
                    rounded="xl"
                    class="mb-1 ml-4"
                >
                    <template v-slot:prepend>
                        <v-icon color="primary">mdi-plus-circle</v-icon>
                    </template>
                    <v-list-item-title>Create Teacher Resource</v-list-item-title>
                </v-list-item>
                </v-list-group>
                <!-- Custom Tours -->
                <v-list-item
                    to="/admin/custom-tours"
                    active-class="active-nav-item"
                    rounded="xl"
                    class="mb-1"
                >
                    <template v-slot:prepend>
                        <v-icon color="primary">mdi-compass</v-icon>
                    </template>
                    <v-list-item-title>Custom Tours</v-list-item-title>
                </v-list-item>

                <!-- Contacts -->
                <v-list-item
                    to="/admin/contacts"
                    active-class="active-nav-item"
                    rounded="xl"
                    class="mb-1"
                >
                    <template v-slot:prepend>
                        <v-icon color="primary">mdi-email</v-icon>
                    </template>
                    <v-list-item-title>Contacts</v-list-item-title>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
import {useAuthStore} from "@/stores/auth";

const router = useRouter();
const drawer = ref(true);
const authStore = useAuthStore();

const logout = async () => {
  try {
    await authStore.logout();
    router.replace("/login");
  } catch (error) {
    console.error("Logout failed:", error);
  }
};
</script>

<style scoped>
/* Full width app bar */
.v-app-bar {
    width: 100% !important;
    left: 0 !important;
}

/* Active menu item styling */
.active-nav-item {
    background-color: rgba(94, 53, 177, 0.08) !important;
    color: #5e35b1 !important;
}

/* Hover effect */
.v-list-item:not(.active-nav-item):hover {
    background-color: rgba(94, 53, 177, 0.04) !important;
}

/* Adjust drawer position */
.v-navigation-drawer {
    top: 64px !important;
    height: calc(100vh - 64px) !important;
}

/* Mobile responsiveness */
@media (max-width: 960px) {
    .v-navigation-drawer {
        top: 56px !important;
        height: calc(100vh - 56px) !important;
    }
}

/* Border for drawer */
.border-r {
    border-right: 1px solid rgba(0, 0, 0, 0.12);
}
</style>
