<template>
    <div class="card mb-3">
        <div class="card-body">

            <h4> {{goal.name}} </h4>
            <h5> R$ {{goal.current_amount}} / R$ {{goal.target_amount}} </h5>

            <div class="progress">
                <div class="progress-bar" :style="{ width: goal.progress+'%' }"> {{ goal.progress }} % </div>
            </div>

        </div>
    </div>
</template>

<script setup>
    defineProps({goal:Object});
</script>