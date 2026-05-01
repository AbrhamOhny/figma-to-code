<script lang="ts" setup>
const { currentRoute = "" } = defineProps<{
    currentRoute: string;
}>();
const routes: Array<Record<string, string>> = [
    {
        link: "/",
        name: "Dashboard",
        icon: "ic:baseline-home",
    },
    {
        link: "",
        name: "Transactions",
        icon: "mdi:cash-sync",
    },
    {
        link: "",
        name: "Accounts",
        icon: "ic:baseline-person",
    },
    {
        link: "",
        name: "Investments",
        icon: "mdi:chart-finance",
    },
    {
        link: "",
        name: "Credit Cards",
        icon: "mdi:card-bulleted",
    },
    {
        link: "",
        name: "Loans",
        icon: "mdi:hand-coin",
    },
    {
        link: "",
        name: "Services",
        icon: "mdi:customer-service",
    },
    {
        link: "",
        name: "My Privileges",
        icon: "mdi:checkers-outline",
    },
    {
        link: "",
        name: "Settings",
        icon: "mdi:gear",
    },
];
</script>
<template>
    <a
        class="relative pl-10 py-4 flex flex-row gap-5 items-center"
        v-for="route in routes"
        :class="currentRoute === route.link ? 'text-primary font-semibold' : 'hover:text-primary'"
        :href="route.link"
    >
        <div
            class="absolute left-0 w-1.25 bg-primary h-full rounded-tr-full rounded-br-full"
            v-if="currentRoute === route.link"
        ></div>
        <Icon :icon="route.icon" width="24" height="24" />
        <span>
            {{ route.name }}
        </span>
    </a>
</template>
