<script lang="ts" setup>
import { computed } from "vue";
import { useTheme, resolveCssColor } from "../scripts";
import { PolarArea } from "vue-chartjs";
import { Chart as ChartJS, Title, Tooltip, Legend, ArcElement, RadialLinearScale } from "chart.js";
import ChartDataLabels from "chartjs-plugin-datalabels";

ChartJS.register(Title, Tooltip, Legend, ArcElement, RadialLinearScale, ChartDataLabels);
const { theme } = useTheme();
const { investment, entertainment, bill, other } = defineProps<{
    investment: number;
    entertainment: number;
    bill: number;
    other: number;
}>();
const chartLabels = ["Investment", "Entertainment", "Bill", "Other"];

const textColor = computed(() => {
    theme.value;
    return resolveCssColor("--color-primary2-lighter");
});

const backgroundColor = computed(() => {
    theme.value;
    return resolveCssColor("--color-background-lighter");
});

const chartData = computed(() => {
    theme.value;
    return {
        labels: chartLabels,
        datasets: [
            {
                data: [investment, entertainment, bill, other],
                borderWidth: 10,
                borderColor: backgroundColor.value,
                backgroundColor: ["#FA00FF", "#1814F3", "#FC7900", "#343C6A"],
            },
        ],
    };
});
const chartOptions = computed(() => {
    theme.value;
    return {
        responsive: false,
        maintainAspectRatio: true,
        scales: {
            r: {
                ticks: {
                    display: false,
                },
            },
        },
        plugins: {
            legend: {
                display: false,
            },
            datalabels: {
                display: true,
                color: textColor.value,
                font: {
                    weight: "bold",
                    size: 12,
                },
                anchor: "center",
                align: "center",
                offset: 20,
                clamp: true,
                formatter: (value: number, context: any) => {
                    return `${context.chart.data.labels[context.dataIndex]}\n${value}%`;
                },
            },
        },
    };
});
</script>
<template>
    <PolarArea class="h-[322px]" :data="chartData" :options="chartOptions" />
</template>
