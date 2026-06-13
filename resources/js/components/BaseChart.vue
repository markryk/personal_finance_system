<template>
    <canvas ref="canvas"></canvas>
</template>

<script setup>
    import {ref, onMounted, onBeforeUnmount} from 'vue';
    import Chart from 'chart.js/auto';

    const canvas = ref(null);
    let chartInstance = null;

    const props = defineProps({
        
        type: {
            type: String,
            required: true
        },

        data: {
            type: Object,
            required: true
        },

        options: {
            type: Object,
            default: () => ({})
        }
    });

    function createChart() {

        if(chartInstance) {
            chartInstance.destroy();
        }

        chartInstance = new Chart(
            canvas.value, {
                type: props.type,
                data: props.data,
                options: props.options
            }
        );
    }

    onMounted(() => {
        createChart();
    });

    onBeforeUnmount(() => {

        if(chartInstance) {
            chartInstance.destroy();
        }
    });
</script>