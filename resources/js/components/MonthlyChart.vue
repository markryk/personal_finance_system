<template>
    <canvas ref="canvas"></canvas>
</template>

<script setup>
    import { ref, onMounted, watch } from 'vue';
    import Chart from 'chart.js/auto';

    const canvas = ref(null);
    const props = defineProps({
        labels: {
            type: Array,
            default: () => []
        },

        values: {
            type: Array,
            default: () => []
        }
    });

    let chartInstance = null;

    function renderChart() {
        if(chartInstance) {
            chartInstance.destroy();
        }

        chartInstance = new Chart(canvas.value, {
            type: 'line',
            data: {
                labels: props.labels,

                datasets: [{
                    label: 'Fluxo mensal',
                    data: props.values
                }]
            }
        });
    }

    onMounted(() => {
        renderChart();
    });

    watch (
        () => props.values, 
        () => { renderChart(); },
        { deep:true }
    );
</script>