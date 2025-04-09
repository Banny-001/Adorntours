import { defineStore } from "pinia";

export const useConfirmDialogStore = defineStore("confirmDialog", {
  state: () => ({
    confirmDialog: {
      title: "Confirm",
      question: "",
      visible: false
    },
    reject: null,
    resolve: null
  }),
  actions: {
    confirm(title, question) {
      this.confirmDialog = {
        title: title,
        question: question,
        visible: true
      };

      return new Promise((resolve, reject) => {
        this.resolve = resolve;
        this.reject = reject;
      });
    },
    close() {
      this.confirmDialog.visible = false;
    }
  }
});
