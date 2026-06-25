<template>
    <BaseChart type="bar" :data="chartData"/>
</template>

<script setup>
    import { ref } from 'vue';
    import BaseChart from './BaseChart.vue';

    const props = defineProps({
        labels: Array,
        values: Array
    });

    const chartData = {

        labels: props.labels,
        datasets: [{
            label: 'Valores',
            data: props.values
        }]
    };
</script>