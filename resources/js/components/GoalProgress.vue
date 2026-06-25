<template>
    <div class="card mb-3">
        <div class="card-body">

            <h4> {{goal.name}} </h4>
            <h5> R$ {{goal.current_amount}} / R$ {{goal.target_amount}} </h5>

            <div class="progress">
                <div class="progress-bar" :style="{ width: goal.progress+'%' }"> {{ goal.progress }} % </div>
            </div>

            <h4> Falta: R$ {{ goal.remaining }} </h4>
            <h4 v-if="goal.forecast"> Previsão: {{ goal.forecast }} meses </h4>
            <h4 v-if="goal.delay < 0"> Você está atrasado {{ Math.abs(goal.delay) }}% </h4>
            <h4 v-else> Você está adiantado </h4>

        </div>
    </div>
</template>

<script setup>
    defineProps({goal:Object});
</script>