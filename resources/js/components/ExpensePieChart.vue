<template>
    <canvas ref="canvas"></canvas>
</template>

<script setup>
    import { ref,onMounted } from 'vue';
    import Chart from 'chart.js/auto';

    const canvas = ref(null);
    const props = defineProps({
        labels:Array,
        values:Array
    });

    onMounted(()=>{
        new Chart(canvas.value, {

            type:'pie',
            data:{
                labels:props.labels,
                datasets:[{
                    data:props.values
                }]
            }
        });
    });
</script>