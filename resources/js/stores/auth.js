import { defineStore } from "pinia";
// import ability from "../services/ability";
import axios from "axios";

export const useAuthStore = defineStore("auth", {
  state: () => ({
    authUser: JSON.parse(localStorage.getItem("user")),
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
    async getUser() {
      const data = await axios.get("api/getuser");
      this.authUser = data.data;
      this.token = true;
      localStorage.setItem("user", JSON.stringify(data.data));
      ability.update([{ action: data.data.ability, subject: "all" }]);
    },
    async logout() {
      this.cleanup();
      await axios.post("/api/logout");
    },
    cleanup() {
      ability.update([]);
      this.token = false;
      this.authUser = null;
      localStorage.removeItem("auth");
      localStorage.removeItem("user");
    }
  }
});
