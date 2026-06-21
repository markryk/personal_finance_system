<template>
    <canvas ref="canvas"></canvas>
</template>


<script setup>
    import { ref, onMounted } from 'vue';
    import Chart from 'chart.js/auto';

    const canvas = ref(null);
    const props = defineProps({
        income: Number,
        expense: Number
    });

    let chart;

    onMounted(()=>{
        chart = new Chart(canvas.value, {

            type: 'bar',
            data: {
                labels: [ 'Receitas', 'Despesas' ],

                datasets: [{
                    label: 'Financeiro',
                    data: [props.income, props.expense]
                }]
            }
        })
    });
</script>