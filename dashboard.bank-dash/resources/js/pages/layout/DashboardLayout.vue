<script lang="ts" setup>
import { Head, usePage } from "@inertiajs/vue3";
import { provide, ref, onMounted, onUnmounted } from "vue";
import Navbar from "../../components/ui/Navbar.vue";

const viewMode = ref<string | undefined>(undefined);
provide("viewMode", viewMode);
function getBreakPoint(width: number) {
    if (width >= 768) {
        return "desktop";
    } else {
        return "mobile";
    }
}

function onResize() {
    viewMode.value = getBreakPoint(window.innerWidth);
}

onMounted(() => {
    window.addEventListener("resize", onResize);
    onResize();
});
onUnmounted(() => {
    window.removeEventListener("resize", onResize);
});
</script>
<template>
    <Head>
        <title>
            {{ $capitalize(usePage().props.routeName) }}
        </title>
    </Head>
    <main>
        <Navbar />
        <article>
            <slot />
        </article>
    </main>
</template>
