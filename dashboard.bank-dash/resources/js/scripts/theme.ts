import { ref, onMounted, onBeforeMount } from "vue";

export function useTheme() {
    const theme = ref(document.body.dataset.theme);

    let observer: MutationObserver | undefined;
    onMounted(() => {
        observer = new MutationObserver(() => {
            theme.value = document.body.dataset.theme;
            console.log("Theme Changed");
        });
        observer.observe(document.body, {
            attributes: true,
            attributeFilter: ["data-theme"],
        });
    });
    onBeforeMount(() => {
        observer?.disconnect();
    });
    return { theme };
}
