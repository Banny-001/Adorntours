import { defineStore } from "pinia";

export const useSnackbarStore = defineStore("snackbar", {
  state: () => ({
    snackbar: {
      message: "",
      color: "primary",
      visible: false
    }
  }),
  actions: {
    /**
     *
     * @param {String} message
     * @param {String} color
     */
    showSnackbar(message, color) {
      this.snackbar = {
        message: message,
        color: color,
        visible: message && true
      };
    },
    close() {
      this.snackbar.visible = false;
    }
  }
});
