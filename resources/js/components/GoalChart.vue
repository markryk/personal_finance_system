<template>
    <canvas ref="chart"></canvas>
</template>

<script setup>
    const props = defineProps({
        current: Number,
        target: Number
    });

    onMounted(() => {
        const remaining = props.target - props.current;

        new Chart(chart.value, {
            type: 'doughnut',
            data: {
                labels: ['Concluído', 'Restante'],

                datasets: [{
                    data: [props.current, remaining]
                }]
            }
        });
    });
</script>