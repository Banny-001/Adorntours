import { defineStore } from "pinia";

import axios from "axios";

export const useAuthStore = defineStore("auth", {
  state: () => ({
    token: localStorage.getItem("auth") || false
  }),
  getters: {
    authenticated: (state) => !!state.token,
    user: (state) => state.authUser
  },
  actions: {
    async getToken() {
      await axios.get("sanctum/csrf-cookie");
    },
   
    async logout() {
      this.cleanup();
      await axios.post("/api/logout");
    },
    cleanup() {
    
      this.token = false;
  
      localStorage.removeItem("auth");
      this.$reset();
    
    }
  }
});
