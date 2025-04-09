import { useSnackbarStore } from "../stores/snackbar";

/**
 *
 * @param {String} message
 * @param {String} color
 */
export function useSnackbar(message, color = "primary") {
  const { showSnackbar } = useSnackbarStore();
  showSnackbar(message, color);
}
