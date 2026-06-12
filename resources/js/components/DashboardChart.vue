<template>
    <canvas ref="chart"></canvas>
</template>

<script setup>
    import { ref, onMounted } from 'vue';
    import Chart from 'chart.js/auto';

    const chart = ref(null);

    const props = defineProps({
        labels: Array,
        values: Array
    });

    onMounted(() => {
        new Chart(chart.value, {
                type: 'bar',
                data: {
                    labels: props.labels,

                    datasets: [{
                        label: 'Valores',
                        data: props.values
                    }]
                }
            }
        );
    });
</script>