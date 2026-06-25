<template>
    <canvas ref="canvas"></canvas>
</template>

<script setup>
    import { ref, onMounted } from 'vue';
    import Chart from 'chart.js/auto';

    const canvas = ref(null);

    const props = defineProps({ 
        progress: Number 
    });

    onMounted(() => {
        new Chart(canvas.value, {
            type:'doughnut',
            data: {
                labels:["Concluído", "Falta"],
                
                datasets: [{
                    data: [props.progress, 100-props.progress]
                }]
            }
        });
    });
</script>