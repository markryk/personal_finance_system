<template>
    <canvas ref="chart"></canvas>
</template>

<script setup>
    const props = defineProps({
        labels: Array,
        values: Array
    });

    onMounted(() => {
        new Chart(chart.value, {
            type: 'pie',

            data: {
                labels: props.labels,

                datasets: [{
                    data: props.values
                }]
            }
        });
    });
</script>