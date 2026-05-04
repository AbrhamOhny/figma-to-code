<script lang="ts" setup>
import { computed } from "vue";

const { amount, ttype, date, sender, receiver } = defineProps<{
    amount: number;
    ttype: string;
    date: Date;
    sender: string;
    receiver: string;
}>();

const iconName = computed(() => {
    switch (ttype) {
        case "deposit":
            return "vaadin:money-deposit";
        case "withdraw":
            return "vaadin:money-withdraw";
        default: "mdi:question-mark";
    }
});

const iconColor = computed(() => {
    switch(ttype) {
        case ""
    }
})
</script>

<template></template>
