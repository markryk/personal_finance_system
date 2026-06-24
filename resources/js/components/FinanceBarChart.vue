<template>
    <canvas ref="canvas"></canvas>
</template>

<script setup>
    import { ref, onMounted, watch } from 'vue';
    import Chart from 'chart.js/auto';

    const canvas = ref(null);
    const props = defineProps({
        income: Number,
        expense: Number
    });

    let chart;

    function render() {
        if(chart) {
            chart.destroy();
        }

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
    }

    onMounted(render);

    //Função que atualiza automaticamente os gráficos
    watch(() => [props.income, props.expense], render);
</script>