<template>
    <div class="card mb-3">
        <div class="card-body">

            <h3> {{ goal.name }} </h3>
            <h5> R$ {{goal.current_amount }} de R$ {{ goal.target_amount }} </h5>

            <div class="progress">
                <div class="progress-bar" :style="{ width: goal.progress + '%' }"> {{ goal.progress }} % </div>
            </div>

            <p class="mt-3"> Falta: <strong> R$ {{ goal.remaining }} </strong></p>
            <p v-if="goal.forecast"> Previsão: {{ goal.forecast }} meses </p>
            <p v-if="goal.delay < 0" class="text-danger"> Você está atrasado {{ Math.abs(goal.delay) }} % </p>
            <p v-else class="text-success"> No ritmo esperado </p>

            <button class="btn btn-danger" @click="remove"> Excluir </button>
        </div>
    </div>
</template>

<script setup>
    const props = defineProps({ goal:Object });
    const emit = defineEmits(['deleted']);

    async function remove() {

        await fetch('/goals/' + props.goal.id, {
            method:'DELETE'
        });

        emit('deleted');
    }
</script>