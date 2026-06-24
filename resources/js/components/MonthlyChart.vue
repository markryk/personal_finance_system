<template>
    <canvas ref="chart"></canvas>
</template>

<script setup>

    import { ref, onMounted, watch } from 'vue';
    import Chart from 'chart.js/auto';

    const canvas = ref(null);
    const props = defineProps({
        labels: Array,
        values: Array
    });

    let chart;

    /*const props = defineProps({
        labels: Array,
        incomes: Array,
        expenses: Array
    });*/

    function render() {
        if(chart) {
            chart.destroy();
        }

        chart = new Chart(canvas.value, {
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

    onMounted(render);

    watch(() => props.values, render, {deep:true});
</script>