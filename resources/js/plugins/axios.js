import axios from "axios";
import { useAuthStore } from "../stores/auth";
import router from "../router";
import { ERR_NETWORK } from "../constants/errors";

export default {
  install: () => {
    axios.defaults.headers.common["Accept"] = "application/json";
    axios.interceptors.response.use(
      (response) => response,
      async (error) => {
        const auth = useAuthStore();
        if (error?.response?.data?.message === "Unauthenticated.") {
          if (auth.authenticated) auth.cleanup();
          router.replace("/login");
        }  else if (
          error.message === "Network Error" ||
          error.code === "ECONNABORTED"
        ) {
          return Promise.reject(new Error(ERR_NETWORK));
        } else {
          return Promise.reject(error);
        }
      }
    );
  }
};

