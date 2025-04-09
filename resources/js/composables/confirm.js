import { useConfirmDialogStore } from "../stores/confirmDialog";

/**
 * Display a confirm dialog and returns user choice
 *
 * @param {String} title
 * @param {String} question
 * @returns Promise
 */
export async function useConfirm(title, question) {
  const { confirm } = useConfirmDialogStore();

  return confirm(title, question);
}
