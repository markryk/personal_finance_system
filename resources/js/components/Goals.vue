<template>
    <!-- Controlador da tela -->
    <div class="container">
        <h2> Metas Financeiras </h2>

        <div class="row">
            <div class="mb-4 col-md-4">
                <goal-form @created="loadGoals"/>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <!-- Progresso da meta -->
                <goal-progress v-for="goal in goals" :key="goal.id" :goal="goal"/>
            </div>

            <div class="col-md-8">
                <!-- Card mais explicativo de progresso da meta -->
                <goal-card v-for="goal in goals" :key="goal.id" :goal="goal" @deleted="loadGoals"/>
            </div>
        </div>

    </div>
</template>

<script setup>
    import { ref, onMounted } from 'vue';
    import GoalProgress from './GoalProgress.vue';
    import GoalForm from './GoalForm.vue';
    import GoalCard from './GoalCard.vue';

    const goals = ref([]);

    async function loadGoals() {
        const response = await fetch('/api/goals');
        goals.value = await response.json();
    }
    
    onMounted(loadGoals);
</script>