<script lang="ts" setup>
import { Bar } from "vue-chartjs";
import { computed, ref } from "vue";
import { useTheme } from "../scripts";
import { getWeekdays, resolveCssColor } from "../scripts";
import { type FixedLengthArray } from "../types";
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    BarElement,
    Tooltip,
    Legend,
} from "chart.js";
ChartJS.register(CategoryScale, LinearScale, BarElement, Tooltip, Legend);

const chartRef = ref();
const hiddenDatasets = ref<Set<number>>(new Set());
const { theme } = useTheme();

function toggleDataset(index: number) {
    const chart = chartRef.value?.chart as ChartJS | undefined;
    console.log(chart);
    if (!chart) return;

    if (hiddenDatasets.value.has(index)) {
        hiddenDatasets.value.delete(index);
        chart.setDatasetVisibility(index, true);
    } else {
        hiddenDatasets.value.add(index);
        chart.setDatasetVisibility(index, false);
    }

    hiddenDatasets.value = new Set(hiddenDatasets.value);
    chart.update();
}
const chartLabels = getWeekdays();
const { income, expense } = defineProps<{
    income: FixedLengthArray<number, 7>;
    expense: FixedLengthArray<number, 7>;
}>();

const textColor = computed(() => {
    theme.value;
    return resolveCssColor(
        theme.value === "dark" ? "--color-primary2-darker" : "--color-primary2-lighter",
    );
});

const backgroundColor = computed(() => {
    theme.value;
    return resolveCssColor("--color-background");
});

const incomeColor = computed(() => {
    theme.value;
    return resolveCssColor("--color-income");
});

const expenseColor = computed(() => {
    theme.value;
    return resolveCssColor("--color-outcome");
});

const chartData = computed(() => {
    return {
        labels: chartLabels,
        datasets: [
            {
                label: "Income",
                data: income,
                backgroundColor: incomeColor.value,
                borderRadius: 100,
                borderSkipped: false,
            },
            {
                label: "Expense",
                data: expense,
                backgroundColor: expenseColor.value,
                borderRadius: 100,
                borderSkipped: false,
            },
        ],
    };
});
const chartOptions = computed(() => {
    theme.value;
    return {
        responsive: true,
        scales: {
            x: {
                ticks: { color: textColor.value },
                grid: { display: false },
            },
            y: {
                ticks: { color: textColor.value },
                grid: { color: backgroundColor.value },
            },
        },
        plugins: {
            legend: {
                display: false,
            },
            colors: {
                enabled: false,
            },
            datalabels: {
                display: false,
            },
        },
    };
});
</script>
<template>
    <div class="flex flex-col w-full gap-3">
        <div class="flex flex-row w-full gap-5 justify-end">
            <div
                class="flex flex-row items-center gap-2 legend-item select-none cursor-pointer rounded-full outline-2 -outline-offset-1 pr-3 py-1 pl-3 font-semibold"
                :style="{
                    outlineColor: dataset.backgroundColor,
                    backgroundColor: hiddenDatasets.has(index)
                        ? 'var(--color-background-lighter)'
                        : dataset.backgroundColor,
                }"
                v-for="(dataset, index) in chartData.datasets"
                :key="dataset.label"
                @click="toggleDataset(index)"
            >
                <div
                    class="w-2 h-2 rounded-full"
                    :style="{
                        backgroundColor: hiddenDatasets.has(index)
                            ? dataset.backgroundColor
                            : 'var(--color-background-lighter)',
                    }"
                />
                <span
                    :style="{
                        color: hiddenDatasets.has(index)
                            ? dataset.backgroundColor
                            : 'var(--color-background-lighter)',
                    }"
                >
                    {{ dataset.label }}
                </span>
            </div>
        </div>
        <Bar class="w-full" ref="chartRef" :data="chartData" :options="chartOptions" />
    </div>
</template>
