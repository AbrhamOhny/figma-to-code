<script lang="ts" setup>
import Header from "./Header.vue";
import { inject, ref, type Ref } from "vue";
import { usePage } from "@inertiajs/vue3";

const viewMode = inject<Ref<string | undefined>>("viewMode", ref(undefined));
const page = usePage();
</script>
<template>
    <nav class="flex flex-row relative w-full">
        <div
            id="navbar"
            class="z-50 flex flex-col absolute h-dvh bg-background-lighter"
            v-if="viewMode !== 'mobile'"
        >
            <div class="py-5 px-3 mb-3 w-full flex justify-center text-xl font-semibold">
                BankDash
            </div>
        </div>
        <Header>{{ $capitalize(page.props.routeName) }}</Header>
    </nav>
</template>
