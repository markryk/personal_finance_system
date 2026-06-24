<template>
    <canvas ref="canvas"></canvas>
</template>

<script setup>
    import { ref,onMounted, watch } from 'vue';
    import Chart from 'chart.js/auto';

    const canvas = ref(null);
    const props = defineProps({
        labels:Array,
        values:Array
    });

    let chart;

    function render() {
        if(chart) {
            chart.destroy();
        }

        chart = new Chart(canvas.value, {
            type: 'pie',
            data: {
                labels: props.labels,
                datasets: [{data: props.values}]
            }
        })
    }

    onMounted(render);

    watch(() => props.values, render, {deep:true});

</script>