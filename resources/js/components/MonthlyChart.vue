<template>
    <canvas ref="chart"></canvas>
</template>

<script setup>
    const props = defineProps({
        labels: Array,
        incomes: Array,
        expenses: Array
    });

    onMounted(() => {
        new Chart(chart.value, {
            type: 'line',
            data: {
                labels: props.labels,

                datasets: [{
                        label: 'Receitas',
                        data: props.incomes
                    }, {
                        label: 'Despesas',
                        data: props.expenses
                    }
                ]
            }
        });
    });
</script>