<template>
    <div class="card">
        <div class="card-body">

            <h4> Metas </h4>
            <h5> Guardado no período: </h5>
            <h3> R$ {{ saved }} </h3>

            <div v-for="goal in goals" :key="goal.id">
                <p> {{ goal.name }} </p>

                <div class="progress">
                    <div class="progress-bar" :style="{ width: goal.progress+'%' }"> {{ goal.progress }} % </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    defineProps({ saved:Number, goals:Array });
</script>