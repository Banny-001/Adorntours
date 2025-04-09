import { useLoadingStore } from "../stores/loading";
import { storeToRefs } from "pinia";

export function useLoading() {
  const { setLoading } = useLoadingStore();
  const { loading } = storeToRefs(useLoadingStore());

  const load = () => {
    setLoading(true);
  };

  const quit = () => {
    setLoading(false);
  };

  return { load, quit, loading };
}
